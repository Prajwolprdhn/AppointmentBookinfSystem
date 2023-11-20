@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Department Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Department Management</li>
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
                                <h3 class="card-title mt-2">List of Departments</h3>
                                <a class="btn btn-light float-right" href="{{ route('department_form') }}" role="button"
                                    style="color: black"><i class="fa fa-plus-circle mr-2"></i> Add Department</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Department</th>
                                            <th>Members</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($departments as $department)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $department->departments }}</td>
                                                <td>{{ $department->doctor->count() }}</td>
                                                <td class="project-actions text-right">
                                                    <form
                                                        action="{{ route('edit_department', ['department_id' => $department->id]) }}"
                                                        method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info" style="color:white;"> <i
                                                                class="fa fa-pen-square pr-2">
                                                            </i>Edit</button>
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
