@extends('layouts.app')
@section('content')

    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2"></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('Profile')</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="user-profile">
        <div class="container-xl">
            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="profile-tab">
                                <div class="custom-tab-1">
                                    <ul class="nav nav-tabs">
                                        <li class="nav-item"><a href="#my-orders" data-bs-toggle="tab" class="nav-link show active">@lang('My Orders')</a></li>
                                        <li class="nav-item"><a href="#profile-settings" data-bs-toggle="tab" class="nav-link">@lang('Manage Profile')</a></li>
                                        <li class="nav-item"><a href="{{ route('logout') }}" class="nav-link">@lang('Logout')</a></li>
                                    </ul>
                                    <div class="tab-content pt-4">
                                        <div id="my-orders" class="tab-pane fade active show">
                                            <div class="col-xl-12">
                                                <div class="table-responsive">
                                                    <table class="table table-center table-hover datatable">
                                                        <thead class="thead-light">
                                                        <tr>
                                                            <th>@lang('Images')</th>
                                                            <th>@lang('Service')</th>
                                                            <th>@lang('Price')</th>
                                                            <th>@lang('Created')</th>
                                                            <th>@lang('Status')</th>
                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        @foreach($order as $list)
                                                            <tr>
                                                                <td><img src="{{ asset(get_path($list->service->thumbnail)) }}" alt="User Image" style="height: 40px; width: auto"></td>
                                                                <td>{{ $list->service->name }}</td>
                                                                <td>{{ $list->service_price }}</td>
                                                                <td>{{ $list->created_at->format('d F, Y') }}</td>
                                                                <td>
                                                                    @if($list->status == 'Approved')
                                                                        <span class="badge badge-success">@lang('Approved')</span>
                                                                    @elseif($list->status == 'Running')
                                                                        <span class="badge badge-success">@lang('Running')</span>
                                                                    @elseif($list->status == 'Closed')
                                                                        <span class="badge badge-success">@lang('Closed')</span>
                                                                    @elseif($list->status == 'Rejected')
                                                                        <span class="badge badge-success">@lang('Rejected')</span>
                                                                    @else
                                                                        <span class="badge badge-success">@lang('Pending')</span>
                                                                    @endif
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="profile-settings" class="tab-pane fade">
                                            <div class="settings-form">
                                                <div class="row">
                                                    <div class="col-md-8">
                                                        <form method="post" action="{{ route('profile.update',$user->id ) }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="row">
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <label for="username" class="form-label">@lang('Username')</label>
                                                                        <input type="text" name="username" class="form-control" value="{{ $user->username }}" placeholder="Enter username">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <label for="name" class="form-label">@lang('Name')</label>
                                                                        <input type="text" name="name" class="form-control" value="{{ $user->name }}" placeholder="Enter name">
                                                                    </div>
                                                                </div>
                                                                <div class="col-lg-12">
                                                                    <div class="form-group mb-3">
                                                                        <label for="username" class="form-label">@lang('Email')</label>
                                                                        <input type="email" name="email" class="form-control" value="{{ $user->email }}" placeholder="Enter email">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-outline-brand-01 align-items-center">@lang('Save Changes')</button>
                                                            </div>
                                                        </form>
                                                    </div>

                                                    <div class="col-md-4">
                                                        <form method="post" action="{{ route('change.password') }}" enctype="multipart/form-data">
                                                            @csrf
                                                            <div class="form-group mb-3">
                                                                <label class="form-label">@lang('Old Password')</label>
                                                                <input type="password" name="oldpassword" class="form-control" placeholder="Old Password">
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="form-label">@lang('New Password')</label>
                                                                <input type="password" name="password" class="form-control" placeholder="New Password" >
                                                            </div>
                                                            <div class="form-group mb-3">
                                                                <label class="form-label">@lang('Confirm Password')</label>
                                                                <input type="password" name="password_confirmation" class="form-control" placeholder="Confirm Password" >
                                                            </div>
                                                            <div class="form-group">
                                                                <button type="submit" class="btn btn-outline-brand-01 align-items-center">@lang('Change Password')</button>
                                                            </div>
                                                        </form>
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
            </div>
        </div>
    </section>



@endsection
