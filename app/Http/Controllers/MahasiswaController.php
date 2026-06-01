<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dosen;
use App\Models\History;
use App\Models\Mahasiswa;
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
        $deskripsiBersih = strip_tags($deskripsi); // Bersihkan teks untuk pemrosesan AI

        // ========================================================
        // 1. TEMBAK API GENERATOR JUDUL (Port 8001)
        // ========================================================
        $rekomendasiJudul = [];
        try {
            $responseJudul = Http::post('http://127.0.0.1:8001/api/generate-titles', [
                'topik' => $topik,
                'deskripsi' => $deskripsi,
            ]);

            if ($responseJudul->successful()) {
                $rekomendasiJudul = $responseJudul->json()['judul'] ?? [];
            } else {
                $rekomendasiJudul = ['Gagal memuat rekomendasi judul otomatis dari API lokal.'];
            }
        } catch (\Exception $e) {
            $rekomendasiJudul = ['Koneksi ke server generator judul (port 8001) terputus.'];
        }

        // ========================================================
        // 2. TEMBAK API REKOMENDASI DOSEN EDAS (Google Colab / Ngrok)
        // ========================================================
        $rekomendasiDosen = [];
        $apiEdasUrl = 'https://each-saturate-grievance.ngrok-free.dev/api/evaluasi';

        try {
            $responseDosen = Http::timeout(45)->post($apiEdasUrl, [
                'topik' => $topik,
                'deskripsi' => $deskripsiBersih,
            ]);

            if ($responseDosen->successful()) {
                $hasilApiDosen = $responseDosen->json();
                $rekomendasiDosen = $hasilApiDosen['rekomendasi'] ?? [];
            }
        } catch (\Exception $e) {
            // Jika API Colab mati, biarkan array kosong agar view menampilkan pesan error yang rapi
            $rekomendasiDosen = [];
        }

        // menyimpan hasil rekomendasi ke database untuk histori mahasiswa
        /** @var \App\Models\Mahasiswa $mahasiswa */
        $mahasiswa = Auth::guard('mahasiswa')->user(); 
        
        if(!empty($rekomendasiJudul) || !empty($rekomendasiDosen)) {
            // menggunakan histories() karena sudah didefinisikan relasi di model
            $mahasiswa->histories()->create([
                'topik' => $topik,
                'deskripsi_ide' => $deskripsi,
                'metode_pilihan' => null,
                'hasil_rekomendasi' => [ // akan otomatis di-encode oleh fitur $casts di model
                    'judul' => $rekomendasiJudul,
                    'dosen' => $rekomendasiDosen
                ]
            ]);
        }

        // ========================================================
        // 3. KIRIM SEMUA DATA KE VIEW
        // ========================================================
        return view('mahasiswa.hasil_rekomendasi', compact('topik', 'deskripsi', 'rekomendasiJudul', 'rekomendasiDosen'));
    }

    // method untuk detail history
    public function detailHistory($id)
    {
        /** @var \App\Models\Mahasiswa $mahasiswa */
        $mahasiswa = Auth::guard('mahasiswa')->user();

        // Cari histori berdasarkan ID yang HANYA dimiliki oleh mahasiswa ini via relasi
        $history = $mahasiswa->histories()->findOrFail($id);

        $rekomendasiJudul = $history->hasil_rekomendasi['judul'] ?? [];
        $rekomendasiDosen = $history->hasil_rekomendasi['dosen'] ?? [];

        return view('mahasiswa.detail_history', compact('history', 'rekomendasiJudul', 'rekomendasiDosen'));
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