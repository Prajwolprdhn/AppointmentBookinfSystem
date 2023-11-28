@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        {{-- {{ $errors }} --}}
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Appointments Management</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Appointments Management</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-light">
                            <div class="card-header ">
                                <h3 class="card-title mt-2">Appointment List</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th class="text-center">S.N.</th>
                                            <th class="text-center">Date</th>
                                            <th class="text-center">Day</th>
                                            <th class="text-center">Booked Time</th>
                                            <th class="text-center">Status</th>
                                        </tr>
                                    </thead>
                                    {{-- @if ($appointment)
                                        <tbody>

                                            @php
                                                $groupedAppointment = $appointment->groupBy('date_bs');
                                            @endphp

                                            @foreach ($groupedAppointment as $date => $bookings)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bookings->first()->schedule->date_bs }}</td>
                                                    <td>{{ $bookings->first()->schedule->day }}</td>
                                                    <td>
                                                        @foreach ($bookings as $booking)
                                                            {{ $booking->schedule->start_time . ' - ' . $booking->schedule->end_time }}
                                                            @if (!$loop->last)
                                                                <br>
                                                            @endif
                                                        @endforeach
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    @else
                                        <tbody></tbody>
                                    @endif --}}
                                    @if ($appointment)
                                        <tbody>
                                            @foreach ($appointment as $doctor)
                                                <tr>
                                                    <td class="text-center">{{ $loop->iteration }}</td>
                                                    <td class="text-center">{{ $doctor->schedule->date_bs }}</td>
                                                    <td class="text-center">{{ $doctor->schedule->day }}</td>
                                                    <td class="text-center">
                                                        {{ $doctor->schedule->start_time . ' - ' . $doctor->schedule->end_time }}
                                                    </td>
                                                    <td class="text-center">
                                                        @if ($doctor->status == 0)
                                                            <div class="btn-group">
                                                                <button type="button"
                                                                    class="btn btn-warning dropdown-toggle"
                                                                    data-toggle="dropdown" aria-haspopup="true"
                                                                    aria-expanded="false"
                                                                    style="color: white; padding-left:15px; padding-right:15px;">
                                                                    Pending
                                                                </button>
                                                                <div class="dropdown-menu">
                                                                    <a class="dropdown-item custom-dropdown-item accept-item"
                                                                        href="{{ route('appointment.edit', ['appointment' => $doctor->id, 'status' => '1']) }}">Approve<i
                                                                            class="fa fa-check" aria-hidden="true"></i></a>
                                                                    <a class="dropdown-item custom-dropdown-item reject-item"
                                                                        href="{{ route('appointment.edit', ['appointment' => $doctor->id, 'status' => '2']) }}">Decline<i
                                                                            class="fa fa-times" aria-hidden="true"></i></a>
                                                                </div>
                                                            </div>
                                                        @elseif($doctor->status == 1)
                                                            <span style="color: green;">Approved<i class="fa fa-check pl-3"
                                                                    aria-hidden="true"></i></span>
                                                        @else
                                                            <span style="color: red;">Declined<i class="fa fa-times pl-4"
                                                                    aria-hidden="true"></i></span>
                                                        @endif

                                                    </td>
                                                    <td class="project-actions text-right">
                                                        <form action="{{ route('booking.destroy', $doctor->id) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger"
                                                                data-toggle="modal" data-target="#modal-default">
                                                                <i class="fas fa-trash pr-2">
                                                                </i>Delete</button>
                                                            <div class="modal fade" id="modal-default">
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
                                    @else
                                        <tbody></tbody>
                                    @endif
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous">
    </script>
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
