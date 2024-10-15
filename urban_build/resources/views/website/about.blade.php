@extends('website.layouts.app')
@section('website')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->about_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>
<div class="space bg-smoke overflow-hidden" id="about-sec">
<div class="container">
    <div class="row align-items-center">
        <div class="col-xl-6">
            <div class="img-box1">
                <div class="img1">
                    <img class="tilt-active" src="{{asset('assets/dynamics/'.$about->top_image)}}" alt="About">
                </div>
                <div class="about-grid">
                    <h3 class="about-grid_year">
                    <span class="counter-number">{{$about->experience}}</span>
                    <span>+</span>
                    </h3>
                    <p class="about-grid_text">Years Experiences Of Construction Company</p>
                </div>
                <div class="img2">
                    <img class="tilt-active" src="{{asset('assets/dynamics/'.$about->bottom_image)}}" alt="About">
                </div>
                <div class="shape-mockup about-shape1 jump" data-left="-67px" data-bottom="0">
                    <img src="{{asset('assets/img/normal/about_1_shape1.png')}}" alt="img">
                </div>
            </div>
        </div>
        <div class="col-xl-6">
            <div class="title-area mb-30">
                <span class="sub-title">
                <img src="{{asset('assets/images/subtitle-img.svg')}}" alt="img"> About Us Company</span>
                <h2 class="sec-title">{{$about->title}}</h2>
            </div>
            {!! $about->description !!}
            <div class="about-feature">
                <div class="about-feature_icon">
                    <img src="{{asset('assets/images/mission.png')}}" width="40" alt="icon">
                </div>
                <div>
                    <h3 class="about-feature_title">Our Mission</h3>
                    {!! $about->mission_description !!}               
                 </div>
            </div>
            <div class="about-feature">
                <div class="about-feature_icon">
                    <img src="{{asset('assets/images/vision.png')}}" width="40" alt="icon">
                </div>
                <div>
                    <h3 class="about-feature_title">Our Vision</h3>
                    {!! $about->vision_description !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection