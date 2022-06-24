<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateListKampusTable extends Migration
{
    public function up()
    {
        Schema::create('list_kampus', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_kampus')->nullable();
            $table->string('nama_kampus')->nullable();
            $table->string('deskripsi')->nullable();
            $table->string('alamat')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
