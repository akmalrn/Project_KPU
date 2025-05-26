@extends('backend.layouts.app')
<<<<<<< HEAD
@section('title', 'Tambah Indikator Baru')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Tambah Indikator Baru</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('indikator.index') }}">Indikator</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Tambah Indikator</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Tambah Indikator Baru</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('indikator.store') }}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="poin">Poin</label>
                                            <input type="text" name="poin" id="poin"
                                                class="form-control @error('poin') is-invalid @enderror"
                                                placeholder="Masukkan poin indikator" required>
                                            @error('poin')
                                                <span class="text-danger">{{ $message }}</span>
=======

@section('title', 'Tambah Indikator Baru')

@section('content')
    <div class="container animate__animated animate__fadeIn">
        <div class="page-inner">
            <div class="page-header mb-4">
                <h3 class="fw-bold mb-2 text-primary">➕ Tambah Indikator Baru</h3>
                <ul class="breadcrumbs d-flex align-items-center mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}" class="text-secondary">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator mx-2 text-muted"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item">
                        <a href="{{ route('indikator.index') }}" class="text-muted">Indikator</a>
                    </li>
                    <li class="separator mx-2 text-muted"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item text-dark fw-semibold">Tambah Indikator</li>
                </ul>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-light">
                            <h4 class="card-title m-0">Isi Form Indikator</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('indikator.store') }}" method="POST" novalidate>
                                @csrf

                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="poin" class="fw-semibold">Poin</label>
                                            <input
                                                type="text"
                                                name="poin"
                                                id="poin"
                                                value="{{ old('poin') }}"
                                                class="form-control @error('poin') is-invalid @enderror"
                                                placeholder="Masukkan poin indikator"
                                                required
                                            >
                                            @error('poin')
                                                <small class="text-danger">{{ $message }}</small>
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
                                            @enderror
                                        </div>
                                    </div>

<<<<<<< HEAD
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="jam">Jam</label>
                                            <input type="text" name="jam" id="jam"
                                                class="form-control @error('jam') is-invalid @enderror"
                                                placeholder="Masukkan jam indikator" required>
                                            @error('jam')
                                                <span class="text-danger">{{ $message }}</span>
=======
                                    <div class="col-md-6">
                                        <div class="form-group form-group-default">
                                            <label for="jam" class="fw-semibold">Jam</label>
                                            <input
                                                type="text"
                                                name="jam"
                                                id="jam"
                                                value="{{ old('jam') }}"
                                                class="form-control @error('jam') is-invalid @enderror"
                                                placeholder="Masukkan jam indikator"
                                                required
                                            >
                                            @error('jam')
                                                <small class="text-danger">{{ $message }}</small>
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
                                            @enderror
                                        </div>
                                    </div>
                                </div>

<<<<<<< HEAD
                                <div class="row mt-3">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="kategori_indikator_id">Kategori Indikator</label>
                                            <select name="kategori_indikator_id" id="kategori_indikator_id"
                                                class="form-control @error('kategori_indikator_id') is-invalid @enderror" required>
                                                <option value="">Pilih Kategori Indikator</option>
                                                @foreach($kategori_indikators as $kategori)
                                                    <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_indikator_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="{{ route('indikator.index') }}" class="btn btn-secondary ms-2">Batal</a>
                                </div>

=======
                                <div class="mt-4">
                                    <div class="form-group form-group-default">
                                        <label for="kategori_indikator_id" class="fw-semibold">Kategori Indikator</label>
                                        <select
                                            name="kategori_indikator_id"
                                            id="kategori_indikator_id"
                                            class="form-select @error('kategori_indikator_id') is-invalid @enderror"
                                            required
                                        >
                                            <option value="" disabled selected>Pilih Kategori Indikator</option>
                                            @foreach($kategori_indikators as $kategori)
                                                <option value="{{ $kategori->id }}" {{ old('kategori_indikator_id') == $kategori->id ? 'selected' : '' }}>
                                                    {{ $kategori->nama }}
                                                </option>
                                            @endforeach
                                        </select>
                                        @error('kategori_indikator_id')
                                            <small class="text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end gap-2 mt-5">
                                    <a href="{{ route('indikator.index') }}" class="btn btn-outline-secondary btn-hover-scale">
                                        Batal
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-hover-scale">
                                        Simpan
                                    </button>
                                </div>
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======

    @push('styles')
        <style>
            /* Animasi hover tombol */
            .btn-hover-scale {
                transition: transform 0.15s ease-in-out;
            }
            .btn-hover-scale:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 12px rgb(0 0 0 / 0.15);
            }
            /* Fokus input */
            input.form-control:focus, select.form-select:focus {
                border-color: #3b82f6;
                box-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
                outline: none;
            }
        </style>
    @endpush
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
@endsection
