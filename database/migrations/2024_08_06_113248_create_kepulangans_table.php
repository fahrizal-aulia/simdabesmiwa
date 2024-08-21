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
        Schema::create('kepulangan', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_user')->constrained('users');
            $table->foreignId('id_keberangkatan');
            $table->date('tanggal_kepulangan');
            $table->boolean('status_perkawinan')->default(false);
            $table->text('alasan_kepulangan');
            $table->string('alamat_kepulangan');
            $table->string('pekerjaan')->nullable();
            $table->date('jadwal_kembali')->nullable();
            $table->string('no_hp')->nullable();
            $table->boolean('status_approve')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kepulangans');
    }
};
