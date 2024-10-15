@extends('website.layouts.app')
@section('mainwebsite')
 <div class="slider-area slider-layout1">
            <div class="bend niceties preview-1">
                <div id="ensign-nivoslider-4" class="slides">
                    @foreach ($sliders as $slider)
                    <img src="{{asset('assets/dynamics/'.$slider->image)}}" alt="slider" title="#{{$slider->id}}"  />
                    {{-- <img src="{{asset('assets/img/slider/slider-new-6.png')}}" alt="slider" title="#slider-direction-2" />
                    <img src="{{asset('assets/img/slider/slider-new-2.png')}}" alt="slider" title="#slider-direction-3" /> --}}
                    @endforeach
                </div>
                @foreach ($sliders as $slider)
                <div id="{{$slider->id}}" class="t-cn slider-direction">
                    <div class="slider-content s-tb slide-1">
                        <div class="text-left title-container s-tb-c">
                            <div class="container">
                                <div class="slider-sub-text">{{$slider->title}}</div>
                                <h1 class="slider-big-text">{{$slider->heading}}</h1>
                                <div class="slider-paragraph">{{$slider->description}}</div>
                                <div class="slider-btn-area">
                                    <a href="{{route('home.contact')}}" class="item-btn-fill">Get In Touch
                                        <i class="fas fa-angle-right"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>  
        </div>
        <!-- Slider Area End Here -->
        <!-- Why Choose Area Start Here -->
        <section class="why-choose-wrap-layout1">
            <div class="container">
                <div class="row">
                    <div class="col-lg-4">
                        <div class="why-choose-box-layout1">
                            <h3 class="item-title">{{$home_other->on_time_heading}}</h3>
                            <p>{{$home_other->on_time}}</p>
                            <div class="bg-icon"><i class="far fa-clock"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="why-choose-box-layout1">
                            <h3 class="item-title">{{$home_other->trusted_heading}}</h3>
                            <p>{{$home_other->trusted_cleaner}}</p>
                            <div class="bg-icon"><i class="fas fa-users"></i></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="why-choose-box-layout1">
                            <h3 class="item-title">{{$home_other->best_heading}}</h3>
                            <p>{{$home_other->best_quality}}</p>
                            <div class="bg-icon"><i class="far fa-hand-peace"></i></div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Why Choose Area End Here -->
        <!-- About Us Area Start Here -->
        <section class="section-padding-12">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="about-box-layout5">
                            <div class="item-img">
                                <img src="{{asset('assets/dynamics/'.$home_about->image)}}" alt="thumb">
                            </div>
                            <div class="popup-img">
                                <img src="{{asset('assets/dynamics/'.$home_about->image2)}}" alt="thumb">
                               
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="about-box-layout4 pl-lg-5">
                            <div class="tag-line">About Us</div>
                            <h2 class="item-title">{{$home_about->title}}<span>{{$home_about->heading}}</span></h2> 
                            {!! $home_about->description !!}
                            <div class="action-area">
                                <a href="{{route('home.about')}}" class="btn-fill-sm bg-accent btn-slide-hover text-primarytext">Read More<i class="fas fa-angle-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- About Us Area End Here -->
       
        <!-- Service Area Start Here -->
        <section class="section-padding-xl bg-common" >
            <div class="container">

                <div class="heading-layout3">
                      <div class="tag-line">Our Service</div>
                    <h2>{{$site_setting->service_heading}}</h2>
                    <p>{{$site_setting->service_title}}</p>
                </div>
                <div class="row">
                    @foreach ($services as $service)
                    <div class="col-xl-4 col-md-6 col-12">
                        <div class="service-box-layout2">
                            <div class="item-img services-section-image">
                                <img src="{{asset('assets/dynamics/'.$service->service_image_small)}}" alt="thumb">
                            </div>
                            <div class="item-content">
                                <div class="item-icon">
                                    <div class="icon-bg">
                                        <i class="flaticon-dishwasher"></i>
                                    </div>
                                </div>
                                <h3 class="item-title">{{$service->title}}</h3>
                                <div class="hover-content">
                                  {{ \Illuminate\Support\Str::words(strip_tags($service->description), 20, '...') }}

                                    <br>
                                    <a href="{{route('home.services-details',$service->slug)}}" class="btn-fill-xs bg-accent text-primarytext">Read More<i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   </div>
                 <div class="action-area">
                                <a href="{{route('home.services')}}" class="btn-fill-sm bg-accent btn-slide-hover text-primarytext">View More<i class="fas fa-angle-right"></i></a>
                            </div>
            </div>
        </section>
        <!-- Service Area End Here -->
        <!-- Banner Area Start Here -->
        <section class="banner-wrap-layout2 bg-common section-bubble-2" >
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="banner-box-layout4">
                            <h2 class="item-title text-Primary">{{$together->title}}</h2>
                            <a href="{{route('home.contact')}}" class="btn-fill-md bg-accent btn-slide-hover text-primarytext">Book an Appointment<i class="fas fa-angle-right"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-6 col-12">
                        <div class="banner-box-layout5">
                        <div class="item-icon shape1">
                                <img src="{{asset('assets/img/figure/icon-shape4.png')}}" alt="shape">
                            </div>
                            <div class="item-icon shape2">
                                <img src="{{asset('assets/img/figure/icon-shape3.png')}}" alt="shape">
                            </div>
                            <div class="item-icon shape3">
                                <img src="{{asset('assets/img/figure/icon-shape2.png')}}" alt="shape">
                            </div>
                            <div class="item-icon shape4">
                                <img src="{{asset('assets/img/figure/icon-shape1.png')}}" alt="shape">
                            </div>
                            <div class="item-img">
                                <img src="{{asset('assets/dynamics/'.$together->home_image)}}" alt="figure">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Banner Area End Here -->
        <!-- Process Area Start Here -->
        <section class="section-padding-lg-2">
            <div class="container">
                <div class="heading-layout1">
                    <h2>How It Works</h2>
                    <p>{{$site_setting->howit_title}}</p>
                </div>
                <div class="row">
                    <div class="col-lg-4 single-process">
                        <div class="process-box-layout1">
                            <div class="item-bg">
                                <img src="{{asset('assets/img/figure/bubble5.png')}}" alt="thumb">
                                <div class="item-icon">
                                    <img src="{{asset('assets/img/figure/book-now11.png')}}" alt="book-now" class="how-it-w">
                                     <!--<i class="far fa-calendar-check"></i>-->
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Book Online</h3>
                                <p>{{$howitwork->book_online}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 single-process">
                        <div class="process-box-layout1">
                            <div class="item-bg">
                                <img src="{{asset('assets/img/figure/bubble5.png')}}" alt="thumb">
                                <div class="item-icon">
                                       <img src="{{asset('assets/img/figure/verification1.png')}}" alt="book-now" class="how-it-w"> 
                                   <!-- <i class="far fa-envelope"></i>-->
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Get Confirmation</h3>
                                <p>{{$howitwork->get_confirmation}}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 single-process">
                        <div class="process-box-layout1">
                            <div class="item-bg">
                                <img src="{{asset('assets/img/figure/bubble5.png')}}" alt="thumb">
                                <div class="item-icon">
                                     <img src="{{asset('assets/img/figure/user1.png')}}" alt="book-now" class="how-it-w">
                                   <!-- <i class="far fa-smile"></i>-->
                                </div>
                            </div>
                            <div class="item-content">
                                <h3 class="item-title">Let’s Enjoy</h3>
                                <p>{{$howitwork->let_enjoy}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Process Area End Here -->
      
          <!-- Testimonial Area Start Here -->
          <section class="section-padding-12 bg-Primary bg-common" >
            <div class="container">
                <div class="heading-layout2 mg-b-30">
                    <h2 class="text-white">Client’s Say About Us</h2>
                </div>
                
                 <div class="rc-carousel nav-control-layout3" data-loop="true" data-items="10" data-margin="30"
                    data-autoplay="false" data-autoplay-timeout="3000" data-smart-speed="1000" data-dots="false"
                    data-nav="true" data-nav-speed="false" data-r-x-small="1" data-r-x-small-nav="true"
                    data-r-x-small-dots="false" data-r-x-medium="1" data-r-x-medium-nav="true" data-r-x-medium-dots="false"
                    data-r-small="1" data-r-small-nav="true" data-r-small-dots="false" data-r-medium="1"
                    data-r-medium-nav="true" data-r-medium-dots="false" data-r-large="1" data-r-large-nav="true"
                    data-r-large-dots="false" data-r-extra-large="1" data-r-extra-large-nav="true"
                    data-r-extra-large-dots="false">
                    @foreach ($testimonials as $testi)
                    <div class="testimonial-box-layout3">
                        <div class="item-author">
                            <img src="{{asset('assets/dynamics/'.$testi->image)}}" alt="author">
                        </div>
                       {!! $testi->description !!}
                        <h3 class="item-title">{{ $testi->name }}</h3>
                        <div class="item-subtitle">{{ $testi->management }}</div>
                        <ul class="item-rating">
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                            <li><i class="fas fa-star"></i></li>
                        </ul>
                        <div class="item-quote"><i class="fas fa-quote-right"></i></div>
                    </div>
                     @endforeach
                    
                </div>
               
            </div>
        </section>
        <!-- Testimonial Area End Here -->
        <!-- Progress Area Start Here -->

        <section class=" section-padding-rg" style="background-color: #A1D2E3;
    background-image: url({{asset('assets/dynamics/'.$achievement->image)}});
    background-position: top right;
    background-repeat: no-repeat;">
            <div class="container">
                <div class="row">
                    <div class="col-xl-6 col-lg-8 col-12">
                        <div class="progress-box-layout1">
                            <h2 class="item-title">{{$achievement->title}}</h2>
                            <div class="item-content">
                                <div class="row">
                                    <div class="col-sm-6 col-12">
                                        <div class="counter-item">
                                            <div class="counter count-number" data-num="{{$achievement->project_done}}">{{$achievement->project_done}}</div>
                                            <div class="count-title">Project Done</div>
                                            <div class="bg-icon"><i class="far fa-thumbs-up"></i></div>
                                        </div>
                                    </div>
                                    <div class="col-sm-6 col-12">
                                        <div class="counter-item">
                                            <div class="counter count-number" data-num="{{$achievement->happy_clients}}">{{$achievement->happy_clients}}</div>
                                            <div class="count-title">Happy Clients</div>
                                            <div class="bg-icon"><i class="far fa-smile"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    @endsection