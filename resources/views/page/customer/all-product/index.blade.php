@extends('share.product.masterpage')
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
        <div class="row">
            <div v-for='(v, k) in list' class="col-lg-4 col-md-4 col-sm-6 col-6 custom-col mb-30 ">
                <article class="product__card" style="height: 372px;">
                    <div class="product__card--thumbnail">
                        <a class="product__card--thumbnail__link display-block" :href="`/detail/${v.slug_xe}`">
                            <img style="width: 100%; height: 150px;"
                                class=" product__card--thumbnail__img product__primary--img" :src="v.images[0]"
                                alt="product-img">
                            <img style="width: 100%; height: 150px;"
                                class="product__card--thumbnail__img product__secondary--img" :src="v.images[1]"
                                alt="product-img">
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
                            <a class="product__card--btn primary__btn" :href="`/detail/${v.slug_xe}`" data-open="modal1">
                                <i class="fa-solid fa-dollar-sign"></i>
                                Thuê Xe
                            </a>
                        </div>
                    </div>
                </article>
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
                    list: [],
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
                                this.list = res.data.data;
                                this.list_images = res.data.images;
                                console.log(this.list);
                                this.list.forEach(a => {
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
