{{-- <form method="POST" action="{{ route('register') }}">
    @csrf

    <div>
        <x-jet-label for="name" value="{{ __('Name') }}" />
        <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
    </div>

    <div class="mt-4">
        <x-jet-label for="email" value="{{ __('Email') }}" />
        <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
    </div>

    <div class="mt-4">
        <x-jet-label for="password" value="{{ __('Password') }}" />
        <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
    </div>

    <div class="mt-4">
        <x-jet-label for="password_confirmation" value="{{ __('Confirm Password') }}" />
        <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
    </div>

    @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
        <div class="mt-4">
            <x-jet-label for="terms">
                <div class="flex items-center">
                    <x-jet-checkbox name="terms" id="terms"/>

                    <div class="ml-2">
                        {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Terms of Service').'</a>',
                                'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-900">'.__('Privacy Policy').'</a>',
                        ]) !!}
                    </div>
                </div>
            </x-jet-label>
        </div>
    @endif

    <div class="flex items-center justify-end mt-4">
        <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
            {{ __('Already registered?') }}
        </a>

        <x-jet-button class="ml-4">
            {{ __('Register') }}
        </x-jet-button>
    </div>
</form> --}}


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>register Page</title>
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
                        <img src="{{URL::asset('resources/assets/images/right-img-auth.png')}}" class="img-fluid"
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

                        <form method="POST" action="{{ route('register') }}">
                            @csrf
                            <h3>انشاء حساب كتاجر</h3>
                            <div class="form-group">
                                <input type="text" name="text" placeholder="الاسم" required />
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" placeholder="البريد الإلكتروني" required />
                            </div>
                            <div class="form-group">
                                <input type="number" name="number" placeholder="رقم التجوال" required />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="كلمة المرور" required />
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" placeholder="تاكيد كلمة المرور" required />
                            </div>
                            <button type="submit" class="fixed-style-btn btn">تسجيل الدخول</button>
                            <p class="dt-acc">هل لديك حساب ! <a href="{{route('login')}}" class="create-acc">سجل الان</a></p>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js"
        integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous">
    </script>
    <script src="{{ URL::asset('resources/assets/js/custom.js') }}"></script>

</body>

</html>

