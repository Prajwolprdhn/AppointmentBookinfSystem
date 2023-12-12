@extends('users.dashboard')

@inject('faq_helper', 'App\Helpers\FaqHelper')

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


    <!-- Doctors Start -->
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
                                        <small class="mb-1">{{ $doctors[0]->department->departments }}</small><br>
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
                                        <small class="mb-1">{{ $doctors[0]->department->departments }}</small><br>
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
                                        <img class="img-fluid rounded-circle p-4" src="{{ asset($doctors[2]->photo) }}"
                                            alt="">
                                        <h5 class="mb-1">
                                            {{ $doctors[2]->first_name . ' ' . $doctors[2]->last_name }}</h5>
                                        <small class="mb-1">{{ $doctors[2]->department->departments }}</small><br>
                                        <small><i class="far fa-envelope"
                                                style="padding-right: 10px; font-size: 14px;"></i>{{ $doctors[2]->user->email ?? '-' }}
                                        </small>
                                    </div>
                                </div>
                                <div class="col-12 wow fadeIn" data-wow-delay="0.7s">
                                    <div class="team-item bg-white text-center rounded p-4 pt-0">
                                        <img class="img-fluid rounded-circle p-4" src="{{ asset($doctors[3]->photo) }}"
                                            alt="">
                                        <h5 class="mb-1">
                                            {{ $doctors[3]->first_name . ' ' . $doctors[3]->last_name }}</h5>
                                        <small class="mb-1">{{ $doctors[3]->department->departments }}</small><br>
                                        <small><i class="far fa-envelope"
                                                style="padding-right: 10px; font-size: 14px;"></i>{{ $doctors[3]->user->email ?? '-' }}
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
    <!-- Doctors End -->


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
                        @php
                            $accordionCount1 = 1; // Initialize the counter for FAQ1
                        @endphp
                        @foreach ($faq_helper->show()['faqs_first'] as $faq)
                            <div class="accordion-item wow fadeIn" data-wow-delay="0.1s">
                                <h2 class="accordion-header" id="headingFAQ1_{{ $accordionCount1 }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFAQ1_{{ $accordionCount1 }}" aria-expanded="false"
                                        aria-controls="collapseFAQ1_{{ $accordionCount1 }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>
                                <div id="collapseFAQ1_{{ $accordionCount1 }}" class="accordion-collapse collapse"
                                    aria-labelledby="headingFAQ1_{{ $accordionCount1 }}" data-bs-parent="#accordionFAQ1">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                            @php
                                $accordionCount1++; // Increment the counter for FAQ1
                            @endphp
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="accordion" id="accordionFAQ2">
                        @php
                            $accordionCount2 = 1; // Initialize the counter for FAQ2
                        @endphp

                        @foreach ($faq_helper->show()['faqs_second'] as $faq)
                            <div class="accordion-item wow fadeIn" data-wow-delay="0.3s">
                                <h2 class="accordion-header" id="headingFAQ2_{{ $accordionCount2 }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapseFAQ2_{{ $accordionCount2 }}" aria-expanded="false"
                                        aria-controls="collapseFAQ2_{{ $accordionCount2 }}">
                                        {{ $faq->question }}
                                    </button>
                                </h2>

                                <div id="collapseFAQ2_{{ $accordionCount2 }}" class="accordion-collapse collapse"
                                    aria-labelledby="headingFAQ2_{{ $accordionCount2 }}" data-bs-parent="#accordionFAQ2">
                                    <div class="accordion-body">
                                        {{ $faq->answer }}
                                    </div>
                                </div>
                            </div>
                            @php
                                $accordionCount2++; // Increment the counter for FAQ2
                            @endphp
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- FAQs Start -->
    <script>
        let accordionCountFAQ1 = {{ $accordionCount1 }};
        let accordionCountFAQ2 = {{ $accordionCount2 }};
    </script>
@endsection
