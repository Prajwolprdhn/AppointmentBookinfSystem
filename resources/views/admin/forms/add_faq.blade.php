@extends('layouts.app')

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Add FAQ's</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">FAQ's Form</li>
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
                                <h3 class="card-title mt-2">Question</h3>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {!! Form::open(['route' => 'faq.store', 'method' => 'post']) !!}
                            @csrf
                            <div class="card-body">
                                <div class="form-group row">
                                    {!! Form::label('question', 'Question', ['class' => 'col-sm-2 col-form-label']) !!}

                                    <div class="col-lg-10">
                                        {!! Form::text('question', null, ['class' => 'col-sm-5 form-control', 'placeholder' => 'Enter the Question. ']) !!}
                                        @error('question')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {!! Form::label('answer', 'Answer', ['class' => 'col-sm-2 col-form-label']) !!}

                                    <div class="col-lg-10">
                                        {!! Form::textarea('answer', null, ['class' => 'col-sm-5 form-control', 'placeholder' => 'Enter the answer. ']) !!}
                                        @error('answer')
                                            <span class="text-danger">{{ $message }}</span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            <div class="card-footer">
                                {!! Form::submit('Submit', ['class' => 'btn btn-secondary float-right m-2', 'style' => 'color: white']) !!}
                            </div>
                            {!! Form::close() !!}
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
