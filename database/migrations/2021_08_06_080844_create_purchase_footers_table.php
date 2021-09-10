<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchaseFootersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchase_footers', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('purchase_master_id')->index();
            $table->string('gross_value');
            $table->string('discount_1_total');
            $table->string('discount_2_total');
            $table->string('tax_total');
            $table->string('other_expenses')->nullable();
            $table->string('extra_discount')->nullable();
            $table->string('net_value');
            $table->string('remarks')->nullable();

            $table->foreign('purchase_master_id')->references('id')->on('purchase_masters');

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
        Schema::dropIfExists('purchase_footers');
    }
}
