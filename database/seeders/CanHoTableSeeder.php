<?php

// database/seeders/CanHoTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class CanHoTableSeeder extends Seeder
{
    public function run()
    {
        // Xóa dữ liệu cũ (nếu có)
        DB::table('can_ho')->truncate();

        // Khởi tạo Faker để tạo dữ liệu ngẫu nhiên
        $faker = Faker::create();

        // Tạo dữ liệu mẫu cho 50 căn hộ
        $canHoData = [];
        for ($i = 1; $i <= 50; $i++) {
            $canHoData[] = [
                'ten_can_ho' => 'Căn hộ ' . $faker->word(),
                'mo_ta' => $faker->sentence(),
                'slug' => $faker->sentence(),
                'slug' => Str::slug('Căn hộ ' . $faker->word() . $faker->numberBetween(1, 100) ), // Tạo slug hợp lệ từ tiêu đề
                'huong_nha' => $faker->randomElement(['Đông', 'Tây', 'Nam', 'Bắc']),
                'phap_ly' => $faker->randomElement(['Sổ đỏ/ Sổ hồng', 'Hợp đồng mua bán']),
                'so_phong' => $faker->numberBetween(2, 5),
                'phong_tam' => $faker->numberBetween(1, 3),
                'noi_that' => $faker->boolean(50), // 50% xác suất có nội thất
                'muc_dich' => $faker->randomElement([1, 2]), // 1: Để ở, 2: Cho thuê
                'dien_tich' => $faker->randomFloat(2, 50, 200), // Diện tích từ 50m² đến 200m²
                'chung_cu_id' => $faker->numberBetween(1, 4), // Liên kết với chung_cu_id (1 đến 4)
                'gia' => $faker->randomElement(['3Tỷ', '5Tỷ', '7Tỷ', '10Tỷ']),
                'images' => json_encode([
                    'images/canho/image1.jpg',
                    'images/canho/image2.jpg',
                    'images/canho/image3.jpg',
                ]),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Chèn dữ liệu vào bảng 'can_ho'
        DB::table('can_ho')->insert($canHoData);
    }
}
