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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('role')->default(2); // 1 = admin, 2 = warga
            $table->foreignId('id_kota');
            $table->foreignId('id_kecamatan');
            $table->bigInteger('nik')->unique();
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('kota_kelahiran');
            $table->date('tanggal_lahir');
            $table->string('pekerjaan');
            $table->boolean('status_perkawinan')->default(false);
            $table->integer('pendapatan_perbulan');
            $table->string('nomer_telfon');
            $table->string('pendidikan_terakhir');
            $table->integer('tanggungan');
            $table->text('alamat_lengkap');
            $table->string('image')->nullable();
            $table->string('password');
            $table->boolean('status_approve')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
