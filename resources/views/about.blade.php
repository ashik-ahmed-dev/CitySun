@extends('layouts.app')
@section('content')

    <section class="breadcrumb-area d-flex align-items-center mb-5">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Breamcrumb Content -->
                    <div class="breadcrumb-content text-center">
                        <ol class="breadcrumb d-flex justify-content-center">
                            <li class="breadcrumb-item"><a class="text-uppercase" href="{{ url('/') }}">@lang('Home')</a></li>
                            <li class="breadcrumb-item active">@lang('About us')</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-area bg-gray pt-5 pb-5">
        <div class="container">
            <div class="row">
                <p>{!! settings('about_text') !!}</p>
            </div>
        </div>
    </section>

@endsection
