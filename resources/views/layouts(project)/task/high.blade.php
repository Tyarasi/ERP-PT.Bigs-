@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">All Task High</div>
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
        @foreach ( $High as $Highs) 
    <tr>
      <th scope="row">{{ $i++ }}</th> 
      <td>{{ $Highs->nama_task }}</td>
      <td>{{ $Highs->task }}</td>
      <?php
      $id = $Highs->id_stakeholder;
      $ids = (int)$id;
      $stakeholder = DB::select("SELECT name FROM users WHERE id ='$ids'");
      ?>
      @foreach ($stakeholder as $shl)
      <td>{{ $shl->name }}</td>
      @endforeach
      @if ($Highs->status == "Done")
      <td><span class="badge badge-success">{{ $Highs->status }}</span></td>
      @else ($cekstatus=="Not finished yet")
      <td><span class="badge badge-danger">{{ $Highs->status }}</span></td>
      @endif
      <td>{{ Carbon\Carbon::parse($Highs->created_at)->diffForHumans() }}</td>
        </tr>
        @endforeach
  </tbody>
</table>
</div>
<br>
@endsection