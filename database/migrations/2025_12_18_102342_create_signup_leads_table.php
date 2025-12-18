<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('signup_leads', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('email')->unique()->nullable();
            $table->string('phone_number')->nullable();
            $table->string('password')->nullable();
            $table->string('company_name')->nullable();
            $table->string('domain_name')->nullable();
            $table->string('role')->nullable();
            $table->string('website')->nullable();
            $table->string('usage_preference')->nullable();
            $table->string('industry')->nullable();
            $table->string('footfall')->nullable();
            $table->string('current_solution')->nullable();
            $table->integer('signup_step')->default(1);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('signup_leads');
    }
};
