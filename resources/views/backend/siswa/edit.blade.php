@extends('backend.layouts.app')
@section('title', 'Edit Siswa')
@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header mb-4">
            <h3 class="fw-bold mb-3">
                <i class="fas fa-user-edit me-2 text-primary"></i> Edit Siswa
            </h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('dashboard.admin') }}" class="text-decoration-none text-secondary">
                        <i class="fas fa-home fa-lg"></i>
                    </a>
                </li>
                <li class="separator"><i class="fas fa-chevron-right text-muted mx-2"></i></li>
                <li class="nav-item"><a href="{{ route('siswa.index') }}" class="text-decoration-none text-primary fw-semibold">Siswa</a></li>
                <li class="separator"><i class="fas fa-chevron-right text-muted mx-2"></i></li>
                <li class="nav-item text-muted">Edit</li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm border-0 rounded-3">
                    <div class="card-header bg-primary text-white">
                        <h4 class="card-title mb-0">
                            <i class="fas fa-user-edit me-2"></i> Edit Siswa
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.update', $siswa->id) }}" method="POST" enctype="multipart/form-data" novalidate>
                            @csrf
                            @method('PUT')

                            <div class="row mb-4">
                                <div class="col-md-6">
                                    <label for="id" class="form-label fw-semibold">NIS</label>
                                    <input type="text" name="id" id="id" 
                                        class="form-control @error('id') is-invalid @enderror shadow-sm"
                                        value="{{ old('id', $siswa->id) }}" required
                                        style="transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                                        onfocus="this.style.borderColor='#0d6efd'; this.style.boxShadow='0 0 8px rgba(13,110,253,0.4)'"
                                        onblur="this.style.borderColor=''; this.style.boxShadow=''">
                                    @error('id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-6">
                                    <label for="nama" class="form-label fw-semibold">Nama</label>
                                    <input type="text" name="nama" id="nama" 
                                        class="form-control @error('nama') is-invalid @enderror shadow-sm"
                                        value="{{ old('nama', $siswa->nama) }}" required
                                        style="transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                                        onfocus="this.style.borderColor='#0d6efd'; this.style.boxShadow='0 0 8px rgba(13,110,253,0.4)'"
                                        onblur="this.style.borderColor=''; this.style.boxShadow=''">
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="tipe" class="form-label fw-semibold">Tipe</label>
                                    <select name="tipe" id="tipe" 
                                        class="form-select @error('tipe') is-invalid @enderror shadow-sm"
                                        required
                                        style="transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                                        onfocus="this.style.borderColor='#0d6efd'; this.style.boxShadow='0 0 8px rgba(13,110,253,0.4)'"
                                        onblur="this.style.borderColor=''; this.style.boxShadow=''">
                                        <option value="" disabled {{ old('tipe', $siswa->tipe) == '' ? 'selected' : '' }}>-- Pilih Tipe --</option>
                                        <option value="unggulan" {{ old('tipe', $siswa->tipe) == 'unggulan' ? 'selected' : '' }}>Unggulan</option>
                                        <option value="Reguler" {{ old('tipe', $siswa->tipe) == 'reguler' ? 'selected' : '' }}>Reguler</option>
                                    </select>
                                    @error('tipe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="kelas" class="form-label fw-semibold">Kelas</label>
                                    <select name="kelas" id="kelas" 
                                        class="form-select @error('kelas') is-invalid @enderror shadow-sm"
                                        required
                                        style="transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                                        onfocus="this.style.borderColor='#0d6efd'; this.style.boxShadow='0 0 8px rgba(13,110,253,0.4)'"
                                        onblur="this.style.borderColor=''; this.style.boxShadow=''">
                                        <option value="" disabled {{ old('kelas', $siswa->kelas) == '' ? 'selected' : '' }}>-- Pilih Kelas --</option>
                                        <option value="12 PPLG" {{ old('kelas', $siswa->kelas) == '12 PPLG' ? 'selected' : '' }}>12 PPLG</option>
                                        <option value="11 PPLG" {{ old('kelas', $siswa->kelas) == '11 PPLG' ? 'selected' : '' }}>11 PPLG</option>
                                        <option value="10 PPLG" {{ old('kelas', $siswa->kelas) == '10 PPLG' ? 'selected' : '' }}>10 PPLG</option>
                                        <option value="12 PMN" {{ old('kelas', $siswa->kelas) == '12 PMN' ? 'selected' : '' }}>12 PMN</option>
                                        <option value="11 PMN" {{ old('kelas', $siswa->kelas) == '11 PMN' ? 'selected' : '' }}>11 PMN</option>
                                        <option value="10 PMN" {{ old('kelas', $siswa->kelas) == '10 PMN' ? 'selected' : '' }}>10 PMN</option>
                                        <option value="12 HTL" {{ old('kelas', $siswa->kelas) == '12 HTL' ? 'selected' : '' }}>12 HTL</option>
                                        <option value="11 HTL" {{ old('kelas', $siswa->kelas) == '11 HTL' ? 'selected' : '' }}>11 HTL</option>
                                        <option value="10 HTL" {{ old('kelas', $siswa->kelas) == '10 HTL' ? 'selected' : '' }}>10 HTL</option>
                                        <option value="12 TJKT" {{ old('kelas', $siswa->kelas) == '12 TJKT' ? 'selected' : '' }}>12 TJKT</option>
                                        <option value="11 TJKT" {{ old('kelas', $siswa->kelas) == '11 TJKT' ? 'selected' : '' }}>11 TJKT</option>
                                        <option value="10 TJKT" {{ old('kelas', $siswa->kelas) == '10 TJKT' ? 'selected' : '' }}>10 TJKT</option>
                                    </select>
                                    @error('kelas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="col-md-4">
                                    <label for="password" class="form-label fw-semibold">Password <small class="text-muted">(Kosongkan jika tidak ingin mengubah)</small></label>
                                    <input type="password" name="password" id="password" 
                                        class="form-control @error('password') is-invalid @enderror shadow-sm" 
                                        placeholder="Masukkan password baru (opsional)"
                                        style="transition: border-color 0.3s ease, box-shadow 0.3s ease;"
                                        onfocus="this.style.borderColor='#0d6efd'; this.style.boxShadow='0 0 8px rgba(13,110,253,0.4)'"
                                        onblur="this.style.borderColor=''; this.style.boxShadow=''">
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end mt-4 gap-3">
                                <button type="submit" class="btn btn-primary d-flex align-items-center gap-2 px-4"
                                    style="transition: transform 0.2s ease;">
                                    <i class="fas fa-save"></i> Update
                                </button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-outline-secondary d-flex align-items-center gap-2 px-4"
                                    style="transition: transform 0.2s ease;">
                                    <i class="fas fa-times"></i> Cancel
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- Animasi hover tombol --}}
<style>
    button.btn-primary:hover, a.btn-outline-secondary:hover {
        transform: scale(1.05);
        box-shadow: 0 0 12px rgba(13, 110, 253, 0.6);
    }
</style>
@endsection
