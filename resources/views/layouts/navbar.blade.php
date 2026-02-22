<style>
    .navbar-custom {
        background-color: rgba(255, 255, 255, 0.8) !important;
        backdrop-filter: blur(15px);
        -webkit-backdrop-filter: blur(15px);
        border-bottom: 1px solid rgba(0, 0, 0, 0.05) !important;
        padding: 0.75rem 0;
        position: sticky;
        top: 0;
        z-index: 1020;
    }
    .navbar-brand-custom {
        font-weight: 700;
        letter-spacing: -0.5px;
        color: #1a202c !important;
    }
    .nav-link-custom {
        font-weight: 500;
        color: #4a5568 !important;
        padding: 0.5rem 1rem !important;
        transition: all 0.2s;
        position: relative;
    }
    .nav-link-custom:hover {
        color: #1a202c !important;
    }
    /* Indikator Aktif yang Elegan */
    .nav-link-custom.active {
        color: #1a202c !important;
        font-weight: 600;
    }
    .nav-link-custom.active::after {
        content: '';
        position: absolute;
        bottom: 0;
        left: 1rem;
        right: 1rem;
        height: 2px;
        background: #1a202c;
        border-radius: 2px;
    }
    .user-profile-box {
        border-left: 1px solid #e2e8f0;
        padding-left: 1.5rem;
    }
    .btn-logout {
        border-radius: 0.75rem;
        padding: 0.5rem 1.25rem;
        font-weight: 600;
        font-size: 0.85rem;
        background-color: #1a202c;
        border: none;
        transition: 0.3s;
    }
    .btn-logout:hover {
        background-color: #2d3748;
        transform: translateY(-1px);
    }
    @media (max-width: 991.98px) {
        .user-profile-box {
            border-left: none;
            padding-left: 0;
            margin-top: 1rem;
            padding-top: 1rem;
            border-top: 1px solid #e2e8f0;
        }
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light navbar-custom">
    <div class="container">
        
        {{-- Brand / Logo --}}
        <a class="navbar-brand navbar-brand-custom" href="{{ route('books.index') }}">
            LIBRARY<span class="text-muted fw-light"></span>
        </a>

        {{-- Toggle Mobile --}}
        <button class="navbar-toggler border-0 shadow-none" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarMenu">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 ms-lg-4">
                <li class="nav-item">
                    <a class="nav-link nav-link-custom {{ request()->routeIs('books.*') ? 'active' : '' }}"
                        href="{{ route('books.index') }}">
                        Buku
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link nav-link-custom {{ request()->routeIs('transactions.*') ? 'active' : '' }}"
                        href="{{ route('transactions.index') }}">
                        Transaksi
                    </a>
                </li>

                @if (Auth::user()->role == 'admin')
                    <li class="nav-item">
                        <a class="nav-link nav-link-custom {{ request()->routeIs('users.*') ? 'active' : '' }}"
                            href="{{ route('users.index') }}">
                            Kelola Anggota
                        </a>
                    </li>
                @endif
            </ul>

            {{-- User Info & Logout --}}
            <div class="d-flex align-items-center gap-3 user-profile-box">
                <div class="text-end d-none d-lg-block">
                    <div class="fw-bold text-dark small" style="line-height: 1;">{{ Auth::user()->name }}</div>
                    <small class="text-muted" style="font-size: 0.75rem;">
                        {{ Auth::user()->role == 'admin' ? 'Administrator' : Auth::user()->major . ' - ' . Auth::user()->class }}
                    </small>
                </div>

                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-dark btn-logout shadow-sm">
                        Keluar
                    </button>
                </form>
            </div>
        </div>
    </div>
</nav>