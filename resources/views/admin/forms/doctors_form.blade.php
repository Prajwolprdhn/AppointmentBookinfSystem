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
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{-- {{ $error }} --}}
                            <form action="{{ route('add_doctors') }}" method="post">
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
                                    <div class="form-group row">
                                        <label for="lisence" class="col-sm-2 col-form-label">Lisence No.</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="lisence" name="lisence_no"
                                                placeholder="Lisence No.">
                                            @error('lisence_no')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="department" class="col-sm-2 col-form-label">Department</label>
                                        <div class="col-sm-5">
                                            <select class="form-control select2" name="department_id" style="width: auto;">
                                                <option selected="selected">-- select one --</option>
                                                @foreach ($departments as $department)
                                                    <option value="{{ $department->id }}">{{ $department->departments }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="fname" class="col-sm-2 col-form-label ">First Name</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="fname" name="first_name"
                                                placeholder="First Name">
                                            @error('first_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="lname" class="col-sm-2 col-form-label">Last Name</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="lname" name="last_name"
                                                placeholder="Last Name">
                                            @error('last_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-sm-2 col-form-label" for="exampleInputEmail1">Sex</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="gender"
                                                id="inlineRadio1" value="Male">
                                            <label class="form-check-label" for="inlineRadio1">Male</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="gender"
                                                id="inlineRadio2" value="Female">
                                            <label class="form-check-label" for="inlineRadio2">Female</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="gender"
                                                id="inlineRadio3" value="Others">
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
                                                placeholder="Contact Details">
                                            @error('contact')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="birthday" class="col-sm-2 col-form-label">Date of Birth</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="nepali-datepicker"
                                                name="nepali_date" placeholder="YYYY-MM-DD">
                                            @error('nepali_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row" hidden>
                                        <label for="birthday" class="col-sm-2 col-form-label">Date of Birth (AD)</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="english_date"
                                                onclick="getDate()" name="english_date" placeholder="YYYY-MM-DD">
                                            @error('english_date')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="inputEmail" name="email"
                                                placeholder="email">
                                            @error('email')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
                                        <div class="col-sm-5">
                                            <input type="password" class="form-control" id="inputPassword"
                                                name="password" placeholder="Password">
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
                                        <div class="col-sm-5">
                                            <select class="form-control select2" name="role" style="width: auto;"
                                                disabled>
                                                <option value="1" selected>Doctor</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="exampleInputFile">Upload Image</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="exampleInputFile">
                                                <label class="custom-file-label" for="exampleInputFile">Choose
                                                    file</label>
                                            </div>
                                            <div class="input-group-append">
                                                <span class="input-group-text">Upload</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-secondary float-right m-2"
                                        style="color: white">Create Doctor</button>
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
    <script type="text/javascript">
        window.onload = function() {
            year = NepaliFunctions.GetCurrentBsYear();
            month = NepaliFunctions.GetCurrentBsMonth();
            day = NepaliFunctions.GetCurrentBsDay();
            var currentdate = year + "-" + month + "-" + day
            console.log(currentdate)
            var mainInput = document.getElementById("nepali-datepicker");
            mainInput.nepaliDatePicker({
                disableBefore: currentdate,
                disableDaysAfter: 3
            });


        };
    </script>
    <script>
        setInterval(() => {
            getDate()
        }, 10);

        function getDate() {
            var nepali = document.getElementById("nepali-datepicker").value;
            converted = NepaliFunctions.BS2AD(nepali)

            var english = document.getElementById("english_date");
            english.value = converted;
        }
    </script>
@endsection
