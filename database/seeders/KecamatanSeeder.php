<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kecamatan')->insert([
            ['nama_kecamatan' => 'Kecamatan A', 'id_kota' => 1],
            ['nama_kecamatan' => 'Kecamatan B', 'id_kota' => 2],
            ['nama_kecamatan' => 'Kecamatan C', 'id_kota' => 2],
            ['nama_kecamatan' => 'Kecamatan C', 'id_kota' => 1],
        ]);
    }
}
