<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAreaRouteTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('area_route', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('area_id');
            $table->unsignedBigInteger('route_id');
            $table->foreign('area_id')->references('id')->on('areas');
            $table->foreign('route_id')->references('id')->on('routes');
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
        Schema::dropIfExists('area_route');
    }
}
