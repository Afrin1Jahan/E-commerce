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
            $table->string('full_name',128);
            $table->string('email')->unique();
            $table->integer('otp')->unique()->nullable();
            $table->boolean('is_verified')->default(false);
            $table->dateTime('otp_expired_at')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password',96);
            $table->text('address')->nullable();
            $table->string('phone_number',16)->unique();
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
