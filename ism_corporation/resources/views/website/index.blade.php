@extends('website.layouts.app')
@section('mainwebsite')
    <!-- slider area start -->
    <div class="hero-area">
        <div class="hero-slider-active swiper">
            <div class="swiper-wrapper">
                @foreach ($sliders as $slider)
                <div class="swiper-slide">
                    <div class="intro-section height-100vh slider-content-center bg-img single-animation-wrap slider-bg-color-1 overly-style-1 opacity-point-4" style="background-image:url({{asset('assets/dynamics/slider/'.$slider->banner_image)}})">
                        <div class="container hover_plx">
                            <div class="hero-content-1 slider-animated-1 text-center layer" data-depth="-0.7">
                                <h1 class="title animated">{{$slider->title}}</h1>
                                <a href="{{route('home.vision')}}" class="btn btn-primary btn-hover-dark animated">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                
            </div>
            <div class="home-slider-prev main-slider-nav"><i class="fa fa-angle-left"></i></div>
            <div class="home-slider-next main-slider-nav"><i class="fa fa-angle-right"></i></div>
        </div>
    </div>
    <!-- slider area end -->
    <!-- About area Start -->
    <div class="section section-padding">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-7">
                    <div class="about-content">
                        <h2 class="title">{{$about->title}}</h2>
                        {!! $about->description !!}
                        <a href="{{route('home.who-we-are')}}" class="btn btn-dark btn-hover-primary">LEARN MORE</a>
                    </div>
                </div>
                <div class="col-lg-5">
                    <div class="about-banner">
                        <img src="{{asset('assets/dynamics/slider/'.$about->image)}}" alt="about">
                    </div>
                </div>
            </div>
        </div>
        <div class="our-vision">
            <div class="container">
                <div class="working-away-wrap">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="working-away">
                                <div class="working-away-icon">
                                    <i class="dlicon ui-1_home-51"></i>
                                </div>
                                <div class="working-content">
                                    <h3 class="title">Our Objective</h3>
                                    {!! $vision->object_description !!}
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="working-away">
                                <div class="working-away-icon">
                                    <i class="dlicon design_measure-big"></i>
                                </div>
                                <div class="working-content">
                                    <h3 class="title">Our Vision</h3>
                                    {!! $vision->vision_description !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- About area END -->
    <!-- Funfact area START -->
    <div class="section section-padding bg-img overly-style-1 opacity-point-7" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->achieve_back)}})">
        <div class="container">
            <div class="row row-cols-lg-4 row-cols-md-2 row-cols-sm-2 row-cols-1 mb-n6">
                <div class="col mb-8">
                    <div class="funfact-2 text-center">
                        <span class=" count-style-2" >{{$achievement->projact_worked}}</span>
                        <h4 class="title">{{$achievement->projact_worked_text}}</h4>
                    </div>
                </div>
                <div class="col mb-8">
                    <div class="funfact-2 text-center">
                       <span class=" count-style-2" >{{$achievement->expert_worker}}</span>
                        <h4 class="title">{{$achievement->expert_worker_text}}</h4>
                    </div>
                </div>
                <div class="col mb-8">
                    <div class="funfact-2 text-center">
                        <span class=" count-style-2" data-count-to="">{{$achievement->happy_client}}</span>
                        <h4 class="title">{{$achievement->happy_client_text}}</h4>
                    </div>
                </div>
                <div class="col mb-8">
                    <div class="funfact-2 text-center">
                       <span class=" count-style-2" data-count-to="">{{$achievement->upcoming_project}}</span>
                        <h4 class="title">{{$achievement->upcoming_project_text}}</h4>
                    </div>
                </div>
                  <div class="col mb-8">
                    <div class="funfact-2 text-center">
                        <span class=" count-style-2" data-count-to="">{{$achievement->text_05_text_report}}</span>
                        <h4 class="title">{{$achievement->text_05_text}}</h4>
                    </div>
                </div>
                <div class="col mb-8">
                    <div class="funfact-2 text-center">
                         <span class=" count-style-2" data-count-to="">{{$achievement->text_06_text_report}}</span>
                        <h4 class="title">{{$achievement->text_06_text}}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Funfact area END -->
    <!--OUR PRODUCTS START-->
    <div class="section section-padding ">
        <div class="container">
            <div class="section-title text-center mb-lg-9 mb-md-7 mb-5">
                <h2 class="title">Our <span>PRODUCTS</span></h2>
                <p>{{$site_setting->product_title}}</p>
            </div>
            <div class="row row-cols-lg-3 row-cols-md-2 row-cols-sm-2 row-cols-1 mb-n6">
                @foreach ($otc_product as $product)
                <div class="col mb-6">
                    <div class="service text-center">
                        <img src="{{asset('assets/dynamics/product/'.$product->back_image)}}" alt="banner">
                        <div class="service-content-wrap">
                            <div class="service-content">
                                <div class="service-icon">
                                   {!! $product->icon !!}
                                </div>
                                <h3 class="title"><a href="{{route('home.otc')}}">{{$product->name}}</a></h3>
                                {!! \Illuminate\Support\Str::words($product->description, 30, '...') !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
                @foreach ($ethicals as $product)
                <div class="col mb-6">
                    <div class="service text-center">
                        <img src="{{asset('assets/dynamics/product/'.$product->back_image)}}" alt="banner">
                        <div class="service-content-wrap">
                            <div class="service-content">
                                <div class="service-icon">
                                   {!! $product->icon !!}
                                </div>
                                <h3 class="title"><a href="{{route('home.ethical')}}">{{$product->name}}</a></h3>
                                {!! \Illuminate\Support\Str::words($product->description, 30, '...') !!}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!--PRODUCTS END-->
    <!--OUR TEAM START-->
    <div class="section section-padding">
        <div class="container">
            <div class="section-title text-center">
                <h2 class="title">Our <span>Team</span></h2>
                <p>{{$site_setting->team_title}}</p>
            </div>
            <div class="row  pt-5">
                @foreach ($teams as $team)
                 <div class="mb-6 col-lg-4 col-sm-12">
                    <div class="team-wrap">
                        <div class="team-top mb-4">
                            <a href="{{route('home.management')}}"><img src="{{asset('assets/dynamics/ourcompany/'.$team->image)}}" alt="team"></a>
                            <div class="team-top-content">
                                <a href="{{route('home.management')}}"><h4 class="name">{{$team->name}}</h4></a>
                            </div>
                        </div>
                        <div class="team-bottom">
                            <div class="team-bottom-content">
                                <a href="{{route('home.management')}}"><h4 class="name">{{$team->name}}</h4></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
    <!--OUR TEAM END-->
@endsection