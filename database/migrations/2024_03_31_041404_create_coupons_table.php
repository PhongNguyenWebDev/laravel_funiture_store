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
        Schema::create('coupons', function (Blueprint $table) {
            $table->id();
            $table->string('coupon_code')->unique();
            $table->string('coupon_name');
            $table->unsignedInteger('coupon_time');
            $table->integer('coupon_condition');
            $table->decimal('coupon_number',8,2);
            $table->dateTime('expires_at')->nullable(); // Ngày hết hạn của coupon, có thể null nếu không có ngày hết hạn cụ thể
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('coupons');
    }
};
