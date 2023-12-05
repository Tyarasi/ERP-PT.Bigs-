@extends('welcome')

@section('content')

<div class="card">

    <div class="card-header">
        <h3 class="card-title">Ubah Data Karyawan</h3>
    </div>

    <form action="{{ route('karyawan.update', $karyawan->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <input type="hidden" name="old_image" value="{{ $karyawan->profile_photo_path }}">
        <div class="card-body">

            <div class="row">
                <div class="col col-md-6 form-group">
                    <label>Nama Karyawan</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder=" " value="{{ $karyawan->name }}">
                </div>

                <div class="col col-md-6 form-group">
                    <label>NIK</label>
                    <input type="text" class="form-control" id="nik_karyawan" name="nik_karyawan" placeholder=" " value="{{ $karyawan->nik_karyawan }}">
                </div>

            </div>

            <div class="row">

                <div class="col col-md-6 form-group">
                    <label>Nomor Handpone</label>
                    <input type="text" class="form-control" id="no_hp" name="no_hp" placeholder="" value="{{ $karyawan->no_hp }}">
                </div>

                <div class="col col-md-6 form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" id="email" name="email" placeholder="" value="{{ $karyawan->email }}">
                </div>

            </div>

            <div class="row">

                <div class="col col-md-6 form-group">
                    <label>Alamat</label>
                    <input type="text" class="form-control" id="alamat" name="alamat" placeholder="" value="{{ $karyawan->alamat }}">
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

            <div class="co col-md-6 form-group">
                <label for="exampleInputFile">Foto Karyawan</label>
                <div class="input-group">
                    <div class="custom-file">
                        <input type="file" class="custom-file-input" name="profile_photo_path" value="{{ $karyawan->foto_karyawan }}">
                        <label class="custom-file-label" for="exampleInputFile">Pilih Gambar</label>
                    </div>
                </div>
            </div>
            </div>
            
            <div class="row">
                <div class="co col-md-2 form-group">
                    <button type="submit" class="btn btn-primary" style="float: left;">Ubah</button>

                    <a href="{{ route('karyawan.index') }}" class="btn btn-danger btn-destroy" style="float: right;">
                    Kembali</a>
                </div>
            </div>
</form>
</div>

@endsection