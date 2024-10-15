@extends('Frontend.layouts.app')
@section('content')
<div class="preloader">
    <div class="preloader-inner">
        <div class="loader">
            <div class="rot"></div>
            <img src="{{asset('frontend/assets/images/footer-logo.png')}}" alt="Logo">
        </div>
    </div>
</div>
<div class="th-hero-wrapper hero-1" id="hero">
    <div class="swiper th-slider hero-slider-1" id="heroSlide1" data-slider-options='{"effect":"slide"}'>
        <div class="swiper-wrapper">
            @foreach ($sliders as $slider)    
            <div class="swiper-slide">
                <div class="hero-inner">
                    <div class="th-hero-bg" data-bg-src="{{asset('admin/serviceImage/'.$slider->banner_image)}}">
                        <img src="{{asset('frontend/assets/images/hero_overlay_1.png')}}" alt="Hero Image">
                        <div class="bubble"></div>
                    </div>
                    <div class="container">
                        <div class="hero-style1">
                            <span class="sub-title style1" data-ani="slideinup" data-ani-delay="0.5s">{{$slider->title}}</span>
                            <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.6s">{{$slider->heading}}</h1>
                            <p class="hero-text text-white" data-ani="slideinup" data-ani-delay="0.7s">
                                {{$slider->description}}                            </p>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.9s">
                                <a href="{{route('frontend.about')}}" class="th-btn style2" data-ani="slideinup" data-ani-delay="0.9s">Discover More</a>
                                <a href="{{route('frontend.service')}}" class="th-btn style5" data-ani="slideinup" data-ani-delay="0.9s">Our Services</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
    <div class="hero-animated-bubble">
        <img src="{{asset('frontend/assets/images/bubble_1.png')}}" alt="img">
        <img src="{{asset('frontend/assets/images/bubble_2.png')}}" alt="img">
        <img src="{{asset('frontend/assets/images/bubble_3.png')}}" alt="img">
        <img src="{{asset('frontend/assets/images/bubble_4.png')}}" alt="img">
        <img src="{{asset('frontend/assets/images/bubble_5.png')}}" alt="img">
        <img src="{{asset('frontend/assets/images/bubble_6.png')}}" alt="img">
        <img src="{{asset('frontend/assets/images/bubble_7.png')}}" alt="img">
        <img src="{{asset('frontend/assets/images/bubble_8.png')}}" alt="img">
    </div>
    <div class="icon-box">
        <button data-slider-prev="#heroSlide1" class="slider-arrow default"><i class="far fa-arrow-left"></i></button>
        <button data-slider-next="#heroSlide1" class="slider-arrow default"><i class="far fa-arrow-right"></i></button>
    </div>
