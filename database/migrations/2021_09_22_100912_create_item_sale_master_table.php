<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemSaleMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_sale_master', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sale_master_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('tax_id')->nullable();
            $table->string('qty');
            $table->string('rate')->nullable();
            $table->string('gross_total')->nullable();
            $table->string('discount')->nullable();
            $table->string('total')->nullable();

            $table->foreign('sale_master_id')->references('id')->on('sale_masters');
            $table->foreign('item_id')->references('id')->on('items');
            $table->foreign('tax_id')->references('id')->on('taxes');
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
        Schema::dropIfExists('item_sale_master');
    }
}
