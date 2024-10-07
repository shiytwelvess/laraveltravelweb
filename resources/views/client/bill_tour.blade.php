@extends('client.master')
@section('noi_dung')
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
                                <th class="text-center text-nowrap text-danger">#</th>
                                <th class="text-center text-nowrap text-danger">Họ Và Tên</th>
                                <th class="text-center text-nowrap text-danger">Tên Tour</th>
                                <th class="text-center text-nowrap text-danger">Số Tour</th>
                                <th class="text-center text-nowrap text-danger">Email</th>
                                <th class="text-center text-nowrap text-danger">Số Điện Thoại</th>
                                <th class="text-center text-nowrap text-danger">Địa Chỉ</th>
                                <th class="text-center text-nowrap text-danger">Ngày Đặt</th>

                                <th class="text-center text-nowrap text-danger">Tổng Tiền</th>

                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="(value, key) in list_hoa_don">
                                <td class="text-nowrap text-center align-middle">@{{ key + 1 }}</td>
                                <th class="text-nowrap text-center align-middle">@{{ value.hoTen }}</th>
                                <th class="text-nowrap text-center align-middle">@{{ value.tenTour }}</th>
                                <th class="text-nowrap text-center align-middle">@{{ value.soVe }}</th>
                                <th class="text-nowrap text-center align-middle">@{{ value.email }}</th>
                                <td class="text-nowrap text-center align-middle">@{{ value.soDienThoai }}</td>
                                <td class="text-nowrap text-center align-middle">@{{ value.diaChi }}</td>
                                <td class="text-nowrap text-center align-middle">@{{ value.created_at }}</td>
                                <td class="text-nowrap text-center align-middle">@{{ formatCurrency(value.tongTien) }}</td>
                            </tr>
                        </tbody>
                    </table>
                    {{-- Modal Xóa dữ liệu  --}}

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

            },
            created() {
                this.loadData();
            },
            methods: {
                loadData() {
                    axios
                        .get('/bill-tour/data')
                        .then((res) => {
                            this.list_hoa_don = res.data.data;
                            // this.loadData();
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
