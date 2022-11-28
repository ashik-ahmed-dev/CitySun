@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('update')</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.contact.update', $contact->id) }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="name">@lang('name')</label>
                            <input type="text" class="form-control" name="name" value="{{ $contact->name }}">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="email">@lang('Email')</label>
                            <input type="text" class="form-control" name="email" value="{{ $contact->email }}">
                            @error('email')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="subject">@lang('Subject')</label>
                            <input type="text" class="form-control" name="subject" value="{{ $contact->subject }}">
                            @error('subject')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="message">@lang('Message')</label>
                            <textarea name="message" class="form-control">{!! $contact->message !!}</textarea>
                            @error('message')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="status">@lang('status')</label>
                            <select name="status" class="form-control"  >
                                <option value="Closed">@lang('Closed')</option>
                                <option value="Pending">@lang('Pending')</option>
                            </select>
                            @error('division_id')<span class="text-danger">{{ $message }}</span>@enderror
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
