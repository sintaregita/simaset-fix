<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('peminjaman_aset', function (Blueprint $table) {
            $table->id();
            $table->string('kode_transaksi');
            $table->unsignedBigInteger('id_user')->nullable();
            $table->text('tujuan_pinjam');
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->timestamps();

            // Foreign key
            $table->foreign('id_user')->references('id')->on('users')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('peminjaman_aset');
    }
};

