<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Akademik - Welcome</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <style>
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        .welcome-container {
            text-align: center;
            color: white;
            animation: fadeIn 0.8s ease-in;
        }
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        .welcome-icon {
            font-size: 80px;
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }
        @keyframes bounce {
            0%, 100% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-10px);
            }
        }
        h1 {
            font-size: 48px;
            font-weight: 700;
            margin-bottom: 15px;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
        }
        .subtitle {
            font-size: 20px;
            margin-bottom: 40px;
            opacity: 0.95;
        }
        .btn-welcome {
            padding: 12px 40px;
            font-size: 16px;
            border-radius: 50px;
            margin: 10px;
            transition: all 0.3s;
            font-weight: 600;
        }
        .btn-login {
            background: white;
            color: #667eea;
            border: none;
        }
        .btn-login:hover {
            background: #f0f0f0;
            transform: translateY(-2px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }
        .features {
            margin-top: 60px;
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
            max-width: 900px;
            margin-left: auto;
            margin-right: auto;
        }
        .feature-box {
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(10px);
            padding: 25px;
            border-radius: 15px;
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s;
        }
        .feature-box:hover {
            background: rgba(255, 255, 255, 0.15);
            transform: translateY(-5px);
        }
        .feature-icon {
            font-size: 40px;
            margin-bottom: 15px;
        }
        .feature-title {
            font-weight: 600;
            font-size: 16px;
            margin-bottom: 8px;
        }
        .feature-desc {
            font-size: 13px;
            opacity: 0.9;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="welcome-container">
            <div class="welcome-icon">
                <i class="bi bi-mortarboard"></i>
            </div>

            <h1>Sistem Akademik</h1>
            <p class="subtitle">Manajemen Data Jurusan, Mahasiswa & Matakuliah</p>

            <div>
                @if (Route::has('login'))
                    @auth
                        <a href="{{ route('dashboard') }}" class="btn btn-welcome btn-login">
                            <i class="bi bi-graph-up"></i> Dashboard
                        </a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-welcome btn-login">
                            <i class="bi bi-box-arrow-in-right"></i> Login
                        </a>
                    @endauth
                @endif
            </div>

            <div class="features">
                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-building"></i>
                    </div>
                    <div class="feature-title">Manajemen Jurusan</div>
                    <div class="feature-desc">Kelola data jurusan dengan akreditasi</div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-people"></i>
                    </div>
                    <div class="feature-title">Data Mahasiswa</div>
                    <div class="feature-desc">Kelola profil dan NIM mahasiswa</div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-book"></i>
                    </div>
                    <div class="feature-title">Matakuliah</div>
                    <div class="feature-desc">Manajemen daftar matakuliah & SKS</div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-lock"></i>
                    </div>
                    <div class="feature-title">Aman & Terenkripsi</div>
                    <div class="feature-desc">Login & proteksi data terjamin</div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-lightning"></i>
                    </div>
                    <div class="feature-title">Cepat & Responsif</div>
                    <div class="feature-desc">UI modern dengan Bootstrap 5</div>
                </div>

                <div class="feature-box">
                    <div class="feature-icon">
                        <i class="bi bi-database"></i>
                    </div>
                    <div class="feature-title">Database Terpadu</div>
                    <div class="feature-desc">MySQL dengan relasi lengkap</div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
