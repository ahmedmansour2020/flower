@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('content')



<div class="row">
    <div class="col-12">
        <h2 class="head-statistics">احصائيات</h2>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="box-statistics fr">
            <h4>عدد المتاجر</h4>
            <p>{{$shops}}</p>
        </div>
    </div>
    <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="box-statistics sc">
            <h4>عدد المنتجات</h4>
            <p>{{$products}}</p>
        </div>
    </div>
    <!-- <div class="col-sm-6 col-md-6 col-lg-4">
        <div class="box-statistics th">
            <h4>عدد المتاجر</h4>
            <p>2500</p>
        </div>
    </div> -->
</div>





@endsection
