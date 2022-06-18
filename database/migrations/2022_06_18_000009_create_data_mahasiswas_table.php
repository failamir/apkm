<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('data_mahasiswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->integer('batas_nilai')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
