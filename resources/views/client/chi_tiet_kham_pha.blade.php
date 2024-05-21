@extends('client.master')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <div class="product-page mt-100">
            <div class="container" id="app">
                <div class="row">
                    <h2 class="text-center mb-3"><strong>LET'S GO TRAVEL NOW!!!</strong></h2>
                    <h2 class="text-center mb-3"></strong>{{ $dia_diem->tenDiaDiem }}</strong></h2>
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="">
                            <div class="product-img-large">
                                    <div class="img-large-wrapper ol-md-12" style="width:100%">
                                        <a href="/assets/img/products/bags/39.jpg">
                                            <img src="{{ $dia_diem->hinh_anh }}" style="width:100%">
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>

                    <h1 class="text-center" style="color: grey; margin-top: 20px;"><strong>Mô Tả Chi Tiết</strong></h1>
                    <div class="row">
                        <pre class="mota-content" style="overflow: auto; white-space: pre-wrap; word-wrap: break-word;">{!! $dia_diem->moTa !!}</pre>
                    </div>

                </div>
            </div>
        </div>
    </main>



    <!-- scrollup start -->
    <button id="scrollup">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="#fff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
            <polyline points="18 15 12 9 6 15"></polyline>
        </svg>
    </button>
    <!-- scrollup end -->

    <!-- drawer menu start -->

    <!-- drawer cart end -->
@endsection
