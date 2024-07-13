@extends('template-web.layout')
@section('style')
    <style>
        .single-gallery {
            overflow: hidden;
            border-radius: 10px;
            /* Membuat gambar rounded */
        }

        .gallery-img {
            width: 100%;
            height: 0;
            padding-bottom: 75%;
            /* Membuat rasio aspek 4:3 */
            background-size: cover;
            background-position: center;
            border-radius: 10px;
            /* Membuat gambar rounded */
        }

        .section-padding30 {
            padding: 30px 0;
        }

        .section-tittle {
            margin-bottom: 30px;
        }

        .mb-100 {
            margin-bottom: 100px;
        }

        .mb-30 {
            margin-bottom: 30px;
        }
    </style>
@section('content')

    <!--? slider Area Start-->
    <div class="slider-area position-relative">
        <div class="slider-active">
            <!-- Single Slider -->
            <div class="single-slider slider-height d-flex align-items-center">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-7 col-lg-9 col-md-8 col-sm-9">
                            <div class="hero__caption">
                                <h1 class="cd-headline letters scale">Klinik Al Mafaz siap untuk
                                    <strong class="cd-words-wrapper">
                                        <b class="is-visible">Melayani</b>
                                        <b>Melayani</b>
                                    </strong>
                                </h1>
                                <p data-animation="fadeInLeft" data-delay="0.1s">Selamat datang di Klinik Kami, tempat kami
                                    memberikan layanan kesehatan yang penuh kasih dengan komitmen pada keunggulan. </p>
                                {{-- <a href="#" class="btn hero-btn" data-animation="fadeInLeft" data-delay="0.5s">Appointment <i class="ti-arrow-right"></i></a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- slider Area End-->
    <div class="department_area section-padding2">
        <div class="container">
            <!-- Section Tittle -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-tittle text-center">
                        <span>Layanan</span>
                        <h2>Layanan Klinik Al Mafaz</h2>
                    </div>
                </div>
            </div>
            @if ($layanans->isEmpty())
                <div class="alert alert-warning text-center" role="alert">
                    Tidak ada layanan tersedia.
                </div>
            @else
                <div class="row">
                    <div class="col-lg-12">
                        <div class="depart_ment_tab mb-5">
                            <!-- Tabs Buttons -->
                            <ul class="nav" id="myTab" role="tablist">
                                @foreach ($layanans as $index => $layanan)
                                    <li class="nav-item">
                                        <a aria-controls="home" aria-selected="{{ $index === 0 ? 'true' : 'false' }}"
                                            class="nav-link {{ $index === 0 ? 'active' : '' }}" data-toggle="tab"
                                            href="#content-{{ $index }}" id="tab-{{ $index }}" role="tab">
                                            <i class="fa-solid fa-hospital-user"></i>
                                            <h4>{{ $layanan->nama }}</h4>
                                        </a>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="dept_main_info white-bg">
                    <div class="tab-content" id="myTabContent">
                        @foreach ($layanans as $index => $layanan)
                            <div aria-labelledby="tab-{{ $index }}"
                                class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}"
                                id="content-{{ $index }}" role="tabpanel">
                                <!-- single_content  -->
                                <div class="row align-items-center no-gutters">
                                    <div class="col-lg-12">
                                        <div class="dept_info">
                                            <h3>{{ $layanan->nama }}</h3>
                                            <p>{{ $layanan->deskripsi }}</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
        </div>

    </div>
    <div class="row">
        <!-- Gallery Images -->
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="single-gallery mb-30">
                <div class="gallery-img" style="background-image: url({{ asset('env') }}/galeri/1.jpg);"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="single-gallery mb-30">
                <div class="gallery-img" style="background-image: url({{ asset('env') }}/galeri/2.jpg);"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="single-gallery mb-30">
                <div class="gallery-img" style="background-image: url({{ asset('env') }}/galeri/3.jpg);"></div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-12">
            <div class="single-gallery mb-30">
                <div class="gallery-img" style="background-image: url({{ asset('env') }}/galeri/4.jpg);"></div>
            </div>
        </div>
    </div>

    <!-- Gallery Area End -->
@endsection
