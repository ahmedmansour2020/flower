<?php 
use App\Http\Controllers\VisitController;
VisitController::record_visit();
App\Http\Controllers\AdminController::change_buyer_membership_status_auto();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('layouts.header')
    @yield('page_css')
    <script>
    var home_url = "{{route('home')}}";
    </script>
</head>

<body>
    <form hidden method="post" action="{{ route('logout')}}">
        {{ csrf_field() }} 
        <button type="submit" id="logout"></button>
    </form>
    @include("layouts.navbar")
    @auth
    @if(auth()->user()->role_id==2&&auth()->user()->status==0)
    <div class="w-100 m-0 p-3 text-center alert-success border">
        برجاء إدخال بيانات المتجر للتمكن من الدخول إلى لوحة التحكم
        <a href="{{route('register_1')}}">اضغط هنا</a>
    </div>
    @endif
    @endauth
    @include("layouts.nav-header")

    @if ($message = Session::get('message'))
    <div class="alert alert-success w-100 text-center hidden">
        <div id="get_message"> {{ $message }}</div>
        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div>
    @endif

    @yield('content')






    @include('layouts.footer')
    <input type="hidden" id="current_lng">
    <input type="hidden" id="current_lat">
    @include('layouts.scripts')
    @yield('page_js')

</body>

</html>