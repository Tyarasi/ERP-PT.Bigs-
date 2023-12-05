@extends('welcome')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Jenis Jabatan</h3>
    </div>

    <div class="card-header">
        <a href="{{ route('jenisjabatan.create') }}" class="btn btn-primary icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>
    
    <div class="card-body">
        <table id="jenisjabatan" class="table table-bordered table-striped">
            <thead>
                <tr>
                <th>No</th>
                    <th>Jenis Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no=1; @endphp
                @foreach($jenisjabatan as $data)
                <tr>
                <td>{{ $no++ }}</td>
                    <td>{{ $data->jenis_jabatan}}</td>
                    <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('jenisjabatan.destroy', $data->id) }}" method="POST">
                    <a href="{{ route('jenisjabatan.edit', $data->id) }}" class="btn btn-primary btn-edit">Edit</a>
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