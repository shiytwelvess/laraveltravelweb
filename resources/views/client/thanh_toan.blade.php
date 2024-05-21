@extends('client.master')
@section('noi_dung')
<main id="MainContent" class="content-for-layout">
    <div class="checkout-page" style="margin-top: 30px">
        <div class="container">
            <div class="checkout-page-wrapper">
                <div class="row">
                    <div class="col-xl-9 col-lg-8 col-md-12 col-12">
                        <div class="section-heade">
                            <h3>Thanh Toán</h3>
                        </div>

                        <div class="checkout-user-area overflow-hidden d-flex align-items-center">
                            <div class="checkout-user-img me-4">
                                <img src="assets/img/checkout/user.jpg" alt="img">
                            </div>
                            <div class="checkout-user-details d-flex align-items-center justify-content-between w-100">
                                <div class="checkout-user-info">
                                    <h2 class="checkout-user-name">Susan Gardner</h2>
                                    <p class="checkout-user-address mb-0">2752 avenue Royale, Quebec, G1R 2B2, Canada</p>
                                </div>

                                <a href="#" class="edit-user btn-secondary">EDIT PROFILE</a>
                            </div>
                        </div>

                        <div class="shipping-address-area">
                            <h2 class="shipping-address-heading pb-1">Địa chỉ</h2>
                            <div class="shipping-address-form-wrapper">
                                <form action="#" class="shipping-address-form common-form">
                                    <div class="row">
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Họ và tên</label>
                                                <input type="text" />
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Email</label>
                                                <input type="email" />
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Số điện thoại</label>
                                                <input type="text" />
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Thành phố</label>
                                                <input type="text" />
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Địa chỉ</label>
                                                <input type="text" />
                                            </fieldset>
                                        </div>
                                        <div class="col-lg-6 col-md-12 col-12">
                                            <fieldset>
                                                <label class="label">Địa chỉ 2</label>
                                                <input type="text" />
                                            </fieldset>
                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>

                        <div class="shipping-address-area billing-area">
                            <h2 class="shipping-address-heading pb-1">Đặt địa chỉ mặc định</h2>
                            <div class="form-checkbox d-flex align-items-center mt-4">
                                <input class="form-check-input mt-0" type="checkbox">
                                <label class="form-check-label ms-2">
                                    Địa chỉ mặc định
                                </label>
                            </div>
                        </div>
                        <div class="shipping-address-area billing-area">
                            <div class="minicart-btn-area d-flex align-items-center justify-content-between flex-wrap">
                                <a href="/dat-ve" class="checkout-page-btn minicart-btn btn-secondary">Quay lại đặt vé</a>
                                <a href="thanh-toan" class="checkout-page-btn minicart-btn btn-primary">Thanh toán</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-md-12 col-12">
                        <div class="cart-total-area checkout-summary-area">
                            <h3 class="d-none d-lg-block mb-0 text-center heading_24 mb-4">Danh sách vé</h4>

                            <div class="minicart-item d-flex">
                                <div class="mini-img-wrapper">
                                    <img class="mini-img" src="assets/img/products/furniture/1.jpg" alt="img">
                                </div>
                                <div class="product-info">
                                    <h2 class="product-title"><a href="#">Eliot Reversible Sectional</a></h2>
                                    <p class="product-vendor">$150 x 1</p>
                                </div>
                            </div>
                            <div class="minicart-item d-flex">
                                <div class="mini-img-wrapper">
                                    <img class="mini-img" src="assets/img/products/furniture/2.jpg" alt="img">
                                </div>
                                <div class="product-info">
                                    <h2 class="product-title"><a href="#">Eliot Reversible Sectional</a></h2>
                                    <p class="product-vendor">$150 x 1</p>
                                </div>
                            </div>
                            <div class="minicart-item d-flex">
                                <div class="mini-img-wrapper">
                                    <img class="mini-img" src="assets/img/products/furniture/3.jpg" alt="img">
                                </div>
                                <div class="product-info">
                                    <h2 class="product-title"><a href="#">Eliot Reversible Sectional</a></h2>
                                    <p class="product-vendor">$150 x 1</p>
                                </div>
                            </div>
                            <div class="minicart-item d-flex">
                                <div class="mini-img-wrapper">
                                    <img class="mini-img" src="assets/img/products/furniture/4.jpg" alt="img">
                                </div>
                                <div class="product-info">
                                    <h2 class="product-title"><a href="#">Eliot Reversible Sectional</a></h2>
                                    <p class="product-vendor">$150 x 1</p>
                                </div>
                            </div>

                            <div class="cart-total-box mt-4 bg-transparent p-0">
                                <div class="subtotal-item subtotal-box">
                                    <h4 class="subtotal-title">Đơn giá:</h4>
                                    <p class="subtotal-value">$465.00</p>
                                </div>
                                <div class="subtotal-item discount-box">
                                    <h4 class="subtotal-title">Giảm giá:</h4>
                                    <p class="subtotal-value">$100.00</p>
                                </div>
                                <hr />
                                <div class="subtotal-item discount-box">
                                    <h4 class="subtotal-title">Tổng tiền:</h4>
                                    <p class="subtotal-value">$1000.00</p>
                                </div>


                                <div class="mt-4 checkout-promo-code">
                                    <input class="input-promo-code" type="text" placeholder="Promo code" />
                                    <a href="checkout.html" class="btn-apply-code position-relative btn-secondary text-uppercase mt-3">
                                        Nhập mã Code
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
