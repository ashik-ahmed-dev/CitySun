@extends('layouts.app')
@section('content')
    @php
        $general = json_decode(settings('general'), true);
        $web_setting = json_decode(settings('websettings'), true);
    @endphp
    <section class="breadcrumb-area d-flex align-items-center mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breamcrumb Content -->
                    <div class="breadcrumb-content text-center">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a class="text-uppercase" href="{{ url('/') }}">Home</a></li>
                            <li class="breadcrumb-item active">Contact</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="contact-area bg-gray ptb_100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <!-- Section Heading -->
                    <div class="section-heading text-center mb-5">
                        <h2 class="text-capitalize">{{ $web_setting['contact_title'] }}</h2>
                        <p class="d-none d-sm-block mt-4">{!! $web_setting['contact_subtitle'] !!}</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-between">
                <div class="col-12 col-md-5">
                    <!-- Contact Us -->
                    <div class="contact-us">
                        <ul>
                            <li>
                                <a class="media" href="#">
                                    <div class="social-icon mr-3">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    <span class="media-body align-self-center">{{ $general['address'] }}</span>
                                </a>
                            </li>
                            <li class="py-2">
                                <a class="media" href="#">
                                    <div class="social-icon mr-3">
                                        <i class="fas fa-phone-alt"></i>
                                    </div>
                                    <span class="media-body align-self-center">{{ $general['phone'] }}</span>
                                </a>
                            </li>
                            <li class="py-2">
                                <a class="media" href="#">
                                    <div class="social-icon mr-3">
                                        <i class="far fa-envelope"></i>
                                    </div>
                                    <span class="media-body align-self-center">{{ $general['email'] }}</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-12 col-md-6 pt-4 pt-md-0">
                    <!-- Contact Box -->
                    <div class="contact-box text-center">
                        <!-- Contact Form -->
                        <form method="POST" action="{{ route('contact.store') }}">
                            @csrf
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="name" placeholder="Name" required="required">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="email" class="form-control" name="email" placeholder="Email" required="required">
                                    </div>
                                    <div class="form-group mb-4">
                                        <input type="text" class="form-control" name="subject" placeholder="Subject" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group mb-4">
                                        <textarea class="form-control" name="message" placeholder="Message" required="required" spellcheck="false"></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="button"> <i class="fas fa-paper-plane"></i> Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection
