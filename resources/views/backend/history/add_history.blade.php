@extends('admin.admin_dashboard')
@section('admin')
    <div class="page-content">
        <div class="row profile-body">
            <!-- middle wrapper start -->
            <div class="col-md-10 col-xl-8 middle-wrapper">
                <div class="row">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title"> Add Property Type </h6>
                            <form method="POST" action="{{ route('store.history') }}" class="forms-sample">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pembeli</label>
                                    <input type="text" name="nama_pembeli"
                                        class="form-control @error('nama_pembeli') is-invalid @enderror" id="nama_pembeli"
                                        autocomplete="off">
                                    @error('nama_pembeli')
                                        <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kambing</label>
                                    <select name="jenis_kambing" class="js-example-basic-single form-select"
                                        id="exampleFormControlSelect1">
                                        <option selected="" disabled="">Select</option>
                                        <option value="etawa">Kambing Etawa</option>
                                        <option value="biasa">Kambing Biasa</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                                    <input name="jumlah" type="text"
                                        class="form-control bg-transparent border-primary flatpickr-input active">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Status</label>
                                    <select name="status" class="js-example-basic-single form-select"
                                        id="exampleFormControlSelect1">
                                        <option selected="" disabled="">Select</option>
                                        <option value="konfirmasi">Terkonfirmasi</option>
                                        <option value="batal">Dibatalkan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Tanggal Transaksi</label>
                                    <input name="tanggal_transaksi" type="text"
                                        class="form-control bg-transparent border-primary flatpickr-input active">
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
