<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Appointment Booking System</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="{{ asset('img/favicon.ico') }}" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;600&family=Ubuntu:wght@500;700&display=swap"
        rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">

    <!-- Nepali Datepicker -->
    <link href="http://nepalidatepicker.sajanmaharjan.com.np/nepali.datepicker/css/nepali.datepicker.v4.0.1.min.css"
        rel="stylesheet" type="text/css" />

    <style>
        .content-wrapper {
            margin-top: 50px;
            /* Adjust the value based on the height of your navbar */
        }
    </style>
</head>

<body>
    <div class="wrapper">
        @include('users.layouts.header')

        @include('sweetalert::alert')

        @yield('content')

        @include('users.layouts.footer')
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
            ndpYear: true,
            ndpMonth: true,
            ndpYearCount: 200, // Show 100 years
            language: "english",
            disableDaysAfter: 0 // Disable days before 100 years ahead from today
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

        var today_bs = NepaliFunctions.GetCurrentBsDate('YYYY-MM-DD')
        var now_bs = document.getElementById("current_bs");
        now_bs.value = today_bs;

        var today_ad = NepaliFunctions.GetCurrentAdDate('YYYY-MM-DD')
        var now_ad = document.getElementById("current_ad");
        now_ad.value = today_ad;

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

<script>
    document.addEventListener('DOMContentLoaded', function() {
        @if (session('showModal'))
            $('#myModal').modal('show');
        @endif
    });
</script>

<script src="{{ asset('js/imagepreview.js') }}"></script>
