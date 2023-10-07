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
                                    <li class="breadcrumb__content--menu__items"><span>Wishlish</span></li>
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
                                <h2 class="checkout__order--summary__title text-center mb-15">Danh Sách Xe Yêu Thích</h2>
                                <div class="cart__table checkout__product--table">
                                    <table class="cart__table--inner">
                                        <tbody class="cart__table--body">
                                            <template v-for="(v,k) in listYeuThich">
                                                <tr class="cart__table--body__items">
                                                    <td>
                                                        <button v-on:click="xoa(v)" class="minicart__product--remove"
                                                            type="button">Remove
                                                        </button>
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
                                                        <p class="text-nowrap text-danger" style="font-size: 13px">Giá thuê
                                                            /
                                                            ngày:
                                                            @{{ numberFormat(v.gia_theo_ngay) }}</p>
                                                    </td>
                                                    <td>
                                                        <a :href="`/detail/${v.slug_xe}`" class="minicart__product--remove"
                                                            type="button">
                                                            Thuê Xe
                                                        </a>
                                                    </td>
                                                </tr>
                                            </template>
                                        </tbody>
                                    </table>
                                </div>
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
                        tien_coc: 0,
                        index: 0,
                        selectedItems: [],
                        selectAllChecked: false,
                        thanh_toan: {},
                        listYeuThich: [],
                    },
                    created() {
                        this.getWishlist();
                    },
                    methods: {
                        getWishlist() {
                            axios
                                .get('{{ Route('dataWishlist') }}')
                                .then((res) => {
                                    this.listYeuThich = res.data.data;
                                });
                        },
                        numberFormat(number) {
                            return new Intl.NumberFormat('vi-VI', {
                                style: 'currency',
                                currency: 'VND'
                            }).format(number);
                        },

                        xoa(value) {
                            axios
                                .post('{{ Route('delWishlist') }}', value)
                                .then((res) => {
                                    if (res.data.status == 1) {
                                        toastr.success(res.data.message, 'Thành Công');
                                        const indexToRemove = this.listYeuThich.findIndex(item => item
                                            .id === value
                                            .id);
                                        if (indexToRemove !== -1) {
                                            this.listYeuThich.splice(indexToRemove, 1);
                                        }
                                        yeu_thich_1 = this.listYeuThich.length;
                                        yeu_thich_2 = this.listYeuThich.length;
                                        $("#yeu_thich_1").html(yeu_thich_1);
                                        $("#yeu_thich_2").html(yeu_thich_2);
                                        // this.getWishlist();
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

                        isSelected(item) {
                            return this.selectedItems.includes(item);
                        },
                        selectAll() {
                            this.selectedItems = [...this.listYeuThich];
                            this.calculateTotalAndDeposit();

                        },
                        toggleSelection(item) {
                            const index = this.selectedItems.indexOf(item);
                            if (index === -1) {
                                this.selectedItems.push(item);
                            } else {
                                this.selectedItems.splice(index, 1);
                            }

                            if (this.selectedItems.length === this.listYeuThich.length) {
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
                            if (this.selectedItems.length === this.listYeuThich.length) {
                                this.selectedItems = [];
                            } else {
                                this.selectedItems = [...this.listYeuThich];
                            }
                            this.calculateTotalAndDeposit();
                        },
                        isAllSelected() {
                            return this.selectedItems.length === this.listYeuThich.length;
                        },
                    },
                });
            });
        </script>
    @endsection
