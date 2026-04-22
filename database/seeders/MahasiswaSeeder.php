<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Faker\Factory as Faker; // Pastikan baris ini tepat seperti ini

class MahasiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Mahasiswa::truncate();

        Mahasiswa::create([
            'nim' => '2024001',
            'nama' => 'Ahmad Rizki',
            'id_jurusan' => 1
        ]);

        Mahasiswa::create([
            'nim' => '2024002',
            'nama' => 'Siti Nurhaliza',
            'id_jurusan' => 1
        ]);

        Mahasiswa::create([
            'nim' => '2024003',
            'nama' => 'Budi Santoso',
            'id_jurusan' => 2
        ]);

        Mahasiswa::create([
            'nim' => '2024004',
            'nama' => 'Rani Wijaya',
            'id_jurusan' => 3
        ]);

        Mahasiswa::create([
            'nim' => '2024005',
            'nama' => 'Ricky Firmansyah',
            'id_jurusan' => 4
        ]);

        
        $faker = Faker::create('id_ID');
        // Loop untuk membuat 20 data mahasiswa secara otomatis
        foreach (range(6, 20) as $index) {
            Mahasiswa::create([
                // Menghasilkan NIM urut: 2024001, 2024002, dst.
                'nim' => '2024' . str_pad($index, 3, '0', STR_PAD_LEFT),
                
                // Menghasilkan nama acak (misal: Budi Samosir, Aulia Khairunnisa, dll)
                'nama' => $faker->name(), 
                
                // Mengisi id_jurusan secara acak antara 1 sampai 5
                'id_jurusan' => $faker->numberBetween(1, 5)
            ]);
        }
    }
}