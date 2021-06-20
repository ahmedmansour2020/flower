<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Slider;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function to_home()
    {
        $title = "الصفحة الرئيسية";
        $sliders=Slider::where('status',1)->get();
        foreach($sliders as $slider){
            $slider->image=asset('uploaded/' . $slider->image);
        }
        $buyer=Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
        $message="";
        $user=Auth::user();
        if($user){
            if($user->role_id==$buyer->id&&$user->message_status==0){
                $buyers_message=Setting::where('key','buyers_message')->first();
                if($buyers_message){
                    $message=$buyers_message->value;
                }
            }
        }
        return view('welcome', compact('title','sliders','message'));
    }
    public function change_message_status(Request $request){
        $user=User::find(Auth::user()->id);
        $user->message_status=1;
        $user->save();
        return response()->json([
            'success' => true,
        ]);
    }
}
