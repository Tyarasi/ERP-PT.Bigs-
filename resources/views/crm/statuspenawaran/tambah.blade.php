@extends('welcome')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Status Penawaran</h3>
    </div>

    <form action="{{ route('statuspenawaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body"> 
            <div class="row">
            <div class="col col-md-6 form-group">
                <label>Status Penawaran</label>
                <input type="text" class="form-control" id="status_penawaran" name="status_penawaran" placeholder="Masukkan Status Penawaran">
            </div>
        </div>

        <div class="row">
            <div class="co col-md-2 form-group">
        <a href="{{ route('statuspenawaran.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                Back</a> 

            <button type="submit" class="btn btn-primary" style="float: left;">Tambah</button>
            </div>
        </div>
    </form>
</div>

@endsection