@extends('template-web.layout')

@section('content')
<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Blog Details</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Hero End -->
<!--================Blog Area =================-->
<section class="blog_area single-post-area section-padding">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 posts-list">
                <div class="single-post">
                    <div class="feature-img">
                        <img class="img-fluid" src="{{ asset('berita/' . $berita->image) }}" alt="{{ $berita->title }}">
                    </div>
                    <div class="blog_details">
                        <h2 style="color: #2d2d2d;">{{ $berita->title }}</h2>
                        <ul class="blog-info-link mt-3 mb-4">
                            <li><a href="#"><i class="fa fa-calendar"></i>{{ \Carbon\Carbon::parse($berita->created_at)->format('M d, Y') }}</a></li>
                        </ul>
                        <p class="excert">
                            {{ $berita->deskripsi }}
                        </p>
                        <p>
                            {{ $berita->konten }}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="blog_right_sidebar">
                    <aside class="single_sidebar_widget popular_post_widget">
                        <h3 class="widget_title">Recent News</h3>
                        @foreach($beritas as $recent)
                        <div class="media post_item">
                            <img src="{{ asset('berita/' . $recent->image) }}" alt="{{ $recent->title }}" style="width: 80px; height: 80px;">
                            <div class="media-body">
                                <a href="{{ route('berita.show', $recent->id) }}">
                                    <h3>{{ $recent->title }}</h3>
                                </a>
                                <p>{{ \Carbon\Carbon::parse($recent->created_at)->format('M d, Y') }}</p>
                            </div>
                        </div>
                        @endforeach
                    </aside>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Blog Area -->
@endsection
