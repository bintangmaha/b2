@extends('layouts.app')

@section('title', 'Kelola User')

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
        font-size: 0.75rem;
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
    .role-badge {
        padding: 0.4em 0.8em;
        border-radius: 0.5rem;
        font-weight: 600;
        font-size: 0.7rem;
        text-transform: uppercase;
    }
    .btn-action {
        border-radius: 0.5rem;
        padding: 0.4rem 0.8rem;
        font-weight: 600;
        transition: 0.2s;
    }
    .user-id-text {
        font-family: 'Monaco', 'Consolas', monospace;
        font-size: 0.85rem;
        color: #718096;
    }
</style>

<div class="container main-container">

    {{-- Header Section --}}
    <div class="header-section d-flex justify-content-between align-items-center shadow">
        <div>
            <h3 class="fw-bold mb-0">Manajemen Pengguna</h3>
            <p class="mb-0 opacity-75 small">Kelola data anggota dan hak akses sistem</p>
        </div>

        @if (Auth::user()->role === 'admin')
            <a href="{{ route('users.create') }}" class="btn btn-light fw-bold px-4 py-2 shadow-sm rounded-pill">
                <i class="bi bi-person-plus-fill me-1"></i> Tambah User
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
                            <th>Identitas Siswa</th>
                            <th>Nama Lengkap</th>
                            <th>Username</th>
                            <th class="text-center">Role</th>
                            <th class="text-end px-4">Opsi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($users as $user)
                            <tr>
                                {{-- Identitas --}}
                                <td>
                                    <div class="fw-bold text-dark mb-1">{{ $user->class }} - {{ $user->major }}</div>
                                    <div class="user-id-text">NIS: {{ $user->school_id }}</div>
                                </td>

                                {{-- Nama --}}
                                <td>
                                    <span class="fw-medium">{{ $user->name }}</span>
                                </td>

                                {{-- Username --}}
                                <td>
                                    <code class="text-primary bg-primary-subtle px-2 py-1 rounded small">
                                        {{ '@' . $user->username }}
                                    </code>
                                </td>

                                {{-- Role --}}
                                <td class="text-center">
                                    @if($user->role === 'admin')
                                        <span class="role-badge bg-dark text-white">
                                            {{ $user->role }}
                                        </span>
                                    @else
                                        <span class="role-badge bg-secondary-subtle text-secondary-emphasis border border-secondary-subtle">
                                            {{ $user->role }}
                                        </span>
                                    @endif
                                </td>

                                {{-- Aksi --}}
                                <td class="text-end px-4">
                                    <div class="d-flex justify-content-end gap-2">
                                        <a href="{{ route('users.edit', $user->id) }}" 
                                           class="btn btn-outline-dark btn-sm btn-action">
                                            Edit
                                        </a>

                                        @if (Auth::id() !== $user->id)
                                            <form action="{{ route('users.destroy', $user->id) }}" method="POST"
                                                  onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-danger btn-sm btn-action">
                                                    Hapus
                                                </button>
                                            </form>
                                        @else
                                            <span class="btn btn-sm btn-action disabled border-0 text-muted italic">
                                                (Self)
                                            </span>
                                        @endif
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="text-center py-5 text-muted">
                                    Belum ada data pengguna.
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