@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<style>
    /* Custom Styles untuk menyamakan tema */
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
        font-size: 0.85rem;
        text-transform: uppercase;
        letter-spacing: 0.025em;
        padding: 1.25rem 1rem;
    }
    .table tbody td {
        padding: 1.25rem 1rem;
        color: #2d3748;
        vertical-align: middle;
        border-bottom: 1px solid #edf2f7;
    }
    .btn-action {
        border-radius: 0.5rem;
        padding: 0.4rem 0.8rem;
        font-weight: 500;
        transition: all 0.2s;
    }
    .btn-action:hover {
        transform: translateY(-1px);
    }
    .badge-status {
        padding: 0.5em 0.8em;
        border-radius: 0.5rem;
        font-weight: 500;
    }
</style>

<div class="container main-container">

    {{-- Header Section --}}
    <div class="header-section d-flex justify-content-between align-items-center shadow">
        <div>
            <h3 class="fw-bold mb-0">Dashboard Koleksi</h3>
            <p class="mb-0 opacity-75 small">Kelola dan telusuri pustaka buku Anda</p>
        </div>

        @if (Auth::user()->role == 'admin')
            <a href="{{ route('books.create') }}" class="btn btn-light fw-bold px-4 py-2 shadow-sm rounded-pill">
                <i class="bi bi-plus-lg me-1"></i> Tambah Buku
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
                            <th>Judul Buku</th>
                            <th>Penulis</th>
                            <th>Penerbit</th>
                            <th class="text-center">Tahun</th>
                            <th class="text-end px-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($books as $book)
                            <tr>
                                <td>
                                    <span class="fw-bold text-dark">{{ $book->title }}</span>
                                </td>
                                <td><span class="text-muted">{{ $book->author }}</span></td>
                                <td><span class="text-muted">{{ $book->publisher }}</span></td>
                                <td class="text-center">
                                    <span class="badge bg-light text-dark border">{{ $book->year }}</span>
                                </td>
                                <td class="text-end px-4">
                                    @if (Auth::user()->role == 'admin')
                                        <div class="btn-group gap-2">
                                            <a href="{{ route('books.edit', $book->id) }}"
                                                class="btn btn-outline-dark btn-sm btn-action">
                                                Edit
                                            </a>

                                            <form action="{{ route('books.destroy', $book->id) }}"
                                                method="POST" class="d-inline"
                                                onsubmit="return confirm('Yakin ingin menghapus buku ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm btn-action">
                                                    Hapus
                                                </button>
                                            </form>
                                        </div>
                                    @else
                                        @if (!$book->is_borrowed)
                                            <form method="POST" action="{{ route('transactions.borrow', $book->id) }}">
                                                @csrf
                                                <button class="btn btn-dark btn-sm btn-action px-4">
                                                    Pinjam
                                                </button>
                                            </form>
                                        @else
                                            <span class="badge-status bg-secondary-subtle text-secondary small">
                                                Terpinjam
                                            </span>
                                        @endif
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5">
                                    <div class="py-4">
                                        <p class="text-muted mb-0">Belum ada data buku tersedia.</p>
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