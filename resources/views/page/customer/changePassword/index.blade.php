@extends('page.customer.profileClient_master.index')
@section('content_profile')
    <div id="app">
        <h3 class="contact__form--title mb-30">Đổi Mật Khẩu</h3>
        <form class="contact__form--inner">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form--list mb-20">
                        <label class="contact__form--label" for="input1">Mật Khẩu Cũ <span
                                class="contact__form--label__star">*</span></label>
                        <input v-model="changePass.mat_khau_cu" class="contact__form--input" placeholder="Mật khẩu cũ"
                            type="password">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form--list mb-20">
                        <label class="contact__form--label" for="input2">Mật Khẩu Mới <span
                                class="contact__form--label__star">*</span></label>
                        <input v-model="changePass.mat_khau_moi" class="contact__form--input" placeholder="Mật khẩu mới"
                            type="password">
                    </div>
                </div>
                <div class="col-lg-6 col-md-6">
                    <div class="contact__form--list mb-20">
                        <label class="contact__form--label" for="input3">Nhập Lại Mật Khẩu Mới
                            <span class="contact__form--label__star">*</span>
                        </label>
                        <input v-model="changePass.nhap_lai_mat_khau_moi" class="contact__form--input"
                            placeholder="Nhập lại mật khẩu mới" type="password">
                    </div>
                </div>
            </div>
            <button @click="doiPass()" class="contact__form--btn primary__btn" type="button">
                <span>
                    Đổi Khẩu
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
                    changePass: {},
                },
                created() {

                },
                methods: {
                    doiPass() {
                        axios
                            .post('{{ Route('updatePassword') }}', this.changePass)
                            .then((res) => {
                                if (res.data.status) {
                                    toastr.success(res.data.message, 'Thành Công');
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
