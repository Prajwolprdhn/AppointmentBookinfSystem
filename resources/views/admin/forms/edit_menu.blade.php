@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Update Menu</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Menu Management</li>
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
                                <h3 class="card-title mt-2">Menu Info</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('menu.update', ['menu' => $menu->id]) }}" method="post">
                                @csrf
                                @method('put')
                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="menu_status" class="col-sm-2 col-form-label">Status</label>
                                        <div class="col-sm-5">
                                            <input type="hidden" name="menu_status" value="0">
                                            <input type="checkbox" class="form-check-input" id="menu_status"
                                                name="menu_status" value="1"
                                                {{ $menu->menu_status == 1 ? 'checked' : '' }}>
                                        </div>
                                    </div>
                                    <div class="form-group row ">
                                        <label for="menu_name" class="col-sm-2 col-form-label ">Menu Name</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="menu_name" name="menu_name"
                                                value="{{ $menu->menu_name }}">
                                            @error('menu_name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="menu_route" class="col-sm-2 col-form-label">Menu Route</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="menu_route" name="menu_route"
                                                value="{{ $menu->menu_route }}">
                                            @error('menu_route')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-body -->

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-secondary float-right m-2"
                                        style="color: white">Update Profile</button>
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
@endsection
