<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // Update existing users with 'Joined' status to 'Active'
        DB::table('users')
            ->where('status', 'Joined')
            ->orWhereNull('status')
            ->update(['status' => 'Active']);

        // Change the default value for the status column
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default('Active')->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Revert to 'Joined' as default
        Schema::table('users', function (Blueprint $table) {
            $table->string('status')->default('Joined')->change();
        });
    }
};
