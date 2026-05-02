@extends('template.template_admin')

@section('title', 'Dashboard Beranda')

{{-- Karena template Anda menggunakan CSS manual, kita inject Tailwind hanya untuk halaman ini (opsional jika Vite sudah aktif) --}}
@push('styles')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush

@section('content')
    <div class="bg-white p-6 md:p-8 rounded-2xl shadow-[0_4px_12px_rgba(0,0,0,0.05)] border border-[#E5E7EB]">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8 gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Dashboard Beranda</h1>
                <p class="text-sm text-gray-500 mt-1">Selamat datang kembali. Berikut merupakan 'update' data terbaru.</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center justify-center px-4 py-2.5 bg-white border border-gray-200 text-gray-700 text-sm font-semibold rounded-xl hover:bg-gray-50 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2 text-yellow-500">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 19v-6a2 2 0 00-2-2H8a2 2 0 00-2 2v6M12 11v-6m0 0V5m0 0h-3m3 0h3m-9 6h12" />
                    </svg>
                    Tambah Dosen
                </button>
                <button class="flex items-center justify-center px-4 py-2.5 bg-[#D97706] text-white text-sm font-semibold rounded-xl hover:bg-amber-600 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 19v-6a2 2 0 00-2-2H8a2 2 0 00-2 2v6M12 11v-6m0 0V5m0 0h-3m3 0h3m-9 6h12" />
                    </svg>
                    Tambah Mahasiswa
                </button>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <span class="absolute top-5 right-5 bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded-md">+4.2%</span>
                <h3 class="text-3xl font-bold text-gray-900">550</h3>
                <p class="text-sm text-gray-500 mt-1">Total Mahasiswa</p>
            </div>
            
            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm relative">
                <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                </div>
                <span class="absolute top-5 right-5 bg-gray-100 text-gray-600 text-xs font-bold px-2 py-1 rounded-md">STABLE</span>
                <h3 class="text-3xl font-bold text-gray-900">56</h3>
                <p class="text-sm text-gray-500 mt-1">Total Dosen</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>
                </div>
                <span class="absolute top-5 right-5 bg-green-100 text-green-700 text-xs font-bold px-2 py-1 rounded-md">+12</span>
                <h3 class="text-3xl font-bold text-gray-900">412</h3>
                <p class="text-sm text-gray-500 mt-1">Total Topik</p>
            </div>

            <div class="bg-white p-5 rounded-2xl border border-gray-100 shadow-sm relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                </div>
                <span class="absolute top-5 right-5 bg-blue-100 text-blue-700 text-xs font-bold px-2 py-1 rounded-md">HIGH</span>
                <h3 class="text-3xl font-bold text-gray-900">3,200</h3>
                <p class="text-sm text-gray-500 mt-1">Total Rekomendasi</p>
            </div>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
            
            <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 shadow-sm overflow-hidden">
                <div class="p-6 border-b border-gray-100 flex justify-between items-center">
                    <h2 class="text-lg font-bold text-gray-900">Aktivitas Terbaru</h2>
                    <a href="#" class="text-sm font-semibold text-blue-600 hover:text-blue-800">Tampilkan Semua</a>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left border-collapse">
                        <thead>
                            <tr class="text-gray-400 text-xs uppercase tracking-wider border-b border-gray-100">
                                <th class="px-6 py-4 font-semibold">Entity</th>
                                <th class="px-6 py-4 font-semibold">Role</th>
                                <th class="px-6 py-4 font-semibold">Prodi</th>
                                <th class="px-6 py-4 font-semibold">Date Added</th>
                                <th class="px-6 py-4 font-semibold">Status</th>
                            </tr>
                        </thead>
                        <tbody class="text-sm divide-y divide-gray-50">
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Ethan+Reynolds&background=random" alt="Ethan" class="w-10 h-10 rounded-full bg-gray-200 object-cover">
                                    <span class="font-bold text-gray-900">Ethan Reynolds</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500">Mahasiswa</td>
                                <td class="px-6 py-4 text-gray-500">D-IV Sistem Informasi Bisnis</td>
                                <td class="px-6 py-4 text-gray-500">April 24,<br>2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-green-100 text-green-700 text-xs font-semibold rounded-full">Selesai</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    </div>
                                    <span class="font-bold text-gray-900">Dr. Sarah Jenkins</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500">Dosen</td>
                                <td class="px-6 py-4 text-gray-500">Basis Data</td>
                                <td class="px-6 py-4 text-gray-500">April 24,<br>2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-100 text-blue-700 text-xs font-semibold rounded-full">Aktif</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <img src="https://ui-avatars.com/api/?name=Maya+Thompson&background=random" alt="Maya" class="w-10 h-10 rounded-full bg-gray-200 object-cover">
                                    <span class="font-bold text-gray-900">Maya Thompson</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500">Mahasiswa</td>
                                <td class="px-6 py-4 text-gray-500">D-IV Sistem Informasi Bisnis</td>
                                <td class="px-6 py-4 text-gray-500">April 24,<br>2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Incomplete</span>
                                </td>
                            </tr>
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center text-blue-500">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                                    </div>
                                    <span class="font-bold text-gray-900">Jonathan Taylor</span>
                                </td>
                                <td class="px-6 py-4 text-gray-500">Mahasiswa</td>
                                <td class="px-6 py-4 text-gray-500">D-IV Sistem Informasi Bisnis</td>
                                <td class="px-6 py-4 text-gray-500">April 24,<br>2026</td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-xs font-semibold rounded-full">Incomplete</span>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="lg:col-span-1 bg-white rounded-2xl border border-gray-100 shadow-sm p-6">
                <h2 class="text-lg font-bold text-gray-900 flex items-center gap-2 mb-6">
                    <span class="text-red-500 text-xl font-serif">*</span> Penting
                </h2>

                <div class="bg-red-50/50 rounded-xl p-5 mb-4 border-l-4 border-red-500 relative">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-gray-900 text-sm leading-tight">Data Mahasiswa<br>Tidak Lengkap</h3>
                        <div class="text-right">
                            <span class="text-red-600 font-bold text-lg leading-none">12</span><br>
                            <span class="text-[10px] font-bold text-red-600 uppercase tracking-wide">TERCATAT</span>
                        </div>
                    </div>
                    <p class="text-xs text-red-600 mb-4 mt-1">Terdapat laporan bug di bagian profil</p>
                    <a href="#" class="text-sm font-bold text-red-600 hover:text-red-800 flex items-center">
                        Resolve Now <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3" /></svg>
                    </a>
                </div>

                <div class="bg-blue-50/50 rounded-xl p-5 border-l-4 border-[#8FA8BD] relative">
                    <div class="flex justify-between items-start mb-2">
                        <h3 class="font-bold text-gray-900 text-sm leading-tight">Dosen Tanpa<br>Keahlian</h3>
                        <div class="text-right">
                            <span class="text-gray-700 font-bold text-lg leading-none">4</span><br>
                            <span class="text-[10px] font-bold text-gray-600 uppercase tracking-wide">TERCATAT</span>
                        </div>
                    </div>
                    <p class="text-xs text-gray-600 mb-4 mt-1 leading-relaxed">Mahasiswa membutuhkan pembaharuan keahlian dosen untuk mendapatkan rekomendasi judul skripsi.</p>
                    <a href="#" class="text-sm font-bold text-gray-700 hover:text-gray-900 flex items-center">
                        Beri tahu dosen <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>
                    </a>
                </div>

            </div>
        </div>
    </div>
@endsection