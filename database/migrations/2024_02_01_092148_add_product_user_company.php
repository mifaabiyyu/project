<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddProductUserCompany extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_companies', function (Blueprint $table) {
            $table->string('product_code')->nullable();
        });

        Schema::table('quotation_details', function (Blueprint $table) {
            $table->integer('user')->nullable();
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
            $table->dropColumn('product_code');
        });

        Schema::table('quotation_details', function (Blueprint $table) {
            $table->dropColumn('user');
        });
    }
}
