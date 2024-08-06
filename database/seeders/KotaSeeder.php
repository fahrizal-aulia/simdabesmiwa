<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class KotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kota')->insert([
            ['nama_kota' => 'blitar'],
            ['nama_kota' => 'trenggalek'],
            ['nama_kota' => 'tulungagung'],
        ]);
    }
}
