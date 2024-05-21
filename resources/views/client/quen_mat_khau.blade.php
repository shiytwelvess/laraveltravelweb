@extends('client.master_not_menu')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <div class="login-page" style="margin-top: 30px">
            <div class="container mt-5">
                <div class="section-header">
                    <h2 class="section-heading text-center">Quên Mật Khẩu</h2>
                </div>
                <div class="row">
                    <form action="/reset-password" method="post" class="login-form common-form mx-auto mb-4">
                        @csrf
                        <div class="col-12">
                            <fieldset>
                                <label class="label">Nhập Email</label>
                                <input name="email" type="email" />
                                  @error('email')
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
