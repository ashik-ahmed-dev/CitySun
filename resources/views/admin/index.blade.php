@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-1">
                        <i class="las la-user-tag"></i>
                        </span>
                        <div class="dash-count">
                            <div class="dash-title">@lang('All Users')</div>
                            <div class="dash-counts">
                                <p>{{ \App\Models\User::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-2">
                            <i class="lar la-comments"></i>
                        </span>
                        <div class="dash-count">
                            <div class="dash-title">@lang('All Services')</div>
                            <div class="dash-counts">
                                <p>{{ \App\Models\Service::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-3">
                            <i class="las la-at"></i>
                        </span>
                        <div class="dash-count">
                            <div class="dash-title">@lang('Contact')</div>
                            <div class="dash-counts">
                                <p>{{ \App\Models\Contact::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 col-12">
            <div class="card">
                <div class="card-body">
                    <div class="dash-widget-header">
                        <span class="dash-widget-icon bg-4">
                            <i class="las la-exclamation-circle"></i>
                        </span>
                        <div class="dash-count">
                            <div class="dash-title">@lang('Testimonial')</div>
                            <div class="dash-counts">
                                <p>{{ \App\Models\Testimonial::count() }}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">@lang('Pending Order')</h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.order.pending') }}" class="btn-right btn btn-sm btn-outline-primary">@lang('View All')</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-stripped table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Phone')</th>
                                <th>@lang('Address')</th>
                                <th>@lang('Status')</th>
                                <th class="text-right">@lang('Action')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @php
                                $orders = \App\Models\Order::pending()->latest()->limit(10)->get();
                            @endphp
                            @if($orders->count()>0)
                                @foreach($orders as $order)
                                    <tr>
                                        <td>{{ $order->name }}</td>
                                        <td>{{ $order->email }}</td>
                                        <td>{{ $order->phone }}</td>
                                        <td>{{ $order->address }}</td>
                                        <td>
                                            @if($order->status == 'Approved')
                                                <span class="badge badge-pill bg-success-light">@lang('Approved')</span>
                                            @elseif($order->status == 'Running')
                                                <span class="badge badge-pill bg-success-light">@lang('Running')</span>
                                            @elseif($order->status == 'Closed')
                                                <span class="badge badge-pill bg-success-light">@lang('Closed')</span>
                                            @elseif($order->status == 'Rejected')
                                                <span class="badge badge-pill bg-danger-light">@lang('Rejected')</span>
                                            @else
                                                <span class="badge badge-pill bg-warning-light">@lang('Pending')</span>
                                            @endif
                                        </td>
                                        <td class="text-right">
                                            <a href="{{ route('admin.order.edit', $order->id) }}" class="btn btn-sm btn-white text-success me-2">@lang('View')</a>
                                        </td>
                                    </tr>
                                @endforeach
                            @else
                                <strong>no comment</strong>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col">
                            <h5 class="card-title">@lang('Recent Contact') </h5>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.contact') }}" class="btn-right btn btn-sm btn-outline-primary">@lang('View All')</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @php
                        $contact = \App\Models\Contact::latest()->limit(10)->get();
                    @endphp
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Subject')</th>
                                <th>@lang('Message')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @if($contact->count()>0)
                                @foreach($contact as $list)
                                    <tr>
                                        <td>{{ $list->name }}</td>
                                        <td>{{ $list->email }}</td>
                                        <td>{{ $list->subject }}</td>
                                        <td>{{ $list->message }}</td>
                                    </tr>
                                @endforeach
                            @else
                                <strong>No Contact</strong>
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
