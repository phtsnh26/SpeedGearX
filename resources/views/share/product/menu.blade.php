    <div id="appa" class="col-xl-3 col-lg-4 shop-col-width-lg-4">
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
                        <input class="widget__form--check__input " :id="'classification' + v.id" type="checkbox" @click='handleCheckboxClick_loai_xe(v.id)'>
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
                                <input class="price__filter--input__field border-0" name="filter.v.price.gte"
                                    id="Filter-Price-GTE2" type="number" placeholder="0" min="0" max="250.00">
                            </div>
                        </div>
                        <div class="price__divider">
                            <span>-</span>
                        </div>
                        <div class="price__filter--group">
                            <label class="price__filter--label" for="Filter-Price-LTE2">To</label>
                            <div class="price__filter--input border-radius-5 d-flex align-items-center">
                                <span class="price__filter--currency">$</span>
                                <input class="price__filter--input__field border-0" name="filter.v.price.lte"
                                    id="Filter-Price-LTE2" type="number" min="0" placeholder="250.00"
                                    max="250.00">
                            </div>
                        </div>
                    </div>
                    <button class="primary__btn " @click='getSelectedIDs()'>Filter</button>
            </div>

        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#appa',
                data: {
                    list_brands: [],
                    list_classification: [],
                    id_thuong_hieus: [],
                    id_loai_xes: [],

                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
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
                    handleCheckboxClick_loai_xe(id){
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
                            id_brands : this.id_thuong_hieus,
                            id_classifications : this.id_loai_xes
                        }
                        axios
                            .post('{{ route('filterAllProduct') }}', payload)
                            .then((res) => {
                                this.data = res.data.data;
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0] , 'error');
                                });
                            });
                    }
                },
            });
        })
    </script>
