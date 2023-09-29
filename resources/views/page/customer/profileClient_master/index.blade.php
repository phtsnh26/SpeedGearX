@extends('share.customer.masterPage')
@section('content')
    <section class="breadcrumb__section breadcrumb__bg">
        <div class="container">
            <div class="row row-cols-1">
                <div class="col">
                    <div class="breadcrumb__content text-center">
                        <ul class="breadcrumb__content--menu d-flex justify-content-center">
                            <li class="breadcrumb__content--menu__items"><a href="/">Home</a></li>
                            <li class="breadcrumb__content--menu__items"><span>Profile</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="my__account--section section--padding">
        <div class="container">
            <div class="my__account--section__inner border-radius-10 d-flex">
                <div class="account__left--sidebar">
                    <h2 class="account__content--title mb-20">Trang Cá Nhân</h2>
                    <ul class="account__menu">
                        <li class="account__menu--list {{ Route::is('indexProfile') ? 'active' : '' }} ">
                            <a href="{{ Route('indexProfile') }}">
                                Cá Nhân
                            </a>
                        </li>
                        <li class="account__menu--list {{ Route::is('orderClient') ? 'active' : '' }} ">
                            <a href="{{ Route('orderClient') }}">
                                Xe Thuê
                            </a>
                        </li>
                        <li class="account__menu--list {{ Route::is('indexChangePass') ? 'active' : '' }}  ">
                            <a href="{{ Route('indexChangePass') }}">
                                Đổi Mật Khẩu
                            </a>
                        </li>
                        <li class="account__menu--list {{ Route::is('logOutClient') ? 'active' : '' }}">
                            <a href="{{ Route('logOutClient') }}">
                                Log Out
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="account__wrapper">
                    <div class="account__content">
                        @yield('content_profile')
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
@section('js')
    @yield('js_profile')
@endsection
