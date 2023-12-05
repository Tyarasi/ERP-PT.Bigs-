@extends('welcome')
@section('content')

<div class="col">
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Tambah Data Jenis Bank</h3>
        </div>
        <form action="{{ route('jenisbank.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="card-body" <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Nama Bank</label>
                    <input type="text" class="form-control" id="nama_bank" name="nama_bank" placeholder="Masukkan Nama Bank">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Tambah</button>
            </div>
        </form>
    </div>
</div>

@endsection