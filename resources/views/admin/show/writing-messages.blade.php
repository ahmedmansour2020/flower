@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('content')


<form action="" method="" class="add-product mt-5 text-center">

    @csrf


    <div class="form-group">
        <input type="text" placeholder="العنوان">
    </div>

    <textarea name="" id="" cols="57" rows="15" class="" placeholder="الرسالة"></textarea>

    <div class="form-upload mt-5">
        <input type="text" placeholder="إضافة مرفق" id="image-label" required readonly/>
        <input type="file" class="d-none" id="image" name="buyer_logo">
        <button type="button" class="image-upload" id="image-btn">اختر الصوره</button>
    </div>

    <select name="" id="" class="select-recipient">
        <option value="" selected disabled>الي</option>
    </select>
</form>


@endsection
