
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ URL::asset('resources/assets/js/custom.js') }}"></script>
<script src="{{ URL::asset('resources/assets/js/search.js') }}"></script>

<!-- google maps -->
<!-- <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry"></script> -->

<script defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCSMCkxhkOaL1zZ1HND-GxUr3WsBGV2qm8">
</script>
<!-- end google maps -->

<script>
    var add_to_favourite="{{route('favourite.store')}}";
    var csrf_content='{{ csrf_field() }} ';
    var home_message="{{route('home_message')}}" ;
    var msg_read="{{route('msg_read')}}" ;
    var user_link="{{route('register')}}";
    var buyer_link="{{route('register_buyer')}}";
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var blue_icon =  'http://maps.google.com/mapfiles/ms/icons/blue-dot.png' ;
    function getLocation() {
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showPosition);
    } else {
        console.log('not supported')
    }
}

function showPosition(position) {
    $('#current_lat').val(position.coords.latitude);
    $('#current_lng').val(position.coords.longitude)
}

getLocation()
</script>
<script src="{{asset('resources/assets/js/add_to_favourite.js')}}"></script>
<script src="{{ URL::asset('resources/assets/js/home-messages.js') }}"></script>
<script src="{{ URL::asset('resources/assets/js/notifications.js') }}"></script>
