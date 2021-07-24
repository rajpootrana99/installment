<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContactsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->string('account_number');
            $table->string('contact_name');
            $table->string('company_name');
            $table->string('address');
            $table->string('city');
            $table->string('cell');
            $table->string('cnic');
            $table->string('phone');
            $table->string('second_phone')->nullable();
            $table->string('fax');
            $table->string('email');
            $table->string('web');
            $table->string('ntn');
            $table->string('credit_limit');
            $table->string('recovery_day');
            $table->string('image')->nullable();
            $table->string('cnic_front')->nullable();
            $table->string('cnic_back')->nullable();
            $table->string('document')->nullable();
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
        Schema::dropIfExists('contacts');
    }
}
