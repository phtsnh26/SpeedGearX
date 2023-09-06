@extends('share.admin.masterPage')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card border-primary border-top border-4 border-0">
                <div class="card-header  text-center">
                    <legend><b>Danh Sách Người Dùng</b></legend>
                </div>
                <div class="card-body">
                    <table class="table table-bordered">
                        <thead class="text-primary">
                            <tr>
                                <th class="text-center text-nowrap align-middle">#</th>
                                <th class="text-center text-nowrap align-middle">Họ Và Tên</th>
                                <th class="text-center text-nowrap align-middle">Email</th>
                                <th class="text-center text-nowrap align-middle">Số Điện Thoại</th>
                                <th class="text-center text-nowrap align-middle">Địa Chỉ</th>
                                <th class="text-center text-nowrap align-middle">Ngày Tháng Năm Sinh</th>
                                <th class="text-center text-nowrap align-middle">Tình Trạng</th>
                                <th class="text-center text-nowrap align-middle">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th class="text-center text-nowrap align-middle">1</th>
                                <td class=" text-nowrap align-middle">Lê Công Anh</td>
                                <td class=" text-nowrap align-middle">conganh2122003@gmail.com</td>
                                <td class=" text-nowrap align-middle">0213456789</td>
                                <td class=" text-nowrap align-middle">05 abc, xyz</td>
                                <td class=" text-nowrap align-middle">21/02/2003</td>
                                <td class="text-center text-nowrap align-middle">
                                    <button type="button" class="btn btn-relief-success">Hiển Thị</button>
                                    <button type="button" class="btn btn-relief-danger">Khóa</button>
                                </td>
                                <td class="text-center text-nowrap align-middle">
                                    <i class="fa-solid fa-trash text-danger" style="font-size: 35px; cursor: pointer;"
                                        data-bs-target="#deleteModal" data-bs-toggle="modal"></i>
                                </td>

                            </tr>
                        </tbody>
                    </table>
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
                                    <h6> Bạn có chắc muốn xóa người dùng <b>xxxx</b> không ?</h6>
                                    <h6>
                                        <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi phục!</span>
                                        </p>
                                    </h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Thoát</button>
                                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
