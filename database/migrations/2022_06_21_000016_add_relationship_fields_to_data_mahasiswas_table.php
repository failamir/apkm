<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToDataMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::table('data_mahasiswas', function (Blueprint $table) {
            $table->unsignedBigInteger('mata_kuliah_id')->nullable();
            $table->foreign('mata_kuliah_id', 'mata_kuliah_fk_6839335')->references('id')->on('mata_kuliahs');
        });
    }
}
