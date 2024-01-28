<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('code')->nullable();
            $table->string('customer_code')->nullable();
            $table->string('customer_name')->nullable();
            $table->dateTime('date')->nullable();
            $table->dateTime('valid_until')->nullable();
            $table->string('valid')->nullable();
            $table->integer('status')->nullable();
            $table->string('created_by')->nullable();
            $table->decimal('total', 12, 2)->nullable();
            $table->longText('notes')->nullable();
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
        Schema::dropIfExists('quotations');
    }
}
