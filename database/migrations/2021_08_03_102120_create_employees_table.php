<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmployeesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('father_name');
            $table->string('type');
            $table->string('material_status');
            $table->string('cell');
            $table->string('cnic');
            $table->string('monthly_income');
            $table->string('residential_address')->nullable();
            $table->string('caste');
            $table->string('cnic_expiry');
            $table->string('dob');
            $table->string('work_since');
            $table->string('residential_phone');
            $table->string('residential_since');
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
        Schema::dropIfExists('employees');
    }
}
