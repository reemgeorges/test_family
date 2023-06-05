<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFamiliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('families', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('father_name');
            $table->string('phone');
            $table->integer('idnat');
            $table->unique('idnat');
            $table->unsignedBigInteger('place_id')->nullable;
            $table->foreign('place_id')->references('id')->on('places');
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
        Schema::dropIfExists('families');
    }
}
