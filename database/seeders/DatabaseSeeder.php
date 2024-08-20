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
                'nik' => 12345,
                'nama' => 'admin1',
                'jenis_kelamin' => 'laki laki',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('123'),
                'status_approve' => true,
            ],
            // Tambahkan data user lain sesuai kebutuhan
        ]);
        DB::table('users')->insert([
            [
                'role' => 2,
                'id_kota' => 1,
                'id_kecamatan' => 1,
                'nik' => 11111,
                'nama' => 'ibnu',
                'jenis_kelamin' => 'laki laki',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('123'),
                'status_approve' => true,
            ],
        ]);
        DB::table('users')->insert([
            [
                'role' => 2,
                'id_kota' => 1,
                'id_kecamatan' => 1,
                'nik' => 33333333,
                'nama' => 'jamil',
                'jenis_kelamin' => 'laki laki',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('123'),
                'status_approve' => false,
            ],
        ]);

        DB::table('users')->insert([
            [
                'role' => 2,
                'id_kota' => 2,
                'id_kecamatan' => 2,
                'nik' => 2222222,
                'nama' => 'maria sani',
                'jenis_kelamin' => 'perempuan',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('123'),
                'status_approve' => true,
            ],
        ]);
        DB::table('users')->insert([
            [
                'role' => 1,
                'id_kota' => 2,
                'id_kecamatan' => 2,
                'nik' => 54321,
                'nama' => 'admin2',
                'jenis_kelamin' => 'perempuan',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('123'),
                'status_approve' => true,
            ],
            // Tambahkan data user lain sesuai kebutuhan
        ]);
        DB::table('users')->insert([
            [
                'role' => 2,
                'id_kota' => 2,
                'id_kecamatan' => 2,
                'nik' => 44444,
                'nama' => 'siniar',
                'jenis_kelamin' => 'perempuan',
                'kota_kelahiran' => 'Jakarta',
                'tanggal_lahir' => '1990-01-01',
                'pekerjaan' => 'Engineer',
                'status_perkawinan' => false,
                'pendapatan_perbulan' => 10000000,
                'nomer_telfon' => '081234567890',
                'pendidikan_terakhir' => 'S1',
                'tanggungan' => 2,
                'alamat_lengkap' => 'Jl. Contoh No. 1',
                'image' => 'default.jpg',
                'password' => bcrypt('123'),
                'status_approve' => false,
            ],
            // Tambahkan data user lain sesuai kebutuhan
        ]);

        $this->call([
            KotaSeeder::class,
            KecamatanSeeder::class,
            KeberangkatanSeeder::class,
            KepulanganSeeder::class,
        ]);
    }
}
