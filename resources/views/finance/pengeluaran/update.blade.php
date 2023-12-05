@extends('welcome')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Ubah Data Kontrak</h3>
    </div>

    <form action="{{ route('pengeluaran.update', $pengeluaran->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Nama Produk</label>
                    <select class="form-control" id="id_jenisproduk" name="id_jenisproduk">
                        <option value="">--Pilih Nama Produk--</option>
                        @foreach ($jenisproduk as $ambil)
                        <option value="{{ $ambil->id }}">{{ $ambil->jenis_produk }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col col-md-6 form-group">
                    <label>Tanggal Pembayaran</label>
                    <input type="date" class="form-control" id="tgl_pengeluaran" name="tgl_pengeluaran" value="{{ $pengeluaran->tgl_pengeluaran }}">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Biaya</label>
                    <input type="text" class="form-control" id="biaya" name="biaya" value="{{ $pengeluaran->biaya }}">
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