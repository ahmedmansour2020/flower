<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function all_shops()
    {
        $title = 'كل المتاجر';
        if (request()->ajax()) {
            $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
            $shops = User::where('role_id', $buyer->id)->orderBy('id', 'desc')->get();
            return datatables()->of($shops)->addIndexColumn()->make(true);
        }
        return view('admin/show/all-shops', compact('title'));
    }
    public function change_buyer_membership_status(Request $request)
    {
        $id = request('id');
        $user = User::find($id);
        if ($user->membership_status == 0) {
            $user->membership_status = 1;
        } else {
            $user->membership_status = 0;
        }
        $user->save();

        return response()->json([
            'success' => true,
        ]);
    }
    public function edit_user_data($id)
    {$title = "بيانات المتجر";
        $user = User::find($id);
        $from = 'admin';
        return view('vendor/store-data', compact('user', 'title', 'from'));
    }
    public function settings()
    {

        $title = 'إعدادات الموقع الالكتروني';
        $buyers_message = Setting::where('key', 'buyers_message')->first();
        $who_we_are = Setting::where('key', 'who_we_are')->first();
        return view('admin/show/setting-pages', compact('title', 'who_we_are', 'buyers_message'));
    }
    public function save_settings(Request $request)
    {
        Setting::where('type', 'data')->delete();

        if ($request->buyers_message) {
            $buyers_message = new Setting();
            $buyers_message->type = 'data';
            $buyers_message->key = 'buyers_message';
            $buyers_message->value = $request->buyers_message;
            $buyers_message->save();
        }

        if ($request->who_we_are) {
            $who_we_are = new Setting();
            $who_we_are->type = 'data';
            $who_we_are->key = 'who_we_are';
            $who_we_are->value = $request->who_we_are;
            $who_we_are->save();
        }
        if ($request->hasFile('login_image')) {
            Setting::where('key', 'login_image')->delete();
            $login_image = new Setting();
            $login_image->type = 'images';
            $login_image->key = 'login_image';
            $file_extension = request('login_image')->getClientOriginalExtension();
            $file_name = "login_image-" . time() . '.' . $file_extension;
            $path = 'uploaded/';
            $request->login_image->move($path, $file_name);
            $login_image->value = $file_name;
            $login_image->save();
        }

        return redirect()->back()->with('success', 'تم حفظ البيانات بنجاح');
    }
    public function users($type)
    {
        if (request()->ajax()) {
            if ($type == 'users') {
                $users = User::whereNull('role_id')->get();
            } else {
                $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
                $users = User::where('role_id', $buyer->id)->get();
            }

            return datatables()->of($users)->addIndexColumn()->make(true);

        }
        $title = $type == 'users' ? 'المستخدمون' : 'التجار';
        return view('admin/show/page-vendors', compact('title', 'type'));
    }

    public function delete_user(Request $request){
        $id=request('id');
        Product::where('user_id',$id)->delete();
        User::find($id)->delete();

        return response()->json([
            'success' => true,
        ]);
        
    }
}
