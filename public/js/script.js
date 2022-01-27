$(document).ready(function () {
    if ($('span#toast').data('status')) {
        if ($('span#toast').data('type') == "error") {
            iziToast.error({
                title: 'Error',
                message: 'Something went wrong!',
                position: 'topRight'
            });
        } else {
            iziToast.success({
                title: 'OK!',
                message: $('span#toast').data('message'),
                position: 'topRight'
            });
        }
    }

    $(".summernote-simple").summernote();


});
