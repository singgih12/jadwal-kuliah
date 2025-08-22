<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMataKuliahsTable extends Migration
{
    public function up()
{
    Schema::create('mata_kuliahs', function (Blueprint $table) {
        $table->id();
        
        $table->string('kode')->unique();

        $table->timestamps();
    });
}

    public function down()
    {
        Schema::dropIfExists('mata_kuliahs');
    }
}
