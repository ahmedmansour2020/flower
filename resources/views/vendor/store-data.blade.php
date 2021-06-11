@extends(isset($from)?'dashboard-layouts.layout-admin':'dashboard-layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')


<div class="col-sm-8 mx-auto">
    <form action="{{ route('save_buyer_info') }}" method="POST" class="create-acc-vendor store-data mt-5"
        enctype="multipart/form-data">

        @csrf
        <input type="hidden" name="edit" value="edit">
        <input type="hidden" name="id" value="{{isset($from)?$user->id:0}}">

        <div class="form-group">
            <input type="text" placeholder="اسم المتجر" name="buyer_name" value="{{$user->buyer_name}}" required />
            <button type="button" class="btn edit-data">تعديل</button>
        </div>
        <div class="form-group">
            <input type="text" placeholder="رقم التواصل" name="mobile" value="{{$user->buyer_mobile}}" required />
            <button type="button" class="btn edit-data">تعديل</button>

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
            <input type="text" placeholder="الموقع" required name="buyer_site" value="{{$user->buyer_site}}" />
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" placeholder="الواتس اب" name="buyer_whatsapp" value="{{$user->buyer_whatsapp}}">
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" placeholder="اسناب شات" name="buyer_snapshat" value="{{$user->buyer_snapshat}}">
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" placeholder="الانستغرام" name="buyer_instagram" value="{{$user->buyer_instagram}}">
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" placeholder="توتير" name="buyer_twitter" value="{{$user->buyer_twitter}}">
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" placeholder="الفيس بوك" name="buyer_facebook" value="{{$user->buyer_facebook}}">
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" placeholder="تيك توك" name="buyer_tiktok" value="{{$user->buyer_tiktok}}">
            <button type="button" class="btn edit-data">تعديل</button>

        </div>
        <div class="form-group">
            <button type="submit" class="btn fixed-style-btn w-25 m-auto mb-3 mt-2">حفظ</button>
        </div>
    </form>
</div>


@endsection