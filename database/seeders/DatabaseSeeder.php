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

        // Isi data role ke tabel role
        DB::table('role')->insert([
            'name' => 'Admin'
        ]);
        DB::table('role')->insert([
            'name' => 'Dosen'
        ]);

        // Isi data prodi ke tabel prodi
        DB::table('prodi')->insert([
            'nama_prodi' => 'Informatika'
        ]);
        DB::table('prodi')->insert([
            'nama_prodi' => 'Mesin'
        ]);
        DB::table('prodi')->insert([
            'nama_prodi' => 'Elektro'
        ]);
        DB::table('prodi')->insert([
            'nama_prodi' => 'Sipil'
        ]);
        DB::table('prodi')->insert([
            'nama_prodi' => 'Pertambangan'
        ]);
        DB::table('prodi')->insert([
            'nama_prodi' => 'Industri'
        ]);
        DB::table('prodi')->insert([
            'nama_prodi' => 'Arsitektur'
        ]);

        // Isi data hari ke tabel hari
        DB::table('hari')->insert([
            'nama_hari' => 'Senin',
            'waktu_buka' => '07:30:00',
            'waktu_tutup' => '17:00:00'
        ]);
        DB::table('hari')->insert([
            'nama_hari' => 'Selasa',
            'waktu_buka' => '07:30:00',
            'waktu_tutup' => '17:00:00'
        ]);
        DB::table('hari')->insert([
            'nama_hari' => 'Rabu',
            'waktu_buka' => '07:30:00',
            'waktu_tutup' => '17:00:00'
        ]);
        DB::table('hari')->insert([
            'nama_hari' => 'Kamis',
            'waktu_buka' => '07:30:00',
            'waktu_tutup' => '17:00:00'
        ]);
        DB::table('hari')->insert([
            'nama_hari' => 'Jumat',
            'waktu_buka' => '07:30:00',
            'waktu_tutup' => '12:00:00'
        ]);

        // Isi data User ke tabel User
        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'id_prodi' => 1,
            'id_role' => 1,
        ]);

        // Isi data matkul ke tabel matkul
        // \App\Models\Matkul::factory(15)->create();

        DB::table('populasi')->insert([
            'id' => 1,
        ]);
        DB::table('populasi')->insert([
            'id' => 2,
        ]);
        DB::table('populasi')->insert([
            'id' => 3,
        ]);
        DB::table('populasi')->insert([
            'id' => 4,
        ]);
        DB::table('populasi')->insert([
            'id' => 5,
        ]);
        DB::table('populasi')->insert([
            'id' => 6,
        ]);


    }
}
