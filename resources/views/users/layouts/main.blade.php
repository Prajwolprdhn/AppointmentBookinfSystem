@extends('users.dashboard')

@section('content')
    <!-- Hero Start -->
    <div class="container-fluid pt-5 bg-primary hero-header mb-5">
        <div class="container pt-5">
            <div class="row g-5 pt-5">
                <div class="col-lg-6 align-self-center text-center text-lg-start mb-lg-5">
                    <div class="btn btn-sm border rounded-pill text-white px-3 mb-3 animated slideInRight">A.B.S</div>
                    <h2 class="display-4 text-white mb-4 animated slideInRight">Appointment Booking System for Your
                        Hospital</h2>
                    <p class="text-white mb-4 animated slideInRight"> We understand the importance of seamless
                        healthcare access, and we've designed a user-friendly platform to simplify the appointment
                        scheduling process.</p>
                    <a href="" class="btn btn-outline-light py-sm-3 px-sm-5 rounded-pill animated slideInRight">Book
                        an Appointment</a>
                </div>
                <div class="col-lg-6 align-self-end text-center text-lg-end">
                    <img class="img-fluid" src="{{ asset('images/doc1.png') }}" alt="">
                </div>
            </div>
        </div>
    </div>
    <!-- Hero End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.1s">
                    <div class="about-img">
                        <img class="img-fluid" src="{{ asset('images/dco2.png') }}">
                    </div>
                </div>
                <div class="col-lg-6 wow fadeIn" data-wow-delay="0.5s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">About Us</div>
                    <h1 class="mb-4">Where your time and health are our top
                        priorities.</h1>
                    <p class="mb-4">Our mission is to connect you with trusted healthcare professionals effortlessly.
                        With a diverse range of medical experts available, you can easily find the right specialist for
                        your needs. We prioritize your convenience, offering a responsive and intuitive interface that
                        allows you to schedule appointments with just a few clicks.</p>
                    <div class="row g-3">
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>ISO 9001 & 27001 Certified
                            </h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>Professional Staff</h6>
                        </div>
                        <div class="col-sm-6">
                            <h6 class="mb-3"><i class="fa fa-check text-primary me-2"></i>Award Winning</h6>
                            <h6 class="mb-0"><i class="fa fa-check text-primary me-2"></i>24/7 Support</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->


    <!-- Service Start -->
    <div class="container-fluid bg-light mt-5 py-5">
        <div class="container py-5">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5 wow fadeIn" data-wow-delay="0.1s">
                    <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Our Doctors</div>
                    <h1 class="mb-4">Meet Our Experienced Doctors</h1>
                    <p class="mb-4">In the bustling environment of a hospital, doctors are highly skilled and
                        compassionate medical professionals dedicated to the well-being of their patients. Armed with
                        extensive knowledge and expertise, they diagnose illnesses, develop treatment plans, and perform
                        life-saving procedures. Working collaboratively with a multidisciplinary healthcare team.</p>
                    <a class="btn btn-primary rounded-pill px-4" href="">View More</a>
                </div>
                <div class="col-lg-7">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="{{ asset($doctors[0]->photo) }}"
                                            alt="">
                                        <h5 class="mb-1">
                                            {{ $doctors[0]->first_name . ' ' . $doctors[0]->last_name }}</h5>
                                        <small class="mb-1">Founder & CEO</small><br>
                                        <small><i class="far fa-envelope"
                                                style="padding-right: 10px; font-size: 14px;"></i>{{ $doctors[0]->user->email ?? '-' }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.1s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="{{ asset($doctors[1]->photo) }}"
                                            alt="">
                                        <h5 class="mb-1">
                                            {{ $doctors[1]->first_name . ' ' . $doctors[1]->last_name }}</h5>
                                        <small class="mb-1">Founder & CEO</small><br>
                                        <small><i class="far fa-envelope"
                                                style="padding-right: 10px; font-size: 14px;"></i>{{ $doctors[1]->user->email ?? '-' }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 pt-md-4">
                            <div class="row g-4">
                                <div class="col-12 wow fadeIn" data-wow-delay="0.3s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="{{ asset($doctors[1]->photo) }}"
                                            alt="">
                                        <h5 class="mb-1">
                                            {{ $doctors[1]->first_name . ' ' . $doctors[1]->last_name }}</h5>
                                        <small class="mb-1">Founder & CEO</small><br>
                                        <small><i class="far fa-envelope"
                                                style="padding-right: 10px; font-size: 14px;"></i>{{ $doctors[1]->user->email ?? '-' }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="{{ asset($doctors[0]->photo) }}"
                                            alt="">
                                        <h5 class="mb-1">
                                            {{ $doctors[0]->first_name . ' ' . $doctors[0]->last_name }}</h5>
                                        <small class="mb-1">Founder & CEO</small><br>
                                        <small><i class="far fa-envelope"
                                                style="padding-right: 10px; font-size: 14px;"></i>{{ $doctors[0]->user->email ?? '-' }}
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Service End -->


    <!-- FAQs Start -->
    <div class="container-fluid py-5">
        <div class="container py-5">
            <div class="mx-auto text-center wow fadeIn" data-wow-delay="0.1s" style="max-width: 500px;">
                <div class="btn btn-sm border rounded-pill text-primary px-3 mb-3">Popular FAQs</div>
                <h1 class="mb-4">Frequently Asked Questions</h1>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ1">
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                            <h2 class="accordion-header" id="headingOne">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                    How to build a website?
                                </button>
                            </h2>
                            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et
                                    magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.2s">
                            <h2 class="accordion-header" id="headingTwo">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    How long will it take to get a new website?
                                </button>
                            </h2>
                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et
                                    magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.3s">
                            <h2 class="accordion-header" id="headingThree">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Do you only create HTML websites?
                                </button>
                            </h2>
                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et
                                    magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.4s">
                            <h2 class="accordion-header" id="headingFour">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">
                                    Will my website be mobile-friendly?
                                </button>
                            </h2>
                            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                                data-bs-parent="#accordionFAQ1">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et
                                    magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ2">
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.5s">
                            <h2 class="accordion-header" id="headingFive">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                                    Will you maintain my site for me?
                                </button>
                            </h2>
                            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                                data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et
                                    magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.6s">
                            <h2 class="accordion-header" id="headingSix">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                                    I’m on a strict budget. Do you have any low cost options?
                                </button>
                            </h2>
                            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                                data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et
                                    magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.7s">
                            <h2 class="accordion-header" id="headingSeven">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                                    Will you maintain my site for me?
                                </button>
                            </h2>
                            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                                data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et
                                    magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item wow fadeIn" data-wow-delay="0.8s">
                            <h2 class="accordion-header" id="headingEight">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                    data-bs-target="#collapseEight" aria-expanded="false" aria-controls="collapseEight">
                                    I’m on a strict budget. Do you have any low cost options?
                                </button>
                            </h2>
                            <div id="collapseEight" class="accordion-collapse collapse" aria-labelledby="headingEight"
                                data-bs-parent="#accordionFAQ2">
                                <div class="accordion-body">
                                    Dolor nonumy tempor elitr et rebum ipsum sit duo duo. Diam sed sed magna et
                                    magna
                                    diam aliquyam amet dolore ipsum erat duo. Sit rebum magna duo labore no diam.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs Start -->
@endsection
