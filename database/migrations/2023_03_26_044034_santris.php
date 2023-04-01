<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Santris extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('santris', function (Blueprint $table) {
            $table->string('nis');
            $table->primary('nis');
            $table->string('nama');
            $table->string('alamat');
            $table->boolean('jenis_kelamin');
            $table->date('tanggal_lahir');
            $table->string('kelas');
            $table->string('no_hp');
        });

        Schema::create('santripengajars', function (Blueprint $table) {
            $table->string('no_identitas')->nullable();
            $table->string('nama')->nullable();
            $table->string('alamat')->nullable();
            $table->string('jenis_kelamin', 1)->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('kelas')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('type')->nullable();
            $table->primary('no_identitas');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('santris');
    }
}
