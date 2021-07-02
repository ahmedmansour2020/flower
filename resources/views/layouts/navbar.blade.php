
<nav class="navbar navbar-expand-lg navbar-bg-white">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ URL::asset('resources/assets/images/logo.png') }}" class="img-fluid logo" alt="Logo">
    </a>
    <a href="{{ route('home') }}" class="link-home">الرئيسية</a>
    <form action="{{route('search')}}" method="get" class="search" id="search">
        <input type="text" name="q" placeholder="ابحث  عن المنتج الذي تريده">
        <div class="search-icon">
            <img src="{{ URL::asset('resources/assets/images/search.png') }}" class="img-fluid" alt="">
        </div>
    </form>
    <ul>

        <li class="nav-item dropdown notifications">
            <a class="nav-link notifications dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ URL::asset('resources/assets/images/notifications.png') }}" alt="">
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li> <a class="dropdown-item" href="#">تم التسجيل في الموقع بنجاح</a> </li>
                <li> <a class="dropdown-item" href="#">تم التسجيل في الموقع بنجاح</a> </li>
            </ul>
        </li>


        <li class="nav-item favorite ">
            <a class="nav-link" href="{{route('wish-list')}}" role="button">
                <img src="{{ URL::asset('resources/assets/images/valentines-heart.png') }}" alt="">
            </a>
        </li>


        @auth
        <?php 
        $user=auth()->user();
        ?>
        @if($user->role_id==null)
        <li class="nav-item dropdown profile-name notifications">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                aria-expanded="false">
                <i class="fas fa-envelope icon-messages"></i>
                <span>{{App\Http\Controllers\MessageController::unread_msg()}}</span>
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            @foreach(App\Http\Controllers\MessageController::get_all_messages() as $message)
                <li><a class="dropdown-item open-message @if($message->msg_status==0)  msg-unread @endif" href="#" data-id="{{$message->m_id}}" data-message="{{$message->content}}">{{$message->subject}}</a></li>
            @endforeach
            </ul>
        </li>
        @endif
        @endauth

        @guest
        <li class="nav-item btn-login-home">
            <a href="{{ route('login-data') }}">تسجيل الدخول</a>
        </li>
        <li class="nav-item btn-register-home">
            <a href="{{ route('register') }}">حساب جديد</a>
        </li>
        @endguest
        @auth
        <?php 
        $user=auth()->user();
        ?>
        <li class="nav-item dropdown profile-name">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                {{$user->name}}
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li> <a class="dropdown-item" href="#"><i class="fas fa-user-alt pe-2 "></i> حسابي </a></li>
        <li >
            <a href="#" class="logout dropdown-item"><i class="fas fa-sign-out-alt pe-2"></i> تسجيل الخروج</a>
        </li>
            </ul>
          </li>
        @endauth
    </ul>
    <!-- <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        dir="ltr">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <p>"لوريم ايبسوم دولار سيت أميت ,كونسيكتيتور أدايبا يسكينج أليايت,سيت دو أيوسمود تيمبور
                    </p>
                </div>
                <div class="modal-footer btn-map">
                    <button type="button" data-bs-toggle="modal" data-bs-target="#contactUs">تواصل معنا</button>
                </div>
            </div>
        </div>
    </div>



    <div class="modal fade" id="contactUs" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
        dir="ltr">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body ">
                    <form action="" method="">
                        @csrf
                        <div class="form-group">
                            <input type="email" class="w-100 d-block text-end" placeholder="البريد الالكترونى">
                            <input type="text" class="w-100 d-block text-end" placeholder="العنوان">
                            <textarea name="" id="" cols="30" class="w-100 d-block text-end"
                                placeholder="الرساله"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer btn-map">
                    <button type="button">ارسال</button>
                </div>
            </div>
        </div>
    </div> -->
</nav>
