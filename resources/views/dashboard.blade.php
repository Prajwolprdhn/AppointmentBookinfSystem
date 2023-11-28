@extends('layouts.app')

@section('content')
    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Welcome Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Welcome Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->

        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- ./col -->
                    @if (auth()->check() && auth()->user()->role == 0)
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-warning">
                                <div class="inner">
                                    <h3>{{ $user->count() }}</h3>

                                    <p>Total Overall Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-solid fa-users"></i>
                                </div>
                                <a href="{{ route('users_table') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                    @if (auth()->check() && auth()->user()->role == 0)
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $user->where('role', 1)->count() }}</h3>

                                    <p>Total Doctors</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-user-md"></i>
                                </div>
                                <a href="{{ route('doctors_table') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @else
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-info">
                                <div class="inner">
                                    <h3>{{ $booking->count() }}</h3>

                                    <p>Total Appointments</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-users"></i>
                                </div>
                                <a href="{{ route('appointment.show', ['appointment' => auth()->user()->doctor->id]) }}"
                                    class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                    <!-- ./col -->
                    @if (auth()->check() && auth()->user()->role == 0)
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-success">
                                <div class="inner">
                                    <h3>{{ $department->count() }}<sup style="font-size: 20px"></sup></h3>

                                    <p>Departments</p>
                                </div>
                                <div class="icon">
                                    <i class="fa fa-building"></i>
                                </div>
                                <a href="{{ route('department_table') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif
                    <!-- ./col -->
                    @if (auth()->check() && auth()->user()->role == 0)
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-danger">
                                <div class="inner">
                                    <h3>{{ $user->where('status', 0)->count() }}</h3>

                                    <p>Inactive Users</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <a href="{{ route('users_table') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif

                    @if (auth()->check() && auth()->user()->role == 0)
                        <div class="col-lg-3 col-6">
                            <!-- small card -->
                            <div class="small-box bg-secondary">
                                <div class="inner">
                                    <h3>{{ $trashedCount }}
                                    </h3>

                                    <p>Trash</p>
                                </div>
                                <div class="icon">
                                    <i class="fas fa-chart-pie"></i>
                                </div>
                                <a href="{{ route('users_table') }}" class="small-box-footer">
                                    More info <i class="fas fa-arrow-circle-right"></i>
                                </a>
                            </div>
                        </div>
                    @endif

                </div>
                <!-- /.row -->
                <div class="row">

                </div>
                <!-- /.row -->
                @if (auth()->check() && auth()->user()->role == 0)
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h3 class="card-title mt-2">Doctors List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 338px">
                                    <table class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Full Name</th>
                                                <th>Department</th>
                                                <th>Contact</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($doctors as $doctor)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $doctor->first_name . ' ' . $doctor->last_name }}</td>
                                                    <td>
                                                        @if ($doctor->department)
                                                            {{ $doctor->department->departments }}
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>{{ $doctor->contact }}</td>
                                                    <td>
                                                        @if ($doctor->user->status == 1)
                                                            Active
                                                        @else
                                                            Inactive
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="departmentPieChart" style="height: 200px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                @if (auth()->check() && auth()->user()->role == 1)
                    <div class="row">
                        <div class="col-8">
                            <div class="card">
                                <div class="card-header bg-secondary">
                                    <h3 class="card-title mt-2">Appointments List</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0" style="height: 338px;">
                                    <table id="customTable" class="table table-hover text-nowrap">
                                        <thead>
                                            <tr>
                                                <th>S.N.</th>
                                                <th>Full Name</th>
                                                <th>Contact</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($booking as $bookings)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $bookings->patient->name }}</td>
                                                    <td>{{ $bookings->patient->contact }}</td>
                                                    <td>{{ $bookings->patient->email }}</td>
                                                    <td>
                                                        @if ($bookings->status == 0)
                                                            <span style="color: rgb(0, 176, 230)">Pending<i
                                                                    class="fa fa-check pl-3" aria-hidden="true"></i></span>
                                                        @elseif($bookings->status == 1)
                                                            <span style="color: green;">Approved<i class="fa fa-check pl-3"
                                                                    aria-hidden="true"></i></span>
                                                        @else
                                                            <span style="color: red;">Declined<i class="fa fa-times pl-4"
                                                                    aria-hidden="true"></i></span>
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{-- {{ $booking->links() }} --}}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-body">
                                    <canvas id="departmentPieChart" style="height: 200px;"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
                <!-- /.row -->
            </div>
        </div>
        <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <script>
        // fetch department data from controller
        var departmentsData = {!! json_encode($departmentChartData) !!};

        var ctx = document.getElementById('departmentPieChart').getContext('2d');

        // Create the pie chart
        var myPieChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: departmentsData.labels,
                datasets: [{
                    data: departmentsData.values,
                    backgroundColor: [
                        '#FF6384',
                        '#36A2EB',
                        '#FFCE56',
                        '#FFUD51',
                        '#BBCE56'
                        // Add more colors as needed
                    ],
                }],
            },
        });
    </script>
@endsection
