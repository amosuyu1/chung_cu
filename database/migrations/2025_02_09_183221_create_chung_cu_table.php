<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateChungCuTable extends Migration
{
    public function up()
    {
        Schema::create('chung_cu', function (Blueprint $table) {
            $table->id(); // Khóa chính tự động tăng
            $table->string('ten_chung_cu'); // Tên chung cư
            $table->string('dia_chi'); // Địa chỉ chung cư
            $table->integer('so_tang'); // Số tầng
            $table->timestamps(); // Thêm created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('chung_cu');
    }
}
