@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8">
                                    <h2>Danh Sách Thuê Xe</h2>
                                </div>
                                <div class="col-4 text-end d-flex">
                                    <label class='me-1' style="display: flex;align-items: center">Search: </label>
                                    <input @keyup.enter='search()' v-model='gia_tri' type="text"
                                        class="form-control w-100" placeholder="Nhập tìm kiếm">
                                </div>
                            </div>
                            <hr class="mt-1">
                            <div class="table-responsive">
                                <table class="table table-bordered mt-1">
                                    <thead class="text-primary">
                                        <tr class="text-center align-middle text-nowrap">
                                            <th>#</th>
                                            <th>Mã Hóa Đơn</th>
                                            <th>Tên Người Thuê</th>
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
                                                    @{{ v.ma_hoa_don }}
                                                </td>
                                                <td class="text-nowrap ">
                                                    <button class="btn a1 text-danger" data-bs-toggle="modal"
                                                        data-bs-target="#thongtinModal"
                                                        v-on:click="thongTin = Object.assign({},v);">
                                                        @{{ v.ho_va_ten }}
                                                    </button>
                                                </td>
                                                <td class="text-center">
                                                    <input style="width: 170px;" v-model="v.ngay_dat" type="datetime"
                                                        class="form-control">
                                                </td>
                                                <td class="text-center">
                                                    <input style="width: 170px;" v-model="v.ngay_tra" type="datetime"
                                                        class="form-control">
                                                </td>
                                                <td class="text-center">
                                                    <i v-on:click='mo_ta.mo_ta_ngan = v.mo_ta_ngan'
                                                        class="fa-solid fa-circle-info text-info"
                                                        style="font-size: 35px; cursor: pointer;"
                                                        data-bs-target="#ghiChuModal" data-bs-toggle="modal"></i>
                                                </td>
                                                <td class="text-nowrap">
                                                    <b>Tổng tiền: </b>@{{ numberFormat(v.thanh_tien) }}
                                                    <br>
                                                    <b>Đã cọc 30%: </b>123123d
                                                </td>
                                                <td class="text-nowrap text-center">
                                                    <template v-if="v.tinh_trang == 0">
                                                        <button @click='changeStatus(v)' type="button"
                                                            class="btn btn-relief-secondary" style="width: 130px">
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
                                                    <button @click='del = v; index = k' data-bs-target="#deleteModal"
                                                        data-bs-toggle="modal" class='btn btn-danger'>Xóa</button>
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
                                                <p class="mt-1">1212121</p>
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
                                                <h6> Bạn có chắc muốn xóa người thuê <b>@{{ del.ho_va_ten }}</b> không ?
                                                </h6>
                                                <h6>
                                                    <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi
                                                            phục!</span>
                                                    </p>
                                                </h6>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Close</button>
                                                <button @click='xoa' type="button" class="btn btn-danger"
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
                    del: {},
                    index: 0,
                    gia_tri: '',
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
                    numberFormat(number) {
                        return new Intl.NumberFormat('vi-VI', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(number);
                    },
                    xoa() {
                        axios
                            .post('{{ Route('deleteBooking') }}', this.del)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.list.splice(this.index, 1);
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    search() {
                        var payload = {
                            'gia_tri': this.gia_tri
                        }
                        axios
                            .post('{{ Route('searchBooking') }}', payload)
                            .then((res) => {
                                this.list = res.data.data;
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Lỗi');
                                });
                            });
                    },
                    changeStatus(v) {
                        axios
                            .post('{{ Route('changeStatusBooking') }}', v)
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
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                },
            });
        })
    </script>
@endsection
