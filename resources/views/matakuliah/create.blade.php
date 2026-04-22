@extends('layouts.app')

@section('title', 'Tambah Matakuliah')
@section('page-title', 'Matakuliah')

@section('content')

{{-- Page Header --}}
<div class="page-header">
    <div>
        <h1 class="page-header-title">Tambah Matakuliah</h1>
        <p class="page-header-subtitle">Isi formulir di bawah untuk menambahkan matakuliah baru.</p>
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
                <i class="bi bi-journal-plus" style="color:#dc2626;"></i>
                Form Data Matakuliah
            </div>
            <div class="card-body">
                <form action="{{ route('matakuliah.store') }}" method="POST" id="form-matakuliah">
                    @csrf

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
                                value="{{ old('nama_matakuliah') }}"
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
                                    value="{{ old('sks') }}"
                                    min="1"
                                    max="6"
                                    placeholder="1 - 6"
                                    required
                                >
                                @error('sks')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-text mt-1" style="font-size:0.77rem; color:#94a3b8;">Antara 1 hingga 6 SKS.</div>
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
                                            {{ old('id_jurusan') == $item->id_jurusan ? 'selected' : '' }}>
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
                        <button type="submit" class="btn btn-primary d-flex align-items-center gap-2" id="btn-submit">
                            <i class="bi bi-floppy-fill"></i>
                            Simpan Data
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

    {{-- Info Panel --}}
    <div class="col-12 col-lg-4 col-xl-5">
        <div class="card" style="border-left:3px solid #dc2626;">
            <div class="card-header" style="font-size:0.82rem;">
                <i class="bi bi-info-circle-fill me-1" style="color:#dc2626;"></i>
                Petunjuk Pengisian
            </div>
            <div class="card-body py-3">
                <ul class="list-unstyled mb-0" style="font-size:0.82rem; color:#64748b;">
                    <li class="mb-2 d-flex gap-2">
                        <i class="bi bi-dot fs-5 flex-shrink-0" style="margin-top:-4px;"></i>
                        <span><strong>Nama Matakuliah</strong> diisi dengan nama lengkap dan jelas.</span>
                    </li>
                    <li class="mb-2 d-flex gap-2">
                        <i class="bi bi-dot fs-5 flex-shrink-0" style="margin-top:-4px;"></i>
                        <span><strong>SKS</strong> diisi dengan angka antara 1 hingga 6.</span>
                    </li>
                    <li class="d-flex gap-2">
                        <i class="bi bi-dot fs-5 flex-shrink-0" style="margin-top:-4px;"></i>
                        <span><strong>Jurusan</strong> menentukan kepemilikan matakuliah ini.</span>
                    </li>
                </ul>
            </div>
        </div>

        {{-- SKS Guide --}}
        <div class="card mt-3" style="border-left:3px solid #d97706;">
            <div class="card-header" style="font-size:0.82rem;">
                <i class="bi bi-bookmark-fill me-1" style="color:#d97706;"></i>
                Panduan SKS
            </div>
            <div class="card-body py-3">
                <div class="d-flex flex-wrap gap-2">
                    @foreach([1,2,3,4,5,6] as $s)
                        @php
                            $bg    = $s >= 4 ? '#fef3c7' : ($s == 3 ? '#dbeafe' : '#f1f5f9');
                            $color = $s >= 4 ? '#92400e'  : ($s == 3 ? '#1d4ed8'  : '#475569');
                        @endphp
                        <span class="badge" style="background-color:{{ $bg }}; color:{{ $color }}; font-size:0.78rem;">
                            {{ $s }} SKS
                        </span>
                    @endforeach
                </div>
                <p class="mb-0 mt-2" style="font-size:0.77rem; color:#94a3b8;">Nilai SKS umumnya 2–4 per matakuliah.</p>
            </div>
        </div>
    </div>
</div>

@endsection

@push('scripts')
<script>
    document.getElementById('form-matakuliah').addEventListener('submit', function () {
        const btn = document.getElementById('btn-submit');
        btn.disabled = true;
        btn.innerHTML = '<span class="spinner-border spinner-border-sm me-1"></span> Menyimpan...';
    });
</script>
@endpush
