{{-- filepath: resources/views/backend/prestasi/pdf_all.blade.php --}}
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <title>Rekap Data Prestasi{{ $tipe ? ' - ' . ucfirst($tipe) : '' }}</title>
    <style>
        /* Font yang umum untuk PDF, pastikan DejaVu Sans terinstall */
        body {
            font-family: "DejaVu Sans", sans-serif;
            font-size: 13px;
            color: #222;
            margin: 20px;
            background-color: #fff;
        }
        h2 {
            font-weight: 700;
            font-size: 24px;
            margin-bottom: 16px;
            color: #0d6efd; /* Bootstrap primary blue */
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 6px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 24px;
            box-shadow: 0 0 8px rgba(0,0,0,0.1);
        }
        thead {
            background-color: #0d6efd;
            color: #fff;
        }
        th, td {
            border: 1px solid #dee2e6;
            padding: 10px 12px;
            text-align: left;
            vertical-align: middle;
        }
        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }
        tbody tr:hover {
            background-color: #e9ecef;
        }
        th {
            font-weight: 600;
            font-size: 14px;
        }
        td {
            font-size: 13px;
            color: #343a40;
        }
        /* Style untuk no data */
        p.no-data {
            text-align: center;
            font-style: italic;
            color: #6c757d;
            font-size: 14px;
            margin-top: 30px;
        }
    </style>
</head>
<body>
    <h2>Rekap Data Prestasi{{ $tipe ? ' - ' . ucfirst($tipe) : '' }}</h2>

    @php
        $no = 1;
        $sorted = $prestasis->groupBy('id_siswa')->map(function($group) {
            $siswa = $group->first()->siswa ?? null;
            return [
                'siswa' => $siswa,
                'totalPoin' => $group->sum('poin'),
            ];
        })->sortBy([
            fn($a, $b) => strcmp($a['siswa']->tipe ?? '', $b['siswa']->tipe ?? ''),
            fn($a, $b) => $b['totalPoin'] <=> $a['totalPoin'],
        ]);
    @endphp

    @if($sorted->isEmpty())
        <p class="no-data">Tidak ada data prestasi.</p>
    @else
        <table>
            <thead>
                <tr>
                    <th style="width:5%;">No</th>
                    <th style="width:40%;">Nama Siswa</th>
                    <th style="width:20%;">Kelas</th>
                    <th style="width:15%;">Tipe</th>
                    <th style="width:20%;">Total Poin</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sorted as $item)
                    <tr>
                        <td>{{ $no++ }}</td>
                        <td>{{ $item['siswa']->nama ?? '-' }}</td>
                        <td>{{ $item['siswa']->kelas ?? '-' }}</td>
                        <td>{{ ucfirst($item['siswa']->tipe ?? '-') }}</td>
                        <td>{{ $item['totalPoin'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</body>
</html>
