<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMahasiswasTable extends Migration
{
    public function up()
    {
        Schema::table('mahasiswas', function (Blueprint $table) {
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->foreign('jurusan_id', 'jurusan_fk_6788710')->references('id')->on('jurusans');
        });
    }
}
