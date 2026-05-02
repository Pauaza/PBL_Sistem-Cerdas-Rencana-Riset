@extends('template.template_admin')

@section('title', 'Manajemen Mahasiswa')

@push('styles')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush

@section('content')
    <div class="space-y-6 font-sans">
        
        {{-- Header Section --}}
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Manajemen Mahasiswa</h1>
                <p class="text-sm text-gray-500 mt-1">Memantau dan mengelola data mahasiswa.</p>
            </div>
            <div class="flex items-center gap-3">
                <button class="flex items-center px-4 py-2 bg-white border border-gray-200 text-gray-700 text-sm font-semibold rounded-lg hover:bg-gray-50 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                    </svg>
                    Export
                </button>
                <button class="flex items-center px-4 py-2 bg-[#FFC107] text-white text-sm font-semibold rounded-lg hover:bg-yellow-500 transition-colors shadow-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.5v15m7.5-7.5h-15" />
                    </svg>
                    Tambah Mahasiswa
                </button>
            </div>
        </div>

        {{-- Statistics Row --}}
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-users text-blue-600"></i>
                </div>
                <span class="absolute top-5 right-5 text-green-500 text-xs font-bold px-2 py-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                    +3.4%
                </span>
                <h3 class="text-3xl font-bold text-gray-900">550</h3>
                <p class="text-xs font-bold text-gray-500 mt-1 uppercase tracking-wider">Total Mahasiswa</p>
            </div>
            
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-user-check text-blue-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">450</h3>
                <p class="text-xs font-bold text-gray-500 mt-1 uppercase tracking-wider">Pengguna Aktif</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-clock-rotate-left text-blue-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">48</h3>
                <p class="text-xs font-bold text-gray-500 mt-1 uppercase tracking-wider">Menunggu Verifikasi</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-graduation-cap text-blue-600"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">400</h3>
                <p class="text-xs font-bold text-gray-500 mt-1 uppercase tracking-wider">Akun Wisuda</p>
            </div>
        </div>

        {{-- Table Section --}}
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            
            {{-- Filter Bar --}}
            <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <div class="relative w-full md:w-48">
                        <select class="w-full bg-gray-50 border border-transparent text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-3 py-2 appearance-none cursor-pointer">
                            <option>All Study Programs</option>
                            <option>Sistem Informasi Bisnis</option>
                            <option>Teknik Informatika</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-400">
                            <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </div>
                    </div>
                    
                    <div class="relative w-full md:w-40">
                        <select class="w-full bg-gray-50 border border-transparent text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-3 py-2 appearance-none cursor-pointer">
                            <option>All Status</option>
                            <option>Active</option>
                            <option>Graduated</option>
                            <option>Pending</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-400">
                            <i class="fa-solid fa-chevron-down text-[10px]"></i>
                        </div>
                    </div>

                    <button class="text-blue-600 text-sm font-semibold hover:underline px-2">Clear Filters</button>
                </div>

                <div class="flex items-center text-sm text-gray-500 gap-4">
                    <span>Showing 1-10 of 1,284</span>
                    <div class="flex items-center border border-gray-100 rounded-lg overflow-hidden">
                        <button class="px-3 py-1.5 bg-white hover:bg-gray-50 border-r border-gray-100 text-gray-400 transition-colors"><i class="fa-solid fa-chevron-left text-[10px]"></i></button>
                        <button class="px-3 py-1.5 bg-white hover:bg-gray-50 text-gray-400 transition-colors"><i class="fa-solid fa-chevron-right text-[10px]"></i></button>
                    </div>
                </div>
            </div>

            {{-- Table --}}
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-400 text-[11px] uppercase tracking-wider border-b border-gray-50 bg-gray-50/20">
                            <th class="px-6 py-4 font-bold">Student ID (NIM)</th>
                            <th class="px-6 py-4 font-bold">Name</th>
                            <th class="px-6 py-4 font-bold">Study Program</th>
                            <th class="px-6 py-4 font-bold">Interest Topic</th>
                            <th class="px-6 py-4 font-bold">Status</th>
                            <th class="px-6 py-4 font-bold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-50">
                        
                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 text-gray-600 font-medium">2023100421</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs shrink-0">AJ</div>
                                <span class="font-bold text-gray-900">Adrian Jatmiko</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">Computer Science</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-bold rounded-full border border-blue-100">Artificial Intelligence</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-full uppercase">Active</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-300 hover:text-blue-600 mx-1 transition-colors"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-300 hover:text-red-600 mx-1 transition-colors"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 text-gray-600 font-medium">2023100588</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs shrink-0">BS</div>
                                <span class="font-bold text-gray-900">Budi Santoso</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">Information Systems</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-bold rounded-full border border-blue-100 text-center inline-block">Enterprise Resource Planning</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-100 text-blue-700 text-[10px] font-bold rounded-full uppercase">Graduated</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-300 hover:text-blue-600 mx-1 transition-colors"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-300 hover:text-red-600 mx-1 transition-colors"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 text-gray-600 font-medium">2024100112</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-pink-100 text-pink-600 flex items-center justify-center font-bold text-xs shrink-0">CR</div>
                                <span class="font-bold text-gray-900">Clara Ramadhani</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">Cyber Security</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-bold rounded-full border border-blue-100">Network Forensics</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded-full uppercase">Pending</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-300 hover:text-blue-600 mx-1 transition-colors"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-300 hover:text-red-600 mx-1 transition-colors"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 text-gray-600 font-medium">2023100877</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-indigo-100 text-indigo-600 flex items-center justify-center font-bold text-xs shrink-0">DM</div>
                                <span class="font-bold text-gray-900">Deni Maulana</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">Data Science</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-bold rounded-full border border-blue-100">Big Data Analytics</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-green-100 text-green-700 text-[10px] font-bold rounded-full uppercase">Active</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-300 hover:text-blue-600 mx-1 transition-colors"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-300 hover:text-red-600 mx-1 transition-colors"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50/80 transition-colors">
                            <td class="px-6 py-4 text-gray-600 font-medium">2023101002</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-orange-100 text-orange-600 flex items-center justify-center font-bold text-xs shrink-0">EH</div>
                                <span class="font-bold text-gray-900">Eka Hidayat</span>
                            </td>
                            <td class="px-6 py-4 text-gray-500">Computer Science</td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-bold rounded-full border border-blue-100">Software Engineering</span>
                            </td>
                            <td class="px-6 py-4">
                                <span class="px-3 py-1 bg-yellow-100 text-yellow-700 text-[10px] font-bold rounded-full uppercase">Pending</span>
                            </td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-300 hover:text-blue-600 mx-1 transition-colors"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-300 hover:text-red-600 mx-1 transition-colors"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            {{-- Footer Table / Pagination --}}
            <div class="p-4 border-t border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4 text-xs">
                <button class="text-blue-600 font-bold hover:text-blue-800 flex items-center transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a2 2 0 002 2h12a2 2 0 002-2v-1m-4-8l-4-4m0 0L8 8m4-4v12" />
                    </svg>
                    Import Bulk Data
                </button>
                
                <div class="flex items-center gap-6">
                    <span class="text-gray-400 font-medium tracking-tight">Page 1 of 129</span>
                    <div class="flex items-center gap-1.5">
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#FFC107] text-white font-bold shadow-sm">1</a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 transition-colors">2</a>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 transition-colors">3</a>
                        <span class="w-8 h-8 flex items-center justify-center text-gray-300">...</span>
                        <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-500 hover:bg-gray-100 transition-colors">129</a>
                    </div>
                    <div class="flex items-center border border-gray-100 rounded-lg overflow-hidden">
                        <button class="px-2 py-1.5 bg-white hover:bg-gray-50 border-r border-gray-100 text-gray-400 transition-colors"><i class="fa-solid fa-chevron-left text-[9px]"></i></button>
                        <button class="px-2 py-1.5 bg-white hover:bg-gray-50 text-gray-400 transition-colors"><i class="fa-solid fa-chevron-right text-[9px]"></i></button>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection