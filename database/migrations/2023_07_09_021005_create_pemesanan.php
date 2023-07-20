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
        Schema::create('pemesanan', function (Blueprint $table) {
            $table->id();
            $table->char('kode_pemesanan');
            $table->date('tgl_pesan');
            $table->string('tempat');
            $table->unsignedBigInteger('id_penumpang');
            $table->foreign('id_penumpang')->references('id')->on('penumpang')->onDelete('cascade')->onUpdate('cascade');
            $table->char('kode_kursi');
            $table->unsignedBigInteger('id_rute');
            $table->foreign('id_rute')->references('id')->on('rute')->onDelete('cascade')->onUpdate('cascade');
            $table->string('tujuan');
            $table->date('tgl_berangkat');
            $table->time('jam_cekin');
            $table->time('jam_berangkat');
            $table->integer('total_bayar');
            $table->unsignedBigInteger('id_petugas');
            $table->foreign('id_petugas')->references('id')->on('petugas')->onDelete('cascade')->onUpdate('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pemesanan');
    }
};
