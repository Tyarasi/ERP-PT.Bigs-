@extends('welcome')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Penawaran</h3>
    </div>

    <div class="card-header">
        <a href="{{ route('penawaran.create') }}" class="btn btn-primary icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table id="penawaran" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Penawaran</th>
                    <th>Jenis Produk</th>
                    <th>Nama Customer</th>
                    <th>Prioritas Penawaran</th>
                    <th>Expected Value</th>
                    <th>Tanggal</th>
                    <th>Status Penawaran</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach($penawaran as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama_penawaran}}</td>
                    <td>{{ $data->jenisproduk->jenis_produk}}</td>
                    <td>{{ $data->customer->nama_cs}}</td>
                    <td>{{ $data->jenisprioritas}}</td>
                    <td> Rp. {{ number_format($data->deal_value)}}</td>
                    <td>{{ $data->tanggal}}</td>
                    <td>{{ $data->statuspenawaran}}</td>

                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('penawaran.destroy', $data->id) }}" method="POST">
                        <a href="{{ route('penawaran.edit', $data->id) }}" class="btn btn-primary btn-edit">Edit</a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-destroy">
                                Hapus</button>
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