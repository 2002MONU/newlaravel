@extends('Frontend.layouts.app')
@section('content')

<div class="breadcumb-wrapper background-image" style="background-image: url('{{ asset('frontend/assets/images/breadcumb-bg.jpg') }}');">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('frontend.index')}}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="about-sec overflow-hidden space-top" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInLeft">
                <div class="img-box1" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="img1"><img src="{{ asset('admin/aboutImage/'.$about->image) }}" alt="About"></div>
                    <div class="img2"><img src="{{ asset('admin/aboutImage/'.$about->image_2) }}" alt="About"></div>
                    <div class="th-experience jump">
                        <h3 class="experience-year"><span class="counter-number">{{ $about->year_of_exprience }}</span>+</h3>
                        <p class="experience-text">Years</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ps-xl-4 wow fadeInRight" data-aos="fade-left" data-aos-duration="2000">
                    <div class="title-area mb-25">
                        <span class="sub-title style1">About Us</span>
                        <h2 class="sec-title mb-20">{{ $about->title }}</h2>
                        <p class="about-desc">
                            {{ $about->short_description }}
                        </p>
                    </div>
                    <div class="checklist list-two-column">
                      {!! $about->description !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="overflow-hidden space" id="feature-area">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            <div class="col-md-6 col-lg-4">
                <div class="feature-item wow fadeInUp" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="feature-item_icon"><img src="{{ asset('frontend/assets/images/feature_1_1.svg') }}" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">{{ $about->title_1 }}</h3>
                        <p class="feature-item_text">{{ $about->short_description_1 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-item wow fadeInDown" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="feature-item_icon"><img src="{{ asset('frontend/assets/images/feature_1_2.svg') }}" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">{{ $about->title_2 }}</h3>
                        <p class="feature-item_text">{{ $about->short_description_2 }}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-item wow fadeInUp" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="feature-item_icon"><img src="{{ asset('frontend/assets/images/feature_1_3.svg') }}" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">{{ $about->title_3 }}</h3>
                        <p class="feature-item_text">{{ $about->short_description_3 }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection