@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('content')


<form action="{{route('save_settings')}}" method="POST" class="add-product mt-5 text-center" enctype="multipart/form-data">

    {{ csrf_field() }} 
<div class="form-group mt-5">
    <input type="text" placeholder="رقم التواصل" required name="admin_phone" value="{{isset($admin_phone)?$admin_phone->value:''}}">
</div>

    <div class="form-upload">
        <input type="text" placeholder="تعديل صوره تسجيل الدخول" id="image-label" required readonly/>
        <input type="file" class="d-none" id="image" name="login_image">
        <button type="button" class="image-upload" id="image-btn">اختر الصوره</button>
    </div>
    <div class="container-image-login"></div>



    <textarea name="buyers_message" id="" cols="57" rows="6" class="" placeholder="تعديل رسالة التجار">{{isset($buyers_message)?$buyers_message->value:''}}</textarea>
    <textarea name="who_we_are" id="" cols="57" rows="6" placeholder="تعديل صفحة من نحن">{{isset($who_we_are)?$who_we_are->value:''}}</textarea>
    <div class="form-group">
            <button type="submit" class="btn fixed-style-btn w-25 m-auto mb-3 mt-2">حفظ</button>
        </div>
</form>


@endsection
