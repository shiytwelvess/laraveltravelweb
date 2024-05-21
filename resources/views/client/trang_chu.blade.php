@extends('client.master')
@section('noi_dung')
    <main id="MainContent" class="content-for-layout">
        <!-- slideshow start -->
        <div class="slideshow-section position-relative">
            <div class="slideshow-active activate-slider"
                data-slick='{
            "slidesToShow": 1,
            "slidesToScroll": 1,
            "dots": true,
            "arrows": true,
            "responsive": [
                {
                "breakpoint": 768,
                "settings": {
                    "arrows": false
                }
                }
            ]
        }'>
                <div class="slide-item slide-item-bag position-relative">
                    <img class="slide-img d-none d-md-block" src="{{ $config->bg_home }}" alt="slide-1" style="width:100%">
                </div>
                <div class="slide-item slide-item-bag position-relative">
                    <img class="slide-img d-none d-md-block" src="{{ $config->bg_home_1 }}" style="width:100%"
                        alt="slide-2">

                </div>
                <div class="slide-item slide-item-bag position-relative">
                    <img class="slide-img d-none d-md-block" src="{{ $config->bg_home_2 }}" style="width:100%"
                        alt="slide-3">

                </div>
            </div>
            <div class="activate-arrows"></div>
            <div class="activate-dots dot-tools"></div>
        </div>
        <!-- slideshow end -->

        <!-- banner start -->
        <div class="grid-banner mt-100 overflow-hidden">
            <div class="collection-tab-inner mt-0">
                <div class="container">
                    <h2 class="section-heading primary-color text-center">Địa Điểm Nổi Bật</h2>
                    <div class="grid-container-2">
                        <a class="grid-item grid-item-1 position-relative rounded mt-0 d-flex"
                        href="http://127.0.0.1:8000/chitietkhampha/{{$dia_diem->id}}" data-aos="fade-right" data-aos-duration="700"
                        style="position: relative; border-radius: 10px; margin-top: 0; display: flex;">
                         <img class="banner-img rounded" src="{{$dia_diem->hinh_anh}}" alt="banner-1">
                         <div class="content-absolute">
                             <div class="content-overlay">
                                 <div class="content">
                                     <!-- Nội dung đè lên hình ảnh -->
                                     <h2 style="padding: 10px; border: 1px solid #fff; color: #000; background-color:#99FFCC; opacity:0.5">{{$dia_diem->tenDiaDiem}}</h2>

                                 </div>
                             </div>
                         </div>
                     </a>
                     <a class="grid-item grid-item-2 position-relative rounded mt-0 d-flex"
                     href="http://127.0.0.1:8000/chitietkhampha/{{$dia_diem_1->id}}" data-aos="fade-right" data-aos-duration="700"
                     style="position: relative; border-radius: 10px; margin-top: 0; display: flex;">
                      <img class="banner-img rounded" src="{{$dia_diem_1->hinh_anh}}" alt="banner-1">
                      <div class="content-absolute">
                          <div class="content-overlay">
                              <div class="content">
                                  <!-- Nội dung đè lên hình ảnh -->
                                  <h2 style="padding: 10px; border: 1px solid #fff; color: #000; background-color:#99FFCC; opacity:0.5">{{$dia_diem_1->tenDiaDiem}}</h2>

                              </div>
                          </div>
                      </div>
                  </a>
                  <a class="grid-item grid-item-3 position-relative rounded mt-0 d-flex"
                  href="http://127.0.0.1:8000/chitietkhampha/{{$dia_diem_2->id}}" data-aos="fade-right" data-aos-duration="700"
                  style="position: relative; border-radius: 10px; margin-top: 0; display: flex;">
                   <img class="banner-img rounded" src="{{$dia_diem_2->hinh_anh}}" alt="banner-1">
                   <div class="content-absolute">
                       <div class="content-overlay">
                           <div class="content">
                               <!-- Nội dung đè lên hình ảnh -->
                               <h2 style="padding: 10px; border: 1px solid #fff; color: #000; background-color:#99FFCC; opacity:0.5">{{$dia_diem_2->tenDiaDiem}}</h2>

                           </div>
                       </div>
                   </div>
               </a>

                    </div>
                </div>
            </div>
        </div>
        <!-- banner end -->
        <!-- collection start -->
        <div class="featured-collection mt-100 overflow-hidden">
            <div class="collection-tab-inner">
                <div class="container">
                    <div class="section-header text-center">
                        <h2 class="section-heading primary-color">Tours </span></h2>
                    </div>
                    <div class="row">
                        @php
                            $count = 0;
                        @endphp
                        @foreach ($list_goi_tour as $key => $value)
                             @php
                                $ngayKhoiHanh = Carbon\Carbon::parse($value->thoiGianBatDau);
                                $today = Carbon\Carbon::now();

                                if ($ngayKhoiHanh->lte($today)) {
                                    DB::table('tours')
                                        ->where('id', $value->id)
                                        ->update(['trangThai' => 0]);
                                }
                            @endphp
                        @if ($count < 4 && $value->trangThai != 0)
                        <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                            <div class="product-card" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                                <a class="hover-switch" href="http://127.0.0.1:8000/chi-tiet-tour/{{$value->slug}}--{{$value->id}}">
                                    <img style="height: 200px; width: 320px;" class="primary-img" src="{{ $value->hinh_anh }}" alt="">
                                </a>
                                <div class="product-card-details">
                                    <h3 class="product-card-title">
                                        <a href="" class="text_15"><b>{{ $value->tenTour }}</b></a>
                                        <p class="text-14">Lịch trình:<br>Từ: {{Carbon\Carbon::parse($value->thoiGianBatDau)->format('H:i d/m/Y')}}<br>Đến: {{Carbon\Carbon::parse($value->thoiGianKetThuc)->format('H:i d/m/Y ')}}</p>
                                        <p class="text-14"><b class="text-danger">Giá Tour Chỉ:</b>
                                            <ul class="money-list">
                                                <li data-value="{{$value->gia}}"></li>
                                            </ul>
                                        </p>
                                    </h3>
                                </div>
                                <button class="btn btn-view-details" style="background-color: #00aaff; color: #fff; width: 100%; padding: 5px 10px; border-radius: 3px; border: none; margin-top: 5px;" onclick="window.location.href='http://127.0.0.1:8000/chi-tiet-tour/{{$value->slug}}--{{$value->id}}'">Xem chi tiết</button>
                            </div>
                        </div>
                        @php
                            $count ++;
                        @endphp
                        @endif
                        @endforeach
                    </div>
                    <div class="view-all text-center" data-aos="fade-up" data-aos-duration="700">
                        <a class="btn-primary" href="/tours">VIEW ALL</a>
                    </div>
                    <div class="section-header text-center mt-5">
                        <h2 class="section-heading primary-color">Khách Sạn Đà Nẵng</h2>
                    </div>
                    <div class="row ">
                        @php
                            $countks = 0;
                        @endphp
                        @foreach ($list_khach_san as $key => $value)
                        @if ($countks < 4 && $value->trangThai != 0)
                        <div class="col-lg-3 col-md-6 col-6" data-aos="fade-up" data-aos-duration="700">
                            <div class="product-card" style="border: 1px solid #ccc; border-radius: 5px; padding: 5px;">
                                        <a class="hover-switch" href="http://127.0.0.1:8000/chi-tiet-khach-san/{{$value->slug}}--{{$value->id}}">
                                            <img style="height: 200px ;width:320px" class="primary-img" src="{{ $value->hinh_anh }}" alt="">
                                        </a>
                                    <div class="product-card-details">
                                            <h3 class="product-card-title">
                                            <a href=""><b>{{ $value->tenKhachSan }}</b></a><br>
                                            <div><b>Gói     :</b>{{$value->soNgay}} Ngày - {{$value->soDem}} Đêm</div>
                                            <div><b>Địa Chỉ :</b>{{$value->diaChi}}</div>
                                            <p class="text-14"><b class="text-danger">Giá Chỉ:</b>
                                                <ul class="money-list">
                                                    <li data-value="{{$value->gia}}"></li>
                                                </ul>
                                            </p>
                                        </h3>
                                    </div>
                                    <button class="btn btn-view-details" style="background-color: #00aaff; color: #fff; width: 100%; padding: 5px 10px; border-radius: 3px; border: none; margin-top: 5px;" onclick="window.location.href='http://127.0.0.1:8000/chi-tiet-khach-san/{{$value->slug}}--{{$value->id}}'">Xem chi tiết</button>
                                </div>
                         </div>
                         @php
                         $countks ++;
                         @endphp
                          @endif
                        @endforeach
                    </div>
                    <div class="view-all text-center" data-aos="fade-up" data-aos-duration="700">
                        <a class="btn-primary" href="/khach-san/index">VIEW ALL</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- collection end -->
        <div class="header-section mt-100" style="background-color: #99FFCC">
            <h1 style="text-align: center; color:#006633; font-family:Arial, Helvetica, sans-serif;"><strong>ĐÀ NẴNG - VƯỢT THỜI GIAN</strong></h1>
        </div>

        <div class="row video-section overflow-hidden">
            <div class="col-md-8">
                <div class="video-button-area">
                    <iframe width="100%" height="600px" src="https://www.youtube.com/embed/8DRGL9DvnJU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
            </div>
            <div class="col-md-4">
                <div class="mapouter">
                    <div class="gmap_canvas">
                        <iframe width="100%" height="600px" id="gmap_canvas" src="https://maps.google.com/maps?q=danang&t=&z=10&ie=UTF8&iwloc=&output=embed" frameborder="0" scrolling="no" marginheight="0" marginwidth="0">
                        </iframe>
                    </div>
                </div>

            </div>
        </div>

    </main>
@endsection
@section('js')

<script src="https://cdnjs.cloudflare.com/ajax/libs/numeral.js/2.0.6/numeral.min.js"></script>
<script>
    var moneyList = document.querySelectorAll('.money-list li');
    for (var i = 0; i < moneyList.length; i++) {
        var value = moneyList[i].getAttribute('data-value');
        moneyList[i].textContent = numeral(value).format('0,0') + ' VND';
    }
</script>
@endsection

