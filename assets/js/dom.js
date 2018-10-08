var DOM;

DOM = {
    setSingleAlert: function(data){
        swal({
            type: data.type,
            title: data.title,
            text: data.text
        });
    },
    setRequestAlert:function(data){
        var confirmButtonColor = (typeof data.confirmButtonColor === "undefined") ? '#3085d6' : data.confirmButtonColor,
            cancelButtonColor  = (typeof data.cancelButtonColor === "undefined") ? '#d33' : data.cancelButtonColor,
            confirmButtonText  = (typeof data.confirmButtonText === "undefined") ? "Si, eliminar!" : data.confirmButtonText;

        swal({
            title: data.title,
            text: data.text,
            type: data.type,
            showCancelButton: true,
            confirmButtonColor: confirmButtonColor,
            cancelButtonColor: cancelButtonColor,
            confirmButtonText: confirmButtonText,
        }).then(
            request(data).done(function(r){
                var response = JSON.parse(r);
                if(response.result !== 0){
                    DOM.actionsAfterProccess(data, response);
                }
                else{
                    var alert = {
                        type: "error",
                        title: "No se puede ejecutar la operacion",
                        text: "Por el momento no se puede ejecutar esta operacion, si el problema continua contacte con su proveedor"
                    };
                    this.setSingleAlert(alert);
                }
            })
        );
    },
    submit: function(data){
        request(data).done(function(r){
            var response = JSON.parse(r);

            if(response.result !== 0){
                DOM.actionsAfterProccess(data, response);
            }else{
                var messageError = (typeof data.messageError === "undefined") ? '.response' : data.messageError;
                $(messageError).html(response.error);
                $('html, body').animate({scrollTop:0}, 100, 'linear');
                // setTimeout(function(){
                //     savingSelector.css('background-color', '#d9534f').fadeOut(1500);
                // }, 1000);
            }
        });
    },
    getAppend : function(data){
        request(data).done(function(r) {
            var response = JSON.parse(r);

            if(response.result !== 0) {
                switch(data.action) {
                    case 'html':
                        $(data.selector).html(response.result);
                        break;

                    case 'append':
                        $(data.selector).append(response.result);
                        break;

                    case 'prepend':
                        $(data.selector).prepend(response.result);
                        break;

                    case 'before':
                        $(data.selector).before(response.result);
                        break;

                    case 'insertAfter':
                        data.selector.after(response.result);
                        break;

                    case 'redirect':
                        window.location = data.returnUrl;
                        break;

                    default:
                        $(data.selector).html(response.result);
                }
            }
        });
    },
    actionsAfterProccess: function (data, response) {
        switch (data.doAfter){
            case "redirect":
                var url = (typeof response.url === "undefined") ? data.returnUrl : response.url;
                if(data.showAlert == true){
                    this.setSingleAlert({ type: "success", title: data.titleResponse, text: data.textResponse});
                }
                window.location = url;
                break;

            case "datatable":
                if(data.showAlert == true){
                    $(data.form).modal('hide');
                    // $("#dataTable").ajax.reload();
                    this.setSingleAlert({type: "success", title: data.titleResponse, text: data.textResponse});
                }
                break;
            case 'html':
                $(data.selector).html(response.view);
                break;

        }
    }
};

