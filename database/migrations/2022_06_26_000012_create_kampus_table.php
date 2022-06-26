<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKampusTable extends Migration
{
    public function up()
    {
        Schema::create('kampus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_kampus')->nullable();
            $table->string('nama_kampus')->nullable();
            $table->string('alamat')->nullable();
            $table->string('deskripsi')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
