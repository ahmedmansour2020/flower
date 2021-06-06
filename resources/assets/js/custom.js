$('#image-btn').on('click', function() {
    $('#image').click();
})
$('#image').on('change', function() {
    var value = $(this).val();
    var items = value.split('\\');
    var image_val = $('#image-label');
    $('#image-label').text(items[items.length - 1]);
    console.log(image_val);

})
