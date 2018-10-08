var request = function(e){
    var params = false;

    if(e.type == "post"){
        // params = new FormData($(e.form)[0]).serialize();
        params = $(e.form).serialize();

    }

    return $.ajax({
        type: e.type,
        url: e.url,
        data: params,
        cache : false,
        contenType: false,
        processData: false
    });
};

