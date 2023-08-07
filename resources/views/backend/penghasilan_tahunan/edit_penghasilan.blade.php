@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-10 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"> Edit Transaksi </h6>
                            <form id="myForm" method="POST" action="{{ route('update.penghasilan') }}"
                                class="forms-sample">
                                <input type="hidden" name="id" value="{{ $penghasilan->id }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tahun</label>
                                    <input type="text" name="tahun" class="form-control "
                                        value="{{ $penghasilan->tahun }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Pendapatan</label>
                                    <input type="text" name="total_penghasilan" class="form-control "
                                        value="{{ $penghasilan->total_penghasilan }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Jenis Kambing Etawa Terjual</label>
                                    <input type="text" name="jenis_kambing_etawa" class="form-control "
                                        value="{{ $penghasilan->jenis_kambing_etawa }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Total Jenis Kambing Biasa Terjual</label>
                                    <input type="text" name="jenis_kambing_biasa" class="form-control "
                                        value="{{ $penghasilan->jenis_kambing_biasa }}">
                                </div>
                                <button type="submit" class="btn btn-primary me-2">Save Changes</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
