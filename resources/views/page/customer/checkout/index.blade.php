@extends('share.customer.masterPage')
@section('content')
    <style>
        .form-check-input:checked {
            background-color: rgb(237, 29, 36);
            border-color: rgb(237, 29, 36);
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
                                <li class="breadcrumb__content--menu__items"><span>My Car</span></li>
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
                                                    <div class="form-check">
                                                        <input @change="toggleSelection(v)" style="cursor: pointer;"
                                                            class="form-check-input" type="checkbox"
                                                            :checked="isSelected(v)">
                                                    </div>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <div class="product__image two  d-flex align-items-center">
                                                        <div class="product__thumbnail border-radius-5">
                                                            <a class="display-block" :href="'/detail/' + v.slug_xe">
                                                                <img class="display-block border-radius-5"
                                                                    v-bind:src="v.hinh_anh_xe" alt="cart-product">
                                                            </a>
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
                                                    <p class="text-nowrap text-danger" style="font-size: 13px">Giá thuê /
                                                        ngày:
                                                        @{{ numberFormat(v.gia_theo_ngay) }}</p>
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <input :value='formatDate(v.ngay_dat)' type="datetime"
                                                        class="form-control" style="font-size: 13px">
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <input :value='formatDate(v.ngay_tra)' type="datetime"
                                                        class="form-control" style="font-size: 13px">
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <input @blur="update(v);index=k" v-model="v.so_luong" type="number"
                                                        class="form-control" style="font-size: 13px">
                                                </td>
                                                <td class="cart__table--body__list">
                                                    <span class="cart__price">@{{ numberFormat(v.tong_tien) }}</span>
                                                </td>
                                                <td>
                                                    <button v-on:click="xoa(v)" class="minicart__product--remove"
                                                        type="button">Remove
                                                    </button>
                                                </td>
                                            </tr>

                                        </template>
                                        <tr class="cart__table--body__items">
                                            <td class="cart__table--body__list text-nowrap">
                                                <div class="form-check" style="cursor: pointer;">
                                                    <input @click="toggleSelectAll" :checked="selectAllChecked"
                                                        style="cursor: pointer;" id="helo" class="form-check-input"
                                                        type="checkbox">
                                                    <label style="cursor: pointer;"for="helo"> Chọn tất cả</label>
                                                </div>
                                            </td>
                                            <td class="cart__table--body__list text-nowrap"></td>
                                            <td class="cart__table--body__list text-nowrap"></td>
                                            <td class="cart__table--body__list text-nowrap"></td>
                                            <td class="cart__table--body__list text-nowrap"></td>
                                            <td class="cart__table--body__list text-nowrap"></td>
                                            <td class="cart__table--body__list text-nowrap"></td>
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
                                                <h3>Tổng Tiền:</h3>
                                            </td>
                                            <td
                                                class="checkout__total--footer__amount checkout__total--footer__list text-right ">
                                                <span id="tongTienCheckout"></span>
                                            </td>
                                        </tr>
                                        <tr class="checkout__total--footer__items">
                                            <td
                                                class="checkout__total--footer__title checkout__total--footer__list text-left ">
                                                <h2>Cọc trước 30%:</h2>
                                            </td>
                                            <td
                                                class="checkout__total--footer__amount checkout__total--footer__list text-right text-danger">
                                                <span id="tienCocCheckout"></span>
                                            </td>
                                        </tr>
                                    </tfoot>
                                </table>
                            </div>
                            <div class="mt-3 mb-30">
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
                    index: 0,
                    selectedItems: [],
                    selectAllChecked: false,
                },
                created() {
                    this.getData();
                    this.loadMyCar();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataGioHang') }}')
                            .then((res) => {
                                this.list = res.data.data;
                                this.tong_tien = res.data.tongTien;
                                this.tien_coc = res.data.tongTien * 0.3;
                                $('#tongTienCheckout').html(this.numberFormat(0));
                                $('#tienCocCheckout').html(this.numberFormat(0));
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
                    loadMyCar() {
                        axios
                            .get('{{ Route('dataGioHang') }}')
                            .then((res) => {
                                mycar1 = res.data.length;
                                mycar2 = res.data.length;
                                $("#mycar1").html(mycar1);
                                $("#mycar2").html(mycar2);
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    xoa(value) {
                        axios
                            .post('{{ Route('delGioHang') }}', value)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    const indexToRemove = this.list.findIndex(item => item.id === value
                                        .id);
                                    if (indexToRemove !== -1) {
                                        this.list.splice(indexToRemove, 1);
                                    }
                                    mycar1 = this.list.length;
                                    mycar2 = this.list.length;
                                    $("#mycar1").html(mycar1);
                                    $("#mycar2").html(mycar2);
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

                    update(v) {
                        v.so_luong = parseInt(v.so_luong);
                        var payLoad = {
                            ...v,
                            hi: this.selectedItems
                        };
                        axios
                            .post('{{ Route('updateGioHang') }}', payLoad)
                            .then((res) => {
                                if (res.data.status == 1) {
                                    this.list[this.index].tong_tien = res.data.tongTien;
                                    $('#tongTienCheckout').html(this.numberFormat(res.data.test));
                                    $('#tienCocCheckout').html(this.numberFormat(res.data.test * 0.3));
                                } else if (res.data.status == -1) {
                                    toastr.error(res.data.message, 'Lỗi');
                                    this.list[this.index].tong_tien = res.data.tongTien;
                                    this.list[this.index].so_luong = res.data.soLuong;
                                    $('#tongTienCheckout').html(this.numberFormat(res.data.test));
                                    $('#tienCocCheckout').html(this.numberFormat(res.data.test * 0.3));
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
                    isSelected(item) {
                        return this.selectedItems.includes(item);
                    },
                    selectAll() {
                        this.selectedItems = [...this.list];
                        this.calculateTotalAndDeposit();
                    },
                    toggleSelection(item) {
                        const index = this.selectedItems.indexOf(item);
                        if (index === -1) {
                            this.selectedItems.push(item);
                        } else {
                            this.selectedItems.splice(index, 1);
                        }

                        if (this.selectedItems.length === this.list.length) {
                            this.selectAllChecked = true;
                        } else {
                            this.selectAllChecked = false;
                        }
                        this.calculateTotalAndDeposit();
                    },
                    calculateTotalAndDeposit() {
                        let total = 0;
                        this.selectedItems.forEach(item => {
                            total += item.tong_tien;
                        });

                        this.tong_tien = total;
                        this.tien_coc = total * 0.3;

                        $('#tongTienCheckout').html(this.numberFormat(this.tong_tien));
                        $('#tienCocCheckout').html(this.numberFormat(this.tien_coc));
                    },
                    toggleSelectAll() {
                        this.selectAllChecked = !this.selectAllChecked;
                        if (this.selectedItems.length === this.list.length) {
                            this.selectedItems = [];
                        } else {
                            this.selectedItems = [...this.list];
                        }
                        this.calculateTotalAndDeposit();
                    },
                    isAllSelected() {
                        return this.selectedItems.length === this.list.length;
                    },

                },
            });
        });
    </script>
@endsection
