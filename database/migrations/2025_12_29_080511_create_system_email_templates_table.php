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
        Schema::create('system_email_templates', function (Blueprint $table) {
            $table->id();
            $table->string('key')->unique(); // e.g., 'email_verification', 'forgot_password', etc.
            $table->string('name'); // Display name
            $table->string('subject');
            $table->longText('content')->nullable();
            $table->text('description')->nullable(); // Description of when this email is sent
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_email_templates');
    }
};
