<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('quotation_details', function (Blueprint $table) {
            $table->id();
            $table->string('quotation_code')->nullable();
            $table->string('product_code')->nullable();
            $table->string('product_name')->nullable();
            $table->decimal('qty', 12, 2)->nullable();
            $table->decimal('unit_price', 12, 2)->nullable();
            $table->decimal('total_price', 12, 2)->nullable();
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
        Schema::dropIfExists('quotation_details');
    }
}
