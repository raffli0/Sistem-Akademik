@extends('layouts.app')

@section('title', 'Edit Jurusan')
@section('page-title', 'Jurusan')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Edit Jurusan</h1>
        <p class="page-header-subtitle">Perbarui informasi data jurusan di bawah ini.</p>
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
                <i class="bi bi-pencil-square" style="color:#d97706;"></i>
                Edit Data Jurusan
                <span class="ms-auto badge" style="background-color:#fef3c7; color:#92400e; font-size:0.73rem;">
                    ID: {{ $jurusan->id_jurusan }}
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('jurusan.update', $jurusan->id_jurusan) }}" method="POST" id="form-edit-jurusan">
                    @csrf
                    @method('PUT')

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
                                value="{{ old('nama_jurusan', $jurusan->nama_jurusan) }}"
                                placeholder="Contoh: Teknik Informatika"
                                required
                                autofocus
                            >
                            @error('nama_jurusan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
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
                                    <option value="{{ $akr }}"
                                        {{ old('akreditasi', $jurusan->akreditasi) == $akr ? 'selected' : '' }}>
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
                        <button type="submit" class="btn btn-warning d-flex align-items-center gap-2" id="btn-update">
                            <i class="bi bi-floppy-fill"></i>
                            Perbarui Data
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
    document.getElementById('form-edit-jurusan').addEventListener('submit', function () {
        const btn = document.getElementById('btn-update');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Memperbarui...';
    });
</script>
@endpush
