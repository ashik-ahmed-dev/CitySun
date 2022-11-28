@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-8">
            <div class="card card-table">
                <div class="card-header">
                    <h5 class="card-title">{{__('All Testimonial')}}</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable">
                            <thead class="thead-light">
                            <tr>
                                <th>{{__('Image')}}</th>
                                <th>{{__('name')}}</th>
                                <th>{{__('Position')}}</th>
                                <th>{{__('Actions')}}</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($testi as $row)
                                <tr>
                                    <td>
                                        <img src="{{ asset(get_path($row->photo_link)) }}" alt="{{ $row->name }}" width="40">
                                    </td>
                                    <td>{{ $row->name }}</td>
                                    <td>{{ $row->title }}</td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.testimonial.edit', $row->id) }}" class="btn btn-sm btn-white text-success mr-2"><i class="far fa-edit mr-1"></i> Edit</a>
                                        <a href="{{ route('admin.testimonial.delete', $row->id) }}" class="btn btn-sm btn-white text-danger mr-2"><i class="far fa-trash-alt mr-1"></i>Delete</a>
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
                    <h5 class="card-title">{{__('Add Testimonial')}}</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.testimonial.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" name="name" placeholder="name">
                            @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="name"></label>
                            <input type="text" class="form-control" name="title" placeholder="title">
                            @error('title')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="photo_link"></label>
                            <input type="file" class="form-control" name="photo_link">
                            @error('photo_link')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="form-group">
                            <label for="comments"></label>
                            <textarea name="comments" class="form-control" rows="8"></textarea>
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
    </div>

@endsection
