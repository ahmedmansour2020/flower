$(document).ready(function() {
    $(document).on('change', '#city,#area', filer_city_area)

    function filer_city_area() {
        var city = $('#city').val();
        var area = $('#area').val();
        $('.shops-container').addClass('hidden');
        if (city > 0 && area > 0) {
            $('.shops-container').each(function(e) {
                if (city == $(this).data('city') && area == $(this).data('area')) {
                    $(this).removeClass('hidden');
                }
            })
        } else if (city > 0 && area == null) {
            $('.shops-container').each(function(e) {
                if (city == $(this).data('city')) {
                    $(this).removeClass('hidden');
                }
            })
        }
    }
})