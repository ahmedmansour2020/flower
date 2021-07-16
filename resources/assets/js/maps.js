$(document).ready(function() {

    $(document).on('click', '#map_btn', function() {
        $.confirm({
            backgroundDismiss: true,
            columnClass: 'col-9',
            title: false,
            content: "<div id='map'></div>",
            buttons: false
        })
        setTimeout(function() {

            initMap_all();

        }, 200)
    })
})



function initMap_all() {

    var current_lat = $('#current_lat').val() * 1;
    var current_lng = $('#current_lng').val() * 1;

    var zoom;
    var marker;
    var myLatlng = {
        lat: current_lat,
        lng: current_lng
    };
    zoom = 8;


    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: zoom,
        center: myLatlng,
    });

    // Create the initial InfoWindow.
    // let infoWindow = new google.maps.InfoWindow({
    //     content: JSON.stringify(myLatlng),
    //     position: myLatlng,
    // });
    // infoWindow.open(map);
    marker = new google.maps.Marker({
        position: new google.maps.LatLng(current_lat, current_lng),
        map: map,
        icon: blue_icon,
        title: "موقعي"
    });

    for (i = 0; i < locations.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(locations[i].lat, locations[i].lng),
            map: map,
            icon: red_icon,
            html: "<div>\n" +
                "<table class=\"map1\">\n" +
                "<tr>\n" +
                "<td><a target='_blank' href='" + home_url + "/products/" + locations[i].id + "'>" + locations[i].buyer_name + "</a></td></tr>\n" +
                "</table>\n" +
                "</div>"
        });

        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infowindow = new google.maps.InfoWindow();
                confirmed = locations[i][4] === '1' ? 'checked' : 0;
                $("#confirmed").prop(confirmed, locations[i][4]);
                $("#id").val(locations[i][0]);
                $("#description").val(locations[i][3]);
                $("#form").show();
                infowindow.setContent(marker.html);
                infowindow.open(map, marker);
            }
        })(marker, i));
    }
    //



    // Configure the click listener.
    map.addListener("click", (mapsMouseEvent) => {
        // Close the current InfoWindow.
        infoWindow.close();
        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({
            position: mapsMouseEvent.latLng,
        });
        infoWindow.setContent(
            JSON.stringify(mapsMouseEvent.latLng.toJSON(), null, 2)
        );
        infoWindow.open(map);
        $('#lat').val(mapsMouseEvent.latLng.toJSON().lat)
        $('#lng').val(mapsMouseEvent.latLng.toJSON().lng)
    });
}