@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.history') }}" class="btn btn-inverse-info">Tambah Transaksi</a>
                &nbsp; &nbsp; &nbsp;
                <a href="{{ route('import.history') }}" class="btn btn-inverse-success">Import Transaksi</a>
                &nbsp; &nbsp; &nbsp;
                <a href="{{ route('export.listhistory') }}" class="btn btn-inverse-warning">Ekspor Semua List Data Kambing</a>
            </ol>
        </nav>

        {{-- End Data Pembeli --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Table</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Nama Pembeli</th>
                                        <th>Jenis Kambing</th>
                                        <th>Jumlah</th>
                                        <th>Tanggal Bayar</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->nama_pembeli }}</td>
                                            <td>{{ $item->jenis_kambing }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->tanggal_transaksi }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>
                                                <a href="{{ route('edit.history', $item->id) }}"
                                                    class="btn btn-inverse-warning">Edit</a>
                                                <a href="{{ route('delete.history', $item->id) }}"
                                                    class="btn btn-inverse-danger" id="delete">Delete</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Data Pembeli --}}

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('export.listhistory') }}" class="btn btn-inverse-success">Export List</a>
            </ol>
        </nav>

        {{-- List Kambing Terjual --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">List Kambing Terjual</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Jenis Kambing</th>
                                        <th>Jumlah</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($history as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->jenis_kambing }}</td>
                                            <td>{{ $item->jumlah }}</td>
                                            <td>{{ $item->status }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End List Kambing Terjual --}}
        
        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('export.pemasukan') }}" class="btn btn-inverse-success">Export Stock</a>
                &nbsp; &nbsp; &nbsp;
                <a href="{{ route('import.pemasukan') }}" class="btn btn-inverse-warning">Import Stock</a>
            </ol>
        </nav>

        {{-- Stock Kambing Terjual --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Stock Kambing</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Tanggal Penambahan</th>
                                        <th>Jenis Kambing</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($stock as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->tanggal }}</td>
                                            <td>{{ $item->jenis }}</td>
                                            <td>{{ $item->total_stock }}</td>
                                            @endforeach
                                        </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Stock Kambing Terjual --}}

    </div>
@endsection
