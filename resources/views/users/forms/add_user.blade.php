@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Users</h1>
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
              <form action="{{route('create_doctor')}}" method="post">
                @csrf
                <div class="card-body">
                  <div class="form-group row">
                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                    <div class="col-sm-5">
                        <input type="hidden" name="status" value="0">
                        <input type="checkbox" class="form-check-input" id="status" name="status" value="1" {{ old('status') ? 'checked' : '' }}>
                    </div>
                </div>
                  {{-- <div class="form-group row">
                    <label for="lisence" class="col-sm-2 col-form-label">Lisence No.</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="lisence" value="Lisence No.">
                    </div>
                    <label for="dept" class="col-sm-2 col-form-label">Department</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="dept" value="Department">
                    </div>
                  </div> --}}
                  {{-- <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Full Name</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="name" placeholder="Full Name">
                    </div>
                  </div> --}}
                  <div class="form-group row ">
                    <label for="fname" class="col-sm-2 col-form-label ">First Name</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name">
                    </div>
                    {{-- <label for="mname" class="col-sm-2 col-form-label">Middle Name</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="mname" placeholder="Middle Name">
                    </div> --}}
                    <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name">
                    </div>
                  </div>
                  {{-- <div class="form-group row">
                    <!-- radio -->
                      <div class="form-group">
                        <label class="col-sm-2 col-form-label" for="exampleInputEmail1">Sex</label>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input mt-1" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                          <label class="form-check-label" for="inlineRadio1">Male</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input mt-1" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                          <label class="form-check-label" for="inlineRadio2">Female</label>
                        </div>
                        <div class="form-check form-check-inline">
                          <input class="form-check-input mt-1" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                          <label class="form-check-label" for="inlineRadio2">Others</label>
                        </div>
                      </div>
                  </div> --}}
                  
                  <div class="form-group row">
                    <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-5">
                      <input type="text" class="form-control" id="inputEmail" name="email" value="email">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                    <div class="col-sm-5">
                      <input type="password" class="form-control" id="inputPassword" name="password" placeholder="Password">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                    <div class="col-sm-5">
                      <select class="form-control select2" name="role" style="width: auto;">
                        <option selected="selected">-- select one --</option>
                        <option value="Admin">Admin</option>
                        <option value="Doctor">Doctor</option>
                        <option value="User">User</option>
                      </select>
                    </div>
                  </div>
                  {{-- <div class="form-group row">
                    <label for="exampleInputFile">Upload Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" class="custom-file-input" id="exampleInputFile">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>
                      <div class="input-group-append">
                        <span class="input-group-text">Upload</span>
                      </div>
                    </div>
                  </div> --}}
                  
                  {{-- <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div> --}}
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-secondary float-right m-2" style="color: white">Create Profile</button>
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