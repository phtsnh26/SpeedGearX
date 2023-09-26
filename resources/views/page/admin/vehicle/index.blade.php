@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class=" container w-100 text-end">
            <button type="button" class="btn btn-outline-primary" style="border-radius: 30px" data-bs-toggle="modal"
                data-bs-target="#send-invoice-sidebar">
                <i class="fa-solid fa-plus"></i>
                Thêm Mới Xe
            </button>
        </div>
        <div class="modal modal-slide-in " id="send-invoice-sidebar" aria-modal="true" role="dialog" style="display: none;">
            <div class="modal-dialog sidebar-lg">
                <div class="modal-content p-0">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">×</button>
                    <div class="modal-header mb-1">
                        <h5 class="modal-title">
                            <span class="align-middle">Thêm Mới Xe</span>
                        </h5>
                    </div>
                    <div class="modal-body flex-grow-1">
                        <form>


                            <div class="mb-1">
                                <label class="form-label">Hình Ảnh</label>
                                <input type="file" class="form-control" placeholder="Chọn hình ảnh" multiple
                                    @change="uploadImages" accept="image/png, image/jpeg, image/jpg">
                            </div>
                            <div>
                                <div class="row">
                                    <template style="gap: 5px;" v-for="(imageUrl, index) in imageUrls" class="mb-2 pe-2">
                                        <div class="col-3 text-center">
                                            <img style="width: 80px; height: 80px;" :src="'/image/' + imageUrl"
                                                class="" alt="">
                                            <i @click="removeImage(index)" class="fas fa-times-circle"></i>
                                        </div>
                                    </template>
                                </div>
                            </div>

                            <div class="mb-1">
                                <label for="invoice-to" class="form-label">Thương Hiệu</label>
                                <select v-model='add.id_thuong_hieu' class="form-select">
                                    <option v-for='(v, k) in brand' :value="v.id">@{{ v.ten_thuong_hieu }}</option>

                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="invoice-subject" class="form-label">Tên Xe</label>
                                <input @input='generateSlug' v-model='add.ten_xe' type="text"
                                    class="form-control" placeholder="Nhập tên xe">
                            </div>
                            <div class="mb-1">
                                <label for="invoice-subject" class="form-label">Slug Xe</label>
                                <input v-model='add.slug_xe' type="text" class="form-control" placeholder="Nhập slug xe">
                            </div>
                            <div class="mb-1">
                                <label for="invoice-to" class="form-label">Loại Xe</label>
                                <select v-model='add.id_loai_xe' class="form-select">
                                    <option v-for='(v, k) in classification' :value="v.id">@{{ v.so_cho_ngoi }}
                                    </option>

                                </select>
                            </div>
                            <div class="mb-1">
                                <label for="invoice-message" class="form-label">Mô Tả Ngắn</label>
                                <textarea v-model='add.mo_ta_ngan' class="form-control" cols="3" rows="7" placeholder="Nhập mô tả ngắn"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="invoice-message" class="form-label">Mô Tả Chi Tiết</label>
                                <textarea v-model='add.mo_ta_chi_tiet' class="form-control" cols="3" rows="11"
                                    placeholder="Nhập mô tả chi tiết"></textarea>
                            </div>
                            <div class="mb-1">
                                <label for="invoice-subject" class="form-label">Giá Thuê/Ngày</label>
                                <input v-model='add.gia_theo_ngay' type="text" class="form-control"
                                    placeholder="Nhập giá thuê theo ngày">
                            </div>
                            <div class="mb-1">
                                <label for="invoice-subject" class="form-label">Đơn Giá</label>
                                <input v-model='add.don_gia' type="text" class="form-control"
                                    placeholder="Nhập đơn giá">
                            </div>
                            <div class="mb-2">
                                <label for="invoice-to" class="form-label">Tình Trạng</label>
                                <select v-model='add.tinh_trang' class="form-select">
                                    <option value="1">Hiển Thị</option>
                                    <option value="0">Khóa</option>
                                </select>
                            </div>

                        </form>
                    </div>
                    <div class="modal-footer text-end">
                        <div class="mb-1 d-flex flex-wrap">
                            <button @click='addVehicle()' type="button" class="btn btn-primary" data-bs-dismiss="modal">
                                <i class="fa-solid fa-plus"></i>
                                Thêm Mới
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container mt-2">
            <div class="card">
                <div class="card-body">
                    <div class="w-100 text-center">
                        <h2>Danh Sách Xe</h2>
                    </div>
                    <div class="input-group mb-1">
                        <button @click='search()' class="btn btn-outline-primary waves-effect" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-search">
                                <circle cx="11" cy="11" r="8"></circle>
                                <line x1="21" y1="21" x2="16.65" y2="16.65"></line>
                            </svg>
                        </button>
                        <input @keyup.enter="search()" v-model='key_search' type="text" class="form-control"
                            placeholder="Nhập tìm kiếm" aria-label="Amount">
                        <button class="btn btn-outline-primary waves-effect" type="button" @click='search()'>Search
                            !</button>
                    </div>
                    <div class="table table-responsive">
                        <table class="table table-bordered">
                            <thead class="text-primary">
                                <tr class="text-center algin-middle text-nowrap">
                                    <th>#</th>
                                    <th>Hình Ảnh</th>
                                    <th>Thương Hiệu</th>
                                    <th>Tên Xe</th>
                                    <th>Mô Tả Ngắn</th>
                                    <th>Mô Tả Chi Tiết</th>
                                    <th>Loại Xe</th>
                                    <th>Giá Thuê</th>
                                    <th>Tình Trạng</th>
                                    <th>Phương Thức</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for='(v, k) in list'>
                                    <th>@{{ k + 1 }}</th>
                                    <td class="text-nowrap text-center align-middle">
                                        <img v-bind:src="v.hinh_anh_xe" style="height: 100px;width: 150px;">
                                    </td>
                                    <td class="text-nowrap align-middle text-center">@{{ v.ten_thuong_hieu }}</td>
                                    <td class="text-nowrap align-middle text-center">@{{ v.ten_xe }}</td>
                                    <td class="text-center align-middle">
                                        <i v-on:click='mo_ta.mo_ta_ngan = v.mo_ta_ngan'
                                            class="fa-solid fa-circle-info text-info"
                                            style="font-size: 35px; cursor: pointer;" data-bs-target="#moTaNganModal"
                                            data-bs-toggle="modal"></i>
                                    </td>
                                    <td class="text-center align-middle">
                                        <i v-on:click='mo_ta.mo_ta_chi_tiet = v.mo_ta_chi_tiet'
                                            class="fa-solid fa-circle-info text-info"
                                            style="font-size: 35px; cursor: pointer;" data-bs-target="#moTaChiTietModal"
                                            data-bs-toggle="modal"></i>
                                    </td>

                                    <td class="text-center">
                                        @{{ v.so_cho_ngoi }} chỗ
                                    </td>
                                    <td class="text-nowrap text-center">
                                        <p>Giá thuê/ngày: <b>@{{ numberFormat(v.gia_theo_ngay) }}</b> </p>
                                    </td>
                                    <td class="text-center algin-middle text-nowrap">
                                        <button style="width: 100px;" @click='changeStatus(v); index = k'
                                            v-if='v.tinh_trang' type="button" class="btn btn-relief-success">Hiển
                                            Thị</button>
                                        <button style="width: 100px;" @click='changeStatus(v); index = k' v-else
                                            type="button" class="btn btn-relief-danger">Khóa</button>
                                    </td>
                                    <td class="text-center algin-middle text-nowrap">
                                        <i @click='edit = Object.assign({}, v); index = k; loadEdit(v)'
                                            class="fa-solid fa-edit text-info" style="font-size: 35px; cursor: pointer;"
                                            data-bs-target="#editModal" data-bs-toggle="modal"></i>
                                        <i @click='del = v; index = k' class="fa-solid fa-trash text-danger"
                                            style="font-size: 35px; cursor: pointer;" data-bs-target="#deleteModal"
                                            data-bs-toggle="modal"></i>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal fade" id="moTaNganModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mô Tả Ngắn</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @{{ mo_ta.mo_ta_ngan }}
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="moTaChiTietModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Mô Tả Chi Tiết</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @{{ mo_ta.mo_ta_chi_tiet }}

                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                        aria-hidden="true">
                        <div class="modal-dialog modal-xl">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Cập Nhật Mới</h1>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                        aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <label class="form-label">Hình Ảnh</label>
                                                <input type="file" class="form-control" placeholder="Chọn hình ảnh"
                                                    multiple @change="e_uploadImages"
                                                    accept="image/png, image/jpeg, image/jpg">
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <template style="gap: 5px;" v-for="(imageUrl, index) in e_imageUrls"
                                                        class="mb-2 pe-2">
                                                        <div class="col-3 text-center">
                                                            <img style="width: 80px; height: 80px;"
                                                                :src="imageUrl.hinh_anh_xe" class="" alt="">
                                                            <i @click="e_removeImage(index)"
                                                                class="fas fa-times-circle"></i>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                            <div>
                                                <div class="row">
                                                    <template style="gap: 5px;"
                                                        v-for="(imageUrl, index) in update_imageUrls" class="mb-2 pe-2">
                                                        <div class="col-3 text-center">
                                                            <img style="width: 80px; height: 80px;"
                                                                :src="'/image/' + imageUrl" class="" alt="">
                                                            <i @click="e_removeImage(index)"
                                                                class="fas fa-times-circle"></i>
                                                        </div>
                                                    </template>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <label>Thương Hiệu</label>
                                                <select v-model='edit.id_thuong_hieu' class="form-select">
                                                    <option v-for='(v, k) in brand' :value="v.id">
                                                        @{{ v.ten_thuong_hieu }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <label>Tên Xe</label>
                                                <input @input="e_generateSlug()" v-model='edit.ten_xe' type="text" placeholder="Nhập vào tên xe"
                                                    class="form-control">
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <label>Slug Xe</label>
                                                <input v-model='edit.slug_xe' type="text"
                                                    placeholder="Nhập vào slug xe" class="form-control">
                                            </div>
                                        </div>

                                    </div>
                                    <div class="row">
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <label>Loại Xe</label>
                                                <select v-model='edit.id_loai_xe' class="form-select">
                                                    <option v-for="(v, k) in classification" :value="v.id">
                                                        @{{ v.so_cho_ngoi }}</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-2"><label>Giá Thuê / Ngày</label>
                                                <input v-model='edit.gia_theo_ngay' type="number"
                                                    placeholder="Nhập giá thuê theo ngày" class="form-control">
                                            </div>
                                        </div>
                                        <div class="mb-1 col-3">
                                            <label for="invoice-subject" class="form-label">Đơn Giá</label>
                                            <input v-model='edit.don_gia' type="text" class="form-control"
                                                placeholder="Nhập đơn giá">
                                        </div>
                                        <div class="col-3">
                                            <div class="mb-2">
                                                <label>Tình Trạng</label>
                                                <select v-model='edit.tinh_trang' class="form-select">
                                                    <option value="1">Hiển Thị</option>
                                                    <option value="0">Khóa</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="mb-2"><label>Mô Tả Ngắn</label>
                                                <textarea v-model='edit.mo_ta_ngan' cols="30" rows="10" placeholder="Nhập mô tả ngắn"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="mb-2"><label>Mô Tả Chi Tiết</label>
                                                <textarea v-model='edit.mo_ta_chi_tiet' cols="30" rows="10" placeholder="Nhập mô tả chi tiết"
                                                    class="form-control"></textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                    <button @click='updateVehicle(edit)' data-bs-dismiss="modal"
                                        class="btn btn-info waves-effect waves-float waves-light">Cập Nhật</button>
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
                                    <h6> Bạn có chắc muốn xóa xe <b>@{{ del.ten_xe }}</b> không ?</h6>
                                    <h6>
                                        <p><b>Lưu ý : </b> <span class="text-danger">Điều này không thể khôi
                                                phục!</span>
                                        </p>
                                    </h6>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary"
                                        data-bs-dismiss="modal">Thoát</button>
                                    <button @click='deleteVehicle(del)' type="button" class="btn btn-danger"
                                        data-bs-dismiss="modal">Xóa</button>
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
                    index: 0,
                    list: [],
                    brand: [],
                    classification: [],
                    mo_ta: {
                        mo_ta_ngan: '',
                        mo_ta_chi_tiet: ''
                    },
                    imageUrls: [],
                    e_imageUrls: [],
                    update_imageUrls: [],
                    add: {},
                    key_search: '',
                    del: {},
                    edit: {},
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataVehicle') }}')
                            .then((res) => {
                                this.list = res.data.data;
                                this.brand = res.data.brand;
                                this.classification = res.data.classification;
                            });
                    },
                    numberFormat(number) {
                        return new Intl.NumberFormat('vi-VI', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(number);
                    },
                    chooseImages(event) {
                        const files = event.target.files;
                        if (files) {
                            for (let i = 0; i < files.length; i++) {
                                const file = files[i];
                                this.imageUrls.push(URL.createObjectURL(file));
                            }
                        } else {
                            this.imageUrls = []; // Xóa danh sách ảnh nếu không có tệp nào được chọn
                        }
                    },
                    e_removeImage(index) {
                        this.e_imageUrls.splice(index, 1); // Xóa ảnh khỏi danh sách theo chỉ mục

                    },
                    removeImage(index) {
                        this.imageUrls.splice(index, 1); // Xóa ảnh khỏi danh sách theo chỉ mục

                    },
                    addVehicle() {
                        var payload = {
                            'vehicle': this.add,
                            'image': this.imageUrls,
                            ...this
                            .add // Sử dụng toán tử spread để chèn tất cả các phần tử trong this.add vào payload
                        };
                        axios
                            .post('{{ Route('createVehicle') }}', payload)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.search();
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Lỗi');
                                });
                            });
                    },
                    uploadImages(event) {
                        const formData = new FormData();
                        const images = event.target.files;
                        // formData.append('images', images);

                        // Thêm các tệp ảnh vào FormData
                        for (let i = 0; i < images.length; i++) {
                            formData.append('images[]', images[i]);
                        }

                        // Gửi yêu cầu POST đến route upload.images
                        axios
                            .post('{{ Route('upLoadImage') }}', formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                },
                            }).then((res) => {
                                this.imageUrls = res.data.data;
                                console.log(this.imageUrls);
                            }).catch((error) => {
                                console.error(error);
                            });
                    },
                    e_uploadImages(event) {
                        this.e_imageUrls = [];
                        const formData = new FormData();
                        const images = event.target.files;
                        // formData.append('images', images);

                        // Thêm các tệp ảnh vào FormData
                        for (let i = 0; i < images.length; i++) {
                            formData.append('images[]', images[i]);
                        }

                        // Gửi yêu cầu POST đến route upload.images
                        axios
                            .post('{{ Route('upLoadImage') }}', formData, {
                                headers: {
                                    'Content-Type': 'multipart/form-data',
                                },
                            }).then((res) => {
                                this.update_imageUrls = res.data.data;
                                console.log(this.update_imageUrls);
                            }).catch((error) => {
                                console.error(error);
                            });
                    },
                    search() {
                        var payload = {
                            'key': this.key_search
                        }
                        axios
                            .post('{{ Route('searchVehicle') }}', payload)
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
                            .post('{{ Route('changeStatus') }}', v)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.list[this.index].tinh_trang = !this.list[this.index]
                                        .tinh_trang;
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Lỗi');
                                });
                            });
                    },
                    deleteVehicle(a) {
                        axios
                            .post('{{ Route('deleteVehicle') }}', a)
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
                                    toastr.error(v[0], 'Lỗi');
                                });
                            });
                    },
                    loadEdit(v) {
                        axios
                            .post('{{ Route('edit_img') }}', v)
                            .then((res) => {
                                this.e_imageUrls = res.data.data;
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    updateVehicle(a) {
                        var payload = {
                            'vehicle': a,
                            ...a,
                            'image': this.update_imageUrls
                        }
                        axios
                            .post('{{ Route('updateVehicle') }}', payload)
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
                    },
                    generateSlug() {
                        this.add.slug_xe = this.toSlug(this.add.ten_xe);
                    },
                    e_generateSlug() {
                        this.edit.slug_xe = this.toSlug(this.edit.ten_xe);
                    },
                },
            });
        });
    </script>
@endsection
