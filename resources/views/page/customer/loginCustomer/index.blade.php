@extends('share.customer.loginClient')
@section('content')
    <style>
        .form-control {
            /* border-color: rgb(234, 84, 85) */

        }

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
                        <div class="main__logo text-center mb-1">
                            <h1 class="main__logo--title">
                                <a class="main__logo--link" href="{{ Route('indexHome') }}">
                                    <img class="main__logo--img" src="/partsix/assets/img/logo/logo.png" alt="logo-img"
                                        style="width: 175px">
                                </a>
                            </h1>
                        </div>
                        <h2 class="card-title fw-bold mb-1">Welcome to Online Car Rental !</h2>
                        <p class="card-text mb-2">Vui lòng đăng nhập để có trải nghiệm tốt hơn</p>
                        <div class="mb-1">
                            <label>Tên Đăng Nhập</label>
                            <input v-model="signIn.ten_dang_nhap" class="form-control" type="text"
                                placeholder="Nhập email, tên đăng nhập hoặc số điện thoại" autofocus="" tabindex="1">
                        </div>
                        <div class="mb-1">
                            <div class="d-flex justify-content-between">
                                <label>Mật Khẩu</label>
                                <a href="auth-forgot-password-cover.html">
                                    <small class="text-danger">
                                        Forgot Password?
                                    </small>
                                </a>
                            </div>
                            <div class="input-group input-group-merge form-password-toggle">
                                <input v-on:keyup.enter='dangNhap()' v-model="signIn.password" class="form-control"
                                    :type="showPass ? 'text' : 'password'" placeholder="Nhập mật khẩu" tabindex="2">
                                <span class="input-group-text cursor-pointer" @click="showPass = !showPass">
                                    <i
                                        :class="showPass ? 'fa-regular fa-eye' :
                                            'fa-regular fa-eye-slash'">
                                    </i>
                                </span>
                            </div>
                        </div>
                        <button tabindex="2" @click='dangNhap()'
                            class="btn btn-danger w-100 waves-effect waves-float waves-light">
                            Đăng Nhập
                        </button>
                        <p class="text-center mt-2"><span>Bạn là khách hàng mới?</span><a
                                href="{{ Route('indexSignUp') }}"><span class="text-danger">&nbsp;Đăng ký tại đây
                                </span></a>
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
                    signIn: {},
                },
                created() {

                },
                methods: {
                    dangNhap() {
                        axios
                            .post('{{ Route('signInClient') }}', this.signIn)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    setTimeout(() => {
                                        window.location.replace(
                                            '{{ Route('indexHome') }}');
                                    }, 500);
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
