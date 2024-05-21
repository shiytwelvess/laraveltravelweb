@extends('share.master_page')
@section('content')
    <div class="row">
        <div class="card mt-4" id="app">
            <div class="card-header">
                <h4>Thông Tin Hóa Đơn Tour</h4>
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
                                <th class="text-center text-nowrap">Ngày Đặt</th>
                                <th class="text-center text-nowrap">Thanh toán</th>
                                <th class="text-center text-nowrap">Tổng Tiền</th>
                                <th class="text-center text-nowrap">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_hoa_don">
                                <td class="text-nowrap text-center align-middle">@{{ key + 1 }}</td>
                                <th class="text-nowrap text-center align-middle">@{{ value.hoTen}}</th>
                                <th class="text-nowrap text-center align-middle">@{{ value.email }}</th>
                                <td class="text-nowrap align-middle">@{{ value.soDienThoai }}</td>
                                <td class="text-nowrap align-middle">@{{ value.diaChi }}</td>
                                <td class="text-nowrap align-middle">@{{ value.created_at }}</td>
                                <td class="text-nowrap text-center align-middle">
                                    <button style="width: 150px" v-on:click='changHD(value.id)' class="btn btn-danger"
                                        v-if="value.trangThai == 0">Chưa Thanh Toán</button>
                                    <button style="width: 150px" v-on:click='changHD(value.id)' class="btn btn-success"
                                        v-else>Đã Thanh Toán</button>
                                </td>
                                <td class="text-center align-middle">@{{formatCurrency(value.tongTien)}}</td>
                                <td class="text-center text-center align-middle">
                                    <button v-on:click='edit = value' class="btn btn-primary" data-bs-toggle="modal"
                                        data-bs-target="#updateModal">Cập Nhật</button>
                                    <button v-on:click='delete_tk = value' class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#delModal">Xóa Hóa Đơn</button>
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
                                    <h5 class="modal-title" id="exampleModalLabel">Hóa Đơn Sẽ Mất Vĩnh Viễn .</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    Bạn có chắc muốn xóa Hóa Đơn
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
                                    <h5 class="modal-title" id="exampleModalLabel">Cập Nhật lại Thông tin</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    {{-- <div class="form-group mt-2">
                                <input v-model="edit.id" type="hidden" class="form-control">
                            </div> --}}
                                    <div class="form-group mt-2">
                                        <label>Họ Và Tên</label>
                                        <input v-model="edit.hoTen" type="text" class="form-control"
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
                                        <label>Tổng Tiền</label>
                                        <input v-model="edit.tongTien" type="text" class="form-control">
                                    </div>

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-primary" v-on:click='updateTk()'
                                        data-bs-dismiss="modal">Đồng
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
                    list_hoa_don: [],
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
                            .get('/admin/hoa-don-tour/data')
                            .then((res) => {
                                this.list_hoa_don = res.data.data;
                                // this.loadData();
                            });
                    },
                    deleteTk() {
                        axios
                            .post('/admin/hoa-don-tour/delete', this.delete_tk)
                            .then((res) => {
                                toastr.success('Xóa Thành Công !!');
                                this.loadData();

                            });
                    },
                    updateTk() {
                        axios
                            .post('/admin/hoa-don-tour/update', this.edit)
                            .then((res) => {
                                toastr.success('Cập Nhật Thành Công');
                                this.loadData();

                            });
                    },
                    changHD(id) {
                        axios
                            .get('/admin/hoa-don-tour/change-status/' + id)
                            .then((res) => {
                                toastr.success('Cập Nhật Thành Công');
                                this.loadData();
                            });
                    },
                    formatCurrency(value) {
                        return new Intl.NumberFormat("vi-VI", {
                            style: "currency",
                            currency: "VND"
                        }).format(value);
                    },

                },
            });
        </script>
    @endsection
