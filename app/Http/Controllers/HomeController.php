<?php

namespace App\Http\Controllers;

use App\Models\Slider;

class HomeController extends Controller
{
    public function to_home()
    {
        $title = "الصفحة الرئيسية";
        $sliders=Slider::where('status',1)->get();
        foreach($sliders as $slider){
            $slider->image=asset('uploaded/' . $slider->image);
        }
        return view('welcome', compact('title','sliders'));
    }
}
