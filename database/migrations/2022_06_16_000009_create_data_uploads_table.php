<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDataUploadsTable extends Migration
{
    public function up()
    {
        Schema::create('data_uploads', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama_data')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}