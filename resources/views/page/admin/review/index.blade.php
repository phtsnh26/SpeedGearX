@extends('share.admin.masterPage')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center">Danh Sách Đánh Giá</h2>
                        <table class="table table-bordered">
                            <thead>
                                <tr class="text-center text-nowrap align-middle text-primary">
                                    <th>#</th>
                                    <th>Tên</th>
                                    <th>Email</th>
                                    <th>Đánh Giá</th>
                                    <th>Lời Nhắn</th>
                                    <th>Thời Gian</th>
                                    <th>Phương Thức</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="align middle ">
                                    <td>1</td>
                                    <td>Tom</td>
                                    <td>tom@gmail.com</td>
                                    <td>
                                        Good!
                                    </td>
                                    <td>
                                        Xe chạy rất mượt
                                    </td>
                                    <td>
                                        <input type="date" class="form-control">
                                    </td>
                                    <td class="text-center algin-middle">
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
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Đánh Giá</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <h6> Bạn có chắc muốn xóa đánh giá của <b>xxxx</b> không ?</h6>
                                        <h6>
                                            <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi
                                                    phục!</span>
                                            </p>
                                        </h6>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Thoát</button>
                                        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Xóa</button>
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
