@extends('backend.layouts.app')
@section('title', 'Dashboard')
@section('content')

@php
    $stat = [
        ['icon' => 'fas fa-users', 'color' => 'primary', 'label' => 'Siswa', 'value' => $SiswaTotal],
        ['icon' => 'fas fa-check-square', 'color' => 'info', 'label' => 'Kategori', 'value' => $KategoriTotal],
        ['icon' => 'fas fa-chart-bar', 'color' => 'success', 'label' => 'Indikator', 'value' => $IndikatorTotal],
        ['icon' => 'fas fa-medal', 'color' => 'secondary', 'label' => 'Prestasi', 'value' => $PrestasiTotal],
    ];
@endphp

<!-- Tambahkan AOS CSS -->
<link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

<style>
    .card, .badge {
        transition: all 0.3s ease-in-out;
    }

    .card:hover {
        transform: translateY(-3px);
        box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
    }
</style>

<div class="container py-4">
    <div class="row mb-4" data-aos="fade-down">
        <div class="col-12">
            <h3 class="fw-bold">Dashboard</h3>
            <p class="text-muted">Selamat datang kembali, Admin KPU!</p>
        </div>
    </div>

    <div class="row">
        @foreach ($stat as $s)
            <div class="col-6 col-md-3 mb-3" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                <div class="card shadow-sm border-0">
                    <div class="card-body d-flex align-items-center gap-3">
                        <div class="bg-{{ $s['color'] }} text-white rounded d-flex justify-content-center align-items-center" style="width: 48px; height: 48px;">
                            <i class="{{ $s['icon'] }}"></i>
                        </div>
                        <div>
                            <div class="text-muted text-uppercase small fw-semibold">{{ $s['label'] }}</div>
                            <h5 class="fw-bold mb-0">{{ $s['value'] }}</h5>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <div class="row mt-4" data-aos="fade-up">
        <div class="col-12">
            <div class="card shadow-sm border-0">
                <div class="card-header d-flex justify-content-between">
                    <h5 class="mb-0">Daftar Siswa</h5>
                    <span class="badge bg-primary">{{ $siswa->count() }}</span>
                </div>

                {{-- Tabel untuk Desktop --}}
                <div class="card-body p-0 table-responsive d-none d-sm-block">
                    <table class="table table-hover table-striped mb-0 d-none d-sm-table">
                        <thead class="table-light">
                            <tr>
                                <th style="width: 50px;">No</th>
                                <th>Nama</th>
                                <th>NIS</th>
                                <th>Kelas</th>
                                <th>Tipe</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($siswa as $s)
                                <tr data-aos="fade-up" data-aos-delay="{{ $loop->index * 50 }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $s->nama ?? '-' }}</td>
                                    <td>{{ $s->id ?? '-' }}</td>
                                    <td>{{ $s->kelas ?? '-' }}</td>
                                    <td>
                                        <span class="badge bg-{{ $s->tipe === 'Unggulan' ? 'success' : 'secondary' }}">
                                            {{ $s->tipe ?? '-' }}
                                        </span>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center text-muted py-4" data-aos="fade-in">
                                        <i class="fas fa-user-slash fa-2x mb-2"></i><br>
                                        Belum ada data siswa yang tersedia.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

                {{-- Card untuk Mobile --}}
                <div class="card-body d-block d-sm-none">
                    @forelse ($siswa as $s)
                        <div class="mb-3 p-3 border rounded shadow-sm" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">
                            <div class="fw-bold">{{ $s->nama ?? '-' }}</div>
                            <div class="text-muted small">NIS: {{ $s->id ?? '-' }}</div>
                            <div class="text-muted small">Kelas: {{ $s->kelas ?? '-' }}</div>
                            <div class="mt-2">
                                <span class="badge bg-{{ $s->tipe === 'Unggulan' ? 'success' : 'secondary' }}">
                                    {{ $s->tipe ?? '-' }}
                                </span>
                            </div>
                        </div>
                    @empty
                        <div class="text-center text-muted py-4" data-aos="fade-in">
                            <i class="fas fa-user-slash fa-2x mb-2"></i><br>
                            Belum ada data siswa yang tersedia.
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Tambahkan AOS JS -->
<script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
<script>
    AOS.init({
        duration: 600,
        easing: 'ease-in-out',
        once: true,
    });
</script>
@endsection
