@extends('share.admin.masterPage')
@section('content')
    <div id="app" class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    Danh Sách Phiếu Nhập Kho
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th colspan="2"><input type="date" class="form-control" v-model="begin" v-on:change="getData()">
                                    </th>
                                    <th colspan="3"><input type="date" class="form-control" v-model="end" v-on:change="getData()">
                                    </th>
                                </tr>
                                <tr class="text-primary">
                                    <th class="text-center">#</th>
                                    <th class="text-center">Mã Nhập Kho</th>
                                    <th class="text-center">Ngày</th>
                                    <th class="text-center">Tổng Tiền</th>
                                    <th class="text-center">Chi Tiết</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(v,k) in list">
                                    <th class="text-center">@{{ k + 1 }}</th>
                                    <td>@{{ v.ma_nhap }}</td>
                                    <td>
                                        @{{ v.ngay_nhap }}
                                    </td>
                                    <td>@{{ numberFormat(v.tong_tien) }}</td>
                                    <td class="text-center">
                                        <button @click="detail(v)" data-bs-toggle="modal" data-bs-target="#chiTietModal"
                                            class="btn btn-sm btn-primary waves-effect waves-float waves-light">
                                            Xem
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div id="chiTietModal" tabindex="-1" aria-labelledby="exampleModalLabel" class="modal fade"
                            aria-hidden="true" style="display: none;">
                            <div class="modal-dialog modal-xl">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 id="exampleModalLabel" class="modal-title fs-5">Chi Tiết Nhập Kho</h1>
                                        <button type="button" data-bs-dismiss="modal" aria-label="Close" class="btn-close">
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <div class="table-responsive">
                                            <table class="table table-bordered">
                                                <thead>
                                                    <tr class="text-primary">
                                                        <th class="text-center">#</th>
                                                        <th class="text-center">Tên Sản Phẩm</th>
                                                        <th class="text-center">Số Lượng</th>
                                                        <th class="text-center">Đơn Giá</th>
                                                        <th class="text-center">Thành Tiền</th>
                                                        <th class="text-center">Ghi Chú</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr v-for="(v,k) in  chiTiet">
                                                        <th class="text-center">@{{ k + 1 }}</th>
                                                        <td>@{{ v.ten_xe }}</td>
                                                        <td>@{{ v.so_luong }}</td>
                                                        <td>@{{ numberFormat(v.don_gia) }}</td>
                                                        <td>@{{ numberFormat(v.thanh_tien) }}</td>
                                                        <td>@{{ v.ghi_chu }}</td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                    <div class="modal-footer"><button type="button" data-bs-dismiss="modal"
                                            class="btn btn-secondary waves-effect waves-float waves-light">Close</button>
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
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    list: [],
                    begin: moment(new Date()).subtract(10, 'days').format("YYYY-MM-DD"),
                    end: moment().format("YYYY-MM-DD"),
                    chiTiet: [],
                },

                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        var date = {
                            'begin': this.begin,
                            'end': this.end,
                        }
                        axios
                            .post('{{ Route('dataWR') }}', date)
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
                    formatDate(date) {
                        return moment(date).format("DD/MM/YYYY");
                    },
                    formatTime(date) {
                        return moment(date).format("H:m:s");
                    },
                    detail(value) {
                        axios
                            .post('{{ Route('detailWareHouse') }}', value)
                            .then((res) => {
                                this.chiTiet = res.data.detail;
                            });
                    }
                },

            });
        })
    </script>
@endsection
