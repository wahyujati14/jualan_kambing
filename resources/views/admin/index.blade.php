@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">

        <div class="d-flex justify-content-between align-items-center flex-wrap grid-margin">
            <div>
                <h4 class="mb-3 mb-md-0">Welcome to Dashboard</h4>
            </div>
        </div>

        {{-- Chart View Total Penjualan dan Kelahiran --}}
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">List Data Satu Tahun</h6>
                        <h6 class="card-title">Tahun 2022</h6>
                        <div id="apexLine"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Penambahan Kelahiran</h6>
                        <h6 class="card-title">Tahun 2022</h6>
                        <div id="apexBar"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- Chart View End Total Penjualan dan Kelahiran --}}

        {{-- Chart View Total Pembelian Tahunan --}}
        <div class="row">
            <div class="col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-baseline mb-2">
                            <h6 class="card-title mb-0">Total Penjualan Tahunan</h6>
                        </div>
                        <p class="text-muted">Aktivitas</p>
                        <div id="monthlySalesChart"></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Penjualan dan Kelahiran Kambing</h6>
                        <h6 class="card-title">Tahun 2022</h6>
                        <div id="apexPie"></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Table Pembeli --}}

        {{-- Start Table Pembeli --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h6 class="card-title">Data Table Pembeli</h6>
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
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Table Pembeli --}}

        {{-- Start Table Pendapatan --}}
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <ol class="breadcrumb">
                            <a href="{{ route('export.transaksi') }}" class="btn btn-inverse-success">Export Laporan
                                Tahunan</a>
                        </ol>
                        <h6 class="card-title">Data Table Pendapatan</h6>
                        <div class="table-responsive">
                            <table id="dataTableExample" class="table">
                                <thead>
                                    <tr>
                                        <th>Serial Number</th>
                                        <th>Tahun</th>
                                        <th>Pendapatan</th>
                                        <th>Jenis Kambing Etawa</th>
                                        <th>Jenis Kambing Biasa</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($penghasilan as $key => $item)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $item->tahun }}</td>
                                            <td>{{ $item->total_penghasilan }}</td>
                                            <td>{{ $item->jenis_kambing_etawa }}</td>
                                            <td>{{ $item->jenis_kambing_biasa }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        {{-- End Table Pendapatan --}}

    </div>
@endsection
