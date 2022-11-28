@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('Personal Information')</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.profile.update', $user->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">@lang('Name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="username" class="form-label">@lang('Username')</label>
                                    <input type="text" name="username" class="form-control" value="{{ $user->username }}" placeholder="Enter username">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">@lang('Email')</label>
                                    <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter email">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="image" class="col-form-label input-label">image</label>
                                    <input type="file" name="photo_path" class="form-control">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary btn-block">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('Change Password')</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.change.password') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">@lang('Old Password')</label>
                                    <input type="password" name="oldpassword" class="form-control" placeholder="password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">@lang('New Password')</label>
                                    <input type="password" name="password" class="form-control" placeholder="new password">
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="title" class="form-label">@lang('Confirm Password')</label>
                                    <input type="password" name="password_confirmation" class="form-control" placeholder="confirm password">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary btn-block">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endsection
