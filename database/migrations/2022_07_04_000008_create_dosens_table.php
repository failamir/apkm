<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDosensTable extends Migration
{
    public function up()
    {
        Schema::create('dosens', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('id_dosen')->nullable();
            $table->string('nama_dosen');
            $table->string('title')->nullable();
            $table->string('email')->nullable();
            $table->string('no_hp')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
