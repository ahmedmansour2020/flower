<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VisitController extends Controller
{
    public static function record_visit(){
        $visits=Setting::where('key','visits')->first();
        if(!$visits){
            $visits=new Setting();
            $visits->type="session";
            $visits->key="visits";
            $visits->value=0;
            $visits->save();
        }
        if(!request()->session()->exists('flowers')){
            session(['flowers' => 'visit']);
            $visits->value+=1;
            $visits->save();
        }
    }

    public static function count_visits(){
        $visits=Setting::where('key','visits')->first();
        if($visits){
            return $visits->value;
        }else{
            return 0;
        }
    }
}
