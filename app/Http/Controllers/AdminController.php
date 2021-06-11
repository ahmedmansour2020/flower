<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function all_shops(){
        $title='كل المتاجر';
        if(request()->ajax()){
            $buyer=Role::where('name', 'بائع')->orWhere('name', 'buyer')->first();
            $shops=User::where('role_id',$buyer->id)->orderBy('id','desc')->get();
            return datatables()->of($shops)->addIndexColumn()->make(true);
        }
        return view('admin/show/all-shops',compact('title'));
    }
    public function change_buyer_membership_status(Request $request){
        $id=request('id');
        $user=User::find($id);
        if($user->membership_status==0){
            $user->membership_status=1;
        }else{
            $user->membership_status=0;
        }
        $user->save();

        return response()->json([
            'success'=>true
        ]);
    }
    public function edit_user_data($id)
    {$title = "بيانات المتجر";
        $user = User::find($id);
        $from='admin';
        return view('vendor/store-data', compact('user', 'title','from'));
    }
}
