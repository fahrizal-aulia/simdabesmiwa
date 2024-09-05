<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KecamatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('kecamatan')->insert([
            // Kecamatan Kabupaten Tulungagung
            ['nama_kecamatan' => 'Besuki', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Bandung', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Campurdarat', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Gondang', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Kauman', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Kedungwaru', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Ngantru', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Ngunut', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Pagerwojo', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Pakel', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Pucanglaban', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Rejotangan', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Sendang', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Sumbergempol', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Tulungagung', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Tanggunggunung', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Wates', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Kalidawir', 'id_kota' => 2], // Kabupaten Tulungagung
            ['nama_kecamatan' => 'Boyolangu', 'id_kota' => 2], // Kabupaten Tulungagung

            // Kecamatan Kabupaten Blitar
            ['nama_kecamatan' => 'Blitar', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Bakung', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Doko', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Gandusari', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Kademangan', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Kanigoro', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Kesamben', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Nglegok', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Ponggok', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Sanankulon', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Selopuro', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Sutojayan', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Talun', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Udanawu', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Wlingi', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Wonodadi', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Srengat', 'id_kota' => 1], // Kabupaten Blitar
            ['nama_kecamatan' => 'Selorejo', 'id_kota' => 1], // Kabupaten Blitar
        ]);
    }
}
