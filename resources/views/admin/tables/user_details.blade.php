@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Users Management</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Users Management</li>
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
                                <h3 class="card-title mt-2">List of Users</h3>
                                <a class="btn btn-light float-right" href="{{ route('users_form') }}" role="button"
                                    style="color: black"><i class="fa fa-plus-circle mr-2"></i> Add Users</a>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Role</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->role == 0)
                                                        Admin
                                                    @elseif($user->role == 1)
                                                        Doctor
                                                    @else
                                                        User
                                                    @endif
                                                </td>
                                                <td>
                                                    @if ($user->status == 1)
                                                        Active
                                                    @else
                                                        Inactive
                                                    @endif
                                                </td>
                                                <td class="project-actions text-right">
                                                    <form action="#" method="post">
                                                        <button type="submit" class="btn btn-warning"><i
                                                                class="fa fa-eye pr-2"></i> View</button>
                                                    </form>
                                                    <form action="{{ route('edit_form', ['user_id' => $user->id]) }}"
                                                        method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info"> <i
                                                                class="fa fa-pen-square pr-2">
                                                            </i>Edit</button>
                                                    </form>
                                                    <form action="{{ route('delete_users', ['user' => $user]) }}"
                                                        method="post">
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
