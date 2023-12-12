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
    <!-- summernote -->
    <link rel="stylesheet" href="../../plugins/summernote/summernote-bs4.min.css">
    <script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <style>
        .project-actions form {
            display: inline;
            /* Display the forms as inline elements */
            margin-right: 10px;
            /* Add some spacing between buttons */
        }

        .modal-header {
            background: rgb(72, 191, 196);
            color: #fff;
        }

        .required:after {
            content: "*";
            color: red;
        }

        .schedule-item {
            display: inline-block;
            margin-bottom: 10px;
        }

        .delete-form {
            display: inline;
        }

        .custom-dropdown-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .custom-dropdown-item i {
            margin-left: 10px;
            /* Adjust as needed */
        }

        .accept-item {
            color: green;
            /* or any color you prefer for 'Accept' */
        }

        .reject-item {
            color: red;
            /* or any color you prefer for 'Reject' */
        }


        .notification-content {
            max-width: 1000px;
            /* Adjust the max-width as needed */
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
        }

        .notification-details {
            max-width: 800px;
            /* Adjust the max-width as needed */
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: normal;
        }

        /* Change the background color of the active tab */
        .nav-pills .nav-item.show .nav-link,
        .nav-pills .nav-link.active {
            background-color: grey;
            color: white !important;
            /* Change this to your desired text color */
        }
    </style>
</head>

<body class="hold-transition sidebar-mini">
    <div class="wrapper">

        @include('layouts.header')

        @include('layouts.sidebar')

        @include('sweetalert::alert')

        @yield('content')

        {{-- @include('layouts.footer') --}}

    </div>
</body>

</html>

<!-- REQUIRED SCRIPTS -->
<script src="{{ asset('js/nepalidatepicker.js') }}"></script>

<!-- jQuery -->
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('dist/js/adminlte.min.js') }}"></script>

<!-- Summernote -->
<script src="../../plugins/summernote/summernote-bs4.min.js"></script>

<script src="{{ asset('js/formchange.js') }}"></script>
<script src="{{ asset('js/field_add.js') }}"></script>
<script src="{{ asset('js/time_add.js') }}"></script>
<script src="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/js/nepali.datepicker.v4.0.1.min.js"
    type="text/javascript"></script>
<script type="text/javascript">
    window.onload = function() {
        var mainInput = document.getElementById("nepali-datepicker");
        mainInput.nepaliDatePicker();
    };
</script>
<script>
    $(document).ready(function() {
        // Initialize Nepali Date Picker for Modal
        $("#modal-nepali-date-picker").nepaliDatePicker({
            container: "#myModal",
            language: "english",
            disableDaysAfter: 7,
            disableDaysBefore: 0,
        });

    });

    $(document).ready(function() {
        $('#title_en').on('input', function() {
            // Get the value of the title input
            var title = $(this).val().toLowerCase();

            // Replace spaces with hyphens and update the slug input
            $('#slug').val(title.replace(/\s+/g, '-'));
        });
    });
</script>

<script src="{{ asset('js/imagepreview.js') }}"></script>

{{-- <script src="{{ asset('js/nepali.datepicker.v4.0.1.min.js') }}"></script> --}}
