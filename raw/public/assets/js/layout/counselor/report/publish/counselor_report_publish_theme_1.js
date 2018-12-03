(function ($) {
    $(function () {
        $('a#print').on('click', function (event) {
            event.preventDefault();
            $("page#printable-area").print({
                globalStyles: true,
                mediaPrint: false,
                stylesheet: '',
                noPrintSelector: ".no-print",
                iframe: true,
                append: null,
                prepend: null,
                manuallyCopyFormValues: true,
                deferred: $.Deferred(),
                timeout: 750,
                title: null,
                doctype: '<!doctype html>'
            });
        });
    });
    /*
     * Run right away
     * */
})(jQuery);
