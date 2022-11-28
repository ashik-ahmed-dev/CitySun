@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">@lang('All service')</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('Thumbnail')</th>
                                <th>@lang('name')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Created at')</th>
                                <th class="text-right">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($services->count() > 0)
                                @foreach($services as $row)
                                    <tr>
                                        <td class="table-avatar">
                                            <img class="avatar-img" src="{{ asset($row->thumbnail) }}" alt="User Image" height="64px">
                                        </td>
                                        <td>{{ $row->name }}</td>
                                        <td>
                                            @if ($row->discount_price == NULL)
                                                <span class="price">BDT{{ $row->price }}</span>
                                            @else
                                                <span class="price">BDT{{ $row->discount_price }}</span>
                                                <del class="text-danger">${{ $row->price }}</del>
                                            @endif
                                        </td>
                                        <td>{{ $row->created_at->diffForHumans() }}</td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.service.edit', $row->id) }}" class="btn btn-sm btn-white text-success me-2"><i class="far fa-edit me-1"></i> @lang('Edit')</a>
                                            <a href="{{ route('admin.service.delete', $row->id) }}" class="btn btn-sm btn-white text-danger me-2"><i class="far fa-trash-alt me-1"></i>@lang('Delete')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <div>
                                    <h2>@lang('No category found')</h2>
                                </div>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
