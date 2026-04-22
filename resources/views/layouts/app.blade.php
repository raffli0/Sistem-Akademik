<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Sistem Akademik - Manajemen Data Jurusan, Mahasiswa, dan Matakuliah">
    <title>@yield('title', 'Dashboard') &mdash; Sistem Akademik</title>

    {{-- Google Fonts: Inter --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap 5 --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    {{-- Bootstrap Icons --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        /* ===== DESIGN TOKENS ===== */
        :root {
            --primary:       #1a3c5e;
            --primary-hover: #15304d;
            --accent:        #2563eb;
            --accent-hover:  #1d4ed8;
            --sidebar-bg:    #0f2744;
            --sidebar-text:  #a8bfd4;
            --sidebar-active:#2563eb;
            --sidebar-hover: #1a3c5e;
            --topbar-bg:     #ffffff;
            --topbar-border: #e5e9ef;
            --body-bg:       #f0f4f8;
            --card-bg:       #ffffff;
            --card-border:   #e5e9ef;
            --text-main:     #1e293b;
            --text-muted:    #64748b;
            --danger:        #dc2626;
            --warning:       #d97706;
            --success:       #16a34a;
            --info:          #0284c7;
            --sidebar-width: 240px;
            --topbar-height: 60px;
        }

        /* ===== BASE ===== */
        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 0.875rem;
            background-color: var(--body-bg);
            color: var(--text-main);
            margin: 0;
            min-height: 100vh;
        }

        /* ===== SIDEBAR ===== */
        #sidebar {
            position: fixed;
            top: 0;
            left: 0;
            width: var(--sidebar-width);
            height: 100vh;
            background-color: var(--sidebar-bg);
            display: flex;
            flex-direction: column;
            z-index: 1040;
            transition: transform 0.25s ease;
        }

        .sidebar-brand {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 0 20px;
            height: var(--topbar-height);
            border-bottom: 1px solid rgba(255,255,255,0.07);
            text-decoration: none;
        }

        .sidebar-brand-icon {
            width: 34px;
            height: 34px;
            background-color: var(--accent);
            border-radius: 8px;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
            font-size: 1rem;
            color: #fff;
        }

        .sidebar-brand-text {
            font-size: 0.9rem;
            font-weight: 700;
            color: #fff;
            line-height: 1.2;
        }

        .sidebar-brand-text small {
            display: block;
            font-size: 0.7rem;
            font-weight: 400;
            color: var(--sidebar-text);
            letter-spacing: 0.04em;
        }

        .sidebar-nav {
            flex: 1;
            padding: 16px 12px;
            overflow-y: auto;
        }

        .sidebar-section-label {
            font-size: 0.65rem;
            font-weight: 600;
            letter-spacing: 0.1em;
            text-transform: uppercase;
            color: #4a6a8a;
            padding: 8px 10px 4px;
            margin-bottom: 4px;
        }

        .sidebar-link {
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 9px 12px;
            border-radius: 7px;
            color: var(--sidebar-text);
            text-decoration: none;
            font-size: 0.845rem;
            font-weight: 500;
            transition: background 0.15s, color 0.15s;
            margin-bottom: 2px;
        }

        .sidebar-link i {
            font-size: 1rem;
            width: 20px;
            text-align: center;
            flex-shrink: 0;
        }

        .sidebar-link:hover {
            background-color: var(--sidebar-hover);
            color: #fff;
        }

        .sidebar-link.active {
            background-color: var(--sidebar-active);
            color: #fff;
            font-weight: 600;
        }

        .sidebar-footer {
            padding: 14px 12px;
            border-top: 1px solid rgba(255,255,255,0.07);
        }

        /* ===== TOPBAR ===== */
        #topbar {
            position: fixed;
            top: 0;
            left: var(--sidebar-width);
            right: 0;
            height: var(--topbar-height);
            background-color: var(--topbar-bg);
            border-bottom: 1px solid var(--topbar-border);
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 0 24px;
            z-index: 1030;
        }

        .topbar-left {
            display: flex;
            align-items: center;
            gap: 14px;
        }

        .topbar-page-title {
            font-size: 0.95rem;
            font-weight: 600;
            color: var(--text-main);
            margin: 0;
        }

        .topbar-right {
            display: flex;
            align-items: center;
            gap: 12px;
        }

        .topbar-user {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 10px;
            border-radius: 7px;
            cursor: pointer;
            text-decoration: none;
            color: var(--text-main);
            border: 1px solid var(--card-border);
            background: #fff;
            font-size: 0.845rem;
            font-weight: 500;
        }

        .topbar-user:hover {
            background-color: #f8fafc;
            color: var(--text-main);
        }

        .topbar-avatar {
            width: 30px;
            height: 30px;
            border-radius: 50%;
            background-color: var(--primary);
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 0.75rem;
            font-weight: 700;
            flex-shrink: 0;
        }

        #sidebar-toggle {
            display: none;
            background: none;
            border: none;
            font-size: 1.25rem;
            color: var(--text-main);
            cursor: pointer;
            padding: 4px;
        }

        /* ===== MAIN CONTENT ===== */
        #main-wrapper {
            margin-left: var(--sidebar-width);
            margin-top: var(--topbar-height);
            min-height: calc(100vh - var(--topbar-height));
            padding: 28px;
        }

        /* ===== CARDS ===== */
        .card {
            background: var(--card-bg);
            border: 1px solid var(--card-border);
            border-radius: 10px;
            box-shadow: none;
        }

        .card-header {
            background: var(--card-bg);
            border-bottom: 1px solid var(--card-border);
            padding: 14px 20px;
            font-weight: 600;
            font-size: 0.9rem;
        }

        .card-body { padding: 20px; }

        /* ===== STAT CARDS ===== */
        .stat-card {
            border-radius: 10px;
            padding: 22px 20px;
            display: flex;
            align-items: center;
            gap: 16px;
            border: none;
            color: #fff;
        }

        .stat-card-icon {
            width: 50px;
            height: 50px;
            border-radius: 10px;
            background-color: rgba(255,255,255,0.18);
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            flex-shrink: 0;
        }

        .stat-card-body {}

        .stat-card-label {
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            opacity: 0.85;
            margin-bottom: 4px;
        }

        .stat-card-number {
            font-size: 2rem;
            font-weight: 700;
            line-height: 1;
            margin-bottom: 2px;
        }

        .stat-card-link {
            font-size: 0.75rem;
            opacity: 0.8;
            color: #fff;
            text-decoration: none;
        }

        .stat-card-link:hover { opacity: 1; color: #fff; text-decoration: underline; }

        .stat-primary   { background-color: #1a3c5e; }
        .stat-success   { background-color: #16a34a; }
        .stat-danger    { background-color: #dc2626; }
        .stat-info      { background-color: #0284c7; }

        /* ===== TABLES ===== */
        .table {
            font-size: 0.845rem;
            color: var(--text-main);
        }

        .table thead th {
            font-size: 0.72rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.06em;
            color: var(--text-muted);
            background-color: #f8fafc;
            border-bottom: 1px solid var(--card-border);
            padding: 10px 14px;
            white-space: nowrap;
        }

        .table tbody td {
            padding: 11px 14px;
            vertical-align: middle;
            border-bottom: 1px solid #f1f5f9;
        }

        .table tbody tr:hover td { background-color: #f8fafc; }
        .table tbody tr:last-child td { border-bottom: none; }

        /* ===== BUTTONS ===== */
        .btn {
            font-size: 0.845rem;
            font-weight: 500;
            border-radius: 7px;
            padding: 7px 16px;
            transition: background 0.15s, border-color 0.15s, color 0.15s;
            border: none;
        }

        .btn-primary   { background-color: var(--accent); color: #fff; }
        .btn-primary:hover { background-color: var(--accent-hover); color: #fff; }

        .btn-secondary { background-color: #64748b; color: #fff; }
        .btn-secondary:hover { background-color: #4b5563; color: #fff; }

        .btn-warning   { background-color: #d97706; color: #fff; }
        .btn-warning:hover { background-color: #b45309; color: #fff; }

        .btn-danger    { background-color: #dc2626; color: #fff; }
        .btn-danger:hover { background-color: #b91c1c; color: #fff; }

        .btn-sm {
            font-size: 0.775rem;
            padding: 4px 11px;
            border-radius: 5px;
        }

        .btn-outline-secondary {
            background: transparent;
            border: 1px solid #cbd5e1;
            color: var(--text-muted);
        }

        .btn-outline-secondary:hover {
            background: #f1f5f9;
            color: var(--text-main);
            border-color: #94a3b8;
        }

        /* ===== FORMS ===== */
        .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 5px;
        }

        .form-control, .form-select {
            font-size: 0.845rem;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            padding: 8px 12px;
            color: var(--text-main);
            transition: border-color 0.15s, box-shadow 0.15s;
        }

        .form-control:focus, .form-select:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
            outline: none;
        }

        .form-control.is-invalid, .form-select.is-invalid {
            border-color: var(--danger);
        }

        .invalid-feedback { font-size: 0.775rem; }

        .input-group-text {
            background-color: #f8fafc;
            border: 1px solid #cbd5e1;
            border-radius: 7px;
            color: var(--text-muted);
            font-size: 0.875rem;
        }

        .input-group .form-control { border-radius: 0 7px 7px 0; }
        .input-group .input-group-text:first-child { border-radius: 7px 0 0 7px; border-right: none; }

        /* ===== BADGES ===== */
        .badge {
            font-size: 0.7rem;
            font-weight: 600;
            padding: 4px 9px;
            border-radius: 5px;
            letter-spacing: 0.02em;
        }

        /* ===== ALERTS ===== */
        .alert {
            border-radius: 8px;
            font-size: 0.845rem;
            border: none;
            border-left: 4px solid transparent;
            padding: 12px 16px;
        }

        .alert-success {
            background-color: #f0fdf4;
            border-left-color: var(--success);
            color: #14532d;
        }

        .alert-danger {
            background-color: #fef2f2;
            border-left-color: var(--danger);
            color: #7f1d1d;
        }

        .alert-info {
            background-color: #eff6ff;
            border-left-color: var(--info);
            color: #1e3a5f;
        }

        /* ===== PAGE HEADER ===== */
        .page-header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 22px;
        }

        .page-header-title {
            font-size: 1.3rem;
            font-weight: 700;
            color: var(--text-main);
            margin: 0;
        }

        .page-header-subtitle {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin: 2px 0 0;
        }

        /* ===== PAGINATION ===== */
        .pagination {
            margin: 0;
            gap: 3px;
        }

        .page-link {
            border-radius: 6px !important;
            border: 1px solid var(--card-border);
            color: var(--text-main);
            font-size: 0.8rem;
            padding: 5px 11px;
        }

        .page-link:hover {
            background-color: #f1f5f9;
            border-color: #cbd5e1;
            color: var(--text-main);
        }

        .page-item.active .page-link {
            background-color: var(--accent);
            border-color: var(--accent);
            color: #fff;
        }

        /* ===== DROPDOWN ===== */
        .dropdown-menu {
            border: 1px solid var(--card-border);
            border-radius: 9px;
            box-shadow: 0 4px 16px rgba(0,0,0,0.08);
            font-size: 0.845rem;
            padding: 6px;
            min-width: 180px;
        }

        .dropdown-item {
            border-radius: 6px;
            padding: 7px 12px;
            color: var(--text-main);
        }

        .dropdown-item:hover { background-color: #f1f5f9; }

        .dropdown-divider { margin: 4px 0; border-color: var(--card-border); }

        /* ===== RESPONSIVE ===== */
        @media (max-width: 991.98px) {
            #sidebar-toggle { display: block; }
            #sidebar { transform: translateX(-100%); }
            #sidebar.show { transform: translateX(0); }
            #topbar { left: 0; }
            #main-wrapper { margin-left: 0; padding: 20px 16px; }
            #sidebar-overlay {
                display: none;
                position: fixed; inset: 0;
                background: rgba(0,0,0,0.4);
                z-index: 1039;
            }
            #sidebar-overlay.show { display: block; }
        }
    </style>

    @stack('styles')
</head>
<body>

{{-- ===== SIDEBAR ===== --}}
<aside id="sidebar">
    <a href="{{ route('dashboard') }}" class="sidebar-brand">
        <div class="sidebar-brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <div class="sidebar-brand-text">
            Sistem Akademik
            <small>Management System</small>
        </div>
    </a>

    <nav class="sidebar-nav">
        <div class="sidebar-section-label">Main Menu</div>

        <a href="{{ route('dashboard') }}"
           class="sidebar-link @if(request()->routeIs('dashboard')) active @endif">
            <i class="bi bi-grid-1x2-fill"></i>
            Dashboard
        </a>

        <a href="{{ route('jurusan.index') }}"
           class="sidebar-link @if(request()->routeIs('jurusan.*')) active @endif">
            <i class="bi bi-building-fill"></i>
            Jurusan
        </a>

        <a href="{{ route('mahasiswa.index') }}"
           class="sidebar-link @if(request()->routeIs('mahasiswa.*')) active @endif">
            <i class="bi bi-people-fill"></i>
            Mahasiswa
        </a>

        <a href="{{ route('matakuliah.index') }}"
           class="sidebar-link @if(request()->routeIs('matakuliah.*')) active @endif">
            <i class="bi bi-book-half"></i>
            Matakuliah
        </a>
    </nav>

    <div class="sidebar-footer">
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="sidebar-link w-100 text-start border-0"
                    style="background:none; cursor:pointer; color: #ef4444;">
                <i class="bi bi-box-arrow-left"></i>
                Logout
            </button>
        </form>
    </div>
</aside>

{{-- Sidebar overlay for mobile --}}
<div id="sidebar-overlay" onclick="closeSidebar()"></div>

{{-- ===== TOPBAR ===== --}}
<header id="topbar">
    <div class="topbar-left">
        <button id="sidebar-toggle" onclick="toggleSidebar()" aria-label="Toggle Sidebar">
            <i class="bi bi-list"></i>
        </button>
        <div>
            <p class="topbar-page-title mb-0">@yield('page-title', 'Dashboard')</p>
        </div>
    </div>

    <div class="topbar-right">
        <div class="dropdown">
            <a href="#" class="topbar-user dropdown-toggle" id="userDropdown"
               data-bs-toggle="dropdown" aria-expanded="false">
                <div class="topbar-avatar">
                    {{ strtoupper(substr(auth()->user()->name ?? 'U', 0, 1)) }}
                </div>
                <span class="d-none d-md-inline">{{ auth()->user()->name ?? 'User' }}</span>
            </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <span class="dropdown-item-text small text-muted px-3 py-1">
                        Masuk sebagai
                        <br><strong class="text-dark">{{ auth()->user()->name ?? 'User' }}</strong>
                    </span>
                </li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button type="submit" class="dropdown-item text-danger">
                            <i class="bi bi-box-arrow-left me-2"></i> Logout
                        </button>
                    </form>
                </li>
            </ul>
        </div>
    </div>
</header>

{{-- ===== MAIN CONTENT ===== --}}
<main id="main-wrapper">

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="alert alert-success alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-check-circle-fill fs-5"></i>
            <div>{{ session('success') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger alert-dismissible fade show d-flex align-items-center gap-2 mb-4" role="alert">
            <i class="bi bi-exclamation-circle-fill fs-5"></i>
            <div>{{ session('error') }}</div>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @if($errors->any())
        <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
            <div class="d-flex align-items-start gap-2">
                <i class="bi bi-exclamation-circle-fill fs-5 mt-1"></i>
                <div>
                    <strong>Validasi Gagal!</strong> Periksa kembali isian form berikut:
                    <ul class="mb-0 mt-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
        </div>
    @endif

    @yield('content')
</main>

{{-- Bootstrap 5 JS --}}
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<script>
    function toggleSidebar() {
        const sidebar = document.getElementById('sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        sidebar.classList.toggle('show');
        overlay.classList.toggle('show');
    }
    function closeSidebar() {
        document.getElementById('sidebar').classList.remove('show');
        document.getElementById('sidebar-overlay').classList.remove('show');
    }

    // Auto-dismiss alerts after 5 seconds
    setTimeout(() => {
        document.querySelectorAll('.alert.fade.show').forEach(el => {
            const bsAlert = bootstrap.Alert.getOrCreateInstance(el);
            bsAlert.close();
        });
    }, 5000);
</script>

@stack('scripts')
</body>
</html>
