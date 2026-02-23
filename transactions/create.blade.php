@extends('layouts.app')

@section('title', 'Tambah Transaksi')

@section('content')
<style>
    body {
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
    .form-label {
        font-weight: 600;
        font-size: 0.85rem;
        color: #4a5568;
        margin-bottom: 0.5rem;
    }
    .form-control, .form-select {
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        transition: all 0.2s;
    }
    .form-control:focus, .form-select:focus {
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
        border-color: #1a202c;
    }
    .btn-save {
        background-color: #ffffff;
        color: #1a202c;
        border: none;
        border-radius: 0.75rem;
        padding: 0.6rem 1.5rem;
        font-weight: 700;
        transition: all 0.3s;
    }
    .btn-save:hover {
        background-color: #f8fafc;
        transform: translateY(-1px);
        box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        color: #1a202c;
    }
    .btn-cancel {
        border-radius: 0.75rem;
        padding: 0.75rem;
        font-weight: 600;
        text-decoration: none;
        color: #718096;
        transition: 0.2s;
    }
    .btn-cancel:hover {
        color: #1a202c;
    }
</style>

<div class="container main-container">
    <div class="row justify-content-center">
        <div class="col-lg-7">
            
            {{-- Header Section --}}
            <div class="header-section d-flex justify-content-between align-items-center shadow">
                <div>
                    <h3 class="fw-bold mb-0">Catat Peminjaman</h3>
                    <p class="mb-0 opacity-75 small">Input data transaksi buku terbaru</p>
                </div>
                <button type="submit" form="form-transaction" class="btn btn-save shadow-sm">
                    Simpan Transaksi
                </button>
            </div>

            {{-- Form Section --}}
            <div class="card custom-card shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form id="form-transaction" action="{{ route('transactions.store') }}" method="POST">
                        @csrf

                        <div class="row g-4">
                            {{-- Buku --}}
                            <div class="col-12">
                                <label class="form-label">Pilih Buku</label>
                                <select name="book_id" class="form-select @error('book_id') is-invalid @enderror">
                                    <option value="" selected disabled>Cari judul buku...</option>
                                    @foreach ($books as $book)
                                        <option value="{{ $book->id }}" {{ old('book_id') == $book->id ? 'selected' : '' }}>
                                            {{ $book->book_code }} - {{ $book->title }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('book_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Peminjam --}}
                            <div class="col-12">
                                <label class="form-label">Nama Peminjam</label>
                                <select name="user_id" class="form-select @error('user_id') is-invalid @enderror">
                                    <option value="" selected disabled>Pilih anggota...</option>
                                    @foreach ($users as $user)
                                        <option value="{{ $user->id }}" {{ old('user_id') == $user->id ? 'selected' : '' }}>
                                            {{ $user->name }} ({{ $user->school_id }})
                                        </option>
                                    @endforeach
                                </select>
                                @error('user_id')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tanggal Pinjam --}}
                            <div class="col-md-6">
                                <label class="form-label">Tanggal Pinjam</label>
                                <input type="date" name="borrowed_at" 
                                    value="{{ old('borrowed_at', date('Y-m-d')) }}"
                                    class="form-control @error('borrowed_at') is-invalid @enderror">
                                @error('borrowed_at')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- <hr class="my-5 opacity-50"> -->
                         <br>
                         <br>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('transactions.index') }}" class="btn-cancel small">
                                <i class="bi bi-arrow-left me-1"></i> Batal
                            </a>
                            <div class="text-end">
                                <span class="badge bg-light text-dark border fw-normal">Status Otomatis: <b>Dipinjam</b></span>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection