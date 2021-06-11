@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('content')

    <table class="table-management table-responsive products w-100 dataTable no-footer" id="datatable-activated" role="grid"
        style="width: 1352px;">
        <thead>
            <tr role="row">
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 222px;">اسم العميل</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 222px;">العنوان</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 222px;">التاريخ</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 222px;">الحالة</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 222px;">عرض</th>
                <th class="sorting_disabled" rowspan="1" colspan="1" style="width: 222px;">حذف</th>
            </tr>
        </thead>
        <tbody>

            <tr role="row" class="odd">
                <td>معتز سمير</td>
                <td>نسيت كلمة السر</td>
                <td>03-06-2021</td>
                <td class="text-primary">جديد</td>
                <td><button type="button" class="btn btn-success">عرض</button></td>
                <td><button type="button" class="btn btn-danger">حذف</button></td>
            </tr>
            <tr role="row" class="even">
                <td>معتز سمير</td>
                <td>نسيت كلمة السر</td>
                <td>03-06-2021</td>
                <td class="text-primary">جديد</td>
                <td><button type="button" class="btn btn-success">عرض</button></td>
                <td><button type="button" class="btn btn-danger">حذف</button></td>
            </tr>
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
