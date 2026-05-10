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
        $totalMahasiswa = Mahasiswa::count();

        return view('admin.manajemen_mahasiswa.index', compact('mahasiswa', 'totalMahasiswa'));
    }

    public function create()
    {
        return view('admin.manajemen_mahasiswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'required|string',
            'username' => 'required|string',
            'password' => 'required|string|min:6',
        ], [
            'nim.required' => 'NIM wajib diisi',
            'username.required' => 'Username wajib diisi',
            'password.required' => 'Password wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        Mahasiswa::create([
            'nim' => $request->nim,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect()->route('admin.manajemen_mahasiswa.index')
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
            'nim' => 'required|string',
            'username' => 'required|string',
            'password' => 'nullable|string|min:8',
        ], [
            'nim.required' => 'NIM wajib diisi',
            'username.required' => 'Username wajib diisi',
            'password.min' => 'Password minimal 8 karakter',
        ]);

        $mahasiswa = Mahasiswa::find($id);
        $mahasiswa->nim = $request->nim;
        $mahasiswa->username = $request->username;
        if ($request->filled('password')) {
            $mahasiswa->password = bcrypt($request->password);
        }
        $mahasiswa->save();

        return redirect()->route('admin.manajemen_mahasiswa.index')
                          ->with('success', 'Mahasiswa berhasil diubah.');
    }
           
    public function destroy($id)
    {
        Mahasiswa::destroy($id);

        return redirect()->route('admin.manajemen_mahasiswa.index')
                          ->with('success', 'Mahasiswa berhasil dihapus.');
    }
}