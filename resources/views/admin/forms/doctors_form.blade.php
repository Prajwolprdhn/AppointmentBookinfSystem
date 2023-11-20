@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        {{-- {{ $errors }} --}}
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
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title mt-2">Basic Info</h3>
                                <div class="col-sm-12 ">
                                    <button type="button" class="btn btn-light float-right"
                                        id="addInput1"style="color: black"> <i class="fa fa-plus-circle"></i> Add More
                                    </button>
                                    {{-- <button type="button" id="addInput">Add Input</button> --}}
                                </div>
                                <div class="col-sm-12">
                                    <button type="button" class="btn btn-light float-right" id="addInput2"> <i
                                            class="fa fa-plus-circle pr-1" style="color: black"></i> Add
                                        More</button>
                                    {{-- <button type="button" id="addInput">Add Input</button> --}}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{-- {{ $error }} --}}
                            <form id= "multistep-form" action="{{ route('add_doctors') }}" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="card-body">
                                    <div class="form-step" data-step="1">
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label" for="exampleInputStatus">Status</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-1" type="radio" name="status"
                                                    id="inlineRadio1" value="0" required>
                                                <label class="form-check-label" for="inlineRadio1">InActive</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-1" type="radio" name="status"
                                                    id="inlineRadio2" value="1" required>
                                                <label class="form-check-label" for="inlineRadio2">Active</label>
                                            </div>
                                            @error('status')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="lisence" class="col-sm-2 col-form-label">Lisence No.</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="lisence" name="lisence_no"
                                                    placeholder="Lisence No." required>
                                                @error('lisence_no')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <label for="department" class="col-sm-2 col-form-label">Department</label>
                                            <div class="col-sm-5">
                                                <select class="form-control select2" name="department_id"
                                                    style="width: auto;" required>
                                                    <option selected="selected">-- select one --</option>
                                                    @foreach ($departments as $department)
                                                        <option value="{{ $department->id }}">
                                                            {{ $department->departments }}
                                                        </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row ">
                                            <label for="fname" class="col-sm-2 col-form-label ">First Name</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="fname" name="first_name"
                                                    placeholder="First Name" required>
                                                @error('first_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="lname" name="last_name"
                                                    placeholder="Last Name" required>
                                                @error('last_name')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-sm-2 col-form-label" for="exampleInputEmail1">Sex</label>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-1" type="radio" name="gender"
                                                    id="inlineRadio1" value="Male" required>
                                                <label class="form-check-label" for="inlineRadio1">Male</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-1" type="radio" name="gender"
                                                    id="inlineRadio2" value="Female" required>
                                                <label class="form-check-label" for="inlineRadio2">Female</label>
                                            </div>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input mt-1" type="radio" name="gender"
                                                    id="inlineRadio3" value="Others" required>
                                                <label class="form-check-label" for="inlineRadio2">Others</label>
                                            </div>
                                            @error('gender')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <div class="form-group row">
                                            <label for="contact" class="col-sm-2 col-form-label">Contact No.</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="contact" name="contact"
                                                    placeholder="Contact Details" required>
                                                @error('contact')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                            <label for="birthday" class="col-sm-2 col-form-label">Date of Birth</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="nepali-datepicker"
                                                    name="nepali_date" placeholder="YYYY-MM-DD" required>
                                                @error('nepali_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row" hidden>
                                            <label for="birthday" class="col-sm-2 col-form-label">Date of Birth
                                                (AD)</label>
                                            <div class="col-sm-3">
                                                <input type="text" class="form-control" id="english_date"
                                                    onclick="getDate()" name="english_date" placeholder="YYYY-MM-DD">
                                                @error('english_date')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="role" class="col-sm-2 col-form-label">Role</label>
                                            <div class="col-sm-5">
                                                <select class="form-control select2" name="role" style="width: auto;"
                                                    disabled>
                                                    <option value="1" selected>Doctor</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="exampleInputFile">Upload Image</label>
                                            <img id="preview" src="#" alt="img" class="mt-3 pb-3"
                                                style="display:none; width:200px; height:200px;" />
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" name="image" class="custom-file-input"
                                                        id="selectImage">
                                                    <label class="custom-file-label" for="exampleInputFile">Choose
                                                        file</label>
                                                </div>
                                                <div class="input-group-append">
                                                    <span class="input-group-text">Upload</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-step" data-step="2">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row second-form">
                                                    <div class="col-sm-3 nopadding">
                                                        <div class="form-group">
                                                            <label for="institution">Institution</label>
                                                            <input type="text" class="form-control" id="institution"
                                                                name="education[institution][]"
                                                                placeholder="Institution Name" required />
                                                            @error('institution')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 nopadding">
                                                        <div class="form-group">
                                                            <label for="board">Board</label>
                                                            <input type="text" class="form-control" id="board"
                                                                name="education[board][]" value=""
                                                                placeholder="Board" required />
                                                            @error('board')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 nopadding">
                                                        <div class="form-group">
                                                            <label for="level">Level</label>
                                                            <div class="input-group">
                                                                <select class="form-control" id="level"
                                                                    name="education[level][]" required>

                                                                    <option value="">Level</option>
                                                                    <option value="S.E.E">S.E.E</option>
                                                                    <option value="+2">+2</option>
                                                                    <option value="Bachelors">Bachelors</option>
                                                                    <option value="Masters">Masters</option>
                                                                    <option value="PhD">PhD</option>
                                                                </select>
                                                                @error('level')
                                                                    <span class="text-danger">{{ $message }}</span>
                                                                @enderror
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-2 nopadding">
                                                        <div class="form-group">
                                                            <label for="completion_year">Completion Year</label>
                                                            <input type="text" class="form-control"
                                                                id="completion_year" name="education[completion_year][]"
                                                                value="" placeholder="Completion Year" required />
                                                            @error('completion_year')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-1 nopadding">
                                                        <div class="form-group">
                                                            <label for="score">Score</label>
                                                            <input type="text" class="form-control" id="score"
                                                                name="education[score][]" placeholder="Score" required />
                                                            @error('score')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <!-- Add Remove button next to input fields -->
                                                    <div class="col-sm-1 nopadding mt-2">
                                                        <div class="form-group">
                                                            <label for=""></label>
                                                            <button type="button"
                                                                class="btn btn-danger remove-button">Remove</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-step" data-step="3">
                                        <div class="panel panel-default">
                                            <div class="panel-body">
                                                <div class="row third-form">
                                                    <div class="form-group row">
                                                        <label for="Organization"
                                                            class="col-sm-2 col-form-label">Organization
                                                        </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="organization"
                                                                name="experience[organization][]"
                                                                placeholder="Organization Name">
                                                            @error('organization')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Position" class="col-sm-2 col-form-label">Position
                                                        </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="position"
                                                                name="experience[position][]" placeholder="Position">
                                                            @error('position')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row ">
                                                        <label for="start_date" class="col-sm-2 col-form-label ">Start
                                                            Date
                                                        </label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control"
                                                                id="nepali-datepicker" name="experience[start_date][]"
                                                                placeholder="YYYY-MM-DD" required>
                                                            @error('start_date')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <label for="end_date" class="col-sm-2 col-form-label">End Year
                                                        </label>
                                                        {{-- <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="end_date"
                                                                name="experience[end_date][]" placeholder="End Date">
                                                            @error('end_date')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div> --}}
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control"
                                                                id="nepali-datepicker" name="experience[end_date][]"
                                                                placeholder="YYYY-MM-DD" required>
                                                            @error('end_date_bs')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row" hidden>
                                                        <label for="start_date_ad" class="col-sm-2 col-form-label">Start
                                                            Date
                                                            (AD)</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="start_date_ad"
                                                                onclick="getDate()" name="start_date_ad"
                                                                placeholder="YYYY-MM-DD">
                                                            @error('start_date_ad')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <label for="end_date_ad" class="col-sm-2 col-form-label">End Date
                                                            (AD)</label>
                                                        <div class="col-sm-3">
                                                            <input type="text" class="form-control" id="end_date_ad"
                                                                onclick="getDate()" name="end_date_ad"
                                                                placeholder="YYYY-MM-DD">
                                                            @error('end_date_ad')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label for="Position" class="col-sm-2 col-form-label">Job
                                                            Description
                                                        </label>
                                                        <div class="col-sm-3">
                                                            <textarea class="form-control" id="job_description" name="experience[job_description][]" value=""
                                                                placeholder="Job Description" Description rows="3"></textarea>
                                                            @error('job_description')
                                                                <span class="text-danger">{{ $message }}</span>
                                                            @enderror
                                                        </div>
                                                        <div class="col-sm-9 nopadding text-right">
                                                            <div class="form-group">
                                                                <button type="button"
                                                                    class="btn btn-danger remove-button">Remove</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Add Remove button next to input fields -->

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-step" data-step="4">
                                        <div class="form-group row">
                                            <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                            <div class="col-sm-5">
                                                <input type="text" class="form-control" id="inputEmail"
                                                    name="email" placeholder="email">
                                                @error('email')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                            <div class="col-sm-5">
                                                <input type="password" class="form-control" id="inputPassword"
                                                    name="password" placeholder="Password" required>
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
                                                    name="password_confirmation" placeholder="Confirm Password" required>
                                                @error('password_confirmation')
                                                    <span class="text-danger">{{ $message }}</span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->

                                    {{-- <div class="card-footer">
                                        <button type="submit" class="btn btn-secondary float-right m-2"
                                            style="color: white">Create Doctor</button>
                                    </div> --}}
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-success float-right m-2"
                                            style="color: white" id="submit-form">Submit</button>
                                        <button type="button" class="btn btn-info float-right m-2"
                                            id="next-step">Next</button>
                                        <button type="button" class="btn btn-secondary float-right m-2"
                                            id="prev-step">Previous</button>


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
