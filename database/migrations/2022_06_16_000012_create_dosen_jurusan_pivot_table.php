<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosenJurusanPivotTable extends Migration
{
    public function up()
    {
        Schema::create('dosen_jurusan', function (Blueprint $table) {
            $table->unsignedBigInteger('dosen_id');
            $table->foreign('dosen_id', 'dosen_id_fk_6788624')->references('id')->on('dosens')->onDelete('cascade');
            $table->unsignedBigInteger('jurusan_id');
            $table->foreign('jurusan_id', 'jurusan_id_fk_6788624')->references('id')->on('jurusans')->onDelete('cascade');
        });
    }
}
