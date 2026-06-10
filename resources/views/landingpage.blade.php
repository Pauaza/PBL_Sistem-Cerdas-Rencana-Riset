<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCRR - Sistem Cerdas Rencana Riset</title>

   <script src="https://cdn.tailwindcss.com"></script>

    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800" rel="stylesheet">
</head>

<body class="font-[Figtree] bg-[#F8F8F8] text-gray-800">

<!-- NAVBAR -->
<nav class="sticky top-0 z-50 bg-white/90 backdrop-blur-md border-b border-gray-100 shadow-sm">

    <div class="max-w-7xl mx-auto px-6 lg:px-10">

        <div class="flex items-center justify-between h-20">

            <!-- Logo -->
            <div class="flex items-center gap-3">

                <img
                    src="{{ asset('assets/img/logo_jti.png') }}"
                    alt="SCRR"
                    class="h-12 w-auto">

                <div>
                    {{-- <h1 class="font-bold text-xl text-gray-800">
                        SCRR
                    </h1> --}}

                    <p class="text-xs text-gray-500 leading-none">
                        Sistem Cerdas Rencana Riset
                    </p>
                </div>

            </div>

            <!-- Menu -->
            <div class="hidden md:flex items-center gap-10">

                <a href="#platform"
                   class="font-medium text-gray-600 hover:text-[#F9A826] transition duration-300">
                    Platform
                </a>

                <a href="#about"
                   class="font-medium text-gray-600 hover:text-[#F9A826] transition duration-300">
                    About
                </a>

                <a href="#how-it-works"
                   class="font-medium text-gray-600 hover:text-[#F9A826] transition duration-300">
                    How It Works
                </a>

            </div>

            <!-- Login Button -->
            <div>

                <a href="{{ route('login') }}"
                   class="inline-flex items-center gap-2
                          bg-gradient-to-r
                          from-[#F9A826]
                          to-[#F39C12]
                          hover:from-orange-500
                          hover:to-orange-600
                          text-white
                          font-semibold
                          px-6 py-3
                          rounded-full
                          shadow-lg
                          hover:shadow-xl
                          transition-all duration-300">

                    Login

                    <svg xmlns="http://www.w3.org/2000/svg"
                         class="w-4 h-4"
                         fill="none"
                         viewBox="0 0 24 24"
                         stroke="currentColor">

                        <path stroke-linecap="round"
                              stroke-linejoin="round"
                              stroke-width="2"
                              d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                    </svg>

                </a>

            </div>

        </div>

    </div>

</nav>

<!-- HERO -->
<section class="relative overflow-hidden
bg-gradient-to-r
from-[#FFF8E7]
via-[#FFFDF8]
to-[#FFF3D1]">

<!-- Glow Effect -->
<div class="absolute top-0 right-0 w-96 h-96 bg-yellow-300/30 rounded-full blur-3xl"></div>
<div class="absolute bottom-0 left-0 w-80 h-80 bg-orange-300/20 rounded-full blur-3xl"></div>

    <div class="max-w-7xl mx-auto px-6 lg:px-12 py-20">

        <div class="grid lg:grid-cols-2 gap-12 items-center">

            <div>
                <h1 class="text-5xl lg:text-6xl font-extrabold leading-tight">
                    Temukan Arah <br>
                    Riset Masa Depan <br>
                    Anda dalam <br>
                    <span class="text-[#f97026]">Hitungan Detik.</span>
                </h1>

                <p class="mt-6 text-gray-600 leading-relaxed">
                    Sistem Cerdas Rencana Riset (SCRR) menghubungkan mahasiswa dengan mentor akademik yang
                    sempurna untuk membantu merancang riset yang akan di buat. Sistem ini merupakan sistem
                    cerdas berbasi AI yang menganalisis trend global, minat akademik, dan research gap untuk memberikan 
                    rekomendasi topik penelitian yang relevan dan inovatif.
                </p>

                <div class="mt-8">
                    {{-- <button
                        class="bg-[#F9A826] hover:bg-orange-600 text-white px-8 py-4 rounded-full font-semibold shadow-lg">
                        Mulai Rekomendasi 👩‍🎓
                    </button> --}}
                </div>
            </div>

            <div class="flex justify-center">
                <div
                    class="bg-white p-5 rounded-3xl shadow-2xl rotate-2 hover:rotate-0 transition duration-300">

                    <img
                          src="{{ asset('assets/img/landing.jpg') }}"
                        class="rounded-2xl w-full max-w-md"
                        alt="">
                </div>
            </div>

        </div>

    </div>
</section>

<!-- WHY -->
<section id="about" class="py-24 bg-white">
    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold">
                Mengapa Sistem Ini Hadir ?
            </h2>

            <p class="text-gray-500 mt-4">
               Menyoroti tantangan mahasiswa dalam menentukan topik penelitian yang tepat dan bagaimana sistem ini menyelesaikannya
            </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="bg-gray-50 p-8 rounded-3xl">
                <div class="w-14 h-14 bg-yellow-100 rounded-xl flex items-center justify-center mb-5">
                    💡
                </div>

                <h3 class="font-bold text-xl mb-3">
                    Intelligent Matching
                </h3>

                <p class="text-gray-600">
                    Wawasan berbasis Al yang menganalisis 
                    topik penelitian Anda untuk menemukan
                    pembimbing yang benar-benar selaras dengan visi akademis Anda.

                </p>
            </div>

            <div class="bg-gray-50 p-8 rounded-3xl">
                <div class="w-14 h-14 bg-orange-100 rounded-xl flex items-center justify-center mb-5">
                    📊
                </div>

                <h3 class="font-bold text-xl mb-3">
                    Academic Excellence
                </h3>

                <p class="text-gray-600">
                   Jembatan langsung menuju keanilan terkemuka
                   dan pengetahuan khusus sehingga memastikan 
                   skripsi Anda memenuhi standar.

                </p>
            </div>

            <div class="bg-gray-50 p-8 rounded-3xl">
                <div class="w-14 h-14 bg-cyan-100 rounded-xl flex items-center justify-center mb-5">
                    🚀
                </div>

                <h3 class="font-bold text-xl mb-3">
                    Data Driven
                </h3>

                <p class="text-gray-600">
                    Granular precision for administrators to track progress,
                    monitor research trends, and optimize institutional resources.
                </p>
            </div>

        </div>
    </div>
</section>

<!-- DASHBOARD -->
<section id="platform" class="py-24">
    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>
                <img
                    src="{{ asset('assets/img/riset.jpg') }}"
                    class="rounded-3xl shadow-xl">
            </div>

            <div>
                <h2 class="text-5xl text-[#f97026] font-bold mb-6">
                    Membantu Mahasiswa
                    Mencari Judul.
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    SCRR memberikan rekomendasi topik penelitian secara otomatis,
                    memudahkan mahasiswa menentukan arah skripsi atau tugas akhir.
                </p>

                <div class="mt-8 space-y-6">

    <div class="flex items-start gap-3">
        <span class="text-[#F9A826] text-xl mt-1">✓</span>

        <div>
            <h4 class="font-semibold text-lg">
                Input Topik & Deskripsi
            </h4>

            <p class="text-gray-600 mt-1">
                Cukup masukkan topik penelitian dan deskripsi singkat tentang
                topik yang Anda inginkan. Sistem kami mampu menganalisis bahasa
                akademis dengan pemahaman yang mendalam.
            </p>
        </div>
    </div>

            <div class="flex items-start gap-3">
                <span class="text-[#F9A826] text-xl mt-1">✓</span>

                <div>
                    <h4 class="font-semibold text-lg">
                        Rekomendasi Instant
                    </h4>

                    <p class="text-gray-600 mt-1">
                        Dapatkan rekomendasi judul riset yang sesuai dengan minat
                        yang telah Anda inginkan.
                    </p>
                </div>
            </div>

        </div>

                    {{-- <div class="flex items-center gap-3 mt-3">
                        <span class="text-[#F9A826]">✓</span>
                        Dashboard modern --}}
                    </div>
                </div>
            </div>

        </div>
    </div>
</section>

<!-- AI -->
<section class="py-24 bg-white">

    <div class="max-w-7xl mx-auto px-6 lg:px-12">

        <div class="grid lg:grid-cols-2 gap-16 items-center">

            <div>
                <h2 class="text-5xl font-bold mb-6">
                    Administrative
                    Intelligence.
                </h2>

                <p class="text-gray-600 leading-relaxed">
                    Memanfaatkan teknologi Artificial Intelligence untuk
                    memberikan rekomendasi dan analisis yang lebih akurat.
                </p>

                <ul class="mt-8 space-y-4">
                    <li>✔ Smart Recommendation</li>
                    <li>✔ AI Classification</li>
                    <li>✔ Academic Analytics</li>
                </ul>
            </div>

            <div>
                <img
                    src="https://images.unsplash.com/photo-1516321318423-f06f85e504b3?w=1200"
                    class="rounded-3xl shadow-xl">
            </div>

        </div>
    </div>
</section>

<!-- STEPS -->
<section id="how-it-works" class="py-24">

    <div class="max-w-6xl mx-auto px-6">

        <div class="text-center mb-16">
            <h2 class="text-4xl font-bold">
                Mulai Perjalanan Riset Anda
            </h2>
              <p class="text-gray-600 leading-relaxed">
                    Mulai Riset Anda dalam 3 Langkah Mudah. Cukup kirimkan ide riset Anda, 
                    biarkan AI kami melakukan analisis, dan terhubung dengan dosen ahli yang sesuai dengan minat riset Anda.
                </p>
        </div>

        <div class="grid md:grid-cols-3 gap-8">

            <div class="text-center">
                <div class="text-5xl mb-4">👤</div>
                <h3 class="font-bold mb-3">1. Kirim Ide Riset</h3>
                <p class="text-gray-500">Input topik dan deskripsi ide riset anda.</p>
            </div>

            <div class="text-center">
                <div class="text-5xl mb-4">📚</div>
                <h3 class="font-bold mb-3">2. Analisis AI</h3>
                <p class="text-gray-500">AI kami akan melakukan analisis terhadap ide riset yang Anda kirimkan.</p>
            </div>

            <div class="text-center">
                <div class="text-5xl mb-4">🚀</div>
                <h3 class="font-bold mb-3">3. Terhubung Dosen</h3>
                <p class="text-gray-500">Terhubung dengan dosen ahli yang sesuai dengan minat riset Anda.</p>
            </div>

        </div>

    </div>

</section>

<!-- CTA -->
<section class="pb-24">

    <div class="max-w-6xl mx-auto px-6">

      <div class="relative overflow-hidden
            bg-gradient-to-br from-[#0F0F0F] via-[#1A1A1A] to-[#111111]
            rounded-[40px]
            text-center
            py-20 px-8">

    <!-- Glow Kiri -->
    <div class="absolute -left-20 top-10 w-72 h-72
                bg-orange-500/20
                rounded-full blur-3xl">
    </div>

    <!-- Glow Kanan -->
    <div class="absolute -right-20 bottom-0 w-72 h-72
                bg-yellow-400/20
                rounded-full blur-3xl">
    </div>

    <!-- Glow Tengah -->
    <div class="absolute left-1/2 top-1/2
                -translate-x-1/2 -translate-y-1/2
                w-96 h-96
                bg-orange-400/10
                rounded-full blur-3xl">
    </div>

    <!-- Content -->
    <div class="relative z-10">

        <h2 class="text-5xl font-bold text-white leading-tight">
            Siap menentukan <br>
            masa depan akademis Anda? 👩‍🎓
        </h2>

        <p class="mt-5 text-gray-300 text-lg">
            Temukan rekomendasi topik penelitian yang relevan,
            inovatif, dan sesuai dengan minat akademik Anda.
        </p>

        <a href="{{ route('mahasiswa.rekomendasi') }}"
           class="inline-block mt-8 bg-[#f97026]
                  hover:bg-orange-500
                  text-white px-8 py-4 rounded-full
                  font-semibold shadow-lg transition">
            Mulai Rekomendasi 🚀
        </a>

    </div>

</div>
        </div>

    </div>

</section>

<!-- FOOTER -->
<footer class="bg-white border-t">

    <div class="max-w-7xl mx-auto px-6 py-10">

        <div class="text-center">

            <h3 class="text-gray-800">
                Kelompok Pengembang Sistem Cerdas Rencana Riset (SCRR)
            </h3>

            <p class="mt-2 text-sm text-gray-500">
                © 2026 SCRR - Sistem Cerdas Rencana Riset. All Rights Reserved.
            </p>

        </div>

    </div>

</footer>

            {{-- <div class="flex gap-8 text-gray-500 mt-4 md:mt-0">
                <a href="#">Home</a>
                <a href="#">Features</a>
                <a href="#">About</a>
                <a href="#">Contact</a>
            </div> --}}

        </div>

    </div>

</footer>

</body>
</html>