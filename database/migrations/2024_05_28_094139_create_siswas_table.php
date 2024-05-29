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
        Schema::create('siswas', function (Blueprint $table) {
            $table->string('nisn',10)->uniqid()->primary();
            $table->string('nik',16)->uniqid()->primary();
            $table->integer('user_id')->foreignId('id')->constrained('users');
            $table->enum('jk',['Laki-laki','Perempuan']);
            $table->string('alamat');
            $table->string('kab');
            $table->string('prov');
            $table->string('tempat_lahir');
            $table->date('tgl_lahir');
            $table->string('asal_sekolah');
            $table->string('npsn_sekolah_asal');
            $table->string('thn_lulus');
            $table->string('no_telp');
            $table->enum('agama',['Islam','Kristen','Katolik','Hindu','Budha','Konghucu']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('siswas');
    }
};
