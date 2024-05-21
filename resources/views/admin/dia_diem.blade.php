@extends('share.master_page')
@section('content')
    <div class="row" id="app">
        <div class="col-md-4">
            <div class="card mt-3">
                <div class="card-header">
                    <h4>Chuyên Mục Địa Điểm</h4>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="">Tên Địa Điểm</label>
                        <input v-model='create_dia_diem.tenDiaDiem' type="text" class="form-control mb-2">
                    </div>
                    <div class="form-group">
                        <label for="">Địa Chỉ</label>
                        <input v-model='create_dia_diem.diaChi' type="text" class="form-control mb-2">
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
                        <textarea id="moTa-editor" v-model='create_dia_diem.moTa' class="form-control" cols="30" rows="10"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="">Thông Tin Liên Lạc</label>
                        <input v-model='create_dia_diem.lienLac' type="text" class="form-control mb-2">
                    </div>
                    <div class="form-group">
                        <label for="">Trạng Thái</label>
                        <select name="" id="" class="form-control mb-2"
                            v-model='create_dia_diem.trangThai'>
                            <option value="1">Đang Hoạt Động</option>
                            <option value="0">Dừng Hoạt Động</option>
                        </select>
                    </div>
                    <div class="card-footer text-end">
                        <button v-on:click='createDiaDiem()' class="btn btn-primary">Thêm Mới</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="card mt-3">
                <div class="card-header">
                    Danh Sách Địa Điểm
                </div>
                <div class="card-body">
                    <div class="table-responsive ">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="align-middle text-center text-nowrap">#</th>
                                    <th class="align-middle text-center text-nowrap">Tên Địa Điểm</th>
                                    <th class="align-middle text-center text-nowrap">Địa Chỉ</th>
                                    <th class="align-middle text-center text-nowrap">Hình Ảnh</th>
                                    <th class="align-middle text-center text-nowrap">Mô Tả</th>
                                    <th class="align-middle text-center text-nowrap">Thông Tin Liên Lạc </th>
                                    <th class="align-middle text-center text-nowrap">Trạng Thái</th>
                                    <th class="align-middle text-center text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody v-for='(value , key) in list_dia_diem'>
                                <th class="align-middle text-center text-nowrap">@{{ key + 1 }}</th>
                                <td class="align-middle text-center text-nowrap">@{{ value.tenDiaDiem }}</td>
                                <td class="align-middle text-center text-nowrap">@{{ value.diaChi}}</td>
                                <td class="align-middle">
                                    <img v-bind:src="value.hinh_anh" style="width: 50px;height:30px">
                                </td>
                                <td class="text-center align-middle">
                                    <button class="btn btn-info" v-on:click="moTa = value.moTa" data-bs-toggle="modal"
                                        data-bs-target="#motanganModal">Mô tả</button>
                                </td>
                                {{-- <td class="text-center align-middle">
                                    <button class="btn btn-info" v-on:click="openMoTaModal(value.moTa)" data-bs-toggle="modal" data-bs-target="#motanganModal">Mô tả</button>
                                  </td>

                                <div class="modal fade" id="motanganModal" tabindex="-1" aria-labelledby="motanganModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title" id="motanganModalLabel">Mô tả</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                          <textarea id="loadmoTa-editor" v-model="moTaContent"></textarea>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div> --}}

                                <td class="align-middle text-center text-nowrap">@{{ value.lienLac }}</td>
                                <td class="align-middle text-center text-nowrap">@{{ value.trangThai === 0 ? 'Ẩn' : 'Hiện'}}</td>
                                <td class="align-middle text-center text-nowrap">
                                    <button class="btn btn-primary" style="width: 100px" data-bs-toggle="modal"
                                        data-bs-target="#updateModal" v-on:click='showUpdata(value)'>Cập Nhật</button>
                                    <button class="btn btn-danger" style="width: 100px" data-bs-toggle="modal"
                                        data-bs-target="#deleteModal" v-on:click='delete_dia_diem = value'>Xóa </button>
                                </td>
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
                    {{-- Model xóa Địa điểm  --}}
                    <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLabel">Xóa Ra Khỏi Danh Sách</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <input type="hidden" v-model='delete_dia_diem.id'>
                                    <h6>Bạn có chắc chắn muốn xóa ??</h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-primary" v-on:click='deleteDiaDiem()'
                                        data-bs-dismiss="modal">Đồng Ý</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- end  --}}
                    <div class="modal fade" id="updateModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Cập Nhật Địa Điểm</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" v-model="update_dia_diem.id">
                                <div class="form-group">
                                    <label for="">Tên Địa Điểm</label>
                                    <input v-model="update_dia_diem.tenDiaDiem" type="text" class="form-control mb-2">
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
                                    <textarea v-model="update_dia_diem.moTa" class="form-control" cols="30" rows="10"></textarea>
                                  </div>

                                {{-- <div class="form-group">
                                    <label for="">Mô Tả</label>
                                    <textarea id="upmoTa-editor" v-model="update_dia_diem.moTa" class="form-control" cols="30" rows="10"></textarea>
                                  </div> --}}

                                <div class="form-group">
                                    <label for="">Thông Tin Liên Lạc</label>
                                    <input v-model="update_dia_diem.lienLac" type="text" class="form-control mb-2">
                                </div>
                                <div class="form-group">
                                    <label for="">Trạng Thái</label>
                                    <select name="" id="" class="form-control mb-2" v-model="update_dia_diem.trangThai">
                                        <option value="1">Đang Hoạt Động</option>
                                        <option value="0">Dừng Hoạt Động</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                <button type="button" class="btn btn-primary" v-on:click="updateDiaDiem()"
                                    data-bs-dismiss="modal">Đồng Ý</button>
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
        @if (count($errors) > 0)
            @foreach ($errors->all() as $error)
                toastr.error("{{ $error }}");
            @endforeach
        @endif
    </script>
    <script>
        new Vue({
            el: '#app',
            data: {
                create_dia_diem: {},
                list_dia_diem: [],
                delete_dia_diem: {},
                update_dia_diem: {},
                moTa: '',
            },
            created() {
                this.loadDiaDiem();
            },
            methods: {
                showUpdata(value) {
                    this.update_dia_diem = value;

                    $("#hinh_anh_1").val(value.hinh_anh);
                    var text = '<img src="' + value.hinh_anh + '" style="margin-top:15px;max-height:100px;">'
                    $("#holder1").html(text);
                },

                createDiaDiem() {
                const editorData = CKEDITOR.instances['moTa-editor'].getData();
                this.create_dia_diem.moTa = editorData;

                this.create_dia_diem.hinh_anh = $("#hinh_anh").val();

                axios
                    .post('/admin/dia-diem/index', this.create_dia_diem)
                    .then((res) => {
                    toastr.success('Thêm Mới Thành Công');
                    $("#hinh_anh").val("");
                    })
                    .catch((res) => {
                    $.each(res.response.data.errors, function(k, v) {
                        toastr.error(v[0]);
                    });
                    });
                },
                loadDataFromDatabase() {
    axios.get('/admin/dia-diem/data')
      .then((res) => {
        const moTa = res.data.data[0].moTa;
        CKEDITOR.instances['upmoTa-editor'].setData(moTa);
      })
      .catch((error) => {
        console.error(error);
      });
  },
  created() {
  this.loadDataFromDatabase();
},
                // mounted() {
                // CKEDITOR.replace('upmoTa-editor');

                // // Gán nội dung từ cơ sở dữ liệu vào CKEditor sau khi nó được khởi tạo
                // CKEDITOR.instances['upmoTa-editor'].on('instanceReady', () => {
                //     CKEDITOR.instances['upmoTa-editor'].setData(this.update_dia_diem.moTa);
                // });
                // },
                // mounted() {
                //     CKEDITOR.replace('loadmoTa-editor');
                //     CKEDITOR.replace('upmoTa-editor');

                //     // Gán nội dung từ cơ sở dữ liệu vào CKEditor sau khi nó được khởi tạo
                //     CKEDITOR.instances['upmoTa-editor'].on('instanceReady', (evt) => {
                //         const editor = evt.editor;
                //         editor.setData(this.update_dia_diem.moTa);
                //     });
                // },
                // methods: {
                // openMoTaModal(moTa) {
                //             this.moTaContent = moTa;
                //             $('#motanganModal').modal('show');
                //     },
                // },

                // openUpdateModal(diaDiem) {
                //     this.update_dia_diem.id = diaDiem.id;
                //     this.update_dia_diem.tenDiaDiem = diaDiem.tenDiaDiem;
                //     this.update_dia_diem.moTa = diaDiem.moTa;
                //     this.update_dia_diem.hinh_anh = diaDiem.hinh_anh;
                //     this.update_dia_diem.lienLac = diaDiem.lienLac;
                //     this.update_dia_diem.trangThai = diaDiem.trangThai;

                //         // Gán nội dung từ cơ sở dữ liệu vào CKEditor sau khi nó được khởi tạo
                //         CKEDITOR.instances['upmoTa-editor'].setData(this.update_dia_diem.moTa);

                //         $('#updateModal').modal('show');
                //     },
                loadDiaDiem() {
                        // Gán giá trị của trường 'moTa' cho CKEditor

                        axios
                        .get('/admin/dia-diem/data')
                        .then((res) => {
                            this.list_dia_diem = res.data.data;
                            // this.loadDiaDiem();
                            // CKEDITOR.instances['upmoTa-editor'].setData(this.list_dia_diem[0].moTa);
                            CKEDITOR.instances.ckeditorInstance.setData(this.list_dia_diem[0].moTa);
                        })
                        .catch((error) => {
                            console.error(error);
                        });
                },
                deleteDiaDiem() {
                    axios
                        .get('/admin/dia-diem/delete/' + this.delete_dia_diem.id)
                        .then((res) => {
                            toastr.success('Xóa Thành Công');
                            this.loadDiaDiem();
                        });
                },

                updateDiaDiem() {
                // Lấy dữ liệu từ cơ sở dữ liệu và gán vào CKEditor
                axios.get('/admin/dia-diem/data')
                    .then((res) => {
                        const moTa = res.data.data[0].moTa;
                        CKEDITOR.instances['upmoTa-editor'].setData(moTa);
                    })
                    .catch((error) => {
                        console.error(error);
                    });

                // Sự kiện lắng nghe sự thay đổi của CKEditor và cập nhật biến `this.update_dia_diem.moTa`
                CKEDITOR.instances['upmoTa-editor'].on('change', () => {
                    const editorData = CKEDITOR.instances['upmoTa-editor'].getData();
                    this.update_dia_diem.moTa = editorData;
                });

                // Gửi yêu cầu POST để cập nhật dữ liệu
                axios.post('/admin/dia-diem/update', this.update_dia_diem)
                    .then((res) => {
                        toastr.success('Cập Nhật Thành Công');
                        this.loadDiaDiem();
                    })
                    .catch((error) => {
                        toastr.error('Cập Nhật Thất Bại');
                        console.error(error);
                    });

                    // // Tiếp tục các xử lý khác
                    // this.update_dia_diem.hinh_anh = $("#hinh_anh_1").val();
                    // // Lấy nội dung từ CKEditor và gán cho biến `this.update_dia_diem.moTa`
                    // const editorData = CKEDITOR.instances['upmoTa-editor'].getData();
                    // this.update_dia_diem.moTa = editorData;

                    // axios.post('/admin/dia-diem/update', this.update_dia_diem)
                    //     .then((res) => {
                    //     toastr.success('Cập Nhật Thành Công');
                    //     this.loadDiaDiem();
                    //     })
                    //     .catch((error) => {
                    //     toastr.error('Cập Nhật Thất Bại');
                    //     console.error(error);
                    // });
                }
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
                this.create_dia_diem.moTa = CKEDITOR.instances['moTa-editor'].getData();
            });
        });

        // document.addEventListener("DOMContentLoaded", function () {
        //     CKEDITOR.replace('upmoTa-editor').on('change', () => {
        //         this.update_dia_diem.moTa = CKEDITOR.instances['upmoTa-editor'].getData();
        //     });
        // });
    //     document.addEventListener("DOMContentLoaded", function () {
    //         CKEDITOR.replace('ckeditorInstance');
    //     });
    //     document.addEventListener("DOMContentLoaded", function () {
    // CKEDITOR.replace('upmoTa-editor').then(editor => {
    //     axios.get('/admin/dia-diem/data')
    //         .then((res) => {
    //             const moTa = res.data.data[0].moTa;
    //             editor.setData(moTa);
    //         })
    //         .catch((error) => {
    //             console.error(error);
    //         });
    // }).catch(error => {
    //     console.error(error);
    // });

    // // Thêm sự kiện lắng nghe sự thay đổi của CKEditor và cập nhật dữ liệu vào thuộc tính this.update_dia_diem.moTa
    // CKEDITOR.instances['upmoTa-editor'].on('change', () => {
    //     this.update_dia_diem.moTa = CKEDITOR.instances['upmoTa-editor'].getData();
    // });
    // });
    document.addEventListener("DOMContentLoaded", function () {
  axios.get('/admin/dia-diem/data')
    .then((res) => {
      const moTa = res.data.data[0].moTa;
      const editor = CKEDITOR.replace('upmoTa-editor');
      editor.then(() => {
        editor.setData(moTa);
      });
    })
    .catch((error) => {
      console.error(error);
    });
});

    </script>

@endsection
