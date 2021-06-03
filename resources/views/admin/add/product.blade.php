
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@if($action=="add")
    <form method="post" action="{{route('product.store')}}" enctype="multipart/form-data">
    @else
    <form method="post" action="{{route('product.update',$item->id)}}" enctype="multipart/form-data">
    @method('PUT')
    @endif
    @csrf

    <input placeholder="name" type="text" name="name" value="{{$action=='update'?$item->name:''}}">
    <br>
    <input placeholder="price" type="number" name="price" value="{{$action=='update'?$item->price:''}}">
    <br>
    <input placeholder="qty" type="number" name="qty" value="{{$action=='update'?$item->qty:''}}">
    <br>
    <textarea name="description" >{{$action=='update'?$item->description:''}}</textarea>
    <br>
    <input type="file" name="images[]" multiple >
    <br>
    <button type="submit">حفظ</button>
    </form>
</body>
</html>