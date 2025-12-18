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
        Schema::create('email_notification_templates', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sequence_id');
            $table->index('sequence_id');
            $table->integer('sequence_number');
            $table->integer('timing_value');
            $table->enum('timing_unit', ['minutes', 'hours', 'days', 'weeks']);
            $table->string('subject');
            $table->enum('type', ['welcome', 'feature_highlight', 'social_proof', 'trial_reminder', 'sales_outreach', 'offer'])->default('welcome');
            $table->longText('content')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_notification_templates');
    }
};
