$(document).ready(function() {
    $(document).on('click', '.logout', function(e) {

        e.preventDefault();
        $('#logout').click();
    });
    (function($) {
        $.fn.inputFilter = function(inputFilter) {
            return this.on("input keydown keyup mousedown mouseup select contextmenu drop", function() {
                if (inputFilter(this.value)) {
                    this.oldValue = this.value;
                    this.oldSelectionStart = this.selectionStart;
                    this.oldSelectionEnd = this.selectionEnd;
                } else if (this.hasOwnProperty("oldValue")) {
                    this.value = this.oldValue;
                    this.setSelectionRange(this.oldSelectionStart, this.oldSelectionEnd);
                } else {
                    this.value = "";
                }
            });
        };
    }(jQuery));

    $("input[name='mobile']").inputFilter(function(value) {
        return /^\d*$/.test(value);
    });


})
$('#image-btn').on('click', function() {
    $('#image').click();
})
$('#image').on('change', function() {
    var value = $(this).val();
    var items = value.split('\\');
    $('#image-label').val(items[items.length - 1]);

})
$('#image-btn1').on('click', function() {
    $('#image1').click();
})
$('#image1').on('change', function() {
        var value = $(this).val();
        var items = value.split('\\');
        $('#image-label1').val(items[items.length - 1]);

    })
    // $('#divFavorite').on('click',function(){
    //     $('#favoriteIcon').toggle().css({'color':'red'});
    // });
$("#favoriteIcon").click(function() {
    $(this).toggleClass('iconFavorite');
});

// iconFavorite

// Start edit btn

$(".btn-edit-input").on('click', function() {
    $(this).siblings('input').removeAttr('readonly').focus();
});