@extends('backend.layouts.app')
<<<<<<< HEAD
@section('title', 'Data Indikator')
@section('content')
    <div class="container">
        <div class="page-inner">
            <div class="page-header">
                <h3 class="fw-bold mb-3">Data Indikator</h3>
                <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Tables</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">Data Indikator</a>
                    </li>
                </ul>
            </div>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">Tambah Indikator</h4>
                                <button class="btn btn-primary btn-round ms-auto"
                                    onclick="window.location.href='{{ route('indikator.create') }}'">
                                    <i class="fa fa-plus"></i> Tambah Indikator
                                </button>
                            </div>
                        </div>
                        <div class="card-body">

                            <div class="table-responsive">
                                <table id="add-row" class="display table table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
=======

@section('title', 'Data Indikator')

@section('content')
    <div class="container animate__animated animate__fadeIn">
        <div class="page-inner">
            <div class="page-header mb-4">
                <h3 class="fw-bold mb-2 text-primary">📊 Data Indikator</h3>
                <ul class="breadcrumbs mb-0 d-flex align-items-center">
                    <li class="nav-home">
                        <a href="#">
                            <i class="icon-home text-secondary"></i>
                        </a>
                    </li>
                    <li class="separator text-muted mx-2">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="text-muted">Tables</a>
                    </li>
                    <li class="separator text-muted mx-2">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item text-dark fw-semibold">
                        Data Indikator
                    </li>
                </ul>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <div class="card shadow-sm border-0 rounded-3">
                        <div class="card-header bg-light d-flex justify-content-between align-items-center">
                            <h4 class="card-title m-0">📥 Tambah Indikator</h4>
                            <button class="btn btn-primary btn-sm rounded-pill shadow-sm transition"
                                onclick="window.location.href='{{ route('indikator.create') }}'">
                                <i class="fa fa-plus me-1"></i> Tambah Indikator
                            </button>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive animate__animated animate__fadeInUp">
                                <table id="add-row" class="table table-striped table-hover align-middle text-center">
                                    <thead class="bg-primary text-white">
                                        <tr>
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
                                            <th>Poin</th>
                                            <th>Jam</th>
                                            <th>Kategori</th>
                                            <th style="width: 10%">Aksi</th>
                                        </tr>
                                    </thead>
<<<<<<< HEAD
                                    <tfoot>
                                        <tr>
                                            <th>ID</th>
                                            <th>Poin</th>
                                            <th>Jam</th>
                                            <th>Kategori</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </tfoot>
                                    <tbody>
                                        @foreach ($indikators as $indikator)
                                            <tr>
                                                <td>{{ $indikator->id }}</td>
                                                <td>{{ $indikator->poin }}</td>
                                                <td>{{ $indikator->jam }}</td>
                                                <td>{{ $indikator->kategoriIndikator->nama }}</td> <!-- Mengambil kategori indikator -->
                                                <td>
                                                    <div class="form-button-action">
                                                        <form action="{{ route('indikator.edit', $indikator->id) }}" method="GET" style="display: inline;">
                                                            @csrf
                                                            <button type="submit" data-bs-toggle="tooltip" title="Edit Indikator" class="btn btn-link btn-primary">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>

                                                        <form action="{{ route('indikator.destroy', $indikator->id) }}" method="POST" id="delete-form-{{ $indikator->id }}" style="display: inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" data-bs-toggle="tooltip" title="Hapus Indikator" class="btn btn-link btn-danger" onclick="confirmDelete({{ $indikator->id }})">
=======
                                    <tbody>
                                        @forelse ($indikators as $indikator)
                                            <tr>
                                                <td>{{ $indikator->poin }}</td>
                                                <td>{{ $indikator->jam }}</td>
                                                <td>{{ $indikator->kategoriIndikator->nama }}</td>
                                                <td>
                                                    <div class="d-flex justify-content-center gap-2">
                                                        <form action="{{ route('indikator.edit', $indikator->id) }}" method="GET">
                                                            @csrf
                                                            <button type="submit" class="btn btn-sm btn-outline-primary rounded-circle" data-bs-toggle="tooltip" title="Edit Indikator">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                        </form>
                                                        <form action="{{ route('indikator.destroy', $indikator->id) }}" method="POST" id="delete-form-{{ $indikator->id }}">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-sm btn-outline-danger rounded-circle" data-bs-toggle="tooltip" title="Hapus Indikator" onclick="confirmDelete({{ $indikator->id }})">
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
                                                                <i class="fa fa-trash"></i>
                                                            </button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
<<<<<<< HEAD
                                        @endforeach
=======
                                        @empty
                                            <tr>
                                                <td colspan="5" class="text-center text-muted fst-italic py-4">
                                                    Tidak ada data indikator 😔
                                                </td>
                                            </tr>
                                        @endforelse
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<<<<<<< HEAD
=======

    {{-- Tooltip init & animasi tambahan --}}
    @push('scripts')
        <script>
            document.addEventListener('DOMContentLoaded', function () {
                const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
                tooltipTriggerList.map(el => new bootstrap.Tooltip(el))
            });

            function confirmDelete(id) {
                Swal.fire({
                    title: 'Yakin mau hapus?',
                    text: 'Data yang dihapus tidak bisa dikembalikan!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal',
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById('delete-form-' + id).submit();
                    }
                });
            }
        </script>
    @endpush
>>>>>>> f4c0e7fbbbddb02ac3be01ef192f0dd2255ef847
@endsection
