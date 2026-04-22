@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Welcome Banner --}}
<div class="card mb-4" style="border-left: 4px solid #2563eb;">
    <div class="card-body py-3 d-flex align-items-center justify-content-between flex-wrap gap-2">
        <div>
            <h5 class="mb-1 fw-700" style="font-size:1rem; font-weight:700;">
                Selamat datang, {{ auth()->user()->name }}!
            </h5>
            <p class="mb-0 text-muted" style="font-size:0.82rem;">
                <i class="bi bi-calendar3 me-1"></i>
                {{ now()->translatedFormat('l, d F Y') }} &nbsp;&bull;&nbsp;
                Berikut ringkasan data akademik Anda hari ini.
            </p>
        </div>
        <div>
            <span class="badge" style="background-color:#2563eb; font-size:0.75rem; padding:6px 12px;">
                <i class="bi bi-person-fill me-1"></i>Administrator
            </span>
        </div>
    </div>
</div>

{{-- Stat Cards --}}
<div class="row g-3 mb-4">

    {{-- Jurusan --}}
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card stat-primary">
            <div class="stat-card-icon">
                <i class="bi bi-building-fill"></i>
            </div>
            <div class="stat-card-body">
                <div class="stat-card-label">Total Jurusan</div>
                <div class="stat-card-number">{{ $totalJurusan }}</div>
                <a href="{{ route('jurusan.index') }}" class="stat-card-link">
                    Kelola Data <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Mahasiswa --}}
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card stat-success">
            <div class="stat-card-icon">
                <i class="bi bi-people-fill"></i>
            </div>
            <div class="stat-card-body">
                <div class="stat-card-label">Total Mahasiswa</div>
                <div class="stat-card-number">{{ $totalMahasiswa }}</div>
                <a href="{{ route('mahasiswa.index') }}" class="stat-card-link">
                    Kelola Data <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

    {{-- Matakuliah --}}
    <div class="col-12 col-sm-6 col-xl-4">
        <div class="stat-card stat-danger">
            <div class="stat-card-icon">
                <i class="bi bi-book-half"></i>
            </div>
            <div class="stat-card-body">
                <div class="stat-card-label">Total Matakuliah</div>
                <div class="stat-card-number">{{ $totalMatakuliah }}</div>
                <a href="{{ route('matakuliah.index') }}" class="stat-card-link">
                    Kelola Data <i class="bi bi-arrow-right ms-1"></i>
                </a>
            </div>
        </div>
    </div>

</div>

{{-- Quick Actions --}}
<div class="row g-3">
    <div class="col-12 col-lg-6">
        <div class="card h-100">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-lightning-charge-fill text-warning"></i>
                Aksi Cepat
            </div>
            <div class="card-body">
                <div class="row g-2">
                    <div class="col-6">
                        <a href="{{ route('jurusan.create') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center gap-2 justify-content-center py-2">
                            <i class="bi bi-plus-circle" style="color:#1a3c5e;"></i>
                            <span>Tambah Jurusan</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('mahasiswa.create') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center gap-2 justify-content-center py-2">
                            <i class="bi bi-person-plus" style="color:#16a34a;"></i>
                            <span>Tambah Mahasiswa</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('matakuliah.create') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center gap-2 justify-content-center py-2">
                            <i class="bi bi-journal-plus" style="color:#dc2626;"></i>
                            <span>Tambah Matakuliah</span>
                        </a>
                    </div>
                    <div class="col-6">
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary w-100 d-flex align-items-center gap-2 justify-content-center py-2">
                            <i class="bi bi-table" style="color:#0284c7;"></i>
                            <span>Lihat Semua Data</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
