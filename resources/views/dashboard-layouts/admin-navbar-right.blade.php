<aside class="navbar-right" id="accordion">
    <div class="sidebar card">
        <nav class="mt-2">
            <a href="{{ route('all-shops') }}"
                class="link-sub-nav {{ request()->segment(1) == 'all-shops' ? 'active' : '' }}">
                <div class="sub-nav">
                    <img src="{{ URL::asset('resources/assets/images/icon-shops.png') }}" class="img-fluid" alt="">
                    المتاجر

                </div>
            </a>


            <div class="card-header" id="headingOne">
                <h5 class="mb-0">
                    <button class="btn  btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true"
                        aria-controls="collapseOne">
                        <img src="{{ URL::asset('resources/assets/images/icon-users.png') }}" alt="">
                        العملاء
                    </button>
                </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                <div class="card-body">
                    <a href="{{ route('page_user_vendor','users') }}" class="accordion-body accordion-dropdown {{ request()->segment(1) == 'page-users' ? 'accordion-active' : '' }}">مستخدم</a>
                    <a href="{{ route('page_user_vendor','buyers') }}" class="accordion-body accordion-dropdown {{ request()->segment(1) == 'page-vendors' ? 'accordion-active' : '' }}">تاجر</a>
                </div>
            </div>

            <a href="{{ route('setting-pages') }}"
                class="link-sub-nav {{ request()->segment(1) == 'setting-pages' ? 'active' : '' }}">
                <div class="sub-nav">
                    <img src="{{ URL::asset('resources/assets/images/icon-site.png') }}" class="img-fluid" alt="">
                    الموقع الالكترونى

                </div>
            </a>

            <div class="card-header" id="headingTwo">
                <h5 class="mb-0">
                    <button class="btn  btn-link" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true"
                        aria-controls="collapseTwo">
                        <img src="{{ URL::asset('resources/assets/images/icon-mail.png') }}" alt="">
                        البريد
                    </button>
                </h5>
            </div>

            <div id="collapseTwo" class="collapse show" aria-labelledby="headingTwo" data-parent="#accordion">
                <div class="card-body">
                    <a href="{{ route('mail-messages') }}" class="accordion-body accordion-dropdown  {{ request()->segment(1) == 'mail-messages' ? 'accordion-active' : '' }}">رسائل جديده</a>
                    <a href="{{ route('incoming-mail') }}" class="accordion-body accordion-dropdown  {{ request()->segment(1) == 'incoming-mail' ? 'accordion-active' : '' }}">البريد الوارد</a>
                    <a href="{{ route('writing-messages') }}" class="accordion-body accordion-dropdown  {{ request()->segment(1) == 'writing-messages' ? 'accordion-active' : '' }}">كتابة رساله</a>
                </div>
            </div>

            <a href="{{ route('statistics') }}"
                class="link-sub-nav {{ request()->segment(1) == 'statistics' ? 'active' : '' }}">
                <div class="sub-nav">
                    <img src="{{ URL::asset('resources/assets/images/icon-statistics.png') }}" class="img-fluid"
                        alt=""> احصائيات

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
