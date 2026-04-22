<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Matakuliah;

class MatakuliahSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Matakuliah::create([
            'nama_matakuliah' => 'Pemrograman Web',
            'sks' => 3,
            'id_jurusan' => 1
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Algoritma dan Struktur Data',
            'sks' => 3,
            'id_jurusan' => 1
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Basis Data',
            'sks' => 3,
            'id_jurusan' => 1
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Teori Listrik',
            'sks' => 3,
            'id_jurusan' => 2
        ]);
        Matakuliah::create([
            'nama_matakuliah' => 'Manajemen Pemasaran',
            'sks' => 3,
            'id_jurusan' => 3
        ]);

        Matakuliah::create([
            'nama_matakuliah' => 'Akuntansi Keuangan',
            'sks' => 3,
            'id_jurusan' => 4
        ]);
        Matakuliah::create([
            'nama_matakuliah' => 'Desain Grafis',
            'sks' => 3,
            'id_jurusan' => 5
        ]);
    }
}
