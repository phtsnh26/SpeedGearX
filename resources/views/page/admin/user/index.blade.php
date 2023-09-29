@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class="row">
            <div class="col-12">
                <div class="card border-primary border-top border-4 border-0">
                    <div class="card-header  text-center">
                        <legend><b>Danh Sách Người Dùng</b></legend>
                    </div>
                    <div class="card-body">
                        <div class="input-group mb-1">
                            <button class="btn btn-outline-primary waves-effect" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-search">
                                    <circle cx="11" cy="11" r="8"></circle>
                                    <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                </svg>
                            </button>
                            <input v-model="search" v-on:keyup.enter="timKiem()" type="text" class="form-control"
                                placeholder="Nhập tìm kiếm" aria-label="Amount">
                            <button class="btn btn-outline-primary waves-effect" type="button" v-on:click="timKiem()">
                                Search !</button>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead class="text-primary">
                                    <tr>
                                        <th class="text-center text-nowrap align-middle">#</th>
                                        <th class="text-center text-nowrap align-middle">Họ Và Tên</th>
                                        <th class="text-center text-nowrap align-middle">Email</th>
                                        <th class="text-center text-nowrap align-middle">Số Điện Thoại</th>
                                        <th class="text-center text-nowrap align-middle">Địa Chỉ</th>
                                        <th class="text-center text-nowrap align-middle">Ngày Tháng Năm Sinh</th>
                                        <th class="text-center text-nowrap align-middle">Giới Tính</th>
                                        <th class="text-center text-nowrap align-middle">Căn Cước Công Dân</th>
                                        <th class="text-center text-nowrap align-middle">Bằng Lái Xe</th>
                                        <th class="text-center text-nowrap align-middle">Tình Trạng</th>
                                        <th class="text-center text-nowrap align-middle">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(v,k) in list">
                                        <tr>
                                            <th class="text-center text-nowrap align-middle">@{{ k + 1 }}</th>
                                            <td class=" text-nowrap align-middle">@{{ v.ho_va_ten }}</td>
                                            <td class=" text-nowrap align-middle">@{{ v.email }}</td>
                                            <td class=" text-nowrap align-middle">@{{ v.so_dien_thoai }}</td>
                                            <td class=" text-nowrap align-middle">@{{ v.dia_chi }}</td>
                                            <td class=" text-nowrap align-middle">@{{ v.ngay_sinh }}</td>
                                            <td class=" text-nowrap align-middle">@{{ v.gioi_tinh }}</td>
                                            <td class=" text-nowrap align-middle">@{{ v.cccd }}</td>
                                            <td class=" text-nowrap align-middle">
                                                @{{ v.bang_lai_xe }}
                                            </td>
                                            <td class="text-center text-nowrap align-middle">
                                                <template v-if="v.tinh_trang == 1">
                                                    <button style="width: 120px" type="button"
                                                        class="btn btn-relief-success"
                                                        v-on:click="doitrangthai(v); index = k">Hiển
                                                        Thị</button>
                                                </template>
                                                <template v-else>
                                                    <button style="width: 120px" type="button"
                                                        class="btn btn-relief-danger"
                                                        v-on:click="doitrangthai(v); index = k">Khóa</button>
                                                </template>
                                            </td>
                                            <td class="text-center text-nowrap align-middle">
                                                <i class="fa-solid fa-trash text-danger"
                                                    style="font-size: 35px; cursor: pointer;" data-bs-target="#deleteModal"
                                                    data-bs-toggle="modal" v-on:click="del = v; index = k"></i>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Người Dùng</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6> Bạn có chắc muốn xóa người dùng <b>@{{ del.ho_va_ten }}</b> không ?</h6>
                                        <h6>
                                            <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi
                                                    phục!</span>
                                            </p>
                                        </h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Thoát</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                            v-on:click="xoa()">Xóa</button>
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
                    search: '',
                    del: {},
                    index: 0,
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataUser') }}')
                            .then((res) => {
                                this.list = res.data.data;
                            });
                    },
                    doitrangthai(x) {
                        axios
                            .post('{{ Route('statusUser') }}', x)
                            .then((res) => {
                                toastr.success('Đã đổi trạng thái !', "Thành Công")
                                this.list[this.index].tinh_trang = !this.list[this.index].tinh_trang
                            })
                    },
                    timKiem() {
                        var search = {
                            'giaTri': this.search
                        };
                        axios
                            .post('{{ Route('searchUser') }}', search)
                            .then((res) => {
                                this.list = res.data.data;
                            })
                    },
                    xoa() {
                        axios
                            .post('{{ Route('delUser') }}', this.del)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, "Thành Công");
                                    this.list.splice(this.index, 1);
                                } else {
                                    toastr.error(res.data.message, "Lỗi")
                                }
                            })
                    }
                },
            });
        })
    </script>
@endsection
