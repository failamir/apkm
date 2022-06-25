<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJurusansTable extends Migration
{
    public function up()
    {
        Schema::create('jurusans', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_jurusan')->unique();
            $table->string('nama_jurusan')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
