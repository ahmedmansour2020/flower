<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/8.0.1/normalize.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ URL::asset('resources/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('resources/assets/css/media.css') }}">

</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-bg-white">
        <a class="navbar-brand" href="#">
            <img src="{{ URL::asset('resources/assets/images/logo.png') }}" class="img-fluid logo" alt="Logo">
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
                    <a class="dropdown-item" href="#">تم التسجيل في الموقع بنجاح</a>
                    <a class="dropdown-item" href="#">تم تغير كلمة المرور بنجاح</a>
                </div>
            </li>
            <li class="nav-item favorite ">
                <a class="nav-link" href="#" role="button">
                    <img src="{{ URL::asset('resources/assets/images/valentines-heart.png') }}" alt="">
                </a>
            </li>
            <li class="nav-item dropdown profile-name">
                <a class="nav-link  dropdown-toggle d-inline-block " href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    معتز سمير
                </a>

                <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
                    <a class="dropdown-item" href="#"><i class="fas fa-user-alt pl-2 "></i>حسابي </a>
                </div>
            </li>

        </ul>
    </nav>

    <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto">
                <form action="{{ route('save_buyer_info') }}" method="POST" class="create-acc-vendor mt-5"
                    enctype="multipart/form-data">

                    @csrf

                    <h2>انشاء حساب كتاجر</h2>

                    <div class="form-group">
                        <input type="text" placeholder="اسم المتجر" name="buyer_name" required /><span
                            class="required mr-2 text-danger">*</span>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="رقم التواصل" name="mobile" required /><span
                            class="required mr-2 text-danger">*</span>
                    </div>
                    <div class="form-upload">
                        <input type="text" placeholder="شعار المتجر" id="image-label" required readonly />
                        <input type="file" class="d-none" id="image" name="buyer_logo">
                        <button type="button" class="image-upload" id="image-btn">تحميل الصوره</button>
                        <span class="required mr-2 text-danger">*</span>
                    </div>
                    <div class="form-upload">
                        <input type="text" placeholder="لوحة المتجر" id="image-label1" readonly required />
                        <input type="file" class="d-none" id="image1" name="buyer_banner">
                        <button type="button" class="image-upload" id="image-btn1">تحميل الصوره</button>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="الموقع" required name="buyer_site" /><span
                            class="required mr-2 text-danger">*</span>
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="الواتس اب" name="buyer_whatsapp">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="اسناب شات" name="buyer_snapshat">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="الانستغرام" name="buyer_instagram">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="توتير" name="buyer_twitter">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="الفيس بوك" name="buyer_facebook">
                    </div>
                    <div class="form-group">
                        <input type="text" placeholder="تيك توك" name="buyer_tiktok">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn fixed-style-btn w-25 m-auto mb-3 mt-2">حفظ</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="{{ URL::asset('resources/assets/js/custom.js') }}"></script>

</body>


</html>

