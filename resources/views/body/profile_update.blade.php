@extends('welcome')
@section('content')

@php
$jenisjabatan = Auth::user()->id_jenisjabatan;
$jabatan = DB::select("SELECT * from jenis_jabatans where id = '$jenisjabatan'"); 
@endphp

<div class="card card-primary card-outline">
    <div class="card-body box-profile">
      <div class="text-center">
        <img class="profile-user-img img-fluid img-circle" src="{{ asset($user->profile_photo_path) }}" alt="User profile picture">
      </div>

      <h3 class="profile-username text-center">{{ $user['name'] }}</h3>
      @foreach ($jabatan as $jabatans )
          <p class="text-muted text-center">{{ $jabatans->jenis_jabatan }}</p>
      @endforeach

      
        <div class="form-group">
            <label for="exampleFormControlInput3">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Your Name" value="{{ $user['name'] }}" disabled="">
        </div>

        <div class="form-group">
            <label for="exampleFormControlInput3">Email</label>
            <input type="text" class="form-control" name="email" placeholder="Your Name" value="{{ $user['email'] }}" disabled="">
        </div>

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