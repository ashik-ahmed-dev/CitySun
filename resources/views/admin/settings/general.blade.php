@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('Settings')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.setting.general.update') }}" method="post">
                        @csrf
                        @php
                            $general = json_decode(settings('general'), true);
                        @endphp
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Facebook')</label>
                                    <input type="text" class="form-control" name="facebook" value="{{ $general['facebook'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Twitter')</label>
                                    <input type="text" class="form-control" name="twitter" value="{{ $general['twitter'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Instagram')</label>
                                    <input type="text" class="form-control" name="instagram" value="{{ $general['instagram'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Youtube')</label>
                                    <input type="text" class="form-control" name="youtube" value="{{ $general['youtube'] ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Email')</label>
                                    <input type="email" class="form-control" name="email" value="{{ $general['email'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Phone')</label>
                                    <input type="text" class="form-control" name="phone" value="{{ $general['phone'] ?? '' }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Address')</label>
                                    <input type="text" class="form-control" name="address" value="{{ $general['address'] ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Site title')</label>
                                    <input type="text" class="form-control" name="site_title" value="{{ $general['site_title'] ?? '' }}">
                                </div>
                            </div>

                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Meta Description')</label>
                                    <textarea class="form-control" name="meta_description">{!! $general['meta_description'] ?? '' !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Newslatter Text')</label>
                                    <textarea class="form-control" name="newslatter_text">{!! $general['newslatter_text'] ?? '' !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Footer Text')</label>
                                    <textarea class="form-control" name="footer_text">{!! $general['footer_text'] ?? '' !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Analytics Code')</label>
                                    <textarea class="form-control" name="analytics_code">{!! $general['analytics_code'] ?? '' !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Verification Code')</label>
                                    <textarea class="form-control" name="verification">{!! $general['verification'] ?? '' !!}</textarea>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                            <button type="reset" class="btn btn-danger">{{__('Reset')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <form method="post" action="{{ route('admin.settings.image_update') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="logo">@lang('logo 250x100')</label>
                    <input type="file" class="form-control" name="logo">
                    <img src="{{ asset(get_path('logo.png')) }}" alt=""  style="height: 50px; width: auto">
                </div>
                <div class="form-group">
                    <label for="link_text">@lang('favicon 32x32')</label>
                    <input type="file" class="form-control" name="favicon">
                    <img src="{{ asset(get_path('favicon.png')) }}" alt="favicon" style="height: 50px; width: auto">
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('About 750x750')</label>
                            <input type="file" class="form-control" name="about">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="avatar avatar-lg">
                                <img class="avatar-img" src="{{ asset(get_path('about.png')) }}" alt="User Image">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label>@lang('Featured 750x500') </label>
                            <input type="file" class="form-control" name="featured">
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="avatar avatar-lg">
                                <img class="avatar-img" src="{{ asset(get_path('featured.png')) }}" alt="User Image">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="text-right">
                    <button type="submit" class="btn btn-block btn-primary">@lang('Submit')</button>
                </div>
            </form>
        </div>
    </div>

@endsection
