@extends('welcome')
@section('content')

<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Status Transaksi</h3>
        </div>
        <form action="{{ route('statustransaksi.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Status Transaksi</label>
                    <input type="text" class="form-control" id="nama_status" name="nama_status" placeholder="Masukkan Status Transaksi">
                </div>
            </div>
            <div class="card-footer">
            <a href="{{ route('statustransaksi.index') }}" class="btn btn-danger btn-destroy" style="float: left;">
                    Kembali</a> 

                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

@endsection