<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahsTable extends Migration
{
    public function up()
    {
        Schema::create('mata_kuliahs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_mtk')->nullable();
            $table->string('nama_mtk');
            $table->integer('jumlah_sks')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
