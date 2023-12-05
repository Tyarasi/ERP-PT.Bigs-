@extends('welcome')
@section('content')


@php
 $user = Auth::user()->id;
 $jenisjabatan = Auth::user()->id_jenisjabatan;   
 $tasks = DB::select("SELECT * from tasks where id_stakeholder = '$user' ");
 $done = DB::select("SELECT status from tasks where status = 'Done' and id_stakeholder = '$user' ");
 $pemasukkan = DB::select("SELECT SUM (biaya) AS total FROM pemasukkans");
 $pengeluaran = DB::select("SELECT SUM (biaya) AS total FROM pengeluarans");
 $penawaran = DB::select("SELECT COUNT(id) AS penawaran FROM penawarans");
 $deal = DB::select("SELECT SUM(deal_value) AS dealvalue FROM penawarans where statuspenawaran = 'Disetujui'");
 $acc = DB::select("SELECT Count(statuspenawaran) AS acc from penawarans where statuspenawaran = 'Disetujui'");
 $setuju = DB::select("SELECT Count(id_customer) AS stjs from penawarans where statuspenawaran = 'Disetujui'");
 $menolak = DB::select("SELECT Count(id_customer) AS mnks from penawarans where statuspenawaran = 'Ditolak'");
 $customer = DB::select("SELECT COUNT(id) AS customer FROM customers");
 $jabatan = DB::select("SELECT * from jenis_jabatans where id = '$jenisjabatan'");
@endphp

<div class="row">
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
      <div class="inner">
        @foreach ($pemasukkan as $pemasukkans)
        <h2>Rp. {{ number_format ($pemasukkans->total)}}</h2>
        @endforeach
        <p>Saldo Pemasukan</p>
      </div>
    <br>  
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        @foreach ($pengeluaran as $pengeluarans)
        <h2>Rp. {{ number_format ($pengeluarans->total)}}</h2>
        @endforeach
        <p>Saldo pengeluaran</p>
      </div>
    <br>  
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        
          @foreach ($pemasukkan as $pemasukkans )
            @foreach ($pengeluaran as $pengeluarans )
          <?php
            $saldoP = $pemasukkans->total;
            $saldoPemasukkan = (int)$saldoP;
            $saldoPl = $pengeluarans->total;
            $saldoPengeluaran = (int)$saldoPl;
            $saldoakhir = $saldoPemasukkan - $saldoPengeluaran;
          ?>
          <h2>Rp. {{ number_format ($saldoakhir)}}</h2>
          @endforeach
          @endforeach

        <p>Total Saldo Akhir</p>
      </div>
    <br>  
    </div>
  </div>
</div>

<div class="row">

  <div class="col-6">
    <p class="text-center">
      <strong>Customer Relation Ship</strong>
    </p>
    <!-- /.progress-group -->

    <!-- /.progress-group -->
    <div class="progress-group">
      <span class="progress-text">Total Customer Approved</span>
      @foreach ($setuju as $stj )
      @foreach ($customer as $customers)
      <span class="float-right"><b>{{ ($stj->stjs) }}</b>/{{ ($customers->customer) }}</span>
      @endforeach
      @endforeach
    </div>

    <!-- /.progress-group -->
    <div class="progress-group">
      Total Customer Not Approved
      @foreach ($menolak as $mnk )
      @foreach ($customer as $customers)
      <span class="float-right"><b>{{ ($mnk->mnks) }}</b>/{{ ($customers->customer) }}</span>
      @endforeach
      @endforeach
    </div>
    <!-- /.progress-group -->

    <div class="progress-group">
      Total Bids Aprroved
      @foreach ($deal as $deals )
      <span class="float-right"><b>Rp. {{ number_format ($deals->dealvalue) }},00-</b></span>
      @endforeach
    </div>

    <div class="progress-group">
      Approved Offer
      @foreach ($penawaran as $penawarans)
      @foreach ($acc as $accs)
      <span class="float-right"><b>{{$accs->acc}}</b>/{{$penawarans->penawaran}}</span>
      @endforeach
      @endforeach
      <div class="progress progress-sm">
        @foreach ($penawaran as $penawarans)
        @foreach ($acc as $accs)
        <?php
        $pnwrn = $penawarans->penawaran;
        $Total = (int)$pnwrn;
        $stj = $accs->acc;
        $Totalstj = (int)$stj;
        $TotalAll = $Totalstj*$Total;
        ?>
        <div class="progress-bar bg-primary" style="width: {{$TotalAll}}%"></div>
        
        @endforeach
      @endforeach
      </div>
    </div>

  </div>

  <div class="col-6">
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
          <div class="text-center">
            <img class="profile-user-img img-fluid img-circle" src="{{ Auth::user()->profile_photo_path }}" alt="User profile picture">
          </div>
    
          <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
          @foreach ($jabatan as $jabatans)
          <p class="text-muted text-center">{{ $jabatans->jenis_jabatan }}</p>
          @endforeach
          
    
          <ul class="list-group list-group-unbordered mb-3">
            <li class="list-group-item">
              <b>Total your task</b> <a class="float-right">{{ count($tasks)}}</a>
            </li>
            <li class="list-group-item">
              <b>Task Done</b> <a class="float-right">{{ count($done)}}</a>
            </li>
          </ul>
        </div>
        <!-- /.card-body -->
      </div>
    </div>

    


  </div>
   
</div>

<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">List your task</h3>
      </div>
      <!-- /.card-header -->
      <div class="card-body table-responsive p-0" style="height: 400px;">
        <table class="table table-head-fixed text-nowrap">
          <thead>
            <tr>
              <th>Nama Task</th>
              <th>Status</th>
              <th>Detail Task</th>
            </tr>
          </thead>
          <tbody>
              @foreach ($tasks as $task)
            <tr>
              <td>{{ $task->nama_task }}</td>
              @if ($task->status == "Done")
              <td><span class="badge badge-success">{{ $task->status }}</span></td>
              @else
              <td><span class="badge badge-danger">{{ $task->status }}</span></td>
              @endif
              <td>{{ $task->task }}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
</div>




@endsection