@extends('dashboard-layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')


@if($action=="add")
<form method="post"  class="add-product mt-5 text-center" action="{{route('product.store')}}" enctype="multipart/form-data">
    @else
    <form method="post"  class="add-product mt-5 text-center" action="{{route('product.update',$item->id)}}" enctype="multipart/form-data">
        @method('PUT')
        @endif
        @csrf


        <div class="form-upload">
            <input type="text" placeholder="صورة السلعة" id="image-label" required readonly />
            <input type="file" class="d-none" id="image" name="images[]">
            <button type="button" class="image-upload" id="image-btn">اختر الصوره</button>
        </div>
        <div class="form-group">
            <input placeholder="اسم السلعة" type="text" name="name" value="{{$action=='update'?$item->name:''}}">
        </div>
        <div class="form-group">
            <select placeholder="التصنيف" type="text" name="category" >
            <option disabled selected>اختر التصنيف</option>
            @foreach($categories as $category)
                <option value="{{$category->id}}" @if($action=='update') @if($item->category_id==$category->id) selected @endif @endif>{{$category->name}}</option>
            @endforeach
            </select>
        </div>
        <div class="form-group">
        <textarea name="description" placeholder="وصف السلعة" >{{$action=='update'?$item->description:''}}</textarea>
        </div>
        <div class="form-group">
            <input placeholder="سعر السلعة" type="number" name="price" value="{{$action=='update'?$item->price:''}}">

        </div>
        
        <div class="form-group">
            <input placeholder="الخصم او العرض" type="number" name="offer"
                value="{{$action=='update'?$item->offer:''}}">

        </div>
        <button type="submit" class="btn fixed-style-btn w-25 m-auto mb-3 mt-2">حفظ</button>

    </form>

    @endsection