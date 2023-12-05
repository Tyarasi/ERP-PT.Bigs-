@extends('welcome')

@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Tambah Data Jenis Jabatan</h3>
    </div>

        <form action="{{ route('jenisjabatan.store') }}" method="POST" enctype="multipart/form-data">
            @csrf

            <div class="card-body">
                <div class="row">
                    <div class="col col-md-4 form-group">
                        <label>Jenis Jabatan</label>
                        <input type="text" class="form-control" id="jenis_jabatan" name="jenis_jabatan" placeholder="Masukkan Jenis Jabatan">
                    </div>
                </div>

                    <div class="row">
                        <div class="co col-md-2 form-group">
                            <button type="submit" class="btn btn-primary" style="float: left;">Tambah</button>

                            <a href="{{ route('jenisjabatan.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                                Back</a>
                        </div>
                    </div>
              
        </form>
    </div>
</div>

@endsection