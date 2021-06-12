<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public static function get_login_image(){
        $image=Setting::where('key','login_image')->first();
        if($image){
            return asset('uploaded/'.$image->value);
        }else{
            return null;
        }
    }
}
