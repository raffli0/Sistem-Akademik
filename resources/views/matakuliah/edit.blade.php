@extends('layouts.app')

@section('title', 'Edit Matakuliah')
@section('page-title', 'Matakuliah')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Edit Matakuliah</h1>
        <p class="page-header-subtitle">Perbarui informasi data matakuliah di bawah ini.</p>
    </div>
    <a href="{{ route('matakuliah.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
        <i class="bi bi-arrow-left"></i>
        Kembali
    </a>
</div>

<div class="row">
    <div class="col-12 col-lg-8 col-xl-7">
        <div class="card">
            <div class="card-header d-flex align-items-center gap-2">
                <i class="bi bi-pencil-square" style="color:#d97706;"></i>
                Edit Data Matakuliah
                <span class="ms-auto badge" style="background-color:#fef3c7; color:#92400e; font-size:0.73rem;">
                    ID: {{ $matakuliah->id_matakuliah }}
                </span>
            </div>
            <div class="card-body">
                <form action="{{ route('matakuliah.update', $matakuliah->id_matakuliah) }}" method="POST" id="form-edit-matakuliah">
                    @csrf
                    @method('PUT')

                    {{-- Nama Matakuliah --}}
                    <div class="mb-3">
                        <label for="nama_matakuliah" class="form-label">
                            Nama Matakuliah <span class="text-danger">*</span>
                        </label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="bi bi-book"></i></span>
                            <input
                                type="text"
                                class="form-control @error('nama_matakuliah') is-invalid @enderror"
                                id="nama_matakuliah"
                                name="nama_matakuliah"
                                value="{{ old('nama_matakuliah', $matakuliah->nama_matakuliah) }}"
                                placeholder="Contoh: Basis Data"
                                required
                                autofocus
                            >
                            @error('nama_matakuliah')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="row g-3 mb-3">
                        {{-- SKS --}}
                        <div class="col-12 col-sm-5">
                            <label for="sks" class="form-label">
                                SKS <span class="text-danger">*</span>
                            </label>
                            <div class="input-group">
                                <span class="input-group-text"><i class="bi bi-123"></i></span>
                                <input
                                    type="number"
                                    class="form-control @error('sks') is-invalid @enderror"
                                    id="sks"
                                    name="sks"
                                    value="{{ old('sks', $matakuliah->sks) }}"
                                    min="1"
                                    max="6"
                                    placeholder="1 - 6"
                                    required
                                >
                                @error('sks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        {{-- Jurusan --}}
                        <div class="col-12 col-sm-7">
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
                                            {{ old('id_jurusan', $matakuliah->id_jurusan) == $item->id_jurusan ? 'selected' : '' }}>
                                            {{ $item->nama_jurusan }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('id_jurusan')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <hr class="my-4" style="border-color:#e5e9ef;">

                    {{-- Actions --}}
                    <div class="d-flex gap-2">
                        <button type="submit" class="btn btn-warning d-flex align-items-center gap-2" id="btn-update">
                            <i class="bi bi-floppy-fill"></i>
                            Perbarui Data
                        </button>
                        <a href="{{ route('matakuliah.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2">
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
                <i class="bi bi-journal-text me-1" style="color:#d97706;"></i>
                Data Saat Ini
            </div>
            <div class="card-body py-3">
                <ul class="list-unstyled mb-0" style="font-size:0.845rem;">
                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">Nama</span>
                        <strong>{{ $matakuliah->nama_matakuliah }}</strong>
                    </li>
                    <li class="d-flex justify-content-between py-2 border-bottom">
                        <span class="text-muted">SKS</span>
                        <strong>{{ $matakuliah->sks }} SKS</strong>
                    </li>
                    <li class="d-flex justify-content-between py-2">
                        <span class="text-muted">Jurusan</span>
                        <strong>{{ $matakuliah->jurusan->nama_jurusan ?? '-' }}</strong>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('form-edit-matakuliah').addEventListener('submit', function () {
        const btn = document.getElementById('btn-update');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Memperbarui...';
    });
</script>
@endpush
