<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_details', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_master_id');
            $table->string('row_no');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('status_id');
            $table->unsignedBigInteger('color_id');
            $table->unsignedBigInteger('warranty_id');
            $table->unsignedBigInteger('tax_id');
            $table->string('qty');
            $table->string('rate')->nullable();
            $table->string('discount_1')->nullable();
            $table->string('discount_2')->nullable();
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
        Schema::dropIfExists('purchase_details');
    }
}
