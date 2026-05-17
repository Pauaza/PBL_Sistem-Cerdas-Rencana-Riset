@extends('template.template_user')

@section('title', 'Hasil Rekomendasi')

@push('styles')
<script src="https://cdn.tailwindcss.com"></script>

<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'scrr-orange': '#F18F01',
            },
            fontFamily: {
                sans: ['Inter', 'sans-serif'],
            }
        }
    }
}
</script>

<style>
/* 🔥 BACKGROUND SAMA DENGAN BERANDA & REKOMENDASI */
.content-area {
    background: radial-gradient(circle at top right, #FEF3C7 0%, #F9FBFF 40%) !important;
}

/* scroll dosen */
.scroll-dosen::-webkit-scrollbar {
    height: 6px;
}
.scroll-dosen::-webkit-scrollbar-thumb {
    background: #f59e0b;
    border-radius: 10px;
}

.full-height {
    min-height: calc(100vh - 80px);
}
</style>
@endpush

@section('content')

@php
    $topikSafe = $topik ?? 'Sistem Informasi';
@endphp

<div class="full-height px-12 pt-2 pb-10 font-sans">

    <div class="max-w-6xl mx-auto">

        <h1 class="text-4xl font-bold text-gray-800">
            Hasil Rekomendasi
        </h1>

        <h2 class="text-2xl font-bold text-orange-500 mt-2">
            Untuk Anda
        </h2>

        <p class="text-gray-600 mt-4 max-w-2xl text-lg leading-relaxed">
            Sistem telah menganalisis topik yang Anda masukkan dan menghasilkan rekomendasi judul skripsi beserta dosen pembimbing yang sesuai dengan bidang penelitian Anda.
        </p>

        <div class="mt-10">

            <h3 class="text-sm font-semibold text-orange-600 mb-4">
                Rekomendasi Judul Skripsi  (Generative AI)
            </h3>

            <div class="space-y-4">

                {{-- Perulangan Foreach untuk melakukan render otomatis 3 judul dari Gemini API --}}
                @foreach($rekomendasiJudul as $index => $judul)
                <div class="flex items-center gap-4">
                    <span class="text-2xl font-bold text-gray-700 w-6">{{ $index + 1 }}</span>
                    <div class="bg-white/80 backdrop-blur-md px-5 py-4 rounded-xl shadow w-full text-gray-800 font-medium text-lg border border-gray-100">
                        {{ $judul }}
                    </div>
                </div>
                @endforeach

            </div>
        </div>

        <div class="mt-12">

            <h3 class="text-sm font-semibold text-orange-600 mb-4">
                Rekomendasi Dosen Pembimbing
            </h3>

            <div class="flex gap-6 overflow-x-auto scroll-dosen pb-4">

                <a href="{{ route('dosen.show', 1) }}"
                class="min-w-[320px] bg-white/80 backdrop-blur-md rounded-2xl shadow p-6 
                        flex justify-between items-center hover:shadow-xl 
                        hover:-translate-y-1 transition duration-300 border border-gray-100">

                    <div>
                        <h4 class="font-bold text-lg text-gray-800">
                            Indah Sulistyo, S.Pd., M.Pd
                        </h4>

                        <p class="text-sm text-gray-500 mt-2">
                            Sesuai dengan topik {{ $topikSafe }}
                        </p>
                    </div>

                    <div class="bg-yellow-400 text-black font-bold text-xl px-4 py-6 rounded-lg">
                        96%
                    </div>

                </a>

                <a href="{{ route('dosen.show', 2) }}"
                class="min-w-[320px] bg-white/80 backdrop-blur-md rounded-2xl shadow p-6 
                        flex justify-between items-center hover:shadow-xl 
                        hover:-translate-y-1 transition duration-300 border border-gray-100">

                    <div>
                        <h4 class="font-bold text-lg text-gray-800">
                            Arif Subandi, S.Pd., M.Pd
                        </h4>

                        <p class="text-sm text-gray-500 mt-2">
                            Relevan dengan penelitian Anda
                        </p>
                    </div>

                    <div class="bg-yellow-400 text-black font-bold text-xl px-4 py-6 rounded-lg">
                        87%
                    </div>

                </a>

                <a href="{{ route('dosen.show', 3) }}"
                class="min-w-[320px] bg-white/80 backdrop-blur-md rounded-2xl shadow p-6 
                        flex justify-between items-center hover:shadow-xl 
                        hover:-translate-y-1 transition duration-300 border border-gray-100">

                    <div>
                        <h4 class="font-bold text-lg text-gray-800">
                            Adinda Negara, S.Pd
                        </h4>

                        <p class="text-sm text-gray-500 mt-2">
                            Cocok untuk bidang analisis data
                        </p>
                    </div>

                    <div class="bg-yellow-400 text-black font-bold text-xl px-4 py-6 rounded-lg">
                        70%
                    </div>

                </a>

            </div>

        </div>

        <div class="flex gap-4 mt-12">

            <button class="px-6 py-3 rounded-full bg-gray-700 text-white">
                Download Rekomendasi
            </button>

            <a href="{{ route('mahasiswa.rekomendasi') }}"
               class="px-6 py-3 rounded-full text-white font-semibold 
               bg-gradient-to-r from-orange-400 to-orange-600 hover:scale-105 transition">

                Mulai Rekomendasi Ulang ✨
            </a>

        </div>

    </div>
</div>

@endsection