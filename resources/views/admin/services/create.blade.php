@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h4 class="card-title">@lang('Add Service')</h4>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.service.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">@lang('name')</label>
                                    <input type="text" name="name" class="form-control" placeholder="Enter title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">@lang('Description')</label>
                                    <textarea class="form-control editor" name="description" placeholder="Enter description"></textarea>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="form-group mb-3">
                                    <label for="description" class="form-label">@lang('Short Description')</label>
                                    <textarea class="form-control" name="short_text" placeholder="Enter description"></textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="category_id">{{__('Category:')}}</label>
                                    <select name="category_id" class="form-control select"  >
                                        <option value="" selected="" disabled="">{{__('Select Category')}}</option>
                                        @foreach($categories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="price" class="form-label">@lang('Price')</label>
                                    <input type="text" name="price" class="form-control" placeholder="Enter price">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="price" class="form-label">@lang('Discount Price')</label>
                                    <input type="text" name="discount_price" class="form-control" placeholder="Enter price">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="thumbnail">@lang('Thumbnail')</label>
                                    <input type="file" class="form-control" name="thumbnail">
                                </div>
                            </div>
                            <div class="d-flex flex-wrap gap-2">
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Primary</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
