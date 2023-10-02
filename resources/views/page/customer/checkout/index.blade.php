@extends('share.customer.masterPage')
@section('content')
    <div id="app">
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="/">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Checkout</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="checkout__page--area section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
                        <aside class="checkout__sidebar sidebar border-radius-10">
                            <h2 class="checkout__order--summary__title text-center mb-15">Chi Tiết Đơn Hàng</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                        <template v-for="(v,k) in list">
                                            <tr class="cart__table--body__items">
                                                <td class="cart__table--body__list">
                                                    <div class="product__image two  d-flex align-items-center">
                                                        <div class="product__thumbnail border-radius-5">
                                                            <a class="display-block" href="product-details.html">
                                                                <img class="display-block border-radius-5"
                                                                    v-bind:src="v.hinh_anh_xe" alt="cart-product">
                                                            </a>
                                                            <span class="product__thumbnail--quantity">
                                                                @{{ v.so_luong }}
                                                            </span>
                                                        </div>
                                                        <div class="product__description">
                                                            <h4 class="product__description--name">
                                                                <a :href="'/detail/' + v.slug_xe">
                                                                    @{{ v.ten_xe }}
                                                                </a>
                                                            </h4>
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span class="cart__price">@{{ numberFormat(v.gia_theo_ngay) }}</span>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <input :value='formatDate(v.ngay_dat)' type="datetime"
                                                        class="form-control">
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <input :value='formatDate(v.ngay_tra)' type="datetime"
                                                        class="form-control">
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span class="cart__price">@{{ numberFormat(v.tong_tien) }}</span>
                                                </td>
                                                <td><button v-on:click="destroy(v)" class="minicart__product--remove"
                                                        type="button">Remove</button></td>
                                            </tr>
                                        </template>
                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td
                                                class="checkout__total--footer__title checkout__total--footer__list text-left">
                                                <h2>Tổng Tiền</h2>
                                            </td>
                                            <td
                                                class="checkout__total--footer__amount checkout__total--footer__list text-right ">
                                                @{{ numberFormat(tong_tien) }}
                                            </td>
                                        </tr>
                                        <tr class="checkout__total--footer__items">
                                            <td
                                                class="checkout__total--footer__title checkout__total--footer__list text-left text-danger">
                                                <h2>Cọc 30%</h2>
                                            </td>
                                            <td
                                                class="checkout__total--footer__amount checkout__total--footer__list text-right ">
                                                @{{ numberFormat(tien_coc) }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class=" mb-30">
                                <h2>Phương thức thanh toán</h2>
                                <div class="d-flex align-middle">
                                    <div class="form-check me-5">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault1">
                                        <label class="form-check-label" for="flexRadioDefault1">
                                            Thanh toán khi nhận xe
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="flexRadioDefault"
                                            id="flexRadioDefault2" checked>
                                        <label class="form-check-label" for="flexRadioDefault2">
                                            Thanh toán online
                                        </label>
                                    </div>
                                </div>

                            </div>
                            <button v-on:click="datHang()" class="checkout__now--btn primary__btn" type="button">
                                Thanh Toán
                            </button>
                        </aside>
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
                    tong_tien: 0,
                    tien_coc: 0,
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataGioHang') }}')
                            .then((res) => {
                                this.list = res.data.data
                                this.list.forEach(i => {
                                    this.tong_tien += i.tong_tien;
                                });
                                this.tien_coc = 0.3 * this.tong_tien;
                            });
                    },
                    numberFormat(number) {
                        return new Intl.NumberFormat('vi-VI', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(number);
                    },
                    formatDate(datetime) {
                        // Assuming `datetime` is a string in the format "YYYY-MM-DDTHH:mm:ss"
                        const dateObject = new Date(datetime);
                        return dateObject.toLocaleDateString(
                            'vi-VN'); // 'vi-VN' is the locale for Vietnamese
                    },
                },
            });
        });
    </script>
@endsection
