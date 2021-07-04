@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')
<?php 
use App\Http\Controllers\FavouriteController;
?>
@if(isset($from))
@if($from!='all_offers')
    <section class="header-vendor-products" style="background-image:url('{{$user->buyer_banner}}')">

    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-4 col-lg-3">

                <div class="profile-img-store">

                    <img src="{{ $user->buyer_logo}}" class="img-fluid" alt="">
                </div>
            </div>
            <div class="col-sm-12 col-md-8 col-lg-9">
                <div class="data-store">
                    <h4>{{ $user->buyer_name}}</h4>
                    <div class="ph-number">
                        <img src="{{ URL::asset('resources/assets/images/icon-phone.png') }}" class="img-fluid" alt="">
                        <a href="tel:{{ $user->buyer_mobile}}">{{ $user->buyer_mobile}}</a>
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
                @if(!isset($from))
                <a href="{{route('buyer_offers',$user->id)}}" class="bg-green-btn btn-offers">العروض</a>
                @endif
            </div>
        </div>

    </div>
</section>
@endif
@endif
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="search-bar">
                <form action="" method="">
                    <select name="" id="category_id">
                        <option value="" >جميع التصنيفات</option>
                        @foreach(App\Http\Controllers\CategoryController::get_categories() as $category)
                        <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach

                    </select>
                    <label for="">السعر</label>
                    <input type="number" placeholder="من" id="price_from">
                    <input type="number" placeholder="الي" id="price_to">
                </form>
            </div>
        </div>

        @foreach($products as $product)
       
        <div class="col-sm-6 col-md-4 col-lg-3 productContainer" data-price="{{$product->price}}" data-category="{{$product->category_id}}">
            <div class="box-product">
                <div class="container-image-product">
                    <a href="{{route('product-view',$product->id)}}">
                        <img src="{{ $product->image }}" class="img-fluid" alt="">
                    </a>
                    @if( $product->offer!=null )
                    <div class="discount">
                        <span>{{$product->offer}}%</span>
                    </div>
                    @endif
                    <div
                        title="{{FavouriteController::check_favourite($product->id)==1?'اضف الى المفضلات':(FavouriteController::check_favourite($product->id)==-1?'سجل الدخول أولا':'المنتج موجود في المفضلات')}}">
                        <a class="icon-favorite @if(FavouriteController::check_favourite($product->id)!=1) fav-disabled @else add_to_favourite @endif"
                            data-id="{{ $product->id }}">
                            <i
                                class="fas fa-heart @if(FavouriteController::check_favourite($product->id)==0) text-danger @endif"></i>
                        </a>
                    </div>
                </div>
               
                <div class="row">
                    <div class="col-6">
                        <div class="name-product">
                   
                                <span>{{$product->name}}</span>
                   
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="price-product">
                            <span>{{$product->price}} ريال</span>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="description-product">
                        <p>{{ $product->description }}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>



@endsection
@section('page_js')
<script src="{{asset('resources/assets/js/product-filtration.js')}}"></script>
@endsection