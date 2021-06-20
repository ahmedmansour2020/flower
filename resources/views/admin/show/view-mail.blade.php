@extends($from=='admin'?'dashboard-layouts.layout-admin':'dashboard-layouts.layout')
@section('title', isset($title) ? $title : '')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-12 form-group text-right row">
            <label class="col-3 text-info">من</label>
            <div class="col-9">{{$message->from}}</div>
        </div>
        <div class="col-12 form-group text-right row">
            <label class="col-3 text-info">التاريخ</label>
            <div class="col-9">{{$message->created_at}}</div>
        </div>
        <div class="col-12 form-group text-right row">
            <label class="col-3 text-info">العنوان</label>
            <div class="col-9">{{$message->subject}}</div>
        </div>
        <div class="col-12 form-group text-right row">
            <label class="col-3 text-info">الرسالة</label>
            <div class="col-9">{{$message->content}}</div>
        </div>
        @if($message->file!=null)
        <div class="col-12 form-group text-right row">
            <label class="col-3 text-info">المرفق</label>
            <div class="col-9"><a href="{{$message->file}}" target="_blank"><img src="{{$message->file}}" height="90" width="90"></a></div>
        </div>
        @endif
    </div>
</div>


@endsection