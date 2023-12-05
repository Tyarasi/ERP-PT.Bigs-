@extends('welcome')
@section('content')

<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Invoice</h3>
        </div>
        <form action="{{ route('invoice.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" <div class="row">
            <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Nama Produk</label>
                        <select class="form-control" id="id_jenisproduk" name="id_jenisproduk">
                            <option value="">--Pilih Nama Produk--</option>
                            @foreach ($jenisproduk as $ambil)
                            <!--var $jenisjabatan dari controller-->
                            <option value="{{ $ambil->id }}">{{ $ambil->jenis_produk }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col col-md-6 form-group">
                        <label>Nama Customer</label>
                        <select class="form-control" id="nama_customer" name="nama_customer">
                            <option value="">--Pilih Nama Customer--</option>
                            @foreach ($customer as $ambil)
                            <!--var $jenisjabatan dari controller-->
                            <option value="{{ $ambil->nama_cs }}">{{ $ambil->nama_cs }}</option>
                            @endforeach
                        </select>
                    </div>
                <div class="col col-md-6 form-group">
                    <label>Tanggal Invoice</label>
                    <input type="date" class="form-control" id="tgl_invoice" name="tgl_invoice" placeholder="Masukkan Tanggal Pengeluaran">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Biaya</label>
                    <input type="text" class="form-control" id="biaya" name="biaya" placeholder="Masukkan Biaya">
                </div>
            </div>
            <div class="card-footer">
            <a href="{{ route('invoice.index') }}" class="btn btn-danger btn-destroy" style="float: left;">
                    Kembali</a> 

                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

@endsection