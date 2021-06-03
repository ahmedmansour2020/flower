<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function to_home()
    {
        $title = "الصفحة الرئيسية";
        return view('welcome', compact('title'));
    }
}
