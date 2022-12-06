@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-sm-12">
            <div class="card card-table">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">@lang('Running Orders')</h3>
                        </div>
                        <div class="col-auto">
                            <a href="{{ route('admin.orders.export.running') }}" class="btn btn-outline-primary"> Export</a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-center table-hover datatable">
                            <thead class="thead-light">
                            <tr>
                                <th>@lang('Service Name')</th>
                                <th>@lang('Price')</th>
                                <th>@lang('Name')</th>
                                <th>@lang('Email')</th>
                                <th>@lang('Phone')</th>
                                <th>@lang('Address')</th>
                                <th>@lang('Created')</th>
                                <th>@lang('Status')</th>
                                <th class="text-right">@lang('Actions')</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($orders as $order)
                                <tr>
                                    <td>{{ $order->service->name }}</td>
                                    <td>{{ $order->service_price }}</td>
                                    <td>{{ $order->name }}</td>
                                    <td>{{ $order->email }}</td>
                                    <td>{{ $order->phone }}</td>
                                    <td>{{ $order->address }}</td>
                                    <td>{{ $order->created_at->diffForHumans() }}</td>
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
                                        <a href="{{ route('admin.order.running.update', $order->id) }}" class="btn btn-sm btn-white text-success me-2">@lang('Closed')</a>
                                        <a href="{{ route('admin.order.print', $order->id) }}" class="btn btn-sm btn-white text-danger me-2">@lang('Print')</a>
                                        <a href="{{ route('admin.order.pdf', $order->id) }}" class="btn btn-sm btn-white text-danger me-2">@lang('PDF')</a>
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
