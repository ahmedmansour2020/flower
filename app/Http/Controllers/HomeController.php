<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Slider;
use App\Models\Product;
use App\Models\Setting;
use App\Models\ItemImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\ProductResource;

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
        $all_buyers=User::where('membership_status',1)->get();
        foreach ($all_buyers as $buyer){
            if($buyer->buyer_logo!=null){
                $buyer->buyer_logo=asset('uploaded/' . $buyer->buyer_logo);
            }
            if($buyer->buyer_banner!=null){
                $buyer->buyer_banner=asset('uploaded/' . $buyer->buyer_banner);
            }
        }
        return view('welcome', compact('title', 'sliders', 'message','all_buyers'));
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
        $title="من نحن";
        $content="";
        $about_us=Setting::where('key', 'who_we_are')->first();
        if($about_us){
            $content=$about_us->value;
        }

        return view('home/about-us',compact('title','content'));
    }
    public function to_products($id){
        $title="منتجات التاجر ";
        $buyer=Role::where('name','تاجر')->orWhere('name', 'buyer')->first();
        $user=User::where('id',$id)->where('role_id',$buyer->id)->where('membership_status',1)->firstOrFail();
        $title.=$user->buyer_name;
        if($user->buyer_logo!=null){
            $user->buyer_logo=asset('uploaded/' . $user->buyer_logo);
        }
        if($user->buyer_banner!=null){
            $user->buyer_banner=asset('uploaded/' . $user->buyer_banner);
        }
        $products=Product::where('user_id',$id)->get();
        foreach($products as $product){
            $image=ItemImage::leftJoin('images','images.id','image_id')->where('item_id',$product->id)->where('item_type','product')->select('name','main','image_id')->first();
            $product->image=asset('uploaded/' . $image->name);
        }
        
        return view('home/vendor-products',compact('title','user','products'));
    }
}
