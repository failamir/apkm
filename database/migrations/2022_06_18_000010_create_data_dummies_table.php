<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataDummiesTable extends Migration
{
    public function up()
    {
        Schema::create('data_dummies', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('lulus')->nullable();
            $table->integer('tidak_lulus')->nullable();
            $table->integer('observers')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
