@extends('share.master_page')
@section('content')
    <div class="row" id="app">
        <div id="app" class="row mt-3">
            <div class="col-md-4">
                <div class="card border-danger border-bottom border-3 border-0">
                    <div class="card-header">
                        Thêm Mới Nhân Sự
                    </div>
                    <div class="card-body">
                        <div class="form-group mt-1">
                            <label>Tên Nhân Sự</label>
                            <input v-model="them_moi.ho_va_ten" type="text" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                            <label>Email Nhân Sự</label>
                            <input v-model="them_moi.email" type="email" class="form-control">
                        </div>
                        <div class="form-group mt-1">
                            <label>Mật Khẩu Nhân Sự</label>
                            <input v-model="them_moi.password" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="card-footer text-end">
                        <button v-on:click="themMoiNhanSu()" class="btn btn-primary">Thêm Mới</button>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card border-danger border-bottom border-3 border-0">
                    <div class="card-header">
                        Danh Sách Nhân Sự
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Họ Và Tên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Tình Trạng</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in data">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                    <td class="text-center align-middle">@{{ value.ho_va_ten }}</td>
                                    <td class="text-center align-middle">@{{ value.email }}</td>
                                    <td class="text-center align-middle">
                                        <button v-on:click='change(value.id)' v-if="value.is_block == 0"
                                            class="btn btn-success">Đang Hoạt Động</button>
                                        <button v-on:click='change(value.id)' v-else class="btn btn-warning">Dừng Hoạt
                                            Động</button>
                                    </td>
                                    <td class="text-center align-middle">
                                        <button v-on:click='del = value' class="btn btn-danger " data-bs-toggle="modal"
                                            data-bs-target="#del">Xóa Tài Khoản</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal fade" id="del" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <input type="hidden" v-model='del.id'>
                                    <div class="modal-body">
                                        Bạn Muốn xóa tài khoản @{{ del.ho_va_ten }}
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" data-bs-dismiss="modal"
                                            v-on:click='delTk()'>Save changes</button>
                                    </div>
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
                them_moi: {},
                data: [],
                del: {},
            },
            created() {
                this.loadData();
            },
            methods: {
                themMoiNhanSu() {
                    axios
                        .post('/admin/nhan-su/create', this.them_moi)
                        .then((res) => {
                            toastr.success("Đã thêm mới nhân sự thành công!");
                            this.loadData();
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });

                },
                loadData() {
                    axios
                        .get('/admin/nhan-su/data')
                        .then((res) => {
                            this.data = res.data.data;
                        });
                },
                delTk() {
                    axios
                        .post('/admin/nhan-su/delete', this.del)
                        .then((res) => {
                            this.loadData();
                            toastr.success('Xóa Thành Công');
                        })
                        .catch((res) => {
                            $.each(res.response.data.errors, function(k, v) {
                                toastr.error(v[0]);
                            });
                        });
                },
                change(id) {
                    axios
                        .get('/admin/nhan-su/change-status/' + id)
                        .then((res) => {
                            toastr.success('Cập Nhật Thành Công');
                            this.loadData();
                        });
                },
            },
        });
    </script>
@endsection
