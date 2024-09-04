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
        Schema::create('survey_questions', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('nama_perusahaan');
            $table->string('deskripsi_perusahaan');
            $table->string('produk_layanan');
            $table->string('target_pasar');
            $table->string('keunggulan_kompetitif');
            $table->string('rencana_pengembangan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('survey_questions');
    }
};
