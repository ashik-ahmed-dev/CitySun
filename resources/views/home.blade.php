@extends('layouts.app')
@section('content')
    @php
        $general = json_decode(settings('general'), true);
        $slider = json_decode(settings('slider'), true);
        $web_setting = json_decode(settings('websettings'), true);
    @endphp

    <!--hero section start-->
    <section class="position-relative overflow-hidden hero-area">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="hero-content-left pt-5">
                        <h1 class="font-weight-bold">{{ $slider['title'] }}</h1>
                        <p class="lead">{{ $slider['subtitle'] }}</p>
                        <div class="action-btns mt-4">
                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="#" class="d-flex align-items-center app-download-btn btn btn-outline-brand-02 btn-rounded">
                                        <span class="fab fa-apple icon-size-sm mr-3"></span>
                                        <div class="download-text text-left">
                                            <small>Download form</small>
                                            <h5 class="mb-0">App Store</h5>
                                        </div>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="#" class="d-flex align-items-center app-download-btn btn btn-outline-brand-02 btn-rounded">
                                        <span class="fab fa-google-play icon-size-sm mr-3"></span>
                                        <div class="download-text text-left">
                                            <small>Download form</small>
                                            <h5 class="mb-0">Google Play</h5>
                                        </div>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="img-wrap">
                        <img src="{{ asset('storage/slider.webp') }}" alt="hero" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--hero section end-->

    <!--our team section start-->
    <section id="services" class="team-two-section pb-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading text-center">
                        <h2>Latest Category</h2>
                        <p class="pb-4">From home cleaning to finding a handyman near me, Handy is your source for home services.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @if($categories->count()>0)
                    @foreach($categories as $category)
                        <div class="col-12 col-sm-3 col-md-6 col-lg-3 pb-4">
                            <div class="single-service-promo bg-white text-center border">
                                <a href="{{ route('category.services',$category->slug ) }}" class="d-flex align-items-center justify-content-center">
                                    <img src="{{ asset($category->icon) }}" alt="" style="height: 80px; width: auto">
                                </a>
                                <h3><a href="{{ route('category.services',$category->slug ) }}">{{ $category->name }}</a></h3>
                            </div>
                        </div>
                    @endforeach
                @else
                    <strong>No found</strong>
                @endif
            </div>
        </div>
    </section>
    <!--our team section end-->

    <!--about us section start-->
    <section id="about" class="about-us ptb-100 position-relative">
        <div class="container">
            <div class="row align-items-center justify-content-lg-between justify-content-md-center justify-content-sm-center">
                <div class="col-md-12 col-lg-6 mb-5 mb-md-5 mb-sm-5 mb-lg-0">
                    <div class="about-content-left">
                        <h2>@lang('About US')</h2>
                        <p>{!! settings('about_text') !!}</p>
                    </div>
                </div>
                <div class="col-sm-5 col-md-5 col-lg-6">
                    <div class="about-content-right">
                        <img src="{{ asset('storage/images/about.webp') }}" alt="about us" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--about us section end-->

    <!--promo section start-->
    <section class="promo-block gray-light-bg ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading text-center mb-4">
                        <h6 class="text-uppercase color-accent mb-1">@lang('WHY CHOOSE US')</h6>
                        <h2>@lang('Because we care about your safety...')</h2>
                        <p>Professional hosting at an affordable price. Distinctively recaptiualize principle-centered core competencies through client-centered core competencies.</p>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                <div class="col-md-6 col-lg-6">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="card border-0 single-promo-card text-center mt-4">
                                <div class="card-body">
                                    <div class="pb-2">
                                        <span class="fas fa-concierge-bell icon-size-md color-secondary"></span>
                                    </div>
                                    <div class="pt-2 pb-3">
                                        <h5>@lang('Ensuring Masks')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card border-0 single-promo-card text-center mt-4">
                                <div class="card-body">
                                    <div class="pb-2">
                                        <span class="fas fa-window-restore icon-size-md color-secondary"></span>
                                    </div>
                                    <div class="pt-2 pb-3">
                                        <h5>@lang('Ensuring Gloves')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card border-0 single-promo-card text-center mt-4">
                                <div class="card-body">
                                    <div class="pb-2">
                                        <span class="fas fa-sync-alt icon-size-md color-secondary"></span>
                                    </div>
                                    <div class="pt-2 pb-3">
                                        <h5>@lang('Sanitising Hands')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="card border-0 single-promo-card text-center mt-4">
                                <div class="card-body">
                                    <div class="pb-2">
                                        <span class="fas fa-bezier-curve icon-size-md color-secondary"></span>
                                    </div>
                                    <div class="pt-2 pb-3">
                                        <h5>@lang('24/7 Support')</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6 col-lg-6">
                    <div class="about-content-right">
                        <img src="{{ asset('storage/images/featured.webp') }}" alt="about us" class="img-fluid">
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--promo section end-->

    <!--testimonial section start-->
    <section id="review" class="review-section ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-9 col-lg-8">
                    <div class="section-heading text-center mb-4">
                        <h6 class="text-uppercase color-accent mb-1">Client Review</h6>
                        <h2>{{ $web_setting['testi_title'] }}</h2>
                        <p>{!! $web_setting['testi_subtitle'] !!}</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-12">
                    <div class="owl-carousel owl-theme client-testimonial-2 dot-indicator">
                        @if($testi->count()>0)
                            @foreach($testi as $list)
                            <div class="item">
                                <div class="single-review-wrap gray-light-bg p-5 my-3">
                                    <div class="review-top d-flex align-items-center justify-content-between mb-3">
                                        <div class="review-author d-flex align-items-center">
                                            <img src="{{ asset($list->photo_link) }}" width="50" alt="{{ $list->name }}" class="rounded-circle border shadow-sm img-fluid mr-3" />
                                            <div class="review-info">
                                                <h6 class="mb-0">{{ $list->name }}</h6>
                                                <span>{{ $list->title }}</span>
                                            </div>
                                        </div>
                                        <span><i class="fas fa-quote-left icon-size-md color-primary"></i></span>
                                    </div>
                                    <div class="review-body">
                                        <p class="mb-0">{{ short_desc($list->comments) }}</p>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        @else
                            <strong>No Review</strong>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--testimonial section end-->

    <!--our contact section start-->
    <section id="contact" class="contact-us-section ptb-100">
        <div class="container">
            <div class="row justify-content-around">
                <div class="col-12 pb-3 message-box d-none">
                    <div class="alert alert-danger"></div>
                </div>
                <div class="col-md-12 col-lg-5 mb-5 mb-md-5 mb-sm-5 mb-lg-0">
                    <div class="contact-us-form gray-light-bg rounded p-5">
                        <h4>@lang('Ready to get started?')</h4>
                        <form action="{{ route('contact.store') }}" method="POST" class="contact-us-form">
                            @csrf
                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="name" placeholder="Enter name" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="email" class="form-control" name="email" placeholder="Enter email" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <input type="text" class="form-control" name="subject" placeholder="Enter subject" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" class="form-control" rows="7" cols="25" placeholder="Message"></textarea>
                                    </div>
                                </div>
                                <div class="col-sm-12 mt-3">
                                    <button type="submit" class="btn btn-brand-02" id="btnContactUs">@lang('Send Message')</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-md-12 col-lg-6">
                    <div class="contact-us-content">
                        <h2>@lang('Looking for a excellent Business idea?')</h2>
                        <p class="lead">@lang('Give us a call or drop by anytime, we endeavour to answer all enquiries within 24 hours on business days.')</p>
                        <a href="#" class="btn btn-outline-brand-01 align-items-center">Get Directions <span class="ti-arrow-right pl-2"></span></a>
                        <hr class="my-5">
                        <ul class="contact-info-list">
                            <li class="d-flex pb-3">
                                <div class="contact-icon mr-3">
                                    <span class="fas fa-location-arrow color-primary rounded-circle p-3"></span>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">@lang('Company Location')</h5>
                                    <p>{{ $general['address'] }}</p>
                                </div>
                            </li>
                            <li class="d-flex pb-3">
                                <div class="contact-icon mr-3">
                                    <span class="fas fa-envelope color-primary rounded-circle p-3"></span>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">@lang('Email Address')</h5>
                                    <p>{{ $general['email'] }}</p>
                                </div>
                            </li>
                            <li class="d-flex pb-3">
                                <div class="contact-icon mr-3">
                                    <span class="fas fa-phone color-primary rounded-circle p-3"></span>
                                </div>
                                <div class="contact-text">
                                    <h5 class="mb-1">@lang('Phone Number')</h5>
                                    <p>{{ $general['phone'] }}</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!--our contact section end-->

@endsection
