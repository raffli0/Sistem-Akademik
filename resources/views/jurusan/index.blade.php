@extends('layouts.app')

@section('title', 'Daftar Jurusan')
@section('page-title', 'Jurusan')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Daftar Jurusan</h1>
        <p class="page-header-subtitle">Kelola seluruh data jurusan yang tersedia di sistem.</p>
    </div>
    <a href="{{ route('jurusan.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i>
        Tambah Jurusan
    </a>
</div>

{{-- Table Card --}}
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span class="d-flex align-items-center gap-2">
            <i class="bi bi-building-fill" style="color:#1a3c5e;"></i>
            Data Jurusan
        </span>
        <span class="badge" style="background-color:#e8f0fe; color:#1a3c5e; font-size:0.75rem;">
            {{ $jurusan->total() }} Total
        </span>
    </div>

    <div class="card-body p-0">
        @if($jurusan->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-inbox fs-1 d-block mb-3" style="color:#cbd5e1;"></i>
                <p class="mb-1 fw-semibold">Belum Ada Data Jurusan</p>
                <p class="mb-3" style="font-size:0.82rem;">Tambahkan jurusan pertama untuk memulai.</p>
                <a href="{{ route('jurusan.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Sekarang
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th style="width:60px;">No</th>
                            <th>Nama Jurusan</th>
                            <th style="width:130px;">Akreditasi</th>
                            <th style="width:140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($jurusan as $item)
                            <tr>
                                <td class="text-muted fw-500">
                                    {{ ($jurusan->currentPage() - 1) * $jurusan->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width:32px; height:32px; border-radius:8px; background-color:#e8f0fe; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                            <i class="bi bi-building" style="color:#2563eb; font-size:0.85rem;"></i>
                                        </div>
                                        <span class="fw-semibold">{{ $item->nama_jurusan }}</span>
                                    </div>
                                </td>
                                <td>
                                    @php
                                        $akrColor = match($item->akreditasi) {
                                            'A'     => ['bg' => '#dcfce7', 'color' => '#15803d'],
                                            'B'     => ['bg' => '#dbeafe', 'color' => '#1d4ed8'],
                                            'C'     => ['bg' => '#fef9c3', 'color' => '#a16207'],
                                            default => ['bg' => '#f1f5f9', 'color' => '#475569'],
                                        };
                                    @endphp
                                    <span class="badge" style="background-color:{{ $akrColor['bg'] }}; color:{{ $akrColor['color'] }}; font-size:0.78rem;">
                                        Akreditasi {{ $item->akreditasi }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('jurusan.edit', $item->id_jurusan) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-fill me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('jurusan.destroy', $item->id_jurusan) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus jurusan \'{{ $item->nama_jurusan }}\'? Tindakan ini tidak dapat dibatalkan.')">
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
            @if($jurusan->hasPages())
                <div class="d-flex align-items-center justify-content-between px-4 py-3 border-top">
                    <p class="mb-0 text-muted" style="font-size:0.8rem;">
                        Menampilkan {{ $jurusan->firstItem() }}&ndash;{{ $jurusan->lastItem() }}
                        dari {{ $jurusan->total() }} data
                    </p>
                    <div>
                        {{ $jurusan->links() }}
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>

@endsection
