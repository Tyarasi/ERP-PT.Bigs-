@extends('welcome')
@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Ubah Data Transaksi</h3>
    </div>

    <form action="{{ route('transaksi.update', $transaksi->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Jenis Produk</label>
                    <select class="form-control" id="id_jenisproduk" name="id_jenisproduk">
                        <option value="">--Pilih Jenis Produk--</option>
                        @foreach ($jenisproduk as $ambil)
                        <option value="{{ $ambil->id }}">{{ $ambil->jenis_produk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-md-6 form-group">
                    <label>Status Transaksi</label>
                    <input type="text" class="form-control" id="status_transaksi" name="status_transaksi" value="{{ $transaksi->status_transaksi }}">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Tanggal Pembayaran</label>
                    <input type="date" class="form-control" id="biaya" name="biaya" value="{{ $pemasukan->biaya }}">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Total Bayar</label>
                    <input type="text" class="form-control" id="biaya" name="biaya" value="{{ $pemasukan->biaya }}">
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