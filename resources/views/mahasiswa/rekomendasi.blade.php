@extends('template.template_user')

@section('title', 'Rekomendasi Skripsi')

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
.content-area {
    background: radial-gradient(circle at top right, #FEF3C7 0%, #F9FBFF 40%) !important;
}

.full-height {
    min-height: calc(100vh - 80px);
}
</style>
@endpush


@section('content')

<div class="full-height px-12 pt-0 pb-10 font-sans flex justify-center items-start">

    <!-- FORM WRAPPER (BIAR TENGAH & FULL) -->
    <div class="w-full max-w-4xl">

        <!-- HEADER -->
        <h1 class="text-4xl font-bold text-gray-800">
            Mulai Rekomendasi
        </h1>

        <h2 class="text-4xl font-bold text-orange-500 mt-2">
            Skripsi Anda
        </h2>

        <p class="text-gray-600 mt-4 text-lg leading-relaxed max-w-2xl">
            Masukkan topik dan deskripsi skripsi Anda untuk mendapatkan rekomendasi judul dan dosen pembimbing.
        </p>

        <!-- FORM -->
        <form action="{{ route('mahasiswa.hasil_rekomendasi') }}" method="POST"
            class="mt-6 bg-white/80 backdrop-blur-md p-10 rounded-2xl shadow-md space-y-8">

            @csrf

            <!-- TOPIK -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Topik Skripsi
                </label>

                <input type="text" name="topik"
                       class="w-full px-5 py-4 rounded-xl bg-white border border-gray-200 
                              focus:outline-none focus:ring-2 focus:ring-orange-400"
                       placeholder="Contoh: Data Mining, AI, Machine Learning"
                       required>
            </div>

            <!-- DESKRIPSI -->
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">
                    Deskripsi Ide
                </label>

                <textarea name="deskripsi"
                          class="w-full px-5 py-4 rounded-xl bg-white border border-gray-200 
                                 h-44 focus:outline-none focus:ring-2 focus:ring-orange-400"
                          placeholder="Jelaskan ide skripsi kamu..."
                          required></textarea>
            </div>

            <!-- BUTTON -->
            <div class="pt-2">
                <button type="submit"
                        class="px-6 py-3 rounded-full text-white font-semibold 
                        bg-gradient-to-r from-orange-400 to-orange-600 hover:scale-105 transition">

                    Mulai Rekomendasi ✨
                </button>
            </div>

        </form>

    </div>

</div>

@endsection