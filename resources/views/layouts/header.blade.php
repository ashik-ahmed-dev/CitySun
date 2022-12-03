<header class="header">
    <!--start navbar-->
    <nav class="navbar navbar-expand-lg fixed-top custom-nav">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset(get_path('logo.png')) }}" alt="logo" class="logo" />
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="ti-menu"></span>
            </button>

            <div class="collapse navbar-collapse h-auto" id="navbarSupportedContent">
                <ul class="navbar-nav ml-auto menu">
                    <li><a href="{{ url('/') }}" class="page-scroll"> Home</a></li>
                    <li><a href="#services" class="page-scroll">Services</a></li>
                    <li><a href="#review" class="page-scroll">Clients</a></li>
                    <li><a href="#about" class="page-scroll">About</a></li>
                    <li><a href="#contact" class="page-scroll">Contact</a></li>
                    <li><a href="{{ route('posts') }}" class="page-scroll">@lang('Blog')</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
