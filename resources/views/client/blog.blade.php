@extends('client.master')
@section('noi_dung')
    <div class="article-page mt-3" id="app">
        <div class="container">
            <div class="row">
                <div class="mb-2 col-lg-9 col-md-12 col-12">
                    <div class="section-header d-flex align-items-center justify-content-between flex-wrap">
                        <h2>Bài Viết Nổi Bật</h2>
                    </div>
                    <hr>
                    <div class="article-rte">
                        @foreach ($bai_viet as $key => $value)
                            <div class="row" style="margin: 30px">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="article-img">
                                                <img  style="height:400px;width:1000px" src="{{ $value->hinh_anh }}" alt="img">
                                            </div>
                                            <a href="/blog/detail/{{$value->id}}"><h2 class="article-title">{{ $value->tieu_de }}</h2></a>
                                            <div class="article-content">
                                                <p style="font-size:20px"> &emsp; {{ $value->mo_ta_ngan}}</p>
                                             </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-3" >
                    <div class="filter-widget" style="margin-top: 15px">
                        <div class="filter-header faq-heading heading_18 d-flex align-items-center border-bottom">
                         <h4>Danh sách Bài Viết</h4>
                        </div>
                        <div class="filter-related">
                            @foreach ($bai_viet as $key => $value)
                            @if ($value->is_open != 0)
                                @php
                                $hinh_anh = explode(',', $value->hinh_anh)
                                @endphp
                                <div class="related-item related-item-article d-flex">
                                    <div class="related-img-wrapper">
                                        <a href="/blog/detail/{{$value->id}}"><img style="width: 100px; height: 60px;" src="{{$hinh_anh[0]}}" alt=""></a>
                                    </div>
                                    <div class="related-product-info">
                                        <h6 class="related-heading text_14">
                                            <a href="/blog/detail/{{$value->id}}">{{$value->tieu_de}}</a>
                                        </h6>
                                        <p class="article-card-published text_12 d-flex align-items-center mt-2">
                                            <span class="article-date d-flex align-items-center">
                                                <span class="icon-publish">
                                                    <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                                        xmlns="http://www.w3.org/2000/svg">
                                                        <path
                                                            d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                                            fill="#00234D"></path>
                                                    </svg>
                                                </span>
                                                <span class="date"> {{$value->created_at}}</span>
                                            </span>
                                        </p>
                                    </div>
                                </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        new Vue({
            el          : '#app',
            data        : {
            },
            methods:  {
                traVeLogin() {
                    window.location.href = 'http://127.0.0.1:8000/login';
                    toastr.error('Chức năng này cần phải đăng nhập!');
                },
            },

        });
    </script>
@endsection
