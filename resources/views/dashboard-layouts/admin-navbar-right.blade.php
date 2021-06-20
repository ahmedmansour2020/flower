<aside class="accordion accordion-flush" id="accordionFlushExample">
    <div class="sidebar card">
        <nav class="mt-2">
            <a href="{{ route('all-shops') }}"
                class="link-sub-nav {{ request()->segment(1) == 'all-shops' ? 'active' : '' }}">
                <div class="sub-nav">
                    <img src="{{ URL::asset('resources/assets/images/icon-shops.png') }}" class="img-fluid" alt="">
                    المتاجر

                </div>
            </a>
            <div class="accordion-item">
                <h2 class="accordion-header" id="flush-headingOne">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                        data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                        <img src="{{ URL::asset('resources/assets/images/icon-users.png') }}" alt="">
                        العملاء
                    </button>
                </h2>
                <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne"
                    data-bs-parent="#accordionFlushExample">
                    <div class="accordion-body">
                        <a href="{{ route('page_user_vendor', 'users') }}"
                            class="accordion-body accordion-dropdown {{ request()->segment(1) == 'page-users' ? 'accordion-active' : '' }}">مستخدم</a>
                        <a href="{{ route('page_user_vendor', 'buyers') }}"
                            class="accordion-body accordion-dropdown {{ request()->segment(1) == 'page-vendors' ? 'accordion-active' : '' }}">تاجر</a>
                    </div>
                </div>
            </div>
            <a href="{{ route('setting-pages') }}"
                class="link-sub-nav {{ request()->segment(1) == 'setting-pages' ? 'active' : '' }}">
                <div class="sub-nav">
                    <img src="{{ URL::asset('resources/assets/images/icon-site.png') }}" class="img-fluid" alt="">
                    الموقع الالكترونى

                </div>
            </a>
            <a href="{{ route('setting.sliders') }}"
                class="link-sub-nav {{ request()->segment(1) == 'settings/sliders' ? 'active' : '' }}">
                <div class="sub-nav">
                    <img src="{{ URL::asset('resources/assets/images/icon-site.png') }}" class="img-fluid" alt="">
                    اعدادات الصفحة الرئيسية

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
            <a href="{{ route('statistics') }}"
                class="link-sub-nav {{ request()->segment(1) == 'statistics' ? 'active' : '' }}">
                <div class="sub-nav">
                    <img src="{{ URL::asset('resources/assets/images/icon-statistics.png') }}" class="img-fluid" alt="">
                    احصائيات

                </div>
            </a>

            <a href="#" class="link-sub-nav logout">
                <div class="sub-nav text-danger">
                    <img src="{{ URL::asset('resources/assets/images/icon-exit.png') }}" class="img-fluid" alt="">
                    تسجيل الخروج

                </div>
            </a>

        </nav>
    </div>
</aside>