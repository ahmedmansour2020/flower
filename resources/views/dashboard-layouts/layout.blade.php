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
    var home_url = "{{route('home')}}";
    var admin_url = "{{route('home').'/admin'}}";
    var slider_delete_image = "{{route('slider_delete_image')}}";
    var change_slider_status = "{{route('change_slider_status')}}";
    var language = "https://cdn.datatables.net/plug-ins/1.10.19/i18n/Arabic.json";
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
                @include('dashboard-layouts.navbar-right')
            </div>
            <div class="col-sm-12 col-md-12 col-lg-9">
                <div>
                    @if ($message = Session::get('success'))
                    <div class="alert alert-success w-100 text-center ">
                        {{ $message }}
                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif
                    @if ($message = Session::get('alert'))
                    <div class="alert alert-danger w-100 text-center ">
                        {{ $message }}
                        <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger ">
                        {{ $message }}
                        <button type="button" class="close white-text text-center" data-dismiss="alert"
                            aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    @endif

                    @if($errors->any())
                    <div class="alert alert-danger text-center">
                        <ul>
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div><br />
                    @endif
                </div>
                @yield('content')
            </div>

        </div>

    </div>




    @include('layouts.footer')

    @include('layouts.scripts')
    @yield('page_js')

</body>

</html>