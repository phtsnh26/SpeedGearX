@extends('share.admin.masterPage')
@section('content')
    <div id="app" class="row">
        <div class="col-4">
            <div class="card">
                <div class="card-header">
                    <h4>Danh Sách Xe</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <div class="col-12 mb-1">
                            <div class="input-group">
                                <button type="button" class="btn btn-outline-primary waves-effect">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"> </circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                                <input v-model="key_search" v-on:keyup.enter="timKiem()" type="text"
                                    placeholder="Nhập vào thông tin cần tìm" aria-label="Amount" class="form-control">
                                <button type="button" class="btn btn-outline-primary waves-effect" @click="timKiem()">
                                    Search !
                                </button>
                            </div>
                        </div>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-primary">
                                    <th class="text-center text-nowrap">Tên Xe</th>
                                    <th class="text-center text-nowrap">Hình Ảnh</th>
                                    <th class="text-center text-nowrap">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(v,k) in list_xe">
                                    <td>@{{ v.ten_xe }}</td>
                                    <td>
                                        <img :src="v.hinh_anh_xe" class="img-fluid">
                                    </td>
                                    <td class="text-center">
                                        <button class="btn-sm btn btn-primary" @click="them(v); index=k">
                                            Thêm
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-8">
            <div class="card">
                <div class="card-header">
                    <h4>Danh Sách Xe Nhập Kho</h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-primary">
                                    <th class="text-center align-middle">Tên Xe</th>
                                    <th class="text-center align-middle">Số Lượng</th>
                                    <th class="text-center align-middle">Đơn Giá</th>
                                    <th class="text-center align-middle">Thành Tiền</th>
                                    <th class="text-center align-middle">Ghi Chú</th>
                                    <th class="text-center align-middle">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(v,k) in list_kho">
                                    <td class="align-middle">@{{ v.ten_xe }}</td>
                                    <td style="width: 20%" class="text-center align-middle">
                                        <input v-model="v.so_luong" @blur="capNhatThanhTien(v); index=k" type="number"
                                            class="form-control">
                                    </td>
                                    <td class="align-middle">@{{ numberFormat(v.don_gia) }}</td>
                                    <td class="align-middle">@{{ numberFormat(v.thanh_tien) }}</td>
                                    <td class="text-center align-middle">
                                        <i @click="update = v" class="fa-2x text-info fa-solid fa-pen-to-square"
                                            data-bs-toggle="modal" data-bs-target="#ghiChuModal"
                                            style="cursor: pointer;"></i>
                                    </td>
                                    <td class="text-center align-middle text-nowrap">
                                        <i data-bs-toggle="modal" data-bs-target="#delModal"
                                            v-on:click="del = Object.assign({}, v); index = k"
                                            class="fa-solid fa-trash fa-2x text-danger" style="cursor: pointer;"></i>
                                    </td>
                                </tr>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="4"></th>
                                    <td colspan="2" class="text-center">
                                        <button data-bs-toggle="modal" data-bs-target="#nhapKho"
                                            class="btn btn-primary waves-effect waves-float waves-light">
                                            Nhập Kho
                                        </button>
                                        <div id="nhapKho" tabindex="-1" aria-labelledby="exampleModalLabel"
                                            aria-hidden="true" class="modal fade">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h1 id="exampleModalLabel" class="modal-title fs-5">
                                                            Xác Nhận Nhập Kho
                                                        </h1>
                                                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                                            class="btn-close">
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <input v-model="nhapkho.ma_nhap" type="text"
                                                            placeholder="Mã phiếu nhập kho" class="form-control">
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" data-bs-dismiss="modal"
                                                            class="btn btn-secondary waves-effect waves-float waves-light">
                                                            Close
                                                        </button>
                                                        <button type="button"
                                                            class="btn btn-primary waves-effect waves-float waves-light"
                                                            @click="xacNhanNhapKho()" data-bs-dismiss="modal">
                                                            Xác Nhận
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                        <div id="ghiChuModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                            class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 id="exampleModalLabel" class="modal-title fs-5">
                                            Ghi Chú Nhập Xe
                                        </h1>
                                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                            class="btn-close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <textarea v-model="update.ghi_chu" cols="30" rows="5" class="form-control"></textarea>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal"
                                            class="btn btn-secondary waves-effect waves-float waves-light">
                                            Close
                                        </button>
                                        <button data-bs-dismiss="modal" type="button"
                                            class="btn btn-primary waves-effect waves-float waves-light"
                                            @click="ghiChuNhapKho()">
                                            Ghi Chú
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true"
                            class="modal fade">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 id="exampleModalLabel" class="modal-title fs-5">
                                            Xóa Nhập Kho
                                        </h1>
                                        <button type="button" data-bs-dismiss="modal" aria-label="Close"
                                            class="btn-close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn chắc chắn muốn xóa Xe <b class="text-danger">@{{ del.ten_xe }}</b> khỏi
                                        danh
                                        sách?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" data-bs-dismiss="modal"
                                            class="btn btn-secondary waves-effect waves-float waves-light">
                                            Đóng
                                        </button>
                                        <button @click="xoa()" type="button" data-bs-dismiss="modal"
                                            class="btn btn-danger waves-effect waves-float waves-light">
                                            Xác Nhận Xóa
                                        </button>
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
                    list_xe: [],
                    list_kho: [],
                    ghiChu: {},
                    index: 0,
                    del: {},
                    nhapkho: {},
                    key_search: '',
                    update: {},
                },
                created() {
                    this.getListXe();
                    this.getKho();
                },
                methods: {
                    getListXe() {
                        axios
                            .get('{{ Route('dataWareHouse') }}')
                            .then((res) => {
                                this.list_xe = res.data.data
                            });
                    },
                    them(value) {
                        axios
                            .post('{{ Route('createWareHouse') }}', value)
                            .then((res) => {
                                if (res.data.status) {
                                    this.list_xe[this.index].thanh_tien = this.list_xe[this.index]
                                        .don_gia
                                    this.getKho();
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    getKho() {
                        axios
                            .get('{{ Route('dataTemporaryWareHouse') }}')
                            .then((res) => {
                                this.list_kho = res.data.data;
                            });
                    },
                    numberFormat(number) {
                        return new Intl.NumberFormat('vi-VI', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(number);
                    },
                    capNhatThanhTien(value) {
                        axios
                            .post('{{ Route('updateThanhTien') }}', value)
                            .then((res) => {
                                this.list_kho[this.index].thanh_tien = res.data.thanh_tien
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    xoa() {
                        axios
                            .post('{{ Route('deleteWareHouse') }}', this.del)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.list_kho.splice(this.index, 1)
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    xacNhanNhapKho() {
                        axios
                            .post('{{ Route('storeWareHouse') }}', this.nhapkho)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.nhapkho.ma_nhap = '';
                                    this.list_kho.splice(0, this.list_kho.length);
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    timKiem() {
                        var search = {
                            'giaTri': this.key_search
                        };
                        axios
                            .post('{{ Route('searchWareHouse') }}', search)
                            .then((res) => {
                                this.list_xe = res.data.data;
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    ghiChuNhapKho() {
                        axios
                            .post('{{ Route('updatehWareHouse') }}', this.update)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                                this.getKho();
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    }
                },
            });
        });
    </script>
@endsection
