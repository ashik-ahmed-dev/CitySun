@extends('admin.layouts.app')
@section('content')

    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="row align-items-center">
                        <div class="col">
                            <h3 class="page-title">@lang('Orders Details')</h3>
                        </div>
                    </div>
                </div>
                <div class="card-body p-4">
                    <form action="{{ route('admin.order.update', $order->id) }}" method="post">
                        @csrf
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">@lang('Name')</label>
                                    <input type="text" name="name" class="form-control" value="{{ $order->name }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">@lang('email')</label>
                                    <input type="email" name="email" class="form-control" value="{{ $order->email }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">@lang('Phone')</label>
                                    <input type="text" name="phone" class="form-control" value="{{ $order->phone }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="address" class="form-label">@lang('Address')</label>
                                    <input type="text" name="address" class="form-control" value="{{ $order->address }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="note" class="form-label">@lang('Note')</label>
                                    <textarea name="note" class="form-control">{!! $order->note !!}</textarea>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">@lang('Price')</label>
                                    <input type="text" name="service_price" class="form-control" value="{{ $order->service_price }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="type" class="form-label">@lang('Payment Method')</label>
                                    <input type="text" name="type" class="form-control" value="{{ $order->type }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="payment_number" class="form-label">@lang('Payment Number')</label>
                                    <input type="text" name="payment_number" class="form-control" value="{{ $order->payment_number }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="TrxID" class="form-label">@lang('Payment TrxID')</label>
                                    <input type="text" name="TrxID" class="form-control" value="{{ $order->TrxID }}">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="status" class="form-label">@lang('Status')</label>
                                    <input type="text" name="TrxID" class="form-control" value="{{ $order->status }}">
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- end col -->
    </div>
    <!-- end row -->
@endsection
