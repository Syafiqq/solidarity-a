module.exports = {
    assetsVendorResource: function (negated, mime) {
        return [
            (negated ? '!' : '') + './node_modules/jquery/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/html5-boilerplate/dist/css/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/html5-boilerplate/dist/js/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/bootstrap/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/popper.js/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/font-awesome/css/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/font-awesome/fonts/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/jquery-slimscroll/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/nprogress/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/ionicons/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/fastclick/lib/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/admin-lte/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/html5shiv/dist/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/respond.js/dest/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/bootstrap-notify/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/datatables.net/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/datatables.net-dt/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/datatables.net-bs/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/jQuery.print/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/icheck/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/jquery.easing/**' + (mime === null ? '' : '/' + mime),
            (negated ? '!' : '') + './node_modules/js-cookie/src/**' + (mime === null ? '' : '/' + mime)
        ];
    }
};
