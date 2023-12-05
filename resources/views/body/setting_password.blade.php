@extends('welcome')
@section('content')

<div class="card card-primary card-outline">
    <div class="card-body box-profile">

      <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>
      <br>
      <br>

      <form method="POST" action="{{ route('password.update') }}" class="form-pill">
        @csrf
        <div class="form-group">
            <label for="exampleFormControlInput3">Current Password</label>
            <input type="password" class="form-control" name="oldpassword" id="current_password" placeholder="Current Password">
            @error('oldpassword')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlPassword3">New Password</label>
            <input type="password" class="form-control" name="password" id="password" placeholder="New Password">
            @error('password')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <div class="form-group">
            <label for="exampleFormControlPassword3">Confirm Password</label>
            <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder=" Confirm Password">
            @error('password_confirmation')
            <span class="text-danger">{{ $message }}</span>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary ml-auto">Save Change</button>
    </form>
    </div>
    <!-- /.card-body -->
  </div>


@endsection