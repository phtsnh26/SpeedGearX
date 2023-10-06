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
                                                    :href="`/detail/${v.slug_xe}`">
                                                    <img style="width: 100%; height: 150px;"
                                                        class=" product__card--thumbnail__img product__primary--img"
                                                        :src="v.images[0]" alt="product-img">
                                                    <img style="width: 100%; height: 150px;"
                                                        class="product__card--thumbnail__img product__secondary--img"
                                                        :src="v.images[1]" alt="product-img">
                                                </a>
                                                <span class="product__badge">-14%</span>
                                            </div>
                                            <div class="product__card--content">
                                                <ul class="rating product__card--rating d-flex">
                                                    <li v-for='i in list_vehicles[k].tbc_sao' class="rating__list">
                                                        <span class="rating__icon">
                                                            <svg width="14" height="13" viewBox="0 0 14 13"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li v-for='i in 5 - list_vehicles[k].tbc_sao' class="rating__list">
                                                        <span class="rating__icon">
                                                            <svg width="14" height="13" viewBox="0 0 14 13"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li>
                                                        <span class="rating__review--text">(@{{ v.so_luot_danh_gia }})
                                                            Review</span>
                                                    </li>
                                                </ul>
                                                <h3 class="product__card--title">
                                                    <a :href="`/detail/${v.slug_xe}`">
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
                                                    <a :href="`/detail/${v.slug_xe}`"
                                                        class="product__card--btn primary__btn" data-open="modal1">
                                                        Chi Tiết Xe
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


    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    list_vehicles: [],
                    list_images: [],
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataHomePage') }}')
                            .then((res) => {
                                console.log(res.data);
                                this.list_brands = res.data.brand;
                                this.list_classification = res.data.classification;
                                this.list_vehicles = res.data.data;
                                this.list_images = res.data.images;
                                this.list_vehicles.forEach(a => {
                                    a.images = []; // Khởi tạo mảng images cho mỗi đối tượng a
                                    this.list_images.forEach(b => {
                                        if (a.id === b.id_xe) {
                                            a.images.push(b
                                                .hinh_anh_xe
                                            ); // Thêm hình ảnh vào mảng images của đối tượng a
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
                },
            });
        })
    </script>
@endsection
