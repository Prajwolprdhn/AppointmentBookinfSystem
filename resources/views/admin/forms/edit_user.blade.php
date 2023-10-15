@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Update Users</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Users Form</li>
              </ol>
            </div><!-- /.col -->
          </div><!-- /.row -->
        </div><!-- /.container-fluid -->
      </div>
      <!-- /.content-header -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title mt-2">Basic Info</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form action="{{route('edit_users',['user_id'=>$details->id])}}" method="post">
                @csrf
                @method("put")
                <div class="card-body">
                    <div class="form-group row">
                      <label for="status" class="col-sm-2 col-form-label">Status</label>
                      <div class="col-sm-5">
                          <input type="hidden" name="status" value="0">
                          <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ $details->status == 1 ? 'checked' : '' }}>
                      </div>
                  </div>
                    <div class="form-group row ">
                      <label for="fname" class="col-sm-2 col-form-label ">First Name</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="fname" name="fname" value="{{ explode(' ', $details->name)[0] }}">
                        @error('fname')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                      <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                      <div class="col-sm-2">
                        <input type="text" class="form-control" id="lname" name="lname" value="{{ explode(' ', $details->name)[1] ?? '' }}">
                        @error('lname')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                      <div class="col-sm-5">
                        <input type="text" class="form-control" id="inputEmail" name="email" value="{{$details->email}}">
                        @error('email')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                      <div class="col-sm-5">
                        <input type="password" class="form-control" id="inputPassword" name="password" value="{{$details->password}}" readonly>
                        @error('password')
                            <span class="text-danger">{{$message}}</span>
                          @enderror
                      </div>
                    </div>
                    <div class="form-group row">
                      <label for="role" class="col-sm-2 col-form-label">Role</label>
                      <div class="col-sm-5">
                        <select class="form-control select2" name="role" style="width: auto;">
                          <option selected="selected" value="">-- select one --</option>
                          <option value="0" {{ $details->role == 0 ? 'selected' : '' }}>Admin</option>
                          <option value="1" {{ $details->role == 1 ? 'selected' : '' }}>Doctor</option>
                          <option value="2" {{ $details->role == 2 ? 'selected' : '' }}>User</option>
                        </select>
                      </div>
                    </div>
                  </div>
                  <!-- /.card-body -->
  
                  <div class="card-footer">
                    <button type="submit" class="btn btn-secondary float-right m-2" style="color: white">Update Profile</button>
                    {{-- <button type="submit" onclick="" class="btn btn-info float-right m-2">Next</button> --}}
                  </div>
              </form>
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>
    </div>
</div>
@endsection