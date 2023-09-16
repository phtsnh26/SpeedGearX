@extends('share.admin.masterPage')
@section('content')
    <style>
        a {
            position: relative;
            display: inline-block;
            cursor: pointer;
            outline: none;
            border: 0;
            vertical-align: middle;
            text-decoration: none;
            background: transparent;
            padding: 0;
            font-size: inherit;
            font-family: inherit;
        }

        a.learn-more {
            width: 12rem;
            height: auto;
        }

        a.learn-more .circle {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: relative;
            display: block;
            margin: 0;
            width: 3rem;
            height: 3rem;
            background: #282936;
            border-radius: 1.625rem;
        }

        a.learn-more .circle .icon {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: absolute;
            top: 0;
            bottom: 0;
            margin: auto;
            background: #fff;
        }

        a.learn-more .circle .icon.arrow {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            left: 0.625rem;
            width: 1.125rem;
            height: 0.125rem;
            background: none;
        }

        a.learn-more .circle .icon.arrow::before {
            position: absolute;
            content: "";
            top: -0.29rem;
            right: 0.0625rem;
            width: 0.625rem;
            height: 0.625rem;
            border-top: 0.125rem solid #fff;
            border-right: 0.125rem solid #fff;
            transform: rotate(45deg);
        }

        a.learn-more .button-text {
            transition: all 0.45s cubic-bezier(0.65, 0, 0.076, 1);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            padding: 0.75rem 0;
            margin: 0 0 0 1.85rem;
            color: #282936;
            font-weight: 700;
            line-height: 1.6;
            text-align: center;
            text-transform: uppercase;
        }

        a:hover .circle {
            width: 100%;
        }

        a:hover .circle .icon.arrow {
            background: #fff;
            transform: translate(1rem, 0);
        }

        a:hover .button-text {
            color: #fff;
        }
    </style>
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <img src="https://storage.googleapis.com/f1-cms/2021/04/77256c3c-20210427_075604.jpg"
                            style="height: 300px">
                        <div class="card-body">
                            <h1 class='text-center'>@{{ data.brand }}</h1>
                            <h2 class="card-text text-center">Brands</h2>
                        </div>
                        <div class="card-footer text-center">
                            <a class="learn-more" href="{{ Route('indexBrand') }}">
                                <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">Chi Tiết</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="https://cly.1cdn.vn/2023/03/31/lamborghini-revuelto.jpg" style="height: 300px">
                        <div class="card-body">
                            <h1 class='text-center'>@{{ data.vehicle }}</h1>
                            <h2 class="card-text text-center">Vehicles</h2>
                        </div>
                        <div class="card-footer text-center">
                            <a class="learn-more" href="{{ Route('indexVehicle') }}">
                                <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">Chi Tiết</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="https://img.freepik.com/free-vector/hotel-booking-concept-illustration_114360-6497.jpg?"
                            style="height: 300px">
                        <div class="card-body">
                            <h1 class='text-center'>@{{ data.booking }}</h1>
                            <h2 class="card-text text-center">Total Bookings</h2>
                        </div>
                        <div class="card-footer text-center">
                            <a class="learn-more" href="{{ Route('indexBooking') }}">
                                <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">Chi Tiết</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="https://vietnamcleanroom.com/vcr-media/23/3/10/danh-gia-noi-bo-9.jpg"
                            style="height: 300px">
                        <div class="card-body">
                            <h1 class='text-center'>52</h1>
                            <h2 class="card-text text-center">Testimonials</h2>
                        </div>
                        <div class="card-footer text-center">
                            <a class="learn-more" href="{{ Route('indexTestimonial') }}">
                                <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">Chi Tiết</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    <div class="card">
                        <img src="https://img.freepik.com/premium-vector/illustration-vector-graphic-cartoon-character-company-activity-report_516790-1825.jpg"
                            style="height: 300px">
                        <div class="card-body">
                            <h1 class='text-center'>23</h1>
                            <h2 class="card-text text-center">Reports</h2>
                        </div>
                        <div class="card-footer text-center">
                            <a class="learn-more" href="{{ Route('indexReports') }}">
                                <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">Chi Tiết</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-3">
                    <div class="card">
                        <img src="https://handsontek.net/images/Teams/Custom%20Backgrounds/hero.png" style="height: 300px">
                        <div class="card-body">
                            <h1 class='text-center'>@{{ data.client }}</h1>
                            <h2 class="card-text text-center">Users</h2>
                        </div>
                        <div class="card-footer text-center">
                            <a class="learn-more" href="{{ Route('indexUser') }}">
                                <span class="circle" aria-hidden="true">
                                    <span class="icon arrow"></span>
                                </span>
                                <span class="button-text">Chi Tiết</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-6 d-flex justify-content-center align-items-center">
                    <a class="learn-more" href="{{ Route('indexHome') }}">
                        <span class="circle" aria-hidden="true">
                            <span class="icon arrow"></span>
                        </span>
                        <span class="button-text">Trang Chủ</span>
                    </a>
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
                    data : {},
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataDashboard') }}')
                            .then((res) => {
                                this.data = res.data.data;
                            });
                    }
                },
            });
        })
    </script>
@endsection
