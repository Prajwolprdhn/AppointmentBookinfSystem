@extends('users.dashboard')

@section('content')
    <div class="content-wrapper">
        <div class="container-fluid pt-5 bg-primary hero-header">
            <div class="container pt-5">
                <div class="row g-5 pt-5">
                    <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                        <h1 class="display-4 text-white mb-4 animated slideInRight">Contact Us</h1>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center justify-content-lg-start mb-0">
                                <li class="breadcrumb-item"><a class="text-white" href="#">Home</a></li>
                                <li class="breadcrumb-item"><a class="text-white" href="#">Pages</a></li>
                                <li class="breadcrumb-item text-white active" aria-current="page">Contact Us</li>
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

        <div class="container-fluid py-5">
            <div class="container py-5">
                <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Contact Us</div>
                    <h1 class="mb-4">If You Have Any Query, Please Contact Us</h1>
                </div>
                <div class="row justify-content-center">
                    <div class="col-lg-7">
                        <p class="text-center mb-4">Please feel free reach out to us with any of your concerns, queries or
                            any sorts of reccomendations you have for us. Also do mention your contact and email so we can
                            get back to you with updates.
                        <div class="wow fadeIn" data-wow-delay="0.3s">
                            <form method="POST" action="{{ route('feedback.store') }}">
                                @csrf
                                <div class="row g-3">
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" id="name" name="name"
                                                placeholder="Your Name">
                                            <label for="name">Your Name</label>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-floating">
                                            <input type="contact" class="form-control" id="contact" name="contact"
                                                placeholder="Your Contact">
                                            <label for="contact">Your Contact</label>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-floating">
                                            <input type="email" class="form-control" id="email" name="email"
                                                placeholder="Your Email">
                                            <label for="email">Your Email</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <input type="text" class="form-control" name="subject" id="subject"
                                                placeholder="Subject">
                                            <label for="subject">Subject</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="form-floating">
                                            <textarea class="form-control" name = "message" placeholder="Leave a message here" id="message" style="height: 150px"></textarea>
                                            <label for="message">Message</label>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <button class="btn btn-primary w-100 py-3" type="submit">Send Message</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
