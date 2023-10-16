@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Doctors Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Doctors Management</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        @if (session('success'))
            <div class="alert alert-success d-flex align-items-center" role="alert"
                style="position:absolute;
                  top:40px;
                  right:25px;
                  z-index: 9999;">
                <i class="fas fa-check pr-3"></i>
                <div>
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        @if (session('flash-message'))
            <div class="alert alert-success d-flex align-items-center" role="alert"
                style="position:absolute;
                  top:40px;
                  right:25px;
                  z-index: 9999;">
                <i class="fas fa-times pr-3"></i>
                <div>
                    {{ session('flash-message') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header ">
                                <h3 class="card-title mt-2">List of Doctors</h3>
                                <a class="btn btn-light float-right" href="{{ route('doctors_form') }}" role="button"
                                    style="color: black"><i class="fa fa-plus-circle mr-2"></i> Add Doctors</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Department</th>
                                            <th>Contact</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctors as $doctor)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $doctor->first_name . ' ' . $doctor->last_name }}</td>
                                                <td>{{ $doctor->department }}</td>
                                                <td>{{ $doctor->contact }}</td>
                                                <td class="project-actions text-right">
                                                    <form action="#" method="post">
                                                        <button type="submit" class="btn btn-warning"><i
                                                                class="fa fa-eye pr-2"></i> View</button>
                                                    </form>
                                                    <form action="" method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info"> <i
                                                                class="fa fa-pen-square pr-2">
                                                            </i>Edit</button>
                                                    </form>
                                                    <form action="" method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash pr-2">
                                                            </i>Delete</button>
                                                    </form>

                                                </td>
                                            </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>

    </div>
@endsection
