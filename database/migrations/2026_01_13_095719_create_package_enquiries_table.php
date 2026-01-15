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
        Schema::create('package_enquiries', function (Blueprint $table) {
            $table->id();
            $table->string('full_name');
            $table->string('email');
            $table->string('mobile_number');
            $table->string('company_name');
            $table->string('current_package')->nullable();
            $table->string('customer_id')->nullable();
            $table->string('interested_package')->nullable();
            $table->date('expected_start_date')->nullable();
            $table->string('num_users_branches')->nullable();
            $table->string('billing_cycle')->nullable(); // Monthly, Yearly
            $table->json('features_required')->nullable();
            $table->text('custom_notes')->nullable();
            $table->string('contact_method')->nullable(); // Call, Email, WhatsApp
            $table->string('best_time_to_contact')->nullable();
            $table->boolean('consent')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('package_enquiries');
    }
};
