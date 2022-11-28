<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @if(!empty($title))
        <title>{{$title}}</title>
    @else
        <title>Login</title>
    @endif
    <link rel="shortcut icon" href="{{ asset('uploads/favicon.webp') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/ext-component-toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <a href="{{ url('/') }}">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('storage/logo.webp') }}" alt="Logo">
            </a>
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>@lang('Register')</h1>
                        <p class="account-subtitle">@lang('Access to our dashboard')</p>
                        <form action="{{ route('register') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label class="form-control-label">@lang('Enter name')</label>
                                <input type="text" name="name" :value="old('name')" class="form-control" required placeholder="Enter Your Name">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">@lang('Enter Username')</label>
                                <input type="text" name="username" :value="old('username')" class="form-control" required placeholder="Enter Your username">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">@lang('Enter email')</label>
                                <input type="email" name="email" :value="old('email')" class="form-control" required placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">@lang('Enter Password')</label>
                                <input type="password" name="password" class="form-control" required placeholder="Enter Password">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">@lang('Confirm Password')</label>
                                <input type="password" name="password_confirmation" class="form-control" required placeholder="Confirm Password">
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-lg btn-block btn-primary w-100">@lang('Register')</button>
                            </div>
                        </form>

                        <div class="login-or">
                            <span class="or-line"></span>
                            <span class="span-or">or</span>
                        </div>
                        <div class="text-center dont-have">@lang('Already have an account?') <a href="{{ route('login') }}">@lang('Login')</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
<script>
    @if(Session::has('success'))
        toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    }
    toastr.success('{{ session('success') }}', 'Congratulations!!!');

    @endif
        @if(Session::has('error'))
        toastr.options = {
        timeOut: 3000,
        progressBar: true,
        showMethod: "slideDown",
        hideMethod: "slideUp",
        showDuration: 200,
        hideDuration: 200
    }
    toastr.error('{{ session('error') }}', 'Ooops!!!');
    @endif
</script>
</body>
</html>
