@extends('backend.layouts.app')
@section('title', 'Edit Kategori')
@section('content')
    <style>
        .fade-in {
            animation: fadeIn 0.5s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .form-group-default {
            padding: 15px;
            border: 1px solid #e4e6ef;
            border-radius: 10px;
            background-color: #f9f9f9;
            transition: box-shadow 0.3s ease;
        }

        .form-group-default:focus-within {
            box-shadow: 0 0 0 0.15rem rgba(13, 110, 253, 0.25);
            background-color: #fff;
        }

        .btn-primary {
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .btn-primary:hover {
            background-color: #0d6efd;
            transform: scale(1.03);
        }

        .btn-secondary:hover {
            transform: scale(1.02);
        }

        .text-danger {
            font-size: 0.875rem;
            margin-top: 0.25rem;
        }
    </style>

    <div class="container fade-in">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">✏️ Edit Kategori</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="{{ route('dashboard.admin') }}">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="{{ route('kategori.index') }}">Kategori</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Edit</a></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-8 mx-auto">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light">
                            <h4 class="card-title">📝 Form Edit Kategori</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('kategori.update', $KategoriIndikator->id) }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('PUT')
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group form-group-default">
                                            <label for="nama">Nama Kategori</label>
                                            <input type="text" name="nama" id="nama"
                                                class="form-control @error('nama') is-invalid @enderror"
                                                value="{{ $KategoriIndikator->nama }}" required>
                                            @error('nama')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>

                                <div class="d-flex justify-content-end mt-4">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save me-1"></i> Update
                                    </button>
                                    <a href="{{ route('kategori.index') }}" class="btn btn-secondary ms-2">
                                        <i class="fas fa-arrow-left me-1"></i> Batal
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
