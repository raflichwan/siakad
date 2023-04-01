<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class JadwalPelajarans extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->integer('kelas_id');
            $table->integer('mapel_id');
            $table->integer('no_identitas');
            $table->integer('jam');
            $table->integer('lama_jam');
            $table->string('hari');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_pelajarans');
    }
}
