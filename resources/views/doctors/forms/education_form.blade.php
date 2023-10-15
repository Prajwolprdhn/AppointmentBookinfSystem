@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1 class="m-0">Add Doctors</h1>
            </div><!-- /.col -->
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Doctors Form</li>
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
          <div class="col-md-10 ml-5">
            <!-- general form elements -->
            <div class="card card-info">
              <div class="card-header">
                <h3 class="card-title">Education Details</h3>
              </div>
              <!-- /.card-header -->
              <!-- form start -->
              <form>
                <div class="card-body">
                  <div class="form-group row">
                    <div class="input-group-prepend">
                        <label for="level" class="col-sm-2 col-form-label">Level</label>
                      <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                        Action
                      </button>
                      <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">SEE</a>
                        <a class="dropdown-item" href="#">+2</a>
                        <a class="dropdown-item" href="#">Diploma</a>
                        <a class="dropdown-item" href="#">Bachelors</a>
                        <a class="dropdown-item" href="#">Masters</a>
                        <a class="dropdown-item" href="#">PhD</a>
                      </div>
                      <label for="institution" class="col-sm-2 col-form-label ml-5">Institution</label>
                    <div class="col-sm-6">
                      <input type="text" class="form-control" id="institution" value="Institution's Name">
                    </div>
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="year" class="col-sm-2 col-form-label">Completion Year</label>
                    <div class="col-sm-2">
                      <input type="text" class="form-control" id="year" value="YYYY">
                    </div>
                    <label for="board" class="col-sm-2 col-form-label ml-5">Board</label>
                    <div class="col-sm-3">
                      <input type="text" class="form-control" id="board" value="eg. NEB, HSEB">
                    </div>
                  </div>
                  
                  <button type="submit" class="btn btn-primary float-right m-2"><i class="bi bi-plus mr-3"></i>Add</button>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                  <button type="submit" class="btn btn-info float-right m-2">Next</button>
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