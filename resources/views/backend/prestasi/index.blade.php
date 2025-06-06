@extends('backend.layouts.app')
@section('title', 'Data Prestasi')

@section('content')
<style>
    /* Animasi hover untuk tombol */
    .btn-primary.btn-round, 
    .btn-success.btn-round, 
    .btn-warning.btn-round, 
    .btn-secondary.btn-round {
        transition: background-color 0.3s ease, transform 0.3s ease;
    }

    .btn-primary.btn-round:hover,
    .btn-success.btn-round:hover,
    .btn-warning.btn-round:hover,
    .btn-secondary.btn-round:hover {
        transform: translateY(-3px);
        box-shadow: 0 8px 15px rgba(0,0,0,0.2);
    }

    /* Animasi ikon */
    .btn i.fa {
        transition: transform 0.3s ease;
    }
    .btn:hover i.fa {
        transform: rotate(15deg) scale(1.1);
    }

    /* Animasi tombol "Delete" kecil */
    .btn-danger.btn-sm {
        transition: background-color 0.3s ease, transform 0.2s ease;
    }
    .btn-danger.btn-sm:hover {
        background-color: #dc3545cc;
        transform: scale(1.1);
    }

    /* Animasi collapse halus sudah bawaan bootstrap, tapi bisa ditambah */
    .collapse:not(.show) {
        display: block;
        height: 0;
        overflow: hidden;
        transition: height 0.35s ease;
    }
    .collapse.show {
        height: auto;
        transition: height 0.35s ease;
    }
</style>

<div class="container">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">Data Prestasi <i class="fa fa-trophy text-warning"></i></h3> <!-- ikon trophy -->
            <ul class="breadcrumbs mb-3">
                <li class="nav-home"><a href="#"><i class="icon-home"></i></a></li>
                <li class="separator"><i class="icon-arrow-right"></i></li>
                <li class="nav-item"><a href="#">Prestasi</a></li>
            </ul>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card shadow-sm">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h4 class="card-title mb-0">List Inputan Prestasi <i class="fa fa-list"></i></h4>
                        <div>
                            <!-- tetap seperti sebelumnya, dengan animasi tombol sudah dari CSS -->
                            <form method="GET" action="{{ route('prestasi.index') }}" class="d-inline me-2">
                                <select name="tipe" onchange="this.form.submit()"
                                    class="form-select d-inline w-auto">
                                    <option value="">Semua Tipe</option>
                                    <option value="unggulan" {{ request('tipe') == 'unggulan' ? 'selected' : '' }}>
                                        Unggulan</option>
                                    <option value="reguler" {{ request('tipe') == 'reguler' ? 'selected' : '' }}>
                                        Reguler</option>
                                </select>
                            </form>
                            <div class="btn-group me-2">
                                <button type="button" class="btn btn-success btn-round dropdown-toggle"
                                    data-bs-toggle="dropdown" aria-expanded="false">
                                    <i class="fa fa-download me-1"></i> Download PDF
                                </button>
                                <ul class="dropdown-menu">
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('prestasi.pdf.all', ['tipe' => 'unggulan']) }}"
                                            target="_blank">
                                            PDF Unggulan
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item"
                                            href="{{ route('prestasi.pdf.all', ['tipe' => 'reguler']) }}"
                                            target="_blank">
                                            PDF Reguler
                                        </a>
                                    </li>
                                    <li>
                                        <a class="dropdown-item" href="{{ route('prestasi.pdf.all') }}" target="_blank">
                                            PDF Semua
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <a href="{{ route('prestasi.create') }}" class="btn btn-primary btn-round">
                                <i class="fa fa-plus me-1"></i> Tambah Prestasi
                            </a>
                            @if (request('tipe') == 'unggulan')
                                <form action="{{ route('prestasi.reset.unggulan') }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus SEMUA data prestasi siswa UNGGULAN?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning btn-round ms-2">
                                        <i class="fa fa-trash me-1"></i> Reset Data Unggulan
                                    </button>
                                </form>
                            @elseif(request('tipe') == 'reguler')
                                <form action="{{ route('prestasi.reset.reguler') }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Yakin ingin menghapus SEMUA data prestasi siswa REGULER?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-secondary btn-round ms-2">
                                        <i class="fa fa-trash me-1"></i> Reset Data Reguler
                                    </button>
                                </form>
                            @endif
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="accordion" id="accordionPrestasi">
                            @foreach ($prestasis->groupBy('siswa_id') as $siswaId => $prestasiGroup)
                                <div class="card mb-2 shadow-sm rounded">
                                    <div class="card-header" id="heading-{{ $siswaId }}">
                                        <h5 class="mb-0 d-flex justify-content-between align-items-center">
                                            <button class="btn btn-link fw-semibold text-decoration-none" type="button" data-bs-toggle="collapse"
                                                data-bs-target="#collapse-{{ $siswaId }}" aria-expanded="false"
                                                aria-controls="collapse-{{ $siswaId }}">
                                                <i class="fa fa-user me-2 text-primary"></i> 
                                                {{ $prestasiGroup->first()->siswa->nama ?? 'Tanpa Nama' }}
                                            </button>
                                            <span class="badge bg-secondary">{{ $prestasiGroup->count() }} Prestasi</span>
                                        </h5>
                                    </div>

                                    <div id="collapse-{{ $siswaId }}" class="collapse"
                                        aria-labelledby="heading-{{ $siswaId }}"
                                        data-bs-parent="#accordionPrestasi">
                                        <div class="card-body table-responsive">
                                            <a href="{{ route('prestasi.pdf', ['siswa_id' => $siswaId]) }}"
                                                class="btn btn-success btn-sm mb-2">
                                                <i class="fa fa-download me-1"></i> Download PDF
                                            </a>
                                            <table class="table table-bordered table-sm align-middle">
                                                <thead class="table-light">
                                                    <tr>
                                                        <th>Jam</th>
                                                        <th>Poin</th>
                                                        <th>Tanggal</th>
                                                        <th>Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($prestasiGroup as $p)
                                                        <tr>
                                                            <td>{{ $p->jam }}</td>
                                                            <td>{{ $p->poin }}</td>
                                                            <td>{{ $p->created_at->format('d-m-Y') }}</td>
                                                            <td>
                                                                <form action="{{ route('prestasi.destroy', $p->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button class="btn btn-sm btn-danger"
                                                                        onclick="return confirm('Yakin lu mau hapus?')">
                                                                        <i class="fa fa-trash"></i>
                                                                    </button>
                                                                </form>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
