<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItemsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('items', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id');
            $table->unsignedBigInteger('sub_category_id');
            $table->unsignedBigInteger('manufacturer_id');
            $table->unsignedBigInteger('warehouse_id');
            $table->string('item_code');
            $table->string('name');
            $table->string('image')->nullable();
            $table->string('description');
            $table->string('remarks');
            $table->string('cost_price');
            $table->string('purchase_price');
            $table->string('company_price');
            $table->string('is_sale_price_defined');
            $table->string('sale_price_1');
            $table->string('sale_price_2');
            $table->string('sale_price_3');
            $table->string('sale_price_4');
            $table->string('sale_price_5');
            $table->string('status');
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
        Schema::dropIfExists('items');
    }
}
