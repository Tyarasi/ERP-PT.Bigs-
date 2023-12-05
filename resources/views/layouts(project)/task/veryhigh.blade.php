@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">All Task Very High</div>
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
        @foreach ( $Vhigh as $Vhighs) 
    <tr>
      <th scope="row">{{ $i++ }}</th> 
      <td>{{ $Vhighs->nama_task }}</td>
      <td>{{ $Vhighs->task }}</td>
      <?php
      $id = $Vhighs->id_stakeholder;
      $ids = (int)$id;
      $stakeholder = DB::select("SELECT name FROM users WHERE id ='$ids'");
      ?>
      @foreach ($stakeholder as $shl)
      <td>{{ $shl->name }}</td>
      @endforeach
      @if ($Vhighs->status == "Done")
      <td><span class="badge badge-success">{{ $Vhighs->status }}</span></td>
      @else ($cekstatus=="Not finished yet")
      <td><span class="badge badge-danger">{{ $Vhighs->status }}</span></td>
      @endif
      <td>{{ Carbon\Carbon::parse($Vhighs->created_at)->diffForHumans() }}</td>
        </tr>
        @endforeach
  </tbody>
</table>
</div>
<br>
@endsection