<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Nilais extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->integer('no_identitas')->nullable();
            $table->integer('mapel_id')->nullable();
            $table->string('periode')->nullable();
            $table->string('keterangan')->nullable();
            $table->double('kitab', 16, 2)->nullable();
            $table->double('tulis', 16, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nilais');
    }
}
