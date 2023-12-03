<h2>
    Your appointment scedule has been @if ($appointment_status == 1)
        Approved.
    @elseif($appointment_status == 2)
        Denied.
    @endif
</h2>

<h3>Appointment date: {{ $date_bs }} </h3>
<h3>Appointment time: {{ $start_time . ' - ' . $end_time }}</h3>
