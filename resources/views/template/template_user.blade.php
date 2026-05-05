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
            --primary-yellow: #FFC107; /* Kuning JTI */
            --sidebar-bg: #F8FAFC;
            --text-dark: #333333;
            --sidebar-w: 240px; /* Lebar sesuai template admin baru */
            --content-bg: #F5F0E8;
            --panel-bg: #FAF4EA;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--content-bg);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
        }

        /* ─────────────────────────────
            SIDEBAR (Sama dengan Admin)
        ───────────────────────────── */
        .sidebar {
            width: var(--sidebar-w);
            background: var(--sidebar-bg);
            border-right: 1px solid #E2E8F0;
            display: flex;
            flex-direction: column;
            padding: 24px 16px;
            position: fixed;
            height: 100vh;
            z-index: 100;
            transition: all 0.3s ease;
        }

        .sidebar.collapsed {
            width: 0;
            padding: 0;
            overflow: hidden;
            pointer-events: none;
        }

        .sidebar-top {
            padding-bottom: 30px;
            display: flex;
            justify-content: center;
        }

        .sidebar-top img {
            width: 140px;
            height: auto;
        }

        .nav-group {
            display: flex;
            flex-direction: column;
            gap: 8px;
            flex: 1;
        }

        .nav-item {
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
        }

        .nav-item i {
            width: 20px;
            font-size: 18px;
        }

        .nav-item:hover {
            background: #E2E8F0;
        }

        .nav-item.active {
            background: var(--primary-yellow);
            box-shadow: 0 4px 12px rgba(255, 193, 7, 0.3);
        }

        /* ─────────────────────────────
            FOOTER SIDEBAR
        ───────────────────────────── */
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

        .user-info .name { font-weight: bold; }
        .user-info .id { color: #888; }

        /* ─────────────────────────────
            MAIN AREA & TOGGLES
        ───────────────────────────── */
        .main-wrapper {
            margin-left: var(--sidebar-w);
            flex: 1;
            display: flex;
            min-height: 100vh;
            transition: all 0.3s ease;
        }

        .main-wrapper.full {
            margin-left: 0;
        }

        .toggle-sidebar {
            position: fixed;
            top: 50%;
            left: 240px; /* Sesuai lebar sidebar */
            transform: translateY(-50%);
            width: 26px;
            height: 60px;
            background: #FFFFFF;
            border: 1px solid #eee;
            border-left: none;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            z-index: 200;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: left 0.3s ease;
        }

        .content-area {
            flex: 1;
            padding: 40px 44px;
            background: var(--content-bg);
        }

        /* ─────────────────────────────
            HISTORY PANEL (Kanan)
        ───────────────────────────── */
        .history-panel {
            width: 210px;
            background: var(--panel-bg);
            border-left: 1px solid #EDE8DF;
            padding: 24px 16px;
            display: flex;
            flex-direction: column;
            gap: 14px;
            transition: all 0.3s ease;
        }

        .history-panel.collapsed {
            width: 0;
            padding: 0;
            overflow: hidden;
            border-left: none;
        }

        .history-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 13px;
            font-weight: 700;
            white-space: nowrap;
        }

        .toggle-history {
            position: fixed;
            top: 50%;
            right: 210px;
            transform: translateY(-50%);
            width: 26px;
            height: 60px;
            background: #FAF4EA;
            border: 1px solid #eee;
            border-right: none;
            border-radius: 10px 0 0 10px;
            cursor: pointer;
            z-index: 200;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: right 0.3s ease;
        }

        .history-list {
            display: flex;
            flex-direction: column;
            gap: 4px;
        }

        .history-item {
            font-size: 12px;
            color: #B45309;
            padding: 8px 10px;
            border-radius: 8px;
            text-decoration: none;
            transition: background .15s;
            display: block;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
        }

        .history-item:hover {
            background: rgba(217, 119, 6, .08);
        }
    </style>
    @stack('styles')
</head>

