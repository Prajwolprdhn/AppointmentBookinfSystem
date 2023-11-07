@extends('layouts.app')

@section('content')
    {{-- @dd($doctors) --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Schedule Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Schedule Management</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        {{-- @include('layouts.popup') --}}
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
                                                <td>
                                                    @if ($doctor->department)
                                                        {{ $doctor->department->departments }}
                                                    @else
                                                        -
                                                    @endif
                                                </td>
                                                <td>{{ $doctor->contact }}</td>
                                                <td class="project-actions text-right">
                                                    {{-- <form action="{{ route('view_doctor', ['doctor_id' => $doctor->id]) }}"
                                                        method="get">
                                                        <button type="submit" class="btn btn-info" style="color:white;"><i
                                                                class="fa fa-eye pr-2"></i>
                                                            View</button>
                                                    </form> --}}
                                                    <form action="{{ route('edit_doctor', ['doctor_id' => $doctor->id]) }}"
                                                        method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info" style="color:white;">
                                                            <i class="fa fa-pen-square pr-2">
                                                            </i>Manage</button>
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
