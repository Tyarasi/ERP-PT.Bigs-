@extends('welcome')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Karyawan</h3>
    </div>
    
    <div class="card-header">
        <a href="{{ route('karyawan.create') }}" class="btn btn-primary icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <br>
        <table id="karyawan" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama karyawan</th>
                    <th>NIK</th>
                    <th>Nomor Handpone</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Jabatan</th>
                    <th>Foto karyawan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @php $no=1; @endphp
                @foreach($karyawan as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->name}}</td>
                    <td>{{ $data->nik_karyawan}}</td>
                    <td>{{ $data->no_hp}}</td>
                    <td>{{ $data->alamat}}</td>
                    <td>{{ $data->email}}</td>
                    <td>{{ $data->jenisjabatan->jenis_jabatan}}</td>
                    <td><img src="{{ asset($data->profile_photo_path) }}" style="width:150px" class="img-thumbnail"></td>

                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('karyawan.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('karyawan.edit', $data->id) }}" class="btn btn-primary btn-edit">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-destroy">
                                Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

@endsection