@extends('template-web.layout')

@section('content')
<div class="slider-area2">
    <div class="slider-height2 d-flex align-items-center">
        <div class="container">
            <div class="row">
                <div class="col-xl-12">
                    <div class="hero-cap hero-cap2 text-center">
                        <h2>Berita</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog Area -->
<section class="blog_area section-padding">
    <div class="container">
        <div class="row">
            @foreach($beritas->chunk(2) as $chunk)
            @foreach($chunk as $berita)
            <div class="col-lg-6 mb-5 mb-lg-0">
                <div class="blog_left_sidebar">
                    <article class="blog_item shadow">
                        <div class="blog_item_img">
                            <img class="card-img rounded-0"  src="{{ asset('berita/'.$berita->image) }}"
                                alt="{{ $berita->title }}">
                            <a href="#" class="blog_item_date">
                                <h3>{{ \Carbon\Carbon::parse($berita->created_at)->format('d') }}</h3>
                                <p>{{ \Carbon\Carbon::parse($berita->created_at)->format('M') }}</p>
                            </a>
                        </div>
                        <div class="blog_details">
                            <a class="d-inline-block" href="{{ route('berita.show', $berita->id) }}">
                                <h2 class="blog-head" style="color: #2d2d2d;">{{ $berita->title }}</h2>
                            </a>
                            <p>{{ $berita->deskripsi }}</p>
                        </div>
                    </article>
                </div>
            </div>
            @endforeach
            @endforeach
        </div>
    </div>
</section>
<!-- End Blog Area -->
@endsection
