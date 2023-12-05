@extends('welcome')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Tambah Data Customer</h3>
    </div>

    <form action="{{ route('customer.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Nama Customer</label>
                    <input type="text" class="form-control" id="nama_cs" name="nama_cs" placeholder=" ">
                </div>

                <div class="col col-md-6 form-group">
                    <label>Nomor Handpone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="">
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="">
                </div>

                <div class="col col-md-6 form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="">
                </div>
            </div>

                <div class="row">
                    <div class="col col-md-2 form-group">
                        <button type="submit" class="btn btn-primary" style="float: left;">Tambah</button>
                    </div>
                </div>
            
    </form>

</div>
@endsection