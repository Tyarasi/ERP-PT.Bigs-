@extends('welcome')
@section('content')

<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Rekening Bank</h3>
        </div>
        <form action="{{ route('rekeningbank.update', $rekeningbank->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body" <div class="row">
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
                    <input type="text" class="form-control" id="nomor_rekening" name="nomor_rekening" placeholder=" " value="{{ $rekeningbank->nomor_rekening }}">
                </div>
                <div class="col col-md-6 form-group">
                    <label>Nama Pemilik</label>
                    <input type="text" class="form-control" id="nama_pemilik" name="nama_pemilik" placeholder=" " value="{{ $rekeningbank->nama_pemilik }}">
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>

@endsection