<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSaleFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sale_footers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_master_id')->index();
            $table->string('gross_value');
            $table->string('discount_total');
            $table->string('tax_total');
            $table->string('extra_discount')->nullable();
            $table->string('net_value');
            $table->string('remarks')->nullable();

            $table->foreign('sale_master_id')->references('id')->on('sale_masters');
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
        Schema::dropIfExists('sale_footers');
    }
}
