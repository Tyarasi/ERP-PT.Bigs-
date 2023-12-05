@extends('welcome')
@section('content')

<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Customer</h3>
    </div>
    
    <div class="card-header">
        <a href="{{ route('customer.create') }}" class="btn btn-primary icon-left btn-icon mb-2 btn-add" style="float: left;">
            <i class="fa fa-plus" style="font-size:12px"></i> Tambah
        </a>
    </div>

    <div class="card-body">
        <br>
        <table id="customer" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Customer</th>
                    <th>Nomor Handpone</th>
                    <th>Email</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>

                @php $no=1; @endphp
                @foreach($customer as $data)
                <tr>
                    <td>{{ $no++ }}</td>
                    <td>{{ $data->nama_cs}}</td>
                    <td>{{ $data->no_hp}}</td>
                    <td>{{ $data->email}}</td>
                    <td>{{ $data->alamat}}</td>
                    <td>
                        <form onsubmit="return confirm('Apakah Anda Yakin?');" action="{{ route('customer.destroy', $data->id) }}" method="POST">
                            <a href="{{ route('customer.edit', $data->id) }}" class="btn btn-primary btn-edit">Edit</a>
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