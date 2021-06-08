@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('content')


<form action="" method="" class="add-product mt-5 text-center">

    @csrf


    <div class="form-upload mt-5">
        <input type="text" placeholder="تعديل صوره تسجيل الدخول" id="image-label" required readonly/>
        <input type="file" class="d-none" id="image" name="buyer_logo">
        <button type="button" class="image-upload" id="image-btn">اختر الصوره</button>
    </div>
    <div class="container-image-login"></div>


    <div class="form-upload">
        <input type="text" placeholder="تعديل صوره الاعلان" id="image-label" required readonly/>
        <input type="file" class="d-none" id="image" name="buyer_logo">
        <button type="button" class="image-upload" id="image-btn">اختر الصوره</button>
    </div>
    <div class="container-images-ads"></div>

    <textarea name="" id="" cols="57" rows="6" class="" placeholder="تعديل رسالة التجار"></textarea>
    <textarea name="" id="" cols="57" rows="6" placeholder="تعديل صفحة من نحن"></textarea>

</form>


@endsection
