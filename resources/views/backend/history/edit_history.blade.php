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
                            <form id="myForm" method="POST" action="{{ route('update.history') }}" class="forms-sample">
                                <input type="hidden" name="id" value="{{ $history->id }}">
                                @csrf
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pembeli</label>
                                    <input type="text" name="nama_pembeli" class="form-control "
                                        value="{{ $history->nama_pembeli }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kambing</label>
                                    <select name="jenis_kambing" class="js-example-basic-single form-select"
                                        id="exampleFormControlSelect1">
                                        <option selected="" disabled="">Select Group Name</option>
                                        <option value="etawa" {{ $history->jenis_kambing == 'etawa' ? 'selected' : '' }}>
                                            Kambing Etawa</option>
                                        <option value="biasa"
                                            {{ $history->jenis_kambing == 'biasa' ? 'selected' : '' }}>Kambing Biasa
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                    <input type="text" name="jumlah" class="form-control "
                                        value="{{ $history->jumlah }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Status</label>
                                    <select name="status" class="js-example-basic-single form-select"
                                        id="exampleFormControlSelect1">
                                        <option selected="" disabled="">Select Group Name</option>
                                        <option value="konfirmasi" {{ $history->status == 'konfirmasi' ? 'selected' : '' }}>
                                            Terkonfirmasi</option>
                                        <option value="batal"
                                            {{ $history->status == 'batal' ? 'selected' : '' }}>Dibatalkan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Ganti Tanggal Transaksi</label>
                                    <input type="text" name="tanggal_transaksi" class="form-control "
                                        value="{{ $history->tanggal_transaksi }}">
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
