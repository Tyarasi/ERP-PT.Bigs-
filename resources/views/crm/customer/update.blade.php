@extends('welcome')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Ubah Data Customer</h3>
    </div>

    <form action="{{ route('customer.update', $customer->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card-body">
            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Nama Customer</label>
                    <input type="text" class="form-control" id="nama_cs" name="nama_cs" placeholder=" " value="{{ $customer->nama_cs }}">
                </div>

                <div class="col col-md-6 form-group">
                    <label>Nomor Handpone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="" value="{{ $customer->no_hp }}">
                </div>
            
                <div class="col col-md-6 form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ $customer->email }}">
                </div>

                <div class="col col-md-6 form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="{{ $customer->alamat }}">
                </div>

                <div class="co col-md-2 form-group">
                    <button type="submit" class="btn btn-primary" style="float: left;">Ubah</button>

                    <a href="{{ route('customer.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                        Kembali</a>
                </div>

            </div>
    </form>
@endsection