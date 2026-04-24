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
            --primary: #D97706;
            --primary-bg: #FEF3C7;
            --sidebar-w: 88px;
            --sidebar-bg: #FFFFFF;
            --content-bg: #F5F0E8;
            --panel-bg: #FAF4EA;
            --text-dark: #1A1A1A;
            --text-muted: #9CA3AF;
            --border: #E5E7EB;
            --active-bg: #D97706;
            --active-fg: #FFFFFF;
        }

        html,
        body {
            height: 100%;
        }

        body {
            font-family: 'Inter', sans-serif;
            background: var(--content-bg);
            color: var(--text-dark);
            min-height: 100vh;
            display: flex;
        }

        /* ─────────────────────────────
           SIDEBAR
        ───────────────────────────── */
        .sidebar {
            width: var(--sidebar-w);
            background: #FFFFFF;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 20px 0 16px;
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            z-index: 100;
            border-right: 1px solid #F1F1F1;
        }

        .sidebar.collapsed {
            width: 0;
            padding: 0;
            overflow: hidden;
            pointer-events: none;

        }


        /* global toggle(memunculkan bar) */
        .global-toggle {
            position: fixed;
            bottom: 20px;
            left: 20px;
            z-index: 999;

            width: 44px;
            height: 44px;
            border-radius: 12px;

            border: none;
            background: #D97706;
            color: white;
            font-size: 18px;

            cursor: pointer;
            box-shadow: 0 6px 16px rgba(0, 0, 0, 0.15);

            display: flex;
            align-items: center;
            justify-content: center;

            transition: all 0.2s ease;
        }

        .global-toggle:hover {
            transform: scale(1.05);
        }


        /* Logo area */

        /* Toggle sidebar*/
        /* SIDEBAR TOGGLE */
        .toggle-sidebar {
            position: fixed;
            top: 50%;
            left: 88px;
            /* sama dengan sidebar width */
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
        }

        /* kalau sidebar collapse */




        /* Toggle History Button */
        .toggle-history {
            position: fixed;
            top: 50%;
            right: 210px;
            /* sama dengan history width */
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
        }

        /* kalau history collapse */
        .history-panel.collapsed~.toggle-history {
            right: 0;
        }

        .main-wrapper.full {
            margin-left: 0;
        }

        .history-panel.collapsed {
            width: 0;
            padding: 0;
            overflow: hidden;
        }

        .sidebar-top {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 12px;
            margin-bottom: 20px;
        }

        .sidebar-top img {
            width: 32px;
        }




        /* Nav */
        .nav-group {
            width: 100%;
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            /* lebih renggang */
            padding: 0 10px;
        }

        .nav-item {
            width: 100%;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            gap: 6px;

            padding: 12px 6px;
            border-radius: 14px;

            text-decoration: none;
            color: #9CA3AF;
            font-size: 10px;
            font-weight: 500;

            transition: all 0.2s ease;
        }


        .nav-item i {
            font-size: 18px;
        }

        .nav-item:hover {
            background: #FEF3C7;
            color: #D97706;
            transform: translateY(-1px);
        }

        .nav-item.active {
            background: #D97706;
            color: #FFFFFF;
            box-shadow: 0 6px 14px rgba(217, 119, 6, 0.25);
            transform: scale(0.95);
        }

        .nav-item.active i {
            color: #FFFFFF;
        }


        /* Footer */
        .sidebar-footer {
            width: 100%;
            padding: 0 10px;
        }

        .user-row {
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .avatar {
            width: 32px;
            height: 32px;
            border-radius: 50%;
            background: #F3F4F6;
        }


        .avatar img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .avatar i {
            font-size: 16px;
            color: #9CA3AF;
            position: relative;
            left: 8.5px;
            top: 5px;
        }

        .settings-btn {
            background: none;
            border: none;
            cursor: pointer;
            color: var(--text-muted);
            font-size: 14px;
            padding: 4px;
            border-radius: 7px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: background .15s, color .15s;
        }

        .settings-btn:hover {
            background: var(--border);
            color: var(--primary);
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

        {{-- Logo dari public/assets/img/logo.png --}}
        <div class="sidebar-top">
            <img src="{{ asset('assets/img/logo.png') }}" alt="SCRR Logo">

        </div>

        {{-- Navigation --}}
        <nav class="nav-group">
            <a href="{{ route('dashboard') }}" class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                <i class="fa-solid fa-house"></i>
                <span>Beranda</span>
            </a>

            <a href="{{ route('rekomendasi.index') }}"
                class="nav-item {{ request()->routeIs('rekomendasi.*') ? 'active' : '' }}">
                <i class="fa-solid fa-lightbulb"></i>
                <span>Rekomen&shy;dasi</span>
            </a>

            {{-- Tambahkan menu lain di sini --}}
        </nav>

        {{-- Footer: avatar + gear --}}
        <div class="sidebar-footer">
            <div class="user-row">
                <div class="avatar">
                    @auth
                        @if (auth()->user()->avatar)
                            <img src="{{ asset('storage/' . auth()->user()->avatar) }}" alt="avatar">
                        @else
                            <i class="fa-solid fa-user"></i>
                        @endif
                    @else
                        <i class="fa-solid fa-user"></i>
                    @endauth
                </div>
                <button class="settings-btn" title="Pengaturan">
                    <i class="fa-solid fa-gear"></i>
                </button>
            </div>
        </div>

    </aside>

    {{-- ═══════════ MAIN WRAPPER ═══════════ --}}
    <div class="main-wrapper">

        {{-- toggle untuk memunculkan bar --}}
        <button class="toggle-sidebar" id="toggleSidebar">
            <i class="fa-solid fa-chevron-left"></i>
        </button>

        {{-- Content --}}
        <main class="content-area">
            @yield('content')
        </main>

        {{-- History Panel --}}
        <aside class="history-panel">
            <div class="history-header">
                <button class="toggle-history" id="toggleHistory">
                    <i class="fa-solid fa-chevron-right"></i>
                </button>

                <span>Histori Rekomendasi</span>
            </div>

            <div class="history-list">
                @isset($histories)
                    @forelse($histories as $item)
                        <a href="{{ route('rekomendasi.show', $item->id) }}" class="history-item"
                            title="{{ $item->judul }}">
                            {{ Str::limit($item->judul, 34) }}
                        </a>
                    @empty
                        <span style="font-size:11px;color:#aaa;">Belum ada histori.</span>
                    @endforelse
                @else
                    <a href="#" class="history-item">Sistem rekomendasi pencarian j…</a>
                    <a href="#" class="history-item">Pemanfaatan teknologi hijau unt…</a>
                    <a href="#" class="history-item">Analisis data dashboard pemant…</a>
                @endisset
            </div>
        </aside>

    </div>

    @stack('scripts')

    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function() {

                const sidebar = document.querySelector('.sidebar');
                const historyPanel = document.querySelector('.history-panel');
                const mainWrapper = document.querySelector('.main-wrapper'); // 🔥 INI YANG KURANG

                const toggleSidebar = document.getElementById('toggleSidebar');
                const toggleHistory = document.getElementById('toggleHistory');

                const sidebarIcon = toggleSidebar.querySelector('i');
                const historyIcon = toggleHistory.querySelector('i');

                // SIDEBAR
                toggleSidebar.addEventListener('click', () => {
                    sidebar.classList.toggle('collapsed');
                    mainWrapper.classList.toggle('full'); // sekarang aman

                    if (sidebar.classList.contains('collapsed')) {
                        sidebarIcon.classList.replace('fa-chevron-left', 'fa-chevron-right');
                        toggleSidebar.style.left = '0';
                    } else {
                        sidebarIcon.classList.replace('fa-chevron-right', 'fa-chevron-left');
                        toggleSidebar.style.left = '88px';
                    }
                });

                // HISTORY
                toggleHistory.addEventListener('click', () => {
                    historyPanel.classList.toggle('collapsed');

                    if (historyPanel.classList.contains('collapsed')) {
                        historyIcon.classList.replace('fa-chevron-right', 'fa-chevron-left');
                        toggleHistory.style.right = '0';
                    } else {
                        historyIcon.classList.replace('fa-chevron-left', 'fa-chevron-right');
                        toggleHistory.style.right = '210px';
                    }
                });

            });
        </script>
    @endpush
    @stack('scripts')
</body>



</html>
