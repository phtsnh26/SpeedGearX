@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-10">
                                    <h2>Danh Sách Thuê Xe</h2>
                                </div>
                                <div class="col-2 text-end">
                                    <table>
                                        <tr>
                                            <td>Search:</td>
                                            <td><input type="text" class="form-control" placeholder="Nhập tìm kiếm"></td>
                                        </tr>
                                    </table>
                                </div>
                            </div>
                            <hr class="mt-1">
                            <div class="table-responsive">
                                <table class="table table-bordered mt-1">
                                    <thead class="text-primary">
                                        <tr class="text-center align-middle text-nowrap">
                                            <th>#</th>
                                            <th>Tên Người Thuê</th>
                                            <th>Xe</th>
                                            <th>Thương Hiệu</th>
                                            <th>Loại Xe</th>
                                            <th>Hình Ảnh</th>
                                            <th>Ngày Đặt</th>
                                            <th>Ngày Trả</th>
                                            <th>Ghi Chú</th>
                                            <th>Tổng Tiền</th>
                                            <th>Tình Trạng</th>
                                            <th>Phương Thức</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <template v-for="(v,k) in list">
                                            <tr class="align-middle">
                                                <th>@{{ k + 1 }}</th>
                                                <td class="text-nowrap">
                                                    <button class="btn a1" data-bs-toggle="modal"
                                                        data-bs-target="#thongtinModal"
                                                        v-on:click="thongTin = Object.assign({},v);">
                                                        @{{ v.ho_va_ten }}
                                                    </button>

                                                </td>
                                                <td class="text-nowrap"></td>
                                                <td class="text-nowrap"></td>
                                                <td class="text-nowrap"></td>
                                                <td class="text-nowrap text-center align-middle">
                                                    <img src="" style="height: 100px;width: 130px;">
                                                </td>
                                                <td class="text-center">
                                                    <input v-model="v.ngay_dat" type="date" class="form-control">
                                                </td>
                                                <td class="text-center">
                                                    <input v-model="v.ngay_tra" type="date" class="form-control">
                                                </td>
                                                <td class="text-center">
                                                    <i class="fa-solid fa-circle-info text-info"
                                                        style="font-size: 35px;cursor: pointer;"
                                                        data-bs-target="#ghiChuModal" data-bs-toggle="modal"
                                                        v-on:click="ghiChu = v"></i>
                                                </td>
                                                <td class="text-nowrap">

                                                </td>
                                                <td class="text-nowrap text-center">
                                                    <template v-if="v.tinh_trang == 0">
                                                        <button type="button" class="btn btn-relief-secondary"
                                                            style="width: 130px">
                                                            Đang Xử Lý
                                                        </button>
                                                    </template>
                                                    <template v-else-if="v.tinh_trang == 1">
                                                        <button type="button" class="btn btn-relief-warning"
                                                            style="width: 130px">
                                                            Đã Thuê
                                                        </button>
                                                    </template>
                                                    <template v-else-if="v.tinh_trang == 2">
                                                        <button type="button" class="btn btn-relief-success"
                                                            style="width: 130px">
                                                            Đã Trả
                                                        </button>
                                                    </template>
                                                    <template v-else-if="v.tinh_trang == -1">
                                                        <button type="button" class="btn btn-relief-danger"
                                                            style="width: 130px">
                                                            Hết Hạn
                                                        </button>
                                                    </template>
                                                    <template v-else-if="v.tinh_trang == -2">
                                                        <button type="button" class="btn btn-relief-dark"
                                                            style="width: 130px">
                                                            Đã Hủy
                                                        </button>
                                                    </template>
                                                </td>
                                                <td class="text-nowrap text-center">
                                                    <i class="fa-solid fa-trash text-danger"
                                                        style="font-size: 35px; cursor: pointer;"
                                                        data-bs-target="#deleteModal" data-bs-toggle="modal"></i>
                                                </td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                                <div class="modal fade" id="ghiChuModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                    aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Ghi Chú</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <p class="mt-1">@{{ ghiChu.ghi_chu }}</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Thoát</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="thongtinModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Thông Tin Người Thuê
                                                </h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="mb-1 mt-1"><b>Họ và tên:</b> @{{ thongTin.ho_va_ten }}</p>
                                                        <p class="mb-1"><b>Ngày sinh:</b> @{{ thongTin.ngay_sinh }}</p>
                                                        <p class="mb-1"><b>Giới tính:</b> @{{ thongTin.gioi_tinh }}</p>
                                                        <p class="mb-1"><b>Địa chỉ:</b> @{{ thongTin.dia_chi }}</p>
                                                        <p class="mb-1"><b>Số điện thoại:</b> @{{ thongTin.so_dien_thoai }}</p>
                                                        <p class="mb-1"><b>Căn cước công dân:</b> @{{ thongTin.cccd }}
                                                        </p>
                                                        <p><b>Bằng lái xe:</b> @{{ thongTin.bang_lai_xe }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal fade" id="deleteModal" tabindex="-1"
                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Người Thuê</h1>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <h6> Bạn có chắc muốn xóa người thuê <b>xxxx</b> không ?</h6>
                                                <h6>
                                                    <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi
                                                            phục!</span>
                                                    </p>
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button type="button" class="btn btn-danger"
                                                    data-bs-dismiss="modal">Xóa</button>
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
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    list: [],
                    thongTin: {},
                    ghiChu: {},
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataBooking') }}')
                            .then((res) => {
                                this.list = res.data.data
                            });
                    },
                },
            });
        })
    </script>
@endsection
