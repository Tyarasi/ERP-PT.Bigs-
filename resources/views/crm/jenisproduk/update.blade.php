@extends('welcome')

@section('content')

    <div class="card">

        <div class="card-header">
            <h3 class="card-title">Ubah Data Jenis Produk</h3>
        </div>

        <form action="{{ route('jenisproduk.update', $jenisproduk->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                 <div class="row">

                <div class="col col-md-6 form-group">
                    <label>Jenis Produk</label>
                    <input type="text" class="form-control" id="jenis_produk" name="jenis_produk" placeholder=" " value="{{ $jenisproduk->jenis_produk }}">
                </div>
            </div>
            
            <div class="row">
                <div class="co col-md-2 form-group">
                    <button type="submit" class="btn btn-primary" style="float: left;">Ubah</button>

                    <a href="{{ route('jenisproduk.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                        Kembali</a>
                </div>
            </div>
        </form>
    </div>

@endsection