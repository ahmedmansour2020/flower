@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('variables')
<?php $register_1=true; ?>
@endsection
@section('content')

    <!-- <div class="container">
        <div class="row">
            <div class="col-sm-8 mx-auto"> -->
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
                        <input type="text" placeholder="تويتر" name="buyer_twitter">
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
            <!-- </div>
        </div>
    </div> -->

    @endsection

