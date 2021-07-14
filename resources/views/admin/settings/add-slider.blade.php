@extends('dashboard-layouts.layout-admin')
@section('title', isset($title) ? $title : '')
@section('content')

    @if ($message = Session::get('success'))
        <div class="alert alert-success w-100 text-center">
            {{ $message }}
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    @if ($message = Session::get('alert'))
        <div class="alert alert-danger w-100 text-center">
            {{ $message }}
            <button type="button" class="close white-text" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
    @endif
    <div class="row">
        <div class="col-sm-12 col-md-12">
            <div class="section-search-product mt-5">
                <h4>{{ $title }}</h4>

            </div>
        </div>

        <div class="col-sm-8 mx-auto">

            <div class="form-product">

                <div class="form-group row pl-4">
                    @if ($action == 'add')
                        <form action="{{ route('save_slider') }}" method="post" enctype="multipart/form-data">
                        @else
                            <form action="{{ route('update_slider', $saved->id) }}" method="post"
                                enctype="multipart/form-data">
                                @method('PUT')
                    @endif
                    {{ csrf_field() }} 

                    <div class="upload-image">
                        <label for="file-upload">
                            <div class="container-image">
                                <img src="{{ $action == 'update' ? $saved->image : asset('resources/assets/img/upload-img.png') }}"
                                    id="image_preview_container" data-id="{{ $action == 'update' ? $saved->id : '' }}">
                            </div>
                        </label>
                        <div class="text-upload-image">
                            <input class="file-upload" name="image" id="image" type="file" accept="image/*" />

                        </div>
                        <button type="button" id="remove"><i class="fa fa-times"></i></button>
                    </div>


                    <div class="form-group row ">
                        <div class="col-lg-12 mb-3">
                            <textarea name="content" class="form-control" rows="5" cols="15"
                                placeholder="إضافة محتوى">{{ $action == 'update' ? $saved->content : '' }}</textarea>
                        </div>
                    </div>


                    <div class="form-group row ">
                        <div class="col-lg-12  mb-3">
                            <input type="text" name="url" class="w-100 pe-2" value="{{ $action == 'update' ? $saved->url : '' }}"
                                placeholder="URL" style="height: 50px">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-lg-12">
                            <input type="text" name="button_title" class="w-100 pe-2"
                                value="{{ $action == 'update' ? $saved->button_title : '' }}" placeholder="عنوان الزر"
                                style="height: 50px">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-lg-12">
                            <label class="mb-2">لون المحتوى</label>
                            <input type="color" name="color" class="w-100"
                                value="{{ $action == 'update' ? $saved->color : '#333333' }}" style="height: 50px">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-lg-12">
                            <label class="mb-2" >لون الزر</label>
                            <input type="color" name="button_color" class="w-100 "
                                value="{{ $action == 'update' ? $saved->button_color : '#333333' }}" style="height: 50px">
                        </div>
                    </div>
                    <div class="form-group row mb-3">
                        <div class="col-lg-12">
                            <label class="mb-2">لون الخط بداخل الزر</label>
                            <select class="form-control" name="button_font">
                                <option value="text-light" @if ($action == 'update')  @if ($saved->button_font=='text-light') selected @endif
                                    @endif>أبيض</option>
                                <option value="text-dark" @if ($action == 'update')  @if ($saved->button_font=='text-dark') selected @endif
                                    @endif>أسود</option>
                                <option value="text-success" @if ($action == 'update')  @if ($saved->button_font=='text-success') selected @endif
                                    @endif>أخضر</option>
                                <option value="text-danger" @if ($action == 'update')  @if ($saved->button_font=='text-danger') selected @endif
                                    @endif>أحمر</option>
                                <option value="text-primary" @if ($action == 'update')  @if ($saved->button_font=='text-primary') selected @endif
                                    @endif>أزرق</option>
                                <option value="text-warning" @if ($action == 'update')  @if ($saved->button_font=='text-warning') selected @endif
                                    @endif>ذهبي</option>
                            </select>
                        </div>
                    </div>

                    <div class="mt-4">

                        <button type="submit" class="btn btn-add-product mb-3 w-25">حفظ</button>
                    </div>




                    </form>
                </div>



            </div>
        </div>


    </div>

    @section('page_js')
        <script>
            var type = "{{ $action == 'update' ? 1 : 0 }}"
            var img = "{{ asset('resources/assets/img/upload-img.png') }}";

        </script>

        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
        <!-- <script src="{{ asset('resources/assets/js/jquery.validate.min.js') }}"></script> -->
        <script src="{{ asset('resources/assets/js/slider.js') }}"></script>
    @endsection
@endsection
