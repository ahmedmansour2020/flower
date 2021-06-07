@extends('dashboard-layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')


<form action="" method="POST" class="add-product mt-5 text-center" enctype="multipart/form-data">

    @csrf


    <div class="form-upload">
        <input type="text" placeholder="صورة السلعة" id="image-label" required readonly/>
        <input type="file" class="d-none" id="image" name="buyer_logo">
        <button type="button" class="image-upload" id="image-btn">اختر الصوره</button>
    </div>
    <div class="form-group">
        <input type="text" placeholder="اسم السلعة">
    </div>
    <div class="form-group">
        <input type="number" placeholder="سعر السلعة">
    </div>
    <div class="form-group">
        <input type="text" placeholder="العرض او الخصم">
    </div>
    <button type="submit" class="btn fixed-style-btn w-25 m-auto mb-3 mt-2">حفظ</button>

</form>

@endsection
