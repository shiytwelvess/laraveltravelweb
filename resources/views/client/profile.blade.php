@extends('client.master')
@section('noi_dung')
<section class="contact-area contact-bg" data-background="/assets_rocker/images/banner/logo.jpg" style="background-image: url(&quot;img/bg/contact_bg.jpg&quot;);">
    <div class="container">
        @php
            $user = Auth::guard('customer')->user();
        @endphp
        <div class="row mt-4">
            <div class="col-xl-8 col-lg-7">
                <div class="contact-form-wrap">
                    <div class="section-header d-flex align-items-center justify-content-between flex-wrap">
                        <h2 class="section-heading">Cập Nhật Thông Tin</h2>
                    </div>
                    <div class="contact-form">
                        <form action="/cap-nhap-thong-tin/index" method="post">
                            @csrf
                            <input type="hidden" name="id" value="{{ $user->id }}">
                            <div class="col-md-12">
                                <input name="hoTen" value="{{ $user->hoTen }}" type="text" placeholder="Nhập vào họ và tên">
                            </div>
                            <div class="col-md-12 mt-3 mb-3" style="border-color:gray">
                                    {{-- <p id="email"><strong>Mail: </strong></p> --}}
                                    <input name="soDienThoai" value="{{ $user->email }}" type="text" placeholder="Nhập vào địa chỉ email">
                            </div>
                            <div class="col-md-12">
                                <input name="soDienThoai" value="{{ $user->soDienThoai }}" type="text" placeholder="Nhập vào số điện thoại">
                            </div>
                            <div class="col-md-12">
                                <input name="diaChi" value="{{ $user->diaChi }}" type="text" placeholder="Nhập vào địa chỉ">
                            </div>
                            <div class="col-md-12">
                                <input name="ngaySinh" value="{{ $user->ngaySinh }}" type="date" placeholder="Nhập vào ngày sinh">
                            </div>
                            <div class="col-md-12 text-blade mt-4">
                                <select name="gioiTinh" style="border-radius: 4px;background-color: #ffff; color: #151414; padding: 14px 25px; width: 100%;">
                                    <option value="1" {{ $user->gioiTinh == 1 ? 'selected' : '' }}>Giới Tính Nam</option>
                                    <option value="0" {{ $user->gioiTinh == 0 ? 'selected' : '' }}>Giới Tính Nữ</option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-md-12 text-right">
                                    <button type="submit"
                                    class="position-relative review-submit-btn contact-submit-btn">Xác Nhận Thay Đổi</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-xl-4 col-lg-5">
                <div class="section-header d-flex align-items-center justify-content-between flex-wrap">
                    <p class="section-heading">Thông tin của Chúng tôi</p>
                </div>
                <div class="contact-info-wrap">
                    <p><span>Travel - Du Lịch Đà Nẵng :</span> Tận hưởng từng khoảnh khắc của bạn</p>
                    <div class="contact-info-list">
                        <ul>
                            <li>
                                <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                                <p><span>Address :</span> Hải Châu, Đà Nẵng</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-phone-alt"></i></div>
                                <p><span>Phone :</span> 09052354322</p>
                            </li>
                            <li>
                                <div class="icon"><i class="fas fa-envelope"></i></div>
                                <p><span>Email :</span> nho372001@gmail.com</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('js')
<script>
    @if(count($errors) > 0)
        @foreach($errors->all() as $error)
            toastr.error("{{ $error }}");
        @endforeach
    @endif
    // JavaScript
var userEmail = "{{ $user->email }}";
document.getElementById("email").textContent = userEmail;

</script>
@endsection
