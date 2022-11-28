@extends('layouts.app')
@section('content')

    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2"></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('Terms of Service')</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <section class="contact-area bg-gray pt-5 pb-5">
        <div class="container">
            <div class="row">
                <p>{!! settings('terms') !!}</p>
            </div>
        </div>
    </section>

@endsection
