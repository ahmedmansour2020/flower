$(document).ready(function() {

    $(document).on('click', '.buyer_map', function(e) {
        e.preventDefault();
        var lng = $(this).data('lng') * 1;
        var lat = $(this).data('lat') * 1;
        $.confirm({
            backgroundDismiss: true,
            columnClass: 'col-9',
            title: false,
            content: "<div id='map'></div>",
            buttons: false
        })
        setTimeout(function() {

            initMap(lng, lat);

        }, 200)
    })
})



function initMap(vendor_lng, vendor_lat) {

    var current_lat = $('#current_lat').val() * 1;
    var current_lng = $('#current_lng').val() * 1;

    var directionsService = new google.maps.DirectionsService;
    var directionsDisplay = new google.maps.DirectionsRenderer;

    var zoom;
    var marker;
    var myLatlng = {
        lat: current_lat,
        lng: current_lng
    };
    zoom = 6;

    var origin = {
        lat: current_lat,
        lng: current_lng
    }

    var destination = {
            lat: vendor_lat,
            lng: vendor_lng
        }
        // var onChangeHandler = function() {
    calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination);
    // };

    const map = new google.maps.Map(document.getElementById("map"), {
        zoom: zoom,
        center: myLatlng,
    });
    directionsDisplay.setMap(map);

    marker = new google.maps.Marker({
        position: new google.maps.LatLng(current_lat, current_lng),
        map: map,
        icon: blue_icon,
        title: "موقعي"
    });


    marker = new google.maps.Marker({
        position: new google.maps.LatLng(vendor_lat, vendor_lng),
        map: map,
        icon: red_icon,
        title: "موقع التاجر"
    });

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

function calculateAndDisplayRoute(directionsService, directionsDisplay, origin, destination) {
    directionsService.route({
        origin: `${origin.lat},${origin.lng}`,
        destination: `${destination.lat},${destination.lng}`,
        travelMode: 'DRIVING'
    }, function(response, status) {
        if (status === 'OK') {
            directionsDisplay.setDirections(response);
        } else {
            window.alert('Directions request failed due to ' + status);
        }
    });
}