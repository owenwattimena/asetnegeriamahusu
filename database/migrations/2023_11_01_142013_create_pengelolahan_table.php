<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pengelolahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_aset');
            $table->foreign('id_aset')->references('id')->on('aset');
            $table->unsignedBigInteger('id_pengelolah');
            $table->foreign('id_pengelolah')->references('id')->on('pengelolah');
            $table->date('tanggal_mulai_kelolah');
            $table->date('tanggal_selesai_kelolah');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pengelolahan');
    }
};
