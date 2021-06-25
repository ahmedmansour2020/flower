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
            $(item).removeClass('add_to_favourite').addClass('disabled');
        })

    })
})