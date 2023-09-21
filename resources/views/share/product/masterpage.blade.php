<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Partsix - Shop Left Sidebar</title>
    <meta name="description" content="Morden Bootstrap HTML5 Template">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="/partsix/assets/img/favicon.ico">

    <!-- ======= All CSS Plugins here ======== -->
    <link rel="stylesheet" href="/partsix/assets/css/plugins/swiper-bundle.min.css">
    <link rel="stylesheet" href="/partsix/assets/css/plugins/glightbox.min.css">
    <link
        href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700&amp;family=Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500&amp;display=swap"
        rel="stylesheet">

    <!-- Plugin css -->
    <link rel="stylesheet" href="/partsix/assets/css/vendor/bootstrap.min.css">

    <!-- Custom Style CSS -->
    <link rel="stylesheet" href="/partsix/assets/css/style.css">
</head>

<body>



    <!-- Start offcanvas filter sidebar -->

    <!-- End offcanvas filter sidebar -->

    <!-- Start header area -->
    <header class="header__section">
        @include('share.product.header')

        @include('share.product.menu')
        <!-- End serch box area -->

    </header>
    <!-- End header area -->

    <main class="main__content_wrapper">

        <!-- Start breadcrumb section -->
        <section class="breadcrumb__section breadcrumb__bg">
            <div class="container">
                <div class="row row-cols-1">
                    <div class="col">
                        <div class="breadcrumb__content text-center">
                            <h1 class="breadcrumb__content--title">Product</h1>
                            <ul class="breadcrumb__content--menu d-flex justify-content-center">
                                <li class="breadcrumb__content--menu__items"><a href="index.html">Home</a></li>
                                <li class="breadcrumb__content--menu__items"><span>Product</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- End breadcrumb section -->

        <!-- Start shop section -->
        <div class="shop__section section--padding">
            <div class="container">
                <div class="row">
                    <div class="col-xl-3 col-lg-4 shop-col-width-lg-4">
                        <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Categories</h2>
                                <ul class="widget__categories--menu">
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img"
                                                src="/partsix/assets/img/product/small-product/product1.webp"
                                                alt="categories-img">
                                            <span class="widget__categories--menu__text">Smart Devices</span>
                                            <svg class="widget__categories--menu__arrowdown--icon"
                                                xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path
                                                    d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                                    transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product2.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount
                                                        Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product3.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green
                                                        dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product4.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product5.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk
                                                        Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img"
                                                src="/partsix/assets/img/product/small-product/product2.webp"
                                                alt="categories-img">
                                            <span class="widget__categories--menu__text">Break disc Parts</span>
                                            <svg class="widget__categories--menu__arrowdown--icon"
                                                xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path
                                                    d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                                    transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product2.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount
                                                        Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product3.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green
                                                        dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product4.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product5.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk
                                                        Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img"
                                                src="/partsix/assets/img/product/small-product/product3.webp"
                                                alt="categories-img">
                                            <span class="widget__categories--menu__text">Service Kits</span>
                                            <svg class="widget__categories--menu__arrowdown--icon"
                                                xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path
                                                    d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                                    transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product2.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount
                                                        Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product3.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green
                                                        dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product4.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product5.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk
                                                        Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img"
                                                src="/partsix/assets/img/product/small-product/product4.webp"
                                                alt="categories-img">
                                            <span class="widget__categories--menu__text">Engine Parts</span>
                                            <svg class="widget__categories--menu__arrowdown--icon"
                                                xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path
                                                    d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                                    transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product2.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount
                                                        Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product3.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green
                                                        dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product4.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product5.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk
                                                        Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="widget__categories--menu__list">
                                        <label class="widget__categories--menu__label d-flex align-items-center">
                                            <img class="widget__categories--menu__img"
                                                src="/partsix/assets/img/product/small-product/product5.webp"
                                                alt="categories-img">
                                            <span class="widget__categories--menu__text">Oil &amp; Lubricants</span>
                                            <svg class="widget__categories--menu__arrowdown--icon"
                                                xmlns="http://www.w3.org/2000/svg" width="12.355" height="8.394">
                                                <path
                                                    d="M15.138,8.59l-3.961,3.952L7.217,8.59,6,9.807l5.178,5.178,5.178-5.178Z"
                                                    transform="translate(-6 -8.59)" fill="currentColor"></path>
                                            </svg>
                                        </label>
                                        <ul class="widget__categories--sub__menu">
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product2.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Discount
                                                        Weekly</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product3.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Green
                                                        dhaniya</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product4.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">resh Nuts</span>
                                                </a>
                                            </li>
                                            <li class="widget__categories--sub__menu--list">
                                                <a class="widget__categories--sub__menu--link d-flex align-items-center"
                                                    href="shop.html">
                                                    <img class="widget__categories--sub__menu--img"
                                                        src="/partsix/assets/img/product/small-product/product5.webp"
                                                        alt="categories-img">
                                                    <span class="widget__categories--sub__menu--text">Millk
                                                        Cream</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </div>
                            <div class="single__widget widget__bg">
                                <h2 class="widget__title h3">Dietary Needs</h2>
                                <ul class="widget__form--check">
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check1">Body Parts</label>
                                        <input class="widget__form--check__input" id="check1" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check2">Oiles
                                            Fluids</label>
                                        <input class="widget__form--check__input" id="check2" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check3">Car care
                                            kits</label>
                                        <input class="widget__form--check__input" id="check3" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check4">Brake disks</label>
                                        <input class="widget__form--check__input" id="check4" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                    <li class="widget__form--check__list">
                                        <label class="widget__form--check__label" for="check5">Repair
                                            Parts</label>
                                        <input class="widget__form--check__input" id="check5" type="checkbox">
                                        <span class="widget__form--checkmark"></span>
                                    </li>
                                </ul>
                            </div>
                            <div class="single__widget price__filter widget__bg">
                                <h2 class="widget__title h3">Filter By Price</h2>
                                <form class="price__filter--form" action="#">
                                    <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                                        <div class="price__filter--group">
                                            <label class="price__filter--label" for="Filter-Price-GTE2">From</label>
                                            <div
                                                class="price__filter--input border-radius-5 d-flex align-items-center">
                                                <span class="price__filter--currency">$</span>
                                                <input class="price__filter--input__field border-0"
                                                    name="filter.v.price.gte" id="Filter-Price-GTE2"
                                                    type="number" placeholder="0" min="0"
                                                    max="250.00">
                                            </div>
                                        </div>
                                        <div class="price__divider">
                                            <span>-</span>
                                        </div>
                                        <div class="price__filter--group">
                                            <label class="price__filter--label" for="Filter-Price-LTE2">To</label>
                                            <div
                                                class="price__filter--input border-radius-5 d-flex align-items-center">
                                                <span class="price__filter--currency">$</span>
                                                <input class="price__filter--input__field border-0"
                                                    name="filter.v.price.lte" id="Filter-Price-LTE2"
                                                    type="number" min="0" placeholder="250.00"
                                                    max="250.00">
                                            </div>
                                        </div>
                                    </div>
                                    <button class="primary__btn price__filter--btn" type="submit">Filter</button>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-9 col-lg-8 shop-col-width-lg-8">
                        <div class="shop__right--sidebar">
                            @yield('content')
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End shop section -->

        <!-- Start shipping section -->
        @include('share.product.shipping')
        <!-- End shipping section -->

    </main>

    @include('share.product.footer')

    <!-- All Script JS Plugins here  -->
    @include('share.product.js')


</body>

</html>
@yield('js')
