<?php
// database/seeders/ChungCuTableSeeder.php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ChungCuTableSeeder extends Seeder
{
    public function run()
    {
        
        // Tắt kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        // Xóa dữ liệu cũ theo đúng thứ tự: bảng con trước, bảng cha sau
        DB::table('can_ho')->truncate(); // Xóa dữ liệu bảng con trước
        DB::table('chung_cu')->truncate(); // Sau đó xóa dữ liệu bảng cha

        // Bật lại kiểm tra khóa ngoại
        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        // Thêm dữ liệu mẫu
        DB::table('chung_cu')->insert([
            [
                'ten_chung_cu' => 'Lumiere Riverside',
                'dia_chi' => 'Quận 2, TP. Hồ Chí Minh',
                'so_tang' => 30,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_chung_cu' => 'The Estella I',
                'dia_chi' => 'Quận 2, TP. Hồ Chí Minh',
                'so_tang' => 25,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_chung_cu' => 'Estella Heights',
                'dia_chi' => 'Quận 2, TP. Hồ Chí Minh',
                'so_tang' => 28,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'ten_chung_cu' => 'Masteri Thảo Điền',
                'dia_chi' => 'Quận 2, TP. Hồ Chí Minh',
                'so_tang' => 35,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}