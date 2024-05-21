@extends('client.master_not_menu')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">

        <div class="login-page" style="margin-top: 30px">
            <div>
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center" style="color: #006633">Đăng Nhập</h2>
                </div>
                <div class="row">
                    <form action="/login" method="post" class="login-form common-form mx-auto">
                        @csrf
                        <div class="col-12 mt-2">
                            <fieldset>
                                <label class="label">Email</label>
                                <input name="email" type="email" />
                            </fieldset>
                        </div>
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Mật Khẩu</label>
                                <input name="password" type="password" />
                            </fieldset>
                        </div>
                        <div class="col-12 mt-3">
                            <a href="/reset-password" class="text_14 d-block">Quên mật khẩu?</a>
                            <div class="col-md-12 mt-2">
                               {!! NoCaptcha::renderJs() !!}
                               {!! NoCaptcha::display() !!}
                           </div>
                            <button type="submit" class="btn-primary d-block mt-4 btn-signin">Đăng Nhập</button>
                            <a href="/register" class="btn-secondary mt-2 btn-signin">Đăng Ký</a>
                        </div>
                    </form>
                </div>
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
