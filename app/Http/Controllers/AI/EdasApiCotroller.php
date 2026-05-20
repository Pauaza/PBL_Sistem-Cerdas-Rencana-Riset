<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http; // Gunakan ini

class RencanaRisetController extends Controller
{
    public function evaluasiRiset(Request $request)
    {
        // 1. Validasi Input
        $request->validate([
            'judul_topik' => 'required|string',
            'deskripsi_riset' => 'required|string',
        ]);

        try {
            // 2. Tembak API Python FastAPI
            // Tambahkan timeout yang agak longgar (misal 30 detik) untuk berjaga-jaga
            $response = Http::timeout(30)->post('https://each-saturate-grievance.ngrok-free.dev/api/evaluasi', [
                'topik' => $request->judul_topik,
                'deskripsi' => strip_tags($request->deskripsi_riset) 
            ]);

            // 3. Cek apakah request berhasil
            if ($response->successful()) {
                $hasil = $response->json();
                $rekomendasiDosen = $hasil['rekomendasi']; // Mengambil array Top 5 Dosen
                
                return view('riset.hasil_rekomendasi', compact('rekomendasiDosen'));
            } else {
                return back()->withErrors(['error' => 'API Sistem Cerdas gagal merespon.']);
            }

        } catch (\Exception $e) {
            // Tangani error jika API Python mati / belum dinyalakan
            return back()->withErrors(['error' => 'Koneksi ke Engine Python terputus: ' . $e->getMessage()]);
        }
    }
}