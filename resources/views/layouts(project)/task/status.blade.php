@extends('welcome')
@section('content')


<div class="card card-warning">
    <div class="card-header">
      <h3 class="card-title">Change your status task</h3>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <form action="{{ url('status/update/'.$tasks->id) }}" method="POST">
      @csrf
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Title Task</label>
              <input type="text" class="form-control" placeholder="{{ $tasks->nama_task }}" disabled="">
              <input type="hidden" name="id_tasks" class="form-control" value="{{ $id_tasks }}">  
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label>Task</label>
              <textarea class="form-control" rows="3" placeholder="{{ $tasks->task }}" disabled=""></textarea>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-sm-6">
            <!-- select -->
            <div class="form-group">
              <label>Status</label>
              <select class="form-control" name="status">
                <option value="Not finished yet">Not finished yet</option>
                <option value="Done">Done</option>
              </select>
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Save Changes</button>
      </form>
    </div>
    <!-- /.card-body -->
  </div>


@endsection