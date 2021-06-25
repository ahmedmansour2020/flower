@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')


<!-- <div id="carouselExampleControlsNoTouching" class="carousel slide" data-bs-touch="false" data-bs-interval="false">
    <div class="carousel-inner">
        <div class="carousel-item position-relative active">
            <img class="d-block w-100" src="{{ URL::asset('resources/assets/images/img_nature_wide.jpg') }}"
                alt="First slide">
        </div>
        <div class="text-slider position-absolute">
            <h3>احصل على طلبك باقل تكلفة</h3>
            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك
            </p>
            <button type="button" class="btn">العروض</button>
        </div>

        <div class="carousel-item position-relative">
            <img class="d-block w-100" src="{{ URL::asset('resources/assets/images/img_mountains_wide.jpg') }}"
                alt="Second slide">
        </div>
        <div class="text-slider position-absolute">
            <h3>احصل على طلبك باقل تكلفة</h3>
            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك
            </p>
            <button type="button" class="btn">العروض</button>
        </div>

        <div class="carousel-item position-relative">
            <img class="d-block w-100" src="{{ URL::asset('resources/assets/images/img_snow_wide.jpg') }}"
                alt="Third slide">
        </div>

        <div class="text-slider position-absolute">
            <h3>احصل على طلبك باقل تكلفة</h3>
            <p>هذا النص هو مثال لنص يمكن أن يستبدل في نفس المساحة، لقد تم توليد هذا النص من مولد النص العربى، حيث يمكنك
            </p>
            <button type="button" class="btn">العروض</button>
        </div>

    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControlsNoTouching"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControlsNoTouching"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div> -->






<div class="container">
    <div class="row">
        <div class="col-12">
            <h2 class="head-home-page mt-5">من نحن</h2>
        </div>

        <div class="about-us mt-5 mb-5">
            <p>{!! $content !!}</p>
        </div>

    </div>
</div>




@endsection




@section('page_js')

<script>
$('.carousel').carousel();
$('.carousel').carousel({
    interval: 5000
});
.carousel('pause');
.carousel('cycle');
</script>
@endsection