@extends('layouts.app')

@section('content')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Personal Details</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{route('home')}}" style="text-decoration: none">Home</a></li>
              <li class="breadcrumb-item"><a href="{{route('doctors_table')}}" style="text-decoration: none">Doctors Management</a></li>
              <li class="breadcrumb-item active">Personal Details</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="card">
        <div class="card-header">
          <h2 class="card-title mt-2">Full Details</h2>
        </div>
                  <div class="card-body">

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Birthday:</div>
                      <div class="col-md-9">
                        May 3, 1995
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Country:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body">Canada</a>
                      </div>
                    </div>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Languages:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body">English</a>
                      </div>
                    </div>

                    <h6 class="my-3">Contacts</h6>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Phone:</div>
                      <div class="col-md-9">
                        +0 (123) 456 7891
                      </div>
                    </div>

                    <h6 class="my-3">Interests</h6>

                    <div class="row mb-2">
                      <div class="col-md-3 text-muted">Favorite music:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body">Rock</a>,
                        <a href="javascript:void(0)" class="text-body">Alternative</a>,
                        <a href="javascript:void(0)" class="text-body">Electro</a>,
                        <a href="javascript:void(0)" class="text-body">Drum &amp; Bass</a>,
                        <a href="javascript:void(0)" class="text-body">Dance</a>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-3 text-muted">Favorite movies:</div>
                      <div class="col-md-9">
                        <a href="javascript:void(0)" class="text-body">The Green Mile</a>,
                        <a href="javascript:void(0)" class="text-body">Pulp Fiction</a>,
                        <a href="javascript:void(0)" class="text-body">Back to the Future</a>,
                        <a href="javascript:void(0)" class="text-body">WALL·E</a>,
                        <a href="javascript:void(0)" class="text-body">Django Unchained</a>,
                        <a href="javascript:void(0)" class="text-body">The Truman Show</a>,
                        <a href="javascript:void(0)" class="text-body">Home Alone</a>,
                        <a href="javascript:void(0)" class="text-body">Seven Pounds</a>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- / Info -->
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
@endsection