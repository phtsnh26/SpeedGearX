@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class="container mt-2">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 text-center">
                                <h2>Thêm Mới Loại  Xe</h2>
                            </div>
                            <label>Số Chỗ Ngồi</label>
                            <input type="text" class="form-control mt-1" placeholder="Nhập vào số  chỗ ngồi">
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary">
                                <i class="fa-solid fa-plus"></i>
                                Thêm Mới
                            </button>
                        </div>
                    </div>
                </div>
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 text-center">
                                <h2>Danh Sách Loại Xe</h2>
                            </div>
                            <div class="input-group mb-1">
                                <button class="btn btn-outline-primary waves-effect" type="button">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-search">
                                        <circle cx="11" cy="11" r="8"></circle>
                                        <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                                    </svg>
                                </button>
                                <input type="text" class="form-control" placeholder="Nhập tìm kiếm" aria-label="Amount">
                                <button class="btn btn-outline-primary waves-effect" type="button">Search !</button>
                            </div>
                            <table class="table table-bordered">
                                <thead class="text-center algin-middle text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Số Chỗ</th>
                                        <th>Phương Thức</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th class="text-center algin-middle">1</th>

                                        <td class="text-center algin-middle">
                                            7  chỗ
                                        </td>
                                        <td class="text-center algin-middle">
                                            <i class="fa-solid fa-trash text-danger"
                                                style="font-size: 35px; cursor: pointer;" data-bs-target="#deleteModal"
                                                data-bs-toggle="modal"></i>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Xóa Xe</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <h6> Bạn có chắc muốn xóa loại xe <b>hhhh</b> không ?</h6>
                                            <h6>
                                                <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi
                                                        phục!</span>
                                                </p>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Thoát</button>
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
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {

                },
                created() {

                },
                methods: {

                },
            });
        })
    </script>
@endsection
