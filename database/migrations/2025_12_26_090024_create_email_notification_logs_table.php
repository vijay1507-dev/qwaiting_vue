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
        Schema::create('email_notification_logs', function (Blueprint $table) {
            $table->id();
            $table->string('notification_type')->nullable()->comment('Type of notification (e.g., SignupLeadVerifyEmail, sequence_email, etc.)');
            $table->string('recipient_email')->index();
            $table->string('subject')->nullable();
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending')->index();
            $table->text('error_message')->nullable();
            $table->text('error_trace')->nullable();
            $table->string('mailer')->nullable()->comment('Mail driver used (smtp, log, etc.)');
            $table->json('metadata')->nullable()->comment('Additional metadata (CC, BCC, attachments count, etc.)');
            $table->timestamp('sent_at')->nullable();
            $table->timestamps();

            // Indexes for performance
            $table->index('created_at');
            $table->index(['status', 'created_at']);
            $table->index(['recipient_email', 'created_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('email_notification_logs');
    }
};
