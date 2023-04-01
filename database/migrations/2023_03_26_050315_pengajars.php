<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pengajars extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengajars', function (Blueprint $table) {
            $table->string('nik');
            $table->string('nama');
            $table->string('alamat');
            $table->boolean('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('no_hp');
            $table->primary('nik');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengajars');
    }
}
