@extends('backend.layouts.app')
<<<<<<< HEAD
@section('title', 'Edit Indikator')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Edit Indikator</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('indikator.index') }}">Indikator</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Edit</a></li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Indikator</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('indikator.update', $indikator->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="poin">Poin</label>
                                            <input type="text" name="poin" id="poin" class="form-control @error('poin') is-invalid @enderror" value="{{ $indikator->poin }}" required>
                                            @error('poin')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="jam">Jam</label>
                                            <input type="text" name="jam" id="jam" class="form-control @error('jam') is-invalid @enderror" value="{{ $indikator->jam }}" required>
                                            @error('jam')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-3">
                                    <div class="col-md-12">
                                        <div class="form-group form-group-default">
                                            <label for="kategori_indikator_id">Kategori Indikator</label>
                                            <select name="kategori_indikator_id" id="kategori_indikator_id" class="form-control @error('kategori_indikator_id') is-invalid @enderror" required>
                                                <option value="">Pilih Kategori Indikator</option>
                                                @foreach($kategori_indikators as $kategori)
                                                    <option value="{{ $kategori->id }}" @if($indikator->kategori_indikator_id == $kategori->id) selected @endif>{{ $kategori->nama }}</option>
                                                @endforeach
                                            </select>
                                            @error('kategori_indikator_id')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">Update</button>
                                    <a href="{{ route('indikator.index') }}" class="btn btn-secondary ms-2">Cancel</a>
                                </div>

=======

@section('title', 'Edit Indikator')

@section('content')
    <div class="container animate__animated animate__fadeIn">
        <div class="page-inner">
            <div class="page-header mb-4">
                <h3 class="fw-bold mb-2 text-primary">✏️ Edit Indikator</h3>
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
                    <li class="nav-item text-dark fw-semibold">Edit</li>
                </ul>
            </div>

            <div class="row justify-content-center">
                <div class="col-md-8">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-light">
                            <h4 class="card-title m-0">Form Edit Indikator</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('indikator.update', $indikator->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                                @csrf
                                @method('PUT')

                                <div class="mb-3">
                                    <label for="poin" class="fw-semibold">Poin</label>
                                    <input
                                        type="text"
                                        name="poin"
                                        id="poin"
                                        value="{{ old('poin', $indikator->poin) }}"
                                        class="form-control @error('poin') is-invalid @enderror"
                                        required
                                    >
                                    @error('poin')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="jam" class="fw-semibold">Jam</label>
                                    <input
                                        type="text"
                                        name="jam"
                                        id="jam"
                                        value="{{ old('jam', $indikator->jam) }}"
                                        class="form-control @error('jam') is-invalid @enderror"
                                        required
                                    >
                                    @error('jam')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="mb-4">
                                    <label for="kategori_indikator_id" class="fw-semibold">Kategori Indikator</label>
                                    <select
                                        name="kategori_indikator_id"
                                        id="kategori_indikator_id"
                                        class="form-select @error('kategori_indikator_id') is-invalid @enderror"
                                        required
                                    >
                                        <option value="" disabled {{ old('kategori_indikator_id', $indikator->kategori_indikator_id) ? '' : 'selected' }}>
                                            Pilih Kategori Indikator
                                        </option>
                                        @foreach($kategori_indikators as $kategori)
                                            <option value="{{ $kategori->id }}"
                                                {{ (old('kategori_indikator_id', $indikator->kategori_indikator_id) == $kategori->id) ? 'selected' : '' }}>
                                                {{ $kategori->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('kategori_indikator_id')
                                        <small class="text-danger">{{ $message }}</small>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('indikator.index') }}" class="btn btn-outline-secondary btn-hover-scale">
                                        Cancel
                                    </a>
                                    <button type="submit" class="btn btn-primary btn-hover-scale">
                                        Update
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
            .btn-hover-scale {
                transition: transform 0.15s ease-in-out;
            }
            .btn-hover-scale:hover {
                transform: scale(1.05);
                box-shadow: 0 4px 12px rgba(0,0,0,0.15);
            }
            input.form-control:focus, select.form-select:focus {
                border-color: #3b82f6;
                box-shadow: 0 0 8px rgba(59, 130, 246, 0.5);
                outline: none;
            }
        </style>
    @endpush
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
@endsection
