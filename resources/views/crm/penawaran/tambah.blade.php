@extends('welcome')

@section('content')

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Penawaran</h3>
        </div>

        <form action="{{ route('penawaran.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">

                    <div class="col col-md-6 form-group">
                        <label>Penawaran</label>
                        <input type="text" class="form-control" id="nama_penawaran" name="nama_penawaran" placeholder="Masukkan Nama Penawaran" required >
                    </div>

                    <div class="col col-md-6 form-group">
                        <label>Jenis Produk</label>
                        <select class="form-control" id="id_jenisproduk" name="id_jenisproduk">
                            <option value="">--Pilih Jenis Produk--</option>
                            @foreach ($jenisproduk as $ambil)
                            <!--var $jenisproduk dari controller-->
                            <option value="{{ $ambil->id }}">{{ $ambil->jenis_produk }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-md-6 form-group">
                        <label>Nama Customer</label>
                        <select class="form-control" id="id_customer" name="id_customer">
                            <option value="">--Nama Customer--</option>
                            @foreach ($customer as $ambil)
                            <!--var $kontak dari controller-->
                            <option value="{{ $ambil->id }}">{{ $ambil->nama_cs }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col col-md-6 form-group">
                        <label>Prioritas</label>
                        <select class="form-control" id="jenisprioritas" name="jenisprioritas">
                            <option value="">--Pilih Prioritas--</option>
                                <option value="Low">Low</option>
                                <option value="Middle">Middle</option>
                                <option value="High">High</option>
                                <option value="Very High">Very High</option>
                        </select>
                    </div>


                    <div class="col col-md-6 form-group">
                        <label>Expected Value</label>
                        <input type="text" class="form-control" id="deal_value" name="deal_value" placeholder=" ">
                    </div>

                    <div class="col col-md-6 form-group">
                        <label>Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Masukkan Tanggal">
                    </div>


                    <div class="col col-md-6 form-group">
                        <label>Status Penawaran</label>
                        <select class="form-control" id="statuspenawaran" name="statuspenawaran">
                            <option value="">--Pilih Status Penawaran--</option>
                                <option value="Disetujui">Disetujui</option>
                                <option value="Ditolak">Ditolak</option>
                        </select>
                    </div>
                </div>

                <div class="row">
                <div class="co col-md-2 form-group">
                    <a href="{{ route('penawaran.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                    Back</a> 

                        <button type="submit" class="btn btn-primary" style="float: left;">Tambah</button>
                </div>
                </div>
        </form>
    </div>
    
@endsection