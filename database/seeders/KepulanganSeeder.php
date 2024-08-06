<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KepulanganSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kepulangan')->insert([
            [
                'id_user' => 1, // Ganti dengan ID user yang sesuai
                'id_keberangkatan' => 1, // Ganti dengan ID keberangkatan yang sesuai
                'tanggal_kepulangan' => '2026-09-01',
                'status_perkawinan' => false,
                'alasan_kepulangan' => 'Kontrak Selesai',
                'alamat_kepulangan' => 'Jl. Contoh No. 1',
                'status_approve' => false,
            ],
            // Tambahkan data kepulangan lain sesuai kebutuhan
        ]);
    }
}
