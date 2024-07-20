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
            $table->id();
            $table->string('username')->nullable();  // Chỉ sử dụng cho admin
            $table->string('password')->nullable();  // Chỉ sử dụng cho admin
            $table->foreignId('role_id');
            $table->string('fullname');
            $table->string('lecturer_code')->nullable()->unique();  // Chỉ sử dụng cho giảng viên
            $table->string('email');
            $table->timestamp('email_verified_at')->nullable();
            $table->string('address')->nullable();
            $table->string('phone_number')->nullable();
            $table->rememberToken();
            $table->timestamps();
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