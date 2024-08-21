<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KeberangkatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('keberangkatan')->insert([
            [
                'id_user' => 2, // Ganti dengan ID user yang sesuai
                'nama_perusahaan' => 'Perusahaan A',
                'negara_tujuan' => 'Jepang',
                'tanggal_keberangkatan' => '2024-09-01',
                'jenis_pekerjaan' => 'Software Engineer',
                'alamat_di_luar_negeri' => 'Tokyo, Jepang',
                'status_perkawinan' => false,
                'biaya_pemberangkatan' => 5000000,
                'masa_kontrak' => 24, // dalam bulan
                'gaji_perbulan' => 15000000,
                'no_hp' => '081234567890',
                'asuransi' => 'Asuransi Kesehatan',
                'status_approve' => false,
            ],
            // Tambahkan data keberangkatan lain sesuai kebutuhan
        ]);
    }
}
