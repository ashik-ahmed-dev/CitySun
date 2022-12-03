@extends('layouts.app')
@section('content')

    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2"></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $service->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>


    <!--posts section start-->
    <div class="module ptb-100">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <!-- Post-->
                    <article class="post pr-5">
                        <div class="post-preview">
                            <a href="#">
                                <img src="{{ asset(get_path($service->thumbnail)) }}" alt="" />
                            </a>
                        </div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h2 class="post-title">{{ $service->name }}</h2>
                                @if ($service->discount_price == NULL)
                                    <strong class="badge badge-success float-right">৳ {{ $service->price }}</strong>
                                @else
                                    <del class="badge badge-danger float-right ml-1">৳{{ $service->price }}</del>
                                    <strong class="badge badge-success float-right">৳ {{ $service->discount_price }}</strong>
                                @endif
                                <ul class="post-meta">
                                    <li>{{ $service->created_at->format('d F, Y') }}</li>
                                    <li>{{ $service->category->name }}</li>
                                </ul>
                            </div>
                            <div class="post-content">
                                <p>{!! $service->description !!}</p>
                            </div>
                        </div>
                    </article>
                    <!-- Post end-->
                </div>

                <div class="col-lg-4">
                    <div class="order-form">
                        <h4>@lang('Ready to get started?')</h4>
                        <form action="{{ route('order.store') }}" method="POST" class="contact-us-form">
                            @csrf
                            <input type="hidden" name="service_id" class="form-control" value="{{ $service->id }}"/>
                            @if ($service->discount_price == NULL)
                                <input type="hidden" name="service_price" class="form-control" value="{{ $service->price }}"/>
                            @else
                                <input type="hidden" name="service_price" class="form-control" value="{{ $service->discount_price }}"/>
                            @endif

                            <div class="form-row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Payment Method <span class="text-danger">*</span></label>
                                        <select name="type" class="form-control select type"  >
                                            <option value="cash" selected>@lang('cash on delivery')</option>
                                            <option value="bkash">@lang('Bkash Payment')</option>
                                            <option value="nagad">@lang('Nagad Payment')</option>
                                        </select>
                                    </div>
                                    <div class="form-group mb-3 d-none ru">
                                        <div class="payment-info pb-4 p2-4">
                                            <span>Send Money allows you to transfer money from your bKash Account to another bKash Account. To send money:</span><br>
                                            <strong class="text-danger">Bkash Personal: 019000000000</strong><br>
                                            <strong class="text-danger">Nagad Personal: 019000000000</strong>
                                        </div>
                                        <label for="payment_number" class="form-label">Payment Number <span class="text-danger">*</span></label>
                                        <input type="text" name="payment_number" class="form-control" placeholder="Payment Number"/>
                                    </div>
                                    <div class="form-group mb-3 d-none ru">
                                        <label for="TrxID" class="form-label">Transaction ID <span class="text-danger">*</span></label>
                                        <input type="text" name="TrxID" class="form-control" placeholder="Transaction ID"/>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Enter Phone <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="phone" placeholder="Enter Phone" required="required">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Enter Address <span class="text-danger">*</span></label>
                                        <textarea name="address" class="form-control" placeholder="Enter address" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="name">Enter Note <small>Optional</small></label>
                                        <textarea name="note" class="form-control" placeholder="Note"></textarea>
                                    </div>
                                </div>
                                @guest
                                    <a href="javascript:void(0);" class="btn btn-brand-02" onclick="toastr.error('You need to login first.',{closeButton: true,progressBar: true,})">@lang('Submit Order')</a>
                                @else
                                    <div class="col-sm-12 mt-3">
                                        <button type="submit" class="btn btn-brand-02" id="btnContactUs">@lang('Submit Order')</button>
                                    </div>
                                @endguest
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--posts section end-->

    <script>
        'use strict';
        (function ($) {
            $('.type').on("change", function () {
                if ($(this).val() == 'bkash') {
                    $('.ru').removeClass('d-none')
                    $('.ru').find('input[name=payment_number]').attr('disabled', false)
                } else if ($(this).val() == 'nagad') {
                    $('.ru').removeClass('d-none')
                    $('.ru').find('input[name=payment_number]').attr('disabled', false)
                }else {
                    $('.ru').addClass('d-none')
                    $('.ru').find('input[name=payment_number]').attr('disabled', true)
                }
            })
        })(jQuery);
    </script>

@endsection
