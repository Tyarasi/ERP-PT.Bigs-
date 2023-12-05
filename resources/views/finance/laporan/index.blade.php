@extends('welcome')
@section('content')


<div class="card-header">
    <h3 class="card-title">Data Laporan Pemasukan PT BIGS</h3>
</div>   
<div class="card">
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Jenis Pemasukan</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>                                        
            </tr>
        </thead>
        <tbody>
        @php $no=1; @endphp
        @foreach($laporanPemasukan as $data)
            <tr>
            <td>{{ $no++ }}</td>
            <td>{{ $data->id_jenisproduk }}</td> 
            <td>{{ $data->tgl_pemasukan}}</td>
            <td>Rp. {{ number_format ($data->biaya)}}</td>
        @endforeach
        <tr>
            <th colspan="3" class="text-right">Total Pemasukan</th>
            <td>Rp. {{ number_format($total_pemasukan)}}</td>
          </tr>
        </tbody>
    </table>
    
</div>

<div class="card-header">
    <h3 class="card-title">Data Laporan Pengeluaran PT BIGS</h3>
</div>   
<div class="card">
<div class="card-body">
<table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
            <th>No</th>
            <th>Jenis Pemasukan</th>
                <th>Tanggal</th>
                <th>Pemasukan</th>                                        
            </tr>
        </thead>
        <tbody>
        @php $no=1; @endphp
        @foreach($laporanPengeluaran as $data)
            <tr>
            <td>{{ $no++ }}</td>
            
            <td>{{ $data->id_jenisproduk }}</td>    
            <td>{{ $data->tgl_pengeluaran}}</td>
            <td>Rp. {{ number_format ($data->biaya)}}</td>
        @endforeach
        <tr>
            <th colspan="3" class="text-right">Total Pengeluaran</th>
            <td>Rp. {{ number_format($total_pengeluaran)}}</td>
          </tr>
          <tr>
            <th colspan="3" class="text-right">Saldo Pemasukkan</th>
            <td>Rp. {{ number_format($total_pemasukan)}} 
          <tr>
            <th colspan="3" class="text-right">Saldo Pengeluaran</th>
            <td>Rp. {{ number_format($total_pengeluaran)}} -</td>
          </tr>
          <tr>
            <?php
            $saldoP = $total_pemasukan;
            $saldoPemasukkan = (int)$saldoP;
            $saldoPl = $total_pengeluaran;
            $saldoPengeluaran = (int)$saldoPl;
            $saldoakhir = $saldoPemasukkan - $saldoPengeluaran;
            ?>
            <th colspan="3" class="text-right">Saldo Akhir</th>
            <td>Rp. {{ number_format($saldoakhir) }}</td>
          </tr>
        </tbody>
    </table>
    
</div>

@endsection