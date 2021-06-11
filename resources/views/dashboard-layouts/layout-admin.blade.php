<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    @include('dashboard-layouts.header')
    @yield('page_css')
    <script>
    var admin_url = "{{route('home').'/admin'}}";
    </script>
</head>

<body>
<form hidden method="post" action="{{ route('logout')}}">
        @csrf
        <button type="submit" id="logout"></button>
    </form>
    @include("dashboard-layouts.navbar")
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-md-12 col-lg-3 ">
                @include('dashboard-layouts.admin-navbar-right')
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9">
                @yield('content')
            </div>

        </div>

    </div>




    @include('layouts.footer')

    @include('layouts.scripts')
    @yield('page_js')

</body>

</html>