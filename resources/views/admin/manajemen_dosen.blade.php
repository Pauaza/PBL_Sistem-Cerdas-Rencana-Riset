@extends('template.template_admin')

@section('title', 'Manajemen Dosen')

@push('styles')
    <script src="https://cdn.tailwindcss.com"></script>
@endpush

@section('content')
    <div class="space-y-6 font-sans">
        
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Manajemen Dosen</h1>
                <p class="text-sm text-gray-500 mt-1">Memantau dan mengelola data dosen.</p>
            </div>
            <button class="flex items-center justify-center px-5 py-2.5 bg-[#FFC107] text-white text-sm font-semibold rounded-lg hover:bg-yellow-500 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Dosen
            </button>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z" /></svg>
                </div>
                <span class="absolute top-5 right-5 text-green-500 text-xs font-bold px-2 py-1 flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-3 h-3 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" /></svg>
                    4%
                </span>
                <h3 class="text-3xl font-bold text-gray-900">56</h3>
                <p class="text-[10px] uppercase font-bold text-gray-500 mt-1 tracking-wider">TOTAL DOSEN</p>
            </div>
            
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 12l3-3 3 3 4-4M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z" /></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">82%</h3>
                <p class="text-[10px] uppercase font-bold text-gray-500 mt-1 tracking-wider">RATA-RATA KOUTA TERISI</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-gray-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" /></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">18</h3>
                <p class="text-[10px] uppercase font-bold text-gray-500 mt-1 tracking-wider">BIDANG KEAHLIAN</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" /></svg>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">1.234.532</h3>
                <p class="text-[10px] uppercase font-bold text-gray-500 mt-1 tracking-wider">JUMLAH PENELITIAN</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
            
            <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3 w-full md:w-auto">
                    <div class="relative w-full md:w-48">
                        <select class="w-full bg-gray-50 border border-transparent text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-3 py-2.5 appearance-none cursor-pointer">
                            <option>Semua Prodi</option>
                            <option>Sistem Informasi</option>
                            <option>Teknik Informatika</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                    
                    <div class="relative w-full md:w-56">
                        <select class="w-full bg-gray-50 border border-transparent text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-3 py-2.5 appearance-none cursor-pointer">
                            <option>Bidang Keahlian: Semua</option>
                            <option>Machine Learning</option>
                            <option>Cybersecurity</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div>
                </div>

                <div class="flex items-center text-sm text-gray-500 gap-2">
                    <span>Showing 1-10 of 124</span>
                    <div class="flex items-center border border-gray-200 rounded-lg overflow-hidden ml-2">
                        <button class="px-2 py-1 bg-white hover:bg-gray-50 border-r border-gray-200 text-gray-400">&lt;</button>
                        <button class="px-2 py-1 bg-white hover:bg-gray-50 text-gray-600">&gt;</button>
                    </div>
                </div>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase tracking-wider border-b border-gray-100 bg-gray-50/30">
                            <th class="px-6 py-4 font-semibold">ID</th>
                            <th class="px-6 py-4 font-semibold">Nama</th>
                            <th class="px-6 py-4 font-semibold">Laboratorium</th>
                            <th class="px-6 py-4 font-semibold text-center">Jumlah Penelitian</th>
                            <th class="px-6 py-4 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-50">
                        
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-gray-600">198804252015041001</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs shrink-0">HJ</div>
                                <div>
                                    <div class="font-bold text-gray-900">Prof. Hendra Jaya, Ph.D</div>
                                    <div class="text-xs text-gray-400">hendra.j@university.ac.id</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-2 items-center">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-semibold rounded-full border border-blue-100">Machine Learning</span>
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-semibold rounded-full border border-blue-100">Neural Networks</span>
                                    <button class="w-6 h-6 rounded-full border border-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-100 text-xs">+</button>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-gray-900">97</td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-400 hover:text-blue-600 mx-1"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-400 hover:text-red-600 mx-1"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-gray-600">199203102020022005</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-purple-100 text-purple-600 flex items-center justify-center font-bold text-xs shrink-0">AS</div>
                                <div>
                                    <div class="font-bold text-gray-900">Dr. Anita Sari, M.T.</div>
                                    <div class="text-xs text-gray-400">anita.sari@university.ac.id</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-2 items-center">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-semibold rounded-full border border-blue-100">Cybersecurity</span>
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-semibold rounded-full border border-blue-100">Blockchain</span>
                                    <button class="w-6 h-6 rounded-full border border-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-100 text-xs">+</button>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-gray-900">90</td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-400 hover:text-blue-600 mx-1"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-400 hover:text-red-600 mx-1"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-gray-600">198511302012011003</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-yellow-100 text-yellow-600 flex items-center justify-center font-bold text-xs shrink-0">BP</div>
                                <div>
                                    <div class="font-bold text-gray-900">Bambang Pamungkas, M.Sc.</div>
                                    <div class="text-xs text-gray-400">bambang.p@university.ac.id</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-2 items-center">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-semibold rounded-full border border-blue-100">Data Mining</span>
                                    <button class="w-6 h-6 rounded-full border border-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-100 text-xs">+</button>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-gray-900">68</td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-400 hover:text-blue-600 mx-1"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-400 hover:text-red-600 mx-1"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-6 py-4 text-gray-600">199008122018031002</td>
                            <td class="px-6 py-4 flex items-center gap-3">
                                <div class="w-10 h-10 rounded-full bg-green-100 text-green-600 flex items-center justify-center font-bold text-xs shrink-0">RN</div>
                                <div>
                                    <div class="font-bold text-gray-900">Dr. Ridwan Nur, M.Kom.</div>
                                    <div class="text-xs text-gray-400">ridwan.nur@university.ac.id</div>
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="flex flex-wrap gap-2 items-center">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-semibold rounded-full border border-blue-100">Software Architecture</span>
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-semibold rounded-full border border-blue-100">DevOps</span>
                                    <button class="w-6 h-6 rounded-full border border-gray-200 text-gray-400 flex items-center justify-center hover:bg-gray-100 text-xs">+</button>
                                </div>
                            </td>
                            <td class="px-6 py-4 text-center font-bold text-gray-900">95</td>
                            <td class="px-6 py-4 text-center">
                                <button class="text-gray-400 hover:text-blue-600 mx-1"><i class="fa-solid fa-pen"></i></button>
                                <button class="text-gray-400 hover:text-red-600 mx-1"><i class="fa-solid fa-trash-can"></i></button>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>

            <div class="p-4 border-t border-gray-100 bg-gray-50/50 flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                <a href="#" class="text-gray-500 font-medium hover:text-gray-700 flex items-center">
                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg> Previous
                </a>
                <div class="flex items-center gap-1">
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#FFC107] text-white font-bold shadow-sm">1</a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-600 hover:bg-gray-200">2</a>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-600 hover:bg-gray-200">3</a>
                    <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                    <a href="#" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-600 hover:bg-gray-200">12</a>
                </div>
                <a href="#" class="text-[#FFC107] font-bold hover:text-yellow-600 flex items-center">
                    Next <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-6">
            
            <div class="xl:col-span-2 bg-gradient-to-br from-[#1E3A8A] to-[#2563EB] rounded-2xl p-6 text-white relative overflow-hidden flex flex-col justify-center shadow-sm">
                <svg class="absolute -right-4 -bottom-6 w-48 h-48 text-white opacity-10" fill="currentColor" viewBox="0 0 24 24"><path d="M12 3L1 9l4 2.18v6L12 21l7-3.82v-6l2-1.09V17h2V9L12 3zm6.82 6L12 12.72 5.18 9 12 5.28 18.82 9zM17 15.99l-5 2.73-5-2.73v-3.72L12 15l5-2.73v3.72z"/></svg>
                
                <div class="relative z-10">
                    <h2 class="text-xl font-bold mb-2">Academic Load Alert</h2>
                    <p class="text-blue-100 text-sm mb-5 max-w-lg leading-relaxed">
                        The Information Systems faculty has reached 94% of its total supervision capacity. Consider reviewing new lecturer applications or redistribution.
                    </p>
                    <div class="flex items-center gap-3">
                        <button class="px-5 py-2.5 bg-white text-blue-700 font-bold text-sm rounded-lg hover:bg-gray-50 transition-colors">
                            Review Redistribution
                        </button>
                        <button class="px-5 py-2.5 border border-blue-400 text-white font-bold text-sm rounded-lg hover:bg-blue-800 transition-colors">
                            Dismiss
                        </button>
                    </div>
                </div>
            </div>

            <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col justify-between">
                <div>
                    <h2 class="text-lg font-bold text-gray-900 mb-5">Supervision Status</h2>
                    <ul class="space-y-4">
                        <li class="flex items-center justify-between">
                            <div class="flex items-center text-sm font-medium text-gray-700">
                                <span class="w-2 h-2 rounded-full bg-green-500 mr-3"></span>
                                Tersedia
                            </div>
                            <span class="font-bold text-gray-900 text-sm">35 Dosen</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <div class="flex items-center text-sm font-medium text-gray-700">
                                <span class="w-2 h-2 rounded-full bg-yellow-500 mr-3"></span>
                                Mendekati Kapasitas
                            </div>
                            <span class="font-bold text-gray-900 text-sm">10 Dosen</span>
                        </li>
                        <li class="flex items-center justify-between">
                            <div class="flex items-center text-sm font-medium text-gray-700">
                                <span class="w-2 h-2 rounded-full bg-red-500 mr-3"></span>
                                Melebihi Kapasitas
                            </div>
                            <span class="font-bold text-gray-900 text-sm">11 Dosen</span>
                        </li>
                    </ul>
                </div>
                
                <div class="mt-6 pt-4 border-t border-gray-100 text-center md:text-left">
                    <a href="#" class="text-sm font-bold text-blue-600 hover:text-blue-800 flex items-center justify-center md:justify-start">
                        View Detailed Distribution 
                        <svg class="w-3.5 h-3.5 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"></path></svg>
                    </a>
                </div>
            </div>

        </div>

    </div>
@endsection