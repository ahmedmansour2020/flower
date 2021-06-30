$(document).ready(function() {

    $(document).on('change keyup input', '#price_from,#price_to,#category_id', filter);



    function filter() {
        var array = $('.productContainer');
        var price_from = $('#price_from').val();
        var price_to = $('#price_to').val();
        var category_id = $('#category_id').val();
        if (category_id != "" || price_to != "" || price_from != "") {

            $(array).each(function(e) {
                $(this).addClass('hidden');
                if (category_id != "") {

                    if ($(this).data('category') == category_id) {
                        if (price_from != "" && price_to != "") {
                            if ($(this).data('price') <= price_to && $(this).data('price') >= price_from) {
                                $(this).removeClass('hidden');
                            }
                        } else if (price_from == "" && price_to != "") {
                            if ($(this).data('price') <= price_to) {
                                $(this).removeClass('hidden');
                            }
                        } else if (price_from != "" && price_to == "") {
                            if ($(this).data('price') >= price_from) {
                                $(this).removeClass('hidden');
                            }
                        } else {
                            $(this).removeClass('hidden');
                        }
                    }
                } else {
                    if (price_from != "" && price_to != "") {
                        if ($(this).data('price') <= price_to && $(this).data('price') >= price_from) {
                            $(this).removeClass('hidden');
                        }
                    } else if (price_from == "" && price_to != "") {
                        if ($(this).data('price') <= price_to) {
                            $(this).removeClass('hidden');
                        }
                    } else if (price_from != "" && price_to == "") {
                        if ($(this).data('price') >= price_from) {
                            $(this).removeClass('hidden');
                        }
                    } else {
                        $(this).removeClass('hidden');
                    }
                }
            })
        } else {

        }
    }
})