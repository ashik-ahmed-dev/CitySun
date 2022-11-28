@extends('admin.layouts.app')
@section('content')
    @php
        $slider = json_decode(settings('slider'), true);
    @endphp

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('Update Slider')</h4>
                </div>
                <div class="card-body p-4">
                    <div class="row">
                        <div class="col-lg-8">
                            <form action="{{ route('admin.slider.update') }}" method="post" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="form-group mb-3">
                                        <label for="title" class="form-label">@lang('Title')</label>
                                        <input type="text" name="title" class="form-control" value="{{ $slider['title'] }}" placeholder="Enter title">
                                        @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="subtitle" class="form-label">@lang('sub title')</label>
                                        <input type="text" name="subtitle" class="form-control" value="{{ $slider['subtitle'] }}" placeholder="Enter sub title">
                                        @error('subtitle')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <label for="image" class="form-label">@lang('Images 750x750')</label>
                                        <input type="file" name="image" class="form-control">
                                        @error('image')<span class="text-danger">{{ $message }}</span>@enderror
                                    </div>
                                    <div class="d-flex flex-wrap gap-2">
                                        <button type="submit" class="btn btn-primary waves-effect waves-light">@lang('Update')</button>
                                    </div>
                                </div>
                            </form>
                        </div>

                        <div class="col-lg-4">
                            <div class="card flex-fill bg-white">
                                <img alt="Card Image" src="{{ asset(get_path('slider.png')) }}" class="card-img-top">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
