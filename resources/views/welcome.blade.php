@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')
@section('page_css')
    <style>
        .jconfirm-buttons {
            width: 100% !important;
            text-align: center !important;
        }

        #map {
            height: 700px;
            width: 100%;
        }

    </style>
    
@endsection

<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
    <div class="carousel-inner">


        @foreach ($sliders as $slider)

            <?php
            $color = '#333333';
            $button_color = '#333333';
            if ($slider->color != null) {
            $color = $slider->color;
            }
            if ($slider->button_color != null) {
            $button_color = $slider->button_color;
            }
            ?>
            <div class="carousel-item position-relative @if ($loop->first) active @endif">
                <div class="slider-container" style="background-image:url('{{ $slider->image }}')">
                    <div class="text-slider position-absolute">
                        <div style="color:{{ $color }}" class="text-header-slider">{{ $slider->content }}</div>
                        @if ($slider->url != null)
                            <a style="font-size:20px;font-weight:700;background:{{ $button_color }}"
                                class="btn {{ $slider->button_font }} button px-5 py-2"
                                href="//{{ $slider->url }}">{{ $slider->button_title ?? 'اضغط هنا' }}</a>
                        @endif
                    </div>

                </div>
            </div>
        @endforeach

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>


<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="search-bar">
                <form action="" method="">
                    <div class="row filter-location">
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <select name="" id="city">
                                <option value="" disabled selected>المدينه</option>
                                @foreach (App\Http\Controllers\LocationController::getCities() as $city)
                                    <option value="{{ $city->id }}">{{ $city->name }}</option>
                                @endforeach

                            </select>
                        </div>
                        <div class="col-sm-6 col-md-4 col-lg-2">
                            <select name="" id="area">
                                <option value="" disabled selected>الحى</option>
                            </select>
                        </div>

                        <!-- <div class="col-sm-6 col-md-4 col-lg-2">
                            <select name="" id="">
                                <option value="" disabled selected>التصنيفات</option>
                                <option value="">التصنيفات</option>
                                <option value="">التصنيفات</option>

                            </select>
                        </div>
                        <div class="col-sm-12 col-md-6 col-lg-4">
                            <div class="filte-price">
                                <label for="">السعر</label>
                                <input type="number" placeholder="من">
                                <input type="number" placeholder="الي">
                            </div>


                        </div>
                    -->
                        <div class="col-sm-12 col-md-6 col-lg-2">
                            <div class="btn-map">
                                <button type="button" id="map_btn">الخرائط</button>
                            </div>
                        </div>

                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="head-home-page" id="shops-title">جميع المتاجر</h2>
        </div>
        @foreach ($all_buyers as $buyer)
            <div class="col-sm-12 col-md-12 col-lg-6 box-home-shops shops-container" data-city="{{ $buyer->city_id }}"
                data-area="{{ $buyer->area_id }}">
                <div class="row">
                    <div class="col-6 ps-0">
                        <a href="{{ route('vendor-products', $buyer->id) }}">
                            <div class="bg-box-right-side" @if ($buyer->buyer_logo != null) style="background-image:url('{{ $buyer->buyer_logo }}') !important" @endif>

                            </div>
                        </a>

                    </div>
                    <div class="col-6 pe-0">
                        <div class="bg-box-left-side">
                            <div class="description-shop">
                                <a class="text-decoration-none" href="{{ route('vendor-products', $buyer->id) }}">
                                    <h4>{{ $buyer->buyer_name }}</h4>
                                </a>
                                <div class="ph-number">
                                    <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}"
                                        class="img-fluid" alt="">
                                    <a href="tel:{{ $buyer->buyer_mobile }}">{{ $buyer->buyer_mobile }}</a>
                                </div>
                                <div class="location-store">
                                    <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}"
                                        class="img-fluid" alt="">
                                    {{ $buyer->buyer_site }}
                                </div>
                                <div class="btn-box">
                                    <a href="{{ route('buyer_offers', $buyer->id) }}">العروض</a>
                                    <!-- <div class="icon-favorite" id="divFavorite">
                                    <i class="fas fa-heart" class="" id="favoriteIcon"></i>
                                </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach


    </div>
</div>

@endsection

@section('page_js')
<script>
    var type = 0;
    var message = `{{ $message }}`;
    var success_img = "{{ asset('resources/assets/images/done.png') }}";
    var change_message_status = "{{ route('change_message_status') }}";
</script>
<script src="{{ asset('resources/assets/js/buyer_message.js') }}"></script>
<script>
    // $('.carousel').carousel();
    // $('.carousel').carousel({
    //     interval: 5000
    // });
    // .carousel('pause');
    // .carousel('cycle');

    // var myModal = document.getElementById('myModal')
    // var myInput = document.getElementById('myInput')

    // myModal.addEventListener('shown.bs.modal', function() {
    //     myInput.focus()
    // })
    var red_icon =  'http://maps.google.com/mapfiles/ms/icons/red-dot.png' ;
    var locations=[];
    @foreach($all_buyers as $buyer)
    locations.push({
        id:"{{$buyer->id}}",
        lng:"{{$buyer->lng}}",
        lat:"{{$buyer->lat}}",
        buyer_name:"{{$buyer->buyer_name}}",
    })
    @endforeach
</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?libraries=places,geometry"></script>

<script src="{{ asset('resources/assets/js/maps.js') }}"></script>
<script src="{{ asset('resources/assets/js/cities.js') }}"></script>
<script src="{{ URL::asset('resources/assets/js/fill_areas.js') }}"></script>
@endsection
