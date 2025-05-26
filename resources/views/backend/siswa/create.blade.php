@extends('backend.layouts.app')
@section('title', 'Tambah Siswa Baru')

@push('styles')
<style>
    /* Animasi dan styling input */
    .form-control {
        transition: border-color 0.3s ease, box-shadow 0.3s ease;
        padding-left: 2.5rem; /* Space buat icon */
    }
    .form-control:focus {
        border-color: #4f46e5; /* Indigo 600 */
        box-shadow: 0 0 8px rgba(79, 70, 229, 0.3);
    }
    .input-icon {
        position: absolute;
        left: 12px;
        top: 50%;
        transform: translateY(-50%);
        color: #6b7280; /* gray-500 */
        pointer-events: none;
    }
    .form-group {
        position: relative;
    }
    /* Tombol animasi */
    button.btn-primary {
        transition: background-color 0.3s ease, box-shadow 0.3s ease;
    }
    button.btn-primary:hover {
        background-color: #4338ca; /* Indigo 700 */
        box-shadow: 0 4px 10px rgba(67, 56, 202, 0.5);
    }
    /* Breadcrumb icon warna */
    .breadcrumbs .nav-home i {
        color: #4f46e5;
    }
</style>
@endpush

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Tambah Siswa Baru</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="{{ route('dashboard.admin') }}">
                        <i class="fas fa-home"></i>
                    </a>
                </li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="{{ route('siswa.index') }}">Siswa</a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Tambah Siswa</a></li>
            </ul>
        </div>
        
        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header bg-indigo-600 text-white">
                        <h4 class="card-title"><i class="fas fa-user-plus me-2"></i>Tambah Siswa Baru</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ route('siswa.store') }}" method="POST" autocomplete="off">
                            @csrf
                            <div class="row mb-3">
                                <div class="col-md-6 form-group">
                                    <label for="id" class="form-label">NIS</label>
                                    <i class="fas fa-id-card input-icon"></i>
                                    <input type="text" name="id" id="id"
                                        class="form-control @error('id') is-invalid @enderror"
                                        placeholder="Masukkan NIS Siswa" required>
                                    @error('id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="nama" class="form-label">Nama</label>
                                    <i class="fas fa-user input-icon"></i>
                                    <input type="text" name="nama" id="nama"
                                        class="form-control @error('nama') is-invalid @enderror"
                                        placeholder="Masukkan nama siswa" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-3 form-group">
                                    <label for="tipe" class="form-label">Tipe</label>
                                    <i class="fas fa-list-alt input-icon"></i>
                                    <select name="tipe" id="tipe"
                                        class="form-select @error('tipe') is-invalid @enderror" required>
                                        <option value="" selected>-- Pilih Tipe --</option>
                                        <option value="Unggulan">Unggulan</option>
                                        <option value="Reguler">Reguler</option>
                                    </select>
                                    @error('tipe')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-3 form-group">
                                    <label for="kelas" class="form-label">Kelas</label>
                                    <i class="fas fa-chalkboard input-icon"></i>
                                    <select name="kelas" id="kelas"
                                        class="form-select @error('kelas') is-invalid @enderror" required>
                                        <option value="" selected>-- Pilih Kelas --</option>
                                        <option value="12 PPLG">12 PPLG</option>
                                        <option value="11 PPLG">11 PPLG</option>
                                        <option value="10 PPLG">10 PPLG</option>
                                        <option value="12 PMN">12 PMN</option>
                                        <option value="11 PMN">11 PMN</option>
                                        <option value="10 PMN">10 PMN</option>
                                        <option value="12 HTL">12 HTL</option>
                                        <option value="11 HTL">11 HTL</option>
                                        <option value="10 HTL">10 HTL</option>
                                        <option value="12 TJKT">12 TJKT</option>
                                        <option value="11 TJKT">11 TJKT</option>
                                        <option value="10 TJKT">10 TJKT</option>
                                    </select>
                                    @error('kelas')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="password" class="form-label">Password</label>
                                    <i class="fas fa-lock input-icon"></i>
                                    <input type="password" name="password" id="password"
                                        class="form-control @error('password') is-invalid @enderror"
                                        placeholder="Masukkan password siswa" required>
                                    @error('password')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>

                            <div class="d-flex justify-content-end gap-2 mt-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                                <a href="{{ route('siswa.index') }}" class="btn btn-secondary">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
