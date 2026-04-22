@extends('layouts.app')

@section('title', 'Daftar Matakuliah')
@section('page-title', 'Matakuliah')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Daftar Matakuliah</h1>
        <p class="page-header-subtitle">Kelola seluruh data matakuliah yang tersedia di sistem.</p>
    </div>
    <a href="{{ route('matakuliah.create') }}" class="btn btn-primary d-flex align-items-center gap-2">
        <i class="bi bi-plus-lg"></i>
        Tambah Matakuliah
    </a>
</div>

{{-- Table Card --}}
<div class="card">
    <div class="card-header d-flex align-items-center justify-content-between">
        <span class="d-flex align-items-center gap-2">
            <i class="bi bi-book-half" style="color:#dc2626;"></i>
            Data Matakuliah
        </span>
        <span class="badge" style="background-color:#fee2e2; color:#991b1b; font-size:0.75rem;">
            {{ $matakuliah->total() }} Total
        </span>
    </div>

    <div class="card-body p-0">
        @if($matakuliah->isEmpty())
            <div class="text-center py-5 text-muted">
                <i class="bi bi-book fs-1 d-block mb-3" style="color:#cbd5e1;"></i>
                <p class="mb-1 fw-semibold">Belum Ada Data Matakuliah</p>
                <p class="mb-3" style="font-size:0.82rem;">Tambahkan matakuliah pertama untuk memulai.</p>
                <a href="{{ route('matakuliah.create') }}" class="btn btn-primary btn-sm">
                    <i class="bi bi-plus-lg me-1"></i> Tambah Sekarang
                </a>
            </div>
        @else
            <div class="table-responsive">
                <table class="table table-striped mb-0">
                    <thead>
                        <tr>
                            <th style="width:60px;">No</th>
                            <th>Nama Matakuliah</th>
                            <th style="width:90px; text-align:center;">SKS</th>
                            <th style="width:200px;">Jurusan</th>
                            <th style="width:140px;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($matakuliah as $item)
                            <tr>
                                <td class="text-muted">
                                    {{ ($matakuliah->currentPage() - 1) * $matakuliah->perPage() + $loop->iteration }}
                                </td>
                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <div style="width:32px; height:32px; border-radius:8px; background-color:#fee2e2; display:flex; align-items:center; justify-content:center; flex-shrink:0;">
                                            <i class="bi bi-journal-text" style="color:#dc2626; font-size:0.85rem;"></i>
                                        </div>
                                        <span class="fw-semibold">{{ $item->nama_matakuliah }}</span>
                                    </div>
                                </td>
                                <td class="text-center">
                                    @php
                                        $sksColor = match(true) {
                                            $item->sks >= 4 => ['bg' => '#fef3c7', 'color' => '#92400e'],
                                            $item->sks == 3 => ['bg' => '#dbeafe', 'color' => '#1d4ed8'],
                                            default         => ['bg' => '#f1f5f9', 'color' => '#475569'],
                                        };
                                    @endphp
                                    <span class="badge" style="background-color:{{ $sksColor['bg'] }}; color:{{ $sksColor['color'] }}; font-size:0.8rem;">
                                        {{ $item->sks }} SKS
                                    </span>
                                </td>
                                <td>
                                    <span class="badge" style="background-color:#f1f5f9; color:#334155; font-size:0.78rem; font-weight:500;">
                                        <i class="bi bi-building me-1"></i>{{ $item->jurusan->nama_jurusan ?? '-' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="d-flex gap-1">
                                        <a href="{{ route('matakuliah.edit', $item->id_matakuliah) }}"
                                           class="btn btn-sm btn-warning" title="Edit">
                                            <i class="bi bi-pencil-fill me-1"></i>Edit
                                        </a>
                                        <form action="{{ route('matakuliah.destroy', $item->id_matakuliah) }}"
                                              method="POST" class="d-inline"
                                              onsubmit="return confirm('Yakin ingin menghapus matakuliah \'{{ $item->nama_matakuliah }}\'?')">
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
            @if($matakuliah->hasPages())
                <div class="d-flex align-items-center justify-content-between px-4 py-3 border-top">
                    <p class="mb-0 text-muted" style="font-size:0.8rem;">
                        Menampilkan {{ $matakuliah->firstItem() }}&ndash;{{ $matakuliah->lastItem() }}
                        dari {{ $matakuliah->total() }} data
                    </p>
                    <div>
                        {{ $matakuliah->links() }}
                    </div>
                </div>
            @endif
        @endif
    </div>
</div>

@endsection
