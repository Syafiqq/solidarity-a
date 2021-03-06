(function ($) {
    $(function () {
        $('.passwordable-invoker').on('click', function () {
            var pass_selector = $(this).siblings('input.form-control');
            if ($(this).is(':checked'))
            {
                pass_selector.attr('type', 'text')
            } else
            {
                pass_selector.attr('type', 'password')
            }
        });
    });
    /*
     * Run right away
     * */

    if ((sessionFlashdata !== undefined) && (sessionFlashdata !== null))
    {
        if ((sessionFlashdata['notify'] !== undefined))
        {
            apiResponseNotify(sessionFlashdata['notify']);
        }
    }

})(jQuery);

function apiResponseNotify(response)
{
    for (var i = -1, is = response.length; ++i < is;)
    {
        $.notify({
            message: response[i]
        }, {
            type: 'info',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message" style="color: #0f0f0f">{2}</span>' +
                '<div class="progress" data-notify="progressbar">' +
                '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
        });
    }
}
