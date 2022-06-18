<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataMahasiswaOnGoingsTable extends Migration
{
    public function up()
    {
        Schema::create('data_mahasiswa_on_goings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama')->nullable();
            $table->string('hasil_prediksi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
