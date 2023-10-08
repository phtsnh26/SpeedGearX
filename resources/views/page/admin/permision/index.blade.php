@extends('share.admin.masterPage')

@section('content')
    <div id="app">
        <div class="row">
            <div class="col-7">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Danh Sách Quyền</h4>
                        <button class='btn btn-outline-primary' data-bs-toggle="modal" data-bs-target="#themMoiModal">Thêm
                            Mới
                            Quyền</button>
                    </div>
                    <div class="modal fade" id="themMoiModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Quyền</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="mb-3">
                                        <label for="" class="form-label">Tên quyền</label>
                                        <input @keyup.enter='them_moi(); ' v-model='add.ten_quyen' type="text"
                                            class="form-control" name="" id="" aria-describedby="helpId"
                                            placeholder="">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button @click='them_moi()' type="button" class="btn btn-primary"
                                        data-bs-dismiss="modal">Thêm Mới</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class='table table-bordered'>
                            <thead>
                                <tr class='text-nowrap align-middle text-center'>
                                    <th>#</th>
                                    <th>Tên Quyền</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for='(v, k) in list' class='text-nowrap align-middle '>
                                    <th class='text-center'>@{{ k + 1 }}</th>
                                    <td>@{{ v.ten_quyen }}</td>
                                    <td class='text-center'>
                                        <button @click='capQuyen(v)' class='btn btn-primary'>Cấp Quyền</button>
                                        <button @click='del = v; index = k' class='btn btn-danger' data-bs-toggle="modal"
                                            data-bs-target="#delModal">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="modal fade" id="delModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                            aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Xoá Phân Quyền</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <div
                                            class="alert alert-warning border-0 bg-warning alert-dismissible fade show py-2">
                                            <div class="d-flex align-items-center">
                                                <div class="font-35 text-dark"><i class="bx bx-info-circle"></i>
                                                </div>
                                                <div class="ms-3">
                                                    <h6 class="mb-0 text-dark">Warning</h6>
                                                    <div class="text-dark">
                                                        <p>Bạn có muốn xóa phân quyền <b>@{{ del.ten_quyen }}</b> không?
                                                        </p>
                                                        <p>
                                                            <b>Lưu ý:</b> Điều này không thể hoàn tác!
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Close</button>
                                        <button type="button" class="btn btn-primary" @click='xoa()'
                                            data-bs-dismiss="modal">Delete</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-5">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Phân Quyền</h4>
                        <div class="form-check">
                            <input v-model="selectAllChecked" @change="selectAll()" class="form-check-input" type="checkbox"
                                value="" id="abcc">
                            <label class="form-check-label" for="abcc">
                                Select All
                            </label>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div v-for='(v, k) in list_quyen' class="col-6 mb-1">
                                <div class="form-check">
                                    <input @click='capNhatPhanQuyen(v.id, k)' class="form-check-input" type="checkbox"
                                        :id="v.id" :checked="selectAllChecked">
                                    <label class="form-check-label" :for="v.id">
                                        @{{ v.ten_hanh_dong }}
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer d-flex justify-content-between">
                        <button data-bs-toggle="modal" data-bs-target="#addHanhDong" class='btn btn-primary'>Thêm Phân
                            Quyền</button>
                        <button @click="xoaPhanQuyen" class='btn btn-danger'>Xoá Phân Quyền</button>
                    </div>
                    <!-- Modal -->
                    <div class="modal fade" id="addHanhDong" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Thêm Mới Phân Quyền</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="">Tên Quyền</label>
                                        <input v-model='add_quyen.ten_quyen' type="text" class="form-control"
                                            name="" id="" placeholder="Nhập tên quyền">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button @click='themPhanQuyen()' data-bs-dismiss="modal" type="button"
                                        class="btn btn-primary">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="checkModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Close</button>
                                    <button type="button" class="btn btn-primary">Save changes</button>
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
                    list_quyen: [],
                    add: {},
                    index: 0,
                    del: {},
                    chi_tiet: [],
                    selectAllChecked: false,
                    selectedQuyen: [],
                    add_quyen: {},
                },
                created() {
                    this.getData();
                },
                methods: {
                    themPhanQuyen() {
                        axios
                            .post('{{ route('addListPhanQuyen') }}', this.add_quyen)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.getData();
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    getData() {
                        axios
                            .get('{{ route('dataPermision') }}')
                            .then((res) => {
                                this.list = res.data.data;
                                this.list_quyen = res.data.list_quyen;
                            });
                    },
                    them_moi() {
                        axios
                            .post('{{ route('createPermision') }}', this.add)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.getData();
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    xoa() {
                        axios
                            .post('{{ route('deletePermision') }}', this.del)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.list.splice(this.index, 1);
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },

                    capQuyen(a) {
                        var payload = {
                            ...a,
                            list_select: this.selectedQuyen
                        }
                        axios
                            .post('{{ route('capQuyen') }}', payload)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                } else {
                                    // $('#checkModal').modal('toggle')
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },

                    selectAll() {
                        // Cập nhật trạng thái của tất cả các checkbox dựa trên giá trị của selectAllChecked
                        if (this.selectAllChecked) {
                            this.selectedQuyen = this.list_quyen.map((v) => v.id);
                        } else {
                            this.selectedQuyen = [];
                        }
                    },
                    capNhatPhanQuyen(id, index) {
                        // Cập nhật trạng thái của checkbox được click
                        const selectedIndex = this.selectedQuyen.indexOf(id);
                        if (selectedIndex === -1) {
                            this.selectedQuyen.push(id);
                        } else {
                            this.selectedQuyen.splice(selectedIndex, 1);
                        }
                        // Cập nhật trạng thái của selectAllChecked dựa trên số lượng checkbox được chọn
                        this.selectAllChecked = this.selectedQuyen.length === this.list_quyen.length;
                    },
                    xoaPhanQuyen() {
                        axios
                            .post('{{ route('xoaListPhanQuyen') }}', this.selectedQuyen)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    }

                },
            });
        })
    </script>
@endsection
