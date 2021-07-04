@extends('dashboard-layouts.layout-admin')

@section('title', isset($title) ? $title : '')
@section('page_css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap.min.css" />
    <style>
        .switch {
            position: relative;
            display: inline-block;
            width: 60px;
            height: 34px;
        }

        .switch input {
            opacity: 0;
            width: 0;
            height: 0;
        }

        .slider {
            position: absolute;
            cursor: pointer;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-color: #ccc;
            -webkit-transition: .4s;
            transition: .4s;
        }

        .slider:before {
            position: absolute;
            content: "";
            height: 26px;
            width: 26px;
            left: 4px;
            bottom: 4px;
            background-color: white;
            -webkit-transition: .4s;
            transition: .4s;
        }

        input:checked+.slider {
            background-color: #2196F3;
        }

        input:focus+.slider {
            box-shadow: 0 0 1px #2196F3;
        }

        input:checked+.slider:before {
            -webkit-transform: translateX(26px);
            -ms-transform: translateX(26px);
            transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
            border-radius: 34px;
        }

        .slider.round:before {
            border-radius: 50%;
        }

    </style>
@endsection
@section('content')
      
        <div class="row">
            <div class="col-sm-12 col-md-12">
                <div class="section-search-product mt-5">
                    <h4>{{ $title }}</h4>

                </div>
            </div>
            <div>
                <a href="{{ route('create.slider') }}" class="btn btn-primary mt-5 mb-5">إضافة جديد</a>
            </div>
            <div class="col-sm-12 mx-auto">

                <div class="form-product">

                    <div class="form-group row pl-4">
                        <div class="table-responsive">
                            <table class="table w-100 text-center" id="sliders">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>الصورة</th>
                                        <th>المحتوى</th>
                                        <th>تفعيل</th>
                                        <th>تعديل|حذف</th>
                                    </tr>
                                </thead>
                                <tbody>
                                </tbody>
                            </table>
                        </div>
                    </div>



                </div>
            </div>


        </div>

@section('page_js')
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap.min.js"></script>
    <script src="{{ asset('resources/assets/js/sliders.js') }}"></script>
    <script src="{{ asset('resources/assets/js/remove.js') }}"></script>
@endsection
@endsection
