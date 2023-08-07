@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <nav class="page-breadcrumb">
            <ol class="breadcrumb">
                <a href="{{ route('add.penghasilan') }}" class="btn btn-inverse-info">Tambah Laporan Tahunan</a>
                &nbsp; &nbsp; &nbsp;
                <a href="{{ route('export.transaksi') }}" class="btn btn-inverse-success">Export Laporan Tahunan</a>
            </ol>
        </nav>

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
                                        <th>Tahun</th>
                                        <th>Pendapatan</th>
                                        <th>Total Jenis Kambing Etawa</th>
                                        <th>Total Jenis Kambing Biasa</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penghasilan as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>Rp. {{ $item->total_penghasilan }}</td>
                                            <td>{{ $item->jenis_kambing_etawa }}</td>
                                            <td>{{ $item->jenis_kambing_biasa }}</td>
                                            <td>
                                                <a href="{{ route('edit.penghasilan', $item->id) }}"
                                                    class="btn btn-inverse-warning">Edit</a>
                                                <a href="{{ route('delete.penghasilan', $item->id) }}"
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

    </div>
@endsection
