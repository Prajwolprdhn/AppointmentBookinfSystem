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

<script>
    $(document).ready(function() {
        // Initialize Nepali Date Picker for Modal
        $("#modal-nepali-date-picker").nepaliDatePicker({
            container: "#myModal",
        });

        // Initialize schedule date pickers
        var calendar = document.querySelectorAll("#modal-nepali-date-picker");
        calendar.forEach(function(element) {
            element.nepaliDatePicker({
                language: "english",
                disableDaysAfter: 7,
                disableDaysBefore: 0,
            });
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
<script src="{{ asset('js/imagepreview.js') }}"></script>

{{-- <script src="{{ asset('js/nepali.datepicker.v4.0.1.min.js') }}"></script> --}}
