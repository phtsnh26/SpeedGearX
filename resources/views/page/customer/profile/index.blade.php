@extends('page.customer.profileClient_master.index')
@section('content_profile')
    <div id="app">
        <h3 class="contact__form--title mb-30">Profile</h3>
        <div class="row">
            <div class="col-lg-6 col-md-6 ">
                <div class="row d-flex align-items-center">
                    <div class="col-4">
                        <img v-if='profile.anh_dai_dien == null' @click="addImage" type="button"
                            src="https://i.pinimg.com/236x/55/3e/97/553e979fb595d33403941cace9f5ba62.jpg"
                            alt="" style="height: 100px; width: 100px;">
                        <img v-else @click="addImage" type="button" :src="profile.anh_dai_dien" alt=""
                            style="height: 100px; width: 100px;">
                    </div>
                    <div class="col-8">
                        <input hidden style="margin-top: 20px " id="abccccccccc" v-model="profile.anh_dai_dien"
                            class="contact__form--input" placeholder="Nhập link hình ảnh" type="text">
                    </div>
                </div>

            </div>

            <div class="col-lg-6 col-md-6">
                <div class="contact__form--list mb-20">
                    <label class="contact__form--label" for="input1">Họ và Tên <span
                            class="contact__form--label__star">*</span></label>
                    <input id="input1" v-model="profile.ho_va_ten" class="contact__form--input" placeholder="Họ và tên"
                        type="text">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form--list mb-20">
                    <label class="contact__form--label" for="input3">Số Điện Thoại <span
                            class="contact__form--label__star">*</span></label>
                    <input v-model="profile.so_dien_thoai" class="contact__form--input" placeholder="Số điện thoại"
                        type="number">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form--list mb-20">
                    <label class="contact__form--label" for="input4">Email <span
                            class="contact__form--label__star">*</span></label>
                    <input v-model="profile.email" disabled class="contact__form--input" placeholder="Email" type="email">
                </div>
            </div>
            <div class="col-lg-12 col-md-12">
                <div class="contact__form--list mb-20">
                    <label class="contact__form--label" for="input4">Địa Chỉ <span
                            class="contact__form--label__star">*</span></label>
                    <input v-model="profile.dia_chi" class="contact__form--input" placeholder="Địa chỉ" type="text">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form--list mb-20">
                    <label class="contact__form--label" for="input4">Ngày Sinh <span
                            class="contact__form--label__star">*</span></label>
                    <input v-model="profile.ngay_sinh" class="contact__form--input" placeholder="Ngày tháng năm sinh"
                        type="date">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form--list mb-20">
                    <label class="contact__form--label" for="input4">Giới Tính
                        <span class="contact__form--label__star">*</span>
                    </label>
                    <input v-model="profile.gioi_tinh" class="contact__form--input" placeholder="Căn cước công dân"
                        type="text">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form--list mb-20">
                    <label class="contact__form--label" for="input4">Căn Cước Công Dân
                        <span class="contact__form--label__star">*</span>
                    </label>
                    <input v-model="profile.cccd" class="contact__form--input" placeholder="Căn cước công dân"
                        type="number">
                </div>
            </div>
            <div class="col-lg-6 col-md-6">
                <div class="contact__form--list mb-20">
                    <label class="contact__form--label" for="input4">Bằng Lái Xe
                        <span class="contact__form--label__star">*</span>
                    </label>
                    <input v-model="profile.bang_lai_xe" class="contact__form--input" placeholder="Bằng lái xe"
                        type="text">
                </div>
            </div>
        </div>


        <button @click="capNhat()" class="contact__form--btn primary__btn" type="button">
            <span>
                Cập Nhật Thông Tin
            </span>
        </button>


    </div>
@endsection
@section('js_profile')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    profile: {},
                    check: 0,
                },
                created() {
                    this.getProfile();
                },
                methods: {
                    getProfile() {
                        axios
                            .get('{{ Route('dataProfile') }}')
                            .then((res) => {
                                this.profile = res.data.data
                            });
                    },
                    capNhat() {
                        axios
                            .post('{{ Route('updateProfile') }}', this.profile)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
                                    console.log(this.profile);
                                } else {
                                    toastr.error(res.data.message, 'Lỗi');
                                }
                            })
                            .catch((res) => {
                                $.each(res.response.data.errors, function(k, v) {
                                    toastr.error(v[0], 'Error');
                                });
                            });
                    },
                    addImage() {
                        if (this.check % 2 != 0) {
                            $('#abccccccccc').attr('hidden', true);
                            this.check++;
                        } else {
                            $('#abccccccccc').attr('hidden', false);
                            this.check++;
                        }
                    },

                },
            });
        })
    </script>
@endsection
