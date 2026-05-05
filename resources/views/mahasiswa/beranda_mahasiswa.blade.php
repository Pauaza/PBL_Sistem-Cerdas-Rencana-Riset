@extends('template.template_user')

@section('title', 'Beranda_Mahsiswa')

@push('styles')
<!-- Tailwind khusus halaman ini -->
<script src="https://cdn.tailwindcss.com"></script>

<script>
tailwind.config = {
    theme: {
        extend: {
            colors: {
                'scrr-orange': '#F18F01',
            }
        }
    }
}
</script>

<style>
/* 🔥 BACKGROUND SAMA PERSIS LOGIN */
.content-area {
    background: radial-gradient(circle at top right, #FEF3C7 0%, #F9FBFF 40%) !important;
}

/* full tinggi */
.full-height {
    min-height: calc(100vh - 80px);
}
</style>
@endpush


@section('content')

<div class="flex items-center justify-between full-height px-12">

    <!-- KIRI -->
    <div class="w-1/2">

        <h1 class="text-5xl font-bold text-gray-800 leading-tight">
            Selamat Datang di Sistem 
            <span class="text-scrr-orange">
                Cerdas Rencana Riset (SCRR)
            </span>
        </h1>

        <p class="text-gray-600 mt-6 text-lg max-w-xl leading-relaxed">
            Platform berbasis web yang membantu mahasiswa menentukan judul skripsi
            dan dosen pembimbing secara otomatis menggunakan metode Machine Learning.
        </p>

        <a href="/rekomendasi"
        class="mt-8 px-6 py-3 rounded-full text-white font-semibold shadow-lg 
        bg-gradient-to-r from-orange-400 to-orange-600 hover:scale-105 transition flex items-center gap-2 w-fit">
            
            Mulai Rekomendasi ✨
            <i class="fas fa-sparkles"></i>
        </a>

    </div>

    <!-- KANAN -->
    <div class="w-1/2 flex justify-center">

        <div class="relative">

            <div class="absolute inset-0 bg-[#FDE68A] rounded-[2.5rem] -translate-x-3 -translate-y-2 scale-110 -rotate-3"></div>

            <!-- CARD -->
            <div class="relative bg-white border-2 border-white rounded-[2.5rem] p-6 shadow-sm z-10 flex items-center justify-center"
                style="width: 460px; height: 340px;">

                <img src="{{ asset('assets/img/riset.jpg') }}"
                    class="w-full h-full object-contain">

            </div>

        </div>

    </div>

</div>

@endsection