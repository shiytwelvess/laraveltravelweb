@extends('client.master')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <div class="product-page mt-100">
            <div class="container" id="app">
                <div class="row">
                    <h2 class="text-center mb-3"><strong>{{ $khach_san->tenKhachSan }}</strong></h2>

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
                                    <div class="img-large-wrapper">
                                        <a href="/assets/img/products/bags/39.jpg">
                                            <img src="{{ $khach_san->hinh_anh }}" style="height:410px;width:100%">
                                        </a>
                                    </div>

                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-4 col-md-12 col-12">
                        <div class="product-details ps-lg-4">
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
                                <strong class="text-danger" style="font-size:22px">Trải Nghiệm:</strong>
                                <span class="product-price regular-price">{{$khach_san->soNgay}} Ngày , {{$khach_san->soDem}} Đêm</span><br>
                                <strong class="text-danger" style="font-size:22px">Giá Phòng :</strong>
                                <span class="product-price regular-price">{{ number_format( $khach_san->gia) }} VND</span>
                                {{-- <del class="product-price compare-price ms-2">$32.00</del> --}}
                            </div>
                            <div class="product-sku product-meta">
                                <strong class="" style="font-size:18px">Địa Chỉ :</strong>
                                <span>{{ $khach_san->diaChi }}</span>
                            </div>
                            <div class="product-sku product-meta">
                                <strong class="" style="font-size:18px">Số Phòng :</strong>
                            </div>
                            <div class="product-vendor product-meta mb-3">
                                <form class="product-form" action="#">
                                    <div class="misc d-flex align-items-end justify-content-between">

                                        <div class="quantity d-flex align-items-center justify-content-between">
                                            <button v-if="soPhong === 1" class="qty-btn dec-qty">
                                                <img src="/assets/img/icon/minus.svg" alt="minus">
                                            </button>
                                            <button v-else v-on:click="decrementQuantity" type="button" class="qty-btn dec-qty">
                                                <img src="/assets/img/icon/minus.svg" alt="minus">
                                            </button>
                                            <input class="qty-input" type="number" v-model.number="soPhong" min="1" max="100">
                                            <button v-on:click="incrementQuantity" type="button" class="qty-btn inc-qty">
                                                <img src="/assets/img/icon/plus.svg" alt="plus">
                                            </button>
                                        </div>
{{--
                                        <div class="quantity d-flex align-items-center justify-content-between">
                                            <button v-if="soPhong == 1" class="qty-btn dec-qty"><img
                                                    src="/assets/img/icon/minus.svg" alt="minus"></button>
                                            <button type="button" v-else v-on:click="soPhong--"
                                                class="qty-btn dec-qty"><img src="/assets/img/icon/minus.svg"
                                                    alt="minus"></button>
                                            <input class="qty-input" type="number" v-model="soPhong" min="1">
                                            <button type="button" v-on:click="soPhong++" class="qty-btn inc-qty"><img
                                                    src="/assets/img/icon/plus.svg" alt="plus"></button>
                                        </div> --}}
                                        {{-- <a href="" v-on:click='changeYeuThich(id)' class="product-wishlist" style="">
                                            <svg class="icon icon-wishlist" width="26" height="22" viewBox="0 0 26 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z" fill="#00234D"></path>
                                            </svg>
                                        </a> --}}
                                        {{-- <i class="fa-solid fa-heart"></i> --}}
                                        <template v-if="user_login && tim == 1">
                                            <span>
                                                <button type="button" class="product-wishlist"
                                                    v-on:click="changeYeuThich()">
                                                    <i class="fa-solid fa-heart"></i>
                                                </button>
                                            </span>
                                        </template>
                                        <template v-else-if="user_login">
                                            <span>
                                                <button type="button" class="product-wishlist"
                                                    v-on:click="changeYeuThich()">
                                                    <svg class="icon icon-wishlist" width="26" height="22"
                                                        viewBox="0 0 26 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                                            fill="#00234D"></path>
                                                    </svg>
                                                </button>
                                            </span>
                                        </template>
                                        <template v-else>
                                            <span>
                                                <button type="button" class="product-wishlist"
                                                    v-on:click="traVeLogin()">
                                                    <svg class="icon icon-wishlist" width="26" height="22"
                                                        viewBox="0 0 26 22" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M6.96429 0.000183105C3.12305 0.000183105 0 3.10686 0 6.84843C0 8.15388 0.602121 9.28455 1.16071 10.1014C1.71931 10.9181 2.29241 11.4425 2.29241 11.4425L12.3326 21.3439L13 22.0002L13.6674 21.3439L23.7076 11.4425C23.7076 11.4425 26 9.45576 26 6.84843C26 3.10686 22.877 0.000183105 19.0357 0.000183105C15.8474 0.000183105 13.7944 1.88702 13 2.68241C12.2056 1.88702 10.1526 0.000183105 6.96429 0.000183105ZM6.96429 1.82638C9.73912 1.82638 12.3036 4.48008 12.3036 4.48008L13 5.25051L13.6964 4.48008C13.6964 4.48008 16.2609 1.82638 19.0357 1.82638C21.8613 1.82638 24.1429 4.10557 24.1429 6.84843C24.1429 8.25732 22.4018 10.1584 22.4018 10.1584L13 19.4036L3.59821 10.1584C3.59821 10.1584 3.14844 9.73397 2.69866 9.07411C2.24888 8.41426 1.85714 7.55466 1.85714 6.84843C1.85714 4.10557 4.13867 1.82638 6.96429 1.82638Z"
                                                            fill="#00234D"></path>
                                                    </svg>
                                                </button>
                                            </span>
                                        </template>
                                    </div>
                                    <b class="text-danger">Lưu ý :</b><span> Nếu đặt 2 phòng sẽ giảm <span
                                            class="text-danger">5%</span>, đặt 5 phòng sẽ giảm <span
                                            class="text-danger">10%</span> và nếu phòng đặt lớn hơn hoặc bằng 10 sẽ giảm
                                        <span class="text-danger">15%</span>.</span>

                                    <template v-if="user_login">
                                        <div class="buy-it-now-btn mt-2">
                                            <button type="button" v-on:click="getKhachSan()"  data-bs-toggle="modal" data-bs-target="#exampleModal"
                                                class="position-relative btn-atc btn-buyit-now">Đặt Ngay</button>
                                        </div>
                                    </template>
                                    <template v-else>
                                        <div class="buy-it-now-btn mt-2">
                                            <button type="button" v-on:click="traVeLogin()"
                                                class="position-relative btn-atc btn-buyit-now">Đặt Ngay</button>
                                        </div>

                                    </template>
                                    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Thông Tin Xác Nhận Đặt Phòng</h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="form-group">
                                                    <label for="" class="mt-2">Họ Và Tên</label>
                                                    <input type="text" v-model="create_chi_tiet.hoTen"
                                                        name="" id="" class="form-control ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="mt-2">Số Điện Thoại</label>
                                                    <input type="number" v-model="create_chi_tiet.soDienThoai"
                                                        name="" id="" class="form-control ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="mt-2">Email</label>
                                                    <input type="email" v-model="create_chi_tiet.email"
                                                        name="" id="" class="form-control ">
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="mt-2">Địa Chỉ</label>
                                                    <input type="text" v-model="create_chi_tiet.diaChi"
                                                        name="" id="" class="form-control ">
                                                </div>
                                                <div class="form-group mt-2">
                                                    <label class="form-label">Số Lượng Phòng Đặt:
                                                        @{{ soPhong }}</label>
                                                </div>
                                                <div class="form-group">
                                                    <label for="" style="font-size: 20px"
                                                        class="mt-2">Tổng Tiền
                                                        :</label>
                                                    <b style="font-size: 20px"
                                                        class="text-danger text-center product-price regular-price">@{{  tongTien }}
                                                        VND</b>
                                                        {{-- <span class="product-price regular-price">{{ number_format( $khach_san->gia) }} VND</span> --}}
                                                </div>
                                                <div class="form-group">
                                                    <label for="" class="mt-2">Vui Lòng Chuyển vào số
                                                        tài khoản:
                                                        <span class="text-danger">39029018829019</span> <br> Ngân
                                                        Hàng:<span class="text-danger">Agribank </span></label>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Thoát</button>
                                                <button v-on:click="taoHoaDon()" type="button"class="btn btn-primary" data-bs-dismiss="modal">Xác Nhận</button>
                                            </div>
                                          </div>
                                        </div>
                                      </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <h1 class="text-center" style="color: grey; margin-top: 20px;"><strong>Mô Tả Chi Tiết</strong></h1>
                    <div class="row">
                        <pre style="overflow: hidden; font-family:'Times New Roman', Times, serif; line-height:2px">{!! $khach_san->moTa !!}</pre>
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
                goi_khach_san: {},
                create_chi_tiet: {
                    'hoTen': '',
                    'soDienThoai': '',
                    'email': '',
                    'diaChi': ''
                },
                soPhong: 1,
                tongTien: 0,
                user_login: {},
                tim: 0,
            },
            created() {
                this.getData();
            },
            methods: {
                incrementQuantity() {
        if (this.soPhong < 100) {
            this.soPhong++;
        }
    },
    decrementQuantity() {
        if (this.soPhong > 1) {
            this.soPhong--;
        }
    },

                getData() {
                    this.goi_khach_san = {!! json_encode($khach_san) !!};
                    this.user_login = {!! json_encode($check) !!};
                    if (this.user_login) {
                        this.create_chi_tiet = this.user_login;
                    }
                    this.tim = {!! json_encode($tim) !!};
                },

                taoHoaDon() {
                    console.log(this.create_chi_tiet);
                    axios
                        .post('/tao-chi-tiet-hoa-don-khach-san', this.create_chi_tiet)
                        .then((res) => {
                            if (res.data.status) {
                                toastr.success(res.data.message);
                            } else {
                                toastr.error(res.data.message);
                            }
                        });
                },

                getKhachSan() {
                    this.create_chi_tiet.soPhong = this.soPhong;
                    this.create_chi_tiet.idKhachSan = this.goi_khach_san.id;
                    this.tongTien = this.create_chi_tiet.soPhong * this.goi_khach_san.gia;

                    if (this.create_chi_tiet.soPhong >= 2 && this.create_chi_tiet.soPhong < 5) {
                        this.tongTien = this.tongTien - (this.tongTien * 0.05);
                    } else if (this.create_chi_tiet.soPhong >= 5 && this.create_chi_tiet.soPhong < 10) {
                        this.tongTien = this.tongTien - (this.tongTien * 0.1);
                    } else if (this.create_chi_tiet.soPhong >= 10) {
                        this.tongTien = this.tongTien - (this.tongTien * 0.15);
                    }
                    // console.log(this.create_chi_tiet);
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
                changeYeuThich() {
                    this.goi_khach_san.id_khach_hang= {!! json_encode($check) !!}.id;
                    axios
                        .post('/yeu-thich/change', this.goi_khach_san)
                        .then((res) => {
                            if (res.data.status) {
                                this.tim = res.data.tim;
                            }
                        });
                },
            },

        });
    </script>

@endsection
