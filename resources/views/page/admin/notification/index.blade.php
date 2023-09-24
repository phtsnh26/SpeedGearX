@extends('share.admin.masterPage')
@section('content')
    <div id="app">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Thông Tin Liên Hệ </h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-nowrap align-middle text-primary">
                                        <th>Họ và Tên</th>
                                        <th>Email</th>
                                        <th>Số Điện Thoại</th>
                                        <th>Lời Nhắn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="align middle">
                                        <td>{{ $contact->ho_va_ten }}</td>
                                        <td>{{ $contact->email }}</td>
                                        <td>{{ $contact->so_dien_thoai }}</td>
                                        <td>
                                            <textarea class="form-control" cols="30" rows="10">{{ $contact->loi_nhan }}</textarea>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
{{-- @section('js')
    <script>
        $(document).ready(function() {
            new Vue({
                el: '#app',
                data: {
                    contact: {},
                },
                created() {
                    this.getData();
                },
                methods: {
                    getData() {
                        axios
                            .get('{{ Route('dataNotification') }}')
                            .then((res) => {
                                this.contact = res.data.data
                            });
                    }
                },
            });
        })
    </script>
@endsection --}}
