@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('Create Post')</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.posts.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8 col-md-8">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">@lang('Title')</label>
                                    <input type="text" name="title" class="form-control" value="{{ old('title') }}" placeholder="Enter title">
                                </div>
                            </div>

                            <div class="col-lg-4 col-md-4">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">@lang('Images')</label>
                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">@lang('Meta title')</label>
                                    <input type="text" name="meta_title" class="form-control" value="{{ old('meta_title') }}" placeholder="Enter title">
                                </div>

                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">@lang('Meta Description')</label>
                                    <textarea name="meta_description" class="form-control"></textarea>
                                </div>

                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">@lang('Description')</label>
                                    <textarea class="form-control editor" name="description" placeholder="Enter description"></textarea>
                                </div>
                            </div>

                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">@lang('Submit')</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
