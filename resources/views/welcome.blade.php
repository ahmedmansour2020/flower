@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')


<div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
    <div class="carousel-inner">
      <div class="carousel-item position-relative active">
        <img class="d-block w-100" src="{{ URL::asset('resources/assets/images/img_nature_wide.jpg') }}"  alt="First slide">
      </div>
      <div class="text-slider position-absolute">
        <h3>احصل على طلبك باقل تكلفة</h3>
        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك </p>
        <button type="button" class="btn">العروض</button>
      </div>

      <div class="carousel-item position-relative">
        <img class="d-block w-100" src="{{ URL::asset('resources/assets/images/img_mountains_wide.jpg') }}" alt="Second slide">
      </div>
      <div class="text-slider position-absolute">
        <h3>احصل على طلبك باقل تكلفة</h3>
        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك </p>
        <button type="button" class="btn">العروض</button>
      </div>

      <div class="carousel-item position-relative">
        <img class="d-block w-100" src="{{ URL::asset('resources/assets/images/img_snow_wide.jpg') }}" alt="Third slide">
      </div>

      <div class="text-slider position-absolute">
        <h3>احصل على طلبك باقل تكلفة</h3>
        <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك </p>
        <button type="button" class="btn">العروض</button>
      </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching" data-bs-slide="next">
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
                    {{-- <img src="{{ URL::asset('resources/assets/images/shop-home-page.png') }}" class="img-fluid" alt=""> --}}
                </div>
                <div class="col-6 pe-0">
                    <div class="bg-box-left-side">
                        <div class="description-shop">
                            <h4>وردة الخريف</h4>
                            <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من</p>
                            <div class="ph-number">
                                <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                    alt="">
                                <a href="tel:01206039762">01206039762</a>
                            </div>
                            <div class="location-store">
                                <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}" class="img-fluid"
                                    alt="">
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
                    {{-- <img src="{{ URL::asset('resources/assets/images/shop-home-page.png') }}" class="img-fluid" alt=""> --}}
                </div>
                <div class="col-6 pe-0">
                    <div class="bg-box-left-side">
                        <div class="description-shop">
                            <h4>وردة الخريف</h4>
                            <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من</p>
                            <div class="ph-number">
                                <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                    alt="">
                                <a href="tel:01206039762">01206039762</a>
                            </div>
                            <div class="location-store">
                                <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}" class="img-fluid"
                                    alt="">
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
                    {{-- <img src="{{ URL::asset('resources/assets/images/shop-home-page.png') }}" class="img-fluid" alt=""> --}}
                </div>
                <div class="col-6 pr-box">
                    <div class="bg-box-left-side">
                        <div class="description-shop">
                            <h4>وردة الخريف</h4>
                            <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من</p>
                            <div class="ph-number">
                                <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                    alt="">
                                <a href="tel:01206039762">01206039762</a>
                            </div>
                            <div class="location-store">
                                <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}" class="img-fluid"
                                    alt="">
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
                    {{-- <img src="{{ URL::asset('resources/assets/images/shop-home-page.png') }}" class="img-fluid" alt=""> --}}
                </div>
                <div class="col-6 pr-box">
                    <div class="bg-box-left-side">
                        <div class="description-shop">
                            <h4>وردة الخريف</h4>
                            <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من</p>
                            <div class="ph-number">
                                <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                    alt="">
                                <a href="tel:01206039762">01206039762</a>
                            </div>
                            <div class="location-store">
                                <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}" class="img-fluid"
                                    alt="">
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
    $('.carousel').carousel();
    $('.carousel').carousel({
  interval: 5000
});
.carousel('pause');
.carousel('cycle');

var myModal = document.getElementById('myModal')
var myInput = document.getElementById('myInput')

myModal.addEventListener('shown.bs.modal', function () {
  myInput.focus()
})

</script>
@endsection
