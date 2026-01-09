<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('signup_leads', function (Blueprint $table) {
            $table->boolean('is_paid')->default(false)->after('package_id');
            $table->longText('payment_response')->nullable()->after('is_paid');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('signup_leads', function (Blueprint $table) {
            $table->dropColumn(['is_paid', 'payment_response']);
        });
    }
};
