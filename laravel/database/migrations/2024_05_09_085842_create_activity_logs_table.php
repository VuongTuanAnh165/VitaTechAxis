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
        Schema::create('activity_logs', function (Blueprint $table) {
            $table->id();
            $table->integer('access_id')->nullable();
            $table->integer('access_type')->nullable();
            $table->string('ip_address', 120)->nullable();
            $table->string('platform', 100)->nullable();
            $table->string('browser', 100)->nullable();
            $table->string('device')->nullable();
            $table->string('country_code', 100)->nullable();
            $table->string('country_name', 100)->nullable();
            $table->string('region', 100)->nullable();
            $table->string('region_code', 100)->nullable();
            $table->string('region_name', 100)->nullable();
            $table->string('user_agent', 255)->nullable();
            $table->json('ip_info')->nullable();
            $table->timestamp('login_time');
            $table->timestamp('logout_time')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('activity_logs');
    }
};
