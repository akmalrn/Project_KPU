@extends('backend.layouts.app')
@section('title', 'Tambah Prestasi Baru')
@section('content')
    <div class="container py-4">
        <div class="page-inner">
            <div class="page-header mb-4">
                <h3 class="fw-bold mb-2">Tambah Prestasi Baru</h3>
                <ul class="breadcrumb d-flex align-items-center">
                    <li class="nav-home me-2">
                        <a href="{{ route('dashboard.admin') }}" class="text-decoration-none text-primary">
                            <i class="fas fa-home"></i>
                        </a>
                    </li>
                    <li class="separator me-2"><i class="fas fa-angle-right"></i></li>
                    <li class="nav-item me-2"><a href="{{ route('prestasi.index') }}"
                            class="text-decoration-none">Prestasi</a></li>
                    <li class="separator me-2"><i class="fas fa-angle-right"></i></li>
                    <li class="nav-item text-secondary">Tambah Prestasi</li>
                </ul>
            </div>

            <div class="row justify-content-center">
                <div class="col-lg-8 col-md-10">
                    <div class="card shadow-sm border-0">
                        <div class="card-header bg-primary text-white">
                            <h4 class="card-title mb-0">Form Tambah Prestasi</h4>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('prestasi.store') }}" method="POST" autocomplete="off">
                                @csrf

                                {{-- Nama Siswa --}}
                                <div class="mb-3 position-relative">
                                    <label for="siswa_id" class="form-label fw-semibold">
                                        Nama Siswa
                                        <i class="fas fa-info-circle text-primary ms-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Pilih siswa yang mendapatkan prestasi"></i>
                                    </label>
                                    <select name="siswa_id" id="siswa_id"
                                        class="form-select @error('siswa_id') is-invalid @enderror" required>
                                        <option value="">-- Pilih Siswa --</option>
                                        @foreach ($siswa as $s)
                                            <option value="{{ $s->id }}" data-tipe="{{ $s->tipe }}"
                                                {{ old('siswa_id') == $s->id ? 'selected' : '' }}>
                                                {{ $s->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('siswa_id')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                {{-- Kategori Prestasi --}}
                                <div class="mb-3 position-relative">
                                    <label for="id_kategori_indikator" class="form-label fw-semibold">
                                        Kategori Prestasi
                                        <i class="fas fa-info-circle text-primary ms-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Kategori jenis prestasi yang didapat"></i>
                                    </label>
                                    <select name="id_kategori_indikator" id="id_kategori_indikator"
                                        class="form-select @error('id_kategori_indikator') is-invalid @enderror" required>
                                        <option value="">-- Pilih Kategori --</option>
                                        @foreach ($kategori as $k)
                                            <option value="{{ $k->id }}" data-nama="{{ $k->nama }}"
                                                {{ old('id_kategori_indikator') == $k->id ? 'selected' : '' }}>
                                                {{ $k->nama }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('id_kategori_indikator')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="row g-3">
                                    {{-- Jam --}}
                                    <div class="col-md-6 position-relative">
                                        <label for="jam" class="form-label fw-semibold">
                                            Jam
                                            <i class="fas fa-info-circle text-primary ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Pilih jam prestasi"></i>
                                        </label>
                                        <select name="jam" id="jam"
                                            class="form-select @error('jam') is-invalid @enderror" required>
                                            <option value="">-- Pilih Jam --</option>
                                        </select>
                                        @error('jam')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    {{-- Poin --}}
                                    <div class="col-md-6 position-relative">
                                        <label for="poin" class="form-label fw-semibold">
                                            Poin
                                            <i class="fas fa-info-circle text-primary ms-1" data-bs-toggle="tooltip"
                                                data-bs-placement="top" title="Poin prestasi (otomatis terisi)"></i>
                                        </label>
                                        <input type="text" name="poin" id="poin"
                                            class="form-control @error('poin') is-invalid @enderror" readonly
                                            value="{{ old('poin') }}" required>
                                        @error('poin')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                {{-- Tanggal --}}
                                <div class="mb-4 mt-4 position-relative">
                                    <label for="tanggal" class="form-label fw-semibold">
                                        Tanggal
                                        <i class="fas fa-info-circle text-primary ms-1" data-bs-toggle="tooltip"
                                            data-bs-placement="top" title="Tanggal prestasi terjadi"></i>
                                    </label>
                                    <input type="date" id="tanggal" name="tanggal"
                                        class="form-control @error('tanggal') is-invalid @enderror"
                                        value="{{ old('tanggal') }}" required>
                                    @error('tanggal')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="d-flex justify-content-end gap-2">
                                    <button type="submit" class="btn btn-primary fw-semibold px-4">
                                        <i class="fas fa-save me-2"></i>Simpan
                                    </button>
                                    <a href="{{ route('prestasi.index') }}"
                                        class="btn btn-outline-secondary fw-semibold px-4">
                                        <i class="fas fa-times me-2"></i>Batal
                                    </a>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Bootstrap 5 Tooltip --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script>
        $(document).ready(function() {

            // Enable Bootstrap tooltips
            var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
            var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
                return new bootstrap.Tooltip(tooltipTriggerEl)
            })

            $('#siswa_id').on('change', function() {
                let tipe = $('#siswa_id option:selected').data('tipe');
                let kategoriSelect = $('#id_kategori_indikator');
                let kategoriId = '';

                if (tipe === 'unggulan') {
                    kategoriId = kategoriSelect.find('option[data-nama="Qiyamulail"]').val();
                } else if (tipe === 'reguler') {
                    kategoriId = kategoriSelect.find('option[data-nama="GDS"]').val();
                }

                if (kategoriId) {
                    kategoriSelect.val(kategoriId).trigger('change');
                } else {
                    kategoriSelect.val('');
                }
            });

            $('#id_kategori_indikator').on('change', function() {
                let kategoriId = $(this).val();
                if (kategoriId) {
                    $.ajax({
                        url: '{{ url('/get-jam-by-kategori') }}',
                        type: 'GET',
                        data: {
                            id_kategori: kategoriId
                        },
                        success: function(res) {
                            let jamSelect = $('#jam');
                            jamSelect.empty().append(
                                '<option value="">-- Pilih Jam --</option>');
                            if (res.jam.length > 0) {
                                $.each(res.jam, function(i, v) {
                                    jamSelect.append(
                                        `<option value="${v.jam}" data-poin="${v.poin}">${v.jam}</option>`
                                    );
                                });
                            } else {
                                jamSelect.append(
                                    '<option value="">Data jam kosong, pilih kategori lain</option>'
                                );
                            }
                            $('#poin').val('');
                        },
                        error: function() {
                            alert('Gagal ambil data jam, coba lagi nanti!');
                        }
                    });
                } else {
                    $('#jam').empty().append('<option value="">-- Pilih Jam --</option>');
                    $('#poin').val('');
                }
            });

            $('#jam').on('change', function() {
                let poin = $(this).find(':selected').data('poin') || '';
                $('#poin').val(poin);
            });

        });
    </script>

    <style>
        /* Animasi transisi untuk select dan input */
        select.form-select,
        input.form-control {
            transition: border-color 0.3s ease, box-shadow 0.3s ease;
        }

        select.form-select:focus,
        input.form-control:focus {
            border-color: #ffffff;
            box-shadow: 0 0 8px rgba(255, 255, 255, 0.25);
            outline: none;
        }

        /* Hover effect for buttons */
        .btn-primary:hover {
            background-color: #ffffff;
            border-color: #ffffff;
        }

        .container.py-4 {
            background-color: white;
        }

        .btn-outline-secondary:hover {
            background-color: #e2e6ea;
            border-color: #dae0e5;
        }
    </style>
@endsection
