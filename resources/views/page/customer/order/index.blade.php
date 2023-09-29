@extends('page.customer.profileClient_master.index')
@section('content_profile')
    <div class="row mb--n30" id="app">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th class="text-center align-middle">#</th>
                    <th class="text-center align-middle">Mã Đơn</th>
                    <th class="text-center align-middle">Thông Tin Nhận</th>
                    <th class="text-center align-middle">Số Tiền</th>
                    <th class="text-center align-middle">Tình Trạng</th>
                    <th class="text-center align-middle">Chi Tiết</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <th class="text-center align-middle">1</th>
                    <td class="text-center align-middle">SSSS</td>
                    <td class="align-middle">
                        Tánh <br> 1231231231
                    </td>
                    <td class="align-middle">
                        423232
                    </td>
                    <td class="text-center text-nowrap align-middle">
                        <button style="width: 120px; font-size: 13px" class="btn btn-secondary">Đang Xử Lý</button>
                    </td>
                    <td class="text-center text-nowrap align-middle">
                        <div class="accordion accordion-flush" id="accordionFlushExample">
                            <div class="accordion-item">
                                <h2 class="accordion-header" id="flush-headingTwo">
                                    <button data-bs-target="#flush-collapseTwo" class="accordion-button collapsed"
                                        type="button" data-bs-toggle="collapse" aria-expanded="false"
                                        aria-controls="flush-collapseTwo">
                                        Chi Tiết
                                    </button>
                                </h2>
                            </div>
                        </div>
                    </td>
                </tr>
                <td colspan="6">
                    <div id='flush-collapseTwo' + value.id" class="accordion-collapse collapse"
                        aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
                        <div class="accordion-body">
                            <div class="mb-3 mb-lg-4 bg-light shadow-sm px-4 py-3">
                                <div class="row align-items-center no-gutters p-md-2">
                                    <div class="col-4">
                                        <div><strong>Tên Xe</strong></div>
                                        <small class="text-muted">12</small>
                                    </div>
                                    <div class="col-3">
                                        <div><strong>Đơn Giá</strong></div>
                                        <small class="text-muted">12</small>
                                    </div>
                                    <div class="col-2">
                                        <div><strong>Số Lượng</strong></div>
                                        <small class="text-muted">12</small>

                                    </div>
                                    <div class="col-3 text-right">
                                        <div><strong class="text-danger">Tổng Tiền</strong></div>
                                        <span>1212đ</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </td>
            </tbody>
        </table>
    </div>
@endsection
@section('js_profile')
@endsection
