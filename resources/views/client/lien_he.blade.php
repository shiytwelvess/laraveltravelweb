@extends('client.master')
@section('noi_dung')
<main id="MainContent" class="content-for-layout">

    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-12">
                    <div class="wrapper">
                        <div class="row no-gutters">
                            <div class="col-lg-8 col-md-7 order-md-last d-flex align-items-stretch">
                                <div class="contact-wrap w-100 p-md-5 p-4">
                                    <h3 class="mb-4">Phản hồi của bạn</h3>
                                    <div id="form-message-warning" class="mb-4"></div>
                              <div id="form-message-success" class="mb-4">
                            Your message was sent, thank you!
                              </div>
                                    <form action="/admin/phan-hoi/index" method="POST" id="contactForm" name="contactForm" class="contactForm">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="name">Họ Và Tên</label>
                                                    <fieldset>
                                                    <input type="text" class="form-control" name="hoTen" id="name" placeholder="Họ Và Tên">
                                                </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group">
                                                    <label class="label" for="subject">Số Điện Thoại</label>
                                                    <fieldset>
                                                    <input type="text" class="form-control" name="soDienThoai" id="subject" placeholder="Số điện thoại">
                                                </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="email">Địa Chỉ Email</label>
                                                    <fieldset>
                                                    <input type="email" class="form-control" name="email" id="email" placeholder="Email">
                                                </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <label class="label" for="#">Nội dung phản hồi</label>
                                                    <fieldset>
                                                    <textarea name="noiDung" class="form-control" id="message" cols="30" rows="4" placeholder="Nội dung phản hồi"></textarea>
                                                </fieldset>
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <button type="submit" class="position-relative review-submit-btn contact-submit-btn btn btn-primary">GỬI PHẢN HỒI</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-5 d-flex align-items-stretch">
                                <div class="info-wrap bg-primary w-100 p-md-5 p-4">
                                    <h3><strong>LIÊN HỆ</strong></h3>
                                    <p class="mb-4">Chúng tôi luôn lắng nghe ý kiến của bạn!</p>
                            <div class="dbox w-100 d-flex align-items-start">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-map-marker"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span>Address:</span> 03 Quang Trung, Hải Châu, TP Đà Nẵng</p>
                              </div>
                          </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-phone"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span>Phone:</span> <a href="tel://1234567920">+84 123456789</a></p>
                              </div>
                          </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-paper-plane"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span>Email:</span> <a href="mailto:info@yoursite.com">info@gmail.com</a></p>
                              </div>
                          </div>
                            <div class="dbox w-100 d-flex align-items-center">
                                <div class="icon d-flex align-items-center justify-content-center">
                                    <span class="fa fa-globe"></span>
                                </div>
                                <div class="text pl-3">
                                <p><span>Website</span> <a href="#">travel.com</a></p>
                              </div>
                          </div>
                      </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
