@extends('layouts.app')
@inject('doctor_helper', 'App\Helpers\DoctorHelper')
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

                            <form action="{{ route('add_users') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">

                                        <label class="col-sm-2 col-form-label" for="exampleInputStatus">Status</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="status"
                                                id="inlineRadio1" value="0">
                                            <label class="form-check-label" for="inlineRadio1">InActive</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="status"
                                                id="inlineRadio2" value="1">
                                            <label class="form-check-label" for="inlineRadio2">Active</label>
                                        </div>
                                        @error('status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row ">
                                        <label for="fname" class="col-sm-2 col-form-label ">First Name</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="fname" name="first_name"
                                                placeholder="First Name">
                                            @error('fname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="lname" name="last_name"
                                                placeholder="Last Name">
                                            @error('lname')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="inputEmail" name="email"
                                                value="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" id="inputPassword" name="password"
                                                placeholder="Password">
                                            @error('password')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Confirm
                                            Password</label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" id="inputPassword"
                                                name="password_confirmation" placeholder="Confirm Password">
                                            @error('password_confirmation')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="role" class="col-sm-2 col-form-label">Role</label>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <select class="form-control select2" name="role" style="width: auto;">
                                                    <option selected="selected">-- Select Roles -- </option>
                                                    <option value="0">Admin</option>
                                                    <option value="1">Doctor</option>
                                                    <option value="2">User</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i
                                                            class="fas fa-caret-down"></i></span>
                                                </div>
                                            </div>
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
                                    <button type="submit" class="btn btn-secondary float-right m-2"
                                        style="color: white">Create Profile</button>
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
