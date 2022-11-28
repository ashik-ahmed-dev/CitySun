@extends('layouts.app')
@section('content')
    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2"></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $category->name }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!--blog section start-->
    <section class="our-blog-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                @if($services->count()>0)
                    @foreach($services as $service)
                <div class="col-md-6 col-lg-4">
                    <div class="single-blog-card card gray-light-bg border-0 shadow-sm my-3">
                        <div class="blog-img position-relative">
                            <img src="{{ asset($service->thumbnail) }}" class="card-img-top" alt="blog">
                        </div>
                        <div class="card-body">
                            <h3 class="h5 mb-2 card-title"><a href="{{ route('service_detail', $service->slug) }}">{{ $service->name }}</a></h3>
                            <p class="card-text">{!! $service->short_text !!}</p>
                            <a href="{{ route('service_detail', $service->slug) }}" class="detail-link">@lang('Read more') <span class="ti-arrow-right"></span></a>

                            @if ($service->discount_price == NULL)
                                <strong class="float-right">৳ {{ $service->price }}</strong>
                            @else
                                <del class="float-right text-danger ml-1">৳{{ $service->price }}</del>
                                <strong class="float-right">৳ {{ $service->discount_price }}</strong>
                            @endif
                        </div>
                    </div>
                </div>
                    @endforeach
                @else
                    <strong>no service</strong>
                @endif
            </div>

            <!--pagination start-->
            <div class="row">
                <div class="col-md-12">
                    {{ $services->links('include.pagination') }}
                </div>
            </div>
            <!--pagination end-->
        </div>
    </section>
    <!--blog section end-->

@endsection
