@extends('backend.layouts.app')
@section('title', 'Data Siswa')
@section('content')

<!-- Tambahkan AOS CSS dan Bootstrap Icons CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
    /* Hide card list on desktop, show on mobile */
    .card-list-mobile {
        display: none;
    }
    /* Hide table on mobile */
    @media (max-width: 768px) {
        .table-responsive {
            display: none;
        }
        .card-list-mobile {
            display: block;
        }
    }
    /* Spasi antar tombol aksi */
    .btn-action {
        min-width: 70px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 0.3rem;
    }
</style>

<div class="container py-4">
    <div class="page-inner mb-4" data-aos="fade-down">
        <div class="page-header">
            <h3 class="fw-bold"><i class="bi bi-people-fill me-2"></i>Data Siswa</h3>
            <ul class="breadcrumbs mb-2">
                <li class="nav-home">
                    <a href="#"><i class="bi bi-house-fill"></i></a>
                </li>
                <li class="separator"><i class="bi bi-chevron-right"></i></li>
                <li class="nav-item"><a href="#">Tables</a></li>
                <li class="separator"><i class="bi bi-chevron-right"></i></li>
                <li class="nav-item"><a href="#">Data Siswa</a></li>
            </ul>
        </div>
    </div>

    <div class="row" data-aos="fade-up">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0"><i class="bi bi-list-ul me-2"></i>Daftar Siswa</h5>
                    <a href="{{ route('siswa.create') }}" class="btn btn-primary btn-sm">
                        <i class="bi bi-plus-lg me-1"></i> Tambah Siswa
                    </a>
                </div>

                <!-- Tabel untuk desktop -->
                <div class="card-body table-responsive">
                    <table id="add-row" class="table table-hover table-striped align-middle">
                        <thead class="table-light">
                            <tr>
                                <th>No</th>
                                <th>ID</th>
                                <th>Nama</th>
                                <th>Kelas</th>
                                <th>Tipe</th>
                                <th>Total Poin</th>
                                <th style="width: 10%">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $s)
                                <tr data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->id }}</td>
                                    <td>{{ $s->nama }}</td>
                                    <td>{{ $s->kelas }}</td>
                                    <td>
                                        <span class="badge bg-{{ $s->tipe == 'unggulan' ? 'success' : 'secondary' }}">
                                            <i class="bi {{ $s->tipe == 'unggulan' ? 'bi-star-fill' : 'bi-person-fill' }} me-1"></i>
                                            {{ ucfirst($s->tipe) }}
                                        </span>
                                    </td>
                                    <td>
                                        <i class="bi bi-trophy-fill text-warning me-1"></i> {{ $s->prestasi->sum('poin') }}
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <form action="{{ route('siswa.edit', $s->id) }}" method="GET">
                                                @csrf
                                                <button type="submit" class="btn btn-sm btn-primary btn-action"
                                                    data-bs-toggle="tooltip" title="Edit Siswa">
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </button>
                                            </form>
                                            <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" id="delete-form-{{ $s->id }}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="btn btn-sm btn-danger btn-action"
                                                    data-bs-toggle="tooltip" title="Hapus Siswa"
                                                    onclick="confirmDelete({{ $s->id }})">
                                                    <i class="bi bi-trash"></i> Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center text-muted py-4" data-aos="fade-in">
                                        <i class="bi bi-person-x fa-2x mb-2"></i><br>
                                        Belum ada data siswa yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                <!-- Card list untuk mobile -->
                <div class="card-list-mobile p-3">
                    @forelse ($siswa as $s)
                        <div class="card mb-3 shadow-sm" data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <i class="bi bi-person-circle me-2"></i>{{ $s->nama }}
                                    <small class="text-muted">({{ $s->kelas }})</small>
                                </h5>
                                <p class="card-text mb-1"><strong><i class="bi bi-id-badge me-1"></i>ID:</strong> {{ $s->id }}</p>
                                <p class="card-text mb-1">
                                    <strong><i class="bi bi-award me-1"></i>Tipe:</strong>
                                    <span class="badge bg-{{ $s->tipe == 'unggulan' ? 'success' : 'secondary' }}">
                                        <i class="bi {{ $s->tipe == 'unggulan' ? 'bi-star-fill' : 'bi-person-fill' }} me-1"></i>
                                        {{ ucfirst($s->tipe) }}
                                    </span>
                                </p>
                                <p class="card-text mb-3"><strong><i class="bi bi-trophy-fill text-warning me-1"></i>Total Poin:</strong> {{ $s->prestasi->sum('poin') }}</p>
                                <div class="d-flex justify-content-start gap-2">
                                    <form action="{{ route('siswa.edit', $s->id) }}" method="GET">
                                        @csrf
                                        <button type="submit" class="btn btn-sm btn-primary btn-action" data-bs-toggle="tooltip" title="Edit Siswa">
                                            <i class="bi bi-pencil-square"></i> Edit
                                        </button>
                                    </form>
                                    <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" id="delete-form-mobile-{{ $s->id }}">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-sm btn-danger btn-action" data-bs-toggle="tooltip" title="Hapus Siswa"
                                            onclick="confirmDeleteMobile({{ $s->id }})">
                                            <i class="bi bi-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-4" data-aos="fade-in">
                            <i class="bi bi-person-x fa-2x mb-2"></i><br>
                            Belum ada data siswa yang tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
    });

    function confirmDelete(id) {
        if (confirm('Yakin ingin menghapus data siswa ini?')) {
            document.getElementById(`delete-form-${id}`).submit();
        }
    }
    function confirmDeleteMobile(id) {
        if (confirm('Yakin ingin menghapus data siswa ini?')) {
            document.getElementById(`delete-form-mobile-${id}`).submit();
        }
    }

    // Tooltip Bootstrap (opsional)
    document.addEventListener("DOMContentLoaded", function () {
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        });
    });
</script>
@endsection
