@extends('welcome')
@section('content')

<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Transaksi</h3>
        </div>

        <form action="{{ route('transaksi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">

                <div class="col col-md-6 form-group">
                        <label>Nama Produk</label>
                        <select class="form-control" id="id_jenisproduk" name="id_jenisproduk">
                            <option value="">--Pilih Nama Produk--</option>
                            @foreach ($jenisproduk as $ambil)
                            <!--var $jenisproduk dari controller-->
                            <option value="{{ $ambil->id }}">{{ $ambil->jenis_produk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-md-6 form-group">
                        <label class="control-label" for="statustransaksi">Status Transaksi</label>
                        <select class="form-control" id="statustransaksi" name="statustransaksi">
                                    <option value="">--Status Transaksi--</option>
                                    <option value="Belum Lunas">Belum Lunas</option>
                                    <option value="Lunas">Lunas</option>
                        </select>
                    </div>
                
                <div class="col col-md-6 form-group">
                    <label>Tanggal Transaksi</label>
                    <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" placeholder="Masukkan Tanggal Bayar">
                </div>

                <div class="col col-md-6 form-group">
                    <label>Total Bayar</label>
                    <input type="text" class="form-control" id="total_bayar" name="total_bayar" placeholder="Masukkan Total">
                </div>

                <div class="col col-md-6 form-group">
                    <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Tambah</button>
                    </div>
                </div>

                
        </form>
    </div>
</div>

@endsection