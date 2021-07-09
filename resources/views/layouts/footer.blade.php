<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <a href="{{ route('home') }}">
                    <img src=" {{ URL::asset('resources/assets/images/logo.png') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-sm-3 col-md-3">
                <h4 class="title-footer">الصفحات</h4>
                <ul class="list-footer">
                    <li><a href="{{ route('home') }}">الرئيسية</a></li>
                    <li><a href="{{route('all_offers')}}">العروض</a></li>
                    <li><a href="{{route('new-products')}}">جديد</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-md-3">
                <h4 class="title-footer">حسابى</h4>
                <ul class="list-footer">
                    <li><a href="{{ route('login') }}">تسجيل الدخول</a></li>
                    <li>
                        <a href="#" class="register">حساب جديد</a>
    
                    </li>
                </ul>
            </div>
            
            <div class="col-sm-3 col-md-2">
                <h4 class="title-footer text-center">طرق التواصل</h4>
                <ul class="list-footer text-center">
                    <li>
                        <a href=" https://api.whatsapp.com/send?phone=‎+966{{App\Http\Controllers\SettingController::getSettingValue('admin_phone')}}&text=مرحبًا" target="_blank">
                            <img src="{{ URL::asset('resources/assets/images/icon-whatsapp.png') }}" class="img-fluid" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</footer>
