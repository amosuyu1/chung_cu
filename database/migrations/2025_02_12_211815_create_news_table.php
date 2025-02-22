<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNewsTable extends Migration
{
    public function up()
    {
        Schema::create('news', function (Blueprint $table) {
            $table->id(); // Tạo cột id tự động tăng
            $table->string('tieude'); // Cột tiêu đề bài viết
            $table->text('noidung'); // Cột nội dung bài viết
            $table->integer('luotxem')->default(0); // Cột lượt xem, mặc định là 0
            $table->string('hinhanh')->nullable(); // Cột hình ảnh, có thể null
            $table->string('slug')->unique();
            $table->timestamps(); // Cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('news'); // Nếu rollback thì xóa bảng news
    }
}
