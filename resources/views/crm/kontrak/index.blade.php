@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Kontrak</h3>
    </div>
    
    <div class="card-header">
        <a href="{{ route('kontrak.create') }}" class="btn btn-primary icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <table id="kontrak" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Jenis Layanan</th>
                    <th>Tanggal Awal</th>
                    <th>Tanggal Akhir</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @php $no=1; @endphp
                @foreach($kontrak as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->customer->nama_cs}}</td>
                    <td>{{ $data->jenisproduk->jenis_produk}}</td>
                    <td>{{ $data->tanggal_awal}}</td>
                    <td>{{ $data->tanggal_akhir}}</td>
                    <td>
                        <?php
                            $tw = $data->tanggal_awal;
                            $ta = $data->tanggal_akhir;
                            $datetime1 = new DateTime($tw);
                            $datetime2 = new DateTime($ta);
                            $diff_days = $datetime2 -> diff($datetime1);
                            $days = $diff_days->format('%a');
                            echo $days;
                        ?> Days
                    </td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('kontrak.destroy', $data->id) }}" method="POST">
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