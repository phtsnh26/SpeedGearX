@extends('share.customer.masterPage')
@section('content')
    <div id="app">
        <div class="login__section section--padding">
            <div class="container">
                <form action="#">
                    <div class="login__section--inner">
                        <div class="row row-cols-md-2 row-cols-1">
                            <div class="col">
                                <div class="account__login">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title mb-10">Đăng Nhập</h2>
                                        <p class="account__login--header__desc">Đăng nhập để có thể đặt xe và sử dụng Web
                                            chúng tôi một cách tốt nhất !</p>
                                    </div>
                                    <div class="account__login--inner">
                                        <label>
                                            <input class="account__login--input" placeholder="Nhập tên đăng nhập hoặc email" type="email">
                                        </label>
                                        <label>
                                            <input class="account__login--input" placeholder="Nhập mật khẩu"
                                                type="password">
                                        </label>
                                        <div
                                            class="account__login--remember__forgot mb-15 d-flex justify-content-between align-items-center">
                                            <div class="account__login--remember position__relative">

                                            </div>
                                            <button class="account__login--forgot" type="submit">Forgot Your
                                                Password?</button>
                                        </div>
                                        <button class="account__login--btn primary__btn" type="submit">Login</button>
                                        <div class="account__login--divide">
                                            <span class="account__login--divide__text">OR</span>
                                        </div>
                                        <div class="account__social d-flex justify-content-center mb-15">
                                            <a class="account__social--link facebook" target="_blank"
                                                href="https://www.facebook.com">Facebook</a>
                                            <a class="account__social--link google" target="_blank"
                                                href="https://www.google.com">Google</a>
                                        </div>
                                        <p class="account__login--signup__text">Bạn chưa có tài khoản? <button
                                                type="submit">Đăng Ký Ngay</button></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="account__login register">
                                    <div class="account__login--header mb-25">
                                        <h2 class="account__login--header__title mb-10">Đăng Ký Tài Khoản</h2>
                                        <p class="account__login--header__desc">Đăng ký tại đây nếu bạn là khách hàng mới !
                                        </p>
                                    </div>
                                    <div class="account__login--inner">
                                        <label>
                                            <label class="contact__form--label" for="input1"><b>Họ và Tên: </b> <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="account__login--input" placeholder="Nhập họ và tên"
                                                type="text">
                                        </label>
                                        <label>
                                            <label class="contact__form--label" for="input1"><b>Địa Chỉ: </b> <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="account__login--input" placeholder="Nhập địa chỉ" type="text">
                                        </label>
                                        <label>
                                            <label class="contact__form--label" for="input1"><b>Ngày Tháng Năm Sinh: </b>
                                                <span class="contact__form--label__star">*</span></label>
                                            <input class="account__login--input" placeholder="Nhập ngày sinh"
                                                type="date">
                                        </label>
                                        <label>
                                            <label class="contact__form--label" for="input1"><b>Số Điện Thoại: </b> <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="account__login--input" placeholder="Nhập số điện thoại"
                                                type="text">
                                        </label>
                                        <label>
                                            <label class="contact__form--label" for="input1"><b>Tên Đăng Nhập: </b> <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="account__login--input" placeholder="Nhập tên đăng nhập"
                                                type="text">
                                        </label>
                                        <label>
                                            <label class="contact__form--label" for="input1"><b>Email: </b> <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="account__login--input" placeholder="Nhập email" type="email">
                                        </label>
                                        <label>
                                            <label class="contact__form--label" for="input1"><b>Mật Khẩu: </b> <span
                                                    class="contact__form--label__star">*</span></label>
                                            <input class="account__login--input" placeholder="Nhập mật khẩu"
                                                type="password">
                                        </label>
                                        <label>
                                            <label class="contact__form--label" for="input1"><b>Nhập Lại Mật Khẩu: </b>
                                                <span class="contact__form--label__star">*</span></label>
                                            <input class="account__login--input" placeholder="Nhập lại mật khẩu"
                                                type="password">
                                        </label>
                                        <label>
                                            <b>Căn Cước Công Dân: </b>
                                            <input class="account__login--input" placeholder="Nhập căn cước công dân"
                                                type="text">
                                        </label>
                                        <label>
                                            <b>Bằng Lái Xe: </b>
                                            <input class="account__login--input" placeholder="Nhập tên bằng lái xe"
                                                type="text">
                                        </label>
                                        <div class="account__login--remember position__relative mb-4">
                                            <input class="checkout__checkbox--input" id="check2" type="checkbox">
                                            <span class="checkout__checkbox--checkmark"></span>
                                            <label class="checkout__checkbox--label login__remember--label"
                                                for="check2">
                                                Tôi đã đọc và đồng ý với các điều khoản &amp; điều kiện</label>
                                        </div>
                                        <button class="account__login--btn primary__btn mb-10" type="submit">
                                            Đăng Ký
                                        </button>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('js')
@endsection
