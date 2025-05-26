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

<style>
    .card-stats {
        opacity: 0;
        transform: translateY(30px);
        animation: fadeSlideUp 0.6s forwards;
        border-radius: 1rem;
        box-shadow: 0 8px 20px rgba(0,0,0,0.08);
        transition: all 0.35s ease-in-out;
        background: #fff;
    }
    .card-stats:hover {
        box-shadow: 0 15px 30px rgba(78, 84, 200, 0.3);
        transform: translateY(-8px) scale(1.07);
        cursor: pointer;
    }
    .card-stats:nth-child(1) { animation-delay: 0s; }
    .card-stats:nth-child(2) { animation-delay: 0.15s; }
    .card-stats:nth-child(3) { animation-delay: 0.3s; }
    .card-stats:nth-child(4) { animation-delay: 0.45s; }

    @keyframes fadeSlideUp {
        to {
            opacity: 1;
            transform: translateY(0);
        }
    }

    .icon-big {
        font-size: 3.8rem;
        padding: 1rem;
        border-radius: 50%;
        background: linear-gradient(135deg, #6a11cb 0%, #2575fc 100%);
        color: white !important;
        box-shadow: 0 6px 12px rgba(101, 84, 255, 0.45);
    }

    .text-primary.bubble-shadow-small {
        background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%);
        box-shadow: 0 6px 12px rgba(30, 60, 114, 0.5);
    }
    .text-info.bubble-shadow-small {
        background: linear-gradient(135deg, #17a2b8 0%, #138496 100%);
        box-shadow: 0 6px 12px rgba(23, 162, 184, 0.5);
    }
    .text-success.bubble-shadow-small {
        background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
        box-shadow: 0 6px 12px rgba(40, 167, 69, 0.5);
    }
    .text-secondary.bubble-shadow-small {
        background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
        box-shadow: 0 6px 12px rgba(108, 117, 125, 0.5);
    }

    .card-category {
        font-weight: 600;
        letter-spacing: 0.04em;
        color: #7a7a7a;
        text-transform: uppercase;
    }
    .card-title {
        font-weight: 700;
        font-size: 2rem;
        color: #3b3b3b;
        margin-top: 0.3rem;
    }

    table.table-bordered {
        border-collapse: separate;
        border-spacing: 0 12px;
        background: transparent;
    }
    table.table-bordered tbody tr {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 3px 8px rgba(0,0,0,0.07);
        transition: all 0.25s ease;
        opacity: 0;
        transform: translateX(-20px);
        animation: fadeSlideRight 0.5s forwards;
    }
    table.table-bordered tbody tr:hover {
        background-color: #eef2ff;
        box-shadow: 0 8px 16px rgba(78, 84, 200, 0.25);
        cursor: pointer;
    }
    table.table-bordered td, table.table-bordered th {
        vertical-align: middle;
        border: none;
        padding: 14px 20px;
        color: #444;
    }
    table.table-bordered thead tr th {
        background-color: #f1f3ff;
        font-weight: 600;
        color: #555;
        border-radius: 8px;
    }

    @keyframes fadeSlideRight {
        to {
            opacity: 1;
            transform: translateX(0);
        }
    }

    .badge-success {
        background: linear-gradient(45deg, #28a745, #218838);
        font-weight: 600;
        color: #fff;
        box-shadow: 0 2px 5px rgba(40, 167, 69, 0.4);
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 0.85rem;
        text-transform: uppercase;
    }
    .badge-secondary {
        background: linear-gradient(45deg, #6c757d, #5a6268);
        font-weight: 600;
        color: #fff;
        box-shadow: 0 2px 5px rgba(108, 117, 125, 0.4);
        padding: 5px 12px;
        border-radius: 12px;
        font-size: 0.85rem;
        text-transform: uppercase;
    }

    @media (max-width: 576px) {
        .card-stats .card-body {
            padding: 1rem 0.8rem;
        }
        table.table-bordered td, table.table-bordered th {
            padding: 8px 10px;
            font-size: 0.85rem;
        }
        .card-title {
            font-size: 1.6rem;
        }
    }
</style>

<div class="page-inner">
    <div class="d-flex align-items-left align-items-md-center flex-column flex-md-row pt-2 pb-4">
        <div>
            <h3 class="fw-bold mb-3">Dashboard</h3>
            <h6 class="op-7 mb-2 text-muted">Selamat datang kembali, Admin KPU! 🎉</h6>
        </div>
    </div>

    <div class="row">
        @foreach ($stat as $s)
        <div class="col-sm-6 col-md-3 mb-3">
            <div class="card card-stats card-round shadow-sm">
                <div class="card-body d-flex align-items-center">
                    <div class="icon-big text-center text-{{ $s['color'] }} bubble-shadow-small me-3">
                        <i class="{{ $s['icon'] }}"></i>
                    </div>
                    <div class="numbers flex-grow-1">
                        <p class="card-category">{{ $s['label'] }}</p>
                        <h4 class="card-title">{{ $s['value'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card card-round shadow-sm">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h4 class="card-title mb-0">Daftar Siswa</h4>
                    <small class="text-muted">Total: {{ $siswa->count() }}</small>
                </div>
                <div class="card-body p-0">
                    @if($siswa->count() > 0)
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
                                    @foreach($siswa as $s)
                                        <tr style="animation-delay: {{ 0.05 * $loop->index }}s;">
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $s->nama ?? '-' }}</td>
                                            <td>{{ $s->id ?? '-' }}</td>
                                            <td>{{ $s->kelas ?? '-' }}</td>
                                            <td>
                                                @if ($s->tipe === 'Unggulan')
                                                    <span class="badge badge-success">Unggulan</span>
                                                @else
                                                    <span class="badge badge-secondary">Reguler</span>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="p-4 text-center text-muted">
                            <i class="fas fa-user-slash fa-2x mb-3"></i>
                            <p class="mb-0">Belum ada data siswa yang tersedia.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
