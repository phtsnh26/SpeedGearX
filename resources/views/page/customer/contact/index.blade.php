@extends('share.customer.masterPage')
@section('content')
    <div id="app">
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="{{ Route('indexHome') }}">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Liên Hệ</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="contact__section section--padding">
            <div class="container">
                <div class="main__contact--area position__relative">
                    <div class="contact__form">
                        <h3 class="contact__form--title mb-30">
                            <font style="vertical-align: inherit;">
                                <font style="vertical-align: inherit;">Liên hệ với chúng tôi</font>
                            </font>
                        </h3>
                        <form class="contact__form--inner" action="#">
                            <div class="row">
                                <div class="col-lg-12 col-md-6">
                                    <div class="contact__form--list mb-20">
                                        <label class="contact__form--label" for="input1">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Họ và Tên</font>
                                            </font><span class="contact__form--label__star">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">*</font>
                                                </font>
                                            </span>
                                        </label>
                                        <input v-model="add.ho_va_ten" class="contact__form--input" name="firstname"
                                            id="input1" placeholder="Tên của bạn" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact__form--list mb-20">
                                        <label class="contact__form--label" for="input3">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Số điện thoại</font>
                                            </font><span class="contact__form--label__star">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">*</font>
                                                </font>
                                            </span>
                                        </label>
                                        <input v-model="add.so_dien_thoai" class="contact__form--input" name="number"
                                            id="input3" placeholder="Số điện thoại" type="text">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="contact__form--list mb-20">
                                        <label class="contact__form--label" for="input4">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">E-mail</font>
                                            </font><span class="contact__form--label__star">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">*</font>
                                                </font>
                                            </span>
                                        </label>
                                        <input v-model="add.email" class="contact__form--input" name="email"
                                            id="input4" placeholder="E-mail" type="text">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="contact__form--list mb-15">
                                        <label class="contact__form--label" for="input5">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Viết tin nhắn của bạn</font>
                                            </font><span class="contact__form--label__star">
                                                <font style="vertical-align: inherit;">
                                                    <font style="vertical-align: inherit;">*</font>
                                                </font>
                                            </span>
                                        </label>
                                        <textarea v-model="add.loi_nhan" class="contact__form--textarea" name="message" id="input5"
                                            placeholder="Viết tin nhắn của bạn"></textarea>
                                    </div>
                                </div>
                            </div>
                            <button class="contact__form--btn primary__btn" type="button" v-on:click='themMoi()'> <span>
                                    <font style="vertical-align: inherit;">
                                        <font style="vertical-align: inherit;">Xác Nhận</font>
                                    </font>
                                </span></button>
                        </form>
                    </div>
                    <div class="contact__info border-radius-5">
                        <div class="contact__info--items">
                            <h3 class="contact__info--content__title text-white mb-15">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Liên hệ chúng tôi</font>
                                </font>
                            </h3>
                            <div class="contact__info--items__inner d-flex">
                                <div class="contact__info--icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31.568" height="31.128"
                                        viewBox="0 0 31.568 31.128">
                                        <path id="ic_phone_forwarded_24px"
                                            d="M26.676,16.564l7.892-7.782L26.676,1V5.669H20.362v6.226h6.314Zm3.157,7a18.162,18.162,0,0,1-5.635-.887,1.627,1.627,0,0,0-1.61.374l-3.472,3.424a23.585,23.585,0,0,1-10.4-10.257l3.472-3.44a1.48,1.48,0,0,0,.395-1.556,17.457,17.457,0,0,1-.9-5.556A1.572,1.572,0,0,0,10.1,4.113H4.578A1.572,1.572,0,0,0,3,5.669,26.645,26.645,0,0,0,29.832,32.128a1.572,1.572,0,0,0,1.578-1.556V25.124A1.572,1.572,0,0,0,29.832,23.568Z"
                                            transform="translate(-3 -1)" fill="currentColor"></path>
                                    </svg>
                                </div>
                                <div class="contact__info--content">
                                    <p class="contact__info--content__desc text-white">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Liên Hệ Trực Tiếp</font>
                                        </font>
                                        <br>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">@{{ list.so_dien_thoai }}</font>
                                        </font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="contact__info--items">
                            <h3 class="contact__info--content__title text-white mb-15">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Địa chỉ email</font>
                                </font>
                            </h3>
                            <div class="contact__info--items__inner d-flex">
                                <div class="contact__info--icon">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="31.57" height="31.13"
                                        viewBox="0 0 31.57 31.13">
                                        <path id="ic_email_24px"
                                            d="M30.413,4H5.157C3.421,4,2.016,5.751,2.016,7.891L2,31.239c0,2.14,1.421,3.891,3.157,3.891H30.413c1.736,0,3.157-1.751,3.157-3.891V7.891C33.57,5.751,32.149,4,30.413,4Zm0,7.783L17.785,21.511,5.157,11.783V7.891l12.628,9.728L30.413,7.891Z"
                                            transform="translate(-2 -4)" fill="currentColor"></path>
                                    </svg>
                                </div>
                                <div class="contact__info--content">
                                    <p class="contact__info--content__desc text-white">
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">Liên Hệ Qua Email</font>
                                        </font>
                                        <br>
                                        <font style="vertical-align: inherit;">
                                            <font style="vertical-align: inherit;">@{{ list.email }}</font>
                                        </font>
                                    </p>
                                </div>
                            </div>
                        </div>
                        <div class="contact__info--items">
                            <h3 class="contact__info--content__title text-white mb-15">
                                <font style="vertical-align: inherit;">
                                    <font style="vertical-align: inherit;">Theo dõi chúng tôi</font>
                                </font>
                            </h3>
                            <ul class="contact__info--social d-flex">
                                <li class="contact__info--social__list">
                                    <a class="contact__info--social__icon" target="_blank"
                                        href="https://www.facebook.com">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="7.667" height="16.524"
                                            viewBox="0 0 7.667 16.524">
                                            <path data-name="Path 237"
                                                d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                transform="translate(-960.13 -345.407)" fill="currentColor"></path>
                                        </svg>
                                        <span class="visually-hidden">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Facebook</font>
                                            </font>
                                        </span>
                                    </a>
                                </li>
                                <li class="contact__info--social__list">
                                    <a class="contact__info--social__icon" target="_blank"
                                        href="https://www.instagram.com">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16.497" height="16.492"
                                            viewBox="0 0 19.497 19.492">
                                            <path data-name="Icon awesome-instagram"
                                                d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z"
                                                transform="translate(0.004 -1.492)" fill="currentColor"></path>
                                        </svg>
                                        <span class="visually-hidden">
                                            <font style="vertical-align: inherit;">
                                                <font style="vertical-align: inherit;">Instagram</font>
                                            </font>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    list: {},
                    add: {},
                },
                created() {
                    this.getData();
                    // setInterval(this.getData, 5000)
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataContact') }}')
                            .then((res) => {
                                this.list = res.data.data
                                console.log(this.list);
                            });
                    },
                    themMoi() {
                        axios
                            .post('{{ Route('createContact') }}', this.add)
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
