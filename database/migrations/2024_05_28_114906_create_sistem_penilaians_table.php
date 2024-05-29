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
        Schema::create('sistem_penilaians', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sistem_penilaian');
            $table->string('deskripsi');
            $table->string('nilai');
            $table->string('nisn');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sistem_penilaians');
    }
};
