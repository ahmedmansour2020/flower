$(document).ready(function() {
    $(document).on('click', '.remove', function(e) {
        var id = $(this).data('id');
        e.preventDefault();
        $.confirm({
            title: 'حذف المنتج',
            content: 'هل أنت متأكد من حذف هذا المنتج؟',
            buttons: {
                نعم: {
                    btnClass: 'btn btn-danger',
                    action: function() {
                        $(`#form-${id}`).submit();
                    }
                },
                لا: {
                    tnClass: 'btn btn-primary',
                    action: function() {

                    }
                }
            }
        })
    })
})