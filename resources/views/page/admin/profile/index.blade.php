@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Thông Tin Cá Nhân</h4>
            </div>
            <div class="card-body py-2 my-25">
                <div class="d-flex"><a href="#" class="me-25"><img :src="list.hinh_anh" id="account-upload-img"
                            alt="profile image" height="100" width="100" class="uploadedAvatar rounded me-50"></a>
                </div>
                <form novalidate="novalidate" class="validate-form mt-2 pt-50">
                    <div class="row">
                        <div class="col-12 col-sm-6 mb-1"><label for="accountFirstName" class="form-label">Họ và Tên</label>
                            <input v-model="list.ho_va_ten" type="text" placeholder="Nhập vào họ của bạn"
                                class="form-control">
                        </div>
                        <div class="col-12 col-sm-6 mb-1"><label for="accountEmail" class="form-label">Email</label>
                            <input v-model="list.email" type="email" placeholder="Nhập vào email" class="form-control">
                        </div>
                        <div class="col-12 col-sm-6 mb-1"><label for="accountPhoneNumber" class="form-label">Số Điện
                                Thoại</label>
                            <input v-model="list.so_dien_thoai" type="text" placeholder="Nhập vào số điện thoại"
                                class="form-control account-number-mask">
                        </div>
                        <div class="col-12 col-sm-6 mb-1"><label for="accountAddress" class="form-label">Địa Chỉ</label>
                            <input v-model="list.dia_chi" type="text" placeholder="Nhập vào địa chỉ của bạn"
                                class="form-control">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header border-bottom">
                <h4 class="card-title">Đổi Mật Khẩu</h4>
            </div>
            <div class="card-body py-2 my-25">
                <div class="row">
                    <div class="col">
                        <label> Nhập Mật Khẩu Cũ:</label>
                        <div class="input-group input-group-merge form-password-toggle mt-1">
                            <input v-model="changePass.password" :type="showPass1 ? 'text' : 'password'"
                                class="form-control" id="basic-default-password1" placeholder="Nhập mật khẩu cũ"
                                aria-describedby="basic-default-password1">
                            <span class="input-group-text cursor-pointer" @click="showPass1 = !showPass1">
                                <i
                                    :class="showPass1 ? 'fa-regular fa-eye' :
                                        'fa-regular fa-eye-slash'"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="mt-1"> Nhập Mật Khẩu Mới:</label>
                        <div class="input-group input-group-merge form-password-toggle mt-1">
                            <input v-model="changePass.mat_khau_moi" :type="showPass2 ? 'text' : 'password'"
                                class="form-control" id="basic-default-password1" placeholder="Nhập mật khẩu mới"
                                aria-describedby="basic-default-password1">
                            <span class="input-group-text cursor-pointer" @click="showPass2 = !showPass2">
                                <i
                                    :class="showPass2 ? 'fa-regular fa-eye' :
                                        'fa-regular fa-eye-slash'"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <label class="mt-1"> Xác Nhận Lại Mật Khẩu Mới:</label>
                        <div class="input-group input-group-merge form-password-toggle mt-1">
                            <input v-model="changePass.nhap_lai_mat_khau_moi" :type="showPass3 ? 'text' : 'password'"
                                class="form-control" id="basic-default-password1" placeholder="Nhập lại mật khẩu mới"
                                aria-describedby="basic-default-password1">
                            <span class="input-group-text cursor-pointer" @click="showPass3 = !showPass3">
                                <i
                                    :class="showPass3 ? 'fa-regular fa-eye' :
                                        'fa-regular fa-eye-slash'"></i>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="row mt-2 text-center w-100">
                    <div class="col">
                        <button class="btn btn-primary" @click="doiMatKhau()">Đổi Mật Khẩu</button>
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
                    list: {},
                    showPass1: false,
                    showPass2: false,
                    showPass3: false,
                    changePass: {},
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataAdmin') }}')
                            .then((res) => {
                                this.list = res.data.data
                            });
                    },
                    doiMatKhau() {
                        axios
                            .post('{{ Route('changePass') }}', this.changePass)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
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
                },
            });
        })
    </script>
@endsection
