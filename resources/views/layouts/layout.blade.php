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

</head>

<body>

    @include("layouts.navbar")
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
    @include('layouts.scripts')
    @yield('page_js')

</body>

</html>
