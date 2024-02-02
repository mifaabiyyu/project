<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCompanyUserField extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('user_companies', function (Blueprint $table) {
            $table->string('database')->nullable();
            $table->string('link')->nullable();
            $table->string('storage')->nullable();
            $table->string('hosting')->nullable();
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
            $table->dropColumn('database');
            $table->dropColumn('link');
            $table->dropColumn('storage');
            $table->dropColumn('hosting');
        });
    }
}
