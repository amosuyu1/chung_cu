<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCanHoTable extends Migration
{
    public function up()
    {
        Schema::create('can_ho', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('ten_can_ho'); // Tên căn hộ
            $table->string('slug')->unique();; // slug
            $table->text('mo_ta')->nullable(); // Mô tả
            $table->string('Huong_nha'); // Mô tả
            $table->string('phap_ly'); 
            $table->integer('so_phong'); // Số phòng
            $table->integer('phong_tam'); // Phòng tắm
            $table->integer('noi_that'); // Tình hình nội thất
            $table->integer('muc_dich'); // Mục đích sử dụng
            $table->integer('trang_thai')->default(0); // Trạng thái 
            $table->integer('hot')->default(0); // hot 
            $table->decimal('dien_tich', 8, 2); // Diện tích (ví dụ: 100.50 m²)
            $table->unsignedBigInteger('chung_cu_id'); // Khóa ngoại liên kết với bảng chung_cu
            $table->string('gia')->nullable(); ; // Giá bán
            $table->string('gia_thue')->nullable(); // Giá thuê
            $table->json('images')->nullable(); // Thêm cột images kiểu JSON
            $table->timestamps(); // Thêm created_at và updated_at
            
            // Tạo khóa ngoại
            $table->foreign('chung_cu_id')->references('id')->on('chung_cu')->onDelete('cascade');
            // ten_can_ho,so_phong,phong_tam,noi_that,muc_dich,trang_thai,dien_tich,gia,gia_thue,images
        });
    }

    public function down()
    {
        Schema::dropIfExists('can_ho');
    }
}
