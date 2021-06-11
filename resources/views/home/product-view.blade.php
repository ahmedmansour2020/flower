@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')

    <section class="header-vendor-products ">
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
    <div class="container mt-5">
        <div class="row">


            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="img-product-view">
                    <img src="{{ URL::asset('resources/assets/images/product-view.png') }}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row mt-3">
                    <div class="col-6"><h3 class="name-product-view">بوكية طبيعى</h3></div>
                    <div class="col-6 text-left">
                        <p class="price-product-view ">140 ريال </p>
                    </div>
                    <p class="desc-product-view">هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك أن تولد مثل هذا النص أو العديد من النصوص الأخرى إضافة إلى زيادة عدد الحروف التى يولدها التطبيق.</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <table class="float-right table-about-product" dir="rtl">
                    <tbody>
                        <tr>
                            <td>النوع</td>
                            <td>:</td>
                            <td>بوكية</td>
                        </tr>
                        <tr>
                            <td>البائع</td>
                            <td>:</td>
                            <td><a href="#">وردة الخريف</a></td>
                        </tr>
                        <tr>
                            <td>الباقة</td>
                            <td>:</td>
                            <td>رقم 1</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <button type="button" class="bg-red-btn btn-product-view add-favorite">أضف إلى قائمة الاعجابات</button>
                <a href="https://api.whatsapp.com/send?phone=01223011089&text=hello!" target="_blank" class="bg-green-btn btn-product-view text-vendor">تواصل مع التاجر</a>
            </div>


        </div>
    </div>



@endsection
