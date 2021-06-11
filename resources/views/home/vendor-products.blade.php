@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')

    <section class="header-vendor-products">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">

                    <div class="profile-img-store">

                        <img src="{{ URL::asset('resources/assets/images/img-profile-store.png ') }}" class="img-fluid"
                            alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="data-store">
                        <h4>وردة الخريف</h4>
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

                    </div>
                    <ul class="list-socials">
                        <li><a href="#"><i class="fab fa-snapchat-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li><a href="#"><i class="fab fa-instagram-square"></i></a></li>
                        <li><a href="#"><i class="fab fa-whatsapp"></i></a></li>
                        <li><a href="#"><i class="fab fa-facebook-square"></i></a></li>
                    </ul>
                    <a href="#" class="bg-green-btn btn-offers">العروض</a>
                </div>
            </div>

        </div>
    </section>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="search-bar">
                    <form action="" method="">
                        <select name="" id="">
                            <option value="" disabled selected>التصنيفات</option>
                            <option value="">التصنيفات</option>
                            <option value="">التصنيفات</option>

                        </select>
                        <label for="">السعر</label>
                        <input type="number" placeholder="من">
                        <input type="number" placeholder="الي">
                    </form>
                </div>
            </div>


            <div class="col-sm-6 col-md-4 col-lg-3">
                <div class="box-product">
                    <div class="container-image-product">
                        <img src="{{ URL::asset('resources/assets/images/product-1.png') }}" class="img-fluid" alt="">

                        <div class="discount">
                            <span>20%</span>
                        </div>
                        <div class="icon-favorite" id="divFavorite">
                            <i class="fas fa-heart" class="" id="favoriteIcon"></i>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-6">
                            <div class="name-product">
                                <span>باقه رقم 1</span>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="price-product">
                                <span>100 ريال</span>
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="description-product">
                            <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من محل وردة الخريف</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>



@endsection
