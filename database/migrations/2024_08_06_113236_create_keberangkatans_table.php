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
        Schema::create('keberangkatan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user');
            $table->string('nama_perusahaan');
            $table->string('negara_tujuan');
            $table->date('tanggal_keberangkatan');
            $table->string('jenis_pekerjaan');
            $table->string('alamat_di_luar_negeri');
            $table->boolean('status_perkawinan')->default(false);
            $table->integer('biaya_pemberangkatan');
            $table->integer('masa_kontrak');
            $table->integer('gaji_perbulan');
            $table->string('asuransi');
            $table->boolean('status_approve')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keberangkatans');
    }
};
