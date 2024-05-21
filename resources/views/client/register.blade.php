@extends('client.master_not_menu')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <div class="login-page" style="margin-top: 30px">
            <div class="container">
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center" style="color: #006633">Đăng Ký</h2>
                </div>
                <div class="row">
                    <form action="/register" method="post" class="login-form common-form mx-auto">
                        @csrf
                        <div class="col-12 ">
                            <fieldset>
                                <label class="label">Họ và tên</label>
                                <input name='hoTen' type="text" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Email</label>
                                <input name='email' type="text" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Mật khẩu</label>
                                <input name='password' type="password" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Địa Chỉ</label>
                                <input name='diaChi' type="text" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Số Điện thoại</label>
                                <input name='soDienThoai' type="number" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Ngày Sinh</label>
                                <input name="ngaySinh" type="date" />
                            </fieldset>
                        </div>
                        <div class="col-12 mb-2">
                            <fieldset>
                                <label class="label">Giới Tính</label>
                                <select name="gioiTinh" id="">
                                    <option value="0">Nam</option>
                                    <option value="1">Nữ</option>
                                </select>
                            </fieldset>
                        </div>
                        <div class="col-12">
                            {!! NoCaptcha::renderJs() !!}
                            {!! NoCaptcha::display() !!}
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn-primary d-block mt-3 btn-signin">Đăng Ký</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
    </main>
@endsection
@section('js')
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
@endsection
