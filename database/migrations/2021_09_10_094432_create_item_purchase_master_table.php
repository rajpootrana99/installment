<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemPurchaseMasterTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('item_purchase_master', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_master_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('tax_id');
            $table->string('qty');
            $table->string('rate')->nullable();
            $table->string('gross_total')->nullable();
            $table->string('discount_1')->nullable();
            $table->string('discount_2')->nullable();
            $table->string('total')->nullable();

            $table->foreign('purchase_master_id')->references('id')->on('purchase_masters');
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
        Schema::dropIfExists('item_purchase_master');
    }
}
