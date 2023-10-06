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
    <div id="app" class="row">
        <div class="col-xl-3 col-lg-4 shop-col-width-lg-4">
            <div class="shop__sidebar--widget widget__area d-none d-lg-block">
                <div class="single__widget widget__bg">
                    <h2 class="widget__title h3">Dietary Needs</h2>
                    <ul class="widget__form--check">
                        <li v-for='(v, k) in list_brands' class="widget__form--check__list">
                            <label class="widget__form--check__label" :for="'brand' + v.id">@{{ v.ten_thuong_hieu }} </label>
                            <input class="widget__form--check__input brand-checkbox" :id="'brand' + v.id" type="checkbox"
                                @click='handleCheckboxClick(v.id)'>
                            <span class="widget__form--checkmark"></span>
                        </li>

                    </ul>
                </div>
                <div class="single__widget widget__bg">
                    <h2 class="widget__title h3">Dietary Needs</h2>
                    <ul class="widget__form--check">
                        <li v-for='(v, k) in list_classification' class="widget__form--check__list">
                            <label class="widget__form--check__label" :for="'classification' + v.id">@{{ v.so_cho_ngoi }}
                                chỗ</label>
                            <input class="widget__form--check__input " :id="'classification' + v.id" type="checkbox"
                                @click='handleCheckboxClick_loai_xe(v.id)'>
                            <span class="widget__form--checkmark"></span>
                        </li>

                    </ul>
                </div>
                <div class="single__widget price__filter widget__bg">
                    <h2 class="widget__title h3">Filter By Price</h2>
                    <div class="price__filter--form__inner mb-15 d-flex align-items-center">
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-GTE2">From</label>
                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                <span class="price__filter--currency">$</span>
                                <input v-model='filter_price.min' class="price__filter--input__field border-0"
                                    name="filter.v.price.gte" id="Filter-Price-GTE2" type="number" placeholder="0"
                                    min="0">
                            </div>
                        </div>
                        <div class="price__divider">
                            <span>-</span>
                        </div>
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-LTE2">To</label>
                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                <span class="price__filter--currency">$</span>
                                <input v-model='filter_price.max' class="price__filter--input__field border-0"
                                    name="filter.v.price.lte" id="Filter-Price-LTE2" type="number" min="0"
                                    placeholder="25000.00" max="25000.00">
                            </div>
                        </div>
                    </div>
                    <button class="primary__btn " @click='getSelectedIDs()'>Filter</button>
                </div>

            </div>
        </div>
        <div class="col-xl-9 col-lg-8 shop-col-width-lg-8">
            <div class="shop__right--sidebar">
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
                                <ul class="rating product__card--rating d-flex">
                                    <li v-for='i in list[k].tbc_sao' class="rating__list">
                                        <span class="rating__icon">
                                            <svg width="14" height="13" viewBox="0 0 14 13" fill="none"
                                                xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M6.08398 0.921875L4.56055 4.03906L1.11523 4.53125C0.505859 4.625 0.271484 5.375 0.716797 5.82031L3.17773 8.23438L2.5918 11.6328C2.49805 12.2422 3.1543 12.7109 3.69336 12.4297L6.76367 10.8125L9.81055 12.4297C10.3496 12.7109 11.0059 12.2422 10.9121 11.6328L10.3262 8.23438L12.7871 5.82031C13.2324 5.375 12.998 4.625 12.3887 4.53125L8.9668 4.03906L7.41992 0.921875C7.16211 0.382812 6.36523 0.359375 6.08398 0.921875Z"
                                                    fill="currentColor"></path>
                                            </svg>
                                        </span>
                                    </li>
                                    <li v-for='i in 5 - list[k].tbc_sao' class="rating__list">
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
                                    <a :href="`/detail/${v.slug_xe}`" class="product__card--btn primary__btn"
                                        data-open="modal1">
                                        Chi Tiết Xe
                                    </a>
                                </div>
                            </div>
                        </article>
                    </div>
                </div>
            </div>
            <div class="pagination__area">
                <nav class="pagination justify-content-center">
                    <ul class="pagination__wrapper d-flex align-items-center justify-content-center">
                        <li class="pagination__list">
                            <a @click='prePage()' class="pagination__item--arrow  link ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                    viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="48"
                                        d="M244 400L100 256l144-144M120 256h292">
                                    </path>
                                </svg>
                                <span class="visually-hidden">page left arrow</span>
                            </a>
                        </li>
                        <li>
                        </li>
                        <li style="cursor: pointer" v-for='(v, k) in 2' @click='changePage(k)' class="pagination__list">
                            <span
                                :class="{ 'pagination__item': true, 'pagination__item--current': k == currentPage }">@{{ k + 1 }}</span>
                        </li>

                        <li class="pagination__list">
                            <a @click='nextPage()' class="pagination__item--arrow  link ">
                                <svg xmlns="http://www.w3.org/2000/svg" width="22.51" height="20.443"
                                    viewBox="0 0 512 512">
                                    <path fill="none" stroke="currentColor" stroke-linecap="round"
                                        stroke-linejoin="round" stroke-width="48"
                                        d="M268 112l144 144-144 144M392 256H100"></path>
                                </svg>
                                <span class="visually-hidden">page right arrow</span>
                            </a>
                        </li>
                        <li>
                        </li>
                    </ul>
                </nav>
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
                    list_brands: [],
                    list_classification: [],
                    id_thuong_hieus: [],
                    id_loai_xes: [],
                    filter_price: {},
                    link: {},
                    currentPage: 0,
                },
                created() {
                    this.getData();
                    this.getMenu();
                    this.listGioHang();
                    this.loadMyCar();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataHomePageAll') }}')
                            .then((res) => {
                                console.log(res.data.data.data);
                                this.link = res.data.data;
                                this.list = res.data.data.data;
                                this.list_images = res.data.images;
                                console.log(res.data);
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
                    getMenu() {
                        axios
                            .get('{{ Route('dataMenuAllProduct') }}')
                            .then((res) => {
                                this.list_brands = res.data.list;
                                this.list_classification = res.data.classification;
                            });
                    },
                    handleCheckboxClick(id) {
                        if (this.id_thuong_hieus.includes(id)) {
                            // Nếu ID đã tồn tại trong mảng, loại bỏ nó
                            const index = this.id_thuong_hieus.indexOf(id);
                            this.id_thuong_hieus.splice(index, 1);
                        } else {
                            // Nếu ID chưa tồn tại, thêm nó vào mảng
                            this.id_thuong_hieus.push(id);
                        }
                    },
                    handleCheckboxClick_loai_xe(id) {
                        if (this.id_loai_xes.includes(id)) {
                            // Nếu ID đã tồn tại trong mảng, loại bỏ nó
                            const index = this.id_loai_xes.indexOf(id);
                            this.id_loai_xes.splice(index, 1);
                        } else {
                            // Nếu ID chưa tồn tại, thêm nó vào mảng
                            this.id_loai_xes.push(id);
                        }
                    },
                    getSelectedIDs() {
                        var payload = {
                            id_brands: this.id_thuong_hieus,
                            id_classifications: this.id_loai_xes,
                            ...this.filter_price
                        }
                        axios
                            .post('{{ route('filterAllProduct') }}', payload)
                            .then((res) => {
                                this.list = res.data.data;
                                this.list_images = res.data.image;
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

                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'error');
                                });
                            });
                    },
                    nextPage() {
                        console.log(this.link.next_page_url);
                        axios
                            .get(this.link.next_page_url)
                            .then((res) => {
                                this.link = res.data.data;
                                this.list = res.data.data.data;
                                this.list_images = res.data.images;
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
                    prePage() {
                        axios
                            .get(this.link.prev_page_url)
                            .then((res) => {

                                this.link = res.data.data;
                                this.list = res.data.data.data;
                                this.list_images = res.data.images;
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
                    changePage(k) {
                        this.currentPage = k;
                        axios
                            .get("http://127.0.0.1:8000/data-all?2=" + (k + 1))
                            .then((res) => {
                                this.link = res.data.data;
                                this.list = res.data.data.data;
                                this.list_images = res.data.images;
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
                    listGioHang() {
                        axios
                            .get('{{ Route('dataGioHang') }}')
                            .then((res) => {
                                this.listCar = res.data.data
                                mycar1 = this.listCar.length;
                                mycar2 = this.listCar.length;
                                $("#mycar1").html(mycar1);
                                $("#mycar2").html(mycar2);
                                // console.log(this.list);
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
                            don_gia: this.data['don_gia'],
                        }
                        axios
                            .post('{{ Route('createGioHang') }}', payload)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    this.listGioHang();
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Lỗi');
                                });
                            });
                    }
                },
            });
        })
    </script>
@endsection
