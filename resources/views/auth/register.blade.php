<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Daftar Akun - {{ config('app.name') }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Inter', sans-serif;
            /* background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); */
            min-height: 100vh;
        }
        .register-card {
            border: none;
            border-radius: 1.5rem;
            background-color: rgba(255, 255, 255, 0.95);
        }
        .form-control {
            border-radius: 0.75rem;
            padding: 0.65rem 1rem;
            border: 1px solid #e2e8f0;
            font-size: 0.9rem;
        }
        .form-control:focus {
            box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
            border-color: #1a202c;
        }
        .btn-register {
            background-color: #1a202c;
            border: none;
            border-radius: 0.75rem;
            padding: 0.8rem;
            font-weight: 600;
            transition: 0.3s;
        }
        .btn-register:hover {
            background-color: #2d3748;
            box-shadow: 0 10px 15px -3px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>

<body class="d-flex align-items-center justify-content-center py-5">

    <div class="card register-card shadow-lg" style="width: 100%; max-width: 550px;">
        <div class="card-body p-4 p-md-5">
            <div class="mb-4">
                <h3 class="fw-bold text-dark">Buat Akun</h3>
                <p class="text-muted small">Lengkapi data diri Anda untuk memulai.</p>
            </div>

            <form action="/register" method="POST">
                @csrf

                @if ($errors->any())
                    <div class="alert alert-danger border-0 small">{{ $errors->first() }}</div>
                @endif

                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">NIS</label>
                        <input type="number" name="school_id" class="form-control" placeholder="12345" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Kelas</label>
                        <input type="text" name="class" class="form-control" placeholder="Contoh: XII" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Jurusan</label>
                        <input type="text" name="major" class="form-control" placeholder="Contoh: RPL" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold">Username</label>
                    <input type="text" name="username" class="form-control" placeholder="Pilih username" required>
                </div>

                <div class="row g-3 mb-4">
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="••••••••" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label small fw-semibold">Konfirmasi Password</label>
                        <input type="password" name="password_confirmation" class="form-control" placeholder="••••••••" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-register text-white w-100">
                    Daftar Sekarang
                </button>
            </form>

            <p class="text-center mt-4 mb-0 small text-muted">
                Sudah punya akun? <a href="login" class="text-dark fw-bold text-decoration-none">Login di sini</a>
            </p>
        </div>
    </div>

</body>
</html>