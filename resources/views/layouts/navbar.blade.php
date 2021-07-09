
<nav class="navbar navbar-expand-lg navbar-bg-white">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{ route('home') }}">
            <img src="{{ URL::asset('resources/assets/images/logo.png') }}" class="img-fluid logo" alt="Logo">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <form action="{{ route('search') }}" method="get" class="search" id="search">
                <input type="text" name="q" placeholder="ابحث  عن المنتج الذي تريده">
                <div class="search-icon">
                    <img src="{{ URL::asset('resources/assets/images/search.png') }}" class="img-fluid" alt="">
                </div>
            </form>
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                @auth
                <?php $user = auth()->user(); ?>
                @if ($user->role_id!=null)
                <li class="nav-item dropdown notifications">
                    <a id="notification_btn" class="nav-link notifications dropdown-toggle position-relative" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="{{ URL::asset('resources/assets/images/notifications.png') }}" alt="">
                        <span id="notification_count"></span>
                    </a>

                    <ul id="notifications" class="dropdown-menu" aria-labelledby="navbarDropdown">
                        
                    </ul>
                </li>
                @endif
                @if ($user->role_id!=1)
                <li class="nav-item favorite ">
                    <a class="nav-link" href="{{ route('wish-list') }}" role="button">
                        <img src="{{ URL::asset('resources/assets/images/valentines-heart.png') }}" alt="">
                    </a>
                </li>
                @endif


                @if ($user->role_id == null)
                <li class="nav-item dropdown profile-name notifications iconMessage">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        <i class="fas fa-envelope icon-messages"></i>
                        <span class="count_messages" id="counter_messages">{{ App\Http\Controllers\MessageController::unread_msg() }}</span>
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        @foreach (App\Http\Controllers\MessageController::get_all_messages() as $message)
                        <li><a class="dropdown-item open-message @if ($message->msg_status == 0) msg-unread @endif" href="#" data-id="{{ $message->m_id }}"
                                data-message="{{ $message->content }}">{{ $message->subject }}</a></li>
                        @endforeach
                    </ul>
                </li>
                @endif
                @endauth

                @guest
                <li class="nav-item"></li>
                <li class="nav-item btn-login-home">
                    <a href="{{ route('login') }}">تسجيل الدخول</a>
                </li>
                <li class="nav-item btn-register-home">
                    <a href="#" class="register">حساب جديد</a>

                </li>
                @endguest
                @auth
                <?php $user = auth()->user(); ?>
                <li class="nav-item dropdown profile-name">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                        data-bs-toggle="dropdown" aria-expanded="false">
                        {{ $user->name }}
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <li> <a class="dropdown-item"
                                href="{{$user->role_id==1?route('admin'):($user->role_id==2?route('buyer'):route('user_profile'))}}"><i
                                    class="fas fa-user-alt pe-2 "></i> حسابي </a></li>
                        <li>
                            <a href="#" class="logout dropdown-item"><i class="fas fa-sign-out-alt pe-2"></i> تسجيل
                                الخروج</a>
                        </li>
                    </ul>
                </li>
                @endauth
            </ul>

        </div>
    </div>
</nav>