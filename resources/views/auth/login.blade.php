<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Login ke Sistem Akademik">
    <title>Login &mdash; Sistem Akademik</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

    <style>
        :root {
            --primary:   #1a3c5e;
            --accent:    #2563eb;
            --body-bg:   #f0f4f8;
            --card-border: #e5e9ef;
            --text-main: #1e293b;
            --text-muted: #64748b;
        }

        *, *::before, *::after { box-sizing: border-box; }

        body {
            font-family: 'Inter', system-ui, sans-serif;
            font-size: 0.875rem;
            background-color: var(--body-bg);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px 16px;
        }

        .login-wrapper {
            width: 100%;
            max-width: 420px;
        }

        /* Brand header */
        .login-brand {
            text-align: center;
            margin-bottom: 28px;
        }

        .login-brand-icon {
            width: 56px;
            height: 56px;
            background-color: var(--primary);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.6rem;
            color: #fff;
            margin: 0 auto 14px;
        }

        .login-brand h1 {
            font-size: 1.35rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .login-brand p {
            font-size: 0.82rem;
            color: var(--text-muted);
            margin: 0;
        }

        /* Card */
        .login-card {
            background: #ffffff;
            border: 1px solid var(--card-border);
            border-radius: 12px;
            padding: 32px 32px 28px;
        }

        .login-card-title {
            font-size: 1rem;
            font-weight: 700;
            color: var(--text-main);
            margin-bottom: 4px;
        }

        .login-card-subtitle {
            font-size: 0.8rem;
            color: var(--text-muted);
            margin-bottom: 24px;
        }

        /* Form elements */
        .form-label {
            font-size: 0.8rem;
            font-weight: 600;
            color: var(--text-main);
            margin-bottom: 5px;
        }

        .input-icon-wrapper {
            position: relative;
        }

        .input-icon-wrapper .form-control {
            padding-left: 40px;
        }

        .input-icon-wrapper .field-icon {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--text-muted);
            font-size: 0.95rem;
            pointer-events: none;
        }

        .form-control {
            font-size: 0.875rem;
            border: 1px solid #cbd5e1;
            border-radius: 8px;
            padding: 9px 12px;
            color: var(--text-main);
            background-color: #fff;
            transition: border-color 0.15s, box-shadow 0.15s;
            width: 100%;
        }

        .form-control:focus {
            border-color: var(--accent);
            box-shadow: 0 0 0 3px rgba(37, 99, 235, 0.12);
            outline: none;
        }

        .form-control.is-invalid { border-color: #dc2626; }
        .invalid-feedback { font-size: 0.77rem; color: #dc2626; margin-top: 4px; }

        .toggle-password {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            background: none;
            border: none;
            color: var(--text-muted);
            cursor: pointer;
            padding: 0;
            font-size: 1rem;
            line-height: 1;
        }
        .toggle-password:hover { color: var(--text-main); }

        /* Button */
        .btn-login {
            background-color: var(--primary);
            color: #fff;
            border: none;
            border-radius: 8px;
            padding: 10px 20px;
            font-size: 0.875rem;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: background 0.15s;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 8px;
        }
        .btn-login:hover { background-color: #15304d; }

        /* Remember & Forgot */
        .form-check-input:checked {
            background-color: var(--accent);
            border-color: var(--accent);
        }

        .forgot-link {
            font-size: 0.8rem;
            color: var(--accent);
            text-decoration: none;
            font-weight: 500;
        }
        .forgot-link:hover { text-decoration: underline; }

        /* Alerts */
        .alert {
            border-radius: 8px;
            font-size: 0.84rem;
            border: none;
            border-left: 4px solid transparent;
            padding: 11px 14px;
            margin-bottom: 20px;
        }
        .alert-danger {
            background-color: #fef2f2;
            border-left-color: #dc2626;
            color: #7f1d1d;
        }
        .alert-success {
            background-color: #f0fdf4;
            border-left-color: #16a34a;
            color: #14532d;
        }

        .divider {
            border: none;
            border-top: 1px solid var(--card-border);
            margin: 22px 0;
        }

        .login-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.775rem;
            color: var(--text-muted);
        }
    </style>
</head>
<body>

<div class="login-wrapper">

    {{-- Brand --}}
    <div class="login-brand">
        <div class="login-brand-icon">
            <i class="bi bi-mortarboard-fill"></i>
        </div>
        <h1>Sistem Akademik</h1>
        <p>Manajemen Jurusan, Mahasiswa &amp; Matakuliah</p>
    </div>

    {{-- Card --}}
    <div class="login-card">
        <p class="login-card-title">Selamat Datang</p>
        <p class="login-card-subtitle">Silakan masuk untuk melanjutkan ke sistem.</p>

        {{-- Flash Error --}}
        @if(session('error'))
            <div class="alert alert-danger d-flex align-items-center gap-2">
                <i class="bi bi-exclamation-circle-fill"></i>
                {{ session('error') }}
            </div>
        @endif

        @if($errors->any())
            <div class="alert alert-danger">
                <div class="d-flex align-items-start gap-2">
                    <i class="bi bi-exclamation-circle-fill mt-1"></i>
                    <div>
                        @foreach($errors->all() as $error)
                            <div>{{ $error }}</div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('login') }}" id="login-form">
            @csrf

            {{-- Email --}}
            <div class="mb-4">
                <label for="email" class="form-label">Alamat Email</label>
                <div class="input-icon-wrapper">
                    <i class="bi bi-envelope field-icon"></i>
                    <input
                        type="email"
                        class="form-control @error('email') is-invalid @enderror"
                        id="email"
                        name="email"
                        value="{{ old('email') }}"
                        placeholder="nama@email.com"
                        required
                        autofocus
                    >
                </div>
                @error('email')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Password --}}
            <div class="mb-3">
                <label for="password" class="form-label">Kata Sandi</label>
                <div class="input-icon-wrapper" style="position:relative;">
                    <i class="bi bi-lock field-icon"></i>
                    <input
                        type="password"
                        class="form-control @error('password') is-invalid @enderror"
                        id="password"
                        name="password"
                        placeholder="Masukkan kata sandi"
                        required
                        style="padding-right: 40px;"
                    >
                    <button type="button" class="toggle-password" onclick="togglePass()" id="toggle-pass-btn" aria-label="Tampilkan kata sandi">
                        <i class="bi bi-eye" id="toggle-pass-icon"></i>
                    </button>
                </div>
                @error('password')
                    <div class="invalid-feedback d-block">{{ $message }}</div>
                @enderror
            </div>

            {{-- Remember Me --}}
            <div class="d-flex align-items-center justify-content-between mb-4">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="remember" name="remember"
                           {{ old('remember') ? 'checked' : '' }}>
                    <label class="form-check-label" for="remember" style="font-size:0.8rem;">Ingat Saya</label>
                </div>
                @if(Route::has('password.request'))
                    <a href="{{ route('password.request') }}" class="forgot-link">Lupa kata sandi?</a>
                @endif
            </div>

            {{-- Submit --}}
            <button type="submit" class="btn-login" id="btn-submit">
                <i class="bi bi-box-arrow-in-right"></i>
                Masuk ke Sistem
            </button>
        </form>
    </div>

    <div class="login-footer">
        &copy; {{ date('Y') }} Sistem Akademik.
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
<script>
    function togglePass() {
        const input = document.getElementById('password');
        const icon  = document.getElementById('toggle-pass-icon');
        if (input.type === 'password') {
            input.type = 'text';
            icon.className = 'bi bi-eye-slash';
        } else {
            input.type = 'password';
            icon.className = 'bi bi-eye';
        }
    }

    // Disable button on submit
    document.getElementById('login-form').addEventListener('submit', function () {
        const btn = document.getElementById('btn-submit');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Memproses...';
    });
</script>
</body>
</html>
