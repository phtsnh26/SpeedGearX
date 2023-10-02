@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class="container mt-2">
            <div class="row">
                <div class="col-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="w-100 text-center">
                                <h2>Thêm Mới Thương Hiệu</h2>
                            </div>
                            <label>Hình Ảnh:</label>
                            <input v-model="add.hinh_anh" type="text" class="form-control mt-1 mb-1"
                                placeholder="Nhập vào hình ảnh">
                            <label>Tên Thương Hiệu:</label>
                            <input v-model="add.ten_thuong_hieu" type="text" class="form-control mt-1 mb-1"
                                placeholder="Nhập vào tên thương hiệu" @input="generateSlug">
                            <label>Slug Thương Hiệu:</label>
                            <input v-model="add.slug_thuong_hieu" type="text" class="form-control mt-1"
                                placeholder="Nhập vào slug thương hiệu">
                            <label class="mt-1">Tình Trạng:</label>
                            <select v-model="add.tinh_trang" class="form-select mt-1 mb-1">
                                <option value="1">Hiển Thị</option>
                                <option value="0">Khóa</option>
                            </select>
                        </div>
                        <div class="card-footer text-end">
                            <button class="btn btn-primary" v-on:click="themMoi();">
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
                                <h2>Danh Sách Thương Hiệu</h2>
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
                                <input v-model="search" v-on:keyup.enter="timKiem()" type="text" class="form-control"
                                    placeholder="Nhập tìm kiếm" aria-label="Amount">
                                <button class="btn btn-outline-primary waves-effect" type="button"
                                    v-on:click="timKiem()">Search !</button>
                            </div>
                            <table class="table table-bordered">
                                <thead class="text-center algin-middle text-primary">
                                    <tr>
                                        <th>#</th>
                                        <th>Hình Ảnh</th>
                                        <th>Tên Thương Hiệu</th>
                                        <th>Tình Trạng</th>
                                        <th>Phương Thức</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <template v-for="(v,k) in list">
                                        <tr>
                                            <th class="text-center algin-middle"> @{{ k + 1 }}</th>
                                            <td class="text-center algin-middle">
                                                <img v-bind:src="v.hinh_anh" style="height: 50px;">
                                            </td>
                                            <td class="text-center algin-middle"> @{{ v.ten_thuong_hieu }}</td>
                                            <td class="text-center algin-middle">
                                                <template v-if="v.tinh_trang == 1">
                                                    <button style="width: 120px" type="button"
                                                        class="btn btn-relief-success"
                                                        v-on:click="doiTrangThai(v); index=k">Hiển
                                                        Thị</button>
                                                </template>
                                                <template v-else>
                                                    <button style="width: 120px" type="button"
                                                        class="btn btn-relief-danger"
                                                        v-on:click="doiTrangThai(v); index=k">Khóa</button>
                                                </template>
                                            </td>
                                            <td class="text-center algin-middle">
                                                <i class="fa-solid fa-edit text-info"
                                                    style="font-size: 35px; cursor: pointer;" data-bs-target="#editModal"
                                                    data-bs-toggle="modal"
                                                    v-on:click="edit = Object.assign({},v); index = k"></i>
                                                <i class="fa-solid fa-trash text-danger"
                                                    style="font-size: 35px; cursor: pointer;" data-bs-target="#deleteModal"
                                                    data-bs-toggle="modal" v-on:click="del = v; index = k"></i>
                                            </td>
                                        </tr>
                                    </template>
                                </tbody>
                            </table>
                            <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Mới</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <label>Hình Ảnh:</label>
                                            <input v-model="edit.hinh_anh" type="text" class="form-control mt-1 mb-1"
                                                placeholder="Nhập vào hình ảnh">
                                            <label>Tên Thương Hiệu:</label>
                                            <input v-model="edit.ten_thuong_hieu" type="text"
                                                class="form-control mt-1 mb-1" placeholder="Nhập vào tên thương hiệu">
                                            <label>Slug Thương Hiệu:</label>
                                            <input v-model="edit.slug_thuong_hieu" type="text"
                                                class="form-control mt-1" placeholder="Nhập vào slug thương hiệu">
                                            <label class="mt-1">Tình Trạng:</label>
                                            <select v-model="edit.tinh_trang" class="form-select mt-1 mb-2">
                                                <option value="1">Hiển Thị</option>
                                                <option value="0">Khóa</option>
                                            </select>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Thoát</button>
                                            <button data-bs-dismiss="modal"
                                                class="btn btn-info waves-effect waves-float waves-light"
                                                v-on:click="sua()" data-bs-dismiss="modal">Cập Nhật</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
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
                                            <h6> Bạn có chắc muốn xóa thương hiệu <b>@{{ del.ten_thuong_hieu }}</b> không ?
                                            </h6>
                                            <h6>
                                                <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi
                                                        phục!</span>
                                                </p>
                                            </h6>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-bs-dismiss="modal">Thoát</button>
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal"
                                                v-on:click="xoa();">Xóa</button>
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
                    add: {
                        tinh_trang: 1,
                    },
                    del: {},
                    edit: {},
                    search: '',
                    index: 0,
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataBrand') }}')
                            .then((res) => {
                                this.list = res.data.data;
                            });
                    },
                    themMoi() {
                        axios
                            .post('{{ Route('createBrand') }}', this.add)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success("Đã thêm mới chuyên mục", "Thành công!");
                                    this.search();
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Lỗi');
                                });
                            });
                    },
                    xoa() {
                        axios
                            .post('{{ Route('delBrand') }}', this.del)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, "Thành Công");
                                    this.list.splice(this.index, 1);
                                } else {
                                    toastr.error(res.data.message, "Lỗi")
                                }
                            })
                    },
                    timKiem() {
                        var search = {
                            'giaTri': this.search
                        };
                        axios
                            .post('{{ Route('searchBrand') }}', search)
                            .then((res) => {
                                this.list = res.data.data;
                            })
                    },
                    sua() {
                        axios
                            .post('{{ Route('updateBrand') }}', this.edit)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, "Thành công!");
                                    this.$set(this.list, this.index, this.edit);
                                } else {
                                    toastr.error(res.data.message, "Lỗi!");
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Lỗi');
                                });
                            });
                    },
                    doiTrangThai(x) {
                        axios
                            .post('{{ Route('statusBrand') }}', x)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.list[this.index].tinh_trang = !this.list[this.index]
                                        .tinh_trang;
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                    },
                    generateSlug() {
                        this.add.slug_thuong_hieu = this.toSlug(this.add.ten_thuong_hieu);
                    },
                    toSlug(str) {
                        str = str.toLowerCase();
                        str = str
                            .normalize('NFD') // chuyển chuỗi sang unicode tổ hợp
                            .replace(/[\u0300-\u036f]/g, ''); // xóa các ký tự dấu sau khi tách tổ hợp
                        str = str.replace(/[đĐ]/g, 'd');
                        str = str.replace(/([^0-9a-z-\s])/g, '');
                        str = str.replace(/(\s+)/g, '-');
                        str = str.replace(/-+/g, '-');
                        str = str.replace(/^-+|-+$/g, '');
                        return str;
                    }
                },
            });
        })
    </script>
@endsection
