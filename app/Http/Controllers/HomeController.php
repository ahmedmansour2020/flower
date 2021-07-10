<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Category;
use App\Models\Favourite;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function to_home()
    {
        $title = "الصفحة الرئيسية";
        $sliders = Slider::where('status', 1)->get();
        foreach ($sliders as $slider) {
            $slider->image = asset('uploaded/' . $slider->image);
        }
        $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
        $message = "";
        $user = Auth::user();
        if ($user) {
            if ($user->role_id == $buyer->id && $user->message_status == 0) {
                $buyers_message = Setting::where('key', 'buyers_message')->first();
                if ($buyers_message) {
                    $message = $buyers_message->value;
                }
            }
        }
        $all_buyers = User::where('membership_status', 1)->get();
        foreach ($all_buyers as $buyer) {
            if ($buyer->buyer_logo != null) {
                $buyer->buyer_logo = asset('uploaded/' . $buyer->buyer_logo);
            }
            if ($buyer->buyer_banner != null) {
                $buyer->buyer_banner = asset('uploaded/' . $buyer->buyer_banner);
            }
        }
  
        return view('welcome', compact('title', 'sliders', 'message', 'all_buyers'));
    }
    function add_location(){
      
        $lat = $_GET['lat'];
        $lng = $_GET['lng'];
  
     $user=auth()->user();
     if($user){
         $buyer=User::find($user->id);
         $buyer->lng=$lng;
         $buyer->lat=$lat;
         $buyer->save();
         return response()->json(['success'=>true,]);
        }else{
         return response()->json(['success'=>false]);
     }
    }
    public function change_message_status(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $user->message_status = 1;
        $user->save();
        return response()->json([
            'success' => true,
        ]);
    }
    public function to_about_us()
    {
        $title = "من نحن";
        $content = "";
        $about_us = Setting::where('key', 'who_we_are')->first();
        if ($about_us) {
            $content = $about_us->value;
        }

        return view('home/about-us', compact('title', 'content'));
    }
    public function to_products($id)
    {
        $title = "منتجات التاجر ";
        $buyer = Role::where('name', 'تاجر')->orWhere('name', 'buyer')->first();
        $user = User::where('id', $id)->where('role_id', $buyer->id)->where('membership_status', 1)->firstOrFail();
        $title .= $user->buyer_name;
        if ($user->buyer_logo != null) {
            $user->buyer_logo = asset('uploaded/' . $user->buyer_logo);
        }
        if ($user->buyer_banner != null) {
            $user->buyer_banner = asset('uploaded/' . $user->buyer_banner);
        }
        $products = Product::where('user_id', $id)->get();
        foreach ($products as $product) {
            $image = ItemImage::leftJoin('images', 'images.id', 'image_id')->where('item_id', $product->id)->where('item_type', 'product')->select('name', 'main', 'image_id')->first();
           if($image){
               $product->image = asset('uploaded/' . $image->name);

           }else{
            $product->image=null;
           }
        }

        return view('home/vendor-products', compact('title', 'user', 'products'));
    }
    public function to_buyer_offers($id)
    {
        $title = "عروض التاجر ";
        $buyer = Role::where('name', 'تاجر')->orWhere('name', 'buyer')->first();
        $user = User::where('id', $id)->where('role_id', $buyer->id)->where('membership_status', 1)->firstOrFail();
        $title .= $user->buyer_name;
        if ($user->buyer_logo != null) {
            $user->buyer_logo = asset('uploaded/' . $user->buyer_logo);
        }
        if ($user->buyer_banner != null) {
            $user->buyer_banner = asset('uploaded/' . $user->buyer_banner);
        }
        $products = Product::where('user_id', $id)->whereNotNull('offer')->select('products.*')->get();
        foreach ($products as $product) {
            $image = ItemImage::leftJoin('images', 'images.id', 'image_id')->where('item_id', $product->id)->where('item_type', 'product')->select('name', 'main', 'image_id')->first();
            if($image){
                $product->image = asset('uploaded/' . $image->name);
 
            }else{
             $product->image=null;
            }
        }
        $from="offers";
        return view('home/vendor-products', compact('title', 'user', 'products','from'));
    }
    public function to_offers()
    {
        $title = "جميع العروض";
        $buyer = Role::where('name', 'تاجر')->orWhere('name', 'buyer')->first();

        $products = Product::leftJoin('users','users.id','user_id')->where('users.role_id', $buyer->id)->where('membership_status', 1)->whereNotNull('offer')->select('products.*')->get();
        foreach ($products as $product) {
            $image = ItemImage::leftJoin('images', 'images.id', 'image_id')->where('item_id', $product->id)->where('item_type', 'product')->select('name', 'main', 'image_id')->first();
            if($image){
                $product->image = asset('uploaded/' . $image->name);
 
            }else{
             $product->image=null;
            }
        }
        $from="all_offers";
        
        return view('home/vendor-products', compact('title', 'products','from'));
    }
    public function to_new()
    {
        $title = "المنتجات الجديدة";
        $buyer = Role::where('name', 'تاجر')->orWhere('name', 'buyer')->first();

        $products = Product::leftJoin('users','users.id','user_id')
        ->where('users.role_id', $buyer->id)
        ->where('membership_status', 1)
        ->select('products.*')
        ->orderBy('products.id','desc')
        ->limit(12)
        ->get();

        foreach ($products as $product) {
            $image = ItemImage::leftJoin('images', 'images.id', 'image_id')->where('item_id', $product->id)->where('item_type', 'product')->select('name', 'main', 'image_id')->first();
            if($image){
                $product->image = asset('uploaded/' . $image->name);
 
            }else{
             $product->image=null;
            }
        }
        $from="new";
        
        return view('home/vendor-products', compact('title', 'products','from'));
    }
    public function product_view($id)
    {
        $product = Product::leftJoin('users', 'users.id','user_id')->where('membership_status',1)->where('products.id',$id)->select('products.*')->firstOrFail();
        $image = ItemImage::leftJoin('images', 'images.id', 'image_id')->where('item_id', $product->id)->where('item_type', 'product')->select('name', 'main', 'image_id')->first();
        $product->image = asset('uploaded/' . $image->name);
        $title = $product->name;
        $category=Category::find($product->category_id);
        if($category){
            $product->category=$category->name;
        }
        $user = User::find($product->user_id);
        if ($user->buyer_logo != null) {
            $user->buyer_logo = asset('uploaded/' . $user->buyer_logo);
        }
        if ($user->buyer_banner != null) {
            $user->buyer_banner = asset('uploaded/' . $user->buyer_banner);
        }
        return view('home/product-view', compact('user', 'product', 'title'));
    }
    public function wish_list()
    {
        $title = "قائمة المفضلات";
        $user = Auth::user();
        $products = Favourite::leftJoin('products', 'products.id', 'favourites.product_id')
        ->leftJoin('users','users.id','products.user_id')
        ->where('favourites.user_id', $user->id)->select('products.*', 'favourites.id as favourite_id','buyer_name','users.id')->get();
        foreach ($products as $product) {
            $image = ItemImage::leftJoin('images', 'images.id', 'image_id')->where('item_id', $product->id)->where('item_type', 'product')->select('name', 'main', 'image_id')->first();
            if($image){
                $product->image = asset('uploaded/' . $image->name);
 
            }else{
             $product->image=null;
            }
        }
        return view('home/wish-list', compact('title', 'products'));
    }

    public function search(){
        $word=$_GET['q'];
        $title="نتائج البحث : ".$word;
        $products=Product::leftJoin('categories','categories.id','category_id')->leftJoin('users','users.id','user_id')->where('users.membership_status',1)->where('products.name','like','%'.$word.'%')->orWhere('products.description','like','%'.$word.'%')->orWhere('categories.name','like','%'.$word.'%')->select('products.*')->get();
        foreach ($products as $product) {
            $image = ItemImage::leftJoin('images', 'images.id', 'image_id')->where('item_id', $product->id)->where('item_type', 'product')->select('name', 'main', 'image_id')->first();
            if($image){
                $product->image = asset('uploaded/' . $image->name);
            }else{
             $product->image=null;
            }
        }
        $from="all_offers";
        return view('home/vendor-products', compact('title', 'products','from'));

    }
}
