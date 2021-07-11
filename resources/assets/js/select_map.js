$(document).ready(function() {

    var current_lat = type == 1 ? saved_lat * 1 : $('#current_lat').val() * 1;
    var current_lng = type == 1 ? saved_lng * 1 : $('#current_lng').val() * 1;
    $('#lat').val(current_lat);
    $('#lng').val(current_lng);

    initMap();

    function initMap() {
        var zoom = 8;

        var myLatlng = {
            lat: current_lat,
            lng: current_lng


        }


        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: zoom,
            center: myLatlng,
        });
        // Create the initial InfoWindow.
        let infoWindow = new google.maps.InfoWindow({
            content: 'موقعي',
            position: myLatlng,
        });
        infoWindow.open(map);
        // Configure the click listener.
        map.addListener("click", (mapsMouseEvent) => {
            // Close the current InfoWindow.
            infoWindow.close();
            // Create a new InfoWindow.
            infoWindow = new google.maps.InfoWindow({
                position: mapsMouseEvent.latLng,
            });
            infoWindow.setContent(
                'موقعي'
            );
            infoWindow.open(map);
            $('#lat').val(mapsMouseEvent.latLng.toJSON().lat)
            $('#lng').val(mapsMouseEvent.latLng.toJSON().lng)
        });
    }
})