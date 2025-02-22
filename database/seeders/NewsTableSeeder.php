<?php
// database/seeders/NewsTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;
use Illuminate\Support\Str;

class NewsTableSeeder extends Seeder
{
    public function run()
    {
        // Xóa dữ liệu cũ
        DB::table('news')->truncate(); // Xóa dữ liệu bảng

        $faker = Faker::create();

        // Tạo dữ liệu mẫu cho 50 tin tức
        $newsData = [];
        for ($i = 1; $i <= 10; $i++) {
            $newsData[] = [
                'tieude' => 'Bài viết ' . $faker->word(),
                'noidung' => $faker->sentence(),
                'luotxem' => $faker->numberBetween(2, 5),
                'slug' => Str::slug('Bài viết ' . $faker->word() . $faker->numberBetween(2, 5) ), // Tạo slug hợp lệ từ tiêu đề
                'hinhanh' => 'images/news/images1.jpg', // Lưu đường dẫn hình ảnh
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        // Chèn dữ liệu vào bảng 'news'
        DB::table('news')->insert($newsData);
    }
}
