@extends('welcome')

@section('content')

<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Status Penawaran</h3>
        </div>
        <form action="{{ route('statuspenawaran.update', $statuspenawaran->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body"> <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Status Penawaran</label>
                    <input type="text" class="form-control" id="status_penawaran" name="status_penawaran" placeholder=" " value="{{ $statuspenawaran->status_penawaran }}">
                </div>
            </div>
            
            <div class="row">
                <div class="co col-md-2 form-group">
                    <button type="submit" class="btn btn-primary" style="float: left;">Ubah</button>

                    <a href="{{ route('statuspenawaran.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                        Kembali</a>
                </div>
            </div>
        </form>
    </div>
</div>

@endsection