@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('name')</th>
                                <th>@lang('email')</th>
                                <th>@lang('subject')</th>
                                <th>@lang('message')</th>
                                <th>@lang('Created')</th>
                                <th>@lang('Status')</th>
                                <th class="text-right">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($pending as $contact)
                                <tr>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ $contact->subject }}</td>
                                    <td>{{ short_text($contact->message) }}</td>
                                    <td>{{ diffForHumans($contact->created_at) }}</td>
                                    <td><span class="badge badge-pill bg-warning-light">@lang('Pending')</span></td>
                                    <td class="text-right">
                                        <a href="{{ route('admin.contact.edit', $contact->id) }}" class="btn btn-sm btn-white text-success me-2"><i class="lar la-edit"></i>@lang('View')</a>
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
