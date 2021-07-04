@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('content')
@section('page_css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css"/>
<style>
.jconfirm-closeIcon{
  right:unset !important;
  left:10px !important;
}
</style>
@endsection
    <table id="{{$type}}" class="table-management table-responsive products w-100 dataTable no-footer" id="datatable-activated" role="grid"
        style="width: 1352px;">
        <thead>
            <tr role="row">
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 266px;">اسم العميل</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 266px;">رقم الجوال</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 268px;">الايميل</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 267px;">تعديل</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 266px;">حذف</th>
            </tr>
        </thead>
        <tbody>

       
        </tbody>
    </table>

    <div class="col-12">
        <nav aria-label="Page navigation example" class="nav-pagination">
            <ul class="pagination">
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Previous">
                  <span aria-hidden="true"><i class="fas fa-chevron-right"></i></span>
                  <span class="sr-only">Previous</span>
                </a>
              </li>
              <li class="page-item"><a class="page-link" href="#">1</a></li>
              <li class="page-item"><a class="page-link" href="#">2</a></li>
              <li class="page-item"><a class="page-link" href="#">3</a></li>
              <li class="page-item">
                <a class="page-link" href="#" aria-label="Next">
                  <span aria-hidden="true"><i class="fas fa-chevron-left"></i></span>
                  <span class="sr-only">Next</span>
                </a>
              </li>
            </ul>
          </nav>
    </div>



@endsection
@section('page_js')
<script>
var type="{{$type}}";
var delete_user="{{route('delete_user')}}";
</script>
<script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('resources/assets/js/users.js')}}"></script>
@endsection