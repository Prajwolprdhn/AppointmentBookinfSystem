@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        {{-- {{ $errors }} --}}
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Doctors Schedules</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Doctors Schedules</li>
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
                                <h3 class="card-title mt-2">Schedule List</h3>
                                <button type="button" class="btn btn-info float-right" data-bs-toggle="modal"
                                    data-bs-target="#myModal" style="color: white">
                                    <i class="fa fa-plus-circle mr-2"></i> New Schedule
                                </button>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Date</th>
                                            <th>Day</th>
                                            <th>Appointment Time</th>
                                        </tr>
                                    </thead>

                                    @if ($schedules)
                                        <tbody>
                                            @php
                                                $groupedSchedules = $schedules->groupBy('date_bs');
                                            @endphp

                                            @foreach ($groupedSchedules as $date => $doctors)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $date }}</td>
                                                    <td>{{ $doctors->first()->day }}</td>
                                                    <td>
                                                        @foreach ($doctors as $doctor)
                                                            <div class="schedule-item row d-flex">
                                                                <div class="col-3">
                                                                    {{ $doctor->start_time . ' - ' . $doctor->end_time }}
                                                                </div>

                                                                <div class="col-3">
                                                                    <form
                                                                        action="{{ route('schedule.destroy', $doctor->id) }}"
                                                                        method="post" class="delete-form">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="id"
                                                                            value="{{ $doctor->id }}">
                                                                        <button type="button" class="btn btn-danger ml-2"
                                                                            data-toggle="modal"
                                                                            data-target="#modal-default-{{ $doctor->id }}">
                                                                            <i class="fas fa-trash"></i>
                                                                        </button>
                                                                        <div class="modal fade"
                                                                            id="modal-default-{{ $doctor->id }}">
                                                                            <div class="modal-dialog">
                                                                                <div class="modal-content">
                                                                                    <div class="modal-header">
                                                                                        <h4 class="modal-title">Delete
                                                                                            Confirmation
                                                                                        </h4>
                                                                                        <button type="button"
                                                                                            class="close"
                                                                                            data-dismiss="modal"
                                                                                            aria-label="Close">
                                                                                            <span
                                                                                                aria-hidden="true">&times;</span>
                                                                                        </button>
                                                                                    </div>
                                                                                    <div class="modal-body"
                                                                                        style="text-align: left;">
                                                                                        <p>Are you sure you want to delete
                                                                                            it?
                                                                                        </p>
                                                                                    </div>
                                                                                    <div
                                                                                        class="modal-footer justify-content-between">
                                                                                        <button type="button"
                                                                                            class="btn btn-primary"
                                                                                            data-dismiss="modal">Cancel</button>
                                                                                        <button type="submit"
                                                                                            class="btn btn-danger"
                                                                                            id="confirmDeleteBtn">Confirm
                                                                                            Delete
                                                                                        </button>
                                                                                    </div>
                                                                                </div>
                                                                                <!-- /.modal-content -->
                                                                            </div>
                                                                            <!-- /.modal-dialog -->
                                                                        </div>
                                                                    </form>
                                                                </div>

                                                            </div>
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

    <!-- Popup Form -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('schedule.store') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title">New Schedule</h5>
                        <div class="ms-auto">
                            <button type="button" class="btn btn-light mr-2" id="addTime" style="color: black">
                                <i class="fa fa-plus-circle"></i> Add Time
                            </button>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label required">Date</label>
                            <input type="text" class="form-control" id="modal-nepali-date-picker" name="date_bs"
                                placeholder="YYYY-MM-DD" required>
                            @error('nepali_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3" hidden>
                            <label class="form-label required">Date in A.D</label>
                            <input type="text" class="form-control" id="english_date" onclick="getDate()" name="date_ad"
                                placeholder="YYYY-MM-DD">
                            @error('english_date')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="mb-3" hidden>
                            <label class="form-label required">Doctors ID</label>
                            <input type="text" class="form-control" id="doctors_id"name="doctors_id"
                                value="{{ $doctors_id }}">
                        </div>
                        <div class="col-sm-12 ">

                            {{-- <button type="button" id="addInput">Add Input</button> --}}
                        </div>
                        <div class="mb-3 time-form">
                            <div class="row ">
                                <div class="col-md-6">
                                    <label class="form-label required">Available From</label>
                                    <select class="form-control select2" name="schedule[start_time][]" id="start_time"
                                        style="width: auto;" required>
                                        <option selected="selected">-- Start Time --</option>
                                        @foreach ($timings as $timing)
                                            <option value="{{ $timing->timings }}">
                                                {{ $timing->timings }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label required">Available To</label>
                                    <select class="form-control select2" name="schedule[end_time][]" id="end_time"
                                        style="width: auto;" required>
                                        <option selected="selected">-- End Time --</option>
                                        @foreach ($timings as $timing)
                                            <option value="{{ $timing->timings }}">
                                                {{ $timing->timings }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-danger" data-bs-dismiss="modal">Cancel</button>

                        <button type="submit" class="btn btn-info" style="color: white">Submit</button>

                    </div>
                </form>
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
