@extends('theme.master')
@section('title', 'index')
@section('home-active', 'active')
@section('content')
    <main class="site-main">
        <!--================Hero Banner start =================-->
        <section class="mb-30px">
            <div class="container">
                <div class="hero-banner">
                    <div class="hero-banner__content">
                        <h3>Tours & Travels</h3>
                        <h1>Amazing Places on earth</h1>
                        <h4>December 12, 2018</h4>
                    </div>
                </div>
            </div>
        </section>
        <!--================Hero Banner end =================-->

        <!--================ Blog slider start =================-->
        @if (count($sliderBlogs) > 0)
            <section>
                <div class="container">
                    <div class="owl-carousel owl-theme blog-slider owl-loaded owl-drag">
                        @foreach ($sliderBlogs as $blog)
                            <div class="owl-stage-outer">
                                <div class="owl-stage"
                                    style="transform: translate3d(-2160px, 0px, 0px); transition: 1.5s; width: 3240px;">
                                    <div class="owl-item cloned" style="width: 240px; margin-right: 30px;">
                                        <div class="card blog__slide text-center">
                                            <div class="blog__slide__img">
                                                <img class="card-img rounded-0"
                                                    src="{{ asset("storage/blogs/$blog->image") }}" alt="">
                                            </div>
                                            <div class="blog__slide__content">
                                                <a class="blog__slide__label"
                                                    href="{{ route('theme.category', ['id' => $blog->category->id]) }}">{{ $blog->category->name }}</a>
                                                <h3><a href="#">{{ $blog->name }}</a>
                                                </h3>
                                                <p>{{ $blog->created_at->format('d M Y') }}</p>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        @endforeach
                        <div class="owl-nav"><button type="button" role="presentation" class="owl-prev">
                                <div class="blog-slider__leftArrow"><img
                                        src="{{ asset('assets') }}/img/home/left-arrow.png">
                                </div>
                            </button><button type="button" role="presentation" class="owl-next">
                                <div class="blog-slider__rightArrow"><img
                                        src="{{ asset('assets') }}/img/home/right-arrow.png"></div>
                            </button></div>
                        <div class="owl-dots disabled"></div>
                    </div>
                </div>
            </section>
        @endif
        <!--================ Blog slider end =================-->

        <!--================ Start Blog Post Area =================-->
        <section class="blog-post-area section-margin mt-4">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        @if (count($blogs) > 0)
                            @foreach ($blogs as $blog)
                                <div class="single-recent-blog-post">
                                    <div class="thumb">
                                        <img class="w-100 img-fluid" src="{{ asset("storage/blogs/$blog->image") }}"
                                            alt="">
                                        <ul class="thumb-info">
                                            <li><a href="#"><i class="ti-user"></i>{{ $blog->user->name }}</a></li>
                                            <li><a href="#"><i
                                                        class="ti-notepad"></i>{{ $blog->created_at->format('d M Y') }}</a>
                                            </li>
                                            <li><a href="#"><i class="ti-themify-favicon"></i>{{ count($blog->comments) }}</a></li>
                                        </ul>
                                    </div>
                                    <div class="details mt-20">
                                        <a href="{{ route('blogs.show',['blog'=>$blog]) }}">
                                            <h3>{{ $blog->title }}</h3>
                                        </a>
                                        <p>{{ $blog->description }}</p>
                                        <a class="button" href="{{ route('blogs.show', ['blog' => $blog]) }}">Read More
                                            <i class="ti-arrow-right"></i></a>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                        <div class="row">
                            <div class="col-lg-12">
                                {{ $blogs->render('pagination::bootstrap-4') }}
                            </div>
                        </div>
                    </div>
                    @include('theme.partial.sidebar')
                </div>
        </section>
        <!--================ End Blog Post Area =================-->
    </main>
@endsection
