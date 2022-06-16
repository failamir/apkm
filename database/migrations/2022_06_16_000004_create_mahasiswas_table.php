<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::create('mahasiswas', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('id_mahasiswa')->unique();
            $table->string('nama');
            $table->integer('angkatan')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
