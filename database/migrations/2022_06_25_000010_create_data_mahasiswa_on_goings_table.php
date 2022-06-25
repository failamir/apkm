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
            $table->integer('lulus')->nullable();
            $table->integer('tidak_lulus')->nullable();
            $table->integer('active')->nullable();
            $table->integer('observers')->nullable();
            $table->float('accuracy', 15, 2)->nullable();
            $table->float('recall_lulus', 15, 2)->nullable();
            $table->float('recall_tidak_lulus', 15, 2)->nullable();
            $table->float('precision_tidak_lulus', 15, 2)->nullable();
            $table->float('precision_lulus', 15, 2)->nullable();
            $table->integer('prediksi_tidak_lulus')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
