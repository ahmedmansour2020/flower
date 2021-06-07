@extends('dashboard-layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')


<div class="col-sm-8 mx-auto">
    <form action="" method="POST" class="create-acc-vendor store-data mt-5"
        enctype="multipart/form-data">

        @csrf


        <div class="form-group">
            <input type="text" placeholder="اسم الدخول" name="" required />
            <button type="button" class="btn edit-data">تعديل</button>
        </div>
        <div class="form-group">
            <input type="email" placeholder="البريد الالكترونى" name="" required />
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" placeholder="رقم الجوال" required name="" />
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <input type="password" placeholder="كلمة المرور" name="">
            <button type="button" class="btn edit-data">تعديل</button>

        </div>

        <div class="form-group">
            <button type="submit" class="btn fixed-style-btn w-25 m-auto mb-3 mt-2">حفظ</button>
        </div>
    </form>
</div>


@endsection
