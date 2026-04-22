@extends('layouts.app')

@section('title', 'Tambah Mahasiswa')
@section('page-title', 'Mahasiswa')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Tambah Mahasiswa</h1>
        <p class="page-header-subtitle">Isi formulir di bawah untuk mendaftarkan mahasiswa baru.</p>
    </div>
    <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="row">
    <div class="col-12 col-lg-8 col-xl-7">
        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-person-plus-fill" style="color:#16a34a;"></i>
                Form Data Mahasiswa
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.store') }}" method="POST" id="form-mahasiswa">
                    @csrf

                    <div class="row g-3 mb-3">
                        {{-- NIM --}}
                        <div class="col-12 col-sm-5">
                            <label for="nim" class="form-label">
                                NIM <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-hash"></i></span>
                                <input
                                    type="text"
                                    class="form-control @error('nim') is-invalid @enderror"
                                    id="nim"
                                    name="nim"
                                    value="{{ old('nim') }}"
                                    placeholder="Contoh: 2021001"
                                    required
                                    autofocus
                                >
                                @error('nim')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Nama --}}
                        <div class="col-12 col-sm-7">
                            <label for="nama" class="form-label">
                                Nama Lengkap <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input
                                    type="text"
                                    class="form-control @error('nama') is-invalid @enderror"
                                    id="nama"
                                    name="nama"
                                    value="{{ old('nama') }}"
                                    placeholder="Nama lengkap mahasiswa"
                                    required
                                >
                                @error('nama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    {{-- Jurusan --}}
                    <div class="mb-4">
                        <label for="id_jurusan" class="form-label">
                            Jurusan <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <select
                                class="form-select @error('id_jurusan') is-invalid @enderror"
                                id="id_jurusan"
                                name="id_jurusan"
                                required
                                style="border-radius: 0 7px 7px 0;"
                            >
                                <option value="">-- Pilih Jurusan --</option>
                                @foreach($jurusan as $item)
                                    <option value="{{ $item->id_jurusan }}"
                                        {{ old('id_jurusan') == $item->id_jurusan ? 'selected' : '' }}>
                                        {{ $item->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text mt-1" style="font-size:0.77rem; color:#94a3b8;">
                            Pilih jurusan tempat mahasiswa terdaftar.
                        </div>
                    </div>

                    <hr class="my-4" style="border-color:#e5e9ef;">

                    {{-- Actions --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary d-flex align-items-center gap-2" id="btn-submit">
                            <i class="bi bi-floppy-fill"></i>
                            Simpan Data
                        </button>
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                            <i class="bi bi-x-circle"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Info Panel --}}
    <div class="col-12 col-lg-4 col-xl-5">
        <div class="card" style="border-left:3px solid #2563eb;">
            <div class="card-header" style="font-size:0.82rem;">
                <i class="bi bi-info-circle-fill me-1" style="color:#2563eb;"></i>
                Petunjuk Pengisian
            </div>
            <div class="card-body py-3">
                <ul class="list-unstyled mb-0" style="font-size:0.82rem; color:#64748b;">
                    <li class="mb-2 d-flex gap-2">
                        <i class="bi bi-dot fs-5 flex-shrink-0" style="margin-top:-4px;"></i>
                        <span><strong>NIM</strong> harus unik dan belum terdaftar di sistem.</span>
                    </li>
                    <li class="mb-2 d-flex gap-2">
                        <i class="bi bi-dot fs-5 flex-shrink-0" style="margin-top:-4px;"></i>
                        <span><strong>Nama Lengkap</strong> diisi sesuai identitas resmi.</span>
                    </li>
                    <li class="d-flex gap-2">
                        <i class="bi bi-dot fs-5 flex-shrink-0" style="margin-top:-4px;"></i>
                        <span><strong>Jurusan</strong> harus dipilih dari daftar yang tersedia.</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('form-mahasiswa').addEventListener('submit', function () {
        const btn = document.getElementById('btn-submit');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Menyimpan...';
    });
</script>
@endpush
