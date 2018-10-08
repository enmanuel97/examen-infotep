(function($) {
  "use strict";

    $(document).on('click', '.modal_trigger', function(){
        var selector    = $(this),
            url         = selector.data('url'),
            target      = selector.data('target'),
            data        = {method : 'get', url : url, selector : target + ' .modal-dialog', action : 'html'};

        $('.modal-dialog').html('');

         DOM.getAppend(data);
    });

    $(document).on('click', '.delete-record', function () {
        var selector    = $(this),
            url         = selector.data('url'),
            url_redirect = selector.data('return'),
            data        = {method : 'get', url : url, returnUrl: url_redirect, action : 'redirect'};

        DOM.getAppend(data);
    });

    // $('#submit-modal').click(function (e) {
    //     e.preventDefault();
    //     var data = {type: "post", url: $('#form').attr('action'), form: "#form", doAfter: "datatable", showAlert: true, titleResponse: "Exito!", textResponse: "Prealerta Registrada Correctamente"};
    //     DOM.submit(data);
    // });

})(jQuery);
