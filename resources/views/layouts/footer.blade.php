@php
    $general = json_decode(settings('general'), true);
@endphp

<footer class="footer">
    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <a href="{{ url('/') }}" class="navbar-brand mb-2">
                    <img src="{{ asset(get_path('logo.png')) }}" alt="logo" class="logo">
                </a>
                <br>
                <p>{!! $general['footer_text'] !!}</p>
                <div class="list-inline social-list-default background-color social-hover-2 mt-2">
                    <li class="list-inline-item"><a class="facebook" href="{{ $general['facebook'] }}" target="_blank"><i class="fab fa-facebook"></i></a></li>
                    <li class="list-inline-item"><a class="twitter" href="{{ $general['twitter'] }}" target="_blank"><i class="fab fa-twitter"></i></a></li>
                    <li class="list-inline-item"><a class="instagram" href="{{ $general['instagram'] }}" target="_blank"><i class="fab fa-instagram"></i></a></li>
                    <li class="list-inline-item"><a class="youtube" href="{{ $general['youtube'] }}" target="_blank"><i class="fab fa-youtube"></i></a></li>
                </div>
            </div>
            <div class="col-lg-3">
                <h6 class="text-uppercase">Resources</h6>
                <ul>
                    <li><a href="{{ route('posts') }}">@lang('Our Blog')</a></li>
                    <li><a href="#about">@lang('About Us')</a></li>
                    <li><a href="#contact">@lang('Contact')</a></li>
                    <li><a href="{{ route('privacy-policy') }}">@lang('Privacy Policy')</a></li>
                    <li><a href="{{ route('terms') }}">@lang('Terms and Services')</a></li>
                </ul>
            </div>
            <div class="col-lg-5 mb-4 ">
                <div class="newsletter-wrap">
                    <div class="newsletter-content">
                        <h3 class="mb-0">@lang('Subscribe our Newsletter')</h3>
                        <p class="mb-0">{{ $general['newslatter_text'] }}</p>
                    </div>
                    <form method="post" action="{{ route('subscribe.store') }}" class="newsletter-form position-relative mt-4">
                        @csrf
                        <input type="email" class="input-newsletter form-control" placeholder="Enter your email" name="email" required="" autocomplete="off">
                        <button type="submit" class="disabled"><i class="fas fa-paper-plane"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--end of container-->
    <div class="footer-bottom py-3 gray-light-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-7">
                    <div class="copyright-wrap small-text">
                        <p class="mb-0">2022 © Citysun Developed by <a href="https://github.com/ashik-ahmed-dev" target="_blank" class="color-primary">Ashik Ahmed</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
