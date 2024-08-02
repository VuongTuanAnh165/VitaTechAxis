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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Id duy nhất của người dùng
            $table->string('name')->nullable(); // Tên của người dùng
            $table->string('email')->nullable(); // Email của người dùng
            $table->timestamp('email_verified_at')->nullable(); // Thời điểm xác minh email
            $table->string('password')->nullable(); // Mật khẩu của người dùng
            $table->string('phone')->nullable(); // Số điện thoại của người dùng
            $table->integer('image')->nullable(); // Hình đại diện của người dùng
            $table->integer('cover_image')->nullable(); // Hình ảnh bìa
            $table->longText('bio')->nullable(); // Mô tả ngắn về người dùng
            $table->string('website')->nullable(); // Địa chỉ website cá nhân
            $table->integer('role',)->nullable(); //quyền người dùng
            $table->integer('gender')->nullable(); // Giới tính
            $table->date('birthday')->nullable(); // Ngày sinh
            $table->string('facebook')->nullable(); // Liên kết Facebook
            $table->string('twitter')->nullable(); // Liên kết Twitter
            $table->string('instagram')->nullable(); // Liên kết Instagram
            $table->string('linkedin')->nullable(); // Liên kết LinkedIn
            $table->string('github')->nullable(); // Liên kết GitHub
            $table->string('facebook_id',60)->nullable(); // Liên kết đăng nhập qua facebook_id
            $table->string('google_id',60)->nullable(); // Liên kết đăng nhập qua google_id
            $table->string('zalo_id',60)->nullable(); // Liên kết đăng nhập qua zalo_id
            $table->string('apple_id',60)->nullable(); // Liên kết đăng nhập qua apple_id
            $table->string('timezone')->nullable(); // Múi giờ
            $table->string('language')->nullable(); // Ngôn ngữ
            $table->string('currency')->nullable(); // Đơn vị tiền tệ
            $table->string('status')->default(1); // Trạng thái
            $table->timestamp('blocked_at')->nullable(); // Thời điểm bị khóa
            $table->text('block_reason')->nullable(); // Lý do bị khóa
            $table->rememberToken(); // Token ghi nhớ đăng nhập
            $table->timestamps(); // Thời điểm tạo và cập nhật người dùng
            $table->softDeletes(); // Dấu xóa mềm cho người dùng
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
