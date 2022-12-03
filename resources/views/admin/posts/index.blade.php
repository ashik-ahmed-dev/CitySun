@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card card-table">
                <div class="card-header">
                    <a href="{{ route('admin.posts.create') }}" class="btn btn-primary float-end">@lang('New Post')</a>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable">
                            <thead class="thead-light">
                            <tr>
                                <th>{{__('Icon')}}</th>
                                <th>{{__('name')}}</th>
                                <th>{{__('Created')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($posts as $post)
                                <tr>
                                    <td class="table-avatar">
                                        <img class="avatar-img" src="{{ asset(get_path($post->image)) }}" alt="User Image" height="64px">
                                    </td>
                                    <td>{{ $post->title }}</td>
                                    <td>{{ $post->created_at->format('d F, Y') }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.posts.edit', $post->id) }}" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                        <a href="{{ route('admin.posts.delete', $post->id) }}" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
