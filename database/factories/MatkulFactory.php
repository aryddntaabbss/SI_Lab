<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;


/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class MatkulFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        $kelasOptions = ['A', 'B', 'C'];

        $judulPalsuOptions = [
            'Keamanan Data',
            'Basis Data',
            'Algoritma & Struktur Data',
            'Logika Matematika',
            'Metode Penulisan Ilmiah',
            'Analisa Numerik',
            'Pendidikan Kewarganegaraan',
            'Pendidikan Agama Islam',
            'Pemrograman Berorientasi Objek',
            'Kerja Praktek',
            'Pemrograman Website',
            'Dasar Pemrograman',
            'Pemrograman Terstruktur',
            'Teori Informasi',
            'Sistem Operasi',
        ];
    
        $judulPalsu = $judulPalsuOptions[array_rand($judulPalsuOptions)];
        $kodeMatkul = Str::upper(Str::random(3)) . rand(10000, 99999);

        return [
            'kode_matkul' => $kodeMatkul,
            'nama_matkul' => $judulPalsu,
            'id_dosen' => rand(2, 5),
            'kelas' => $kelasOptions[array_rand($kelasOptions)],
            'sks' => rand(1, 4),
            'semester' => rand(1, 8),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     */
    public function unverified(): static
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
