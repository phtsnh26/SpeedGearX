@extends('page.customer.profileClient_master.index')
@section('content_profile')
    <div id="app">
        <h3 class="contact__form--title mb-30">Profile</h3>
        <form class="contact__form--inner">
            <div class="row">
                <div class="col-lg-12 col-md-12">
                    <div class="contact__form--list mb-20">
                        <label class="contact__form--label" for="input1">Họ và Tên <span
                                class="contact__form--label__star">*</span></label>
                        <input v-model="profile.ho_va_ten" class="contact__form--input" placeholder="Họ và tên"
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
                        <input v-model="profile.email" disabled class="contact__form--input" placeholder="Email"
                            type="email">
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
        </form>
    </div>
@endsection
@section('js_profile')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    profile: {},
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
                    }
                },
            });
        })
    </script>
@endsection
