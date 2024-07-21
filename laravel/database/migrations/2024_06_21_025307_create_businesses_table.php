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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id(); // ID tự tăng
            $table->string('name')->nullable(false); // Tên doanh nghiệp
            $table->string('registration_number')->unique()->nullable(false); // Mã số đăng ký doanh nghiệp
            $table->string('tax_id')->unique()->nullable(false); // Mã số thuế
            $table->string('address')->nullable(false); // Địa chỉ doanh nghiệp
            $table->string('city')->nullable(false); // Thành phố
            $table->string('state')->nullable(); // Bang hoặc tỉnh
            $table->string('country')->nullable(false); // Quốc gia
            $table->string('postal_code')->nullable(); // Mã bưu điện
            $table->string('phone')->nullable(); // Số điện thoại liên hệ
            $table->string('fax')->nullable(); // Số fax
            $table->string('email')->unique()->nullable(); // Email liên hệ
            $table->string('website')->nullable(); // Trang web doanh nghiệp
            $table->date('established_date')->nullable(); // Ngày thành lập
            $table->string('industry')->nullable(); // Ngành công nghiệp
            $table->integer('number_of_employees')->nullable(); // Số lượng nhân viên
            $table->decimal('annual_revenue', 15, 2)->nullable(); // Doanh thu hàng năm
            $table->string('logo')->nullable(); // Logo doanh nghiệp (đường dẫn)
            $table->string('contact_person')->nullable(); // Người liên hệ
            $table->string('contact_position')->nullable(); // Chức vụ người liên hệ
            $table->string('contact_phone')->nullable(); // Số điện thoại người liên hệ
            $table->string('contact_email')->nullable(); // Email người liên hệ
            $table->text('description')->nullable(); // Mô tả doanh nghiệp
            $table->text('notes')->nullable(); // Ghi chú
            $table->string('business_type')->nullable(); // Loại hình doanh nghiệp (Công ty cổ phần, TNHH, ...)
            $table->string('registration_authority')->nullable(); // Cơ quan cấp phép
            $table->date('registration_date')->nullable(); // Ngày cấp phép
            $table->string('capital')->nullable(); // Vốn điều lệ
            $table->string('branches')->nullable(); // Chi nhánh
            $table->text('services_offered')->nullable(); // Các dịch vụ cung cấp
            $table->text('certifications')->nullable(); // Các chứng nhận
            $table->text('awards')->nullable(); // Các giải thưởng
            $table->string('map')->nullable(); // bản đồ
            $table->string('longitude')->nullable(); // kinh độ
            $table->string('latitude')->nullable(); // Vĩ độ
            $table->string('client_id')->nullable(); // Mã paypal client_id
            $table->string('secret')->nullable(); // Mã paypal secret
            $table->timestamps(); // Thời gian tạo và cập nhật bản ghi
            $table->softDeletes(); // Thời gian xóa mềm (không xóa hẳn bản ghi khỏi cơ sở dữ liệu)
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('businesses');
    }
};
