@extends('welcome')
@section('content')

<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Jenis Bank</h3>
        </div>
        <form action="{{ route('rekeningbank.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" <div class="row">
            <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Nama Bank</label>
                        <select class="form-control" id="id_namabank" name="id_namabank">
                            <option value="">--Pilih Bank--</option>
                            @foreach ($jenisbank as $ambil)
                            <!--var $jenisjabatan dari controller-->
                            <option value="{{ $ambil->id }}">{{ $ambil->nama_bank }}</option>
                            @endforeach
                        </select>
                    </div>

                <div class="col col-md-6 form-group">
                    <label>Nomor Rekening</label>
                    <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder="Masukkan Nomor Rekening">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder="Masukkan Nama Pemilik">
                </div>
            </div>
            <div class="card-footer">
            <a href="{{ route('rekeningbank.index') }}" class="btn btn-danger btn-destroy" style="float: left;">
                    Kembali</a> 

                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

@endsection