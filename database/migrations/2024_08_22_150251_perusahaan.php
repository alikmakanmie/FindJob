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
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama');
            $table->string('alamat');
            $table->string('telepon');
            $table->string('email');
            $table->text('deskripsi');
            $table->text('deskripsi1')->nullable();
            $table->text('deskripsi2')->nullable();
            $table->text('deskripsi3')->nullable();
            $table->text('foto');
            $table->text('foto1')->nullable();
            $table->text('foto2')->nullable();
            $table->string('kategori_id')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('perusahaan');
    }
};
