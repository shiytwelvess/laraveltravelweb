@extends('client.master_not_menu')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <div class="login-page" style="margin-top: 30px">
            <div class="container">
                <div class="section-header mb-3">
                    <h2 class="section-heading text-center">Cập Nhật Mật Khẩu</h2>
                </div>
                <div class="row">
                    <form action="/update-password" method="post" class="login-form common-form mx-auto">
                        @csrf
                        <div class="col-12">
                            <fieldset>
                                <input name="hash_reset" type="text" value="{{ $hash }}" />
                            </fieldset>
                            <fieldset>
                                <label class="label">Mật Khẩu</label>
                                <input name="password" type="text" />
                                @error('password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                            <fieldset>
                                <label class="label">Nhập Lại Mật Khẩu</label>
                                <input name="re_password" type="text" />
                                @error('re_password')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </fieldset>
                        </div>
                        <div class="col-12 mt-3">
                            <button type="submit" class="btn-primary d-block mt-4 btn-signin">Xác Nhận</button>
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
