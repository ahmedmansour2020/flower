<?php

namespace App\Http\Controllers;

class HomeController extends Controller
{
    public function to_home()
    {
        return view('welcome');
    }
}
