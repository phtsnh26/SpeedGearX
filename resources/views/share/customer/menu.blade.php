<header class="header__section">
    <style>
        .categories__submenu {
            width: 200px;
        }

        .categories__submenu.style2 .categories__submenu--items {
            width: 100%;
        }
        .del_bottom_border{
            border-bottom: none;
            margin-bottom: 5px;
        }
    </style>
    <div id="appa">
        <div class="main__header header__sticky">
            <div class="container-fluid">
                <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas="">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                                viewBox="0 0 512 512">
                                <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                    stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352">
                                </path>
                            </svg>
                            <span class="visually-hidden">Offcanvas Menu Open</span>
                        </a>
                    </div>
                    <div class="main__logo">
                        <h1 class="main__logo--title"><a class="main__logo--link" href="{{ Route('indexHome') }}"><img
                                    class="main__logo--img" src="/partsix/assets/img/logo/logo.png" alt="logo-img"
                                    style="height: 40px"></a>
                        </h1>
                    </div>
                    <div class="header__menu style3 d-none d-lg-block">
                        <nav class="header__menu--navigation">
                            <ul class="header__menu--wrapper d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link check" href="{{ Route('indexHome') }}">Trang Chủ</a>
                                </li>


                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="blog.html">Tất Cả Thương Hiệu
                                        <svg class="menu__arrowdown--icon" xmlns="http://www.w3.org/2000/svg"
                                            width="12" height="7.41" viewBox="0 0 12 7.41">
                                            <path d="M16.59,8.59,12,13.17,7.41,8.59,6,10l6,6,6-6Z"
                                                transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7">
                                            </path>
                                        </svg>
                                    </a>

                                    <ul class="header__sub--menu">
                                        <li v-for='(v, k) in brands' class="categories__menu--items">
                                            <a style="padding: 0;"  class="categories__menu--link py-1 del_bottom_border" href="shop.html">
                                                @{{ v.ten_thuong_hieu }}
                                                <svg class="categories__menu--right__arrow--icon"
                                                    xmlns="http://www.w3.org/2000/svg" width="17.007" height="16.831"
                                                    viewBox="0 0 512 512">
                                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                                        stroke-linejoin="round" stroke-width="48"
                                                        d="M184 112l144 144-144 144"></path>
                                                </svg>
                                            </a>
                                            <ul
                                                class="categories__submenu style2 border-radius-10 d-flex justify-content-between">
                                                <li class="categories__submenu--items"><a
                                                        class="categories__submenu--items__text"
                                                        href="shop.html"><strong>Loại Xe</strong></a>
                                                    <ul class="categories__submenu--child">
                                                        <li v-for='(value, key) in classification' class="categories__submenu--child__items"><a
                                                                class="categories__submenu--child__items--link"
                                                                href="shop.html">@{{ value.so_cho_ngoi }} chỗ</a></li>
                                                    </ul>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link" href="{{ Route('indexContact') }}">Liên Hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    <div class="header__account">
                        <ul class="header__account--wrapper d-flex align-items-center">
                            <li class="header__account--items  header__account--search__items d-sm-2-none">
                                <a class="header__account--btn search__open--btn" href="javascript:void(0)"
                                    data-offcanvas="">
                                    <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                        width="22.51" height="20.443" viewBox="0 0 512 512">
                                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                            fill="none" stroke="currentColor" stroke-miterlimit="10"
                                            stroke-width="32">
                                        </path>
                                        <path fill="none" stroke="currentColor" stroke-linecap="round"
                                            stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                    </svg>
                                    <span class="visually-hidden">Search</span>
                                </a>

                            </li>
                            <li class="header__account--items d-none d-lg-block">
                                <a class="header__account--btn" href="my-account.html">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class=" -user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="visually-hidden">My account</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <!-- Start Offcanvas header menu -->
        <div class="offcanvas__header">
            <div class="offcanvas__inner">
                <div class="offcanvas__logo">
                    <a class="offcanvas__logo_link" href="index.html">
                        <img src="/partsix/assets/img/logo/nav-log.webp" alt="Grocee Logo" width="158"
                            height="36">
                    </a>
                    <button class="offcanvas__close--btn" data-offcanvas="">close</button>
                </div>
                <nav class="offcanvas__menu">
                    <ul class="offcanvas__menu_ul">
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="index.html">Home</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li"><a href="index.html"
                                        class="offcanvas__sub_menu_item">Home One</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="index-2.html"
                                        class="offcanvas__sub_menu_item">Home Two</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="index-3.html"
                                        class="offcanvas__sub_menu_item">Home Three</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="index-4.html"
                                        class="offcanvas__sub_menu_item">Home Four</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="index-5.html"
                                        class="offcanvas__sub_menu_item">Home Five</a></li>
                            </ul>
                            <button class="offcanvas__sub_menu_toggle"></button>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="shop.html">Shop</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column One</a>
                                    <ul class="offcanvas__sub_menu">
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="shop.html">Shop Left Sidebar</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="shop-right-sidebar.html">Shop Right Sidebar</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="shop-grid.html">Shop Grid</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="shop-grid-list.html">Shop Grid List</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="shop-list.html">Shop List</a></li>
                                    </ul>
                                    <button class="offcanvas__sub_menu_toggle"></button>
                                </li>
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column Two</a>
                                    <ul class="offcanvas__sub_menu">
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="product-details.html">Product Details</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="product-video.html">Video Product</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="product-details.html">Variable Product</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="product-left-sidebar.html">Product Left Sidebar</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="product-gallery.html">Product Gallery</a></li>
                                    </ul>
                                    <button class="offcanvas__sub_menu_toggle"></button>
                                </li>
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column Three</a>
                                    <ul class="offcanvas__sub_menu">
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="my-account.html">My Account</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="my-account-2.html">My Account 2</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="404.html">404 Page</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="login.html">Login Page</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="faq.html">Faq Page</a></li>
                                    </ul>
                                    <button class="offcanvas__sub_menu_toggle"></button>
                                </li>
                                <li class="offcanvas__sub_menu_li">
                                    <a href="#" class="offcanvas__sub_menu_item">Column Three</a>
                                    <ul class="offcanvas__sub_menu">
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="about.html">About Us</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="contact.html">Contact Us</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="portfolio.html">Portfolio</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="compare.html">Compare Pages</a></li>
                                        <li class="offcanvas__sub_menu_li"><a class="offcanvas__sub_menu_item"
                                                href="checkout.html">Checkout page</a></li>
                                    </ul>
                                    <button class="offcanvas__sub_menu_toggle"></button>
                                </li>
                            </ul>
                            <button class="offcanvas__sub_menu_toggle"></button>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="blog.html">Blog</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li"><a href="blog.html"
                                        class="offcanvas__sub_menu_item">Blog Grid</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="blog-details.html"
                                        class="offcanvas__sub_menu_item">Blog Details</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="blog-left-sidebar.html"
                                        class="offcanvas__sub_menu_item">Blog Left Sidebar</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="blog-right-sidebar.html"
                                        class="offcanvas__sub_menu_item">Blog Right Sidebar</a></li>
                            </ul>
                            <button class="offcanvas__sub_menu_toggle"></button>
                        </li>
                        <li class="offcanvas__menu_li">
                            <a class="offcanvas__menu_item" href="#">Pages</a>
                            <ul class="offcanvas__sub_menu">
                                <li class="offcanvas__sub_menu_li"><a href="about.html"
                                        class="offcanvas__sub_menu_item">About Us</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="contact.html"
                                        class="offcanvas__sub_menu_item">Contact Us</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="cart.html"
                                        class="offcanvas__sub_menu_item">Cart Page</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="portfolio.html"
                                        class="offcanvas__sub_menu_item">Portfolio Page</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="wishlist.html"
                                        class="offcanvas__sub_menu_item">Wishlist Page</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="login.html"
                                        class="offcanvas__sub_menu_item">Login Page</a></li>
                                <li class="offcanvas__sub_menu_li"><a href="404.html"
                                        class="offcanvas__sub_menu_item">Error Page</a></li>
                            </ul>
                            <button class="offcanvas__sub_menu_toggle"></button>
                        </li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item" href="about.html">About</a>
                        </li>
                        <li class="offcanvas__menu_li"><a class="offcanvas__menu_item"
                                href="contact.html">Contact</a>
                        </li>
                    </ul>
                    <div class="offcanvas__account--items">
                        <a class="offcanvas__account--items__btn d-flex align-items-center" href="login.html">
                            <span class="offcanvas__account--items__icon">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20.51" height="19.443"
                                    viewBox="0 0 512 512">
                                    <path
                                        d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z"
                                        fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="32"></path>
                                    <path
                                        d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z"
                                        fill="none" stroke="currentColor" stroke-miterlimit="10"
                                        stroke-width="32">
                                    </path>
                                </svg>
                            </span>
                            <span class="offcanvas__account--items__label">Login / Register</span>
                        </a>
                    </div>
                    <div class="offcanvas__account--wrapper d-flex">
                        <div class="offcanvas__account--currency">
                            <a class="offcanvas__account--currency__menu d-flex align-items-center text-black"
                                href="javascript:void(0)">
                                <img src="/partsix/assets/img/icon/usd-icon.webp" alt="currency">
                                <span>USD</span>
                                <svg xmlns="http://www.w3.org/2000/svg" width="9.797" height="6.05"
                                    viewBox="0 0 9.797 6.05">
                                    <path d="M14.646,8.59,10.9,12.329,7.151,8.59,6,9.741l4.9,4.9,4.9-4.9Z"
                                        transform="translate(-6 -8.59)" fill="currentColor" opacity="0.7"></path>
                                </svg>
                            </a>
                        </li>
                        <li class="header__account--items d-none d-lg-block">
                            <a class="header__account--btn" href="{{ Route('indexLoginCustomer') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class=" -user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                            </a>
                        </li>
                        <li class="header__account--items header__minicart--items hi">
                            <style>
                                .hi {
                                    margin-left: 15px;
                                }
                            </style>
                            <a class="header__account--btn minicart__open--btn" href="javascript:void(0)"
                                data-offcanvas="">
                                <i class="fa-solid fa-car fa-xl"></i>
                                <span class="items__count mb-2 bello">2</span>
                                <style>
                                    .bello {
                                        left: 2.0rem;
                                        top: -10px
                                    }
                                </style>
                                <span class="minicart__btn--text hello">My Car<br></span>
                                <style>
                                    .hello {
                                        padding-left: 15px
                                    }
                                </style>
                            </a>
                        </li>
                        <li class="header__account--items ha">
                            <a class="header__account--btn" href="#">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i>
                                <style>
                                    .ha {
                                        margin-left: 15px;
                                    }
                                </style>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <!-- Start offCanvas minicart -->
    <div class="offCanvas__minicart">
        <div class="minicart__header ">
            <div class="minicart__header--top d-flex justify-content-between align-items-center">
                <h3 class="minicart__title"> Shopping Cart</h3>
                <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas="">
                    <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
                    </svg>
                </button>
            </div>
            <p class="minicart__header--desc">The organic foods products are limited</p>
        </div>
        <div class="minicart__product">
            <div class="minicart__product--items d-flex">
                <div class="minicart__thumb">
                    <a href="product-details.html"><img src="/partsix/assets/img/product/small-product/product1.webp"
                            alt="prduct-img"></a>

                </div>
                <p class="minicart__header--desc">The organic foods products are limited</p>
            </div>
            <div class="minicart__product">
                <div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.html"><img
                                src="/partsix/assets/img/product/small-product/product1.webp" alt="prduct-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.html">Car &amp; Motorbike Care.</a>
                        </h4>
                        <span class="color__variant"><b>Color:</b> Beige</span>
                        <div class="minicart__price">
                            <span class="minicart__current--price">$125.00</span>
                            <span class="minicart__old--price">$140.00</span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <button type="button" class="quantity__value decrease" aria-label="quantity value"
                                    value="Decrease Value">-</button>
                                <label>
                                    <input type="number" class="quantity__number" value="1" data-counter="">
                                </label>
                                <button type="button" class="quantity__value increase" aria-label="quantity value"
                                    value="Increase Value">+</button>
                            </div>
                            <button class="minicart__product--remove" type="button">Remove</button>
                        </div>
                    </div>
                </div>
                <div class="minicart__product--items d-flex">
                    <div class="minicart__thumb">
                        <a href="product-details.html"><img
                                src="/partsix/assets/img/product/small-product/product2.webp" alt="prduct-img"></a>
                    </div>
                    <div class="minicart__text">
                        <h4 class="minicart__subtitle"><a href="product-details.html">Engine And Drivetrain.</a></h4>
                        <span class="color__variant"><b>Color:</b> Green</span>
                        <div class="minicart__price">
                            <span class="minicart__current--price">$115.00</span>
                            <span class="minicart__old--price">$130.00</span>
                        </div>
                        <div class="minicart__text--footer d-flex align-items-center">
                            <div class="quantity__box minicart__quantity">
                                <button type="button" class="quantity__value decrease" aria-label="quantity value"
                                    value="Decrease Value">-</button>
                                <label>
                                    <input type="number" class="quantity__number" value="1" data-counter="">
                                </label>
                                <button type="button" class="quantity__value increase" aria-label="quantity value"
                                    value="Increase Value">+</button>
                            </div>
                            <button class="minicart__product--remove" type="button">Remove</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="minicart__amount">
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Sub Total:</span>
                    <span><b>$240.00</b></span>
                </div>
                <div class="minicart__amount_list d-flex justify-content-between">
                    <span>Total:</span>
                    <span><b>$240.00</b></span>
                </div>
            </div>
            <div class="minicart__conditions text-center">
                <input class="minicart__conditions--input" id="accept" type="checkbox">
                <label class="minicart__conditions--label" for="accept">I agree with the <a
                        class="minicart__conditions--link" href="privacy-policy.html">Privacy Policy</a></label>
            </div>
            <div class="minicart__button d-flex justify-content-center">
                <a class="primary__btn minicart__button--link" href="cart.html">View cart</a>
                <a class="primary__btn minicart__button--link" href="checkout.html">Checkout</a>
            </div>
        </div>
        <div class="minicart__conditions text-center">
            <input class="minicart__conditions--input" id="accept" type="checkbox">
            <label class="minicart__conditions--label" for="accept">I agree with the <a
                    class="minicart__conditions--link" href="privacy-policy.html">Privacy Policy</a></label>
        </div>
        <div class="minicart__button d-flex justify-content-center">
            <a class="primary__btn minicart__button--link" href="cart.html">View cart</a>
            <a class="primary__btn minicart__button--link" href="checkout.html">Checkout</a>
        </div>
    </div>
    <!-- End offCanvas minicart -->
    <!-- Start serch box area -->
    <div class="predictive__search--box ">
        <div class="predictive__search--box__inner">
            <h2 class="predictive__search--title">Tìm Kiếm</h2>
            <form class="predictive__search--form" action="#">
                <label>
                    <input class="predictive__search--input" placeholder="Nhập tìm kiếm" type="text">
                </label>
                <button class="predictive__search--button text-white" aria-label="search button"><svg
                        class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51"
                        height="25.443" viewBox="0 0 512 512">
                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                            stroke="currentColor" stroke-miterlimit="10" stroke-width="32"></path>
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="32" d="M338.29 338.29L448 448"></path>
                    </svg> </button>
            </form>
        </div>
        <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas="">
            <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51"
                height="30.443" viewBox="0 0 512 512">
                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32" d="M368 368L144 144M368 144L144 368"></path>
            </svg>
        </button>
    </div>
    <!-- End serch box area -->

</header>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="/vuexy/app-assets/vendors/js/extensions/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.5.0/axios.min.js"
    integrity="sha512-aoTNnqZcT8B4AmeCFmiSnDlc4Nj/KPaZyB5G7JnOnUEkdNpCZs1LCankiYi01sLTyWy+m2P+W4XM+BuQ3Q4/Dg=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/vue@2.6.10/dist/vue.js"></script>
<script>
    $(document).ready(function() {
        new Vue({
            el: '#appa',
            data: {
                brands: [],
                classification: [],
            },
            created() {
                axios
                    .get('{{ Route('getThuongHieu') }}')
                    .then((res) => {
                        this.brands = res.data.data;
                        this.classification = res.data.classification;
                    });
                    console.log(this.alo + " ádfsad");
            },
            methods: {

            },
        });
    })
</script>
