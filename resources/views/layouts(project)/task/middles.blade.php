@extends('welcome')
@section('content')
<div class="card">
    <div class="card-header">All Task Middle</div>
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
        @foreach ( $middle as $middles) 
    <tr>
      <th scope="row">{{ $i++ }}</th> 
      <td>{{ $middles->nama_task }}</td>
      <td>{{ $middles->task }}</td>
      <?php
      $id = $middles->id_stakeholder;
      $ids = (int)$id;
      $stakeholder = DB::select("SELECT name FROM users WHERE id ='$ids'");
      ?>
      @foreach ($stakeholder as $shl)
      <td>{{ $shl->name }}</td>
      @endforeach
      @if ($middles->status == "Done")
      <td><span class="badge badge-success">{{ $middles->status }}</span></td>
      @else ($cekstatus=="Not finished yet")
      <td><span class="badge badge-danger">{{ $middles->status }}</span></td>
      @endif
      <td>{{ Carbon\Carbon::parse($middles->created_at)->diffForHumans() }}</td>
        </tr>
        @endforeach
  </tbody>
</table>
</div>
<br>
@endsection