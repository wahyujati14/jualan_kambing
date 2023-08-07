<!DOCTYPE html>
<html>

<head>
    <title>LAPORAN LIST KAMBING</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"
        integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <h1>{{ $title }}</h1>
    <p>Diunduh pada : {{ $date }}</p>
    <p>List Kambing Terjual</p>

    <table class="table table-bordered">
        <tr>
            <th>Serial Number</th>
            <th>Jenis Kambing</th>
            <th>Jumlah</th>
            <th>Status</th>
        </tr>
        @foreach ($history as $history)
            <tr>
                <td>{{ $history->id }}</td>
                <td>{{ $history->jenis_kambing }}</td>
                <td>Rp. {{ $history->jumlah }}</td>
                <td>{{ $history->status }}</td>
            </tr>
        @endforeach
    </table>

    <p>List Stock Kambing</p>

    <table class="table table-bordered">
        <tr>
            <th>Serial Number</th>
            <th>Tanggal Penambahan</th>
            <th>Jenis Kambing</th>
            <th>Jumlah</th>
        </tr>
        @foreach ($stock as $stock)
            <tr>
                <td>{{ $stock->id }}</td>
                <td>{{ $stock->tanggal }}</td>
                <td>{{ $stock->jenis }}</td>
                <td>{{ $stock->total_stock }} Ekor</td>
            </tr>
        @endforeach
    </table>

</body>

</html>
