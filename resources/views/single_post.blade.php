@extends('layouts.app')
@section('content')

    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2"></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">{{ $post->title }}</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>


    <!--posts section start-->
    <div class="module ptb-100">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <!-- Post-->
                    <article class="post pr-5">
                        <div class="post-preview">
                            <a href="#">
                                <img src="{{ asset(get_path($post->image)) }}" alt="" />
                            </a>
                        </div>
                        <div class="post-wrapper">
                            <div class="post-header">
                                <h2 class="post-title">{{ $post->title }}</h2>
                            </div>
                            <div class="post-content">
                                <p>{!! $post->description !!}</p>
                            </div>
                        </div>
                    </article>
                    <!-- Post end-->
                </div>

            </div>
        </div>
    </div>
    <!--posts section end-->

@endsection
