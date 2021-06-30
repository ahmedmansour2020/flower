@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('page_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css"/>
@endsection
@section('content')

 
<div class="container">
<div class="row">
@if($action=='add')
<form method="post" action="{{route('category.store')}}" enctype="multipart/form-data">
@else
<form method="post" action="{{route('category.update',$category->id)}}" enctype="multipart/form-data">
@method('PUT')
@endif
@csrf
<div class="form-group col-12">
<input type="text" name="name" class="form-control" placeholder="اسم التصنيف" value="{{$action=='update'?$category->name:""}}" />
</div>

<button type="submit">حفظ</button>

</form>
</div>
 </div>


@endsection
@section('page_js')
<script src="{{asset('resources/assets/js/shops.js')}}"></script>
@endsection
