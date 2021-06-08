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
                    <a href="{{ route('product.create') }}" class="btn btn-add-product">اضافة منتج</a>
                </div>
            </div>
        </div>
        @foreach($products as $product)
        <div class="col-sm-6 col-md-4 col-lg-3">
            <div class="box-product">
                <div class="container-image-product">
                    <img src="{{ App\Http\Controllers\ImageController::view_product_image($product->id) }}" class="img-fluid" alt="">
                    <form id="form-{{$product->id}}" method="post" action="{{route('delete.product')}}">
                        @csrf
                    <div class="icon-edit"><a href="{{route('product.show',$product->id)}}"><i class="fas fa-pencil-alt"></i></a>
                        <input type="hidden" name="id" value="{{$product->id}}" />
                        <button data-id="{{$product->id}}" class="btn remove"><i class="fas fa-trash text-danger"></i></button>
                    </div>
                </form>
                    
                    @if($product->offer!=null)
                    <div class="discount">
                        <span>{{$product->offer}}%</span>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-6">
                        <div class="name-product">
                            <span>{{$product->name}}</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="price-product">
                            <span>{{$product->price}} ريال</span>
                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="description-product">
                        <p>{{$product->description}}</p>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
        <div class="col-12">
<<<<<<< HEAD
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
=======
            <nav aria-label="Page navigation example">
                {!!$products->links()!!}
>>>>>>> 9a6f63faedf393f91fa2da67ffc42d745b75df84
              </nav>
              
        </div>
    </div>
</div>


@endsection
@section('page_js')
<script src="{{ asset('resources/assets/js/products.js')}}"></script>
@endsection
