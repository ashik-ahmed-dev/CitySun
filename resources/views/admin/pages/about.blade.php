@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('About us')</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.web-setting.about.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="form-group mb-3">
                                <label for="about" class="form-label">@lang('About us')</label>
                                <textarea class="form-control editor" name="about_text" placeholder="Enter description">{!! settings('about_text') !!}</textarea>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">@lang('update')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->

@endsection
