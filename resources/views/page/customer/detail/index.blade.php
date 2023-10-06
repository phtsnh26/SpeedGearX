@extends('share.customer.masterPage')
@section('content')
    <style>
        .active_select {
            border: 1px solid #ED1D24 !important;
            border-radius: 5px;
        }

        #swiper-wrapper-7eedb9f2b2172155 {
            height: 380px;
        }
    </style>
    <div id="app">
        <section class="product__details--section section--padding">
            <div class="container">
                <div class="row row-cols-lg-2 row-cols-md-2">
                    <div class="col">
                        <div class="product__details--media">
                            <div
                                class="single__product--preview swiper mb-25 swiper-initialized swiper-horizontal swiper-pointer-events">
                                <div class="swiper-wrapper" id="swiper-wrapper-7eedb9f2b2172155" aria-live="polite"
                                    style="transform: translate3d(-600px, 0px, 0px); transition-duration: 0ms;">
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-prev"
                                        data-swiper-slide-index="4" role="group" aria-label="5 / 5"
                                        style="width: 590px; margin-right: 10px;">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/partsix/assets/img/product/big-product/product5.webp"><img
                                                    class="product__media--preview__items--img"
                                                    src="/partsix/assets/img/product/big-product/product5.webp"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/partsix/assets/img/product/big-product/product5.webp"
                                                    data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg"
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                            stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-miterlimit="10" stroke-width="32"
                                                            d="M338.29 338.29L448 448">
                                                        </path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- ảnh chính --}}
                                    <div class="swiper-slide swiper-slide-active" data-swiper-slide-index="0" role="group"
                                        aria-label="1 / 5" style="width: 590px; margin-right: 10px;">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview" :href="images[index].hinh_anh_xe">
                                                <img style="height: 380px" class="product__media--preview__items--img"
                                                    :src="images[index].hinh_anh_xe" alt="product-media-img">
                                            </a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    :href="images[index].hinh_anh_xe" data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg"
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                            stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-miterlimit="10" stroke-width="32"
                                                            d="M338.29 338.29L448 448">
                                                        </path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-next" data-swiper-slide-index="1" role="group"
                                        aria-label="2 / 5" style="width: 590px; margin-right: 10px;">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/partsix/assets/img/product/big-product/product6.webp">
                                                <img class="product__media--preview__items--img"
                                                    src="/partsix/assets/img/product/big-product/product6.webp"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/partsix/assets/img/product/big-product/product6.webp"
                                                    data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg"
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                            stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-miterlimit="10" stroke-width="32"
                                                            d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="2" role="group"
                                        aria-label="3 / 5" style="width: 590px; margin-right: 10px;">
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
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                            stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-miterlimit="10" stroke-width="32"
                                                            d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide" data-swiper-slide-index="3" role="group"
                                        aria-label="4 / 5" style="width: 590px; margin-right: 10px;">
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
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                            stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-miterlimit="10" stroke-width="32"
                                                            d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate-prev" data-swiper-slide-index="4"
                                        role="group" aria-label="5 / 5" style="width: 590px; margin-right: 10px;">
                                        <div class="product__media--preview__items">
                                            <a class="product__media--preview__items--link glightbox"
                                                data-gallery="product-media-preview"
                                                href="/partsix/assets/img/product/big-product/product5.webp"><img
                                                    class="product__media--preview__items--img"
                                                    src="/partsix/assets/img/product/big-product/product5.webp"
                                                    alt="product-media-img"></a>
                                            <div class="product__media--view__icon">
                                                <a class="product__media--view__icon--link glightbox"
                                                    href="/partsix/assets/img/product/big-product/product5.webp"
                                                    data-gallery="product-media-preview">
                                                    <svg class="product__items--action__btn--svg"
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                            stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-miterlimit="10" stroke-width="32"
                                                            d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="swiper-slide swiper-slide-duplicate swiper-slide-duplicate-active"
                                        data-swiper-slide-index="0" role="group" aria-label="1 / 5"
                                        style="width: 590px; margin-right: 10px;">
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
                                                        xmlns="http://www.w3.org/2000/svg" width="22.51" height="22.443"
                                                        viewBox="0 0 512 512">
                                                        <path
                                                            d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                                            stroke-width="32"></path>
                                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                            stroke-miterlimit="10" stroke-width="32"
                                                            d="M338.29 338.29L448 448"></path>
                                                    </svg>
                                                    <span class="visually-hidden">product view</span>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                            </div>
                            {{-- ảnh phụ --}}
                            <div
                                class="single__product--nav swiper swiper-initialized swiper-horizontal swiper-pointer-events swiper-free-mode swiper-thumbs">
                                <div class="swiper-wrapper" id="swiper-wrapper-721fc2e6ec2a7d72" aria-live="polite"
                                    style="transform: translate3d(-928px, 0px, 0px); transition-duration: 0ms;">

                                    <div v-for='(v,k) in images' :id="'image_' + k" @click='selectImage(k)'
                                        class="swiper-slide swiper-slide-thumb-active " data-swiper-slide-index="0"
                                        role="group" aria-label="1 / 5" style="width: 96px; margin-right: 20px;">
                                        <div class="product__media--nav__items">
                                            <img class="product__media--nav__items--img" :src="v.hinh_anh_xe"
                                                alt="product-nav-img">
                                        </div>
                                    </div>


                                </div>
                                <div @click='nextImage()' class="swiper__nav--btn swiper-button-next" tabindex="0"
                                    role="button" aria-label="Next slide"
                                    aria-controls="swiper-wrapper-721fc2e6ec2a7d72">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class=" -chevron-right">
                                        <polyline points="9 18 15 12 9 6"></polyline>
                                    </svg>
                                </div>
                                <div @click='preImage()' class="swiper__nav--btn swiper-button-prev" tabindex="0"
                                    role="button" aria-label="Previous slide"
                                    aria-controls="swiper-wrapper-721fc2e6ec2a7d72">
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
                        <div class="product__details--info">
                            <div action="#">
                                <h2 class="product__details--info__title mb-15 ">@{{ data.ten_xe }}</h2>
                                <div class="product__details--info__price mb-12">
                                    <b>Giá Thuê / Ngày: <span class="current__price">@{{ numberFormat(data.gia_theo_ngay) }}</span></b>
                                </div>
                                <p class="product__details--info__desc mb-15">
                                    @{{ data.mo_ta_ngan }}
                                </p>
                                <div class="product__variant">
                                    <div class="row">
                                        <div class="col-6">
                                            <div class="text-nowrap d-flex">
                                                <legend class="product__variant--title mb-8">
                                                    Số Chỗ: @{{ data.so_cho_ngoi }}
                                                </legend>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-20">
                                        <div class="col-6">
                                            <div class="text-nowrap d-flex">
                                                <span class="mt-1 me-3"><b>Ngày Đặt:</b></span>
                                                <input v-model="add.ngay_dat" type="date" class="form-control"
                                                    style="border-radius: 15px;font-size: 13px">
                                            </div>
                                        </div>
                                        <div class="col-6">
                                            <div class="text-nowrap d-flex">
                                                <span class="mt-1 me-3"><b>Ngày Trả:</b></span>
                                                <input v-model="add.ngay_tra" type="date" class="form-control"
                                                    style="border-radius: 15px;font-size: 13px">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-20">
                                        <div class="col-5">
                                            <div class="text-nowrap d-flex">
                                                <span class="mt-1 me-3"><b>Số Lượng:</b></span>
                                                <div class="input-group mb-3">
                                                    <div class="input-group mb-3">
                                                        <button @click="tru()" class="btn btn-secondary" type="button"
                                                            id="button-addon1" style="background-color: transparent;">
                                                            <i class="fa-solid fa-minus text-dark"></i>
                                                        </button>
                                                        <input v-model="add.so_luong" style="font-size: 13px"
                                                            type="number" class="form-control text-center"
                                                            placeholder="" aria-label="Example text with button addon"
                                                            aria-describedby="button-addon1">
                                                        <button @click="cong()" class="btn btn-secondary" type="button"
                                                            id="button-addon1" style="background-color: transparent;">
                                                            <i class="fa-solid fa-plus text-dark"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <small class="text-secondary">@{{ data.so_luong }} xe có
                                                sẵn</small>
                                        </div>
                                    </div>
                                    <div class="product__variant--list mb-15">
                                        <button @click="themMoi()" class="variant__buy--now__btn primary__btn"
                                            type="button">
                                            <i class="fa-solid fa-car"></i> ADD MY CAR
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="product__details--tab__section section--padding">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <ul class="product__tab--one product__details--tab d-flex mb-30">
                            <li @click='toDescription()' id="mo_ta" class="product__details--tab__list active"
                                data-toggle="tab" data-target="#description">
                                Mô Tả Chi Tiết</li>
                            <li id="danh_gia" @click='toReview(); ' class="product__details--tab__list"
                                data-toggle="tab" data-target="#reviews">Đánh Giá Của
                                Khách Hàng
                            </li>
                        </ul>
                        <div class="product__details--tab__inner border-radius-10">
                            <div class="tab_content">
                                <div id="description" class="tab_pane active show">
                                    <div class="product__tab--content">
                                        <div class="product__tab--content__step mb-30">
                                            <h2 class="product__tab--content__title h4 mb-10">Mô Tả Chi Tiết</h2>
                                            <p class="product__tab--content__desc">@{{ data.mo_ta_chi_tiet }}</p>
                                        </div>
                                    </div>
                                </div>
                                <div id="reviews" class="tab_pane ">
                                    <div class="product__reviews">
                                        <div class="product__reviews--header">
                                            <h2 class="product__reviews--header__title h3 mb-20">Đánh
                                                Giá(@{{ tong_danh_gia }})</h2>
                                            <div class="reviews__ratting d-flex align-items-center">
                                                <ul class="rating d-flex">
                                                    <li v-for='i in total' class="rating__list">
                                                        <span class="rating__icon">
                                                            <svg width="14" height="13" viewBox="0 0 14 13"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                    <li v-for='i in 5 - total' class="rating__list">
                                                        <span class="rating__icon">
                                                            <svg width="14" height="13" viewBox="0 0 14 13"
                                                                fill="none" xmlns="http://www.w3.org/2000/svg">
                                                                <path
                                                                    d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z"
                                                                    fill="currentColor"></path>
                                                            </svg>
                                                        </span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <a class="actions__newreviews--btn primary__btn" href="#writereview">Viết Đánh
                                                Giá</a>
                                        </div>
                                        <div class="reviews__comment--area">
                                            <div v-for='(v, k) in reviews' class="reviews__comment--list d-flex">
                                                <div class="reviews__comment--thumb">
                                                    <img v-if='v.anh_dai_dien == null'
                                                        src="https://i.pinimg.com/236x/55/3e/97/553e979fb595d33403941cace9f5ba62.jpg"
                                                        alt="comment-thumb">
                                                    <img v-else :src="v.anh_dai_dien" alt="comment-thumb">
                                                </div>
                                                <div class="reviews__comment--content">
                                                    <div class="reviews__comment--top d-flex justify-content-between">
                                                        <div class="reviews__comment--top__left">
                                                            <h3 class="reviews__comment--content__title h4">
                                                                @{{ v.ho_va_ten }}</h3>
                                                            <ul class="rating d-flex">
                                                                <li v-for='i in v.so_sao * 1' class="rating__list">
                                                                    <span class="rating__icon">
                                                                        <svg width="14" height="13"
                                                                            viewBox="0 0 14 13" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                                <li v-for='i in (5 - (v.so_sao * 1))'
                                                                    class="rating__list">
                                                                    <span class="rating__icon">
                                                                        <svg width="14" height="13"
                                                                            viewBox="0 0 14 13" fill="none"
                                                                            xmlns="http://www.w3.org/2000/svg">
                                                                            <path
                                                                                d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z"
                                                                                fill="currentColor"></path>
                                                                        </svg>
                                                                    </span>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                        <span
                                                            class="reviews__comment--content__date">@{{ v.thoi_gian }}</span>
                                                    </div>
                                                    <p class="reviews__comment--content__desc">
                                                        @{{ v.danh_gia }}
                                                    </p>
                                                </div>
                                            </div>


                                        </div>
                                        <div id="writereview" class="reviews__comment--reply__area">
                                            <form action="#">
                                                <h3 class="reviews__comment--reply__title mb-15 ">Add a
                                                    review </h3>
                                                <div class="reviews__ratting mb-20">
                                                    <ul class="rating d-flex">
                                                        <li v-for='i in comment.so_sao' class="rating__list"
                                                            style="cursor: :pointer">
                                                            <a @click='chooseDesc(i)'>
                                                                <span class="rating__icon">
                                                                    <svg width="14" height="13"
                                                                        viewBox="0 0 14 13" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>

                                                        </li>

                                                        <li v-for='i in 5 - comment.so_sao' class="rating__list"
                                                            style="cursor: :pointer">
                                                            <a @click='chooseDesc(i + comment.so_sao)'>
                                                                <span class="rating__icon">
                                                                    <svg width="14" height="13"
                                                                        viewBox="0 0 14 13" fill="none"
                                                                        xmlns="http://www.w3.org/2000/svg">
                                                                        <path
                                                                            d="M12.4141 4.53125L8.99219 4.03906L7.44531 0.921875C7.1875 0.382812 6.39062 0.359375 6.10938 0.921875L4.58594 4.03906L1.14062 4.53125C0.53125 4.625 0.296875 5.375 0.742188 5.82031L3.20312 8.23438L2.61719 11.6328C2.52344 12.2422 3.17969 12.7109 3.71875 12.4297L6.78906 10.8125L9.83594 12.4297C10.375 12.7109 11.0312 12.2422 10.9375 11.6328L10.3516 8.23438L12.8125 5.82031C13.2578 5.375 13.0234 4.625 12.4141 4.53125ZM9.53125 7.95312L10.1875 11.75L6.78906 9.96875L3.36719 11.75L4.02344 7.95312L1.25781 5.28125L5.07812 4.71875L6.78906 1.25L8.47656 4.71875L12.2969 5.28125L9.53125 7.95312Z"
                                                                            fill="currentColor"></path>
                                                                    </svg>
                                                                </span>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <div class="row">
                                                    <div class="col-12 mb-10">
                                                        <textarea v-model='comment.text' class="reviews__comment--reply__textarea" placeholder="Your Comments...."></textarea>
                                                    </div>
                                                </div>
                                                <button class="primary__btn text-white" @click='danh_gia()'
                                                    type="button">Gửi</button>
                                            </form>
                                        </div>
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
                    data: {!! json_encode($data) !!},
                    images: [{
                        hinh_anh_xe: ''
                    }],
                    index: 0,
                    add: {
                        ngay_dat: '',
                        'so_luong': 1,
                    },
                    check: true,
                    comment: {
                        so_sao: 0,
                    },
                    reviews: [],
                    total: 0,
                    tong_danh_gia: 0,

                },
                created() {
                    const today = new Date().toISOString().split('T')[0];
                    this.add.ngay_dat = today;
                    this.loadImage();
                    this.listGioHang();
                    this.loadMyCar();
                    this.dataReview();

                },

                methods: {
                    dataReview() {
                        axios
                            .post('{{ route('dataReview') }}', this.data)
                            .then((res) => {
                                this.reviews = res.data.reviews;
                                this.total = res.data.total;
                                this.tong_danh_gia = res.data.tong_danh_gia;

                            }).catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    chooseDesc(z) {
                        this.comment.so_sao = z;
                    },
                    danh_gia() {
                        this.comment.id_xe = this.data.id;
                        axios
                            .post('{{ route('createDescription') }}', this.comment)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Success');
                                    this.dataReview();

                                } else {
                                    toastr.error(res.data.message, 'Error');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    toReview() {
                        $(document).ready(function() {
                            $('#reviews').addClass('active show');
                            $('#description').removeClass('active show');
                            $('#mo_ta').removeClass('active');
                            $('#danh_gia').addClass('active');
                        });
                    },
                    toDescription() {
                        $('#description').addClass('active show');
                        $('#reviews').removeClass('active show');
                        $('#danh_gia').removeClass('active');
                        $('#mo_ta').addClass('active');
                    },
                    numberFormat(number) {
                        return new Intl.NumberFormat('vi-VI', {
                            style: 'currency',
                            currency: 'VND'
                        }).format(number);
                    },
                    loadImage() {
                        axios
                            .post('{{ Route('loadImageDetail') }}', this.data)
                            .then((res) => {
                                this.images = res.data.image;
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    nextImage() {
                        this.index++;
                        if (this.index > this.images.length - 1) {
                            this.index = 0;
                        }
                    },
                    preImage() {
                        this.index--;
                        if (this.index < 0) {
                            this.index = this.images.length - 1;
                        }
                    },
                    selectImage(k) {
                        this.index = k;
                    },
                    listGioHang() {
                        axios
                            .get('{{ Route('dataGioHang') }}')
                            .then((res) => {
                                this.listCar = res.data.data
                                mycar1 = this.listCar.length;
                                mycar2 = this.listCar.length;
                                $("#mycar1").html(mycar1);
                                $("#mycar2").html(mycar2);
                            });
                    },
                    loadMyCar() {
                        axios
                            .get('{{ Route('dataGioHang') }}')
                            .then((res) => {
                                mycar1 = this.listCar.length;
                                mycar2 = this.listCar.length;
                                $("#mycar1").html(mycar1);
                                $("#mycar2").html(mycar2);
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    themMoi() {
                        var payload = {
                            ...this.add,
                            id: this.data['id'],
                            tong_tien: this.data['tong_tien'],
                            tien_coc: this.data['tien_coc']
                        }
                        axios
                            .post('{{ Route('createGioHang') }}', payload)
                            .then((res) => {
                                if (res.data.status == 1) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.listGioHang();
                                } else if (res.data.status == 0) {
                                    toastr.error(res.data.message, 'Lỗi');
                                } else {
                                    toastr.error('Bạn cần đăng nhập trước khi thêm vào My Car');
                                    setTimeout(() => {
                                        location.href = "/login/client";
                                    }, 1500);
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Lỗi');
                                });
                            });
                    },
                    cong() {
                        if (this.add.so_luong >= 0) {
                            this.add.so_luong++;
                        }
                    },
                    tru() {
                        if (this.add.so_luong > 1) {
                            this.add.so_luong--;
                        }
                    }

                },
            });
        })
    </script>
@endsection
