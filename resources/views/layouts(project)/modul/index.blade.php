@extends('welcome')
@section('content')

<div class="col-md-12">

    <div id="tambah" class="modal fade" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <label class="control-label" for="nm_brg"><h5>New Modul</h5></label>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="modal-tite">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="{{ route('store.modul') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label" for="nama_modul">Name Modul</label>
                            <input type="text" class="form-control" name="nama_modul" required>
                        </div>

                        <div class="form-group">
                            <label class="control-label" for="id_project">To Project</label>
                            <select class="form-control" id="id_project" name="id_project">
                                        <option value="{{ $projects->id }}">{{ $projects->nama_project }}</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary">Add Modul</button>

                    </div>
                </form>

                @error('ikodatainputkategori')
                <span class="text-danger">{{ $message }}</span>
                @enderror

            </div>
        </div>
    </div>

    @if(session('success'))
        {{ session('success') }}
      @endif

    <div class="card">
          <div class="card-header">All Modul {{ $projects->nama_project }}</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">No.</th>
            <th scope="col">Name Modul</th>
            <th scope="col">Created_at</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

          @php($i = 1)
              @foreach ( $moduls as $modul) 
          <tr>
            <th scope="row">{{ $i++ }}</th> 
            <td>{{ $modul->nama_modul }}</td>
            <td>{{ Carbon\Carbon::parse($modul->created_at)->diffForHumans() }}</td>
            <td> 
                <a href="{{ url('delete/modul/'.$modul->id) }}" class="btn btn-danger">Delete</a>
                <a href="{{ url('/project/modul/task/'.$modul->id) }}" class="btn btn-info">Select</a>  
              </td>
              </tr>
              @endforeach
        </tbody>
      </table>
    </div>
    <br>
    <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tambah">Add a New Modul</button>
</div>

@endsection