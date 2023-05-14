<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Perizinans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();
            $table->string('no_identitas')->nullable();;
            $table->date('tanggal_permohonan')->nullable();;
            $table->date('tanggal_perizinan')->nullable();;
            $table->string('keterangan')->nullable();;
            $table->string('status')->nullable();;
            $table->string('gambar')->nullable();;
            $table->string('lat')->nullable();
            $table->string('lng')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perizinans');
    }
}
