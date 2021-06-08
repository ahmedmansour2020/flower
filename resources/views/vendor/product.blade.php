@extends('dashboard-layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="search-products overflow-hidden">
                <select name="" id="" class="categories">
                    <option value="" selected disabled>التصنيفات</option>
                    <option value="">بوكيهات</option>
                    <option value="">بالونات</option>
                </select>
                <div class="form-group d-inline-block">
                    <a href="{{ route('add-product') }}" class="btn btn-add-product">اضافة منتح</a>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box-product">
                <div class="container-image-product">
                    <img src="{{ URL::asset('resources/assets/images/product-1.png') }}" class="img-fluid" alt="">
                    <div class="icon-edit"><i class="fas fa-pencil-alt"></i></div>
                    <div class="discount">
                        <span>45%</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="name-product">
                            <span>باقه رقم 1</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="price-product">
                            <span>150 ريال</span>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="description-product">
                        <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من محل وردة الخريف</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box-product">
                <div class="container-image-product">
                    <img src="{{ URL::asset('resources/assets/images/product-2.png') }}" class="img-fluid" alt="">
                    <div class="icon-edit"><i class="fas fa-pencil-alt"></i></div>
                    <div class="discount">
                        <span>45%</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="name-product">
                            <span>باقه رقم 1</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="price-product">
                            <span>150 ريال</span>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="description-product">
                        <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من محل وردة الخريف</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box-product">
                <div class="container-image-product">
                    <img src="{{ URL::asset('resources/assets/images/product-1.png') }}" class="img-fluid" alt="">
                    <div class="icon-edit"><i class="fas fa-pencil-alt"></i></div>
                    <div class="discount">
                        <span>45%</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="name-product">
                            <span>باقه رقم 1</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="price-product">
                            <span>150 ريال</span>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="description-product">
                        <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من محل وردة الخريف</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box-product">
                <div class="container-image-product">
                    <img src="{{ URL::asset('resources/assets/images/product-2.png') }}" class="img-fluid" alt="">
                    <div class="icon-edit"><i class="fas fa-pencil-alt"></i></div>
                    <div class="discount">
                        <span>45%</span>
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="name-product">
                            <span>باقه رقم 1</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="price-product">
                            <span>150 ريال</span>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="description-product">
                        <p>بوكيه ورد طبيعى لا يوجد مثله في الوجود من محل وردة الخريف</p>
                    </div>
                </div>
            </div>
        </div>
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
    </div>
</div>


@endsection
