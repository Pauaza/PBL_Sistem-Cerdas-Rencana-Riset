<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SCRR - @yield('title', 'Dashboard')</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <style>
        *,
        *::before,
        *::after {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root {
            --primary-yellow: #FFC107;
            /* Kuning JTI */
            --sidebar-bg: #F8FAFC;
            --text-dark: #333333;
            --sidebar-w: 240px;
            /* Diperlebar sesuai gambar */
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--content-bg);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
        }

        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            border-right: 1px solid #E2E8F0;
            display: flex;
            flex-direction: column;
            padding: 24px 16px;
            position: fixed;
            height: 100vh;
            transition: all 0.3s;
        }

        /* Logo Area */
        .sidebar-top {
            padding-bottom: 30px;
            display: flex;
            justify-content: center;
        }

        .sidebar-top img {
            width: 140px;
            /* Sesuaikan ukuran logo JTI SCRR */
            height: auto;
        }

        /* Navigation Group */
        .nav-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }

        .nav-item,
        .nav-link {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 12px 16px;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 14px;
            font-weight: 500;
            border-radius: 12px;
            transition: 0.2s;
            cursor: pointer;
        }

        .nav-item i,
        .nav-link i {
            width: 20px;
            font-size: 18px;
        }

        .nav-item:hover,
        .nav-link:hover {
            background: #E2E8F0;
        }

        .nav-item.active {
            background: var(--primary-yellow);
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }

        /* Submenu Styling - Sesuai Gambar */
        .sub-menu {
            display: none;
            /* Default sembunyi */
            flex-direction: column;
            gap: 4px;
            padding-left: 12px;
            margin-top: 4px;
        }

        .has-sub.active .sub-menu {
            display: flex;
        }

        .sub-item {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 10px 16px;
            text-decoration: none;
            color: var(--text-dark);
            font-size: 13px;
            border-radius: 25px;
            /* Lonjong sesuai gambar */
        }

        .sub-item.active {
            background: var(--primary-yellow);
            font-weight: bold;
        }

        /* Arrow rotation */
        .arrow {
            margin-left: auto;
            font-size: 12px;
            transition: 0.3s;
        }

        .has-sub.active .arrow {
            transform: rotate(180deg);
        }

        /* Footer Sesuai Gambar */
        .sidebar-footer {
            border-top: 1px solid #E2E8F0;
            padding-top: 16px;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .user-info {
            display: flex;
            flex-direction: column;
            font-size: 12px;
        }

        .user-info .name {
            font-weight: bold;
        }

        .user-info .id {
            color: #888;
        }

        /* ─────────────────────────────
           MAIN AREA
        ───────────────────────────── */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            min-height: 100vh;

        }

        .content-area {
            flex: 1;
            padding: 40px 44px;
            overflow-y: auto;
            background: var(--content-bg);
        }

        /* ─────────────────────────────
           HISTORY PANEL (right)
        ───────────────────────────── */
        .history-panel {
            width: 210px;
            flex-shrink: 0;
            background: var(--panel-bg);
            border-left: 1px solid #EDE8DF;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            min-height: 100vh;
        }

        .history-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13px;
            font-weight: 700;
        }

        .history-header .circle-icon {
            width: 20px;
            height: 20px;
            border-radius: 50%;
            border: 2px solid var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        .history-header .circle-icon i {
            font-size: 9px;
            color: var(--text-dark);
        }

        .history-list {
            display: flex;
            flex-direction: column;
            gap: 2px;
        }

        .history-item {
            font-size: 12px;
            color: #B45309;
            padding: 5px 6px;
            border-radius: 6px;
            cursor: pointer;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            text-decoration: none;
            display: block;
            transition: background .15s;
            line-height: 1.4;
        }

        .history-item:hover {
            background: rgba(217, 119, 6, .08);
        }

        /* ─────────────────────────────
           RESPONSIVE
        ───────────────────────────── */
        @media (max-width: 960px) {
            .history-panel {
                display: none;
            }
        }

        @media (max-width: 540px) {
            :root {
                --sidebar-w: 56px;
            }

            .nav-item span {
                display: none;
            }

            .content-area {
                padding: 24px 18px;
            }

            /* tambahkan animasi */
            .sidebar,
            .history-panel,
            .main-wrapper {
                transition: all 0.3s ease;
            }
        }
    </style>
    @stack('styles')
</head>

<body>

    {{-- ═══════════ SIDEBAR ═══════════ --}}
    <aside class="sidebar">
        <div class="sidebar-top">
            <img src="{{ asset('assets/img/logo_jti.png') }}" alt="SCRR Logo">
        </div>

        <nav class="nav-group">
            <a href="{{ route('admin.dashboard') }}"
                class="nav-item {{ request()->routeIs('admin.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-table-cells-large"></i>
                <span>Beranda</span>
            </a>

            {{-- Olah Data Dropdown --}}
            <div class="has-sub" id="menuOlahData">
                <div class="nav-link">
                    <i class="fa-solid fa-database"></i>
                    <span>Olah Data</span>
                    <i class="fa-solid fa-chevron-down arrow"></i>
                </div>
                <div class="sub-menu">
                    {{-- Navigasi ke Manajemen Dosen --}}
                    <a href="{{ route('admin.manajemen_dosen') }}"
                        class="sub-item {{ request()->is('admin/manajemen_dosen*') ? 'active' : '' }}">
                        <i class="fa-solid fa-database"></i>
                        <span>Dosen</span>
                    </a>
                    {{-- Navigasi ke Manajemen Mahasiswa --}}
                    <a href="{{ route('admin.manajemen_mahasiswa.index') }}"
                        class="sub-item {{ request()->is('admin/manajemen_mahasiswa*') ? 'active' : '' }}">
                        <i class="fa-solid fa-database"></i>
                        <span>Mahasiswa</span>
                    </a>
                </div>
            </div>
        </nav>

        <div class="sidebar-footer">
            <div class="avatar" style="width: 40px; height: 40px;">
                <i class="fa-solid fa-circle-user" style="font-size: 40px;"></i>
            </div>
            <div class="user-info">
                <span class="name">Admin JTI</span>
                <span class="id">1234567890</span>
            </div>
            <button onclick="toggleDropdown()"
                style="margin-left: auto; cursor: pointer;"
                class="w-9 h-9 rounded-lg hover:bg-gray-100 transition flex items-center justify-center">

                <i class="fa-solid fa-gear text-gray-600"></i>
            </button>
            {{-- Popup Dropdown --}}
            <div id="dropdownMenu"
                class="hidden absolute bottom-14 right-0 w-40 bg-white rounded-xl shadow-lg border border-gray-100 overflow-hidden z-50">

                <form action="{{ route('logout') }}" method="POST">
                    @csrf

                    <button type="submit"
                        class="w-full text-left px-4 py-3 text-sm text-red-500 hover:bg-red-50 flex items-center gap-2 transition">

                        <i class="fa-solid fa-right-from-bracket"></i>
                        Logout

                    </button>

                </form>

            </div>

        </div>

        <script>
            function toggleDropdown() {
                const menu = document.getElementById('dropdownMenu');
                menu.classList.toggle('hidden');
            }

            // Klik luar dropdown = tutup popup
            document.addEventListener('click', function(event) {
                const dropdown = document.getElementById('dropdownMenu');

                if (!event.target.closest('.sidebar-footer')) {
                    dropdown.classList.add('hidden');
                }
            });
        </script>
        </div>
    </aside>


    </aside>

    {{-- ═══════════ MAIN WRAPPER ═══════════ --}}
    <div class="main-wrapper">


        {{-- Content --}}
        <main class="content-area">
            @yield('content')
        </main>


    </div>

    @stack('scripts')

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const menuOlahData = document.getElementById('menuOlahData');

            // Pastikan mengklik area nav-link di dalam has-sub
            if (menuOlahData) {
                menuOlahData.querySelector('.nav-link').addEventListener('click', function(e) {
                    e.preventDefault();
                    menuOlahData.classList.toggle('active');
                });
            }

            // Toggle Sidebar (Collapse)
            const toggleSidebar = document.getElementById('toggleSidebar');
            const sidebar = document.querySelector('.sidebar');
            const mainWrapper = document.querySelector('.main-wrapper');

            if (toggleSidebar) {
                toggleSidebar.addEventListener('click', () => {
                    sidebar.classList.toggle('collapsed');
                    mainWrapper.classList.toggle('full');

                    // Ubah icon
                    const icon = toggleSidebar.querySelector('i');
                    icon.classList.toggle('fa-chevron-left');
                    icon.classList.toggle('fa-chevron-right');
                });
            }
        });
    </script>
    @endpush
    @stack('scripts')
</body>



</html>