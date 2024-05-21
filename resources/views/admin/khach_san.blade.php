@extends('share.master_page')
@section('content')
    <div class="row" id="app">
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Chuyên Mục Khách Sạn</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tên Khách Sạn</label>
                        <input v-on:keyup="chuyenSlug()" v-model='create_ks.tenKhachSan' type="text"
                            class="form-control mb-2" placeholder="Nhập Tên Khách Sạn">
                    </div>
                    <div class="form-group">
                        <label for="">Slug Khách Sạn</label>
                        <input v-model='slug' type="text" class="form-control mb-2" placeholder="Slug">
                    </div>
                    <div class="form-group">
                        <label for="">Địa Chỉ</label>
                        <input v-model='create_ks.diaChi' type="text" class="form-control mb-2"
                            placeholder="Nhập Địa Chỉ">
                    </div>
                    <div class="form-group">
                        <label for="">Hình Ảnh</label>
                        <div class="input-group">
                            <input id="hinh_anh" class="form-control" type="text" name="filepath">
                            <span class="input-group-prepend">
                                <a id="lfm" data-input="hinh_anh" data-preview="holder" class="btn btn-primary">
                                    <i class="fa fa-picture-o"></i> Choose
                                </a>
                            </span>
                        </div>
                        <div id="holder" style="margin-top:15px;max-height:100px;"></div>
                    </div>
                    <div class="form-group">
                        <label for="">Mô Tả</label>
                        <textarea id="moTa-editor" v-model='create_ks.moTa' type="text" class="form-control"
                            placeholder="Mô tả"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Loại Phòng</label>
                        <select v-model='create_ks.loaiPhong' name="" id="" class="form-control">
                            <option value="0">Vip</option>
                            <option value="1">Bình thường</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Số Giường</label>
                        <select v-model='create_ks.soGiuong' name="" id="" class="form-control">
                            <option value="1">1 Giường Ngủ</option>
                            <option value="2">2 Giường Ngủ</option>
                            <option value="3">3 Giường Ngủ</option>
                            <option value="4">4 Giường Ngủ</option>
                            <option value="5">5 Giường Ngủ</option>
                            <option value="6">6 Giường Ngủ</option>
                            <option value="7">7 Giường Ngủ</option>
                            <option value="8">8 Giường Ngủ</option>
                            <option value="9">9 Giường Ngủ</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Số Ngày</label>
                        <input v-model='create_ks.soNgay' type="number" class="form-control mb-2"
                            placeholder="Nhập số ngày">
                    </div>
                    <div class="form-group">
                        <label for="">Số Đêm</label>
                        <input v-model='create_ks.soDem' type="number" class="form-control mb-2"
                            placeholder="Nhập số Đêm">
                    </div>
                    <div class="form-group">
                        <label for="">Giá Cả</label>
                        <input v-model='create_ks.gia' type="number" class="form-control mb-2" placeholder="Nhập giá">
                    </div>
                    <div class="form-group">
                        <label for="">Thông Tin Liên Lạc</label>
                        <input v-model='create_ks.lienLac' type="text"
                            class="form-control mb-2"placeholder="Nhập thông tin liên lạc">
                    </div>
                    <div class="form-group">
                        <label for="">Tình Trạng</label>
                        <select v-model='create_ks.trangThai' name="" id="" class="form-control">
                            <option value="0">Hết Phòng</option>
                            <option value="1">Còn Phòng</option>
                        </select>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" v-on:click='createKS()'>Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-8 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Danh Sách Khách Sạn </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">Tên Khách Sạn</th>
                                    <th class="align-middle text-center">Slug </th>
                                    <th class="align-middle text-center">Địa Chỉ</th>
                                    <th class="align-middle text-center">Hình Ảnh</th>
                                    <th class="align-middle text-center">Mô Tả</th>
                                    <th class="align-middle text-center">Loại Phòng</th>
                                    <th class="align-middle text-center">Số Giường</th>
                                    <th class="align-middle text-center">Số Ngày</th>
                                    <th class="align-middle text-center">Số Đêm</th>
                                    <th class="align-middle text-center">Giá</th>
                                    <th class="align-middle text-center">Thông Tin Liên Lạc</th>
                                    {{-- <th class="align-middle text-center">Tình Trạng</th> --}}
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>

                                <tr v-for='(value , key) in list_ks'>
                                    <td class="align-middle text-center">@{{ key + 1 }}</td>
                                    <td class="align-middle text-center"><b class="text-danger">@{{ value.tenKhachSan }}</b>
                                    <td class="align-middle text-center">@{{ value.slug }}</td>
                                    </td>
                                    <td class="align-middle text-center">@{{ value.diaChi }}</td>
                                    <td class="align-middle">
                                        <img v-bind:src="value.hinh_anh" style="width: 50px;height:30px">
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-info" v-on:click="moTa = value.moTa" data-bs-toggle="modal"
                                            data-bs-target="#motanganModal">Mô tả</button>
                                    </td>
                                    {{-- <td class="align-middle text-center">@{{ value.moTa }}</td> --}}
                                    <td class="align-middle text-center">@{{ value.loaiPhong === 0 ? 'Vip' : 'Bình Thường'}}</td>
                                    <td class="align-middle text-center">@{{ value.soGiuong }}</td>
                                    <td class="align-middle text-center">@{{ value.soNgay }}</td>
                                    <td class="align-middle text-center">@{{ value.soDem }}</td>
                                    <td class="align-middle text-center text-danger">@{{ formatCurrency(value.gia) }}</td>
                                    {{-- <td class="align-middle text-center">@{{ value.gia }}</td> --}}
                                    <td class="align-middle text-center">@{{ value.lienLac }}</td>


                                    {{-- <td class="align-middle text-center">@{{ value.trangThai === 0 ? 'Hết Phòng' : 'Còn Phòng' }}</td> --}}

                                    <td class="align-middle text-center">
                                        <button class="btn btn-primary"style="width: 100px" data-bs-toggle="modal"
                                            data-bs-target="#upModal" v-on:click='showUpdata(value)'>Cập Nhật</button>
                                        <button class="btn btn-danger" style="width: 100px" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" v-on:click='del_ks = value'> Xóa</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>



                    <div class="modal fade" id="motanganModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Mô tả</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <textarea disabled id="ckeditorInstance" cols="30" rows="10" class="form-control">@{{ moTa }}</textarea>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary"
                                    data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </div>
                    </div>
                </div>

                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa Khách Sạn</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" v-model='del_ks.id'>
                                    Bạn có muốn xóa khách sạn<b class="text-danger">@{{ del_ks.ten_khac_san }}</b> với giá <b
                                        class="text-danger">@{{ del_ks.gia }}</b> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-primary" v-on:click='delKs()'
                                        data-bs-dismiss="modal">Xác Nhận</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="upModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Khách Sạn</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" v-model='up_ks.id'>
                                    <div class="form-group">
                                        <label for="">Tên Khách Sạn</label>
                                        <input v-model='up_ks.tenKhachSan' type="text" class="form-control mb-2"
                                            placeholder="Nhập Tên Khách Sạn">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Slug Khách Sạn </label>
                                        <input v-model="up_ks.slug" type="text" class="form-control"
                                            placeholder="Nhập vào slug ">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Địa Chỉ</label>
                                        <input v-model='up_ks.diaChi' type="text" class="form-control mb-2"
                                            placeholder="Nhập Địa Điểm ">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Hình Ảnh</label>
                                        <div class="input-group">
                                            <input id="hinh_anh_1" class="form-control" type="text" name="filepath">
                                            <span class="input-group-prepend">
                                                <a id="lfm1" data-input="hinh_anh_1" data-preview="holder1"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-picture-o"></i> Choose
                                                </a>
                                            </span>
                                        </div>
                                        <div id="holder1" style="margin-top:15px;max-height:100px;"></div>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Mô Tả</label>
                                        <input v-model='up_ks.moTa' type="text" class="form-control mb-2"
                                            placeholder="Mô tả ngắn gọn ">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Loại Phòng</label>
                                        <select v-model='up_ks.loaiPhong' name="" id=""
                                            class="form-control">
                                            <option value="0">Vip</option>
                                            <option value="1">Bình thường</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số Giường</label>
                                        <select v-model='up_ks.soGiuong' name="" id=""
                                            class="form-control">
                                            <option value="1">1 Giường Ngủ</option>
                                            <option value="2">2 Giường Ngủ</option>
                                            <option value="3">3 Giường Ngủ</option>
                                            <option value="4">4 Giường Ngủ</option>
                                            <option value="5">5 Giường Ngủ</option>
                                            <option value="6">6 Giường Ngủ</option>
                                            <option value="7">7 Giường Ngủ</option>
                                            <option value="8">8 Giường Ngủ</option>
                                            <option value="9">9 Giường Ngủ</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số Ngày</label>
                                        <input v-model='up_ks.soNgay' type="number" class="form-control mb-2"
                                            placeholder="Nhập số ngày">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Số Đêm</label>
                                        <input v-model='up_ks.soDem' type="number" class="form-control mb-2"
                                            placeholder="Nhập số ngày">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá Cả</label>
                                        <input v-model='up_ks.gia' type="number" class="form-control mb-2"
                                            placeholder="Nhập giá">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thông Tin Liên Lạc</label>
                                        <input v-model='up_ks.lienLac' type="text"
                                        class="form-control mb-2" placeholder="Nhập thông tin liên lạc">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tình Trạng</label>
                                        <select v-model='up_ks.trangThai' name="" id=""
                                            class="form-control">
                                            <option value="0">Hết Phòng</option>
                                            <option value="1">Còn Phòng</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                        v-on:click='upKS()'>Lưu thay đổi</button>
                                </div>
                            </div>
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
            el: '#app',
            data: {
                create_ks: {},
                list_ks: [],
                del_ks: {},
                up_ks: {},
                slug: '',
                moTa:'',
            },
            created() {
                this.loadKS();
            },
            methods: {
                showUpdata(value) {
                    this.up_ks = value;

                    $("#hinh_anh_1").val(value.hinh_anh);
                    var text = '<img src="' + value.hinh_anh + '" style="margin-top:15px;max-height:100px;">'
                    $("#holder1").html(text);
                },
                createKS() {
                    const editorData = CKEDITOR.instances['moTa-editor'].getData();
                    this.create_ks.moTa = editorData;

                    this.create_ks.hinh_anh = $("#hinh_anh").val();
                    this.create_ks.slug = this.slug;
                    axios
                        .post('/admin/khach-san/index', this.create_ks)
                        .then((res) => {
                            toastr.success('Thêm mới thành công');
                            this.loadKS();
                            this.create_ks = {};
                            this.slug = '';
                            this.slug = '';
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });

                },
                loadKS() {
                    axios
                        .get('/admin/khach-san/data')
                        .then((res) => {
                            this.list_ks = res.data.data;

                            // this.loadKS();
                        });
                },
                delKs() {
                    axios
                        .post('/admin/khach-san/delete', this.del_ks)
                        .then((res) => {
                            toastr.success('Xóa thành công');
                            this.loadKS();
                        });
                },
                upKS() {
                    this.up_ks.hinh_anh = $("#hinh_anh_1").val();
                    axios
                        .post('/admin/khach-san/update', this.up_ks)
                        .then((res) => {
                            toastr.success('Cập nhật thành công');
                            this.loadGoiTour();
                        });
                },
                formatCurrency(value) {
                    return new Intl.NumberFormat("vi-VI", {
                        style: "currency",
                        currency: "VND"
                    }).format(value);
                },
                toSlug(str) {
                    str = str.toLowerCase();
                    str = str
                        .normalize('NFD')
                        .replace(/[\u0300-\u036f]/g, '');
                    str = str.replace(/[đĐ]/g, 'd');
                    str = str.replace(/([^0-9a-z-\s])/g, '');
                    str = str.replace(/(\s+)/g, '-');
                    str = str.replace(/-+/g, '-');
                    str = str.replace(/^-+|-+$/g, '');

                    return str;
                },
                chuyenSlug() {
                    this.slug = this.toSlug(this.create_ks.tenKhachSan);
                },
            },
        });
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/ckeditor/4.19.1/ckeditor.js"></script>
    <script></script>
    <script>
        var route_prefix = "/laravel-filemanager";
    </script>
    <script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>
    <script>
        $("#lfm").filemanager('image', {
            prefix: route_prefix
        });
        $("#lfm1").filemanager('image', {
            prefix: route_prefix
        });
    </script>
    <script src="//cdn.ckeditor.com/4.21.0/full/ckeditor.js"></script>
    <script type="text/javascript">
        document.addEventListener("DOMContentLoaded", function () {
            CKEDITOR.replace('moTa-editor').on('change', () => {
                this.create_ks.moTa = CKEDITOR.instances['moTa-editor'].getData();
            });
        });
        </script>
@endsection
