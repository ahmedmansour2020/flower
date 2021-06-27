@extends("layouts.layout")
@section('title', isset($title) ? $title : '')
@section('content')



<div class="container">
    <div class="row">

        <div class="col-12">
            <table class="table table-responsive border-collapse mt-5 table-wishlist">

                <thead>
                    <tr>
                        <th colspan="2"></th>
                        <th>الثمن</th>
                        <th>ازالة من الاعجابات</th>

                    </tr>
                </thead>
                <tbody>
                    @foreach($products as $product)
                    <tr class="bg-white product-wishlist">
                        <td class="img-wishlist">
                           <a href="{{route('product-view',$product->id)}}"> <img src="{{ $product->image }}" class="img-fluid" alt=""></a>
                        </td>
                        <td class="desc-wishlist">
                            <h2>{{$product->name}}</h2>
                            <p>{{$product->description}}</p>
                        </td>
                        <td class="pt-5">{{$product->price}} ريال</td>
                        <td class="pt-5">
                        <form method="post" action="{{ route('delete_favourite',$product->favourite_id)}}">
                        @csrf
                        <button class="btn btn-transparent">    <i class="fas fa-trash text-danger" class="" ></i></button>
                        </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>

    </div>
</div>




@endsection




@section('page_js')

<script>
$('.carousel').carousel();
$('.carousel').carousel({
    interval: 5000
});
.carousel('pause');
.carousel('cycle');
</script>
@endsection