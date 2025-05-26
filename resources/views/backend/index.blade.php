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

    <link href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" rel="stylesheet">

    <style>
        .card,
        .badge {
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
                            <div class="bg-{{ $s['color'] }} text-white rounded d-flex justify-content-center align-items-center"
                                style="width: 48px; height: 48px;">
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
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Daftar Siswa</h5>
                        <span class="badge bg-primary">{{ $siswa->count() }}</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive">
                            <table class="table table-bordered align-middle mb-0">
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
                                    @forelse($siswa as $s)
                                        <tr style="animation-delay: {{ 0.05 * $loop->index }}s;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->nama ?? '-' }}</td>
                                            <td>{{ $s->id ?? '-' }}</td>
                                            <td>{{ $s->kelas ?? '-' }}</td>
                                            <td>
                                                @if (strtolower($s->tipe) === 'unggulan')
                                                    <span class="badge bg-success">Unggulan</span>
                                                @else
                                                    <span class="badge bg-secondary">Reguler</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <!-- Tidak ada data, tutup tbody dulu -->
                                    @endforelse
                                </tbody>
                            </table>
                        </div> <!-- tutup table-responsive -->

                        @if ($siswa->isEmpty())
                            <div class="text-center text-muted py-4" data-aos="fade-in">
                                <i class="fas fa-user-slash fa-2x mb-2"></i><br>
                                Belum ada data siswa yang tersedia.
                            </div>
                        @endif

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
    <script>
        AOS.init({
            duration: 600,
            easing: 'ease-in-out',
            once: true,
        });
    </script>
@endsection
