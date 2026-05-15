<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;

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

      public function detailDosen($id)
    {
        $dosen = Dosen::with(['lab', 'penelitian'])
                    ->findOrFail($id);

        return view('mahasiswa.dosen', compact('dosen'));
    }

    public function profile()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();

        return view('mahasiswa.profile', compact('mahasiswa'));
    }
}