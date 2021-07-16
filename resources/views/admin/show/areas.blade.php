@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('page_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css"/>
@endsection
@section('content')
<a class="btn btn-info" href="{{route('area.create')}}">إضافة حي</a>
    <table class="table table-management table-responsive products w-100 dataTable no-footer" id="areas" role="grid"
        style="width: 1352px;">
        <thead>
            <tr role="row">
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 223px;">اسم الحي</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 223px;">اسم المدينة</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 223px;">تعديل</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 223px;">حذف</th>
            </tr>
        </thead>
        <tbody>


        </tbody>
    </table>




@endsection
@section('page_js')
<script>
var area_delete="{{route('area_delete')}}";
</script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('resources/assets/js/areas.js')}}"></script>
@endsection
