@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')
@section('page_css')
<style>
.jconfirm-buttons {
    width: 100% !important;
    text-align: center !important;
}
</style>
@endsection

<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
    <div class="carousel-inner">


        @foreach($sliders as $slider)

        <?php
            $color='#333333';
            $button_color='#333333';
            if($slider->color!=null){
                $color=$slider->color;
            }
            if($slider->button_color!=null){
                $button_color=$slider->button_color;
            }
            ?>
        <div class="carousel-item position-relative @if($loop->first) active @endif">
            <div class="slider-container"  style="background-image:url('{{$slider->image}}')">
            <div class="text-slider position-absolute">
                <div style="color:{{$color}}">{{$slider->content}}</div>
                @if($slider->url!=null)
                <a style="font-size:20px;font-weight:700;background:{{$button_color}}"
                    class="btn {{$slider->button_font}} px-5 py-2"
                    href="//{{$slider->url}}">{{$slider->button_title??'اضغط هنا'}}</a>
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
                        <div class="col-2">
                            <select name="" id="">
                                <option value="" disabled selected>المدينه</option>
                                <option value="">التصنيفات</option>
                                <option value="">التصنيفات</option>

                            </select>
                        </div>
                        <div class="col-2">
                            <select name="" id="">
                                <option value="" disabled selected>الحى</option>
                                <option value="">التصنيفات</option>
                                <option value="">التصنيفات</option>

                            </select>
                        </div>
                        <div class="col-2">
                            <select name="" id="">
                                <option value="" disabled selected>التصنيفات</option>
                                <option value="">التصنيفات</option>
                                <option value="">التصنيفات</option>

                            </select>
                        </div>
                        <div class="col-4">
                            <div class="filte-price">
                                <label for="">السعر</label>
                                <input type="number" placeholder="من">
                                <input type="number" placeholder="الي">
                            </div>


                        </div>
                        <div class="col-2">
                            <div class="btn-map">
                                <button type="button">الخرائط</button>
                            </div>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <h2 class="head-home-page">جميع المتاجر</h2>
        </div>

        <div class="col-sm-12 col-md-12 col-lg-6 box-home-shops">
            <div class="row">
                <div class="col-6 ps-0">
                    <div class="bg-box-right-side">

                    </div>
                    {{-- <img src="{{ URL::asset('resources/assets/images/shop-home-page.png') }}" class="img-fluid"
                    alt=""> --}}
                </div>
                <div class="col-6 pe-0">
                    <div class="bg-box-left-side">
                        <div class="description-shop">
                            <h4>وردة الخريف</h4>
                            <div class="ph-number">
                                <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                    alt="">
                                <a href="tel:01206039762">01206039762</a>
                            </div>
                            <div class="location-store">
                                <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}"
                                    class="img-fluid" alt="">
                                <a href="#">شارع صالح الشهابى و الفنان محمد حسن</a>
                            </div>
                            <div class="btn-box">
                                <a href="#">العروض</a>
                                <div class="icon-favorite" id="divFavorite">
                                    <i class="fas fa-heart" class="" id="favoriteIcon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 box-home-shops">
            <div class="row">
                <div class="col-6 ps-0">
                    <div class="bg-box-right-side">

                    </div>
                    {{-- <img src="{{ URL::asset('resources/assets/images/shop-home-page.png') }}" class="img-fluid"
                    alt=""> --}}
                </div>
                <div class="col-6 pe-0">
                    <div class="bg-box-left-side">
                        <div class="description-shop">
                            <h4>وردة الخريف</h4>
                            <div class="ph-number">
                                <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                    alt="">
                                <a href="tel:01206039762">01206039762</a>
                            </div>
                            <div class="location-store">
                                <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}"
                                    class="img-fluid" alt="">
                                <a href="#">شارع صالح الشهابى و الفنان محمد حسن</a>
                            </div>
                            <div class="btn-box">
                                <a href="#">العروض</a>
                                <div class="icon-favorite" id="divFavorite">
                                    <i class="fas fa-heart" class="" id="favoriteIcon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 box-home-shops">
            <div class="row">
                <div class="col-6 pl-box">
                    <div class="bg-box-right-side">

                    </div>
                    {{-- <img src="{{ URL::asset('resources/assets/images/shop-home-page.png') }}" class="img-fluid"
                    alt=""> --}}
                </div>
                <div class="col-6 pr-box">
                    <div class="bg-box-left-side">
                        <div class="description-shop">
                            <h4>وردة الخريف</h4>
                            {{-- <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من</p> --}}
                            <div class="ph-number">
                                <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                    alt="">
                                <a href="tel:01206039762">01206039762</a>
                            </div>
                            <div class="location-store">
                                <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}"
                                    class="img-fluid" alt="">
                                <a href="#">شارع صالح الشهابى و الفنان محمد حسن</a>
                            </div>
                            <div class="btn-box">
                                <a href="#">العروض</a>
                                <div class="icon-favorite" id="divFavorite">
                                    <i class="fas fa-heart" class="" id="favoriteIcon"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-6 box-home-shops">
            <div class="row">
                <div class="col-6 pl-box">
                    <div class="bg-box-right-side">

                    </div>
                    {{-- <img src="{{ URL::asset('resources/assets/images/shop-home-page.png') }}" class="img-fluid"
                    alt=""> --}}
                </div>
                <div class="col-6 pr-box">
                    <div class="bg-box-left-side">
                        <div class="description-shop">
                            <h4>وردة الخريف</h4>
                            {{-- <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من</p> --}}
                            <div class="ph-number">
                                <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                    alt="">
                                <a href="tel:01206039762">01206039762</a>
                            </div>
                            <div class="location-store">
                                <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}"
                                    class="img-fluid" alt="">
                                <a href="#">شارع صالح الشهابى و الفنان محمد حسن</a>
                            </div>
                            <div class="btn-box">
                                <a href="#">العروض</a>
                                <div class="icon-favorite" id="divFavorite">
                                    <i class="fas fa-heart" class="" id="favoriteIcon"></i>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>


    </div>
</div>




@endsection




@section('page_js')
<script>
var message = `{{$message}}`;
var success_img = "{{ asset('resources/assets/images/done.png') }}";
var change_message_status = "{{route('change_message_status')}}";
</script>
<script src="{{asset('resources/assets/js/buyer_message.js')}}"></script>
<script>
$('.carousel').carousel();
$('.carousel').carousel({
    interval: 5000
});
.carousel('pause');
.carousel('cycle');

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function() {
    myInput.focus()
})
</script>
@endsection