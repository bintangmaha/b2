<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Masuk - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); */
            min-height: 100vh;
        }
        .login-card {
            border: none;
            border-radius: 1.25rem;
            backdrop-filter: blur(10px);
            background-color: rgba(255, 255, 255, 0.9);
        }
        .form-control {
            border-radius: 0.75rem;
            padding: 0.75rem 1rem;
            border: 1px solid #e2e8f0;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
            border-color: #2d3748;
        }
        .btn-primary-custom {
            background-color: #1a202c;
            border: none;
            border-radius: 0.75rem;
            padding: 0.75rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        .btn-primary-custom:hover {
            background-color: #2d3748;
            transform: translateY(-1px);
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center">

    <div class="card login-card shadow-lg" style="width: 100%; max-width: 420px;">
        <div class="card-body p-5">
            <div class="text-center mb-5">
                <h2 class="fw-bold text-dark">Selamat Datang</h2>
                <p class="text-muted small">Silakan masuk ke akun Anda</p>
            </div>

            <form action="/login" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger border-0 small py-2">
                        {{ $errors->first() }}
                    </div>
                @endif

                @if (session('success'))
                    <div class="alert alert-success border-0 small py-2">
                        {{ session('success') }}
                    </div>
                @endif

                <div class="mb-3">
                    <label class="form-label fw-medium small">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Masukkan username" required>
                </div>

                <div class="mb-4">
                    <div class="d-flex justify-content-between">
                        <label class="form-label fw-medium small">Password</label>
                    </div>
                    <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                </div>

                <button type="submit" class="btn btn-primary-custom text-white w-100 mb-3">
                    Masuk Sekarang
                </button>
            </form>

            <div class="text-center">
                <p class="small text-muted mb-0">Belum punya akun? 
                    <a href="register" class="text-dark fw-bold text-decoration-none">Daftar Gratis</a>
                </p>
            </div>
        </div>
    </div>

</body>
</html>