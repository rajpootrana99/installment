<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGoodsMastersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('goods_masters', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_master_id');
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('broker_id');
            $table->unsignedBigInteger('goods_id');
            $table->string('bilty_no');
            $table->string('shipment_date');
            $table->string('delivery_date');
            $table->string('invoice_type')->default(0);
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
        Schema::dropIfExists('goods_masters');
    }
}
