@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')

<?php 
use App\Http\Controllers\FavouriteController;
?>
    <section class="header-vendor-products" style="background-image:url('{{$user->buyer_banner}}')">
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-4 col-lg-3">

                    <div class="profile-img-store">

                        <img src="{{ $user->buyer_logo}}" class="img-fluid"
                            alt="">
                    </div>
                </div>
                <div class="col-sm-12 col-md-8 col-lg-9">
                    <div class="data-store">
                        <h4>{{ $user->buyer_name}}</h4>
                        <div class="ph-number">
                            <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid"
                                alt="">
                            <a href="https://api.whatsapp.com/send?phone=2{{ $user->buyer_mobile}}">{{ $user->buyer_mobile}}</a>
                        </div>
                        <div class="location-store">
                            <img src="{{ URL::asset('resources/assets/images/icon-location.png') }}" class="img-fluid"
                                alt="">
                            <a href="#">{{ $user->buyer_site}}</a>
                        </div>

                    </div>
                    <ul class="list-socials">
                    @if($user->buyer_snapshat)<li><a target="_blank" href="//{{str_replace('http://','',str_replace('https://','',$user->buyer_snapshat))}}"><i
                                class="fab fa-snapchat-square"></i></a></li>@endif
                    @if($user->buyer_twitter)<li><a target="_blank" href="//{{str_replace('http://','',str_replace('https://','',$user->buyer_twitter))}}"><i
                                class="fab fa-twitter"></i></a></li>@endif
                    @if($user->buyer_instagram)<li><a target="_blank" href="//{{str_replace('http://','',str_replace('https://','',$user->buyer_instagram))}}"><i
                                class="fab fa-instagram-square"></i></a></li>@endif
                    @if($user->buyer_whatsapp)<li><a target="_blank" href="//{{str_replace('http://','',str_replace('https://','',$user->buyer_whatsapp))}}"><i
                                class="fab fa-whatsapp"></i></a></li>@endif
                    @if($user->buyer_facebook)<li><a target="_blank" href="//{{str_replace('http://','',str_replace('https://','',$user->buyer_facebook))}}"><i
                                class="fab fa-facebook-square"></i></a></li>@endif
                </ul>
                    <a href="{{route('buyer_offers',$user->id)}}" class="bg-green-btn btn-offers">العروض</a>
                </div>
            </div>

        </div>
    </section>
    <div class="container mt-5">
        <div class="row">


            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="img-product-view">
                    <img src="{{ $product->image}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <div class="row mt-3">
                    <div class="col-6"><h3 class="name-product-view">{{$product->name}}</h3></div>
                    <div class="col-6 text-left">
                        <p class="price-product-view ">{{$product->price}} ريال </p>
                    </div>
                    <p class="desc-product-view">{{$product->description}}</p>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <table class="float-right table-about-product" dir="rtl">
                    <tbody>
                        <tr>
                            <td>النوع</td>
                            <td>:</td>
                            <td>{{$product->category}}</td>
                        </tr>
                        <tr>
                            <td>البائع</td>
                            <td>:</td>
                            <td><a href="#">{{$user->buyer_name}}</a></td>
                        </tr>
                        <tr>
                            <td>الباقة</td>
                            <td>:</td>
                            <td>{{$product->name}}</td>
                        </tr>


                    </tbody>
                </table>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6">
                <button type="button" class="bg-red-btn btn-product-view add-favorite @if(FavouriteController::check_favourite($product->id)!=1) disabled @else add_to_favourite @endif" data-id="{{$product->id}}">أضف إلى قائمة الاعجابات</button>
                <a href="https://api.whatsapp.com/send?phone={{$user->buyer_whatsapp}}&text=hello!" target="_blank" class="bg-green-btn btn-product-view text-vendor">تواصل مع التاجر</a>
            </div>


        </div>
    </div>



@endsection
