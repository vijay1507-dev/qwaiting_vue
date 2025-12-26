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
        Schema::create('subscription_coupon_usage', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('coupon_id');
            $table->unsignedBigInteger('package_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('external_user_id')->nullable();
            $table->string('user_email');
            $table->string('user_name')->nullable();
            $table->decimal('discount_amount', 10, 2);
            $table->string('currency', 3)->default('USD');
            $table->timestamp('used_at');
            $table->timestamps();

            $table->index('coupon_id');
            $table->index(['external_user_id', 'coupon_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('subscription_coupon_usage');
    }
};
