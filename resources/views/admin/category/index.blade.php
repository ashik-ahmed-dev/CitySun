@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-table">
                <div class="card-header">
                    <h5 class="card-title">{{__('Categories')}}</h5>
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
                            @foreach($categories as $category)
                                <tr>
                                    <td class="table-avatar">
                                        <img class="avatar-img" src="{{ asset(get_path($category->icon)) }}" alt="User Image" height="64px">
                                    </td>
                                    <td>{{ $category->name }}</td>
                                    <td>{{ $category->created_at->format('d F, Y') }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.category.edit', $category->id) }}" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                        <a href="{{ route('admin.category.delete', $category->id) }}" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{__('Add Category')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.category.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" name="name" placeholder="name">
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
