<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="utf-8" />
    <title>Prestasi Siswa - {{ $siswa->nama }}</title>
    <style>
        /* Font untuk PDF & web, nyaman dibaca */
        body {
            font-family: "DejaVu Sans", Arial, sans-serif;
            font-size: 13px;
            color: #222;
            margin: 20px;
            background-color: #fff;
        }

        h2 {
            font-weight: 700;
            font-size: 24px;
            color: #0d6efd;
            border-bottom: 2px solid #0d6efd;
            padding-bottom: 6px;
            margin-bottom: 10px;
        }

        p {
            font-size: 14px;
            margin: 4px 0;
            color: #444;
        }

        p strong {
            color: #000;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
            box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #0d6efd;
            color: #fff;
        }

        th,
        td {
            border: 1px solid #dee2e6;
            padding: 10px 12px;
            text-align: left;
            vertical-align: middle;
            font-size: 13px;
        }

        tbody tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        tbody tr:hover {
            background-color: #e9ecef;
        }

        th {
            font-weight: 600;
        }
    </style>
</head>

<body>
    <h2>Daftar Prestasi Siswa: {{ $siswa->nama }}</h2>
    <p>NIS: {{ $siswa->id }}</p>
    <p>Kelas: {{ $siswa->kelas }}</p>
    <p><strong>Total Poin: {{ $prestasis->sum('poin') }}</strong></p>

    <table>
        <thead>
            <tr>
                <th style="width:5%;">No</th>
                <th style="width:25%;">Jam</th>
                <th style="width:15%;">Poin</th>
                <th style="width:25%;">Tanggal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($prestasis as $index => $prestasi)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $prestasi->jam }}</td>
                    <td>{{ $prestasi->poin }}</td>
                    <td>{{ $prestasi->tanggal }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
