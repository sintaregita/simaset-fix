<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('detail_peminjaman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_peminjaman');
            $table->unsignedBigInteger('id_aset');
            $table->integer('jumlah');
            $table->string('status');
            $table->foreign('id_peminjaman')->references('id')->on('peminjaman_aset')->onDelete('cascade');
            $table->foreign('id_aset')->references('id')->on('aset')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('detail_peminjaman');
    }
};
