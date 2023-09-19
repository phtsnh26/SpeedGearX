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
                    alt="slider-img">

                <!-- Start search filter area -->
                <div class="search__filter--section search__filter--style5">
                    <div class="container">
                        <div class="search__filter--inner style5">
                            <div class="row" style="height: 50px">
                                <div class="col-4 " style="height: 50px; ">
                                    <select class="form-select h-100" style="font-size: 15px">
                                        <option value="">Thương Hiệu</option>
                                        <option v-for='(v, k) in list_brands' :value="v.id">@{{ v.ten_thuong_hieu }}
                                        </option>
                                    </select>
                                </div>
                                <div class="col-3" style="height: 50px; ">
                                    <select class="form-select h-100" style="font-size: 15px">
                                        <option value="">Loại Xe</option>
                                        <option v-for='(v, k) in list_classification' :value="v.id">
                                            @{{ v.so_cho_ngoi }} chỗ</option>
                                    </select>
                                </div>
                                <div class="col-3 " style="height: 50px; ">
                                    <select class="form-select h-100" style="font-size: 15px">
                                        <option value="">Năm</option>
                                        <option value="">2023</option>
                                        <option value="">2022</option>
                                        <option value="">2021</option>
                                        <option value="">2019</option>
                                        <option value="">2018</option>
                                    </select>
                                </div>
                                <div class="col-2 " style="height: 50px; ">
                                    <button class="btn btn-danger w-100 h-100" style="font-size: 15px">
                                        <b>Tìm Kiếm</b>
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- End search filter area -->
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
                                                    <span class="current__price">chưa cập nhật</span>
                                                    <span class="old__price">@{{ numberFormat(v.gia_theo_ngay) }}</span>
                                                </div>
                                                <div class="product__card--footer">
                                                    <a class="product__card--btn primary__btn"
                                                        :href="`/detail/${v.slug_xe}`" data-open="modal1">
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
        <div class="modal" id="modal1" data-animation="slideInUp">
            <div class="modal-dialog quickview__main--wrapper">
                <header class="modal-header quickview__header">
                    <button class="close-modal quickview__close--btn" aria-label="close modal" data-close="">✕ </button>
                </header>
                <div class="quickview__inner">
                    <div class="row row-cols-lg-2 row-cols-md-2">
                        <div class="col">
                            <div class="quickview__gallery">
                                <div
                                    class="product__media--preview swiper swiper-initialized swiper-horizontal swiper-pointer-events">
                                    <div class="swiper-wrapper" id="swiper-wrapper-2261e67134e94c02" aria-live="polite"
                                        style="transform: translate3d(-402px, 0px, 0px); transition-duration: 0ms;">
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev"
                                            data-swiper-slide-index="3" role="group" aria-label="4 / 4"
                                            style="width: 392px; margin-right: 10px;">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox"
                                                    data-gallery="product-media-preview"
                                                    href="/partsix/assets/img/product/big-product/product4.webp"><img
                                                        class="product__media--preview__items--img"
                                                        src="/partsix/assets/img/product/big-product/product4.webp"
                                                        alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox"
                                                        href="/partsix/assets/img/product/big-product/product4.webp"
                                                        data-gallery="product-media-preview">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="22.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-miterlimit="10" stroke-width="32"></path>
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-miterlimit="10"
                                                                stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                        </svg>
                                                        <span class="visually-hidden">product view</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0"
                                            role="group" aria-label="1 / 4" style="width: 392px; margin-right: 10px;">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox"
                                                    data-gallery="product-media-preview"
                                                    href="/partsix/assets/img/product/big-product/product1.webp"><img
                                                        class="product__media--preview__items--img"
                                                        src="/partsix/assets/img/product/big-product/product1.webp"
                                                        alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox"
                                                        href="/partsix/assets/img/product/big-product/product1.webp"
                                                        data-gallery="product-media-preview">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="22.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-miterlimit="10" stroke-width="32"></path>
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-miterlimit="10"
                                                                stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                        </svg>
                                                        <span class="visually-hidden">product view</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1"
                                            role="group" aria-label="2 / 4" style="width: 392px; margin-right: 10px;">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox"
                                                    data-gallery="product-media-preview"
                                                    href="/partsix/assets/img/product/big-product/product2.webp"><img
                                                        class="product__media--preview__items--img"
                                                        src="/partsix/assets/img/product/big-product/product2.webp"
                                                        alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox"
                                                        href="/partsix/assets/img/product/big-product/product2.webp"
                                                        data-gallery="product-media-preview">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="22.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-miterlimit="10" stroke-width="32"></path>
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-miterlimit="10"
                                                                stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                        </svg>
                                                        <span class="visually-hidden">product view</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide" data-swiper-slide-index="2" role="group"
                                            aria-label="3 / 4" style="width: 392px; margin-right: 10px;">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox"
                                                    data-gallery="product-media-preview"
                                                    href="/partsix/assets/img/product/big-product/product3.webp"><img
                                                        class="product__media--preview__items--img"
                                                        src="/partsix/assets/img/product/big-product/product3.webp"
                                                        alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox"
                                                        href="/partsix/assets/img/product/big-product/product3.webp"
                                                        data-gallery="product-media-preview">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="22.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-miterlimit="10" stroke-width="32"></path>
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-miterlimit="10"
                                                                stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                        </svg>
                                                        <span class="visually-hidden">product view</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="3"
                                            role="group" aria-label="4 / 4" style="width: 392px; margin-right: 10px;">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox"
                                                    data-gallery="product-media-preview"
                                                    href="/partsix/assets/img/product/big-product/product4.webp"><img
                                                        class="product__media--preview__items--img"
                                                        src="/partsix/assets/img/product/big-product/product4.webp"
                                                        alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox"
                                                        href="/partsix/assets/img/product/big-product/product4.webp"
                                                        data-gallery="product-media-preview">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="22.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-miterlimit="10" stroke-width="32"></path>
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-miterlimit="10"
                                                                stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                        </svg>
                                                        <span class="visually-hidden">product view</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                            data-swiper-slide-index="0" role="group" aria-label="1 / 4"
                                            style="width: 392px; margin-right: 10px;">
                                            <div class="product__media--preview__items">
                                                <a class="product__media--preview__items--link glightbox"
                                                    data-gallery="product-media-preview"
                                                    href="/partsix/assets/img/product/big-product/product1.webp"><img
                                                        class="product__media--preview__items--img"
                                                        src="/partsix/assets/img/product/big-product/product1.webp"
                                                        alt="product-media-img"></a>
                                                <div class="product__media--view__icon">
                                                    <a class="product__media--view__icon--link glightbox"
                                                        href="/partsix/assets/img/product/big-product/product1.webp"
                                                        data-gallery="product-media-preview">
                                                        <svg class="product__items--action__btn--svg"
                                                            xmlns="http://www.w3.org/2000/svg" width="22.51"
                                                            height="22.443" viewBox="0 0 512 512">
                                                            <path
                                                                d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                                fill="none" stroke="currentColor"
                                                                stroke-miterlimit="10" stroke-width="32"></path>
                                                            <path fill="none" stroke="currentColor"
                                                                stroke-linecap="round" stroke-miterlimit="10"
                                                                stroke-width="32" d="M338.29 338.29L448 448"></path>
                                                        </svg>
                                                        <span class="visually-hidden">product view</span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                                <div
                                    class="product__media--nav swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-thumbs">
                                    <div class="swiper-wrapper" id="swiper-wrapper-9e1065ac868141ab6" aria-live="polite"
                                        style="transform: translate3d(-402px, 0px, 0px); transition-duration: 0ms;">
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                            data-swiper-slide-index="1" role="group" aria-label="2 / 5"
                                            style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product2.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2"
                                            role="group" aria-label="3 / 5" style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product3.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3"
                                            role="group" aria-label="4 / 5" style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product3.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev"
                                            data-swiper-slide-index="4" role="group" aria-label="5 / 5"
                                            style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product4.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-active swiper-slide-thumb-active"
                                            data-swiper-slide-index="0" role="group" aria-label="1 / 5"
                                            style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product1.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible swiper-slide-next"
                                            data-swiper-slide-index="1" role="group" aria-label="2 / 5"
                                            style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product2.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible" data-swiper-slide-index="2"
                                            role="group" aria-label="3 / 5" style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product3.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-visible" data-swiper-slide-index="3"
                                            role="group" aria-label="4 / 5" style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product3.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="4"
                                            role="group" aria-label="5 / 5" style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product4.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active swiper-slide-thumb-active"
                                            data-swiper-slide-index="0" role="group" aria-label="1 / 5"
                                            style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product1.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-next"
                                            data-swiper-slide-index="1" role="group" aria-label="2 / 5"
                                            style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product2.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="2"
                                            role="group" aria-label="3 / 5" style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product3.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                        <div class="swiper-slide swiper-slide-duplicate" data-swiper-slide-index="3"
                                            role="group" aria-label="4 / 5" style="width: 90.5px; margin-right: 10px;">
                                            <div class="product__media--nav__items">
                                                <img class="product__media--nav__items--img"
                                                    src="/partsix/assets/img/product/small-product/product3.webp"
                                                    alt="product-nav-img">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper__nav--btn swiper-button-next" tabindex="0" role="button"
                                        aria-label="Next slide" aria-controls="swiper-wrapper-9e1065ac868141ab6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right">
                                            <polyline points="9 18 15 12 9 6"></polyline>
                                        </svg>
                                    </div>
                                    <div class="swiper__nav--btn swiper-button-prev" tabindex="0" role="button"
                                        aria-label="Previous slide" aria-controls="swiper-wrapper-9e1065ac868141ab6">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round" class=" -chevron-left">
                                            <polyline points="15 18 9 12 15 6"></polyline>
                                        </svg>
                                    </div>
                                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="quickview__info">
                                <form action="#">
                                    <h2 class="product__details--info__title mb-10">Điều Khoản Hợp Đồng</h2>
                                    <div class="product__card--price mb-10">
                                        <span class="current__price">$239.52</span>
                                        <span class="old__price"> $362.00</span>
                                    </div>
                                    <ul class="rating product__card--rating d-flex">
                                        <li class="rating__list">
                                            <span class="rating__icon">
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__icon">
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__icon">
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__icon">
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li class="rating__list">
                                            <span class="rating__icon">
                                                <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z"
                                                        fill="currentColor"></path>
                                                </svg>
                                            </span>
                                        </li>
                                        <li>
                                            <span class="rating__review--text">(106) Review</span>
                                        </li>
                                    </ul>
                                    <p class="product__details--info__desc mb-10">Lorem ipsum dolor sit amet, consectetur
                                        adipisicing elit is. Deserunt totam dolores ea numquam labore!.</p>
                                    <div class="product__variant">

                                        <div class="product__variant--list mb-15">
                                            <fieldset class="variant__input--fieldset">
                                                <legend class="product__variant--title mb-8">Weight :</legend>
                                                <ul class="variant__size d-flex">
                                                    <li class="variant__size--list">
                                                        <input id="weight1" name="weight" type="radio"
                                                            checked="">
                                                        <label class="variant__size--value red" for="weight1">5
                                                            kg</label>
                                                    </li>
                                                    <li class="variant__size--list">
                                                        <input id="weight2" name="weight" type="radio">
                                                        <label class="variant__size--value red" for="weight2">3
                                                            kg</label>
                                                    </li>
                                                    <li class="variant__size--list">
                                                        <input id="weight3" name="weight" type="radio">
                                                        <label class="variant__size--value red" for="weight3">2
                                                            kg</label>
                                                    </li>
                                                </ul>
                                            </fieldset>
                                        </div>
                                        <div class="quickview__variant--list quantity d-flex align-items-center mb-10">
                                            <div class="quantity__box">
                                                <button type="button"
                                                    class="quantity__value quickview__value--quantity decrease"
                                                    aria-label="quantity value" value="Decrease Value">-</button>
                                                <label>
                                                    <input type="number"
                                                        class="quantity__number quickview__value--number" value="1"
                                                        data-counter="">
                                                </label>
                                                <button type="button"
                                                    class="quantity__value quickview__value--quantity increase"
                                                    aria-label="quantity value" value="Increase Value">+</button>
                                            </div>
                                            <button class="primary__btn quickview__cart--btn" type="submit">Add To
                                                Cart</button>
                                        </div>
                                        <div class="quickview__variant--list variant__wishlist mb-10">
                                            <a class="variant__wishlist--icon" href="wishlist.html"
                                                title="Add to wishlist">
                                                <svg class="quickview__variant--wishlist__svg"
                                                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                                                    <path
                                                        d="M352.92 80C288 80 256 144 256 144s-32-64-96.92-64c-52.76 0-94.54 44.14-95.08 96.81-1.1 109.33 86.73 187.08 183 252.42a16 16 0 0018 0c96.26-65.34 184.09-143.09 183-252.42-.54-52.67-42.32-96.81-95.08-96.81z"
                                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="32"></path>
                                                </svg>
                                                Add to Wishlist
                                            </a>
                                        </div>
                                    </div>
                                    <div class="quickview__social d-flex align-items-center">
                                        <label class="quickview__social--title">Social Share:</label>
                                        <ul class="quickview__social--wrapper mt-0 d-flex">
                                            <li class="quickview__social--list">
                                                <a class="quickview__social--icon" target="_blank"
                                                    href="https://www.facebook.com">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="7.667"
                                                        height="16.524" viewBox="0 0 7.667 16.524">
                                                        <path data-name="Path 237"
                                                            d="M967.495,353.678h-2.3v8.253h-3.437v-8.253H960.13V350.77h1.624v-1.888a4.087,4.087,0,0,1,.264-1.492,2.9,2.9,0,0,1,1.039-1.379,3.626,3.626,0,0,1,2.153-.6l2.549.019v2.833h-1.851a.732.732,0,0,0-.472.151.8.8,0,0,0-.246.642v1.719H967.8Z"
                                                            transform="translate(-960.13 -345.407)" fill="currentColor">
                                                        </path>
                                                    </svg>
                                                    <span class="visually-hidden">Facebook</span>
                                                </a>
                                            </li>
                                            <li class="quickview__social--list">
                                                <a class="quickview__social--icon" target="_blank"
                                                    href="https://twitter.com">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.489"
                                                        height="13.384" viewBox="0 0 16.489 13.384">
                                                        <path data-name="Path 303"
                                                            d="M966.025,1144.2v.433a9.783,9.783,0,0,1-.621,3.388,10.1,10.1,0,0,1-1.845,3.087,9.153,9.153,0,0,1-3.012,2.259,9.825,9.825,0,0,1-4.122.866,9.632,9.632,0,0,1-2.748-.4,9.346,9.346,0,0,1-2.447-1.11q.4.038.809.038a6.723,6.723,0,0,0,2.24-.376,7.022,7.022,0,0,0,1.958-1.054,3.379,3.379,0,0,1-1.958-.687,3.259,3.259,0,0,1-1.186-1.666,3.364,3.364,0,0,0,.621.056,3.488,3.488,0,0,0,.885-.113,3.267,3.267,0,0,1-1.374-.631,3.356,3.356,0,0,1-.969-1.186,3.524,3.524,0,0,1-.367-1.5v-.057a3.172,3.172,0,0,0,1.544.433,3.407,3.407,0,0,1-1.1-1.214,3.308,3.308,0,0,1-.4-1.609,3.362,3.362,0,0,1,.452-1.694,9.652,9.652,0,0,0,6.964,3.538,3.911,3.911,0,0,1-.075-.772,3.293,3.293,0,0,1,.452-1.694,3.409,3.409,0,0,1,1.233-1.233,3.257,3.257,0,0,1,1.685-.461,3.351,3.351,0,0,1,2.466,1.073,6.572,6.572,0,0,0,2.146-.828,3.272,3.272,0,0,1-.574,1.083,3.477,3.477,0,0,1-.913.8,6.869,6.869,0,0,0,1.958-.546A7.074,7.074,0,0,1,966.025,1144.2Z"
                                                            transform="translate(-951.23 -1140.849)" fill="currentColor">
                                                        </path>
                                                    </svg>
                                                    <span class="visually-hidden">Twitter</span>
                                                </a>
                                            </li>
                                            <li class="quickview__social--list">
                                                <a class="quickview__social--icon" target="_blank"
                                                    href="https://www.instagram.com">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="17.497"
                                                        height="17.492" viewBox="0 0 19.497 19.492">
                                                        <path data-name="Icon awesome-instagram"
                                                            d="M9.747,6.24a5,5,0,1,0,5,5A4.99,4.99,0,0,0,9.747,6.24Zm0,8.247A3.249,3.249,0,1,1,13,11.238a3.255,3.255,0,0,1-3.249,3.249Zm6.368-8.451A1.166,1.166,0,1,1,14.949,4.87,1.163,1.163,0,0,1,16.115,6.036Zm3.31,1.183A5.769,5.769,0,0,0,17.85,3.135,5.807,5.807,0,0,0,13.766,1.56c-1.609-.091-6.433-.091-8.042,0A5.8,5.8,0,0,0,1.64,3.13,5.788,5.788,0,0,0,.065,7.215c-.091,1.609-.091,6.433,0,8.042A5.769,5.769,0,0,0,1.64,19.341a5.814,5.814,0,0,0,4.084,1.575c1.609.091,6.433.091,8.042,0a5.769,5.769,0,0,0,4.084-1.575,5.807,5.807,0,0,0,1.575-4.084c.091-1.609.091-6.429,0-8.038Zm-2.079,9.765a3.289,3.289,0,0,1-1.853,1.853c-1.283.509-4.328.391-5.746.391S5.28,19.341,4,18.837a3.289,3.289,0,0,1-1.853-1.853c-.509-1.283-.391-4.328-.391-5.746s-.113-4.467.391-5.746A3.289,3.289,0,0,1,4,3.639c1.283-.509,4.328-.391,5.746-.391s4.467-.113,5.746.391a3.289,3.289,0,0,1,1.853,1.853c.509,1.283.391,4.328.391,5.746S17.855,15.705,17.346,16.984Z"
                                                            transform="translate(0.004 -1.492)" fill="currentColor">
                                                        </path>
                                                    </svg>
                                                    <span class="visually-hidden">Instagram</span>
                                                </a>
                                            </li>
                                            <li class="quickview__social--list">
                                                <a class="quickview__social--icon" target="_blank"
                                                    href="https://www.youtube.com">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16.49"
                                                        height="11.582" viewBox="0 0 16.49 11.582">
                                                        <path data-name="Path 321"
                                                            d="M967.759,1365.592q0,1.377-.019,1.717-.076,1.114-.151,1.622a3.981,3.981,0,0,1-.245.925,1.847,1.847,0,0,1-.453.717,2.171,2.171,0,0,1-1.151.6q-3.585.265-7.641.189-2.377-.038-3.387-.085a11.337,11.337,0,0,1-1.5-.142,2.206,2.206,0,0,1-1.113-.585,2.562,2.562,0,0,1-.528-1.037,3.523,3.523,0,0,1-.141-.585c-.032-.2-.06-.5-.085-.906a38.894,38.894,0,0,1,0-4.867l.113-.925a4.382,4.382,0,0,1,.208-.906,2.069,2.069,0,0,1,.491-.755,2.409,2.409,0,0,1,1.113-.566,19.2,19.2,0,0,1,2.292-.151q1.82-.056,3.953-.056t3.952.066q1.821.067,2.311.142a2.3,2.3,0,0,1,.726.283,1.865,1.865,0,0,1,.557.49,3.425,3.425,0,0,1,.434,1.019,5.72,5.72,0,0,1,.189,1.075q0,.095.057,1C967.752,1364.1,967.759,1364.677,967.759,1365.592Zm-7.6.925q1.49-.754,2.113-1.094l-4.434-2.339v4.66Q958.609,1367.311,960.156,1366.517Z"
                                                            transform="translate(-951.269 -1359.8)" fill="currentColor">
                                                        </path>
                                                    </svg>
                                                    <span class="visually-hidden">Youtube</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End categories section -->

        <!-- Start banner section -->
        <section class="banner__section section--padding pt-0">
            <div class="container">
                <div class="row  mb--n30">
                    <div class="col-lg-6 col-md-6 mb-30">
                        <div class="banner__items position__relative">
                            <a class="banner__thumbnail display-block" href="shop.html"><img
                                    class="banner__thumbnail--img banner__max--height"
                                    src="/partsix/assets/img/banner/banner1.webp" alt="banner-img">
                                <div class="banner__content">
                                    <span class="banner__content--subtitle text__secondary">Toyota Combo</span>
                                    <h2 class="banner__content--title"><span class="banner__content--title__inner">CAR
                                            PARTS</span> COLLECTION</h2>
                                    <span class="banner__content--price">$22.99</span>
                                    <span class="banner__content--btn">Buy now
                                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                                <span class="banner__badge">25% <br> off</span>
                            </a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 mb-30">
                        <div class="banner__items position__relative">
                            <a class="banner__thumbnail display-block" href="shop.html"><img
                                    class="banner__thumbnail--img banner__max--height"
                                    src="/partsix/assets/img/banner/banner2.webp" alt="banner-img">
                                <div class="banner__content right">
                                    <span class="banner__badge--style2">20% Off</span>
                                    <h2 class="banner__content--title">BODY PARTS <br> FOR ANY <span
                                            class="banner__content--title__inner"> VEHICLE </span></h2>
                                    <span class="banner__content--btn mt-0">Buy now
                                        <svg width="12" height="8" viewBox="0 0 12 8" fill="none"
                                            xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M11.8335 3.6178L8.26381 0.157332C8.21395 0.107774 8.1532 0.0681771 8.08544 0.0410843C8.01768 0.0139915 7.94441 0 7.87032 0C7.79624 0 7.72297 0.0139915 7.65521 0.0410843C7.58746 0.0681771 7.5267 0.107774 7.47684 0.157332C7.37199 0.262044 7.31393 0.39827 7.31393 0.539537C7.31393 0.680805 7.37199 0.817024 7.47684 0.921736L10.0943 3.45837H0.55625C0.405122 3.46829 0.26375 3.52959 0.160556 3.62994C0.057363 3.73029 0 3.86225 0 3.99929C0 4.13633 0.057363 4.26829 0.160556 4.36864C0.26375 4.46899 0.405122 4.53029 0.55625 4.54021H10.0927L7.47527 7.07826C7.37042 7.18298 7.31235 7.3192 7.31235 7.46047C7.31235 7.60174 7.37042 7.73796 7.47527 7.84267C7.52513 7.89223 7.58588 7.93182 7.65364 7.95892C7.7214 7.98601 7.79467 8 7.86875 8C7.94284 8 8.0161 7.98601 8.08386 7.95892C8.15162 7.93182 8.21238 7.89223 8.26223 7.84267L11.8335 4.38932C11.9406 4.28419 12 4.14649 12 4.00356C12 3.86063 11.9406 3.72293 11.8335 3.6178Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End banner section -->
    </div>
@endsection

@section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    list_brands: [],
                    list_classification: [],
                    list_vehicles: [

                    ],
                    list_images: [],
                },
                created() {
                    this.getData()
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataHomePage') }}')
                            .then((res) => {
                                this.list_brands = res.data.brand;
                                this.list_classification = res.data.classification;
                                this.list_vehicles = res.data.data;
                                this.list_images = res.data.images;
                                console.log(this.list_vehicles);
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
