@extends('layouts.app')

@section('title', 'Edit Mahasiswa')
@section('page-title', 'Mahasiswa')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Edit Mahasiswa</h1>
        <p class="page-header-subtitle">Perbarui informasi data mahasiswa di bawah ini.</p>
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
                <i class="bi bi-pencil-square" style="color:#d97706;"></i>
                Edit Data Mahasiswa
                <span class="ms-auto badge" style="background-color:#fef3c7; color:#92400e; font-size:0.73rem;">
                    NIM: {{ $mahasiswa->nim }}
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('mahasiswa.update', $mahasiswa->id_mahasiswa) }}" method="POST" id="form-edit-mahasiswa">
                    @csrf
                    @method('PUT')

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
                                    value="{{ old('nim', $mahasiswa->nim) }}"
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
                                    value="{{ old('nama', $mahasiswa->nama) }}"
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
                                        {{ old('id_jurusan', $mahasiswa->id_jurusan) == $item->id_jurusan ? 'selected' : '' }}>
                                        {{ $item->nama_jurusan }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_jurusan')
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
                        <a href="{{ route('mahasiswa.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
                            <i class="bi bi-x-circle"></i>
                            Batal
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    {{-- Current Data Preview --}}
    <div class="col-12 col-lg-4 col-xl-5">
        <div class="card" style="border-left:3px solid #d97706;">
            <div class="card-header" style="font-size:0.82rem;">
                <i class="bi bi-file-earmark-person-fill me-1" style="color:#d97706;"></i>
                Data Saat Ini
            </div>
            <div class="card-body py-3">
                <ul class="list-unstyled mb-0" style="font-size:0.845rem;">
                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">NIM</span>
                        <strong>{{ $mahasiswa->nim }}</strong>
                    </li>
                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Nama</span>
                        <strong>{{ $mahasiswa->nama }}</strong>
                    </li>
                    <li class="d-flex justify-content-between py-2">
                        <span class="text-muted">Jurusan</span>
                        <strong>{{ $mahasiswa->jurusan->nama_jurusan ?? '-' }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('form-edit-mahasiswa').addEventListener('submit', function () {
        const btn = document.getElementById('btn-update');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Memperbarui...';
    });
</script>
@endpush
