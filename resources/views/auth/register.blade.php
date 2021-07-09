<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>تسجيل جديد </title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/media.css') }}">

</head>

<body class="body-login">
    <section class="section-login">
        <div class="row p-0 w-100">
            <div class="col-sm-12 col-md-6 p-0">
                <div class="login-leftSide position-relative">
                    <div class="img-leftSide">
                        <img src="{{App\Http\Controllers\SettingController::get_login_image()!=null?App\Http\Controllers\SettingController::get_login_image():URL::asset('resources/assets/images/right-img-auth.png')}}" class="img-fluid"
                            alt="login-image">
                    </div>
                    <div class="desc-text position-absolute">
                        <p class="position-absolute" style=" right: 0; bottom: 75px; ">أقرب ورد</p>
                        <p>لأى مناسبة خاصة لك</p>
                    </div>
                </div>

            </div>
            <div class="col-sm-12 col-md-6">
                <div class="container">
                    <div class="right-side text-right">
                        <div class="logo-login">
                            <img src="{{URL::asset('resources/assets/images/logo.png')}}" class="img-fluid" alt="logo">
                        </div>
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
                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <input type="hidden" name="role_id" value="{{App\Http\Controllers\UserController::get_role_id(isset($from)?'buyer':'')}}"/>
                            @if(isset($from))
                            <h3>انشاء حساب كتاجر</h3>
                            @else
                            <h3>انشاء حساب كمستخدم</h3>
                            @endif
                            <div class="form-group">
                                <input type="text" name="name" placeholder="الاسم" required />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="البريد الإلكتروني" required />
                            </div>
                            <div class="form-group">
                                <input type="text" name="mobile" placeholder="رقم الجوال" required />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="كلمة المرور" required />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password_confirmation" placeholder="تاكيد كلمة المرور" required />
                            </div>
                            <button type="submit" class="fixed-style-btn btn">تسجيل الدخول</button>
                            <p class="dt-acc">هل لديك حساب ! <a href="{{route('login')}}" class="create-acc">سجل الان</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('resources/assets/js/custom.js') }}"></script>

</body>

</html>

