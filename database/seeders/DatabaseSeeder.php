<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
        DB::table('users')->insert([
            [
                'role' => 1,
                'id_kota' => 1,
                'id_kecamatan' => 1,
                'nik' => 33333333,
                'nama' => 'John Doe',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan_anak_keluarga' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('password'),
                'status_approve' => false,
            ],
            // Tambahkan data user lain sesuai kebutuhan
        ]);

        DB::table('users')->insert([
            [
                'role' => 2,
                'id_kota' => 2,
                'id_kecamatan' => 2,
                'nik' => 2222222,
                'nama' => 'John Doe',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan_anak_keluarga' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('password'),
                'status_approve' => false,
            ],
            // Tambahkan data user lain sesuai kebutuhan
        ]);
        DB::table('users')->insert([
            [
                'role' => 2,
                'id_kota' => 1,
                'id_kecamatan' => 1,
                'nik' => 1111111,
                'nama' => 'John Doe',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan_anak_keluarga' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('password'),
                'status_approve' => false,
            ],
        ]);
        $this->call([
            KotaSeeder::class,
            KecamatanSeeder::class,
            KeberangkatanSeeder::class,
            KepulanganSeeder::class,
        ]);
    }
}
