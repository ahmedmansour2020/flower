<?php
use App\Http\Controllers\VisitController;
?>
<div class="nav-header">
    <div class="container">
        <div class="row">
            <div class="col-8">
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
                <!-- <div class="modal fade" id="contactUs" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true" dir="ltr">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body ">
                                <form action="" method="">
                                    @csrf
                                    <div class="form-group">
                                        <input type="email" class="w-100 d-block text-end"
                                            placeholder="البريد الالكترونى">
                                        <input type="text" class="w-100 d-block text-end" placeholder="العنوان">
                                        <textarea name="" id="" cols="30" class="w-100 d-block text-end"
                                            placeholder="الرساله"></textarea>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer btn-map">
                                <button type="button">ارسال</button>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
            <div class="col-4">
                <div class="visitor-num">
                    <p>انت زائر رقم </p>
                    <span>{{VisitController::count_visits()}}</span>
                </div>
            </div>
        </div>

    </div>
</div>