@extends('layouts.app')
@section('content')

    <section class="page-header">
        <div class="container-xl">
            <div class="text-center">
                <h1 class="mt-0 mb-2"></h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb justify-content-center mb-0">
                        <li class="breadcrumb-item"><a href="{{ url('/') }}">@lang('Home')</a></li>
                        <li class="breadcrumb-item active" aria-current="page">@lang('Our Blog')</li>
                    </ol>
                </nav>
            </div>
        </div>
    </section>

    <!--posts section start-->
    <section class="our-blog-section pt-5 pb-5">
        <div class="container">
            <div class="row">
                @if($posts->count()>0)
                    @foreach($posts as $post)
                        <div class="col-md-6 col-lg-4">
                            <div class="single-blog-card card gray-light-bg border-0 shadow-sm my-3">
                                <div class="blog-img position-relative">
                                    <img src="{{ asset(get_path($post->image)) }}" class="card-img-top" alt="">
                                </div>
                                <div class="card-body">
                                    <h3 class="h5 mb-2 card-title"><a href="{{ route('single_post', $post->slug) }}">{{ $post->title }}</a></h3>
                                    <p class="card-text">{!! $post->meta_description !!}</p>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <strong>Not found!</strong>
                @endif
            </div>

            <!--pagination start-->
            <div class="row">
                <div class="col-md-12">
                    {{ $posts->links('include.pagination') }}
                </div>
            </div>
            <!--pagination end-->
        </div>
    </section>
    <!--posts section end-->

@endsection
