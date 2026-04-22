@extends('layouts.app')

@section('title', 'Tambah Jurusan')
@section('page-title', 'Jurusan')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Tambah Jurusan</h1>
        <p class="page-header-subtitle">Isi formulir di bawah untuk menambahkan data jurusan baru.</p>
    </div>
    <a href="{{ route('jurusan.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="row">
    <div class="col-12 col-lg-8 col-xl-6">
        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-building-fill" style="color:#1a3c5e;"></i>
                Form Data Jurusan
            </div>
            <div class="card-body">
                <form action="{{ route('jurusan.store') }}" method="POST" id="form-jurusan">
                    @csrf

                    {{-- Nama Jurusan --}}
                    <div class="mb-4">
                        <label for="nama_jurusan" class="form-label">
                            Nama Jurusan <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-building"></i></span>
                            <input
                                type="text"
                                class="form-control @error('nama_jurusan') is-invalid @enderror"
                                id="nama_jurusan"
                                name="nama_jurusan"
                                value="{{ old('nama_jurusan') }}"
                                placeholder="Contoh: Teknik Informatika"
                                required
                                autofocus
                            >
                            @error('nama_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text mt-1" style="font-size:0.77rem; color:#94a3b8;">
                            Masukkan nama lengkap jurusan.
                        </div>
                    </div>

                    {{-- Akreditasi --}}
                    <div class="mb-4">
                        <label for="akreditasi" class="form-label">
                            Akreditasi <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-award"></i></span>
                            <select
                                class="form-select @error('akreditasi') is-invalid @enderror"
                                id="akreditasi"
                                name="akreditasi"
                                required
                                style="border-radius: 0 7px 7px 0;"
                            >
                                <option value="">-- Pilih Akreditasi --</option>
                                @foreach(['A', 'B', 'C', 'Unggul', 'Baik Sekali', 'Baik'] as $akr)
                                    <option value="{{ $akr }}" {{ old('akreditasi') == $akr ? 'selected' : '' }}>
                                        {{ $akr }}
                                    </option>
                                @endforeach
                            </select>
                            @error('akreditasi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <hr class="my-4" style="border-color:#e5e9ef;">

                    {{-- Actions --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-primary d-flex align-items-center gap-2" id="btn-submit">
                            <i class="bi bi-floppy-fill"></i>
                            Simpan Data
                        </button>
                        <a href="{{ route('jurusan.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                            <i class="bi bi-x-circle"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('form-jurusan').addEventListener('submit', function () {
        const btn = document.getElementById('btn-submit');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Menyimpan...';
    });
</script>
@endpush
