@extends('share.admin.masterPage')
@section('content')
    <div id='app'>
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h2 class="text-center">Danh Sách Đánh Giá</h2>
                            <table class="table table-bordered">
                                <thead>
                                    <tr class="text-center text-nowrap align-middle text-primary">
                                        <th>#</th>
                                        <th>Tên</th>
                                        <th>Email</th>
                                        <th>Đánh Giá</th>
                                        <th>Lời Nhắn</th>
                                        <th>Thời Gian</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-for="(v,k) in list" class="align middle ">
                                        <td>@{{ k + 1 }}</td>
                                        <td>@{{ v.ho_va_ten }}</td>
                                        <td>@{{ v.email }}</td>
                                        <td>
                                            @{{ v.so_sao }}
                                        </td>
                                        <td>
                                            @{{ v.danh_gia }}
                                        </td>
                                        <td>
                                            <input v-model='v.thoi_gian' type="dateTime" class="form-control">
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
@section('js')
    $(document).ready(function(){
    <script>
        new Vue({
            el: '#app',
            data: {
                list: [],
            },
            created() {
                this.getData();
            },
            methods: {
                getData() {
                    axios
                        .get('{{ Route('dataTestimonial') }}')
                        .then((res) => {
                            this.list = res.data.data
                            console.log(this.list);
                        });
                },
            },
        });
    </script>
    });
@endsection
