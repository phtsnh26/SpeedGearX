@extends('share.customer.loginClient')
@section('content')
    <style>
        .text-primary: {
            color: red !important;
        }
    </style>
    <div class="auth-wrapper auth-cover">
        <div class="auth-inner row m-0">
            <!-- Left Text-->
            <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                <div class="w-100 d-lg-flex align-items-center justify-content-center px-5"><img class="img-fluid"
                        src="/vuexy/app-assets/images/pages/login-v2.svg" alt="Login V2"></div>
            </div>
            <!-- /Left Text-->
            <!-- Login-->
            <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                    <h2 class="card-title fw-bold mb-1">Welcome to Online Car Rental! 👋</h2>
                    <p class="card-text mb-2">Vui lòng đăng nhập để có trải nghiệm tốt hơn</p>
                    <div class="mb-1">
                        <label class="form-label" for="login-email">Email</label>
                        <input class="form-control" id="login-email" type="text" name="login-email"
                            placeholder="Nhập email" aria-describedby="login-email" autofocus="" tabindex="1">
                    </div>
                    <div class="mb-1">
                        <div class="d-flex justify-content-between">
                            <label class="form-label" for="login-password">Mật Khẩu</label><a
                                href="auth-forgot-password-cover.html"><small class="text-danger">Forgot
                                    Password?</small></a>
                        </div>
                        <div class="input-group input-group-merge form-password-toggle">
                            <input class="form-control form-control-merge" id="login-password" type="password"
                                name="login-password" placeholder="Nhập mật khẩu" aria-describedby="login-password"
                                tabindex="2"><span class="input-group-text cursor-pointer"><svg
                                    xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                    fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                    stroke-linejoin="round" class="feather feather-eye">
                                    <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                    <circle cx="12" cy="12" r="3"></circle>
                                </svg></span>
                        </div>
                    </div>
                    <button class="btn btn-danger w-100 waves-effect waves-float waves-light" tabindex="4">
                        Đăng Nhập
                    </button>
                    <p class="text-center mt-2"><span>Bạn là khách hàng mới?</span><a
                            href="{{ Route('indexSignUp') }}"><span class="text-danger">&nbsp;Đăng ký tại đây </span></a>
                    </p>
                    <div class="divider my-2">
                        <div class="divider-text">or</div>
                    </div>
                    <div class="auth-footer-btn d-flex justify-content-center">
                        <a class="btn btn-facebook waves-effect waves-float waves-light" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-facebook">
                                <path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z">

                                </path>
                            </svg>
                        </a>
                        <a class="btn btn-google waves-effect waves-float waves-light" href="#">
                            <svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24"
                                fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                                stroke-linejoin="round" class="feather feather-mail">
                                <path d="M4 4h16c1.1 0 2 .9 2 2v12c0 1.1-.9 2-2 2H4c-1.1 0-2-.9-2-2V6c0-1.1.9-2 2-2z">
                                </path>
                                <polyline points="22,6 12,13 2,6"></polyline>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <!-- /Login-->
        </div>
    </div>
@endsection
