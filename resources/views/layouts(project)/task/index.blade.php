@extends('welcome')
@section('css')
<!-- DataTables -->
<link rel="stylesheet" href="{{ asset('plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ asset('plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
<link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">
<link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
<link href="stylesheet" href="main.css" />
<link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

@endsection

@section('content')
<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="control-label" for="nm_brg"><h5>New Card Task</h5></label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="modal-tite">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('store.task') }}" method="POST" >
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    <label class="control-label" for="type">Title task</label>
                    <input type="text" class="form-control" name="nama_task" required>
                 </div>
                  <div class="form-group">
                  <input type="hidden" class="form-control" name="status" value="Not finished yet" required>
                  </div>
                    <div class="form-group">
                        <label class="control-label" for="type">Type task</label>
                        <select class="form-control" id="type" name="type">
                            <option>Choose...</option>
                                    <option value="Add">Add</option>
                                    <option value="Change">Change</option>
                                    <option value="Bugs">Bugs</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="For">For</label>
                        <select class="form-control" id="For" name="For">
                            <option>Choose...</option>
                                    <option value="Internal">Internal</option>
                                    <option value="External">External</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="Priority">Priority</label>
                        <select class="form-control" id="Priority" name="Priority">
                            <option>Choose...</option>
                                    <option value="Lows">Low</option>
                                    <option value="Middle">Middle</option>
                                    <option value="High">High</option>
                                    <option value="Very High">Very High</option>
                        </select>
                    </div>

                    <div class="form-group">
                      <label class="control-label" for="stakeholder">Stakeholder</label>
                      <select class="form-control" id="stakeholder" name="stakeholder">
                        @foreach ($users as $user)
                        <option value="{{ $user->id }}">{{$user->name}}</option>
                        @endforeach
                      </select>
                  </div>

                    <div class="form-group">
                        <label class="control-label" for="task">Description Task</label>
                        <textarea type="text-area" class="form-control" name="task" required></textarea>
                    </div>
                   
                    <div class="row">
                      <div class="col-sm-6">  
                          <div class="form-group">
                            <label for="event_start_date">Event start</label>
                            <input type="date" name="start_date" id="start_date" class="form-control onlydatepicker" placeholder="Event start date">
                           </div>
                      </div>
                      <div class="col-sm-6">  
                          <div class="form-group">
                            <label for="event_end_date">Event end</label>
                            <input type="date" name="end_date" id="end_date" class="form-control" placeholder="Event end date">
                          </div>
                      </div>
                  </div>
                  <div class="form-group">
                    <input type="hidden" id="id_modul" name="id_modul" value="{{ $moduls->id }}">
                    </div>

                    <button type="submit" class="btn btn-primary" onclick="save_event()" >Add Task</button>

                </div>
            </form>

            @error('ikodatainputkategori')
            <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>
    </div>
</div>

<div class="container">

  <div class="row">
    
    <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-info">
      <div class="inner">
          <h3>{{ count($low) }}</h3>
          <p>Task Low</p>
      </div>
      <div class="icon">
          <i class=""></i>
      </div>
      <a href="{{ url('/detail/task/Low/'.$moduls->id) }}" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
      </a>
      </div>
  </div>
  <div class="col-lg-3 col-6">
      <!-- small card -->
      <div class="small-box bg-success">
      <div class="inner">
          <h3>{{ count($middle) }}</h3>
  
          <p>Task Middle</p>
      </div>
      <div class="icon">
          <i class="ion ion-stats-bars"></i>
      </div>
      <a href="{{ url('/detail/task/middle/'.$moduls->id) }}" class="small-box-footer">
          More info <i class="fas fa-arrow-circle-right"></i>
      </a>
      </div>
  </div>
  <div class="col-lg-3 col-6">
  
                  <div class="small-box bg-warning">
                    <div class="inner">
                      <h3>{{ count($high) }}</h3>
  
                      <p>Task High</p>
                    </div>
                    <div class="icon">
                      <i class="fas fa-user-plus"></i>
                    </div>
                    <a href="{{ url('/detail/task/High/'.$moduls->id) }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-3 col-6">
                  <!-- small card -->
                  <div class="small-box bg-danger">
                    <div class="inner">
                      <h3>{{ count($veryhigh) }}</h3>
          
                      <p>Task Very High</p>
                    </div>
                    <div class="icon">
                      <i class=""></i>
                    </div>
                    <a href="{{ url('/detail/task/VeryHigh/'.$moduls->id) }}" class="small-box-footer">
                      More info <i class="fas fa-arrow-circle-right"></i>
                    </a>
                  </div>
                </div>
      </div>
  </div>



  </div>

  <div class="card">
    <div class="card-header">
      <h3 class="card-title">
        <i class="ion ion-clipboard mr-1"></i>
        To Do List {{ $moduls->nama_modul }}
      </h3>

    </div>
    <!-- /.card-header -->
    <div class="card-body">
      <ul class="todo-list" data-widget="todo-list">
        @foreach ($tasks as $task)
        <li>
          
          <!-- todo text -->
          <span class="text">{{$task->task}}</span>
          <!-- Emphasis label -->
          <small class="badge badge-danger"><i class="far fa-clock"></i> {{ Carbon\Carbon::parse($task->created_at)->diffForHumans() }}</small>
          @if ($task->status == "Done")
          <span class="badge badge-success">{{ $task->status }}</span>
          @else ($cekstatus=="Not finished yet")
          <span class="badge badge-danger">{{ $task->status }}</span>
          @endif
          <div class="tools">
            <a href="{{ url('delete/task/'.$task->id) }}" class="btn btn-danger"><i class="fas fa-trash"></i></a>
            {{-- <a href="{{ url('edit/task/'.$task->id) }}" class="btn btn-info"><i class="fas fa-check"></i></a>   --}}
            <a href="{{ url('/modul/'.$moduls->id.'/edit/task/'.$task->id) }}" class="btn btn-info"><i class="fas fa-check"></i></a>  
            
          </div>
          
          <br>
          <!-- General tools such as edit or delete-->

        </li>
        @endforeach
      </ul>
    </div>
  </div>
  <button type="button" class="btn btn-primary ml-auto" data-toggle="modal" data-target="#tambah">Add a New Task</button>

</div>

@endsection