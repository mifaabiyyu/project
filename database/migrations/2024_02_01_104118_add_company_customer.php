<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyCustomer extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::table('customers', function (Blueprint $table) {
            $table->string('companies')->nullable();
            $table->dropColumn('company_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        
        Schema::table('customers', function (Blueprint $table) {
            $table->dropColumn('companies')->nullable();
            $table->string('company_id')->nullable();
        });
    }
}
