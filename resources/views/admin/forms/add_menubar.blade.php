@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Menubar</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Menubar Form</li>
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
                                <h3 class="card-title mt-2">Menubar Info</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('menubar.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="form-group">
                                        <label class="col-sm-2 col-form-label" for="exampleInputStatus">Status</label>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="status"
                                                id="inlineRadio1" value="0">
                                            <label class="form-check-label" for="inlineRadio1">InActive</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input mt-1" type="radio" name="status"
                                                id="inlineRadio2" value="1">
                                            <label class="form-check-label" for="inlineRadio2">Active</label>
                                        </div>
                                        @error('menu_status')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                    <div class="form-group row ">
                                        <label for="name" class="col-sm-2 col-form-label ">Menu Name</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Menu Name">
                                            @error('name')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                        <label for="type" class="col-sm-2 col-form-label">Display Order</label>
                                        <div class="col-sm-2">
                                            <input type="text" class="form-control" id="display_order"
                                                name="display_order" placeholder="Display Order">
                                            @error('display_order')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label for="type" class="col-sm-2 col-form-label">Menu Type</label>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <select class="form-control select2" name="type" style="width: auto;">
                                                    <option selected="selected">-- Select Type -- </option>
                                                    <option value="Module">Modules</option>
                                                    <option value="Page">Page</option>
                                                    <option value="ExternalLink">External Link</option>
                                                </select>
                                                <div class="input-group-append">
                                                    <span class="input-group-text"><i class="fas fa-caret-down"></i></span>
                                                </div>
                                            </div>
                                        </div>
                                        <label for="type" class="col-sm-2 col-form-label">Parent</label>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <select class="form-control select2" name="parent_id" style="width: auto;">
                                                    <option selected="selected" value="">-- Select Parent -- </option>
                                                    @foreach ($menus as $menu)
                                                        <option value="{{ $menu->id }}">{{ $menu->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="modulesDiv" class="form-group row" style="display: none;">
                                        <label for="modules" class="col-sm-2 col-form-label">Modules</label>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <select class="form-control select2" name="module_id" style="width: auto;">
                                                    <option selected="selected" value="">-- Select Module -- </option>
                                                    @foreach ($modules as $module)
                                                        <option value="{{ $module->id }}">{{ $module->name }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>

                                    <div id="externalLinkDiv" class="form-group row" style="display: none;">
                                        <label for="external_link" class="col-sm-2 col-form-label">External Link</label>
                                        <div class="col-sm-3">
                                            <input type="text" class="form-control" id="external_link"
                                                name="external_link" placeholder="External Link">
                                            @error('external_link')
                                                <span class="text-danger">{{ $message }}</span>
                                            @enderror
                                        </div>
                                    </div>

                                    <div id="pagesDiv" class="form-group row" style="display: none;">
                                        <label for="page" class="col-sm-2 col-form-label">Pages</label>
                                        <div class="col-sm-2">
                                            <div class="input-group">
                                                <select class="form-control select2" name="page_id" style="width: auto;">
                                                    <option selected="selected" value="">-- Select Page -- </option>
                                                    @foreach ($pages as $page)
                                                        <option value="{{ $page->id }}">{{ $page->slug }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-secondary float-right m-2"
                                            style="color: white">Create Menu</button>
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
    <script>
        $(document).ready(function() {
            // Initial setup
            hideAllFields();

            // Event handler for menu type change
            $('select[name="type"]').on('change', function() {
                hideAllFields();
                var selectedMenuType = $(this).val();

                // Show the relevant field based on the selected menu type
                if (selectedMenuType === 'Module') {
                    $('#modulesDiv').show();
                } else if (selectedMenuType === 'ExternalLink') {
                    $('#externalLinkDiv').show();
                } else if (selectedMenuType === 'Page') {
                    $('#pagesDiv').show();
                }
            });

            // Function to hide all fields
            function hideAllFields() {
                $('#modulesDiv, #externalLinkDiv, #pagesDiv').hide();
            }
        });
    </script>
@endsection
