@extends('layouts.app')

@section('content')
    {{-- @dd($doctors) --}}
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Patients List</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="text-decoration: none">Home</a>
                            </li>
                            <li class="breadcrumb-item active">Patients List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        {{-- @include('layouts.popup') --}}
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card card-info">
                            <div class="card-header ">
                                <h3 class="card-title mt-2">List of Patients</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive p-0">
                                <table class="table table-head-fixed text-nowrap">
                                    <thead>
                                        <tr>
                                            <th>S.N.</th>
                                            <th>Name</th>
                                            <th>Contact</th>
                                            <th>Email</th>
                                            <th>Registered Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if ($patients->isNotEmpty())
                                            @foreach ($patients as $patient)
                                                <tr>
                                                    @if (auth()->user()->role == 1)
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $patient->patient->name }}</td>
                                                        <td>{{ $patient->patient->contact }}</td>
                                                        <td>{{ $patient->patient->email }}</td>
                                                        <td>{{ $patient->first()->book_date_bs ?? '-' }}</td>
                                                    @elseif(auth()->user()->role == 0)
                                                        <td>{{ $loop->iteration }}</td>
                                                        <td>{{ $patient->name }}</td>
                                                        <td>{{ $patient->contact }}</td>
                                                        <td>{{ $patient->email }}</td>
                                                        <td>{{ $patient->booking->first()->book_date_bs ?? '-' }}</td>
                                                    @endif
                                                </tr>
                                            @endforeach
                                        @else
                                            <tr>
                                                <td colspan="5" class="text-center bg-light">No Data Available</td>
                                            </tr>
                                        @endif

                                    </tbody>
                                </table>
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <!-- /.row -->
            </div>
        </div>
    </div>
@endsection
