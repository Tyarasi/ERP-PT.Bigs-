@extends('welcome')
@section('content')


<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Transaksi</h3>
    </div>

    <div class="card-header">
        <a href="{{ route('transaksi.create') }}" class="btn btn-success icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table id="transaksi" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jenis Produk</th>
                   <th>Status Transaksi</th>
                   <th>Tanggal Pembayaran</th>
                   <th>Total Bayar</th>
                   <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @php $no=1; @endphp
                @foreach($transaksi as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->jenisproduk->jenis_produk}}</td>
                    <td>{{ $data->status_transaksi}}</td>
                    <td>{{ $data->tgl_bayar}}</td>
                    <td>Rp. {{ number_format ($data->total_bayar) }}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('transaksi.destroy', $data->id) }}" method="POST">
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