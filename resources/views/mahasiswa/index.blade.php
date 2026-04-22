@extends('layouts.app')

@section('title', 'Daftar Mahasiswa')
@section('page-title', 'Mahasiswa')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Daftar Mahasiswa</h1>
        <p class="page-header-subtitle">Kelola seluruh data mahasiswa yang terdaftar di sistem.</p>
    </div>
    <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i>
        Tambah Mahasiswa
    </a>
</div>

{{-- Table Card --}}
<div class="card shadow-sm border-0">
    <div class="card-header bg-white py-3">
        <div class="row align-items-center g-3">
            {{-- Bagian Judul --}}
            <div class="col-12 col-md-4">
                <span class="d-flex align-items-center gap-2 fw-bold text-dark">
                    <i class="bi bi-people-fill" style="color:#16a34a;"></i>
                    Data Mahasiswa
                    <span class="badge rounded-pill" style="background-color:#dcfce7; color:#15803d; font-size:0.7rem;">
                        {{ $mahasiswa->total() }} Total
                    </span>
                </span>
            </div>
            
            {{-- Bagian Search Bar --}}
            <div class="col-12 col-md-8">
                <form action="{{ route('mahasiswa.index') }}" method="GET" class="d-flex gap-2 justify-content-md-end">
                    <div class="input-group input-group-sm border rounded-2 overflow-hidden shadow-sm" style="max-width: 300px;">
                    <span class="input-group-text bg-white border-0">
                        <i class="bi bi-search text-muted"></i>
                    </span>
                        <input type="text" 
                               name="search" 
                               class="form-control border-0 shadow-none ps-0" 
                               placeholder="Cari NIM atau Nama..." 
                               value="{{ request('search') }}">
                    </div>
                    <button type="submit" class="btn btn-dark btn-sm px-3">Cari</button>
                    @if(request('search'))
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-light btn-sm border" title="Reset">
                            <i class="bi bi-arrow-clockwise"></i>
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        @if($mahasiswa->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-people fs-1 d-block mb-3" style="color:#cbd5e1;"></i>
                <p class="mb-1 fw-semibold">Belum Ada Data Mahasiswa</p>
                <p class="mb-3" style="font-size:0.82rem;">Tambahkan mahasiswa pertama untuk memulai.</p>
                <a href="{{ route('mahasiswa.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Sekarang
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th style="width:60px;">No</th>
                            <th style="width:140px;">NIM</th>
                            <th>Nama Mahasiswa</th>
                            <th style="width:180px;">Jurusan</th>
                            <th style="width:140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($mahasiswa as $item)
                            <tr>
                                <td class="text-muted">
                                    {{ ($mahasiswa->currentPage() - 1) * $mahasiswa->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <span class="badge" style="background-color:#e8f0fe; color:#1d4ed8; font-size:0.8rem; font-weight:600; font-family:monospace; letter-spacing:0.05em;">
                                        {{ $item->nim }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width:32px; height:32px; border-radius:50%; background-color:#dcfce7; display:flex; align-items:center; justify-content:center; flex-shrink:0; font-size:0.75rem; font-weight:700; color:#15803d;">
                                            {{ strtoupper(substr($item->nama, 0, 1)) }}
                                        </div>
                                        <span class="fw-semibold">{{ $item->nama }}</span>
                                    </div>
                                </td>
                                <td>
                                    <span class="badge" style="background-color:#f1f5f9; color:#334155; font-size:0.78rem; font-weight:500;">
                                        <i class="bi bi-building me-1"></i>{{ $item->jurusan->nama_jurusan ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('mahasiswa.edit', $item->id_mahasiswa) }}"
                                           class="btn btn-sm btn-warning" title="Edit Mahasiswa">
                                            <i class="bi bi-pencil-fill me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('mahasiswa.destroy', $item->id_mahasiswa) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus mahasiswa \'{{ $item->nama }}\'?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                <i class="bi bi-trash-fill me-1"></i>Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            {{-- Pagination --}}
            @if($mahasiswa->hasPages())
                <div class="d-flex align-items-center justify-content-between px-4 py-3 border-top">
                    <p class="mb-0 text-muted" style="font-size:0.8rem;">
                        Menampilkan {{ $mahasiswa->firstItem() }}&ndash;{{ $mahasiswa->lastItem() }}
                        dari {{ $mahasiswa->total() }} data
                    </p>
                    <div>
                        {{ $mahasiswa->links() }}
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>

@endsection
