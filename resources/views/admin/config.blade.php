@extends('share.master_page')
@section('content')
    <div class="row">
        <div class="col-md-5 mt-4">
            <div class="card">
                <form action="/admin/config/store" method="post">
                    @csrf
                    <div class="card-header">
                        <h4>Cấu Hình</h4>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Ảnh Nền Background 1</label>
                            <div class="input-group">
                                <input value="{{ $config->bg_home }}" id="hinh_anh" class="form-control" type="text" name="bg_home">
                                <span class="input-group-prepend">
                                    <a id="lfm" data-input="hinh_anh" data-preview="holder" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                            </div>
                            <div id="holder" style="margin-top:15px;max-height:200px;">
                                <img style="height:200px; width:370px" src="{{ $config->bg_home ? $config->bg_home : '/assets_rocker/images/banner/bg_1.jpg' }}" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh Nền Background 2</label>
                            <div class="input-group">
                                <input value="{{ $config->bg_home_1 }}" id="hinh_anh_1" class="form-control" type="text" name="bg_home_1">
                                <span class="input-group-prepend">
                                    <a id="lfm_1" data-input="hinh_anh_1" data-preview="holder_1" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                            </div>
                            <div id="holder_1" style="margin-top:15px;max-height:200px;">
                                <img style="height:200px; width:370px" src="{{ $config->bg_home_1 ? $config->bg_home_1 : '/assets_rocker/images/banner/bg_2.jpg' }}" alt="">
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="">Ảnh Nền Background 3</label>
                            <div class="input-group">
                                <input value="{{ $config->bg_home_2 }}" id="hinh_anh_2" class="form-control" type="text" name="bg_home_2">
                                <span class="input-group-prepend">
                                    <a id="lfm_2" data-input="hinh_anh_2" data-preview="holder_2" class="btn btn-primary">
                                        <i class="fa fa-picture-o"></i> Choose
                                    </a>
                                </span>
                            </div>
                            <div id="holder_2" style="margin-top:15px;max-height:200px;">
                                <img style="height:200px; width:370px" src="{{ $config->bg_home_2 ? $config->bg_home_2 : '/assets_rocker/images/banner/bg_3.jpg' }}" alt="">
                            </div>
                        </div>

                        <div class="form-group mt-3">
                            <label>Địa Điểm 1 Hiển Thị Ở Trang Chủ</label>
                            <select class="form-control" name="dia_diem">
                                @foreach ($danh_sach_dia_diem as $key => $value)
                                    <option
                                        {{ isset($config->dia_diem) && $value->id == $config->dia_diem ? 'selected' : '' }}
                                        value="{{ $value->id }}">{{ $value->tenDiaDiem }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Địa Điểm 2 Hiển Thị Ở Trang Chủ</label>
                            <select class="form-control" name="dia_diem_1">
                                @foreach ($danh_sach_dia_diem as $key => $value)
                                    <option
                                        {{ isset($config->dia_diem_1) && $value->id == $config->dia_diem_1 ? 'selected' : '' }}
                                        value="{{ $value->id }}">{{ $value->tenDiaDiem }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group mt-3">
                            <label>Địa Điểm 3 Hiển Thị Ở Trang Chủ</label>
                            <select class="form-control" name="dia_diem_2">
                                @foreach ($danh_sach_dia_diem as $key => $value)
                                    <option
                                        {{ isset($config->dia_diem_2) && $value->id == $config->dia_diem_2 ? 'selected' : '' }}
                                        value="{{ $value->id }}">{{ $value->tenDiaDiem }}</option>
                                @endforeach
                            </select>
                        </div>

                    </div>
                    <div class="card-footer text-end">
                        <button type="submit" class="btn btn-primary">Cập Nhật Cấu Hình</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
@section('js')
    <script>
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
    <script>
        var route_prefix = "/laravel-filemanager";
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $("#lfm").filemanager('image', {
            prefix: route_prefix
        });
        $("#lfm_1").filemanager('image', {
            prefix: route_prefix
        });
        $("#lfm_2").filemanager('image', {
            prefix: route_prefix
        });
    </script>
@endsection
