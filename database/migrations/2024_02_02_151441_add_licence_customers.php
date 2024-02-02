<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLicenceCustomers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_companies', function (Blueprint $table) {
            $table->integer('status_licence')->nullable();
            $table->string('customer_licence')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('user_companies', function (Blueprint $table) {
            $table->dropColumn('status_licence');
            $table->dropColumn('customer_licence');
        });
    }
}
