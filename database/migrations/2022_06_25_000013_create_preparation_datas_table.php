<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreparationDatasTable extends Migration
{
    public function up()
    {
        Schema::create('preparation_datas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('data_hasil')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
