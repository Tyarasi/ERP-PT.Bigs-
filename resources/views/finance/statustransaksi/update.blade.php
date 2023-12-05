@extends('welcome')

@section('content')
<br>
<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Status Transaksi</h3>
        </div>
        <form action="{{ route('statustransaksi.update', $statustransaksi->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body" <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Status Transaksi</label>
                    <input type="text" class="form-control" id="nama_status" name="nama_status" placeholder=" " value="{{ $statustransaksi->nama_status }}">
                </div>
            </div>
            
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Ubah</button>
            </div>
        </form>
    </div>
</div>
@endsection