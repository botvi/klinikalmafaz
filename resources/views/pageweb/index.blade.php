@extends('template-web.layout')

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
                            <p data-animation="fadeInLeft" data-delay="0.1s">Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi uquip ex ea commodo consequat is aute irure.</p>
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
                <div class="section-tittle text-center mb-100">
                    <span>Layanan</span>
                    <h2>Layanan Klinik Al Mafaz</h2>
                </div>
            </div>
        </div>
        @if($layanans->isEmpty())
            <div class="alert alert-warning text-center" role="alert">
                Tidak ada layanan tersedia.
            </div>
        @else
            <div class="row">
                <div class="col-lg-12">
                    <div class="depart_ment_tab mb-30">
                        <!-- Tabs Buttons -->
                        <ul class="nav" id="myTab" role="tablist">
                            @foreach($layanans as $index => $layanan)
                                <li class="nav-item">
                                    <a class="nav-link {{ $index === 0 ? 'active' : '' }}" id="tab-{{ $index }}" data-toggle="tab" href="#content-{{ $index }}" role="tab" aria-controls="home" aria-selected="{{ $index === 0 ? 'true' : 'false' }}">
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
                    @foreach($layanans as $index => $layanan)
                        <div class="tab-pane fade {{ $index === 0 ? 'show active' : '' }}" id="content-{{ $index }}" role="tabpanel" aria-labelledby="tab-{{ $index }}">
                            <!-- single_content  -->
                            <div class="row align-items-center no-gutters">
                                <div class="col-lg-12">
                                    <div class="dept_info">
                                        <h3>{{ $layanan->nama }}</h3>
                                        <p>{{ $layanan->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- single_content  -->
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</div>

 <!--? Gallery Area Start -->
 <div class="gallery-area section-padding30">
    <div class="container">
        <!-- Section Tittle -->
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="section-tittle text-center mb-100">
                    <span>Galeri</span>
                    <h2>Galeri Al Mafaz</h2>
                </div>
            </div>
        </div>
        <div class="row">
            <!-- Left -->
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url({{ asset('web') }}/assets/img/gallery/gallery1.png);"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url({{ asset('web') }}/assets/img/gallery/gallery2.png);"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url({{ asset('web') }}/assets/img/gallery/gallery3.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Right -->
            <div class="col-lg-6">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url({{ asset('web') }}/assets/img/gallery/gallery4.png);"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img small-img" style="background-image: url({{ asset('web') }}/assets/img/gallery/gallery5.png);"></div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <div class="single-gallery mb-30">
                            <div class="gallery-img big-img" style="background-image: url({{ asset('web') }}/assets/img/gallery/gallery6.png);"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Gallery Area End -->
@endsection