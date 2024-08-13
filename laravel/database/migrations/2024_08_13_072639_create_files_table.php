<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('files', function (Blueprint $table) {
            $table->id(); // Tạo cột ID tự động tăng cho mỗi bản ghi, đây là khóa chính của bảng.
            $table->integer('type')->nullable(); // Loại file, có thể là 'image', 'video', 'document', v.v...; cho phép giá trị NULL.
            $table->string('path')->nullable(); // Đường dẫn tới file trong hệ thống lưu trữ; cho phép giá trị NULL.
            $table->string('related_model_id')->nullable(); // Lưu trữ thông tin về mối quan hệ giữa file và đối tượng liên quan (entity, business,...); cho phép giá trị NULL.
            $table->timestamps(); // Thời gian tạo và cập nhật bản ghi, tự động quản lý bởi Laravel.
            $table->softDeletes(); // Thời gian xóa mềm (không xóa hẳn bản ghi khỏi cơ sở dữ liệu, chỉ đánh dấu là đã xóa).
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('files');
    }
};
