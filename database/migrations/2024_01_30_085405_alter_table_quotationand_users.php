<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterTableQuotationandUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('company')->nullable();
        });

        Schema::table('quotations', function (Blueprint $table) {
            $table->date('active_start')->nullable();
            $table->date('active_end')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('company');
        });

        Schema::table('quotations', function (Blueprint $table) {
            $table->dropColumn('active_start');
            $table->dropColumn('active_end');
        });
    }
}
