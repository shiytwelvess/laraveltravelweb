@extends('share.master_page')
@section('content')
    <div class="row">
        <div class="card mt-4">
            <div class="col-md-12">
                <div class="card-header">
                    <h4>Chuyên Mục Đặt Tuor</h4>
                </div>
                <div class="card-body">
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Gói Tuor</label>
                                <select name="" id="" class="form-control">
                                    <option value="1">XX</option>
                                    <option value="0">XX</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tên Khách Hàng </label>
                                <input type="text" class="form-control" placeholder="Điền tên khách hàng ">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Thông tin liên lạc</label>
                                <input type="text" class="form-control" placeholder="Điền thông tin liên lạc">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Ngày Khởi hành </label>
                                <input type="date" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Số Lượng Người</label>
                                <input type="integer" class="form-control" placeholder="Điền số người mua">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Tình Trạng</label>
                                <select name="" id="" class="form-control">
                                    <option value="1">XX</option>
                                    <option value="0">XX</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-end">
                    <button class="btn btn-primary">Thêm Mới Đặt Tour</button>
                </div>  
            </div>
        </div>
    </div>
@endsection
