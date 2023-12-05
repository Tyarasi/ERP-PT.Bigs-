@extends('welcome')

@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Jenis Prioritas</h3>
    </div>

    <form action="{{ route('jenisprioritas.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Jenis Prioritas</label>
                    <input type="text" class="form-control" id="jenis_prioritas" name="jenis_prioritas" placeholder="Masukkan Jenis Prioritas">
                </div>
            </div>

            <div class="row">
                <div class="co col-md-2 form-group">
                    <a href="{{ route('jenisprioritas.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                        Back</a>

                    <button type="submit" class="btn btn-primary" style="float: left;">Tambah</button>
                </div>
            </div>
    </form>
</div>

@endsection