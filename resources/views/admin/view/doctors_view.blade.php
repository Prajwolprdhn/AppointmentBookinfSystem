@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        {{-- {{ $errors }} --}}
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Doctors Details</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Doctors Details</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="card mb-4 pb-4">
                            <div class="card-body text-center">
                                <img src="{{ asset($doctor->photo) }}" alt="avatar" class="rounded-circle img-fluid"
                                    style="width: 150px;">
                                <h5 class="my-3">{{ $doctor->first_name . ' ' . $doctor->last_name }}</h5>
                                <p class="text-muted mb-2">{{ $doctor->department->departments }}</p>
                                <p class="text-muted mb-2">Bay Area, San Francisco, CA</p>
                                {{-- <div class="d-flex justify-content-center mb-2">
                                    <button type="button" class="btn btn-primary">Follow</button>
                                    <button type="button" class="btn btn-outline-primary ms-1">Message</button>
                                </div> --}}
                            </div>
                        </div>
                        {{-- <div class="card mb-4 mb-lg-0">
                            <div class="card-body p-0">
                                <ul class="list-group list-group-flush rounded-3">
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fas fa-globe fa-lg text-warning"></i>
                                        <p class="mb-0">https://mdbootstrap.com</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-github fa-lg" style="color: #333333;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-twitter fa-lg" style="color: #55acee;"></i>
                                        <p class="mb-0">@mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-instagram fa-lg" style="color: #ac2bac;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                    <li class="list-group-item d-flex justify-content-between align-items-center p-3">
                                        <i class="fab fa-facebook-f fa-lg" style="color: #3b5998;"></i>
                                        <p class="mb-0">mdbootstrap</p>
                                    </li>
                                </ul>
                            </div>
                        </div> --}}
                    </div>
                    <div class="col-lg-9">
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Full Name</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $doctor->first_name . ' ' . $doctor->last_name }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Email</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $doctor->user->email }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Phone</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $doctor->contact }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Gender</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">{{ $doctor->gender }}</p>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <p class="mb-0">Date of Birth</p>
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="text-muted mb-0">
                                            {{ $doctor->english_date . ' A.D  / ' . $doctor->nepali_date . ' B.S' }}</p>
                                    </div>
                                </div>
                            </div>

                        </div>



                    </div>
                </div>
                <div class="row m-1">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row mb-3">
                                <h4>Education</h4>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Level</th>
                                            <th scope="col">Institution</th>
                                            <th scope="col">Completion Year</th>
                                            <th scope="col">Board</th>
                                            <th scope="col">Score</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctor->education as $educations)
                                            <tr>
                                                <td>{{ $educations->level }}</td>
                                                <td>{{ $educations->institution }}</td>
                                                <td>{{ $educations->completion_year }}</td>
                                                <td>{{ $educations->board }}</td>
                                                <td>{{ $educations->score }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row m-1">
                    <div class="card mb-4">
                        <div class="card-body">
                            <div class="row mb-3">
                                <h4>Experience</h4>
                            </div>
                            <div class="row">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th scope="col">Organization</th>
                                            <th scope="col">Position</th>
                                            <th scope="col">Start Year</th>
                                            <th scope="col">End Year</th>
                                            <th scope="col">Job Description</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($doctor->experiences as $experience)
                                            <tr>
                                                <td>{{ $experience->organization }}</td>
                                                <td>{{ $experience->position }}</td>
                                                <td>{{ $experience->start_date }}</td>
                                                <td>{{ $experience->end_date }}</td>
                                                <td>{{ $experience->job_description }}</td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
