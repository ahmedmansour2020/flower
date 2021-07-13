@extends(isset($from)?'dashboard-layouts.layout-admin':'dashboard-layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')


<div class="col-sm-8 mx-auto">
    <form action="{{ route('save_buyer_info') }}" method="POST" class="create-acc-vendor store-data mt-5"
        enctype="multipart/form-data">

        {{ csrf_field() }} 
        <input type="hidden" name="edit" value="edit">
        <input type="hidden" name="id" value="{{isset($from)?$user->id:0}}">

        <div class="form-group">
            <input type="text" readonly placeholder="اسم المتجر" name="buyer_name" value="{{$user->buyer_name}}" required />
            <button type="button" class="btn btn-success btn-edit-input">تعديل</button>
        </div>
        <div class="form-group">
            <input type="text" readonly placeholder="رقم التواصل" name="mobile" value="{{$user->buyer_mobile}}" required />
            <button type="button" class="btn btn-success btn-edit-input">تعديل</button>

        </div>
        <div class="form-upload">
            <input type="text" readonly placeholder="شعار المتجر" id="image-label" required readonly />
            <input type="file" class="d-none" id="image" name="buyer_logo">
            <button type="button" class="image-upload" id="image-btn">تحميل الصوره</button>
            <span class="required mr-2 text-danger">*</span>
        </div>
        <div class="form-upload">
            <input type="text" readonly placeholder="لوحة المتجر" id="image-label1" readonly required />
            <input type="file" class="d-none" id="image1" name="buyer_banner">
            <button type="button" class="image-upload" id="image-btn1">تحميل الصوره</button>
        </div>
        <div class="form-group">
            <input type="text" readonly placeholder="الموقع" required name="buyer_site" value="{{$user->buyer_site}}" />
            <button type="button" class="btn btn-success btn-edit-input">تعديل</button>

        </div>
        <div class="form-group">
            <select name="city_id" id="city_id">
                @foreach(App\Http\Controllers\LocationController::getCities() as $city)
                <option value="{{$city->id}}" @if($user->city_id==$city->id) selected @endif>{{$city->name}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <select name="area_id" id="area_id">
                <option value="" selected disabled>الحي</option>
            </select>
        </div>
        <div class="form-group">
            <input type="text" readonly placeholder="الواتس اب" name="buyer_whatsapp" value="{{$user->buyer_whatsapp}}">
            <button type="button"class="btn btn-success btn-edit-input">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" readonly placeholder="اسناب شات" name="buyer_snapshat" value="{{$user->buyer_snapshat}}">
            <button type="button" class="btn btn-success btn-edit-input">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" readonly placeholder="الانستغرام" name="buyer_instagram" value="{{$user->buyer_instagram}}">
            <button type="button" class="btn btn-success btn-edit-input">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" readonly placeholder="توتير" name="buyer_twitter" value="{{$user->buyer_twitter}}">
            <button type="button" class="btn btn-success btn-edit-input">تعديل</button>

        </div>
        <div class="form-group">
            <input type="text" readonly placeholder="الفيس بوك" name="buyer_facebook" value="{{$user->buyer_facebook}}">
            <button type="button" class="btn btn-success btn-edit-input">تعديل</button>

        </div>
        {{--
        <div class="form-group">
            <input type="text" readonly placeholder="تيك توك" name="buyer_tiktok" value="{{$user->buyer_tiktok}}">

</div>
--}}
<div class="form-group">
    <div id="map"></div>
    <input type="hidden" name="lng" id="lng">
    <input type="hidden" name="lat" id="lat">
</div>
<div class="form-group">
    <button type="submit" class="btn fixed-style-btn w-25 m-auto mb-3 mt-2">حفظ</button>
</div>
</form>
</div>



@endsection
@section('page_js')
<script>
var type = "1";
var selected_area = "{{$user->area_id}}";
var saved_lng="{{$user->lng}}";
var saved_lat="{{$user->lat}}";
</script>

<script src="{{ URL::asset('resources/assets/js/fill_areas.js') }}"></script>
<script src="{{ asset('resources/assets/js/select_map.js') }}"></script>

@endsection