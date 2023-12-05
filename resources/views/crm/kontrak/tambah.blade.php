@extends('welcome')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Kontrak</h3>
        </div>

        <form action="{{ route('kontrak.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Nama Customer</label>
                        <select class="form-control" id="id_cs" name="id_cs">                                           
                            @foreach ($customer as $ambil)
                            <!--var $customer dari controller-->
                            <option value="{{ $ambil->id }}">{{ $ambil->nama_cs }}</option>
                            @endforeach
                        </select>
                    </div>

                    
                    <div class="col col-md-6 form-group">
                        <label>Jenis Layanan</label>
                        <select class="form-control" id="id_jenisproduk" name="id_jenisproduk">
                            <option value="">--Pilih Jenis Penawaran--</option>
                            @foreach ($jenisproduk as $ambil)
                            <!--var $jenisproduk dari controller-->
                            <option value="{{ $ambil->id }}">{{ $ambil->jenis_produk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-md-6 form-group">
                        <label>Tanggal Awal</label>
                        <input type="date" class="form-control" id="tanggal_awal" name="tanggal_awal" placeholder="Masukkan Tanggal">
                    </div>

                    <div class="col col-md-6 form-group">
                        <label>Tanggal Akhir</label>
                        <input type="date" class="form-control" id="tanggal_akhir" name="tanggal_akhir" placeholder="Masukkan Tanggal">
                    </div>
                <div class="co col-md-2 form-group">
                    <a href="{{ route('kontrak.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                    Back</a> 

                        <button type="submit" class="btn btn-primary" style="float: left;">Tambah</button>
                </div>
        </form>
    </div>
</div>
@endsection