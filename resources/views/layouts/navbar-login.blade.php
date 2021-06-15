<nav class="navbar navbar-expand-lg navbar-bg-white">
    <a class="navbar-brand" href="{{ route('home') }}">
        <img src="{{ URL::asset('resources/assets/images/logo.png') }}" class="img-fluid logo" alt="Logo">
    </a>
    <a href="{{ route('home') }}" class="link-home">الرئيسية</a>
    <form action="" class="search">
        <input type="text" placeholder="ابحث  عن المنتج الذي تريده">
        <div class="search-icon">
            <img src="{{ URL::asset('resources/assets/images/search.png') }}" class="img-fluid" alt="">
        </div>
    </form>
    <ul>
        <li class="nav-item dropdown notifications">
            <a class="nav-link notifications dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ URL::asset('resources/assets/images/notifications.png') }}" alt="">
            </a>

            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li>                <a class="dropdown-item" href="#">تم التسجيل في الموقع بنجاح</a>              </li>
              <li>                <a class="dropdown-item" href="#">تم التسجيل في الموقع بنجاح</a>              </li>
            </ul>
          </li>
        <li class="nav-item favorite ">
            <a class="nav-link" href="#" role="button">
                <img src="{{ URL::asset('resources/assets/images/valentines-heart.png') }}" alt="">
            </a>
        </li>
        <li class="nav-item dropdown profile-name">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                معتز سمير
            </a>
            <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
              <li> <a class="dropdown-item" href="#"><i class="fas fa-user-alt pe-2 "></i>حسابي </a></li>
            </ul>
          </li>

    </ul>
</nav>
