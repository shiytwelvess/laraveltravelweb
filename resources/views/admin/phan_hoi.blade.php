@extends('share.master_page')
@section('content')


    <div class="row" id="app">



        <div>
            <div class="col-md-12 mt-4">
                <div class="card border-danger border-bottom border-3 border-0">
                    <div class="card-header">
                        Danh Sách Phản Hồi
                    </div>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="text-center">#</th>
                                    <th class="text-center">Họ Và Tên</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Số Điện Thoại</th>
                                    <th class="text-center">Nội Dung Phản Hồi</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(value, key) in list_phan_hoi">
                                    <th class="text-center align-middle">@{{ key + 1 }}</th>
                                    <td class="text-center align-middle">@{{ value.hoTen }}</td>
                                    <td class="text-center align-middle">@{{ value.email }}</td>
                                    <td class="text-center align-middle">@{{ value.soDienThoai }}</td>
                                    <td class="text-center align-middle">
                                        <button class="btn btn-info" v-on:click="noiDung = value.noiDung"
                                            data-bs-toggle="modal" data-bs-target="#noidungModal">Nội dung</button>
                                    </td>
                                    <td class="text-center">
                                        <button v-on:click='del = value' class="btn btn-danger " data-bs-toggle="modal"
                                            data-bs-target="#del">Xóa Bài</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal fade" id="noidungModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Nội dung bài viết</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea disabled cols="30" rows="10" class="form-control">@{{ noiDung }}</textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Đóng</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="del" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <input type="text" v-model='del.id'>
                                <div class="modal-body">
                                    Bạn Muốn xóa tài khoản @{{ del.hoTen }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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
@endsection
@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                list_phan_hoi: [],
                del: {},
            },
            created() {
                this.loadData();
            },
            methods: {
                loadData() {
                    axios
                        .get('/admin/phan-hoi/data')
                        .then((res) => {
                            this.list_phan_hoi = res.data.data;
                            this.loadData();
                        });
                },
                delPhanHoi() {
                    axios
                        .post('/admin/delete/destroy', this.del)
                        .then((res) => {
                            this.loadData();
                        });
                },
            },
        });
    </script>
@endsection
