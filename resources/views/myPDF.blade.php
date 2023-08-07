<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN PENGHASILAN</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Diunduh pada : {{ $date }}</p>
    <p>LAPORAN SEMUA HASIL PENGHASILAN BERDASARKAN JUMLAH DAN TAHUN CV. KAMDANI</p>

    <table class="table table-bordered">
        <tr>
            <th>Serial Number</th>
            <th>Tahun</th>
            <th>Total Penghasilan</th>
            <th>Total Jenis Kambing Etawa</th>
            <th>Total Jenis Kambing Biasa</th>
        </tr>
        @foreach ($penghasilan as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td>{{ $user->tahun }}</td>
                <td>Rp. {{ $user->total_penghasilan }}</td>
                <td>{{ $user->jenis_kambing_etawa }}</td>
                <td>{{ $user->jenis_kambing_biasa }}</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
