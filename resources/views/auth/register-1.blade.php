@extends('layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')
<div class="col-sm-8 mx-auto">
    <form action="" method="POST" class="create-acc-vendor mt-5">

        @csrf

        <h2>انشاء حساب كتاجر</h2>

        <div class="form-group">
            <input type="text" placeholder="اسم المتجر" required/><span class="required mr-2 text-danger">*</span>
        </div>
        <div class="form-group">
            <input type="number" placeholder="رقم التواصل" required/><span class="required mr-2 text-danger">*</span>
        </div>
        <div class="form-upload">
            <input type="text" placeholder="شعار المتجر" id="image-label" required/>
            <input type="file" class="d-none" id="image">
            <button type="button" class="image-upload" id="image-btn">تحميل الصوره</button>
            <span class="required mr-2 text-danger">*</span>
        </div>
        <div class="form-upload">
            <input type="text" placeholder="لوحة المتجر" required/>
            <input type="file" class="d-none">
            <button class="image-upload">تحميل الصوره</button>
        </div>
        <div class="form-group">
            <input type="text" placeholder="الموقع" required/><span class="required mr-2 text-danger">*</span>
        </div>
        <div class="form-group">
            <input type="text" placeholder="الواتس اب">
        </div>
        <div class="form-group">
            <input type="text" placeholder="اسناب شات">
        </div>
        <div class="form-group">
            <input type="text" placeholder="الانستغرام">
        </div>
        <div class="form-group">
            <input type="text" placeholder="توتير">
        </div>
        <div class="form-group">
            <input type="text" placeholder="الفيس بوك">
        </div>
        <div class="form-group">
            <input type="text" placeholder="تيك توك" >
        </div>

    </form>
</div>





@endsection
