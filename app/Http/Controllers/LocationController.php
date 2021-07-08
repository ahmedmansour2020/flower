<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;

class LocationController extends Controller
{
   public static function getCities(){
       return City::orderBy('name', 'ASC')->get();
   }
}
