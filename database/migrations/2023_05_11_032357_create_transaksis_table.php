<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('transaksis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('armada_id');
            $table->foreign('armada_id')->references('id')->on('armadas');
            $table->string('nama');
            $table->boolean('tipe_peminjaman');
            $table->integer('waktu');
            $table->date('tanggal');
            $table->integer('harga');
            $table->unsignedBigInteger('supir_id')->nullable();
            $table->foreign('supir_id')->references('id')->on('supirs');
            $table->boolean('status');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksis');
    }
};
