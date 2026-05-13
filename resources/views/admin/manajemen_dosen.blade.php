@extends('template.template_admin')
@section('title', 'Manajemen Dosen')

@push('styles')
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
@endpush

@section('content')
    <div class="space-y-6 font-sans">
       
        <!-- HEADER -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
            <div>
                <h1 class="text-2xl font-bold text-gray-900">Manajemen Dosen</h1>
                <p class="text-sm text-gray-500 mt-1">Memantau dan mengelola data dosen.</p>
            </div>
            <button  
                    class="flex items-center justify-center px-5 py-2.5 bg-[#FFC107] text-white text-sm font-semibold rounded-lg hover:bg-yellow-500 transition-colors shadow-sm">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-4 h-4 mr-2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15" />
                </svg>
                Tambah Dosen
            </button>
        </div>

        <!-- STATISTICS CARDS -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-users text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">{{ $totalDosen }}</h3>
                <p class="text-[10px] uppercase font-bold text-gray-500 mt-1 tracking-wider">TOTAL DOSEN</p>
            </div>
           
            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-chart-line text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">{{ $totalPenelitian}}</h3>
                <p class="text-[10px] uppercase font-bold text-gray-500 mt-1 tracking-wider">JUMLAH PENELITIAN</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-lightbulb text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">{{ $totalLab }}</h3>
                <p class="text-[10px] uppercase font-bold text-gray-500 mt-1 tracking-wider">LABORATORIUM</p>
            </div>

            <div class="bg-white p-5 rounded-2xl shadow-sm border border-gray-100 relative">
                <div class="w-10 h-10 rounded-full bg-blue-50 flex items-center justify-center mb-4">
                    <i class="fa-solid fa-graduation-cap text-blue-600 text-xl"></i>
                </div>
                <h3 class="text-3xl font-bold text-gray-900">{{ $totalSkripsi}}</h3>
                <p class="text-[10px] uppercase font-bold text-gray-500 mt-1 tracking-wider">BIMBINGAN ALUMNI</p>
            </div>
        </div>

        <!-- MAIN TABLE CARD -->
        <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">
           
            <!-- FILTER & PAGINATION INFO -->
            <!-- <div class="p-4 border-b border-gray-100 flex flex-col md:flex-row justify-between items-center gap-4">
                <div class="flex items-center gap-3 w-full md:w-auto"> -->
                    <!-- Filter Prodi -->
                    <!-- <div class="relative w-full md:w-48">
                        <select class="w-full bg-gray-50 border border-transparent text-gray-700 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block px-3 py-2.5 appearance-none cursor-pointer">
                            <option>Semua Prodi</option>
                            <option>Sistem Informasi</option>
                            <option>Teknik Informatika</option>
                        </select>
                        <div class="absolute inset-y-0 right-0 flex items-center px-2 pointer-events-none text-gray-500">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path></svg>
                        </div>
                    </div> -->
                   
                    <!-- Filter Bidang Keahlian -->
                    <!-- <div class="relative w-full md:w-56">
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
                    <span>Showing {{ $dosen->firstItem() ?? 1 }}-{{ $dosen->lastItem() ?? 0 }} of {{ $dosen->total() }}</span>
                </div>
            </div> -->

            <!-- TABLE -->
            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse">
                    <thead>
                        <tr class="text-gray-400 text-xs uppercase tracking-wider border-b border-gray-100 bg-gray-50/30">
                            <th class="px-6 py-4 font-semibold">ID</th>
                            <th class="px-6 py-4 font-semibold">Nama</th>
                            <th class="px-6 py-4 font-semibold">Laboratorium</th>
                            <th class="px-6 py-4 font-semibold text-center">Jumlah Penelitian</th>
                            <th class="px-6 py-4 font-semibold text-center">Jumlah Skripsi Alumni</th>
                            <th class="px-6 py-4 font-semibold text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="text-sm divide-y divide-gray-50">
                        @forelse($dosen as $d)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 text-gray-600">{{ $d->id_dosen }}</td>
                                <td class="px-6 py-4 flex items-center gap-3">
                                    <div class="w-10 h-10 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold text-xs shrink-0">
                                        {{ strtoupper(substr($d->nama_dosen, 0, 2)) }}
                                    </div>
                                    <div>
                                        <div class="font-bold text-gray-900">{{ $d->nama_dosen }}</div>
                                        <div class="text-xs text-gray-400">{{ $d->email ?? '-' }}</div>
                                    </div>
                                </td>
                                <td class="px-6 py-4">
                                    <span class="px-3 py-1 bg-blue-50 text-blue-600 text-[11px] font-semibold rounded-full border border-blue-100">
                                        {{ $d->lab->nama_lab ?? '-' }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 text-center font-bold text-gray-900">{{ $d->penelitian_count ?? 0 }}</td>
                                <td class="px-6 py-4 text-center font-bold text-gray-900">{{ $d->jumlah_skripsi ?? 0 }}</td>
                                <td class="px-6 py-4 text-center">
                                    <button class="text-gray-400 hover:text-blue-600 mx-1">
                                        <i class="fa-solid fa-pen"></i>
                                    </button>
                                    <button class="text-gray-400 hover:text-red-600 mx-1">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="px-6 py-8 text-center text-gray-500">Tidak ada data dosen.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- PAGINATION (New Design) -->
            <div class="p-4 border-t border-gray-100 bg-gray-50/50 flex flex-col md:flex-row justify-between items-center gap-4 text-sm">
                @if($dosen->onFirstPage())
                    <span class="text-gray-400 flex items-center cursor-not-allowed">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg> 
                        Previous
                    </span>
                @else
                    <a href="{{ $dosen->previousPageUrl() }}" class="text-gray-500 font-medium hover:text-gray-700 flex items-center">
                        <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg> 
                        Previous
                    </a>
                @endif

                <div class="flex items-center gap-1">
                    @foreach($dosen->links()->elements as $element)
                        @if(is_string($element))
                            <span class="w-8 h-8 flex items-center justify-center text-gray-400">...</span>
                        @endif
                        @if(is_array($element))
                            @foreach($element as $page => $url)
                                @if($page == $dosen->currentPage())
                                    <span class="w-8 h-8 flex items-center justify-center rounded-lg bg-[#FFC107] text-white font-bold shadow-sm">{{ $page }}</span>
                                @else
                                    <a href="{{ $url }}" class="w-8 h-8 flex items-center justify-center rounded-lg text-gray-600 hover:bg-gray-200">{{ $page }}</a>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                </div>

                @if($dosen->hasMorePages())
                    <a href="{{ $dosen->nextPageUrl() }}" class="text-[#FFC107] font-bold hover:text-yellow-600 flex items-center">
                        Next 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </a>
                @else
                    <span class="text-gray-400 flex items-center cursor-not-allowed">
                        Next 
                        <svg class="w-4 h-4 ml-1" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"></path></svg>
                    </span>
                @endif
            </div>
        </div>
    </div>
@endsection