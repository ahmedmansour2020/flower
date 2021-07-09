<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use App\Models\Product;
use App\Models\Setting;
use App\Models\Notification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\NotificationController;

class AdminController extends Controller
{
    public function all_shops()
    {
        $title = 'كل المتاجر';
        if (request()->ajax()) {
            $buyer = Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
            $shops = User::where('role_id', $buyer->id)->select('users.*',DB::raw('date(membership_date_to) as membership_date_to'))->orderBy('membership_status', 'asc')->orderBy('id', 'desc')->get();
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
            $user->membership_date_from=date('Y-m-d H:i:s');
            $user->membership_date_to=date('Y-m-d H:i:s', strtotime('+1 years'));;
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
        $admin_phone = Setting::where('key', 'admin_phone')->first();
        return view('admin/show/setting-pages', compact('title', 'who_we_are', 'buyers_message','admin_phone'));
    }
    public function save_settings(Request $request)
    {
        Setting::where('type', 'data')->delete();

        if ($request->admin_phone) {
            $admin_phone = new Setting();
            $admin_phone->type = 'data';
            $admin_phone->key = 'admin_phone';
            $admin_phone->value = $request->admin_phone;
            $admin_phone->save();
        }

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
    public function statistics(){
        $title='احصائيات';
        $buyer=Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
        $shops=count(User::where('role_id',$buyer->id)->where('status',1)->get());
        $products=count(Product::get());
        return view('admin/show/statistics',compact('shops','products','title'));
    }

    public function change_password(Request $request){
        $password=$request->password;
        $id=$request->id;

        $user=User::find($id);
        $user->password=Hash::make($password);
        $user->save();

        return response()->json([
            'success'=>true,
        ]);
    }
    public static function change_buyer_membership_status_auto(){
        $date=date('Y-m-d');
        $users=User::where('membership_status',1)->where(DB::raw('date(membership_date_to)'),'<',$date)->get();
        foreach($users as $item){
            $user=User::find($item->id);
            $user->membership_status=0;
            $user->save();
        }
        $near=User::where('membership_status',1)->where(DB::raw('date(membership_date_to)-date(NOW())'),'<',5)->get();
        foreach ($near as $item){
            $n=Notification::where('user_id',$item->id)->where('content','like','%'.date('Y-m-d',strtotime($item->membership_date_to)).'%')->first();
            if(!$n){
                NotificationController::add_notification($item->id,'تذكير بموعد تجديد الاشتراك في '.date('Y-m-d',strtotime($item->membership_date_to)),"#");
            }
        }

    }
}
