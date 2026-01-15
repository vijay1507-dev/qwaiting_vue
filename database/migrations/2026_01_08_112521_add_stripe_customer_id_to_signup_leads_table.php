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
            $table->string('stripe_customer_id')->nullable()->after('payment_response');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('signup_leads', function (Blueprint $table) {
            $table->dropColumn('stripe_customer_id');
        });
    }
};
