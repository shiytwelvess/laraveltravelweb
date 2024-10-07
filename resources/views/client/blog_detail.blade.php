@extends('client.master')
@section('noi_dung')
    <div class="container">
        <div class="row" style="margin-top: 20px">
            <div class="col-lg-9">
                <div class="card">
                    <h2 class="title mt-3 mb-3">{{ $blogDetail->tieu_de }}</h2>
                    @php
                        $hinh_anh = explode(',', $blogDetail['hinh_anh']);
                    @endphp
                    <div class="blog-post-item blog-details-wrap">
                        <div class="blog-post-thumb">
                            <a href="blog-details.html"><img style="width: 930px; height: 460px;" src="{{ $hinh_anh[0] }}"
                                    alt=""></a>
                        </div>
                        <div class="blog-post-content ">
                            <div class="blog-details-top-meta text-end">
                                <span class="user"> &emsp; <i class="far fa-user"></i> by <a
                                        href="#">Admin</a></span>
                                <span class="date "><i class="far fa-clock"></i> 10 Mar 2023</span>
                            </div>
                            <div class="blog-img-wrap ">
                            </div>
                            <div class="row" style="padding: 20px">
                                <pre style="overflow: hidden; font-family:'Times New Roman', Times, serif; line-height:2px">{!! $blogDetail->noi_dung !!}</pre>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="filter-widget" style="margin-top: 15px">
                    <div class="filter-header faq-heading heading_18 d-flex align-items-center border-bottom">
                        <h4>Sự kiện nổi bật</h4>
                    </div>
                    <div class="filter-related">
                        @foreach ($bai_viet as $key => $value)
                            @php
                                $hinh_anh = explode(',', $value->hinh_anh);
                            @endphp
                            <div class="related-item related-item-article d-flex">
                                <div class="related-img-wrapper">
                                    <a href="/blog/detail/{{ $value->id }}"><img style="width: 100px; height: 60px;"
                                            src="{{ $hinh_anh[0] }}" alt=""></a>
                                </div>
                                <div class="related-product-info">
                                    <h6 class="related-heading text_14">
                                        <a href="/blog/detail/{{ $value->id }}">{{ $value->tieu_de }}</a>
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
                                            <span class="date"> {{ $value->created_at }}</span>
                                        </span>
                                    </p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="comments-section mt-100 home-section overflow-hidden">
            <div class="section-header">
                <h2>Comments</h2>
            </div>
            <div class="comments-area">
                <div class="d-flex comments-item">
                    <div class="comments-img">
                        <img src="https://thuthuatnhanh.com/wp-content/uploads/2020/03/anh-hoat-hinh-de-thuong-dep-nhat-the-gioi.jpg"
                            alt="img">
                    </div>
                    <div class="comments-main">
                        <div class="comments-main-content">
                            <div class="comments-meta">
                                <h4 class="commentator-name">Tuấn Nhã</h4>
                                <div class="comments-date article-date d-flex align-items-center">
                                    <span class="icon-publish">
                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                                fill="#00234D"></path>
                                        </svg>
                                    </span>
                                    <span class="ms-2">22/2/2023</span>
                                </div>
                                <p class="comments">Cảnh đẹp Đà Nẵng thật là tuyệt vời.</p>
                            </div>
                            <button type="button" class="btn-reply bg-transparent d-flex align-items-center">
                                <span class="btn-reply-icon me-2">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.14062 2.64062L1.14062 6.64062L0.796875 7L1.14062 7.35938L5.14062 11.3594L5.85938 10.6406L2.21875 7L5.85938 3.35938L5.14062 2.64062ZM7.64062 2.64062L3.64062 6.64062L3.29688 7L3.64062 7.35938L7.64062 11.3594L8.35938 10.6406L5.21875 7.5H11.5C12.8867 7.5 14 8.61328 14 10C14 11.3867 12.8867 12.5 11.5 12.5V13.5C13.4277 13.5 15 11.9277 15 10C15 8.07227 13.4277 6.5 11.5 6.5H5.21875L8.35938 3.35938L7.64062 2.64062Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <span class="btn-reply-text">Reply</span>
                            </button>
                        </div>
                        <div class="comments-replied">
                            <div class="d-flex comments-item">
                                <div class="comments-img">
                                    <img src="https://antimatter.vn/wp-content/uploads/2022/07/hinh-anh-hoat-hinh.jpg"
                                        alt="img">
                                </div>
                                <div class="comments-main">
                                    <div class="comments-meta">
                                        <h4 class="commentator-name">Kiều Nhi</h4>
                                        <div class="comments-date article-date d-flex align-items-center">
                                            <span class="icon-publish">
                                                <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                                        fill="#00234D"></path>
                                                </svg>
                                            </span>
                                            <span class="ms-2">23/2/2022</span>
                                        </div>
                                        <p class="comments">Đúng vậy tôi thích cảnh vậy ở đây</p>
                                    </div>
                                    <button type="button" class="btn-reply bg-transparent d-flex align-items-center">
                                        <span class="btn-reply-icon me-2">
                                            <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M5.14062 2.64062L1.14062 6.64062L0.796875 7L1.14062 7.35938L5.14062 11.3594L5.85938 10.6406L2.21875 7L5.85938 3.35938L5.14062 2.64062ZM7.64062 2.64062L3.64062 6.64062L3.29688 7L3.64062 7.35938L7.64062 11.3594L8.35938 10.6406L5.21875 7.5H11.5C12.8867 7.5 14 8.61328 14 10C14 11.3867 12.8867 12.5 11.5 12.5V13.5C13.4277 13.5 15 11.9277 15 10C15 8.07227 13.4277 6.5 11.5 6.5H5.21875L8.35938 3.35938L7.64062 2.64062Z"
                                                    fill="black"></path>
                                            </svg>
                                        </span>
                                        <span class="btn-reply-text">Reply</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="d-flex comments-item">
                    <div class="comments-img">
                        <img src="https://i.pinimg.com/736x/59/c7/a5/59c7a5522ba6d0a37a9b72bb5fbe6c05.jpg" alt="img">
                    </div>
                    <div class="comments-main">
                        <div class="comments-main-content">
                            <div class="comments-meta">
                                <h4 class="commentator-name">Tuấn Tài</h4>
                                <div class="comments-date article-date d-flex align-items-center">
                                    <span class="icon-publish">
                                        <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                                fill="#00234D"></path>
                                        </svg>
                                    </span>
                                    <span class="ms-2">24/2/2022</span>
                                </div>
                                <p class="comments">Tôi rất thích cảnh vật và con người ở Đà Nẵng </p>
                            </div>
                            <button type="button" class="btn-reply bg-transparent d-flex align-items-center">
                                <span class="btn-reply-icon me-2">
                                    <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M5.14062 2.64062L1.14062 6.64062L0.796875 7L1.14062 7.35938L5.14062 11.3594L5.85938 10.6406L2.21875 7L5.85938 3.35938L5.14062 2.64062ZM7.64062 2.64062L3.64062 6.64062L3.29688 7L3.64062 7.35938L7.64062 11.3594L8.35938 10.6406L5.21875 7.5H11.5C12.8867 7.5 14 8.61328 14 10C14 11.3867 12.8867 12.5 11.5 12.5V13.5C13.4277 13.5 15 11.9277 15 10C15 8.07227 13.4277 6.5 11.5 6.5H5.21875L8.35938 3.35938L7.64062 2.64062Z"
                                            fill="black"></path>
                                    </svg>
                                </span>
                                <span class="btn-reply-text">Reply</span>
                            </button>
                        </div>
                    </div>

                </div>

                @foreach ($binh_luan as $key => $value)
                    <div class="d-flex comments-item">
                        <div class="comments-img">
                            <img src="https://haycafe.vn/wp-content/uploads/2022/03/anh-anime-nu-xinh-dep.jpg"
                                alt="img">
                        </div>
                        <div class="comments-main">
                            <div class="comments-main-content">
                                <div class="comments-meta">
                                    <h4 class="commentator-name">{{ $value->ho_va_ten }}</h4>
                                    <div class="comments-date article-date d-flex align-items-center">
                                        <span class="icon-publish">
                                            <svg width="17" height="18" viewBox="0 0 17 18" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M3.46875 0.875V1.59375H0.59375V17.4063H16.4063V1.59375H13.5313V0.875H12.0938V1.59375H4.90625V0.875H3.46875ZM2.03125 3.03125H3.46875V3.75H4.90625V3.03125H12.0938V3.75H13.5313V3.03125H14.9688V4.46875H2.03125V3.03125ZM2.03125 5.90625H14.9688V15.9688H2.03125V5.90625ZM6.34375 7.34375V8.78125H7.78125V7.34375H6.34375ZM9.21875 7.34375V8.78125H10.6563V7.34375H9.21875ZM12.0938 7.34375V8.78125H13.5313V7.34375H12.0938ZM3.46875 10.2188V11.6563H4.90625V10.2188H3.46875ZM6.34375 10.2188V11.6563H7.78125V10.2188H6.34375ZM9.21875 10.2188V11.6563H10.6563V10.2188H9.21875ZM12.0938 10.2188V11.6563H13.5313V10.2188H12.0938ZM3.46875 13.0938V14.5313H4.90625V13.0938H3.46875ZM6.34375 13.0938V14.5313H7.78125V13.0938H6.34375ZM9.21875 13.0938V14.5313H10.6563V13.0938H9.21875Z"
                                                    fill="#00234D"></path>
                                            </svg>
                                        </span>
                                        <span class="ms-2">{{ Carbon\Carbon::now()->format('d/m/Y') }}</span>
                                    </div>
                                    <p class="comments">{{ $value->noi_dung }}</p>
                                </div>
                                <button type="button" class="btn-reply bg-transparent d-flex align-items-center">
                                    <span class="btn-reply-icon me-2">
                                        <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M5.14062 2.64062L1.14062 6.64062L0.796875 7L1.14062 7.35938L5.14062 11.3594L5.85938 10.6406L2.21875 7L5.85938 3.35938L5.14062 2.64062ZM7.64062 2.64062L3.64062 6.64062L3.29688 7L3.64062 7.35938L7.64062 11.3594L8.35938 10.6406L5.21875 7.5H11.5C12.8867 7.5 14 8.61328 14 10C14 11.3867 12.8867 12.5 11.5 12.5V13.5C13.4277 13.5 15 11.9277 15 10C15 8.07227 13.4277 6.5 11.5 6.5H5.21875L8.35938 3.35938L7.64062 2.64062Z"
                                                fill="black"></path>
                                        </svg>
                                    </span>
                                    <span class="btn-reply-text">Reply</span>
                                </button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>
            @php
                $check = Auth::guard('customer')->user();
            @endphp
            <div class="comment-form-area">
                @if ($check)
                    <div class="form-header">
                        <h4 class="form-title">Hãy Để Bình Luận</h4>
                        <p class="form-subtitle">Bạn Nghĩ sao về trải nghiệm này (*) !!</p>
                    </div>
                    <form action="/blog/index" method="post" class="comment-form">
                        @csrf
                        <div class="name-email-field d-flex justify-content-between">
                            <div class="field-item name-field">
                                <span class="field-icon">
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 0.75C5.1084 0.75 2.75 3.1084 2.75 6C2.75 7.80762 3.67285 9.41309 5.07031 10.3594C2.39551 11.5078 0.5 14.1621 0.5 17.25H2C2 13.9277 4.67773 11.25 8 11.25C11.3223 11.25 14 13.9277 14 17.25H15.5C15.5 14.1621 13.6045 11.5078 10.9297 10.3594C12.3271 9.41309 13.25 7.80762 13.25 6C13.25 3.1084 10.8916 0.75 8 0.75ZM8 2.25C10.0801 2.25 11.75 3.91992 11.75 6C11.75 8.08008 10.0801 9.75 8 9.75C5.91992 9.75 4.25 8.08008 4.25 6C4.25 3.91992 5.91992 2.25 8 2.25Z"
                                            fill="#00234D"></path>
                                    </svg>
                                </span>
                                <input type="text" name="ho_va_ten" placeholder="Name" required="">
                            </div>
                            <div class="field-item email-field">
                                <span class="field-icon">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.1399 2.96707e-05C4.61747 -0.0820016 0.184855 4.86331 1.1165 10.5235C1.74931 14.3643 4.90165 17.3848 8.75712 17.9063C11.3558 18.2578 13.7845 17.5078 15.6243 16.0313L14.6868 14.8594C13.1517 16.0899 11.1331 16.7256 8.94462 16.4297C5.75419 15.9991 3.13798 13.4649 2.6165 10.2891C1.83134 5.51077 5.49345 1.43265 10.1165 1.50003C14.0569 1.55862 17.3792 4.82523 17.4993 8.76565C17.5022 8.85062 17.4993 8.93265 17.4993 9.02347C17.4934 10.6758 16.1546 12 14.4993 12C13.6614 12 12.9993 11.3379 12.9993 10.5V4.50003H11.4993V5.08597C10.9602 4.71976 10.3186 4.50003 9.62431 4.50003C7.76982 4.50003 6.24931 6.02054 6.24931 7.87503V10.125C6.24931 11.9795 7.76982 13.5 9.62431 13.5C10.635 13.5 11.5345 13.0401 12.1556 12.3282C12.7063 13.0283 13.5472 13.5 14.4993 13.5C16.9632 13.5 18.9905 11.4903 18.9993 9.02347C18.9993 8.92386 19.0022 8.82718 18.9993 8.71878C18.8558 3.96683 14.8919 0.0703422 10.1399 2.96707e-05ZM9.62431 6.00003C10.6673 6.00003 11.4993 6.83206 11.4993 7.87503V10.125C11.4993 11.168 10.6673 12 9.62431 12C8.58134 12 7.74931 11.168 7.74931 10.125V7.87503C7.74931 6.83206 8.58134 6.00003 9.62431 6.00003Z"
                                            fill="#00234D"></path>
                                    </svg>
                                </span>
                                <input type="email" name="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="field-item textarea-field">
                            <span class="field-icon">
                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.25 0.75V14.25H4V18.0586L8.76367 14.25H19.75V0.75H0.25ZM1.75 2.25H18.25V12.75H8.23633L5.5 14.9385V12.75H1.75V2.25ZM5.5 6C4.6709 6 4 6.6709 4 7.5C4 8.3291 4.6709 9 5.5 9C6.3291 9 7 8.3291 7 7.5C7 6.6709 6.3291 6 5.5 6ZM10 6C9.1709 6 8.5 6.6709 8.5 7.5C8.5 8.3291 9.1709 9 10 9C10.8291 9 11.5 8.3291 11.5 7.5C11.5 6.6709 10.8291 6 10 6ZM14.5 6C13.6709 6 13 6.6709 13 7.5C13 8.3291 13.6709 9 14.5 9C15.3291 9 16 8.3291 16 7.5C16 6.6709 15.3291 6 14.5 6Z"
                                        fill="#00234D"></path>
                                </svg>
                            </span>
                            <textarea cols="20" rows="6" placeholder="Write your comment here........" name="noi_dung"></textarea>
                        </div>

                        <button type="submit" class="position-relative review-submit-btn mt-4">Comment</button>
                    @else
                        <h2>Chức Năng Này Phải Đăng Nhập !!!</h2>
                        <p class="form-subtitle">Hãy Đăng Nhập Để Bình Luận Trải Nghiệm Này (*) !!</p>
                        <div class="name-email-field d-flex justify-content-between">
                            <div class="field-item name-field">
                                <span class="field-icon">
                                    <svg width="16" height="18" viewBox="0 0 16 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8 0.75C5.1084 0.75 2.75 3.1084 2.75 6C2.75 7.80762 3.67285 9.41309 5.07031 10.3594C2.39551 11.5078 0.5 14.1621 0.5 17.25H2C2 13.9277 4.67773 11.25 8 11.25C11.3223 11.25 14 13.9277 14 17.25H15.5C15.5 14.1621 13.6045 11.5078 10.9297 10.3594C12.3271 9.41309 13.25 7.80762 13.25 6C13.25 3.1084 10.8916 0.75 8 0.75ZM8 2.25C10.0801 2.25 11.75 3.91992 11.75 6C11.75 8.08008 10.0801 9.75 8 9.75C5.91992 9.75 4.25 8.08008 4.25 6C4.25 3.91992 5.91992 2.25 8 2.25Z"
                                            fill="#00234D"></path>
                                    </svg>
                                </span>
                                <input type="text" name="ho_va_ten" placeholder="Name" required="">
                            </div>
                            <div class="field-item email-field">
                                <span class="field-icon">
                                    <svg width="19" height="18" viewBox="0 0 19 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M10.1399 2.96707e-05C4.61747 -0.0820016 0.184855 4.86331 1.1165 10.5235C1.74931 14.3643 4.90165 17.3848 8.75712 17.9063C11.3558 18.2578 13.7845 17.5078 15.6243 16.0313L14.6868 14.8594C13.1517 16.0899 11.1331 16.7256 8.94462 16.4297C5.75419 15.9991 3.13798 13.4649 2.6165 10.2891C1.83134 5.51077 5.49345 1.43265 10.1165 1.50003C14.0569 1.55862 17.3792 4.82523 17.4993 8.76565C17.5022 8.85062 17.4993 8.93265 17.4993 9.02347C17.4934 10.6758 16.1546 12 14.4993 12C13.6614 12 12.9993 11.3379 12.9993 10.5V4.50003H11.4993V5.08597C10.9602 4.71976 10.3186 4.50003 9.62431 4.50003C7.76982 4.50003 6.24931 6.02054 6.24931 7.87503V10.125C6.24931 11.9795 7.76982 13.5 9.62431 13.5C10.635 13.5 11.5345 13.0401 12.1556 12.3282C12.7063 13.0283 13.5472 13.5 14.4993 13.5C16.9632 13.5 18.9905 11.4903 18.9993 9.02347C18.9993 8.92386 19.0022 8.82718 18.9993 8.71878C18.8558 3.96683 14.8919 0.0703422 10.1399 2.96707e-05ZM9.62431 6.00003C10.6673 6.00003 11.4993 6.83206 11.4993 7.87503V10.125C11.4993 11.168 10.6673 12 9.62431 12C8.58134 12 7.74931 11.168 7.74931 10.125V7.87503C7.74931 6.83206 8.58134 6.00003 9.62431 6.00003Z"
                                            fill="#00234D"></path>
                                    </svg>
                                </span>
                                <input type="email" name="email" placeholder="Email" required="">
                            </div>
                        </div>
                        <div class="field-item textarea-field">
                            <span class="field-icon">
                                <svg width="20" height="19" viewBox="0 0 20 19" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M0.25 0.75V14.25H4V18.0586L8.76367 14.25H19.75V0.75H0.25ZM1.75 2.25H18.25V12.75H8.23633L5.5 14.9385V12.75H1.75V2.25ZM5.5 6C4.6709 6 4 6.6709 4 7.5C4 8.3291 4.6709 9 5.5 9C6.3291 9 7 8.3291 7 7.5C7 6.6709 6.3291 6 5.5 6ZM10 6C9.1709 6 8.5 6.6709 8.5 7.5C8.5 8.3291 9.1709 9 10 9C10.8291 9 11.5 8.3291 11.5 7.5C11.5 6.6709 10.8291 6 10 6ZM14.5 6C13.6709 6 13 6.6709 13 7.5C13 8.3291 13.6709 9 14.5 9C15.3291 9 16 8.3291 16 7.5C16 6.6709 15.3291 6 14.5 6Z"
                                        fill="#00234D"></path>
                                </svg>
                            </span>
                            <textarea cols="20" rows="6" placeholder="Write your comment here........" name="noi_dung"></textarea>
                        </div>
                @endif
            </div>
        </div>
    </div>
@endsection
