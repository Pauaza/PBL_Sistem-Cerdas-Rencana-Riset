<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class historySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\History::create([
            'nim_mahasiswa' => '2341760063',
            'topik' => 'IoT',
            'deskripsi_ide' => 'Sistem monitoring kandang ayam otomatis berbasis ESP32',
            'metode_pilihan' => 'Teorema Bayes',
            'hasil_rekomendasi' => 'Ade Ismail S.Kom., M.TI'
        ]);
    }
}
