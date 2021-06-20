<aside class="navbar-right">
    <div class="sidebar">
        <nav class="mt-2">
            <a href="{{ route('store-data') }}" class="link-sub-nav {{(request()->segment(2) == 'store-data') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/icon-data.png')}}" class="img-fluid" alt=""> بيانات المتجر

                </div>
            </a>
            <a href="{{ route('product.index') }}" class="link-sub-nav {{(request()->segment(1) == 'product') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/shopping-bag.png')}}" class="img-fluid" alt=""> المنتجات

                </div>
            </a>
            <a href="{{ route('product.create') }}" class="link-sub-nav {{(request()->segment(1) == 'product') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/icon-add-product.png')}}" class="img-fluid" alt=""> إضافة منتج

                </div>
            </a>
            <a href="{{ route('login-data') }}" class="link-sub-nav {{(request()->segment(2) == 'login-data') ? 'active' : ''}}">
                <div class="sub-nav">
                    <img src="{{URL::asset('resources/assets/images/icon-data.png')}}" class="img-fluid" alt=""> بيانات الدخول

                </div>
            </a>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingTwo">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                        <img src="{{ URL::asset('resources/assets/images/icon-mail.png') }}" alt="">
                        البريد
                    </button>
                </h2>
                <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <a href="{{ route('mail-messages') }}"
                            class="accordion-body accordion-dropdown  {{ request()->segment(1) == 'incoming-mail?mail-messages=new' ? 'accordion-active' : '' }}">رسائل
                            جديده</a>
                        <a href="{{ route('incoming-mail') }}"
                            class="accordion-body accordion-dropdown  {{ request()->segment(1) == 'incoming-mail' ? 'accordion-active' : '' }}">البريد
                            الوارد</a>
                        <a href="{{ route('writing-messages') }}"
                            class="accordion-body accordion-dropdown  {{ request()->segment(1) == 'writing-messages' ? 'accordion-active' : '' }}">كتابة
                            رساله</a>
                    </div>
                </div>
            </div>
            <a href="#" class="link-sub-nav logout">
                <div class="sub-nav text-danger">
                    <img src="{{URL::asset('resources/assets/images/icon-exit.png')}}" class="img-fluid" alt=""> تسجيل الخروج

                </div>
            </a>

        </nav>
    </div>

</aside>
