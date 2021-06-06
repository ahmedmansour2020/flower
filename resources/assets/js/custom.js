$('#image-btn').on('click', function() {
    $('#image').click();
})
$('#image').on('change', function() {
    var value = $(this).val();
    var items = value.split('\\');
    $('#image-label').val(items[items.length - 1]);

})
