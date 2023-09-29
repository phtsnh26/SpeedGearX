@extends('share.customer.loginClient')
@section('content')
    <style>
        .row {
            --bs-gutter-x: none;
        }
    </style>
    <div id="app">
        <div class="auth-wrapper auth-cover">
            <div class="auth-inner row m-0">
                <!-- Left Text-->
                <div class=" d-flex col-8 align-items-center">
                    <div class="d-flex align-items-center justify-content-center w-100 h-100">
                        <img class="img-fluid w-100"
                            src="https://images.pexels.com/photos/1638459/pexels-photo-1638459.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1"
                            alt="Login V2" style="height: 100%;">
                    </div>
                </div>
                <!-- /Left Text-->
                <!-- Login-->
                <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                    <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                        <h2 class="card-title fw-bold mb-1">Đăng ký tài khoản</h2>
                        <div class="mb-1">
                            <label class="form-label">Họ và Tên</label>
                            <input v-model="signUp.ho_va_ten" class="form-control" type="text"
                                placeholder="Nhập họ và tên" aria-describedby="login-email" autofocus="" tabindex="1">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Địa Chỉ</label>
                            <input v-model="signUp.dia_chi" class="form-control" type="text"
                                placeholder="Nhập tên đăng nhập" aria-describedby="login-email" autofocus=""
                                tabindex="1">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Ngày Sinh</label>
                            <input v-model="signUp.ngay_sinh" class="form-control" type="date"
                                placeholder="Nhập ngày tháng năm sinh" aria-describedby="login-email" autofocus=""
                                tabindex="1">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Số Điện Thoại</label>
                            <input v-model="signUp.so_dien_thoai" class="form-control" type="number"
                                placeholder="Nhập căn cước công dân" aria-describedby="login-email" autofocus=""
                                tabindex="1">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Email</label>
                            <input v-model="signUp.email" class="form-control" type="text" placeholder="Nhập email"
                                aria-describedby="login-email" autofocus="" tabindex="1">
                        </div>
                        <div class="mb-1">
                            <label class="form-label">Tên Đăng Nhập</label>
                            <input v-model="signUp.ten_dang_nhap" class="form-control" type="text"
                                placeholder="Nhập tên đăng nhập" aria-describedby="login-email" autofocus=""
                                tabindex="1">
                        </div>

                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">Mật Khẩu</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input v-model="signUp.password" class="form-control form-control-merge"
                                    :type="showPass ? 'text' : 'password'" name="login-password" placeholder="Nhập mật khẩu"
                                    aria-describedby="login-password" tabindex="2">
                                <span class="input-group-text cursor-pointer" @click="showPass = !showPass">
                                    <i
                                        :class="showPass ? 'fa-regular fa-eye' :
                                            'fa-regular fa-eye-slash'">
                                    </i>
                                </span>
                            </div>
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label class="form-label" for="login-password">Nhập Lại Mật Khẩu</label>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input v-model="signUp.re_password" class="form-control form-control-merge"
                                    :type="showPass2 ? 'text' : 'password'" name="login-password"
                                    placeholder="Nhập lại mật khẩu" aria-describedby="login-password" tabindex="2">
                                <span class="input-group-text cursor-pointer" @click="showPass2 = !showPass2">
                                    <i
                                        :class="showPass2 ? 'fa-regular fa-eye' :
                                            'fa-regular fa-eye-slash'">
                                    </i>
                                </span>
                            </div>
                        </div>
                        <button @click='dangKy()' class="btn btn-danger w-100 waves-effect waves-float waves-light">
                            Đăng Ký
                        </button>
                        <p class="text-center mt-2">
                            <span>
                                Bạn đã có tài khoản?
                            </span>
                            <a href="{{ Route('indexLoginCustomer') }}">
                                <span class="text-danger">&nbsp;Đăng nhập tại
                                    đây
                                </span>
                            </a>
                        </p>
                    </div>
                </div>

                <!-- /Login-->
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
                    showPass: false,
                    showPass2: false,
                    signUp: {},
                    signIn: {},
                },
                created() {

                },
                methods: {
                    dangKy() {
                        axios
                            .post('{{ Route('signUpClient') }}', this.signUp)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
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

                },
            });
        })
    </script>
@endsection
