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
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
</head>

<body>
<div class="main-wrapper login-body">
    <div class="login-wrapper">
        <div class="container">
            <a href="{{ url('/') }}">
                <img class="img-fluid logo-dark mb-2" src="{{ asset('storage/logo.webp') }}" alt="Logo">
            </a>
            <div class="text-center">
                @if (session('status'))
                    <span class="alert alert-success">{{ session('status') ?? ''}} </span>
                @endif
            </div>
            <div class="loginbox">
                <div class="login-right">
                    <div class="login-right-wrap">
                        <h1>@lang('Forgot Password?')</h1>
                        <p class="account-subtitle">@lang('Enter your email to get a password reset link')</p>
                        <form action="{{ route('password.update') }}" method="post">
                            @csrf
                            <!-- Password Reset Token -->
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">

                            <div class="form-group">
                                <label for="email" class="form-control-label">@lang('Email Address')</label>
                                <input  type="email" name="email" class="form-control" :value="old('email', $request->email)" required>
                            </div>
                            <div class="form-group">
                                <label for="password" :value="__('Password')" class="form-control-label">@lang('Password')</label>
                                <input type="password" name="password"  class="form-control" required autocomplete="current-password">
                            </div>
                            <div class="form-group">
                                <label for="password_confirmation" :value="__('Confirm Password')" class="form-control-label">@lang('Password Confirmation')</label>
                                <input type="password" name="password_confirmation"  class="form-control" required autocomplete="current-password">
                            </div>
                            <div class="form-group mb-0">
                                <button class="btn btn-lg btn-block btn-primary w-100" type="submit">@lang('Reset Password')</button>
                            </div>
                        </form>
                        <div class="text-center dont-have">@lang('Remember your password?') <a href="{{ route('login') }}">@lang('Login')</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="{{ asset('assets/js/jquery-3.6.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/script.js') }}" type="text/javascript"></script>
</body>
</html>
