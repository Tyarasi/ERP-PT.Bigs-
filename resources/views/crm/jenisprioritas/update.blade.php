@extends('welcome')
@section('content')

<div class="card">
        <div class="card-header">
            <h3 class="card-title">Ubah Data Jenis Prioritas</h3>
        </div>
        
        <form action="{{ route('jenisprioritas.update', $jenisprioritas->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="card-body">
                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>Jenis Prioritas</label>
                        <input type="text" class="form-control" id="jenis_prioritas" name="jenis_prioritas" placeholder="Masukkan Jenis Prioritas" value="{{ $jenisprioritas->jenis_prioritas }}">
                    </div>
                </div>

                <div class="row">
                <div class="co col-md-2 form-group">
                    <button type="submit" class="btn btn-primary" style="float: left;">Ubah</button>

                    <a href="{{ route('jenisprioritas.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                        Kembali</a>
                </div>
            </div>
        </form>
</div>

@endsection