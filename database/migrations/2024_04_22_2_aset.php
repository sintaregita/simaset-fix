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
        Schema::create('aset', function (Blueprint $table) {
            $table->id();
            $table->string('kode_aset');
            $table->string('nama_aset');
            $table->string('image');
            $table->string('kondisi');
            $table->integer('jumlah');
            $table->unsignedBigInteger('lokasi_id')->nullable();
            $table->unsignedBigInteger('kategori_id')->nullable();
            $table->string('ketersedian');

            // Define foreign key constraints
            $table->foreign('lokasi_id')->references('id')->on('lokasi_aset')->constrained()
            ->onDelete('cascade');
            $table->foreign('kategori_id')->references('id')->on('kategori_aset')->constrained()
            ->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('aset');
    }
};
