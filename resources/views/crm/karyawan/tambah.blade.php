@extends('welcome')
@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Tambah Data Karyawan</h3>
    </div>

    <form action="{{ route('karyawan.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="card-body">
            <div class="row">

                <div class="col col-md-6 form-group">
                    <label>Nama Karyawan</label>
                    <input type="text" class="form-control" name="name" placeholder="Nama Karyawan">
                </div>

                <div class="col col-md-6 form-group">
                    <label>Email</label>
                    <input type="email" class="form-control" name="email" placeholder="Alamat Email">
                </div>
            </div>

            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Password</label>
                    <input type="password" class="form-control" name="password" placeholder="Password Default">
                </div> 

                <div class="col col-md-6 form-group">
                    <label>Nomor Handphone</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="Nomor Handphone">
                </div> 
            </div>

            <div class="row">

                <div class="col col-md-6 form-group">
                    <label>alamat</label>
                    <input type="text" class="form-control" name="alamat" placeholder="Alamat Tempat Tinggal">
                </div>
               
                <div class="col col-md-6 form-group">
                    <label>Jabatan</label>
                    <select class="form-control" id="id_jenisjabatan" name="id_jenisjabatan">
                        <option value="">--Pilih Jabatan--</option>
                        @foreach ($jenisjabatan as $ambil)
                        <!--var $jenisjabatan dari controller-->
                        <option value="{{ $ambil->id }}">{{ $ambil->jenis_jabatan }}</option>
                        @endforeach
                        
                    </select>
                </div>
            </div>

                <div class="row">
                    <div class="col col-md-6 form-group">
                        <label>NIK</label>
                        <input type="text" class="form-control" name="nik_karyawan" placeholder="Nik Karyawan">
                    </div>

                    <div class="co col-md-6 form-group">
                        <label for="exampleInputFile">Foto Karyawan</label>
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="profile_photo_path">
                                <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="co col-md-2 form-group">
                        <a href="{{ route('karyawan.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                            Back</a>
                        <button type="submit" class="btn btn-primary" style="float: left;">Tambah</button>
                    </div>
                </div>
    </form>
</div>

@endsection