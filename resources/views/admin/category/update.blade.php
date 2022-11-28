@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('Add Tags')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.update', $category->id) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" name="name" value="{{ $category->name }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="icon">@lang('Icon')</label>
                            <input type="file" class="form-control" name="icon">
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                            <button type="reset" class="btn btn-danger">{{__('Reset')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
