@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('web Settings')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web-settings.update') }}" method="post">
                        @csrf
                        @php
                            $web_setting = json_decode(settings('websettings'), true);
                        @endphp
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('App title')</label>
                                    <input type="text" class="form-control" name="app_title" value="{{ $web_setting['app_title'] }}">
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Play Store URL')</label>
                                    <input type="text" class="form-control" name="play_store_url" value="{{ $web_setting['play_store_url'] }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('App Store URL')</label>
                                    <input type="text" class="form-control" name="app_store_url" value="{{ $web_setting['app_store_url'] }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Test title')</label>
                                    <input type="text" class="form-control" name="testi_title" value="{{ $web_setting['testi_title'] }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('App sub title')</label>
                                    <textarea class="form-control" rows="6" name="app_sub_title">{!! $web_setting['app_sub_title'] !!}</textarea>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label>@lang('Testi sub title')</label>
                                    <textarea class="form-control" rows="6" name="testi_subtitle">{!! $web_setting['testi_subtitle'] !!}</textarea>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Contact title')</label>
                                    <input type="text" class="form-control" name="contact_title" value="{{ $web_setting['contact_title'] }}">
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="form-group">
                                    <label>@lang('Contact sub title')</label>
                                    <textarea class="form-control" name="contact_subtitle">{!! $web_setting['contact_subtitle'] !!}</textarea>
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
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('Images Uploads')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.web-settings.image-upload') }}" method="post" enctype="multipart/form-data">
                        @csrf
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
                                        <img class="avatar-img" src="{{ asset('storage/images/about.webp') }}" alt="User Image">
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
                                        <img class="avatar-img" src="{{ asset('storage/images/featured.webp') }}" alt="User Image">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary btn-block">{{__('Submit')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
