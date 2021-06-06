<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function buyer_register(){
        $from="buyer";
        return view('auth.register',compact('from'));
    }
    public function register_1(){
        return view('auth.register-1');
    }
    public function save_buyer_info(Request $request){
        
        $user=User::find(Auth::user()->id);
        $user->buyer_name=$request->buyer_name;
        $user->buyer_mobile=$request->mobile;
        $user->buyer_site=$request->buyer_site;
        $user->buyer_whatsapp=$request->buyer_whatsapp;
        $user->buyer_snapshat=$request->buyer_snapshat;
        $user->buyer_instagram=$request->buyer_instagram;
        $user->buyer_twitter=$request->buyer_twitter;
        $user->buyer_facebook=$request->buyer_facebook;
        $user->buyer_tiktok=$request->buyer_tiktok;
        $user->status=1;
        
        
        
        if($request->hasfile('buyer_logo')){
            $file_extension = $request->file('buyer_logo')->getClientOriginalExtension();
            $file_name =  "buyer_logo-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->buyer_logo->move($path, $file_name);
            $user->buyer_logo = $file_name;
        }
        
        if($request->hasfile('buyer_banner')){
            $file_extension = $request->file('buyer_banner')->getClientOriginalExtension();
            $file_name =  "buyer_banner-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->buyer_banner->move($path, $file_name);
            $user->buyer_banner = $file_name;
        }
        $user->save();


        return redirect()->route('home')->with('success','تم حفظ البيانات بنجاح');
    }
    public static function get_role_id($role=null){
        $the_role=Role::where('name', $role)->first();
        if($the_role){
            return $the_role->id;
        }else{
            return null;
        }
    }
}
