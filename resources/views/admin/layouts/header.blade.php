@php
    $userData = DB::table('users')->first();
@endphp

<header class="header">
    <div class="header-left">
        <a href="{{ route('admin.dashboard') }}" class="logo">
            <img src="{{ asset('storage/logo.webp') }}" alt="Logo">
        </a>
        <a href="{{ route('admin.dashboard') }}" class="white-logo">
            <img src="{{ asset('storage/favicon.webp') }}" alt="Logo">
        </a>
        <a href="{{ route('admin.dashboard') }}" class="logo logo-small">
            <img src="{{ asset('storage/favicon.webp') }}" alt="Logo" width="30" height="30">
        </a>
    </div>
    <a href="javascript:void(0);" id="toggle_btn">
        <i class="las la-bars"></i>
    </a>
    <div class="top-nav-search">
        <form>
            <input type="text" class="form-control" placeholder="Search here">
            <button class="btn" type="submit"><i class="las la-search"></i>
            </button>
        </form>
    </div>
    <a class="mobile_btn" id="mobile_btn">
        <i class="las la-bars"></i>
    </a>
    <ul class="nav nav-tabs user-menu">
        <li class="nav-item dropdown has-arrow main-drop">
            <a href="#" class="dropdown-toggle nav-link" data-bs-toggle="dropdown">
                <span class="user-img">
                <img src="{{ (!empty($userData->photo_path))? url($userData->photo_path):url('images/default.png') }}" alt="">
            </a>
            <div class="dropdown-menu">
                <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="lar la-user me-1"></i></i> @lang('Profile')</a>
                <a class="dropdown-item" href="{{ route('admin.settings.general') }}"><i class="las la-sliders-h me-1"></i> @lang('Settings')</a>
                <a class="dropdown-item" href="{{ route('logout') }}"><i class="las la-power-off me-1"></i> @lang('Logout')</a>
            </div>
        </li>
    </ul>
</header>
