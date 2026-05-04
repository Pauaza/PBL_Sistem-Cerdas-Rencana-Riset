<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    public function beranda()
    {
        return view('mahasiswa.beranda_mahasiswa');
    }

    public function rekomendasi()
    {
        return view('mahasiswa.rekomendasi');
    }

    public function hasil(Request $request)
    {
        $topik = $request->input('topik', 'Sistem Informasi');
        $deskripsi = $request->input('deskripsi', '-');

        return view('mahasiswa.hasil_rekomendasi', compact('topik', 'deskripsi'));
    }
}