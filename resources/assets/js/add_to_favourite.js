$(document).ready(function() {
    $(document).on('click', '.add_to_favourite', function() {
        var item = $(this);
        var id = $(this).data('id');
        var data = {
            '_token': $('meta[name="csrf-token"]').attr('content'),
            'id': id
        };
        $.post(add_to_favourite, data, function(response) {
            $(item).find('i').addClass('text-danger');
            $(item).removeClass('add_to_favourite').addClass('fav-disabled').parents('div').attr('title', 'المنتج موجود في المفضلات');
        })

    })

    $(document).on('click', '.login-first', function() {
        $.confirm({
            title: false,
            content: `
            <h3 class="my-5 text-center w-100">برجاء التسجيل الدخول أولا</h3>
            <p class="text-center"><a class="btn btn-info" href="${login_url}">سجل الدخول</a></p>`,
            buttons: false
        })
    })
})