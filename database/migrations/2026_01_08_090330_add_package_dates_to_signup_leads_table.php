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
            $table->date('package_start_date')->nullable()->after('payment_response');
            $table->date('package_end_date')->nullable()->after('package_start_date');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('signup_leads', function (Blueprint $table) {
            $table->dropColumn(['package_start_date', 'package_end_date']);
        });
    }
};
