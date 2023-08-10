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

        DB::table('role')->insert([
            'name' => 'Admin'
        ]);
        DB::table('role')->insert([
            'name' => 'Dosen'
        ]);


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

        \App\Models\User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin123'),
            'id_prodi' => 1,
            'role_id' => 1,
        ]);

        \App\Models\User::factory()->create([
            'name' => 'Dosen',
            'email' => 'dosen@gmail.com',
            'password' => bcrypt('dosen123'),
            'id_prodi' => 2,
            'role_id' => 2,
        ]);

    }
}
