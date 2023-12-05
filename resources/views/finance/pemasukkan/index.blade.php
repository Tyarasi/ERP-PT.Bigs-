@extends('welcome')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Pemasukan</h3>
      
    </div>

    <div class="card-header">
        <a href="{{ route('pemasukan.create') }}" class="btn btn-success icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table id="pemasukan" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Pemasukkan</th>
                    <th>Tanggal Pemasukan</th>
                    <th>Biaya</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
             @php $no=1; @endphp
                @foreach($pemasukan as $data)
                <tr>
                <td>{{ $no++ }}</td>
                    <td>{{ $data->jenisproduk->jenis_produk}}</td>
                    <td>{{ $data->tgl_pemasukan}}</td>
                    <td>Rp. {{ number_format ($data->biaya)}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('pemasukan.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('pemasukan.edit', $data->id) }}" class="btn btn-warning btn-edit">Edit</a>
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