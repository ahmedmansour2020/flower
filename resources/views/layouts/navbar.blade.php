<nav class="navbar navbar-expand-lg navbar-bg-white">
    <a class="navbar-brand" href="#">
        <img src="{{ URL::asset('resources/assets/images/logo.png') }}" class="img-fluid" alt="Logo">
    </a>
    <a href="#" class="link-home">الرئيسية</a>
    <form action="" class="search">
        <input type="text" placeholder="ابحث  عن المنتج الذي تريده">
        <div class="search-icon">
            <img src="{{ URL::asset('resources/assets/images/search.png') }}" class="img-fluid" alt="">
        </div>
    </form>
    <ul>
        <li class="nav-item notifications  dropdown">
            <a class="nav-link notifications dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ URL::asset('resources/assets/images/notifications.png') }}" alt="">
            </a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                <a class="dropdown-item" href="#">Action</a>
                <a class="dropdown-item" href="#">Another action</a>
            </div>
        </li>
        <li class="nav-item  dropdown">
            <a class="nav-link favorite dropdown-toggle" href="#" id="navbarDropdown" role="button"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <img src="{{ URL::asset('resources/assets/images/valentines-heart.png') }}" alt="">
            </a>
        </li>

    </ul>
</nav>
