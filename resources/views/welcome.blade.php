<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Appointment Booking System</title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Nepali Datepicker -->
    <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css"
        rel="stylesheet" type="text/css" />

    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>

    <style>
        .project-actions form {
            display: inline;
            /* Display the forms as inline elements */
            margin-right: 10px;
            /* Add some spacing between buttons */
        }

        .modal-header {
            color: #fff;
        }

        .required:after {
            content: "*";
            color: red;
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">
        {{-- {{ $errors }} --}}
        <!-- Content Header (Page header) -->
        <div class="content-header mt-2">
            <div class="container-fluid pb-1">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Doctors Appiontments</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('login') }}" class="btn btn-secondary"
                                    style="color:white;">
                                    LOGIN</a></li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->

            </div><!-- /.container-fluid -->
            <hr class="hr" />
        </div>
        <!-- /.content-header -->
        <div class="content ml-2">
            <div class="container-fluid">
                <div class="row">
                    @foreach ($doctors as $doctor)
                        <div class="col-lg-3">
                            <div class="card mb-3 pb-3">
                                <div class="card-body text-center">
                                    <img src="{{ asset($doctor->photo) }}" alt="avatar"
                                        class="rounded-circle img-fluid" style="width: 150px; height:150px;">
                                    <h5 class="my-3">{{ $doctor->first_name . ' ' . $doctor->last_name }}</h5>
                                    <p class="text-muted mb-2">{{ $doctor->department->departments }}</p>
                                    <p class="text-muted mb-1">Bay Area, San Francisco, CA</p>
                                </div>
                            </div>

                        </div>
                        <div class="col-lg-9">
                            <div class="card mb-4">
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-sm-3">
                                            <p class="mb-0">Available Time</p>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        @foreach ($doctor->schedule as $schedule)
                                            @if ($doctor->schedule)
                                                @php
                                                    $groupedSchedules = $doctor->schedule->groupBy('date_bs');

                                                @endphp
                                                @foreach ($groupedSchedules as $day => $doctors)
                                                    <div class="col-sm-3">
                                                        <p class="mb-0">{{ $day }}</p>
                                                    </div>
                                                    <div class="col-sm-9">
                                                        @foreach ($doctors as $doctor)
                                                            <button type="button" class="btn btn-info mb-3 mr-3"
                                                                data-bs-toggle="modal" data-bs-target="#myModal"
                                                                data-doctor-id="{{ $doctor->id }}"
                                                                style="color:white;">
                                                                {{ $doctor->start_time . ' - ' . $doctor->end_time }}
                                                            </button>
                                                            <!-- Popup Form -->
                                                            <div class="modal" id="myModal">
                                                                <div class="modal-dialog">
                                                                    <div class="modal-content">
                                                                        <form action="{{ route('booking.store') }}"
                                                                            method="post">
                                                                            @csrf
                                                                            <div class="modal-header bg-info">
                                                                                <h5 class="modal-title">Personal Details
                                                                                </h5>
                                                                                <div class="ms-auto">
                                                                                    <button type="button"
                                                                                        class="btn-close"
                                                                                        data-bs-dismiss="modal"></button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label required">Full
                                                                                        Name</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="name" name="name"
                                                                                        placeholder="Full Name">
                                                                                    @error('name')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label required">Address</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="address" name="address"
                                                                                        placeholder="Address">
                                                                                    @error('address')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label required">Contact
                                                                                        No.</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="contact" name="contact"
                                                                                        placeholder="Contact Details">
                                                                                    @error('contact')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label required">Gender</label>
                                                                                    <select
                                                                                        class ="form-control select2"
                                                                                        name="gender">
                                                                                        <option disabled="disabled"
                                                                                            selected="selected">-- Not
                                                                                            Selected --
                                                                                        </option>
                                                                                        <option value="Male">Male
                                                                                        </option>
                                                                                        <option value="Female">Female
                                                                                        </option>
                                                                                        <option value="Other">Other
                                                                                        </option>
                                                                                    </select>
                                                                                    @error('contact')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label required">Email</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="email" name="email"
                                                                                        placeholder="Email ID">
                                                                                    @error('email')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3">
                                                                                    <label
                                                                                        class="form-label required">Date
                                                                                        Of Birth</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="modal-nepali-date-picker"
                                                                                        name="dob_bs"
                                                                                        placeholder="YYYY-MM-DD"
                                                                                        required>
                                                                                    @error('dob_bs')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3" hidden>
                                                                                    <label
                                                                                        class="form-label required">Date
                                                                                        in A.D</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="english_date"
                                                                                        onclick="getDate()"
                                                                                        name="dob_ad"
                                                                                        placeholder="YYYY-MM-DD">
                                                                                    @error('dob_ad')
                                                                                        <span
                                                                                            class="text-danger">{{ $message }}</span>
                                                                                    @enderror
                                                                                </div>
                                                                                <div class="mb-3" hidden>
                                                                                    <label
                                                                                        class="form-label required">Doctors
                                                                                        ID</label>
                                                                                    <input type="text"
                                                                                        class="form-control"
                                                                                        id="doctors_id"
                                                                                        name="doctors_id">
                                                                                </div>
                                                                            </div>
                                                                            <div class="modal-footer">
                                                                                <button type="submit"
                                                                                    class="btn btn-danger"
                                                                                    data-bs-dismiss="modal">Cancel</button>

                                                                                <button type="submit"
                                                                                    class="btn btn-success"
                                                                                    style="color: white">Submit</button>

                                                                            </div>
                                                                        </form>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                @endforeach
                                            @endif
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</body>

</html>

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<script src="{{ asset('js/nepalidatepicker.js') }}"></script>
<script src="{{ asset('js/formchange.js') }}"></script>
<script src="{{ asset('js/field_add.js') }}"></script>
<script src="{{ asset('js/time_add.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
</script>
<script>
    $(document).ready(function() {
        // Initialize Nepali Date Picker for Modal
        $("#modal-nepali-date-picker").nepaliDatePicker({
            container: "#myModal",
        });
    });

    function getDate() {
        var nepali = document.getElementById("modal-nepali-date-picker").value;
        converted = NepaliFunctions.BS2AD(nepali);

        var english = document.getElementById("english_date");
        english.value = converted;
    }
</script>
<script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
    type="text/javascript"></script>
<script type="text/javascript">
    window.onload = function() {
        var mainInput = document.getElementById("nepali-datepicker");
        mainInput.nepaliDatePicker();
    };
</script>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Add a click event listener to the button
        confirmDeleteBtn.addEventListener('click', function() {
            // Trigger the form submission
            const form = confirmDeleteBtn.closest('form');
            form.submit();
        });
    });
</script>
<script>
    $('#myModal').on('show.bs.modal', function(event) {
        var button = $(event.relatedTarget);
        var doctorId = button.data('doctor-id');
        $(this).find('#doctors_id').val(doctorId);
    });
</script>

<script src="{{ asset('js/imagepreview.js') }}"></script>

{{-- <script src="{{ asset('js/nepali.datepicker.v4.0.1.min.js') }}"></script> --}}
