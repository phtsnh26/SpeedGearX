@extends('share.customer.masterPage')
@section('content')
    <style>
        .description__short {
            display: -webkit-box;
            -webkit-line-clamp: 2;
            /* Số dòng tối đa bạn muốn hiển thị */
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .yeuThich {
            background: var(--secondary-color);
            color: var(--text-white-color);
        }
    </style>
    <div id="app">
        <!-- Start slider section -->
        <section class="hero__slider--section">
            <div class="slider__thumbnail--style5 position-relative">
                <img class="slider__thumbnail--img__style5" src="https://www.topgear.com/sites/default/files/2021/12/ff2.jpg"
                    alt="slider-img" style="height: 400px">


            </div>

        </section>
        <!-- End slider section -->

        <!-- Start categories section -->
        <section class="categories__section section--padding">
            <div class="container">
                <div class="section__heading section__heading--flex border-bottom d-flex justify-content-between mb-30">
                    <h2 class="section__heading--maintitle"><span>Tất Cả Loại</span> Xe</h2>
                </div>
                <div class="product__section--inner">
                    <div class="tab-content" id="nav-tabContent">
                        <div id="recent" class="tab-pane fade show active" role="tabpanel">
                            <div class="product__wrapper">
                                <div class="row mb--n30">
                                    <div v-for="(v, k) in list_vehicles"
                                        class="col-lg-3 col-md-4 col-sm-6 col-6 custom-col mb-30 ">
                                        <article class="product__card" style="height: 372px;">
                                            <div class="product__card--thumbnail">
                                                <a class="product__card--thumbnail__link display-block"
                                                    :href="`/detail/${v.slug_xe}/${v.isWishlists === 1 ? 1 : 0}`">
                                                    <img style="width: 100%; height: 150px;"
                                                        class=" product__card--thumbnail__img product__primary--img"
                                                        :src="v.images[0]" alt="product-img">
                                                    <img style="width: 100%; height: 150px;"
                                                        class="product__card--thumbnail__img product__secondary--img"
                                                        :src="v.images[1]" alt="product-img">
                                                </a>
                                                <ul
                                                    class="product__card--action d-flex align-items-center justify-content-center">
                                                    <li class="product__card--action__list">
                                                        <a class="product__card--action__btn" title="Quick View"
                                                            :href="`/detail/${v.slug_xe}/${v.isWishlists === 1 ? 1 : 0}`">
                                                            <svg class="product__card--action__btn--svg" width="16"
                                                                height="16" viewBox="0 0 16 16" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M15.6952 14.4991L11.7663 10.5588C12.7765 9.4008 13.33 7.94381 13.33 6.42703C13.33 2.88322 10.34 0 6.66499 0C2.98997 0 0 2.88322 0 6.42703C0 9.97085 2.98997 12.8541 6.66499 12.8541C8.04464 12.8541 9.35938 12.4528 10.4834 11.6911L14.4422 15.6613C14.6076 15.827 14.8302 15.9184 15.0687 15.9184C15.2944 15.9184 15.5086 15.8354 15.6711 15.6845C16.0166 15.364 16.0276 14.8325 15.6952 14.4991ZM6.66499 1.67662C9.38141 1.67662 11.5913 3.8076 11.5913 6.42703C11.5913 9.04647 9.38141 11.1775 6.66499 11.1775C3.94857 11.1775 1.73869 9.04647 1.73869 6.42703C1.73869 3.8076 3.94857 1.67662 6.66499 1.67662Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Quick View</span>
                                                        </a>
                                                    </li>
                                                    <li v-if="v.isWishlists == 0 && user == 1"
                                                        class="product__card--action__list">
                                                        <a :id="`wishList1${v.id}`" class="product__card--action__btn"
                                                            :class="{ 'favorite': v.isFavorite }"
                                                            @mouseover="mouseoverWishlist(v)" @click="toggleWishlist(v)">
                                                            <svg class="product__card--action__btn--svg" width="18"
                                                                height="18" viewBox="0 0 16 13" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li v-else-if='v.isWishlists == 1 && user == 1'
                                                        class="product__card--action__list">
                                                        <a :id="'wishList2' + v.id"
                                                            class="product__card--action__btn yeuThich"
                                                            :class="{ 'favorite': v.isFavorite }"
                                                            @mouseover="mouseoverWishlist(v)" @click="toggleWishlist(v)">
                                                            <svg class="product__card--action__btn--svg" width="18"
                                                                height="18" viewBox="0 0 16 13" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li v-else class="product__card--action__list">
                                                        <a href="/login/client" class="product__card--action__btn ">
                                                            <svg class="product__card--action__btn--svg" width="18"
                                                                height="18" viewBox="0 0 16 13" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                    <li v-else class="product__card--action__list">
                                                        <a :id="'wishList1' + v.id" class="product__card--action__btn"
                                                            :class="{ 'favorite': v.isFavorite }"
                                                            @mouseover="mouseoverWishlist(v)" @click="toggleWishlist(v)">
                                                            <svg class="product__card--action__btn--svg" width="18"
                                                                height="18" viewBox="0 0 16 13" fill="none"
                                                                xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M13.5379 1.52734C11.9519 0.1875 9.51832 0.378906 8.01442 1.9375C6.48317 0.378906 4.04957 0.1875 2.46364 1.52734C0.412855 3.25 0.713636 6.06641 2.1902 7.57031L6.97536 12.4648C7.24879 12.7383 7.60426 12.9023 8.01442 12.9023C8.39723 12.9023 8.7527 12.7383 9.02614 12.4648L13.8386 7.57031C15.2879 6.06641 15.5886 3.25 13.5379 1.52734ZM12.8816 6.64062L8.09645 11.5352C8.04176 11.5898 7.98707 11.5898 7.90504 11.5352L3.11989 6.64062C2.10817 5.62891 1.91676 3.71484 3.31129 2.53906C4.3777 1.63672 6.01832 1.77344 7.05739 2.8125L8.01442 3.79688L8.97145 2.8125C9.98317 1.77344 11.6238 1.63672 12.6902 2.51172C14.0847 3.71484 13.8933 5.62891 12.8816 6.64062Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                            <span class="visually-hidden">Wishlist</span>
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="product__card--content">
                                                <h3 class="product__card--title">
                                                    <a :href="`/detail/${v.slug_xe}/${v.isWishlists === 1 ? 1 : 0}`">
                                                        @{{ v.ten_xe }}
                                                    </a>
                                                </h3>
                                                <div class="row">
                                                    <div class="col ">
                                                        <i class="fa-solid fa-user"></i>
                                                        @{{ v.so_cho_ngoi }} Chỗ

                                                    </div>

                                                </div>
                                                <div class="row" style="height: 60px;">
                                                    <p class="blog__card--desc description__short"> @{{ v.mo_ta_ngan }}
                                                    </p>
                                                </div>
                                                <div class="product__card--price">
                                                    <span class="current__price">Giá thuê/ngày:</span>
                                                    <span class="old__price">@{{ numberFormat(v.gia_theo_ngay) }}</span>
                                                </div>
                                                <div class="product__card--footer">
                                                    <a :href="`/detail/${v.slug_xe}/${v.isWishlists === 1 ? 1 : 0}`"
                                                        class="product__card--btn primary__btn" data-open="modal1">
                                                        <i class="fa-solid fa-dollar-sign"></i>
                                                        Thuê Xe
                                                    </a>
                                                </div>
                                            </div>
                                        </article>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End categories section -->
    </div>
@endsection

@section('js')
    <script>
        new Vue({
            el: '#app',
            data: {
                list_vehicles: [],
                list_images: [],
                user: {!! json_encode($user_login) !!}
            },
            created() {
                this.getData();
            },
            methods: {
                getData() {
                    axios.get('{{ Route('dataHomePage') }}')
                        .then((res) => {
                            this.list_brands = res.data.brand;
                            this.list_classification = res.data.classification;
                            this.list_vehicles = res.data.data;
                            this.list_images = res.data.images;
                            this.list_vehicles.forEach(a => {
                                a.images = [];
                                this.list_images.forEach(b => {
                                    if (a.id === b.id_xe) {
                                        a.images.push(b.hinh_anh_xe);
                                    }
                                });
                            });
                        });
                },
                numberFormat(number) {
                    return new Intl.NumberFormat('vi-VI', {
                        style: 'currency',
                        currency: 'VND'
                    }).format(number);
                },
                mouseoverWishlist(vehicle) {

                },
                toggleWishlist(vehicle) {
                    var payload = {
                        'id': vehicle.id,
                    };
                    axios.post('{{ Route('createWishlist') }}', payload)
                        .then((res) => {
                            // this.list_vehicles[index].isWishlists = !this.list_vehicles[index].isWishlists;
                            $("#yeu_thich_1").html(res.data.danhsachTim);
                            $("#yeu_thich_2").html(res.data.danhsachTim);
                            vehicle.isFavorite = res.data.trang_thai;
                            var id = '#wishList1' + vehicle.id;
                            var id1 = '#wishList2' + vehicle.id;
                            this.getData();
                            if (res.data.trang_thai == 1) {
                                $(id).toggleClass('yeuThich');
                                $(id1).toggleClass('yeuThich');
                                toastr.success(res.data.message);
                            } else if (res.data.trang_thai == 0) {
                                $(id).removeClass('yeuThich');
                                $(id1).removeClass('yeuThich');
                                toastr.info(res.data.message);
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
    </script>
@endsection
