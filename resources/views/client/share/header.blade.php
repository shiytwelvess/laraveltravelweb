<!-- announcement bar start -->
<div class="announcement-bar bg-1 py-1 py-lg-2">
    <div class="container">
        <div class="row align-items-center justify-content-between">
            <div class="col-lg-3 d-lg-block d-none">
                <div class="announcement-call-wrapper">
                    <div class="announcement-call">
                        <a class="announcement-text text-white" href="tel:+1-078-2376">Liên hệ: 0123456789</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 d-lg-block d-none">
                <div class="announcement-meta-wrapper d-flex align-items-center justify-content-end">

                    @php
                        $check = Auth::guard('customer')->user();
                    @endphp
                    @if ($check)
                    <div class="announcement-meta d-flex align-items-center">
                        <a class="announcement-login announcement-text text-white" href="/cap-nhap-thong-tin/index">

                            <span>Xin Chào <strong class="text-danger" style="font-size:15px">{{$check->hoTen}} </strong>!!</span>
                        </a>
                    </div>
                    @else
                    <div class="announcement-meta d-flex align-items-center">
                        <a class="announcement-login announcement-text text-white" href="/login">
                            <svg class="icon icon-user" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 0C3.07227 0 1.5 1.57227 1.5 3.5C1.5 4.70508 2.11523 5.77539 3.04688 6.40625C1.26367 7.17188 0 8.94141 0 11H1C1 8.78516 2.78516 7 5 7C7.21484 7 9 8.78516 9 11H10C10 8.94141 8.73633 7.17188 6.95312 6.40625C7.88477 5.77539 8.5 4.70508 8.5 3.5C8.5 1.57227 6.92773 0 5 0ZM5 1C6.38672 1 7.5 2.11328 7.5 3.5C7.5 4.88672 6.38672 6 5 6C3.61328 6 2.5 4.88672 2.5 3.5C2.5 2.11328 3.61328 1 5 1Z"
                                    fill="#fff" />
                            </svg>
                            <span>Đăng nhập</span>
                        </a>
                        <span class="separator-login d-flex px-3">
                            <svg width="2" height="9" viewBox="0 0 2 9" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path opacity="0.4" d="M1 0.5V8.5" stroke="#FEFEFE" stroke-linecap="round" />
                            </svg>
                        </span>
                        <a class="announcement-login announcement-text text-white" href="register">
                            <svg class="icon icon-user" width="10" height="11" viewBox="0 0 10 11" fill="none"
                                xmlns="http://www.w3.org/2000/svg">
                                <path
                                    d="M5 0C3.07227 0 1.5 1.57227 1.5 3.5C1.5 4.70508 2.11523 5.77539 3.04688 6.40625C1.26367 7.17188 0 8.94141 0 11H1C1 8.78516 2.78516 7 5 7C7.21484 7 9 8.78516 9 11H10C10 8.94141 8.73633 7.17188 6.95312 6.40625C7.88477 5.77539 8.5 4.70508 8.5 3.5C8.5 1.57227 6.92773 0 5 0ZM5 1C6.38672 1 7.5 2.11328 7.5 3.5C7.5 4.88672 6.38672 6 5 6C3.61328 6 2.5 4.88672 2.5 3.5C2.5 2.11328 3.61328 1 5 1Z"
                                    fill="#fff" />
                            </svg>
                            <span>Đăng Ký</span>
                        </a>
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- announcement bar end -->
