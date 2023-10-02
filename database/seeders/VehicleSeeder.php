<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VehicleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('vehicles')->delete();
        DB::table('vehicles')->truncate();
        DB::table('vehicles')->insert([
            [
                'ten_xe' => 'Ferrari 488 GTB',
                'slug_xe' => 'ferrari-488-gtb',
                'mo_ta_ngan' => 'Một siêu xe thể thao với động cơ V8 tăng áp kép và kiểu dáng thể thao',
                'mo_ta_chi_tiet' => 'Một siêu xe thể thao hàng đầu của Ferrari được giới thiệu lần đầu vào năm 2015 để thay thế cho mẫu Ferrari 458 Italia',
                'gia_theo_ngay' => 1165413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 4, // ID của Ferrari trong bảng thương hiệu
                'id_loai_xe' => 1,   // ID của loại xe tương ứng
            ],
            [
                'ten_xe' => 'Ferrari 812 Superfast',
                'slug_xe' => 'ferrari-812-superfast',
                'mo_ta_ngan' => 'Mẫu siêu xe hiệu suất cao với động cơ V12 mạnh mẽ',
                'mo_ta_chi_tiet' => 'Ferrari 812 Superfast là một mẫu siêu xe hiệu suất cao của Ferrari với động cơ V12 mạnh mẽ. Với công suất cực đại hơn 800 mã lực, nó có tốc độ cao và kiểu dáng thể thao đẹp mắt.',
                'gia_theo_ngay' => 2565413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 4, // ID của Ferrari trong bảng thương hiệu
                'id_loai_xe' => 1,   // ID của loại xe tương ứng
            ],
            [
                'ten_xe' => 'Ferrari Portofino',
                'slug_xe' => 'ferrari-portofino',
                'mo_ta_ngan' => 'Mẫu siêu xe thể thao đa dụng của Ferrari',
                'mo_ta_chi_tiet' => 'Ferrari Portofino là một mẫu siêu xe thể thao đa dụng của Ferrari, được thiết kế để cung cấp cảm giác lái tốt trên đường và đầy thú vị trên đường đua.',
                'gia_theo_ngay' => 2345413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 4, // ID của Ferrari trong bảng thương hiệu
                'id_loai_xe' => 1,   // ID của loại xe tương ứng
            ],
            [
                'ten_xe' => 'Lamborghini Aventador',
                'slug_xe' => 'lamborghini-aventador',
                'mo_ta_ngan' => 'Mẫu siêu xe Lamborghini với động cơ V12 mạnh mẽ',
                'mo_ta_chi_tiet' => 'Lamborghini Aventador là một trong những siêu xe nổi tiếng của Lamborghini với động cơ V12 mạnh mẽ tạo ra công suất cực đại hơn 700 mã lực. Nó có kiểu dáng độc đáo và tốc độ cao.',
                'gia_theo_ngay' => 3155413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 5, // ID của Lamborghini trong bảng thương hiệu
                'id_loai_xe' => 1,   // ID của loại xe tương ứng
            ],
            [
                'ten_xe' => 'Lamborghini Huracan',
                'slug_xe' => 'lamborghini-huracan',
                'mo_ta_ngan' => 'Mẫu siêu xe thể thao của Lamborghini',
                'mo_ta_chi_tiet' => 'Lamborghini Huracan là một mẫu siêu xe thể thao của Lamborghini với thiết kế thể thao và động cơ V10 mạnh mẽ. Nó thích hợp cho những người đam mê tốc độ và hiệu suất.',
                'gia_theo_ngay' => 4555413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 5, // ID của Lamborghini trong bảng thương hiệu
                'id_loai_xe' => 1,   // ID của loại xe tương ứng
            ],
            [
                'ten_xe' => 'Mercedes-Benz S-Class',
                'slug_xe' => 'mercedes-benz-s-class',
                'mo_ta_ngan' => 'Mẫu xe sang trọng và tiện nghi của Mercedes-Benz',
                'mo_ta_chi_tiet' => 'Mercedes-Benz S-Class là một mẫu xe sang trọng và tiện nghi, được biết đến với nhiều tính năng cao cấp như nội thất sang trọng, hệ thống giải trí tiên tiến và động cơ mạnh mẽ.',
                'gia_theo_ngay' => 1055413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 3, // ID của Mercedes trong bảng thương hiệu
                'id_loai_xe' => 3,   // ID của loại xe tương ứng
            ],
            [
                'ten_xe' => 'Mercedes-Benz C-Class',
                'slug_xe' => 'mercedes-benz-c-class',
                'mo_ta_ngan' => 'Mẫu sedan thể thao của Mercedes-Benz',
                'mo_ta_chi_tiet' => 'Mercedes-Benz C-Class là một mẫu sedan thể thao của Mercedes-Benz với thiết kế tinh tế và động cơ hiệu suất cao. Nó là sự kết hợp hoàn hảo giữa thể thao và đẳng cấp.',
                'gia_theo_ngay' => 1025413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 3, // ID của Mercedes trong bảng thương hiệu
                'id_loai_xe' => 3,   // ID của loại xe tương ứng
            ],
            [
                'ten_xe' => 'BMW M5',
                'slug_xe' => 'bmw-m5',
                'mo_ta_ngan' => 'Mẫu sedan thể thao của BMW',
                'mo_ta_chi_tiet' => 'BMW M5 là một mẫu sedan thể thao cao cấp của BMW, nổi tiếng với động cơ mạnh mẽ và khả năng lái tốt. Nó kết hợp giữa sự sang trọng và hiệu suất.',
                'gia_theo_ngay' => 2155413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 2, // ID của BMW trong bảng thương hiệu
                'id_loai_xe' => 3,   // ID của loại xe tương ứng
            ],
            [
                'ten_xe' => 'BMW X5',
                'slug_xe' => 'bmw-x5',
                'mo_ta_ngan' => 'Mẫu SUV sang trọng của BMW',
                'mo_ta_chi_tiet' => 'BMW X5 là một mẫu SUV sang trọng của BMW, với nội thất rộng rãi và khả năng vận hành tốt trên nhiều loại địa hình. Đây là một sự kết hợp hoàn hảo giữa thể thao và tiện ích.',
                'gia_theo_ngay' => 2555413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 2, // ID của BMW trong bảng thương hiệu
                'id_loai_xe' => 2,   // ID của loại xe tương ứng (loại SUV)
            ],
            [
                'ten_xe' => 'Rolls-Royce Cullinan',
                'slug_xe' => 'rolls-royce-cullinan',
                'mo_ta_ngan' => 'Mẫu SUV siêu sang của Rolls-Royce',
                'mo_ta_chi_tiet' => 'Rolls-Royce Cullinan là một mẫu SUV siêu sang của Rolls-Royce, được thiết kế để cung cấp sự sang trọng và tiện nghi tối đa. Với nội thất rộng rãi và 7 chỗ ngồi, nó là sự lựa chọn hoàn hảo cho gia đình lớn.',
                'gia_theo_ngay' => 2555413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 1, // ID của Rolls-Royce trong bảng thương hiệu
                'id_loai_xe' => 2,   // ID của loại xe tương ứng (loại SUV 7 chỗ)
            ],
            [
                'ten_xe' => 'Rolls-Royce Phantom',
                'slug_xe' => 'rolls-royce-phantom',
                'mo_ta_ngan' => 'Mẫu sedan siêu sang của Rolls-Royce',
                'mo_ta_chi_tiet' => 'Rolls-Royce Phantom là một mẫu sedan siêu sang của Rolls-Royce, được biết đến với nội thất tinh tế và động cơ mạnh mẽ. Nó có 7 chỗ ngồi để phục vụ các hành khách đẳng cấp.',
                'gia_theo_ngay' => 3355413,
                'don_gia' => 120,
                'so_luong' => 1,
                'tinh_trang' => 1,
                'id_thuong_hieu' => 1, // ID của Rolls-Royce trong bảng thương hiệu
                'id_loai_xe' => 2,   // ID của loại xe tương ứng (loại sedan)
            ],
        ]);
    }
}
