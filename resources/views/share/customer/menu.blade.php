<header class="header__section">
    <style>
        .categories__submenu {
            width: 200px;
        }

        .categories__submenu.style2 .categories__submenu--items {
            width: 100%;
        }

        .del_bottom_border {
            border-bottom: none;
            margin-bottom: 5px;
        }

        .ha {
            margin-left: 15px;
        }

        .bello {
            left: 2.0rem;
            top: -10px
        }

        .hi {
            margin-left: 15px;
        }

        .hello {
            padding-left: 15px
        }
    </style>
    <div class="main__header header__sticky">
        <div class="container">
            <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                <div class="offcanvas__header--menu__open ">
                    <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg"
                            viewBox="0 0 512 512">
                            <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                                stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352" />
                        </svg>
                        <span class="visually-hidden">Offcanvas Menu Open</span>
                    </a>
                </div>
                <div class="main__logo">
                    <h1 class="main__logo--title"><a class="main__logo--link" href="{{ Route('indexHome') }}"><img
                                class="main__logo--img" src="/partsix/assets/img/logo/logo.png" alt="logo-img"
                                style="width: 175px"></a></h1>
                </div>
                <div class="header__search--widget d-none d-lg-block header__sticky--none">
                    <form class="d-flex header__search--form border-radius-5" action="#">
                        <div class="header__search--box">
                            <label>
                                <input class="header__search--input" placeholder="Tìm kiếm" type="text">
                            </label>
                            <button class="header__search--button bg__primary text-white" aria-label="search button"
                                type="submit">
                                <svg width="16" height="16" viewBox="0 0 16 16" fill="none"
                                    xmlns="http://www.w3.org/2000/svg">
                                    <path
                                        d="M15.6952 14.4991L11.7663 10.5588C12.7765 9.4008 13.33 7.94381 13.33 6.42703C13.33 2.88322 10.34 0 6.66499 0C2.98997 0 0 2.88322 0 6.42703C0 9.97085 2.98997 12.8541 6.66499 12.8541C8.04464 12.8541 9.35938 12.4528 10.4834 11.6911L14.4422 15.6613C14.6076 15.827 14.8302 15.9184 15.0687 15.9184C15.2944 15.9184 15.5086 15.8354 15.6711 15.6845C16.0166 15.364 16.0276 14.8325 15.6952 14.4991ZM6.66499 1.67662C9.38141 1.67662 11.5913 3.8076 11.5913 6.42703C11.5913 9.04647 9.38141 11.1775 6.66499 11.1775C3.94857 11.1775 1.73869 9.04647 1.73869 6.42703C1.73869 3.8076 3.94857 1.67662 6.66499 1.67662Z"
                                        fill="currentColor" />
                                </svg>
                            </button>
                        </div>
                    </form>
                </div>
                <div class="header__menu d-none d-lg-block header__sticky--block">
                    <nav class="header__menu--navigation">
                        <ul class="header__menu--wrapper d-flex">
                            <li class="header__menu--items">
                                <a class="header__menu--link" href="{{ Route('indexHome') }}">Trang Chủ </a>
                            </li>

                            <li class="header__menu--items">
                                <a class="header__menu--link" href="{{ Route('allProduct') }}">Tất Cả Xe </a>
                            </li>


                            <li class="header__menu--items">
                                <a class="header__menu--link" href="{{ Route('indexContact') }}">Liên Hệ </a>
                            </li>
                        </ul>
                    </nav>
                </div>
                <div class="header__account header__sticky--none">
                    <ul class="header__account--wrapper d-flex align-items-center">
                        <li class="header__account--items d-none d-lg-block">
                            <a class="header__account--btn" href="{{ Route('indexLoginCustomer') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class=" -user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="visually-hidden">My account</span>
                            </a>
                        </li>
                        <li class="header__account--items header__minicart--items hi">
                            {{-- <style>

                            </style> --}}
                            <a class="header__account--btn minicart__open--btn" href="javascript:void(0)"
                                data-offcanvas="">
                                <i class="fa-solid fa-car fa-xl"></i>
                                <span class="items__count mb-2 bello">2</span>
                                <span class="minicart__btn--text hello">My Car<br></span>
                            </a>
                        </li>
                        <li class="header__account--items ha">
                            <a class="header__account--btn" href="#">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="header__account header__sticky--block">
                    <ul class="header__account--wrapper d-flex align-items-center">
                        <li class="header__account--items  header__account--search__items d-sm-2-none">
                        <li class="header__account--items  header__account--search__items d-sm-2-none">
                            <a class="header__account--btn search__open--btn" href="javascript:void(0)"
                                data-offcanvas="">
                                <svg class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                                    width="22.51" height="20.443" viewBox="0 0 512 512">
                                    <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                        fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32">
                                    </path>
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"></path>
                                </svg>
                                <span class="visually-hidden">Search</span>
                            </a>
                        </li>


                        </li>
                        <li class="header__account--items d-none d-lg-block">
                            <a class="header__account--btn" href="{{ Route('indexLoginCustomer') }}">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                    viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                    stroke-linecap="round" stroke-linejoin="round" class=" -user">
                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                    <circle cx="12" cy="7" r="4"></circle>
                                </svg>
                                <span class="visually-hidden">My account</span>
                            </a>
                        </li>
                        <li class="header__account--items header__minicart--items hi">
                            {{-- <style>

                            </style> --}}
                            <a class="header__account--btn minicart__open--btn" href="javascript:void(0)"
                                data-offcanvas="">
                                <i class="fa-solid fa-car fa-xl"></i>
                                <span class="items__count mb-2 bello">2</span>
                                <span class="minicart__btn--text hello">My Car<br></span>
                            </a>
                        </li>
                        <li class="header__account--items ha">
                            <a class="header__account--btn" href="#">
                                <i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="header__bottom d-none d-lg-block">
        <div class="container">
            <div
                class="header__bottom--inner__style3 position__relative d-flex align-items-center justify-content-between">
                <div class="header__menu header__menu--style4">
                    <nav class="header__menu--navigation">
                        <ul class="header__menu--wrapper d-flex">
                            <li class="header__menu--items">
                                <a class="header__menu--link" href="{{ Route('indexHome') }}">Trang Chủ</a>
                            </li>
                            <li class="header__menu--items">
                                <a class="header__menu--link" href="{{ Route('allProduct') }}">Tất Cả Xe</a>
                            </li>
                            <li class="header__menu--items">
                                <a class="header__menu--link" href="{{ Route('indexContact') }}">Liên Hệ</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>



    <!-- Start offCanvas minicart -->
    <div class="offCanvas__minicart">
        <div class="minicart__header ">
            <div class="minicart__header--top d-flex justify-content-between align-items-center">
                <h3 class="minicart__title"> Shopping Cart</h3>
                <button class="minicart__close--btn" aria-label="minicart close btn" data-offcanvas>
                    <svg class="minicart__close--icon" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                        <path fill="currentColor" stroke="currentColor" stroke-linecap="round"
                            stroke-linejoin="round" stroke-width="32" d="M368 368L144 144M368 144L144 368" />
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
                <div class="minicart__text">
                    <h4 class="minicart__subtitle"><a href="product-details.html">Car & Motorbike Care.</a></h4>
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
                                <input type="number" class="quantity__number" value="1" data-counter />
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
                    <a href="product-details.html"><img src="/partsix/assets/img/product/small-product/product2.webp"
                            alt="prduct-img"></a>
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
                                <input type="number" class="quantity__number" value="1" data-counter />
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
    <!-- End offCanvas minicart -->

    <!-- Start serch box area -->
    <div class="predictive__search--box ">
        <div class="predictive__search--box__inner">
            <h2 class="predictive__search--title">Tìm Kiếm</h2>
            <form class="predictive__search--form" action="#">
                <label>
                    <input class="predictive__search--input" placeholder="Tìm kiếm" type="text">
                </label>
                <button class="predictive__search--button text-white" aria-label="search button"><svg
                        class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg" width="30.51"
                        height="25.443" viewBox="0 0 512 512">
                        <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none"
                            stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
                        <path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10"
                            stroke-width="32" d="M338.29 338.29L448 448" />
                    </svg> </button>
            </form>
        </div>
        <button class="predictive__search--close__btn" aria-label="search close" data-offcanvas>
            <svg class="predictive__search--close__icon" xmlns="http://www.w3.org/2000/svg" width="40.51"
                height="30.443" viewBox="0 0 512 512">
                <path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                    stroke-width="32" d="M368 368L144 144M368 144L144 368" />
            </svg>
        </button>
    </div>
    <!-- End serch box area -->

</header>
