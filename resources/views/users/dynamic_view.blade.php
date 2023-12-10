@extends('users.dashboard')
@inject('menubar_helper', 'App\Helpers\MenubarHelper')
@section('content')
    <style>
        .nav-pills .nav-item {
            position: relative;
            padding-bottom: 5px;
        }

        .nav-pills .nav-item .nav-link {
            position: relative;
            color: #000;
            /* Set the default text color */
            transition: color 0.3s ease;
            /* Add a transition effect for the color */
        }

        .nav-pills .nav-item .nav-link.active {
            background-color: transparent;

            /* Set the text color for the active tab */
        }

        .nav-pills .nav-item .nav-link::before {
            content: "";
            position: absolute;
            width: 0;
            height: 2px;
            /* Set the height of the underline */
            bottom: 0;
            left: 50%;
            background-color: blue;
            /* Set the color of the underline */
            transition: width 0.3s ease, left 0.3s ease;
            /* Add a transition effect for width and left position */
        }

        .nav-pills .nav-item .nav-link.active::before {
            margin-left: 13px;
            width: 70%;
            /* Set the width of the underline for the active tab */
            left: 0;
            /* Set the left position of the underline for the active tab */
        }
    </style>
    <div class="content-wrapper">
        <div class="container-fluid pt-3 bg-primary hero-header">
            <div class="container pt-5">
                <div class="row g-5 ">
                    <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                        <h1 class="display-4 text-white mb-4 animated slideInRight">
                            @foreach ($menubar_helper->show() as $menu)
                                @if ($menu->type == 'Page' && $menu->page_id == $page_id)
                                    {{ $menu->name }}
                                @endif
                            @endforeach
                        </h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                                <li class="breadcrumb-item"><a class="text-white" href="{{ route('main') }}">Home</a></li>

                                <li class="breadcrumb-item text-white active" aria-current="page">
                                    @foreach ($menubar_helper->show() as $menu)
                                        @if ($menu->type == 'Page' && $menu->page_id == $page_id)
                                            {{ $menu->name }}
                                        @endif
                                    @endforeach
                                </li>
                            </ol>
                        </nav>
                    </div>
                    <div class="col-lg-6 align-self-end text-center text-lg-end">
                        <img class="img-fluid" src="{{ asset('images/doc1.png') }}" alt="" style="height: 400px">
                    </div>
                </div>
            </div>
        </div>
        <!-- Hero End -->

        <!-- Case Start -->
        <div class="container-fluid bg-light py-5">
            <div class="container py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">
                        <ul class="nav nav-pills">
                            <li class="nav-item"><a class="nav-link active" href="#english" data-toggle="tab">English</a>
                            </li>
                            <li class="mt-2">||</li>
                            <li class="nav-item"><a class="nav-link" href="#nepali" data-toggle="tab">
                                    नेपाली</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="tab-content">
                    <div class="active tab-pane" id="english">
                        <div class="container-fluid py-2">
                            <h1 class="mb-0 text-center">{{ $data->title['en'] }}</h1>
                            <div class="container py-5">
                                <div class="row align-items-center">
                                    <p class="mb-4">{{ $data->content['en'] }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane" id="nepali">
                        <div class="container-fluid py-2">
                            <h1 class="mb-0 text-center">{{ $data->title['np'] }}</h1>
                            <div class="container py-5">
                                <div class="row align-items-center">
                                    <p class="mb-4">{{ $data->content['np'] }}</p>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
