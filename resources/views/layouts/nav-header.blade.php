<?php
use App\Http\Controllers\VisitController;
?>
<div class="nav-header">
    <div class="container">
        <div class="row">
            <div class="col-sm-12 col-md-8">
                <ul class="list-sub-nav">
                    <li><a href="{{route('all_offers')}}">عروض</a></li>
                    <li><a href="#">جديد </a></li>
                    <li><a href="{{ route('about-us') }}">من نحن </a></li>
                    @auth
                    <?php
                    $user = auth()->user();
                    ?>
                    @if($user->role_id==null)
                    <li><a href="#" class="open_send_message">تواصل معنا</a></li>
                    @endif
                    @endauth
                </ul>
                
            </div>
            <div class="col-sm-12 col-md-4">
                <div class="visitor-num">
                    <p>انت زائر رقم </p>
                    <span>{{VisitController::count_visits()}}</span>
                </div>
            </div>
        </div>

    </div>
</div>