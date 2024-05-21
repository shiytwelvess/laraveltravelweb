@extends('share.master_page')
@section('content')
    <div class="row">
        <div class="card mt-4" id="app">
            <div class="card-header">
                <h4>Thông Tin Khách Hàng</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="text-center text-nowrap">#</th>
                                <th class="text-center text-nowrap">Họ Và Tên</th>
                                <th class="text-center text-nowrap">Email</th>
                                <th class="text-center text-nowrap">Số Điện Thoại</th>
                                <th class="text-center text-nowrap">Địa Chỉ</th>
                                <th class="text-center text-nowrap">Ngày Sinh</th>
                                <th class="text-center text-nowrap">Giới Tính</th>
                                <th class="text-center text-nowrap">Loại Tài Khoản</th>
                                <th class="text-center text-nowrap">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_khach_hang">
                                <td class="text-nowrap text-center align-middle">@{{ key + 1 }}</td>
                                <th class="text-nowrap text-center align-middle">@{{ value.hoTen}}</th>
                                <th class="text-nowrap text-center align-middle">@{{ value.email }}</th>
                                <td class="text-nowrap align-middle">@{{ value.soDienThoai }}</td>
                                <td class="text-nowrap align-middle">@{{ value.diaChi }}</td>
                                <td class="text-nowrap text-center align-middle">@{{ value.ngaySinh }}</td>
                                <td class="text-nowrap text-center align-middle">
                                    <button style="width: 135px" class="btn btn-light"
                                        v-if="value.gioiTinh == 1">Nam</button>
                                    <button style="width: 135px" class="btn btn-dark" v-else>Nữ</button>
                                </td>
                                    <td class="text-nowrap text-center align-middle">
                                        <button style="width: 135px" v-on:click='changeTk(value.id)' class="btn btn-danger" v-if="value.trangThai == -1">Tạm Khóa</button>
                                        <button style="width: 135px" v-on:click='changeTk(value.id)' class="btn btn-success" v-if="value.trangThai == 1">Đang Mở</button>
                                        <button style="width: 135px" v-on:click='changeTk(value.id)' class="btn btn-warning" v-if="value.trangThai == 0">Chưa Kích Hoạt</button>
                                    </td>

                                <td class="text-nowrap text-center align-middle">
                                    {{-- <button v-on:click='edit = value' class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#updateModal">Cập Nhật</button> --}}
                                    <button v-on:click='delete_tk = value' class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delModal">Xóa Tài Khoản</button>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- Modal Xóa dữ liệu  --}}
                    <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa Tài Khoản Sẽ Mất Vĩnh Viễn .</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>

                                <div class="modal-body">

                                    Bạn có chắc muốn xóa tài khoản
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                        v-on:click='deleteTk()'>Đồng ý</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end --}}
                    {{-- Modal cập nhật dữ liệu  --}}
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật lại tài khoản</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- <div class="form-group mt-2">
                                <input v-model="edit.id" type="hidden" class="form-control">
                            </div> --}}
                                    <div class="form-group mt-2">
                                        <label>Họ Và Tên</label>
                                        <input v-model="edit.hoTen type="text" class="form-control"
                                            placeholder="Nhập họ tên ...">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Email</label>
                                        <input v-model="edit.email" type="text" class="form-control"
                                            placeholder="Nhập email ...">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Số Điện Thoại</label>
                                        <input v-model="edit.soDienThoai" type="text" class="form-control"
                                            placeholder="Nhập số điện thoại ...">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Địa Chỉ</label>
                                        <input v-model="edit.diaChi" type="text" class="form-control"
                                            placeholder="Nhập dịa chỉ ...">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Ngày Sinh</label>
                                        <input v-model="edit.ngaySinh" type="date" class="form-control">
                                    </div>
                                    <div class="form-group mt-2">
                                        <label>Giới Tính</label>
                                        <select v-model="edit.gioiTinh" class="form-control">
                                            <option value="1">Nam</option>
                                            <option value="0">Nữ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-primary" v-on:click='updateTk()'>Đồng
                                        ý</button>
                                </div>
                            </div>

                        </div>
                        {{-- end  --}}
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
                    list_khach_hang: [],
                    delete_tk: {},
                    edit: {},
                    change: {},

                },
                created() {
                    this.loadData();
                },
                methods: {
                    loadData() {
                        axios
                            .get('/admin/khach-hang/data')
                            .then((res) => {
                                this.list_khach_hang = res.data.data;
                                this.loadData();
                            });
                    },
                    deleteTk() {
                        axios
                            .post('/admin/khach-hang/delete', this.delete_tk)
                            .then((res) => {
                                toastr.success('Xóa Thành Công !!');
                                this.loadData();

                            });
                    },
                    updateTk() {
                        axios
                            .post('/admin/khach-hang/update', this.edit)
                            .then((res) => {
                                toastr.success('Cập Nhật Thành Công');
                                this.loadData();

                            });
                    },
                    changeTk(id) {
                        axios
                            .get('/admin/khach-hang/change-status/' + id)
                            .then((res) => {
                                toastr.success('Cập Nhật Thành Công');
                                this.loadData();
                            });
                    }
                },
            });
        </script>
    @endsection
