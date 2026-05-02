<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManajemenMhsController extends Controller
{
    public function index()
    {
        $mahasiswa = Mahasiswa::paginate(10);

        return view('admin.manajemen_mahasiswa', compact('mahasiswa'));
    }

    public function create()
    {
        return view('admin.manajemen_mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|string|email',
            'nip' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'lokasi_pendidikan' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'posisi' => 'required|string',
            'tahun_masuk' => 'required|numeric',
            'tahun_keluar' => 'required|numeric',
            'status' => 'required|string',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berupa email yang valid',
            'nip.required' => 'NIP wajib diisi',
            'tempat_lahir.required' => 'Tempat Lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',
            'no_hp.required' => 'No HP wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi',
            'agama.required' => 'Agama wajib diisi',
            'lokasi_pendidikan.required' => 'Lokasi Pendidikan wajib diisi',
            'pendidikan_terakhir.required' => 'Pendidikan Terakhir wajib diisi',
            'pekerjaan.required' => 'Pekerjaan wajib diisi',
            'posisi.required' => 'Posisi wajib diisi',
            'tahun_masuk.required' => 'Tahun Masuk wajib diisi',
            'tahun_keluar.required' => 'Tahun Keluar wajib diisi',
            'status.required' => 'Status wajib diisi',
        ]);

        Mahasiswa::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'lokasi_pendidikan' => $request->lokasi_pendidikan,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'posisi' => $request->posisi,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.manajemen_mahasiswa')
                          ->with('success', 'Mahasiswa berhasil dibuat.');
    }

    public function show($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        return view('admin.manajemen_mahasiswa.show', compact('mahasiswa'));
    }

    public function edit($id)
    {
        $mahasiswa = Mahasiswa::find($id);

        return view('admin.manajemen_mahasiswa.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|string|email',
            'nip' => 'required|string',
            'tempat_lahir' => 'required|string',
            'tanggal_lahir' => 'required|date',
            'no_hp' => 'required|string',
            'alamat' => 'required|string',
            'jenis_kelamin' => 'required|string',
            'agama' => 'required|string',
            'lokasi_pendidikan' => 'required|string',
            'pendidikan_terakhir' => 'required|string',
            'pekerjaan' => 'required|string',
            'posisi' => 'required|string',
            'tahun_masuk' => 'required|numeric',
            'tahun_keluar' => 'required|numeric',
            'status' => 'required|string',
        ], [
            'nama.required' => 'Nama wajib diisi',
            'email.required' => 'Email wajib diisi',
            'email.email' => 'Email harus berupa email yang valid',
            'nip.required' => 'NIP wajib diisi',
            'tempat_lahir.required' => 'Tempat Lahir wajib diisi',
            'tanggal_lahir.required' => 'Tanggal Lahir wajib diisi',                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                   
            'no_hp.required' => 'No HP wajib diisi',
            'alamat.required' => 'Alamat wajib diisi',
            'jenis_kelamin.required' => 'Jenis Kelamin wajib diisi',
            'agama.required' => 'Agama wajib diisi',
            'lokasi_pendidikan.required' => 'Lokasi Pendidikan wajib diisi',
            'pendidikan_terakhir.required' => 'Pendidikan Terakhir wajib diisi',
            'pekerjaan.required' => 'Pekerjaan wajib diisi',
            'posisi.required' => 'Posisi wajib diisi',
            'tahun_masuk.required' => 'Tahun Masuk wajib diisi',
            'tahun_keluar.required' => 'Tahun Keluar wajib diisi',
            'status.required' => 'Status wajib diisi',
        ]);

        Mahasiswa::find($id)->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nip' => $request->nip,
            'tempat_lahir' => $request->tempat_lahir,
            'tanggal_lahir' => $request->tanggal_lahir,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'agama' => $request->agama,
            'lokasi_pendidikan' => $request->lokasi_pendidikan,
            'pendidikan_terakhir' => $request->pendidikan_terakhir,
            'pekerjaan' => $request->pekerjaan,
            'posisi' => $request->posisi,
            'tahun_masuk' => $request->tahun_masuk,
            'tahun_keluar' => $request->tahun_keluar,
            'status' => $request->status,
        ]);

        return redirect()->route('admin.manajemen_mahasiswa')
                          ->with('success', 'Mahasiswa berhasil diubah.');
    }

    public function destroy($id)
    {
        Mahasiswa::destroy($id);

        return redirect()->route('admin.manajemen_mahasiswa')
                          ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}