<!DOCTYPE html>
<html>
<head>
    <title>Pemeliharaan List</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #000;
            padding: 8px;
            text-align: center;
        }
    </style>
</head>
<body>
    <h2>Pemeliharaan List</h2>
    <table>
        <thead>
            <tr>
                <th>Tanggal Pemeliharaan</th>
                <th>Waktu Mulai</th>
                <th>Periode</th>
                <th>Cuaca</th>
                <th>No Alat Ukur</th>
                <th>No GSM</th>
                <th>User</th>
                <th>Peralatan Telemetri</th>
            </tr>
        </thead>
        <tbody>
            @foreach($pemeliharaans as $pemeliharaan)
            <tr>
                <td>{{ $pemeliharaan->tanggalPemeliharan }}</td>
                <td>{{ $pemeliharaan->waktuMulaiPemeliharan }}</td>
                <td>{{ $pemeliharaan->periodePemeliharaan }}</td>
                <td>{{ $pemeliharaan->cuaca }}</td>
                <td>{{ $pemeliharaan->no_AlatUkur }}</td>
                <td>{{ $pemeliharaan->no_GSM }}</td>
                <td>{{ optional($pemeliharaan->user)->name }}</td>
                <td>{{ optional($pemeliharaan->peralatanTelemetri)->namaAlat }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
