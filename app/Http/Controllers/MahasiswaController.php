<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http; 

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

    //  PERBARUI FUNGSI HASIL INI
    public function hasil(Request $request)
    {
        $request->validate([
            'topik' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $topik = $request->input('topik');
        $deskripsi = $request->input('deskripsi');

        // Tembak API Python FastAPI yang berjalan di port 8001
        $response = Http::post('http://127.0.0.1:8001/api/generate-titles', [
            'topik' => $topik,
            'deskripsi' => $deskripsi,
        ]);

        $rekomendasiJudul = [];
        if ($response->successful()) {
            $rekomendasiJudul = $response->json()['judul'] ?? [];
        } else {
            // Fallback apabila server python/Gemini API mengalami gangguan
            $rekomendasiJudul = [
                'Gagal membuat judul otomatis melalui AI Engine.',
                'Pastikan server Uvicorn Python di port 8001 sudah aktif.',
                'Periksa kembali konfigurasi API Key Gemini Anda.'
            ];
        }

        // Lempar variabel rekomendasiJudul ke view menggunakan compact
        return view('mahasiswa.hasil_rekomendasi', compact('topik', 'deskripsi', 'rekomendasiJudul'));
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