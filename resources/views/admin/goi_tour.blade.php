@extends('share.master_page')
@section('content')
    <div class="row" id="app">
        <div class="col-md-5">
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Chuyên Mục Gói Tuor</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tên Gói Tuor</label>
                        <input v-on:keyup="chuyenSlug()" v-model='create_goi_tour.tenTour' type="text"
                            class="form-control mb-2" placeholder="Tên Gói Tour">
                    </div>
                    <div class="form-group">
                        <label>Slug </label>
                        <input v-model="slug" type="text" class="form-control" placeholder="Nhập vào slug tên gói tour">
                    </div>
                    <div class="form-group">
                        <label for="">Tên Địa điểm</label>
                        <select v-model='create_goi_tour.idDiaDiem' name="" id="" class="form-control mb-2">
                            <template v-for='(value,key) in list_diaChi'>
                                <option v-bind:value="value.id">@{{ value.tenDiaDiem }}</option>
                            </template>
                        </select>
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
                        <textarea id="moTa-editor" v-model='create_goi_tour.moTa' class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Giờ và ngày bắt đầu</label>
                        <input v-model='create_goi_tour.thoiGianBatDau' type="datetime-local" class="form-control mb-2">
                    </div>
                    <div class="form-group">
                        <label for="">Giờ và ngày kết thúc</label>
                        <input v-model='create_goi_tour.thoiGianKetThuc' type="datetime-local" class="form-control mb-2">
                    </div>
                    <div class="form-group">
                        <label for="">Giá Cả</label>
                        <input v-model='create_goi_tour.gia' type="number" class="form-control mb-2"
                            placeholder="Nhập giá">
                    </div>
                    <div class="form-group">
                        <label for="">Trạng Thái</label>
                        <select v-model='create_goi_tour.trangThai' name="" id="" class="form-control">
                            <option value="0">Ẩn</option>
                            <option value="1">Hiển Thị</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="">Điểm Đón</label>
                        <input v-model='create_goi_tour.diemDon' type="text" class="form-control mb-2"
                            placeholder="Nhập điểm đón ">
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary" v-on:click='createGoiTour()'>Thêm mới</button>
                </div>
            </div>
        </div>
        <div class="col-md-7 mt-3">
            <div class="card">
                <div class="card-header">
                    <h4>Danh Sách Gói Tour</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center">#</th>
                                    <th class="align-middle text-center">Tên Gói Tuor</th>
                                    <th class="align-middle text-center">Slug </th>
                                    <th class="align-middle text-center">Tên Địa Điểm</th>
                                    <th class="align-middle text-center">Hình Ảnh</th>
                                    <th class="align-middle text-center">Mô Tả</th>
                                    <th class="align-middle text-center">Thời Gian Bắt Đầu</th>
                                    <th class="align-middle text-center">Thời Gian Kết Thúc</th>
                                    <th class="align-middle text-center">Giá Cả</th>
                                    <th class="align-middle text-center">Trạng Thái</th>
                                    <th class="align-middle text-center">Điểm Đón </th>
                                    <th class="align-middle text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for='(value , key) in list_goi_tour'>
                                    <td class="align-middle text-center">@{{ key + 1 }}</td>
                                    <td class="align-middle text-center"><b class="text-danger">@{{ value.tenTour }}</b>
                                    </td>
                                    <td class="align-middle text-center">@{{ value.slug }}</td>
                                    <td class="align-middle text-center">@{{ value.tenDiaDiem }}</td>
                                    <td class="align-middle">
                                        <img v-bind:src="value.hinh_anh" style="width: 50px;height:30px">
                                    </td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-info" v-on:click="moTa = value.moTa"
                                            data-bs-toggle="modal" data-bs-target="#motanganModal">Mô tả</button>
                                    </td>
                                    <td class="align-middle text-center">@{{ value.thoiGianBatDau }}</td>
                                    <td class="align-middle text-center">@{{ value.thoiGianKetThuc }}</td>
                                    <td class="align-middle text-center text-danger">@{{ formatCurrency(value.gia) }}</td>
                                    <td class="align-middle text-center">@{{ value.trangThai === 0 ? 'Ẩn' : 'Hiện' }}</td>
                                    <label for="value.trangThai">Trạng Thái</label>
                                    <select name="" id="" class="form-control">
                                        <option value="0">Ẩn</option>
                                        <option value="1">Hiển Thị</option>
                                    </select>
                                    <td class="align-middle text-center">@{{ value.diemDon }}</td>
                                    <td class="align-middle text-center">
                                        <button class="btn btn-primary"style="width: 100px" data-bs-toggle="modal"
                                            data-bs-target="#upModal" v-on:click='showUpdata(value)'>Cập Nhật</button>
                                        <button class="btn btn-danger" style="width: 100px" data-bs-toggle="modal"
                                            data-bs-target="#deleteModal" v-on:click='del_goi_tour = value'> Xóa</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" v-model='del_goi_tour.id'>
                                    Bạn có muốn xóa Tour <b class="text-danger">@{{ del_goi_tour.tenTour }}</b> với giá <b
                                        class="text-danger">@{{ del_goi_tour.gia }}</b> ?
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Đóng</button>
                                    <button type="button" class="btn btn-primary" v-on:click='delGoiTuor()'
                                        data-bs-dismiss="modal">Lưu thay đổi</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="upModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Gói Tour</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" v-model='up_goi_tour.id'>
                                    <div class="form-group">
                                        <label for="">Tên Gói Tour</label>
                                        <input v-model='up_goi_tour.tenTour' type="text" class="form-control mb-2"
                                            placeholder="Tên Gói Tour">
                                    </div>
                                    <div class="form-group mt-3">
                                        <label>Slug </label>
                                        <input v-model="up_goi_tour.slug" type="text" class="form-control"
                                            placeholder="Nhập vào slug ">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Tên Địa điểm</label>
                                        <select v-model='up_goi_tour.idDiaDiem' name="" id=""
                                            class="form-control mb-2">
                                            <template v-for='(value,key) in list_diaChi'>
                                                <option v-bind:value="value.id">@{{ value.tenDiaDiem }}</option>
                                            </template>
                                        </select>
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
                                        <textarea v-model='up_goi_tour.moTa' type="text" class="form-control" cols="30" rows="10"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thời Gian Bắt Đầu</label>
                                        <input v-model='up_goi_tour.thoiGianBatDau' type="datetime-local"
                                            class="form-control mb-2">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Thời Gian Kết Thúc</label>
                                        <input v-model='up_goi_tour.thoiGianKetThuc' type="datetime-local"
                                            class="form-control mb-2">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Giá Cả</label>
                                        <input v-model='up_goi_tour.gia' type="number" class="form-control mb-2"
                                            placeholder="Nhập giá">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Trạng Thái</label>
                                        <select v-model='up_goi_tour.trangThai' name="" id=""
                                            class="form-control">
                                            <option value="0">Ẩn</option>
                                            <option value="1">Hiển Thị</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Điểm Đón</label>
                                        <input v-model='up_goi_tour.diemDon' type="text" class="form-control mb-2"
                                            placeholder="Nhập điểm đến ">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                        v-on:click='upGoiTour()'>Xác Nhận</button>
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
                create_goi_tour: {},
                list_diaChi: [],
                list_goi_tour: [],
                del_goi_tour: {},
                up_goi_tour: {},
                slug: '',
                moTa: '',
            },
            created() {
                this.loadDiaChi();
                this.loadGoiTour();
            },
            methods: {
                showUpdata(value) {
                    this.up_goi_tour = value;
                    $("#hinh_anh_1").val(value.hinh_anh);
                    var text = '<img src="' + value.hinh_anh + '" style="margin-top:15px;max-height:100px;">'
                    $("#holder1").html(text);
                },
                createGoiTour() {
                    const editorData = CKEDITOR.instances['moTa-editor'].getData();
                    this.create_goi_tour.moTa = editorData;
                    this.create_goi_tour.slug = this.slug;
                    this.create_goi_tour.hinh_anh = $("#hinh_anh").val();
                    // console.log(this.create_goi_tour.hinh_anh);
                    axios
                        .post('/admin/goi-tour/index', this.create_goi_tour)
                        .then((res) => {
                            toastr.success('Thêm mới thành công');
                            this.loadGoiTour();
                            this.create_goi_tour = {};
                            this.slug = '';
                            this.slug = '';
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },

                loadDiaChi() {
                    axios
                        .get('/admin/dia-diem/data')
                        .then((res) => {
                            this.list_diaChi = res.data.data;
                        });
                },
                loadGoiTour() {
                    axios
                        .get('/admin/goi-tour/data')
                        .then((res) => {
                            this.list_goi_tour = res.data.data;
                        });
                },
                delGoiTuor() {

                    axios
                        .get('/admin/goi-tour/delete/' + this.del_goi_tour.id)
                        .then((res) => {
                            toastr.success('Xóa thành công');
                            this.loadGoiTour();
                        });
                },
                upGoiTour() {
                    this.up_goi_tour.hinh_anh = $("#hinh_anh_1").val();
                    axios
                        .post('/admin/goi-tour/update', this.up_goi_tour)
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
                    this.slug = this.toSlug(this.create_goi_tour.tenTour);
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
        document.addEventListener("DOMContentLoaded", function() {
            CKEDITOR.replace('moTa-editor').on('change', () => {
                this.create_goi_tour.moTa = CKEDITOR.instances['moTa-editor'].getData();
            });
        });
    </script>
@endsection
