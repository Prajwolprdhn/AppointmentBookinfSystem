@extends('layouts.app')

@section('content')
    {{-- @dd($doctors) --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Feedbacks</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Feedbacks</li>
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
                                <h3 class="card-title mt-2">List of Feedbacks</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Contact</th>
                                            <th>Message</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($feedbacks as $feedback)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $feedback->name }}</td>
                                                <td>{{ $feedback->email }}</td>
                                                <td>{{ $feedback->contact }}</td>
                                                <td>{{ $feedback->message }}</td>
                                                <td class="project-actions text-right">
                                                    <form
                                                        action="{{ route('feedback.show', ['feedback' => $feedback->id]) }}"
                                                        method="get">
                                                        @csrf
                                                        <button type="submit" class="btn btn-info" style="color:white;">
                                                            <i class="fa fa-eye pr-2">
                                                            </i>View</button>
                                                    </form>
                                                    <form
                                                        action="{{ route('feedback.destroy', ['feedback' => $feedback]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        {{-- <button type="submit" class="btn btn-danger"><i
                                                                class="fas fa-trash pr-2">
                                                            </i>Delete</button> --}}
                                                        <button type="button" class="btn btn-danger" data-toggle="modal"
                                                            data-target="#modal-default{{ $feedback->id }}">
                                                            <i class="fas fa-trash pr-2">
                                                            </i>Delete</button>
                                                        <div class="modal fade" id="modal-default{{ $feedback->id }}">
                                                            <div class="modal-dialog">
                                                                <div class="modal-content">
                                                                    <div class="modal-header">
                                                                        <h4 class="modal-title">Delete Confirmation</h4>
                                                                        <button type="button" class="close"
                                                                            data-dismiss="modal" aria-label="Close">
                                                                            <span aria-hidden="true">&times;</span>
                                                                        </button>
                                                                    </div>
                                                                    <div class="modal-body" style="text-align: left;">
                                                                        <p>Are you sure you want to delete it?</p>
                                                                    </div>
                                                                    <div class="modal-footer justify-content-between">
                                                                        <button type="button" class="btn btn-primary"
                                                                            data-dismiss="modal">Cancel</button>
                                                                        <button type="submit" class="btn btn-danger"
                                                                            id="confirmDeleteBtn">Confirm Delete
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                                <!-- /.modal-content -->
                                                            </div>
                                                            <!-- /.modal-dialog -->
                                                        </div>
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Find the "Confirm Delete" button by its id
            const confirmDeleteBtn = document.getElementById('confirmDeleteBtn');

            // Add a click event listener to the button
            confirmDeleteBtn.addEventListener('click', function() {
                // Trigger the form submission
                const form = confirmDeleteBtn.closest('form');
                form.submit();
            });
        });
    </script>
@endsection
