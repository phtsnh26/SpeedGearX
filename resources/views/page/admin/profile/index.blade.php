@extends('share.admin.masterPage')
@section('content')
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Thông Tin Cá Nhân</h4>
        </div>
        <div class="card-body py-2 my-25">
            <div class="d-flex"><a href="#" class="me-25"><img
                        src="/vuexy/app-assets/images/portrait/small/avatar-s-11.jpg" id="account-upload-img"
                        alt="profile image" height="100" width="100" class="uploadedAvatar rounded me-50"></a>
            </div>
            <form novalidate="novalidate" class="validate-form mt-2 pt-50">
                <div class="row">
                    <div class="col-12 col-sm-6 mb-1"><label for="accountFirstName" class="form-label">Họ</label>
                        <input type="text" placeholder="Nhập vào họ của bạn" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 mb-1"><label for="accountLastName" class="form-label">Tên</label>
                        <input type="text" placeholder="Nhập vào tên của bạn" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 mb-1"><label for="accountEmail" class="form-label">Email</label>
                        <input type="email" placeholder="Nhập vào email" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 mb-1"><label class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control">
                    </div>
                    <div class="col-12 col-sm-6 mb-1"><label for="accountPhoneNumber" class="form-label">Số Điện
                            Thoại</label>
                        <input type="text" placeholder="Nhập vào số điện thoại" class="form-control account-number-mask">
                    </div>
                    <div class="col-12 col-sm-6 mb-1"><label for="accountAddress" class="form-label">Địa Chỉ</label>
                        <input type="text" placeholder="Nhập vào địa chỉ của bạn" class="form-control">
                    </div>
                    <div class="col-12 text-center">
                        <button type="button" class="btn btn-primary mt-1 me-1 waves-effect waves-float waves-light">Lưu
                            Thông Tin</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-header border-bottom">
            <h4 class="card-title">Đổi Mật Khẩu</h4>
        </div>
        <div class="card-body py-2 my-25">
            <div class="row">
                <div class="col">
                    <label> Nhập Mật Khẩu Mới:</label>
                    <div class="input-group input-group-merge form-password-toggle mt-1">
                        <input type="password" class="form-control" id="basic-default-password1"
                            placeholder="Nhập mật khẩu mới" aria-describedby="basic-default-password1">
                        <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg" width="14"
                                height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round" class="feather feather-eye">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg></span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <label class="mt-1"> Xác Nhận Lại Mật Khẩu Mới:</label>
                    <div class="input-group input-group-merge form-password-toggle mt-1">
                        <input type="password" class="form-control" id="basic-default-password1"
                            placeholder="Nhập lại mật khẩu mới" aria-describedby="basic-default-password1">
                        <span class="input-group-text cursor-pointer"><svg xmlns="http://www.w3.org/2000/svg"
                                width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
                                class="feather feather-eye">
                                <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                            </svg></span>
                    </div>
                </div>
            </div>
            <div class="row mt-2 text-center w-100">
                <div class="col">
                    <button class="btn btn-primary">Đổi Mật Khẩu</button>
                </div>
            </div>
        </div>
    </div>
@endsection
