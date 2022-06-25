<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataMahasiswaOnGoingsTable extends Migration
{
    public function up()
    {
        Schema::table('data_mahasiswa_on_goings', function (Blueprint $table) {
            $table->unsignedBigInteger('data_history_id')->nullable();
            $table->foreign('data_history_id', 'data_history_fk_6829417')->references('id')->on('data_mahasiswas');
            $table->unsignedBigInteger('mata_kuliah_id')->nullable();
            $table->foreign('mata_kuliah_id', 'mata_kuliah_fk_6839342')->references('id')->on('mata_kuliahs');
        });
    }
}
