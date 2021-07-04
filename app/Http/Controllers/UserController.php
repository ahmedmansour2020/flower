<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function buyer_register()
    {
        $from = "buyer";
        return view('auth.register', compact('from'));
    }
    public function register_1()
    {
        $title="إكمال بيانات المتجر";
        return view('auth.register-1',compact('title'));
    }
    public function edit_user_data()
    {$title = "بيانات المتجر";
        $user = Auth::user();
        return view('vendor/store-data', compact('user', 'title'));
    }
    public function save_buyer_info(Request $request)
    {
        $id=$request->id;
        if($id!=0){
            $user = User::find($id);
        }else{
            $user = User::find(Auth::user()->id);
        }

        $user->buyer_name = $request->buyer_name;
        $user->buyer_mobile = $request->mobile;
        $user->buyer_site = $request->buyer_site;
        $user->buyer_whatsapp = $request->buyer_whatsapp;
        $user->buyer_snapshat = $request->buyer_snapshat;
        $user->buyer_instagram = $request->buyer_instagram;
        $user->buyer_twitter = $request->buyer_twitter;
        $user->buyer_facebook = $request->buyer_facebook;
        $user->buyer_tiktok = $request->buyer_tiktok;
        if (request('edit') == null) {
            $user->status = 1;
        }

        if ($request->hasfile('buyer_logo')) {
            $file_extension = $request->file('buyer_logo')->getClientOriginalExtension();
            $file_name = "buyer_logo-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->buyer_logo->move($path, $file_name);
            $user->buyer_logo = $file_name;
        }

        if ($request->hasfile('buyer_banner')) {
            $file_extension = $request->file('buyer_banner')->getClientOriginalExtension();
            $file_name = "buyer_banner-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->buyer_banner->move($path, $file_name);
            $user->buyer_banner = $file_name;
        }
        $user->save();

        if (request('edit')) {
            return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');
        } else {
            return redirect()->route('buyer')->with('success', 'تم حفظ البيانات بنجاح');
        }
    }
    public static function get_role_id($role = null)
    {
        $the_role = Role::where('name', $role)->first();
        if ($the_role) {
            return $the_role->id;
        } else {
            return null;
        }
    }
    public function user_info()
    {
        $user = Auth::user();
        $title = "بيانات الدخول";
        return view('vendor/login-data', compact('user', 'title'));
    }
    public function change_user_info(Request $request)
    {
        $user = Auth::user();
        $user->name = $request->name;
        $email = User::where('id', '<>', $user->id)->where('email', $request->email)->first();
        if (!$email) {
            $user->email = $request->email;
        } else {
            return redirect()->back()->with('alert', 'البريد الإلكتروني مسجل لحساب آخر');
        }
        $mobile = User::where('id', '<>', $user->id)->where('mobile', $request->mobile)->first();
        if (!$mobile) {
            $user->mobile = $request->mobile;
        } else {
            return redirect()->back()->with('alert', 'رقم الجوال مسجل لحساب آخر');
        }
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();
        return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');
    }
}
