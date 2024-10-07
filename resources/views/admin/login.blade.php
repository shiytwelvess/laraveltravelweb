@extends('share.page_not_menu')
@section('content')

    <body class="bg-login">
        <!--wrapper-->
        <div class="wrapper">
            <div class="section-authentication-signin">
                <div class="container-fluid">
                    <div class="row row-cols-1 row-cols-lg-2 row-cols-xl-3">
                        <div class="col mx-auto">
                            <div class="mb-4 text-center">
                                <img src="/assets_rocker/images/banner/admin_travel.jpg" width="180" alt="" />
                            </div>
                            <div class="card">
                                <div class="card-body">
                                    <div class="border p-4 rounded">
                                        <div class="text-center">
                                            <h3 class="">Sign in</h3>
                                        </div>
                                        <div class="form-body">
                                            <form action="/tai-khoan/index" method="post" class="row g-3">
                                                @csrf
                                                <div class="col-12">
                                                    <label class="form-label">Email Address</label>
                                                    <input type="email" name='email' class="form-control" placeholder="Email Address">
                                                </div>
                                                <div class="col-12">
                                                    <label for="inputChoosePassword" class="form-label">Enter Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="**********">
                                                </div>
                                                <div class="col-12">
                                                    <div class="d-grid">
                                                        <button type="submit" class="btn btn-primary">
                                                            <i class="bx bxs-lock-open"></i>Sign in</button>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end row-->
                </div>
            </div>
        </div>
        <!--end wrapper-->
    </body>
@endsection
@section('js')
@endsection
