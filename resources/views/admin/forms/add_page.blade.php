@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Page Form</li>
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
                        <div class="card card-light">
                            <div class="card-header p-2">
                                <ul class="nav nav-pills">
                                    <li class="nav-item"><a class="nav-link active" href="#english"
                                            data-toggle="tab">English</a></li>
                                    <li class="nav-item"><a class="nav-link" href="#nepali" data-toggle="tab">
                                            नेपाली</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <form action="{{ route('page.store') }}" method="post">
                                @csrf
                                <div class="card-body">
                                    <div class="tab-content">
                                        <div class="active tab-pane" id="english">
                                            <div class="form-group row ">
                                                <label for="title_en" class="col-sm-2 col-form-label ">Page Title</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="title_en"
                                                        name="title_en" placeholder="Page Title">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row ">
                                                <label for="slug" class="col-sm-2 col-form-label ">Slug</label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="slug" name="slug"
                                                        placeholder="Page Slug">
                                                    @error('slug')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="content_en" class="col-sm-2 col-form-label ">Content :</label>
                                            </div>
                                            <div class="form-group row">
                                                <div class="card-body">
                                                    <textarea id="summernote" name="content_en">{{ $page->content_en ?? '' }}</textarea>
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="tab-pane" id="nepali">
                                            <div class="form-group row ">
                                                <label for="title_np" class="col-sm-2 col-form-label ">शीर्षक
                                                </label>
                                                <div class="col-sm-2">
                                                    <input type="text" class="form-control" id="title_np"
                                                        name="title_np"
                                                        placeholder="शीर्षक लेख्नुहोस्                                                        ">
                                                    @error('title')
                                                        <span class="text-danger">{{ $message }}</span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="content_np" class="col-sm-2 col-form-label ">विवरण :</label>
                                            </div>
                                            <div class="form-group row">
                                                <div class="card-body">
                                                    <textarea id="summernote1" name="content_np" placeholder="">
                                                    </textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-secondary float-right m-2"
                                        style="color: white">Create Page</button>
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
        $(function() {
            // Summernote
            $('#summernote').summernote()
            $('#summernote1').summernote()
        })
    </script>
@endsection
