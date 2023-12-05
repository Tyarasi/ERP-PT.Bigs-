@extends('welcome')
@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Status Transaksi</h3>
    </div>

    <div class="card-header">
        <a href="{{ route('statustransaksi.create') }}" class="btn btn-success icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table id="statustransaksi" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Status Transaksi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
            @php $no=1; @endphp
                @foreach($statustransaksi as $data)
                <tr>
                <td>{{ $no++ }}</td>
                    <td>{{ $data->nama_status}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('statustransaksi.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('statustransaksi.edit', $data->id) }}" class="btn btn-warning btn-edit">Edit</a>
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