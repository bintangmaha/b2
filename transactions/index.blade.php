@extends('layouts.app')

@section('title', 'Dashboard Transaksi')

@section('content')
<style>
    body {
        /* background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%); */
        min-height: 100vh;
    }
    .main-container {
        padding-top: 2rem;
        padding-bottom: 2rem;
    }
    .custom-card {
        border: none;
        border-radius: 1.25rem;
        background-color: rgba(255, 255, 255, 0.9);
        backdrop-filter: blur(10px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
    }
    .header-section {
        background: #1a202c;
        color: white;
        border-radius: 1.25rem;
        padding: 1.5rem 2rem;
        margin-bottom: 2rem;
    }
    .table thead th {
        background-color: transparent;
        border-bottom: 2px solid #edf2f7;
        color: #4a5568;
        font-size: 0.8rem;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        padding: 1.25rem 1rem;
    }
    .table tbody td {
        padding: 1.25rem 1rem;
        color: #2d3748;
        vertical-align: middle;
        border-bottom: 1px solid #edf2f7;
        font-size: 0.9rem;
    }
    .btn-action {
        border-radius: 0.5rem;
        padding: 0.4rem 0.9rem;
        font-weight: 600;
        transition: all 0.2s;
    }
    .btn-action:hover {
        transform: translateY(-1px);
        box-shadow: 0 4px 6px rgba(0,0,0,0.1);
    }
    .status-badge {
        padding: 0.5em 1em;
        border-radius: 2rem;
        font-weight: 600;
        font-size: 0.75rem;
    }
</style>

<div class="container main-container">

    {{-- Header Section --}}
    <div class="header-section d-flex justify-content-between align-items-center shadow">
        <div>
            <h3 class="fw-bold mb-0">Riwayat Transaksi</h3>
            <p class="mb-0 opacity-75 small">Pantau status peminjaman dan pengembalian buku</p>
        </div>

        @if (Auth::user()->role == 'admin')
            <a href="{{ route('transactions.create') }}" class="btn btn-light fw-bold px-4 py-2 shadow-sm rounded-pill">
                <i class="bi bi-plus-lg me-1"></i> Tambah Transaksi
            </a>
        @endif
    </div>

    {{-- Table Section --}}
    <div class="card custom-card">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover mb-0">
                    <thead>
                        <tr>
                            <th>Informasi Buku</th>
                            @if (Auth::user()->role == 'admin')
                                <th>Peminjam</th>
                            @endif
                            <th>Tgl Pinjam</th>
                            <th>Tgl Kembali</th>
                            <th class="text-center">Status</th>
                            <th class="text-end px-4">Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($transactions as $transaction)
                            <tr>
                                {{-- Buku --}}
                                <td>
                                    <div class="fw-bold text-dark">{{ $transaction->book->title }}</div>
                                    <div class="text-muted small">{{ $transaction->book->book_code }}</div>
                                </td>

                                {{-- Peminjam --}}
                                @if (Auth::user()->role == 'admin')
                                    <td>
                                        <div class="fw-medium text-dark">{{ $transaction->user->name }}</div>
                                    </td>
                                @endif

                                {{-- Tanggal --}}
                                <td><span class="text-muted">{{ $transaction->borrowed_at->format('d M Y') }}</span></td>
                                <td>
                                    @if($transaction->returned_at)
                                        <span class="text-muted">{{ $transaction->returned_at->format('d M Y') }}</span>
                                    @else
                                        <span class="text-light-emphasis small italic">Belum kembali</span>
                                    @endif
                                </td>

                                {{-- Status --}}
                                <td class="text-center">
                                    @if ($transaction->status === 'borrowed')
                                        <span class="status-badge bg-warning-subtle text-warning-emphasis border border-warning-subtle">
                                            Dipinjam
                                        </span>
                                    @else
                                        <span class="status-badge bg-success-subtle text-success-emphasis border border-success-subtle">
                                            Kembali
                                        </span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="text-end px-4">
                                    @if ($transaction->status === 'borrowed')
                                        <form action="{{ route('transactions.return', $transaction->id) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-dark btn-sm btn-action">
                                                Kembalikan
                                            </button>
                                        </form>
                                    @else
                                        <button class="btn btn-light btn-sm btn-action disabled border" style="opacity: 0.6;">
                                            Selesai
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5">
                                    <div class="text-muted">
                                        <i class="bi bi-inbox fs-1 d-block mb-2"></i>
                                        Tidak ada data transaksi ditemukan
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection