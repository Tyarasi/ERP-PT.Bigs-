@extends('welcome')

@section('content')


<div id="tambah" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <label class="control-label" for="nm_brg"><h5>New Project</h5></label>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close" class="modal-tite">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('store.project') }}" method="POST">
                @csrf
                <div class="modal-body">
                  <div class="form-group">
                    @foreach ($id_project as $idp)
                    <input type="hidden" class="form-control" name="id_project" value="{{ $idp->id }}" required>
                    @endforeach
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="nama_project">Name Project</label>
                        <input type="text" class="form-control" name="nama_project" required>
                    </div>

                    <div class="form-group">
                        <label class="control-label" for="type">Type</label>
                        <select class="form-control" id="type" name="type">
                            <option>Choose...</option>
                                    <option value="Small Bussiness">Small Bussiness</option>
                                    <option value="Sales CRM">Sales CRM</option>
                                    <option value="Operations">Operations</option>
                                    <option value="Engineering IT">Engineering IT</option>
                                    <option value="Marketing">Marketing</option>
                                    <option value="Human Resource">Human Resource</option>
                                    <option value="Other">Others..</option>
                        </select>
                    </div>
                    <div class="form-group">
                      <label class="control-label" for="stakeholder">StakeHolder</label>
                      <select multiple class="form-control" id="stakeholder" name="stakeholder[]">  
                          @foreach ($users as $user)
                            <option value="{{ $user->id }}">{{$user->name}}</option>
                            @endforeach
                      </select>
                  </div>

                    <div class="form-group">
                        <label class="control-label" for="deskripsi">Deskripsi</label>
                        <textarea type="text-area" class="form-control" name="deskripsi" required></textarea>
                    </div>

                    <button type="submit" class="btn btn-primary">Add Project</button>

                </div>
            </form>

            @error('ikodatainputkategori')
            <span class="text-danger">{{ $message }}</span>
            @enderror

        </div>
    </div>
</div>

@if(session('success'))
    <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
      <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
      </symbol>
      <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z"/>
      </symbol>
      <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
      </symbol>
    </svg>
    <div class="alert alert-success d-flex align-items-center fade show" role="alert">
        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
          <use xlink:href="#check-circle-fill"/>
        </svg>
        <strong>{{ session('success') }}</strong>
        <button type="button" class="close ml-auto" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      @endif

<div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Project List</h1>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </div>

  <div class="row">
    @foreach ($projects as $project)
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-info">
        <a href="{{ url('softdelete/project/'.$project->id) }}"><i class="fas fa-trash"></i></a>
        <div class="inner">
            <br>
            <h4 align="center">{{ $project->nama_project }}</h4>
            <br>
            <p>{{ $project->type }}</p>
            
         
        </div>
        <div class="icon">
          <i class="ion-code-working"></i>
        </div>
        <a href="{{ url('/project/modul/'.$project->id) }}" class="small-box-footer"
          >More info <i class="fas fa-arrow-circle-right"></i
        ></a>
      </div>
    </div>
    
    @endforeach
    <!-- ./col -->
    <div class="col-lg-3 col-6">
      <!-- small box -->
      <div class="small-box bg-gray">
        <div class="inner">
            <center><h3><sup style="font-size: 20px">Add New Project</sup></h3>
          <a data-toggle="modal" data-target="#tambah" class="btn btn-lg bg-secondary">
            <i class="fas fa-plus"></i>
          </a></center>
        </div>
        <div class="icon">
          
        </div>
        <div class="small-box-footer bg-gray">____________________________</div>
      </div>
    </div>

    
  

  </div>
@endsection

