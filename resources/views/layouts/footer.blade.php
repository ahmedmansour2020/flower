<footer>
    <div class="container">
        <div class="row">
            <div class="col-sm-6 col-md-4">
                <a href="{{ route('home') }}">
                    <img src=" {{ URL::asset('resources/assets/images/logo.png') }}" class="img-fluid" alt="">
                </a>
            </div>
            <div class="col-sm-3 col-md-2">
                <h4 class="title-footer">الصفحات</h4>
                <ul class="list-footer">
                    <li><a href="{{ route('home') }}">الرئسية</a></li>
                    <li><a href="{{route('all_offers')}}">العروض</a></li>
                    <li><a href="#">جديد</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-md-2">
                <h4 class="title-footer">حسابى</h4>
                <ul class="list-footer">
                    <li><a href="{{ route('login-data') }}">تسجيل الدخول</a></li>
                    <li><a href="{{ route('register') }}">انشاء حساب</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-md-2">
                <h4 class="title-footer">الأكثر بحث</h4>
                <ul class="list-footer">
                    <li><a href="#">بوكيه</a></li>
                    <li><a href="#">بالونات</a></li>
                    <li><a href="#">كوش افراح</a></li>
                </ul>
            </div>
            <div class="col-sm-3 col-md-2">
                <h4 class="title-footer text-center">طرق التواصل</h4>
                <ul class="list-footer text-center">
                    <li>
                        <a href="#">
                            <img src="{{ URL::asset('resources/assets/images/icon-whatsapp.png') }}" class="img-fluid" alt="">
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

</footer>
