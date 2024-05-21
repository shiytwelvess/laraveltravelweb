@extends('client.master')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <div class="product-page mt-100">
            <div class="container" id="app">
                <div class="row">
                    <h2 class="text-center mb-3"><strong>TOUR</strong></h2>
                    <h2 class="text-center mb-3"></strong>{{ $tour->tenTour }}</strong></h2>
                    <div class="col-lg-8 col-md-12 col-12">
                        <div class="">
                            <div class="product-img-large">
                                <div class="img-large-slider common-slider"
                                    data-slick='{
                                "slidesToShow": 1,
                                "slidesToScroll": 1,
                                "dots": false,
                                "arrows": false,
                                "asNavFor": ".img-thumb-slider"
                            }'>
                            <div class="img-large-wrapper col-12">
                                <a href="/assets/img/products/bags/39.jpg">
                                    <img src="{{ $tour->hinh_anh }}" style="height: 410px; width: 100%;">
                                </a>
                            </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="product-details ps-lg-4">
                            {{-- <div class="mb-3"><span class="product-availability">In Stock</span></div> --}}

                            <div class="product-rating d-flex align-items-center mb-3">
                                <span class="star-rating">
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                            fill="#FFAE00" />
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                            fill="#FFAE00" />
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                            fill="#FFAE00" />
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                            fill="#FFAE00" />
                                    </svg>
                                    <svg width="16" height="15" viewBox="0 0 16 15" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M15.168 5.77344L10.082 5.23633L8 0.566406L5.91797 5.23633L0.832031 5.77344L4.63086 9.19727L3.57031 14.1992L8 11.6445L12.4297 14.1992L11.3691 9.19727L15.168 5.77344Z"
                                            fill="#B2B2B2" />
                                    </svg>
                                </span>
                                <span class="rating-count ms-2">(22)</span>
                            </div>
                            <div class="product-price-wrapper mb-2">
                                <strong class="text-danger" style="font-size:20px">Giá Tour :</strong>
                                <span class="product-price regular-price">{{ number_format( $tour->gia) }} VND</span>
                                {{-- <del class="product-price compare-price ms-2">$32.00</del> --}}

                            </div>
                            <div class="product-sku product-meta">
                                <strong class="" style="font-size: 20px">
                                    <span class="text-danger">Bắt Đầu:</span>

                                        {{ Carbon\Carbon::parse($tour->thoiGianBatDau)->format('H:i d/m/Y') }}<br>
                                        <span class="text-danger">Kết Thúc:</span>
                                        {{ Carbon\Carbon::parse($tour->thoiGianKetThuc)->format('H:i d/m/Y') }}

                                </strong>
                            </div>

                            <div class="product-vendor product-meta mb-3">
                                <form class="product-form" action="#">
                                    <div class="misc d-flex align-items-end justify-content-between">

                                        <div class="quantity d-flex align-items-center justify-content-between">
                                            <button v-if="soVe === 1" class="qty-btn dec-qty">
                                                <img src="/assets/img/icon/minus.svg" alt="minus">
                                            </button>
                                            <button v-else v-on:click="decrementQuantity" type="button" class="qty-btn dec-qty">
                                                <img src="/assets/img/icon/minus.svg" alt="minus">
                                            </button>
                                            <input class="qty-input" type="number" v-model.number="soVe" min="1" max="100">
                                            <button v-on:click="incrementQuantity" type="button" class="qty-btn inc-qty">
                                                <img src="/assets/img/icon/plus.svg" alt="plus">
                                            </button>
                                        </div>


                                    </div>
                                    {{-- <div class="quantity d-flex align-items-center">
                                        <button ><img src="/assets/img/icon/minus.svg" alt="minus"></button>
                                        <input class="qty-input" type="number" name="qty" value="1" min="0">
                                        <button  ><img src="/assets/img/icon/plus.svg" alt="plus"></button>
                                    </div> --}}
                                    <b class="text-danger">Lưu ý :</b><span> nếu số lượng mua là 3 trở lên sẽ giảm <span
                                            class="text-danger">10%</span>, nếu số lượng mua là 5 trở lên sẽ giảm <span
                                            class="text-danger">15%</span> .</span>
                                    @php
                                        $check = Auth::guard('customer')->user();
                                    @endphp
                                    @if ($check)
                                        <div class="buy-it-now-btn mt-2">
                                            <button type="button" v-on:click="getGoiTour()" data-bs-toggle="modal"
                                                data-bs-target="#staticBackdrop"
                                                class="position-relative btn-atc btn-buyit-now">Đặt ngay</button>
                                        </div>
                                    @else
                                        <div class="buy-it-now-btn mt-2">
                                            <button type="button" v-on:click="traVeLogin()"
                                                class="position-relative btn-atc btn-buyit-now">Đặt ngay</button>
                                        </div>
                                    @endif

                                </form>
                            </div>

                            <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content ">
                                        <div class="modal-header">
                                            <h5 class="modal-title" id="staticBackdropLabel">Thông Tin Xác Nhận Mua Tour
                                            </h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label for="" class="mt-2">Họ Và Tên</label>
                                                <input type="text" v-model='create_chi_tiet.hoTen' name=""
                                                    id="" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2">Số Điện Thoại</label>
                                                <input type="number"v-model='create_chi_tiet.soDienThoai'
                                                    name="" id="" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2">Email</label>
                                                <input type="email" v-model='create_chi_tiet.email' name=""
                                                    id="" class="form-control ">
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2">Địa Chỉ</label>
                                                <input type="text"v-model='create_chi_tiet.diaChi' name=""
                                                    id="" class="form-control ">
                                            </div>
                                            <div class="form-group mt-2">
                                                <label class="form-label">Số Lượng Vé Đặt: @{{ soVe }}</label>
                                            </div>
                                            <div class="form-group">
                                                <label for="" style="font-size: 20px" class="mt-2">Tổng Tiền
                                                    :</label>
                                                <b style="font-size: 20px" class="text-danger text-center">@{{ tongTien }}</b>
                                            </div>
                                            <div class="form-group">
                                                <label for="" class="mt-2">Vui Lòng Chuyển vào số tài khoản:
                                                    <span class="text-danger">39029018829019</span> <br> Ngân Hàng:<span
                                                        class="text-danger">Agribank </span></label>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Thoát</button>
                                            <button v-on:click="taoHoaDon()" type="button" class="btn btn-primary" data-bs-dismiss="modal">Xác
                                                Nhận</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <h1 class="text-center" style="color: grey; margin-top: 20px;"><strong>Mô Tả Chi Tiết</strong></h1>
                    <div class="row">
                        <pre style="overflow: auto; white-space: pre-wrap; word-wrap: break-word;">{!! $tour->moTa !!}</pre>
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
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                goi_tour: {},
                create_chi_tiet: {},
                soVe: 1,
                tongTien: 0,
            },
            created() {},
            methods: {
                incrementQuantity() {
        if (this.soVe < 100) {
            this.soVe++;
        }
    },
    decrementQuantity() {
        if (this.soVe > 1) {
            this.soVe--;
        }
    },
                taoHoaDon() {
                    this.create_chi_tiet.trangThai = 0;
                    axios
                        .post('/tao-chi-tiet-hoa-don', this.create_chi_tiet)
                        .then((res) => {
                            if(res.data.status) {
                                toastr.success(res.data.message);
                            } else {
                                toastr.error(res.data.message);
                            }
                        });
                },

                getGoiTour() {
                    this.goi_tour = {!! json_encode($tour) !!};
                    this.create_chi_tiet = {!! json_encode($check) !!};
                    this.create_chi_tiet.soVe = this.soVe;
                    this.create_chi_tiet.idTour = this.goi_tour.id;
                    this.create_chi_tiet.trangThai = 0;
                    this.tongTien = this.create_chi_tiet.soVe * this.goi_tour.gia;

                    if(this.create_chi_tiet.soVe >=3 && this.create_chi_tiet.soVe <6) {
                        this.tongTien = this.tongTien - (this.tongTien * 0.1);
                    } else if(this.create_chi_tiet.soVe > 5) {
                        this.tongTien = this.tongTien - (this.tongTien * 0.15);
                    }
                    console.log(this.create_chi_tiet);
                },
                // creatChiTiet() {
                //     axios
                //         .post('/chi-tiet-thanh-toan/index', this.create_chi_tiet)
                //         .then((res) => {

                //         });
                // },


                traVeLogin() {
                    window.location.href = 'http://127.0.0.1:8000/login';
                    toastr.error('Chức năng này cần phải đăng nhập!');
                },
            },

        });
    </script>
@endsection
