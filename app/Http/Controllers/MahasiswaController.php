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
        $mahasiswa = Auth::guard('mahasiswa')->user();

        // Ambil histori milik mahasiswa aktif untuk disuntikkan ke sidebar kanan layout
        $histories = History::where('nim_mahasiswa', $mahasiswa->nim)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('mahasiswa.rekomendasi', compact('histories'));
    }

    public function hasil(Request $request)
    {
        $request->validate([
            'topik' => 'required|string',
            'deskripsi' => 'required|string',
        ]);

        $topik = $request->input('topik');
        $deskripsi = $request->input('deskripsi');

        // 1. Ambil data dosen dari database MySQL
        $allDosen = Dosen::with(['penelitian', 'skripsiPembimbing1', 'skripsiPembimbing2'])->get();

        $korpusPenelitian = [];
        $korpusSkripsi = [];

        foreach ($allDosen as $dosen) {
            $textPenelitian = $dosen->penelitian->map(function ($p) {
                return $p->judul_penelitian . " " . $p->abstrak_penelitian;
            })->implode(' ');
            $korpusPenelitian[] = $textPenelitian ? $textPenelitian : 'tidak ada riwayat penelitian';

            $textSkripsi1 = $dosen->skripsiPembimbing1->pluck('judul_skripsi')->implode(' ');
            $textSkripsi2 = $dosen->skripsiPembimbing2->pluck('judul_skripsi')->implode(' ');
            $textSkripsiTotal = $textSkripsi1 . " " . $textSkripsi2;
            $korpusSkripsi[] = trim($textSkripsiTotal) ? $textSkripsiTotal : 'tidak ada riwayat bimbingan';
        }

        // 2. Ambil Nilai Skor Semantik SBERT
        $responseSBERT = Http::post('AQ.Ab8RN6KHM3tyjpfclRZ8zA1bCTdYj-NQDBnA0Df5nOVMV87Ibw' . '/calculate-similarity', [
            'deskripsi_mahasiswa' => $deskripsi,
            'korpus_penelitian' => $korpusPenelitian,
            'korpus_skripsi' => $korpusSkripsi
        ]);

        $mahasiswaAktif = Auth::guard('mahasiswa')->user();
        $idLabMahasiswa = $mahasiswaAktif ? $mahasiswaAktif->id_lab : null;
        $rekomendasiDosen = [];

        if ($responseSBERT->successful() && isset($responseSBERT->json()['scores_c1'])) {
            $scoresC1 = $responseSBERT->json()['scores_c1'];
            $scoresC2 = $responseSBERT->json()['scores_c2'];

            // 🔥 Cari nilai tertinggi sebagai pembagi (Normalisasi Benefit SAW)
            $maxC1 = count($scoresC1) > 0 ? max($scoresC1) : 1.0;
            $maxC2 = count($scoresC2) > 0 ? max($scoresC2) : 1.0;

            // Ambil nilai aman jika max ternyata 0 agar tidak terjadi error division by zero
            $maxC1 = $maxC1 == 0 ? 1.0 : $maxC1;
            $maxC2 = $maxC2 == 0 ? 1.0 : $maxC2;

            $w1 = 0.5400;
            $w2 = 0.2971;
            $w3 = 0.1629;

            foreach ($allDosen as $index => $dosen) {
                // 🔥 Nilai sekarang di-normalisasi (Skor Dosen / Skor Tertinggi di Angkatan Itu)
                $c1 = ($scoresC1[$index] ?? 0.0) / $maxC1;
                $c2 = ($scoresC2[$index] ?? 0.0) / $maxC2;
                $c3 = ($idLabMahasiswa && $dosen->id_lab == $idLabMahasiswa) ? 1.0 : 0.0;

                $totalScoreSAW = ($c1 * $w1) + ($c2 * $w2) + ($c3 * $w3);

                $rekomendasiDosen[] = [
                    'id_dosen' => $dosen->id_dosen,
                    'nama_dosen' => $dosen->nama_dosen,
                    'id_lab' => $dosen->id_lab,
                    'persentase' => round($totalScoreSAW * 100, 1)
                ];
            }

            // 4. Sorting Ranking
            usort($rekomendasiDosen, function ($a, $b) {
                return $b['persentase'] <=> $a['persentase'];
            });
        }

        $top3Dosen = array_slice($rekomendasiDosen, 0, 3);

        // --- 5. GENERATE JUDUL GEMINI (Gunakan objek penampung $responseJudul yang tepat) ---
        $responseJudul = Http::post(env('AI_SERVICE_URL') . '/generate-titles', [
            'topik' => $request->topik,
            'deskripsi' => $request->deskripsi,
        ]);

        $rekomendasiJudul = [];
        if ($responseJudul->successful()) {
            $rekomendasiJudul = $responseJudul->json()['judul'] ?? [];
        } else {
            $rekomendasiJudul = ['Gagal memuat judul otomatis dari Gemini API.'];
        }

        // --- 6. SIMPAN LOG DATA KE TABEL HISTORY ---
        History::create([
            'nim_mahasiswa' => $mahasiswaAktif ? $mahasiswaAktif->nim : '2341760063',
            'topik' => $topik,
            'deskripsi_ide' => $deskripsi,
            'hasil_rekomendasi' => [
                'judul' => $rekomendasiJudul,
                'dosenArr' => $top3Dosen
            ]
        ]);

        // Lempar variabel $top3Dosen ke dalam view
        return view('mahasiswa.hasil_rekomendasi', compact(
            'topik',
            'deskripsi',
            'rekomendasiJudul',
            'top3Dosen',
            'idLabMahasiswa',
            'scoresC1',
            'scoresC2'
        ));
    }

    public function detailHistory($id)
    {
        /** @var \App\Models\Mahasiswa $mahasiswa */
        $mahasiswa = Auth::guard('mahasiswa')->user();
        $history = $mahasiswa->histories()->findOrFail($id);

        $rekomendasiJudul = $history->hasil_rekomendasi['judul'] ?? [];
        $rekomendasiDosen = $history->hasil_rekomendasi['dosen'] ?? [];

        return view('mahasiswa.detail_history', compact('history', 'rekomendasiJudul', 'rekomendasiDosen'));
    }

    public function detailDosen(Request $request, $id)
    {
        // Ambil data dosen beserta relasinya
        $dosen = Dosen::with(['lab', 'penelitian', 'skripsiPembimbing1', 'skripsiPembimbing2'])->findOrFail($id);

        // Tangkap nilai kriteria semantik dari parameter URL (default 0 jika diakses manual tanpa form)
        $c1 = $request->query('c1', 0); // Skor Riset SBERT
        $c2 = $request->query('c2', 0); // Skor Skripsi Bimbingan SBERT
        $c3 = $request->query('c3', 0); // Status Lab (1 atau 0)

        // Logika Otomatis Pembentukan Teks "Tentang Dosen" Berbasis Aturan Kompetensi
        $analisisKecocokan = "";

        if ($c1 < 0 || $c2 < 0) {
            // Jika diakses langsung tanpa melalui proses form rekomendasi
            $analisisKecocokan = "Dosen ini merupakan bagian dari tenaga pengajar program studi Sistem Informasi yang memiliki kepakaran di bidang " . ($dosen->lab->nama_lab ?? 'Teknologi Informasi') . ".";
        } else {
            $analisisKecocokan = "Berdasarkan hasil analisis mesin kecerdasan semantik (SBERT), " . $dosen->nama_dosen . " direkomendasikan untuk Anda karena ";

            // Kondisi 1: Riset Pribadi Dosen Sangat Relevan
            if ($c1 >= $c2 && $c1 > 0.4) {
                $analisisKecocokan .= "memiliki rekam jejak publikasi ilmiah pribadi yang sangat selaras dengan ide skripsi yang Anda ajukan. ";
            }
            // Kondisi 2: Histori Membimbing Alumni Sangat Relevan
            elseif ($c2 > $c1 && $c2 > 0.4) {
                $analisisKecocokan .= "memiliki portofolio bimbingan tugas akhir alumni yang sangat relevan dan linier dengan ruang lingkup topik Anda. ";
            }
            // Kondisi 3: Skor moderat/berimbang
            else {
                $analisisKecocokan .= "kombinasi riwayat penelitian dan portofolio bimbingan akademiknya mencakup metodologi serta objek studi yang Anda angkat. ";
            }

            // Kondisi Tambahan: Kesesuaian Laboratorium (C3)
            if ($c3 == 1) {
                $analisisKecocokan .= "Faktor kesesuaian ini diperkuat karena Anda berada di bawah payung rumpun keahlian laboratorium yang sama, yaitu Laboratorium " . ($dosen->lab->nama_lab ?? '-') . ".";
            }
        }

        return view('mahasiswa.dosen', compact('dosen', 'analisisKecocokan', 'c1', 'c2', 'c3'));
    }

    public function profile()
    {
        $mahasiswa = Auth::guard('mahasiswa')->user();
        return view('mahasiswa.profile', compact('mahasiswa'));
    }
}
