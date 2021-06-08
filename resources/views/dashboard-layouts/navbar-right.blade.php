<aside class="navbar-right">
    <div class="sidebar">
        <nav class="mt-2">
            <a href="{{ route('store-data') }}" class="link-sub-nav {{(request()->segment(1) == 'store-data') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/icon-data.png')}}" class="img-fluid" alt=""> بيانات المتجر

                </div>
            </a>
            <a href="{{ route('product.index') }}" class="link-sub-nav {{(request()->segment(1) == 'product') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/shopping-bag.png')}}" class="img-fluid" alt=""> المنتجات

                </div>
            </a>
            <a href="{{ route('product.create') }}" class="link-sub-nav {{(request()->segment(1) == 'add-product') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/icon-add-product.png')}}" class="img-fluid" alt=""> إضافة منتج

                </div>
            </a>
            <a href="{{ route('login-data') }}" class="link-sub-nav {{(request()->segment(1) == 'login-data') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/icon-data.png')}}" class="img-fluid" alt=""> بيانات الدخول

                </div>
            </a>
            <a href="#" class="link-sub-nav logout">
                <div class="sub-nav text-danger">
                    <img src="{{URL::asset('resources/assets/images/icon-exit.png')}}" class="img-fluid" alt=""> تسجيل الخروج

                </div>
            </a>

        </nav>
    </div>

</aside>
