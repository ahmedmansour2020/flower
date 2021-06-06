<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register_1(){
        return view('auth.register-1');
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
