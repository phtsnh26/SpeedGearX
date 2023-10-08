@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class="row mb-2">
            <div class="col text-end">
                <button data-bs-toggle="modal" data-bs-target="#themMoiModal" type="button"
                    class="btn btn-outline-primary waves-effect" style="border-radius: 30px;"><i class="fa-solid fa-plus"></i>
                    Thêm Mới
                </button>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Nhân Sự</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="form-label">Họ và tên</label>
                                    <input v-model='add.ho_va_ten' type="text" class="form-control" name=""
                                        id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="form-label">email</label>
                                    <input v-model='add.email' type="email" class="form-control" name=""
                                        id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="form-label">Tên đăng nhập</label>
                                    <input v-model='add.ten_dang_nhap' type="text" class="form-control" name=""
                                        id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="form-label">password</label>
                                    <input v-model='add.password' type="password" class="form-control" name=""
                                        id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="" class="form-label">Giới tính</label>
                                    <select v-model='add.gioi_tinh' class="form-select" id="">
                                        <option value="Nam">Nam</option>
                                        <option value="Nữ">Nữ</option>
                                    </select>
                                </div>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="form-label">Ngày sinh</label>
                                    <input v-model='add.ngay_sinh' type="date" class="form-control" name=""
                                        id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>

                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="form-label">Địa chỉ</label>
                                    <input v-model='add.dia_chi' type="text" class="form-control" name=""
                                        id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="mb-1">
                                    <label for="" class="form-label">Ảnh minh chứng</label>
                                    <input v-model='add.anh_minh_chung' type="text" class="form-control"
                                        name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                        <div class="row">

                            <div class="col">
                                <div class="">
                                    <label for="" class="form-label">Số điện thoại</label>
                                    <input v-model='add.so_dien_thoai' type="text" class="form-control"
                                        name="" id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                            <div class="col">
                                <div class="">
                                    <label for="" class="form-label">CCCD</label>
                                    <input v-model='add.cccd' type="text" class="form-control" name=""
                                        id="" aria-describedby="helpId" placeholder="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button @click='them_moi()' type="button" class="btn btn-primary" data-bs-dismiss="modal">Thêm
                            Mới</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h4>Danh Sách Nhân Sự</h4>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class='table table-bordered'>
                                <thead>
                                    <tr class='text-center text-nowrap align-middle'>
                                        <th>#</th>
                                        <th>Ảnh minh chứng</th>
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày Sinh</th>
                                        <th>Giới tính</th>
                                        <th>Số điện thoại</th>
                                        <th>CCCD</th>
                                        <th>Tên Phân Quyền</th>
                                        <th>Tinh_trang</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if='v.ten_quyen != "Giám Đốc"' v-for='(v, k) in list' class='text-nowrap align-middle'>
                                        <th class='text-center'>@{{ k + 0 }}</th>
                                        <td class='text-center'>
                                            <img width="100px" height="133px" :src="v.anh_minh_chung" class='img-fluid'
                                                alt="">
                                        </td>
                                        <td>@{{ v.ho_va_ten }}</td>
                                        <td>@{{ v.email }}</td>
                                        <td>@{{ v.dia_chi }}</td>
                                        <td>@{{ v.ngay_sinh }}</td>
                                        <td>@{{ v.gioi_tinh }}</td>
                                        <td>@{{ v.so_dien_thoai }}</td>
                                        <td>@{{ v.cccd }}</td>
                                        <td v-if='v.ten_quyen'>@{{ v.ten_quyen }}</td>
                                        <td v-else>Chưa được cấp quyền</td>
                                        <td class='text-center align-middle'>
                                            <button @click='changeStatus(v, 1); index = k' v-if='v.tinh_trang == 1'
                                                style="width: 140px" class='btn btn-relief-success'>Hiển Thị</button>
                                            <button @click='changeStatus(v, -1); index = k' v-else-if='v.tinh_trang == -1'
                                                style="width: 140px" class='btn btn-relief-danger'>Khoá</button>
                                            <button v-else-if='v.tinh_trang == 0' style="width: 140px"
                                                class='btn btn-relief-warning'>Chờ Xác Nhận</button>
                                        </td>
                                        <td class="text-center align-middle ">
                                            <button @click='uyQuyen = Object.assign({}, v); index = k; layQuyen()'
                                                data-bs-toggle="modal" data-bs-target="#capQuyenModal"
                                                class="btn btn-primary mb-1 mt-1">Cấp
                                                Quyền</button>
                                            <i @click='edit = Object.assign({}, v); index = k' data-bs-toggle="modal"
                                                data-bs-target="#capNhatModal" class="fa-solid fa-edit text-info mx-1  "
                                                style="font-size: 35px; cursor: pointer; margin-top: 10px"></i>
                                            <i @click='del = v; index = k' data-bs-toggle="modal"
                                                data-bs-target="#deleteModal" class="fa-solid fa-trash text-danger "
                                                style="font-size: 35px; cursor: pointer; margin-top: 5px"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xoá Nhân Sự</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6> Bạn có chắc muốn đuổi việc <b>@{{ del.ho_va_ten }}</b> không ?</h6>
                                            <h6>
                                                <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi
                                                        phục!</span>
                                                </p>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button @click='xoa()' type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Đuổi
                                                việc</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div div class="modal fade" id="capQuyenModal" tabindex="-1"
                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cấp Quyền</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <select class='form-select' v-model='id_quyen'>
                                                <option :value="v.id" v-for='(v,k) in list_quyen'
                                                    :checked='v.id == id_quyen ? true : false'>
                                                    @{{ v.ten_quyen }}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Thoát</button>
                                            <button data-bs-dismiss="modal" v-on:click="capChucVu()" type="button"
                                                class="btn btn-primary">Cấp Quyền</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal fade" id="capNhatModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-1">
                                                        <label for="" class="form-label">Họ và tên</label>
                                                        <input v-model='edit.ho_va_ten' type="text"
                                                            class="form-control" name="" id=""
                                                            aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-1">
                                                        <label for="" class="form-label">email</label>
                                                        <input v-model='edit.email' type="email" class="form-control"
                                                            name="" id="" aria-describedby="helpId"
                                                            placeholder="">
                                                    </div>
                                                </div>

                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-1">
                                                        <label for="" class="form-label">Tên đăng nhập</label>
                                                        <input v-model='edit.ten_dang_nhap' type="text"
                                                            class="form-control" name="" id=""
                                                            aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-1">
                                                        <label for="" class="form-label">password</label>
                                                        <input v-model='edit.password' type="password"
                                                            class="form-control" name="" id=""
                                                            aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="">
                                                        <label for="" class="form-label">Giới tính</label>
                                                        <select v-model='edit.gioi_tinh' class="form-select"
                                                            id="">
                                                            <option value="Nam">Nam</option>
                                                            <option value="Nữ">Nữ</option>
                                                        </select>
                                                    </div>
                                                </div>


                                            </div>
                                            <div class="row">
                                                <div class="col">
                                                    <div class="mb-1">
                                                        <label for="" class="form-label">Ngày sinh</label>
                                                        <input v-model='edit.ngay_sinh' type="date"
                                                            class="form-control" name="" id=""
                                                            aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </div>

                                                <div class="col">
                                                    <div class="mb-1">
                                                        <label for="" class="form-label">Địa chỉ</label>
                                                        <input v-model='edit.dia_chi' type="text" class="form-control"
                                                            name="" id="" aria-describedby="helpId"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="mb-1">
                                                        <label for="" class="form-label">Ảnh minh chứng</label>
                                                        <input v-model='edit.anh_minh_chung' type="text"
                                                            class="form-control" name="" id=""
                                                            aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">

                                                <div class="col">
                                                    <div class="">
                                                        <label for="" class="form-label">Số điện thoại</label>
                                                        <input v-model='edit.so_dien_thoai' type="text"
                                                            class="form-control" name="" id=""
                                                            aria-describedby="helpId" placeholder="">
                                                    </div>
                                                </div>
                                                <div class="col">
                                                    <div class="">
                                                        <label for="" class="form-label">CCCD</label>
                                                        <input v-model='edit.cccd' type="text" class="form-control"
                                                            name="" id="" aria-describedby="helpId"
                                                            placeholder="">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Close</button>
                                            <button @click='cap_nhat()' type="button" class="btn btn-primary"
                                                data-bs-dismiss="modal">Cập
                                                Nhật</button>
                                        </div>
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
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    list: [],
                    add: {},
                    edit: {},
                    del: {},
                    index: 0,
                    uyQuyen: {},
                    id_quyen: 0,
                    list_quyen: [],
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ route('dataPersonnel') }}')
                            .then((res) => {
                                this.list = res.data.data;
                                this.list_quyen = res.data.dataQuyen;
                            });
                    },
                    them_moi() {
                        axios
                            .post('{{ route('createPersonnel') }}', this.add)
                            .then((res) => {
                                if (res.data.status) {
                                    this.add.id_phan_quyen = "nhân viên quèn";
                                    this.add.tinh_trang = 0;
                                    toastr.success(res.data.message, 'Success');
                                    this.list.push(this.add);
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    cap_nhat() {
                        axios
                            .post('{{ route('updatePersonnel') }}', this.edit)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.$set(this.list, this.index, this.edit);
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    xoa() {
                        axios
                            .post('{{ route('deletePersonnel') }}', this.del)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.list.splice(this.index, 1);
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    changeStatus(v, a) {
                        axios
                            .post('{{ route('changeStatusPersonnel') }}', v)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    // this.list[$this.index].tinh_trang
                                    if (a == 1) {
                                        this.list[this.index].tinh_trang = -1;
                                    } else {
                                        this.list[this.index].tinh_trang = 1;

                                    }
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    layQuyen() {
                        axios
                            .post('{{ Route('capQuyenPersonnel') }}', this.uyQuyen)
                            .then((res) => {
                                if (res.data.status) {
                                    this.id_quyen = res.data.id_quyen;
                                } else {
                                    this.id_quyen = 0;
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    capChucVu() {
                        var payload = {
                            'id_quyen': this.id_quyen,
                            'id': this.uyQuyen,
                        }
                        axios
                            .post('{{ Route('capCVPersonnel') }}', payload)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.getData();
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    }
                },
            });
        })
    </script>
@endsection
