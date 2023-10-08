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
    <div id="app_header">
        <div class="main__header header__sticky">
            <div class="container">
                <div class="main__header--inner position__relative d-flex justify-content-between align-items-center">
                    <div class="main__logo">
                        <h1 class="main__logo--title">
                            <a class="main__logo--link" href="{{ Route('indexHome') }}">
                                <img class="main__logo--img" src="/partsix/assets/img/logo/logo.png" alt="logo-img"
                                    style="width: 175px">
                            </a>
                        </h1>
                    </div>

                    <div class="header__menu d-none d-lg-block header__sticky--block">
                        <nav class="header__menu--navigation">
                            <ul class="header__menu--wrapper d-flex">
                                <li class="header__menu--items">
                                    <a class="header__menu--link {{ Route::is('indexHome') ? 'active' : '' }}  "
                                        href="{{ Route('indexHome') }}">Trang Chủ </a>
                                </li>

                                <li class="header__menu--items">
                                    <a class="header__menu--link {{ Route::is('allProduct') ? 'active' : '' }}  "
                                        href="{{ Route('allProduct') }}">Tất Cả Xe </a>
                                </li>


                                <li class="header__menu--items">
                                    <a class="header__menu--link {{ Route::is('indexContact') ? 'active' : '' }}  "
                                        href="{{ Route('indexContact') }}">Liên Hệ </a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                    @if (Auth::guard('client')->check())
                        <div class="header__account header__sticky--none">
                            <ul class="header__account--wrapper d-flex align-items-center">
                                <li class="header__account--items d-none d-lg-block">
                                    <a class="header__account--btn" href="{{ Route('indexProfile') }}">
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
                                    <a class="header__account--btn minicart__open--btn"
                                        href="{{ Route('indexWishlist') }}">
                                        <i class="fa-regular fa-heart fa-xl"></i>
                                        <span id="yeu_thich_2" class="items__count mb-2 bello"></span>
                                        <span class="minicart__btn--text hello">Wishlist<br></span>
                                    </a>
                                </li>
                                <li class="header__account--items ha">
                                    <a class="header__account--btn" href="{{ Route('logOutClient') }}">
                                        <i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    @else
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
                            </ul>
                        </div>
                    @endif
                    <div class="header__account header__sticky--block">
                        <ul class="header__account--wrapper d-flex align-items-center">
                           
                            <li class="header__account--items d-none d-lg-block">
                                <a class="header__account--btn" href="{{ Route('indexProfile') }}">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                        viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                        stroke-linecap="round" stroke-linejoin="round" class=" -user">
                                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                        <circle cx="12" cy="7" r="4"></circle>
                                    </svg>
                                    <span class="visually-hidden">My account</span>
                                </a>
                            </li>
                            @if (Auth::guard('client')->check())
                                <li class="header__account--items header__minicart--items hi">
                                    <a class="header__account--btn minicart__open--btn"
                                        href="{{ Route('indexWishlist') }}" data-offcanvas="">
                                        <i class="fa-regular fa-heart fa-xl"></i>
                                        <span id="yeu_thich_1" class="items__count mb-2 bello"></span>
                                        <span class="minicart__btn--text hello">Wishlist<br></span>
                                    </a>
                                </li>
                                <li class="header__account--items ha">
                                    <a class="header__account--btn" href="{{ Route('logOutClient') }}">
                                        <i class="fa-solid fa-arrow-right-from-bracket fa-xl"></i>
                                    </a>
                                </li>
                            @else
                                <div class="header__account header__sticky--none">
                                    <ul class="header__account--wrapper d-flex align-items-center">
                                        <li class="header__account--items d-none d-lg-block">
                                            <a class="header__account--btn" href="{{ Route('indexLoginCustomer') }}">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                    viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                                    class=" -user">
                                                    <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                                                    <circle cx="12" cy="7" r="4"></circle>
                                                </svg>
                                                <span class="visually-hidden">My account</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            @endif
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
                                    <a class="header__menu--link {{ Route::is('indexHome') ? 'active' : '' }}"
                                        href="{{ Route('indexHome') }}">Trang Chủ</a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link {{ Route::is('allProduct') ? 'active' : '' }}  "
                                        href="{{ Route('allProduct') }}">Tất Cả Xe</a>
                                </li>
                                <li class="header__menu--items">
                                    <a class="header__menu--link {{ Route::is('indexContact') ? 'active' : '' }} "
                                        href="{{ Route('indexContact') }}">Liên Hệ</a>
                                </li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
        <div class="predictive__search--box ">
            <div class="predictive__search--box__inner">
                <h2 class="predictive__search--title">Tìm Kiếm</h2>
                <form class="predictive__search--form" action="#">
                    <label>
                        <input class="predictive__search--input" placeholder="Tìm kiếm" type="text">
                    </label>
                    <button class="predictive__search--button text-white" aria-label="search button"><svg
                            class="product__items--action__btn--svg" xmlns="http://www.w3.org/2000/svg"
                            width="30.51" height="25.443" viewBox="0 0 512 512">
                            <path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z"
                                fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32" />
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
        @php
            $checklogin = Auth::guard('client')->check();
        @endphp
    </div>
</header>
<script>
    new Vue({
        el: '#app_header',
        data: {
            list: [],
        },
        created() {
            this.loadDataWishlist();
        },
        methods: {
            loadDataWishlist() {
                axios
                    .get('{{ Route('dataWishlist') }}')
                    .then((res) => {
                        yeu_thich_1 = res.data.yeu_thich;
                        yeu_thich_2 = res.data.yeu_thich;
                        $("#yeu_thich_1").html(yeu_thich_1);
                        $("#yeu_thich_2").html(yeu_thich_2);
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