<body>

    {{-- SIDEBAR --}}
    <aside class="sidebar">
        <div class="sidebar-top">
            <img src="{{ asset('assets/img/logo_jti.png') }}" alt="SCRR Logo">
        </div>

        <nav class="nav-group">
            <a href="{{ route('mahasiswa.dashboard') }}" 
               class="nav-item {{ request()->routeIs('mahasiswa.dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>
                <span>Beranda</span>
            </a>

            <a href="{{ route('mahasiswa.rekomendasi') }}"
            class="nav-item {{ request()->routeIs('mahasiswa.rekomendasi') ? 'active' : '' }}">
                <i class="fa-solid fa-lightbulb"></i>
                <span>Rekomendasi</span>
            </a>
        </nav>

        <div class="sidebar-footer">
            <div class="avatar" style="width: 40px; height: 40px;">
                <i class="fa-solid fa-circle-user" style="font-size: 40px;"></i>
            </div>
            <div class="user-info">
                <span class="name">{{ Auth::user()->name ?? 'Mahasiswa' }}</span>
                <span class="id">{{ Auth::user()->username ?? '12345678' }}</span>
            </div>
            <i class="fa-solid fa-gear" style="margin-left: auto; cursor: pointer;"></i>
        </div>
    </aside>

    <div class="main-wrapper">
        {{-- Tombol Toggle Sidebar --}}
        <button class="toggle-sidebar" id="toggleSidebar">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        <main class="content-area">
            @yield('content')
        </main>

        {{-- HISTORY PANEL --}}
        <aside class="history-panel">
            <div class="history-header">
                <span>Histori Rekomendasi</span>
            </div>
            <div class="history-list">
                @isset($histories)
                    @forelse($histories as $item)
                        <a href="{{ route('rekomendasi.show', $item->id) }}" class="history-item" title="{{ $item->judul }}">
                            {{ Str::limit($item->judul, 25) }}
                        </a>
                    @empty
                        <span style="font-size:11px;color:#aaa;">Belum ada histori.</span>
                    @endforelse
                @else
                    <a href="#" class="history-item">Sistem rekomendasi pencarian...</a>
                    <a href="#" class="history-item">Pemanfaatan teknologi hijau...</a>
                @endisset
            </div>
        </aside>

        {{-- Tombol Toggle History --}}
        <button class="toggle-history" id="toggleHistory">
            <i class="fa-solid fa-chevron-right"></i>
        </button>
    </div>

    @push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const sidebar = document.querySelector('.sidebar');
            const historyPanel = document.querySelector('.history-panel');
            const mainWrapper = document.querySelector('.main-wrapper');
            
            const toggleSidebar = document.getElementById('toggleSidebar');
            const toggleHistory = document.getElementById('toggleHistory');

            // SIDEBAR TOGGLE
            toggleSidebar.addEventListener('click', () => {
                sidebar.classList.toggle('collapsed');
                mainWrapper.classList.toggle('full');
                
                const icon = toggleSidebar.querySelector('i');
                if (sidebar.classList.contains('collapsed')) {
                    icon.classList.replace('fa-chevron-left', 'fa-chevron-right');
                    toggleSidebar.style.left = '0';
                } else {
                    icon.classList.replace('fa-chevron-right', 'fa-chevron-left');
                    toggleSidebar.style.left = '240px';
                }
            });

            // HISTORY TOGGLE
            toggleHistory.addEventListener('click', () => {
                historyPanel.classList.toggle('collapsed');
                const icon = toggleHistory.querySelector('i');
                
                if (historyPanel.classList.contains('collapsed')) {
                    icon.classList.replace('fa-chevron-right', 'fa-chevron-left');
                    toggleHistory.style.right = '0';
                } else {
                    icon.classList.replace('fa-chevron-left', 'fa-chevron-right');
                    toggleHistory.style.right = '210px';
                }
            });
        });
    </script>
    @endpush
    @stack('scripts')
</body>
</html>