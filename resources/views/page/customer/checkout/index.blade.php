@extends('share.customer.masterPage')
@section('content')
    <style>
        .form-check-input:checked {
            background-color: red;
            border-color: red;
        }
    </style>
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
                            <h2 class="checkout__order--summary__title text-center mb-15">Thanh Toán</h2>
                            <div class="cart__table checkout__product--table">
                                <table class="cart__table--inner">
                                    <tbody class="cart__table--body">
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list">
                                                <div class="product__image two  d-flex align-items-center">
                                                    <div class="product__thumbnail border-radius-5">
                                                        <a class="display-block" :href="'/detail/' + info_xe.slug_xe"><img
                                                                class="display-block border-radius-5" alt="cart-product"
                                                                :src="info_xe.hinh_anh_xe"></a>
                                                        <span
                                                            class="product__thumbnail--quantity">@{{ data.get('so_luong') }}</span>
                                                    </div>
                                                    <div class="product__description">
                                                        <h4 class="product__description--name">
                                                            <a :href="'/detail/' + info_xe.slug_xe">
                                                                @{{ info_xe.ten_xe }}
                                                            </a>
                                                        </h4>
                                                    </div>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">@{{ formatDate(data.get('ngay_dat')) }}</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">@{{ formatDate(data.get('ngay_tra')) }}</span>
                                            </td>
                                            <td class="cart__table--body__list">
                                                <span class="cart__price">
                                                    @{{ numberFormat(data.get('tong_tien')) }}
                                                </span>
                                        </tr>

                                    </tbody>
                                </table>
                            </div>
                            <div class="checkout__total">
                                <table class="checkout__total--table">
                                    <tfoot class="checkout__total--footer">
                                        <tr class="checkout__total--footer__items">
                                            <td
                                                class="checkout__total--footer__title checkout__total--footer__list text-left">
                                                <h3 class="payment__history--title mb-20" style="color: rgb(237,29,36);">Cọc
                                                    30%</h3>
                                            </td>
                                            <td
                                                class="checkout__total--footer__amount checkout__total--footer__list text-right">
                                                @{{ numberFormat(data.get('tong_tien') * 0.3) }}
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="payment__history mb-30">
                                <div class="row">
                                    <div class="col">
                                        <h3 class="payment__history--title mb-20">Phương Thức Thanh Toán</h3>
                                        <ul class="payment__history--inner d-flex">
                                            <div class="form-check form-check-inline">
                                                <input v-model="selectedPaymentMethod" class="form-check-input"
                                                    type="radio" name="inlineRadioOptions" id="inlineRadio1"
                                                    value="1" @click='thanhToan(1)' checked>
                                                <label class="form-check-label" for="inlineRadio1">
                                                    Thanh toán khi nhận xe
                                                </label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input v-model="selectedPaymentMethod" class="form-check-input"
                                                    type="radio" name="inlineRadioOptions" id="inlineRadio2"
                                                    value="2" @click='thanhToan(2)'>
                                                <label class="form-check-label" for="inlineRadio2">Thanh toán Online</label>
                                            </div>
                                        </ul>
                                    </div>
                                    <div class="col" style="font-size: 15px">
                                        Ghi chú:
                                        <textarea v-model='add.ghi_chu' cols="20" rows="3" class='form-control' style="font-size: 15px"></textarea>
                                    </div>
                                </div>

                            </div>
                            <button v-if="selectedPaymentMethod === 1" id='btnThueXe' @click='thueXe()'
                                class="mb-3 checkout__now--btn primary__btn" type="button">
                                THUÊ XE
                            </button>
                            <button v-else name='payUrl' class="checkout__now--btn primary__btn" @click='thueXe()'>
                                THUÊ XE
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
                    data: {},
                    info_xe: {},
                    add: {
                        'phuong_thuc_thanh_toan': 1,
                    },
                    selectedPaymentMethod: 1,
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        var url = new URL(window.location.href);
                        this.data = new URLSearchParams(url.search);
                        axios
                            .post('{{ route('dataCheckout') }}', this.data)
                            .then((res) => {
                                this.info_xe = res.data.xe;
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
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
                    thanhToan(v) {
                        this.add.phuong_thuc_thanh_toan = v;
                    },
                    thueXe() {
                        this.add.ngay_dat = this.data.get('ngay_dat')
                        this.add.ngay_tra = this.data.get('ngay_tra')
                        this.add.tong_tien = this.data.get('tong_tien')
                        this.add.id = this.data.get('id')
                        this.add.so_luong = this.data.get('so_luong')
                        this.add.ghi_chu = this.add.ghi_chu
                        this.add.hinh_anh = this.info_xe.hinh_anh_xe
                        this.add.ten_xe = this.info_xe.ten_xe
                        $('#btnThueXe').prop('disabled', true);
                        axios
                            .post('{{ Route('createBooking') }}', this.add)
                            .then((res) => {
                                if (res.data.status == 1) {
                                    toastr.success(res.data.message, 'Thành công')
                                    setTimeout(() => {
                                        window.location.href = '/';
                                    }, 1000);
                                } else if (res.data.status == 2) {
                                    setTimeout(() => {
                                        window.location.href = res.data.linkUrl;
                                    }, 1000);
                                } else {
                                    $('#btnThueXe').prop('disabled', false);
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                console.log(res);
                            });
                    }
                },
            });
        })
    </script>
@endsection
