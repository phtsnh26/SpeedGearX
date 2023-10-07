@extends('page.customer.profileClient_master.index')
@section('content_profile')
    <div class="row mb--n30" id="app">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center align-middle">#</th>
                    <th class="text-center align-middle">Mã Đơn</th>
                    <th class="text-center align-middle">Thông Tin Nhận</th>
                    <th class="text-center align-middle">Tình Trạng</th>
                    <th class="text-center align-middle">Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <template v-for='(v,k) in list'>
                    <tr>
                        <th class="text-center align-middle">@{{ k + 1 }}</th>
                        <td class="text-center align-middle">@{{ v.ma_hoa_don }}</td>
                        <td class="align-middle text-center">
                            @{{ v.ho_va_ten }} <br>Số điện thoại: @{{ v.so_dien_thoai }}
                        </td>
                        <td class="text-center text-nowrap align-middle">
                            <button style="width: 120px; font-size: 13px"
                                :class='tinhTrang(v).btn'>@{{ tinhTrang(v).name }}</button>
                        </td>
                        <td class="text-center text-nowrap align-middle">
                            <div class="accordion accordion-flush" id="accordionFlushExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="flush-headingTwo">
                                        <button v-bind:data-bs-target="'#flush-collapseTwo' + v.id"
                                            class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                            aria-expanded="false" aria-controls="flush-collapseTwo">
                                            Chi Tiết
                                        </button>
                                    </h2>
                                </div>
                            </div>
                        </td>
                    </tr>
                    <td colspan="6">
                        <div v-bind:id="'flush-collapseTwo' + v.id" class="accordion-collapse collapse"
                            aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                            <div class="accordion-body">
                                <div class="mb-3 mb-lg-4 bg-light shadow-sm px-4 py-3">
                                    <div class="row align-items-center no-gutters p-md-2">
                                        <div class="col-4">
                                            <div><strong>Tên Xe</strong></div>
                                            <small class="text-muted">@{{ v.ten_xe }}</small>
                                        </div>
                                        <div class="col-2">
                                            <div><strong>Số Lượng</strong></div>
                                            <small class="text-muted">@{{ v.so_luong }}</small>
                                        </div>
                                        <div class="col-3 text-end">
                                            <div><strong>Tổng Tiền</strong></div>
                                            <small class="text-muted">@{{ numberFormat(v.thanh_tien) }}</small>
                                        </div>
                                        <div class="col-3 text-right">
                                            <div><strong class="text-danger">Cọc 30%</strong></div>
                                            <span>@{{ numberFormat(v.thanh_tien * 0.3) }}</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </td>
                </template>
            </tbody>
        </table>
    </div>
@endsection
@section('js_profile')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    list: [],
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataOrderClient') }}')
                            .then((res) => {
                                this.list = res.data.data;
                            });
                    },
                    numberFormat(number) {
                        return new Intl.NumberFormat('vi-VI', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(number);
                    },
                    tinhTrang(v) {
                        var name, btn;
                        if (v.tinh_trang == 0) {
                            name = 'Đang Xử Lý';
                            btn = 'btn btn-secondary';
                        } else if (v.tinh_trang == 1) {
                            name = 'Đã Cọc';
                            btn = 'btn btn-warning';
                        } else if (v.tinh_trang == 2) {
                            name = 'Đang Thuê';
                            btn = 'btn btn-primary';
                        } else if (v.tinh_trang == 3) {
                            name = 'Đã Trả';
                            btn = 'btn btn-success';
                        } else if (v.tinh_trang == -1) {
                            name = 'Đã Hủy';
                            btn = 'btn btn-danger';
                        }
                        return {
                            'name': name,
                            'btn': btn,
                        };
                    },
                },
            });
        })
    </script>
@endsection
