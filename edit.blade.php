@extends('layouts.app')

@section('title', 'Edit Buku')

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
        background: #1a202c; /* Warna senada dengan login button */
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
    .form-control {
        border-radius: 0.75rem;
        padding: 0.75rem 1rem;
        border: 1px solid #e2e8f0;
        transition: all 0.2s;
    }
    .form-control:focus {
        box-shadow: 0 0 0 4px rgba(0, 0, 0, 0.05);
        border-color: #1a202c;
    }
    .btn-update {
        background-color: #ffffff;
        color: #1a202c;
        border: none;
        border-radius: 0.75rem;
        padding: 0.6rem 1.5rem;
        font-weight: 700;
        transition: all 0.3s;
    }
    .btn-update:hover {
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
        <div class="col-lg-8">
            
            {{-- Header Section --}}
            <div class="header-section d-flex justify-content-between align-items-center shadow">
                <div>
                    <h3 class="fw-bold mb-0">Edit Buku</h3>
                    <p class="mb-0 opacity-75 small">Perbarui informasi detail buku koleksi</p>
                </div>
                <button type="submit" form="form-book" class="btn btn-update shadow-sm">
                    Edit
                </button>
            </div>

            {{-- Form Section --}}
            <div class="card custom-card shadow-sm">
                <div class="card-body p-4 p-md-5">
                    <form id="form-book" action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="row g-4">
                            {{-- Kode Buku --}}
                            <div class="col-md-4">
                                <label class="form-label">Kode Buku</label>
                                <input type="text" name="book_code" 
                                    value="{{ old('book_code', $book->book_code) }}"
                                    class="form-control @error('book_code') is-invalid @enderror"
                                    placeholder="BK001">
                                @error('book_code')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Judul --}}
                            <div class="col-md-8">
                                <label class="form-label">Judul Buku</label>
                                <input type="text" name="title" 
                                    value="{{ old('title', $book->title) }}"
                                    class="form-control @error('title') is-invalid @enderror"
                                    placeholder="Masukkan judul buku">
                                @error('title')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Penulis --}}
                            <div class="col-md-6">
                                <label class="form-label">Penulis</label>
                                <input type="text" name="author" 
                                    value="{{ old('author', $book->author) }}"
                                    class="form-control @error('author') is-invalid @enderror"
                                    placeholder="Nama penulis">
                                @error('author')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Penerbit --}}
                            <div class="col-md-6">
                                <label class="form-label">Penerbit</label>
                                <input type="text" name="publisher" 
                                    value="{{ old('publisher', $book->publisher) }}"
                                    class="form-control @error('publisher') is-invalid @enderror"
                                    placeholder="Nama penerbit">
                                @error('publisher')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            {{-- Tahun --}}
                            <div class="col-md-4">
                                <label class="form-label">Tahun Terbit</label>
                                <input type="number" name="year" 
                                    value="{{ old('year', $book->year) }}"
                                    class="form-control @error('year') is-invalid @enderror"
                                    placeholder="2024">
                                @error('year')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- <hr class="my-5 opacity-50"> -->
                         <br>
                         <br>

                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('books.index') }}" class="btn-cancel small">
                                <i class="bi bi-arrow-left me-1"></i> Batal dan Kembali
                            </a>
                            <p class="text-muted small mb-0 italic">ID Buku: <span class="fw-bold">#{{ $book->id }}</span></p>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>
@endsection