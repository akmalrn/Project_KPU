@extends('backend.layouts.app')
@section('title', 'Data Kategori')
@section('content')
    <style>
        .fade-in {
            animation: fadeIn 0.6s ease-in-out;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .table-hover tbody tr:hover {
            background-color: #f1f1f1;
            transition: background-color 0.3s ease;
        }

        .btn-round {
            border-radius: 50px;
        }

        .form-button-action button {
            margin: 0 5px;
            transition: transform 0.2s ease;
        }

        .form-button-action button:hover {
            transform: scale(1.1);
        }
    </style>

    <div class="container fade-in">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">📦 Data Kategori</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Tables</a></li>
                    <li class="separator"><i class="icon-arrow-right"></i></li>
                    <li class="nav-item"><a href="#">Data Kategori</a></li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12 fade-in">
                    <div class="card shadow-sm">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h4 class="card-title fw-semibold">📂 Tambah Kategori</h4>
                            <button class="btn btn-primary btn-round"
                                onclick="window.location.href='{{ route('kategori.create') }}'">
                                <i class="fa fa-plus me-1"></i> Tambah Kategori
                            </button>
                        </div>

                        <div class="card-body fade-in">
                            <div class="table-responsive">
                                <table class="table table-striped table-hover align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th>Nama</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($kategoriIndikators as $kategori)
                                            <tr>
                                                <td>{{ $kategori->nama }}</td>
                                                <td>
                                                    <div class="form-button-action d-flex">
                                                        <form action="{{ route('kategori.edit', $kategori->id) }}" method="GET">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-outline-primary" data-bs-toggle="tooltip" title="Edit Kategori">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('kategori.destroy', $kategori->id) }}" method="POST" id="delete-form-{{ $kategori->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-outline-danger" data-bs-toggle="tooltip" title="Hapus Kategori"
                                                                onclick="confirmDelete({{ $kategori->id }})">
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @if($kategoriIndikators->isEmpty())
                                    <div class="text-center text-muted mt-3">Belum ada kategori ditambahkan 😅</div>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Tooltip Bootstrap -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            tooltipTriggerList.map(function (tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })
        })

        function confirmDelete(id) {
            if (confirm('Yakin mau hapus kategori ini?')) {
                document.getElementById('delete-form-' + id).submit();
            }
        }
    </script>
@endsection
