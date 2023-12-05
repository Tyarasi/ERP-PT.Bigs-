@extends('welcome')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Status Penawaran</h3>
    </div>

    <div class="card-header">
        <a href="{{ route('statuspenawaran.create') }}" class="btn btn-primary icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table id="statuspenawaran" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Status Penawaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no=1; @endphp
                @foreach($statuspenawaran as $data)
                <tr>
                <td>{{ $no++ }}</td>
                    <td>{{ $data->status_penawaran}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('statuspenawaran.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('statuspenawaran.edit', $data->id) }}" class="btn btn-primary btn-edit">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-destroy">
                                Hapus</i></button>
                        </form>
                        <br>
                        
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    
</div>

@endsection