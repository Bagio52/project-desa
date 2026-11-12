<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Admin - Desa Ngendrosari</title>

    <!-- Favicons -->
    <link href="{{ asset('assets/img/favicon.png') }}" rel="icon">

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Bootstrap 5 & Bootstrap Icons -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <style>
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, #0f172a 0%, #1e3a8a 50%, #0f172a 100%);
            min-height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 1.5rem;
        }

        .login-card {
            background: #ffffff;
            border-radius: 18px;
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.25);
            width: 100%;
            max-width: 420px;
            padding: 2.5rem 2rem;
            position: relative;
            overflow: hidden;
        }

        .login-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(90deg, #2563eb, #38bdf8);
        }

        .brand-icon {
            width: 58px;
            height: 58px;
            background: linear-gradient(135deg, #2563eb, #38bdf8);
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.75rem;
            color: #ffffff;
            margin: 0 auto 1.25rem auto;
            box-shadow: 0 8px 18px rgba(37, 99, 235, 0.35);
        }

        .form-label {
            font-size: 0.88rem;
            font-weight: 600;
            color: #334155;
            margin-bottom: 0.35rem;
        }

        .input-group-text {
            background-color: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-right: none;
            color: #64748b;
            border-radius: 10px 0 0 10px;
        }

        .form-control {
            border: 1.5px solid #e2e8f0;
            border-left: none;
            padding: 0.7rem 0.9rem;
            font-size: 0.92rem;
            border-radius: 0 10px 10px 0;
            background-color: #ffffff;
        }

        .form-control:focus {
            border-color: #3b82f6;
            box-shadow: none;
        }

        .input-group:focus-within .input-group-text {
            border-color: #3b82f6;
            color: #2563eb;
        }

        .password-toggle-btn {
            background-color: #f8fafc;
            border: 1.5px solid #e2e8f0;
            border-left: none;
            color: #64748b;
            border-radius: 0 10px 10px 0;
            cursor: pointer;
            padding: 0 0.85rem;
            display: flex;
            align-items: center;
        }

        .btn-login {
            background: linear-gradient(135deg, #2563eb, #1d4ed8);
            color: #ffffff;
            border: none;
            padding: 0.8rem;
            border-radius: 10px;
            font-weight: 600;
            font-size: 0.95rem;
            box-shadow: 0 4px 14px rgba(37, 99, 235, 0.35);
            transition: all 0.2s ease;
            width: 100%;
            margin-top: 1rem;
        }

        .btn-login:hover {
            background: linear-gradient(135deg, #1d4ed8, #1e40af);
            color: #ffffff;
            transform: translateY(-1px);
            box-shadow: 0 6px 18px rgba(37, 99, 235, 0.45);
        }

        .back-link {
            color: #64748b;
            text-decoration: none;
            font-size: 0.85rem;
            display: inline-flex;
            align-items: center;
            gap: 0.4rem;
            transition: color 0.2s ease;
        }

        .back-link:hover {
            color: #2563eb;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <!-- Brand / Header -->
        <div class="text-center">
            <div class="brand-icon">
                <i class="bi bi-shield-lock-fill"></i>
            </div>
            <h4 class="fw-bold text-dark mb-1">Masuk Panel Admin</h4>
            <p class="text-muted small mb-4">Pemerintah Desa Ngendrosari</p>
        </div>

        <!-- Alert Error Messages -->
        @if ($errors->any())
            <div class="alert alert-danger py-2 px-3 small d-flex align-items-center gap-2 mb-3 rounded-3" role="alert">
                <i class="bi bi-exclamation-circle-fill fs-6 text-danger"></i>
                <div>{{ $errors->first() }}</div>
            </div>
        @endif

        <!-- Form Login -->
        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf

            <!-- Email Input -->
            <div class="mb-3">
                <label for="email" class="form-label">Alamat Email</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-envelope"></i></span>
                    <input type="email" 
                           id="email" 
                           name="email" 
                           class="form-control" 
                           placeholder="admin@desa.id" 
                           value="{{ old('email') }}" 
                           required 
                           autofocus>
                </div>
            </div>

            <!-- Password Input -->
            <div class="mb-4">
                <label for="password" class="form-label">Kata Sandi (Password)</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-key"></i></span>
                    <input type="password" 
                           id="password" 
                           name="password" 
                           class="form-control border-end-0" 
                           placeholder="••••••••" 
                           required>
                    <span class="password-toggle-btn" onclick="togglePasswordVisibility()">
                        <i id="toggleIcon" class="bi bi-eye"></i>
                    </span>
                </div>
            </div>

            <!-- Submit Button -->
            <button type="submit" class="btn btn-login">
                <i class="bi bi-box-arrow-in-right me-1"></i> Masuk ke Dashboard
            </button>
        </form>

        <!-- Footer link back to website -->
        <div class="text-center mt-4 pt-2 border-top">
            <a href="{{ url('/') }}" class="back-link">
                <i class="bi bi-arrow-left"></i> Kembali ke Website Utama
            </a>
        </div>
    </div>

    <script>
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const toggleIcon = document.getElementById('toggleIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                toggleIcon.classList.remove('bi-eye');
                toggleIcon.classList.add('bi-eye-slash');
            } else {
                passwordInput.type = 'password';
                toggleIcon.classList.remove('bi-eye-slash');
                toggleIcon.classList.add('bi-eye');
            }
        }
    </script>
</body>

</html>
