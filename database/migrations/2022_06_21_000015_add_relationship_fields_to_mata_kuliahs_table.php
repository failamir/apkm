<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToMataKuliahsTable extends Migration
{
    public function up()
    {
        Schema::table('mata_kuliahs', function (Blueprint $table) {
            $table->unsignedBigInteger('jurusan_id')->nullable();
            $table->foreign('jurusan_id', 'jurusan_fk_6788712')->references('id')->on('jurusans');
        });
    }
}
