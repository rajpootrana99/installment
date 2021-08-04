<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('item_id');
            $table->unsignedBigInteger('guaranter_id');
            $table->unsignedBigInteger('site_id');
            $table->unsignedBigInteger('sales_officer_id');
            $table->unsignedBigInteger('marketing_officer_id');
            $table->unsignedBigInteger('inquiry_officer_id');
            $table->unsignedBigInteger('recovery_officer_id');
            $table->string('process_id');
            $table->string('process_type');
            $table->string('process_fee');
            $table->string('registration_fee');
            $table->string('remarks');
            $table->string('total_purchase');
            $table->string('total_sales');
            $table->string('no_of_installment');
            $table->string('down_payment');
            $table->string('total_balance');
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
        Schema::dropIfExists('sales');
    }
}
