$(document).ready(function() {
    var url = home_url + "/get_areas";
    if (type == 1) {
        var id = $('#city,#city_id').val();
        var data = {
            "_token": $('meta[name="csrf-token"]').attr("content"),
            "id": id
        };
        $.post(url, data, function(response) {
            if (response.success) {
                var options = "";
                for (var i = 0; i < response.areas.length; i++) {
                    options += `<option value="${response.areas[i].id}" ${selected_area==response.areas[i].id?'selected':''}>${response.areas[i].name}</option>`
                }
                $('#area,#area_id').html(options);
            }
        })

    }
    $(document).on('change', '#city,#city_id', function() {
        var id = $(this).val();
        var data = {
            "_token": $('meta[name="csrf-token"]').attr("content"),
            "id": id
        };
        $.post(url, data, function(response) {
            if (response.success) {
                var options = "";
                for (var i = 0; i < response.areas.length; i++) {
                    options += `<option value="${response.areas[i].id}">${response.areas[i].name}</option>`
                }
                $('#area,#area_id').html(options);
            }
        })
    })
})