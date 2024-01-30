<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUserCompaniesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_companies', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('position')->nullable();
            $table->string('phone')->nullable();
            // $table->string('email')->nullable()->unique();
            // $table->timestamp('email_verified_at')->nullable()->nullable();
            $table->string('password')->nullable();
            $table->string('status')->nullable();
            $table->string('company')->nullable();
            $table->string('roles')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_companies');
    }
}
