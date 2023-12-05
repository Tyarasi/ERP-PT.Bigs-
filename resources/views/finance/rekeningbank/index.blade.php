@extends('welcome')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Rekening Bank</h3>
    </div>

    <div class="card-header">
        <a href="{{ route('rekeningbank.create') }}" class="btn btn-success icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table id="rekeningbank" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Bank</th>
                    <th>Nomor Rekening</th>
                    <th>Nama Pemilik</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach($rekeningbank as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->jenisbank->nama_bank}}</td>
                    <td>{{ $data->nomor_rekening}}</td>
                    <td>{{ $data->nama_pemilik}}</td>
                    <td>
                    <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('rekeningbank.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('rekeningbank.edit', $data->id) }}" class="btn btn-warning btn-edit">Edit</a>
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