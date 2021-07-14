@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('page_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css"/>
@endsection
@section('content')

 
<div class="container">
<div class="row">
@if($action=='add')
<form method="post" action="{{route('area.store')}}" enctype="multipart/form-data">
@else
<form method="post" action="{{route('area.update',$area->id)}}" enctype="multipart/form-data">
@method('PUT')
@endif
{{ csrf_field() }} 
<div class="form-group col-12">
<select name="city_id" class="form-control">
<option value="" selected disabled>اختر المدينة</option>
@foreach($cities as $city)
<option value="{{$city->id}}" @if($action=="update") @if($area->city_id==$city->id) selected @endif @endif>{{$city->name}}</option>
@endforeach
</select>
</div>
<div class="form-group col-12">
<input type="text" name="name" class="form-control" placeholder="اسم الحي" value="{{$action=='update'?$area->name:""}}" />
</div>

<button type="submit">حفظ</button>

</form>
</div>
 </div>


@endsection
@section('page_js')

@endsection
