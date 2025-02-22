<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDuAnTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('du_an', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('ten_du_an'); // Tên căn hộ
            $table->text('mo_ta')->nullable(); // Mô tả
            $table->string('vi_tri'); // vị trí
            $table->string('chu_dau_tu'); // Chủ đầu tư
            $table->string('ban_giao'); // ngày bàn giao
            $table->text('anh_nen')->nullable(); // Thêm cột images kiểu JSON
            $table->json('images')->nullable(); // Thêm cột images kiểu JSON
            $table->timestamps(); // Thêm created_at và updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('du_an');
    }
}
