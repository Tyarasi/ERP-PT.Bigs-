@extends('welcome')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Ubah Data Kontrak</h3>
    </div>

    <form action="{{ route('kontrak.update', $kontrak->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Nama Customer</label>
                    <input type="text" class="form-control" id="nama_karyawan" name="nama_karyawan" placeholder=" ">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Jenis Produk</label>
                    <input type="text" class="form-control" id="nik_karyawan" name="nik_karyawan" placeholder=" ">
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Status</label>
                    <select class="form-control" name="status">
                        <option value="Not finished yet">Not finished yet</option>
                        <option value="Done">Done</option>
                    </select>
                </div>
            </div>
            <div class="row">
            <div class="co col-md-2 form-group">
                <button type="submit" class="btn btn-primary" style="float: left;">Ubah</button>

                <a href="{{ route('karyawan.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                    Kembali</a>
            </div>
        </div>
    </form>
</div>

@endsection