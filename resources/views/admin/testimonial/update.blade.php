@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('Ad Create')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonial.update',$testi->id ) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" class="form-control" name="old_image" value="{{ $testi->photo_link }}">
                        <div class="form-group">
                            <label for="ad_link"></label>
                            <input type="text" class="form-control" name="name" value="{{ $testi->name }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="title"></label>
                            <input type="text" name="title" class="form-control" value="{{ $testi->title }}"/>
                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="photo_link"></label>
                            <input type="file" class="form-control" name="photo_link">
                            @error('photo_link')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="comments"></label>
                            <textarea class="form-control" name="comments">{!! $testi->comments !!}</textarea>
                            @error('comments')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="text-right">
                            <button type="submit" class="btn btn-primary">{{__('Submit')}}</button>
                            <button type="reset" class="btn btn-danger">{{__('Reset')}}</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6 d-flex">
            <div class="card flex-fill bg-white">
                <img src="{{ asset($testi->photo_link) }}" alt="Card Image" style="height: 100%;">
            </div>
        </div>
    </div>

@endsection
