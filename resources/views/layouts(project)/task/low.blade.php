@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">All Task Low</div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">No.</th>
      <th scope="col">Name Task</th>
      <th scope="col">Detail Task</th>
      <th scope="col">Name Stakeholder</th>
      <th scope="col">Status</th>
      <th scope="col">Create At</th>
    </tr>
  </thead>
  <tbody>

    @php($i = 1)
        @foreach ( $Low as $Lows) 
    <tr>
      <th scope="row">{{ $i++ }}</th> 
      <td>{{ $Lows->nama_task }}</td>
      <td>{{ $Lows->task }}</td>
      <?php
      $id = $Lows->id_stakeholder;
      $ids = (int)$id;
      $stakeholder = DB::select("SELECT name FROM users WHERE id ='$ids'");
      ?>
      @foreach ($stakeholder as $shl)
      <td>{{ $shl->name }}</td>
      @endforeach
      @if ($Lows->status == "Done")
      <td><span class="badge badge-success">{{ $Lows->status }}</span></td>
      @else ($cekstatus=="Not finished yet")
      <td><span class="badge badge-danger">{{ $Lows->status }}</span></td>
      @endif
      <td>{{ Carbon\Carbon::parse($Lows->created_at)->diffForHumans() }}</td>
        </tr>
        @endforeach
  </tbody>
</table>
</div>
<br>
@endsection