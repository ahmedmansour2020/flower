@extends($from=='admin'?'dashboard-layouts.layout-admin':'dashboard-layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')
@section('page_css')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endsection

<form action="{{route('message.store')}}" method="POST" class="add-product mt-5 text-center"
    enctype="multipart/form-data">

    @csrf


    <div class="form-group">
        <input type="text" placeholder="العنوان" name="subject">
    </div>

    <textarea name="content" id="" cols="57" rows="15" class="" placeholder="الرسالة"></textarea>

    <div class="form-upload mt-5">
        <input type="text" placeholder="إضافة مرفق" id="image-label" required readonly />
        <input type="file" class="d-none" id="image" name="file">
        <button type="button" class="image-upload" id="image-btn">اختر الصوره</button>
    </div>

    <select name="to" id="" class="select-recipient form-control">
        @if($from=='admin')
        <option value="all" selected>إلى الجميع</option>
        <option value="all_buyers">إلى جميع البائعين</option>
        <option value="all_users">إلى جميع المستخدمين</option>
        @endif
        @foreach($users as $user)
        <option value="{{$user->id}}">{{$user->name}}</option>
        @endforeach
    </select>

    <div class="mt-4">
        <button type="submit" class="btn btn-add-product mb-3 w-25">ارسال</button>
    </div>
</form>


@endsection
@section('page_js')
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
$('.select-recipient').select2();
</script>
@endsection