</div>
<div class="about-sec overflow-hidden space-top" id="about-sec">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInLeft">
                <div class="img-box1" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="img1"><img src="{{asset('admin/aboutImage/'.$about->image)}}" alt="About"></div>
                    <div class="img2"><img src="{{asset('admin/aboutImage/'.$about->image_2)}}" alt="About"></div>
                    <div class="th-experience jump">
                        <h3 class="experience-year"><span class="counter-number">{{$about->year_of_exprience}}</span>+</h3>
                        <p class="experience-text">Years</p>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="ps-xl-4 wow fadeInRight" data-aos="fade-left" data-aos-duration="2000">
                    <div class="title-area mb-25">
                        <span class="sub-title style1">About Us</span>
                        <h2 class="sec-title mb-20">{{$about->title}}</span></h2>
                        {!! $about->short_description !!}
                    </div>
                    <div class="checklist list-two-column">
                        {!! $about->description !!}
                    </div>
                    <div class="btn-group mt-30 justify-content-start"><a href="{{route('frontend.about')}}" class="th-btn">More About Us</a></div>
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
                    <div class="feature-item_icon"><img src="{{asset('frontend/assets/images/feature_1_1.svg')}}" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">{{$about->title_1}}</h3>
                        <p class="feature-item_text">{{$about->short_description_1}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-item wow fadeInDown" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="feature-item_icon"><img src="{{asset('frontend/assets/images/feature_1_2.svg')}}" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">{{$about->title_2}}</h3>
                        <p class="feature-item_text">{{$about->short_description_2}}</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="feature-item wow fadeInUp" data-aos="zoom-in" data-aos-duration="1500">
                    <div class="feature-item_icon"><img src="{{asset('frontend/assets/images/feature_1_3.svg')}}" alt="icon"></div>
                    <div class="media-body">
                        <h3 class="box-title">{{$about->title_3}}</h3>
                        <p class="feature-item_text">{{$about->short_description_3}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<section class="bg-top-center space background-image arrow-wrap" style="background-image: url(&quot;assets/images/service_bg_1.jpg&quot;);">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="title-area text-center">
                    <span class="sub-title">Our Best Services</span>
                    <h2 class="sec-title text-center"> Our Best Laundry <span>Services For You!</span> </h2>
                </div>
            </div>
        </div>
        <div class="slider-area">
            <div
                class="swiper th-slider has-shadow"
                id="serviceSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'
                >
                <div class="swiper-wrapper">
                    @if($services->isNotEmpty())
                    @foreach ($services as $service)
                     <div class="swiper-slide">
                        <div class="service-item">
                            <div class="service-item_wrapper">
                                <div class="service-item_img">
                                    <img src="{{asset('admin/serviceImage/'.$service->image)}}" alt="img">
                                </div>
                            </div>
                            <div class="service-item_content" data-bg-src="{{asset('frontend/assets/images/service_shape.png')}}">
                                <h3 class="box-title">
                                    <a href="{{route('frontend.service')}}">{{$service->name}}</a>
                                </h3>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   @else
                   <h4 class="text-center">No Records Found</h4>
                   @endif
                </div>
            </div>
            <button data-slider-prev="#serviceSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
            <button data-slider-next="#serviceSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
</section>
<div class="overflow-hidden space-bottom">
    <div class="container">
        <div class="counter-card-wrap">
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">{{$achievement->dry_complete}}</span>M+</h2>
                    <p class="box-text">Laundry & Dry Complete</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">{{$achievement->dry_complete}}</span>K+</h2>
                    <p class="box-text">Garments in Circulation</p>
                </div>
            </div>
            <div class="divider"></div>
            <div class="counter-card">
                <div class="media-body">
                    <h2 class="box-number"><span class="counter-number">{{$achievement->dry_complete}}</span>M+</h2>
                    <p class="box-text">Satisfied Our Customer</p>
                </div>
            </div>
            <div class="divider"></div>
        </div>
    </div>
</div>
<div class="overflow-hidden space bg_gray">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 wow fadeInLeft">
                <div class="pe-xl-5 me-xl-5">
                    <div class="title-area mb-25">
                        <span class="sub-title style1">Why Choose Us</span>
                        <h2 class="sec-title mb-20"> <span>{{$whychoose->title}}</span></h2>
                    </div>
                </div>
                <div class="feature-box_wrapper" data-aos="zoom-in-left" data-aos-duration="1500">
                    <div class="feature-box">
                        <div class="feature-box_step">
                            <p class="box-number"><span class="step">Step</span> 01</p>
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">{{$whychoose->step_01_title}}</h3>
                            <p class="feature-box_text">{{$whychoose->step_01_desc}}</p>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="feature-box_step">
                            <p class="box-number"><span class="step">Step</span> 02</p>
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">{{$whychoose->step_02_title}}</h3>
                            <p class="feature-box_text">{{$whychoose->step_02_desc}}</p>
                        </div>
                    </div>
                    <div class="feature-box">
                        <div class="feature-box_step">
                            <p class="box-number"><span class="step">Step</span> 03</p>
                        </div>
                        <div class="media-body">
                            <h3 class="box-title">{{$whychoose->step_03_title}}</h3>
                            <p class="feature-box_text">{{$whychoose->step_03_desc}}</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-6">
                <div class="feature-image wow fadeInRight" data-aos="zoom-in-right" data-aos-duration="1500">
                    <img src="{{asset('admin/aboutImage/'.$whychoose->image)}}" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
<section class="overflow-hidden space-top space-bottom" id="process-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Work Process</span>
            <h2 class="sec-title">How We <span>Work It!</span></h2>
        </div>
        <div class="row gy-4 justify-content-center">
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="{{asset('admin/aboutImage/'.$howitwork->box_01_image)}}" alt="icon">
                        <div class="icon-shape"></div>
                    </div>
                    <p class="box-number">01</p>
                    <h3 class="box-title">{{$howitwork->box_01_title}}</h3>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="{{asset('admin/aboutImage/'.$howitwork->box_02_image)}}" alt="icon">
                        <div class="icon-shape"></div>
                    </div>
                    <p class="box-number">02</p>
                    <h3 class="box-title">{{$howitwork->box_02_title}}</h3>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="{{asset('admin/aboutImage/'.$howitwork->box_03_image)}}" alt="icon">
                        <div class="icon-shape"></div>
                    </div>
                    <p class="box-number">03</p>
                    <h3 class="box-title">{{$howitwork->box_03_title}}</h3>
                </div>
            </div>
            <div class="col-xl-3 col-md-6 process-box-wrap">
                <div class="process-box">
                    <div class="box-icon">
                        <img src="{{asset('admin/aboutImage/'.$howitwork->box_04_image)}}" alt="icon">
                        <div class="icon-shape"></div>
                    </div>
                    <p class="box-number">04</p>
                    <h3 class="box-title">{{$howitwork->box_04_title}}</h3>
                </div>
            </div>
        </div>
    </div>
</section>
<section class="overflow-hidden space space-bottom bg_gray" id="testi-sec">
    <div class="container">
        <div class="title-area text-center">
            <span class="sub-title">Testimonials</span>
            <h2 class="sec-title">Our Clients <span>Feedback</span></h2>
        </div>
        <div class="slider-area">
            <div
                class="swiper th-slider has-shadow"
                id="testiSlider1"
                data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'
                >
                <div class="swiper-wrapper">
                   @if($testimonials->isNotEmpty())
                        @foreach ($testimonials as $testi)
                            <div class="swiper-slide">
                                <div class="testi-box">
                                    <div class="testi-box_profile">
                                        <div class="testi-box_author">
                                            <img src="{{ asset('admin/serviceImage/'.$testi->image) }}" width="50" alt="">
                                        </div>
                                        <div class="testi-box_info">
                                            <h3 class="box-title">{{ $testi->name }}</h3>
                                            <span class="testi-box_desig">{{ $testi->designation }}</span>
                                        </div>
                                    </div>
                                    <p class="testi-box_text">{{ $testi->description }}</p>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <h5>No Records Found</h5>
                    @endif
                   </div>
            </div>
            <button data-slider-prev="#testiSlider1" class="slider-arrow slider-prev"><i class="far fa-arrow-left"></i></button>
            <button data-slider-next="#testiSlider1" class="slider-arrow slider-next"><i class="far fa-arrow-right"></i></button>
        </div>
    </div>
</section>

@endsection