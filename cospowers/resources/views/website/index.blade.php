@extends('website.layouts.app')
@section('mainwebsite')

       <div class="slider-section">
            <video class="full-video" width="100%" autoplay loop muted>
                <source src="{{asset('assets/dynamics/'.$slider->banner_video)}}" type="video/mp4">
            </video>
        </div><!--slider-section-->
        <!-- about begin -->
        <div class="about-5">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-xl-7 col-lg-10 col-md-10">
                        <div class="part-text">
                            <h2>
                                <span class="special">
                                {{$home_about->title}}
                                </span>
                                {{$home_about->heading}}
                            </h2>
                            {!! $home_about->description !!}
                        </div>
                    </div>
                    @php
                        $images = json_decode($home_about->image, true);
                @endphp
                    <div class="col-xl-5 col-lg-5">
                        <div class="part-img">
                              <div class="case-slider owl-carousel owl-theme">
                            @foreach( $images as $image)
                            <div class="single-case-slider">
                                <img src="{{asset('assets/dynamics/slider/'.$image)}}" alt="about_image">
                                
                            </div>
                           @endforeach
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- about end -->


         <!-- choosing reason begin -->
        <div class="choosing-reason">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-8 col-md-10 d-xl-flex d-lg-flex d-block align-items-center">
                        <div class="part-text">
                            <h2>{{$whychoose->heading}}</span>
                              </h2>
                           
                            <p>{{$whychoose->title}}</p>
                        </div>
                    </div>
                    <div class="col-xl-6 col-lg-12">
                        <div class="part-reasons">
                            <div class="row this-row">
                                <div class="col-xl-6 col-lg-3" data-aos="zoom-out-up" data-aos-delay="100" data-aos-duration="600">
                                    <div class="single-feature">
                                        <h3>{{$whychoose->p1}}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-3" data-aos="zoom-out-up" data-aos-delay="100" data-aos-duration="700">
                                    <div class="single-feature">
                                        <h3>{{$whychoose->p2}}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-3" data-aos="zoom-out-up" data-aos-delay="100" data-aos-duration="800">
                                    <div class="single-feature">
                                       <h3>{{$whychoose->p3}}</h3>
                                    </div>
                                </div>
                                <div class="col-xl-6 col-lg-3" data-aos="zoom-out-up" data-aos-delay="100" data-aos-duration="900">
                                    <div class="single-feature">
                                       <h3>{{$whychoose->p4}}
</h3>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- choosing reason end -->


        <!-- statics begin -->
         <!-- statics begin -->
        <div class="statics">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-2 col-lg-2" data-aos="new-animation" data-aos-delay="100" data-aos-duration="500">
                        <div class="single-statics">
                            <span class="number"><span class="counter">{{$achievement->experience}}</span>+</span>
                            <span class="title">Years of Group Experience</span>
                            <div class="bg-icon">
                                <img src="{{asset('assets/img/svg/timetable.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2" data-aos="new-animation" data-aos-delay="100" data-aos-duration="1000">
                        <div class="single-statics">
                            <span class="number"><span class="counter">{{$achievement->after_sale}}</span>+</span>
                            <span class="title">After-sales Service Centers</span>
                            <div class="bg-icon">
                                <img src="{{asset('assets/img/svg/contract.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2" data-aos="new-animation" data-aos-delay="100" data-aos-duration="1500">
                        <div class="single-statics">
                            <span class="number"><span class="counter">{{$achievement->field_service}}</span>+</span>
                            <span class="title">Field-service Engineers</span>
                            <div class="bg-icon">
                                <img src="{{asset('assets/img/svg/trophy.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-2 col-lg-2" data-aos="new-animation" data-aos-delay="100" data-aos-duration="2000">
                        <div class="single-statics">
                            <span class="number"><span class="counter">{{$achievement->telecom_sites}}</span>+</span>
                            <span class="title">Telecom Sites Installed & Maintained</span>
                            <div class="bg-icon">
                                <img src="{{asset('assets/img/svg/happiness.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                      <div class="col-xl-2 col-lg-2" data-aos="new-animation" data-aos-delay="100" data-aos-duration="2000">
                        <div class="single-statics">
                            <span class="number"><span class="counter">{{$achievement->high_profile}}</span>+</span>
                            <span class="title">High-profile Clients</span>
                            <div class="bg-icon">
                                <img src="{{asset('assets/img/svg/happiness.svg')}}" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- statics end -->
         <!-- service begin -->
        <div class="service">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-6 col-lg-6 col-md-6">
                        <div class="section-title text-center">
                            <h2>Services  <span class="special"> We Provide</span>                      
                              </h2>
                          
                        </div>
                    </div>
                </div>

                <div class="row no-gutters this-row">
                    @foreach ($services as $service)
                     <div class="col-xl-3 col-lg-3 col-md-6">
                        <div class="single-servcie">
                            <h3 class="service-title">{{$service->title}}
                                <span class="bg-number">0{{$service->priority}}</span>
                            </h3>
                            {!! \Illuminate\Support\Str::words($service->description, 30, '...') !!}<br>
                           <a href="{{route('home.services-details',$service->slug)}}" class="service-details-button">Details <i class="fas fa-long-arrow-alt-right"></i></a>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
        <!-- service end -->


        <!-- project begin -->
        <div class="project project-1">
            <div class="container project-container">
                <div class="row justify-content-between">
                    <div class="col-xl-7 col-lg-12">
                        <div class="part-project">

                                <div class="project-slider owl-carousel owl-theme">
                                    @foreach ($products as $product)
                                    <div class="single-project">
                                        <div class="part-img">
                                            <img src="{{asset('assets/dynamics/'.$product->home_image)}}" alt="product">
                                            <div class="content-on-img">
                                                <h4>
                                                    <a href="{{route('home.product-details',$product->slug)}}">{{$product->title}}</a>
                                                </h4>
                                                
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                   
                                </div>

                        </div>
                    </div>
                    <div class="col-xl-5 col-lg-9 d-xl-flex d-lg-flex d-block align-items-center">
                        <div class="part-text">
                            <h3>{{$site_setting->product_heading}}</span>
                              </h3>
                           <p>{{$site_setting->product_title}}</p>

                            <div class="project-slider-button">
                                <a class="PrevBtn"><i class="fas fa-long-arrow-alt-left"></i></a>
                                <a class="NextBtn"><i class="fas fa-long-arrow-alt-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- project end -->
 

     <!-- blog begin -->
        <div class="blog">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-6">
                        <div class="section-title text-center">
                            <h2>Our <span class="special"> blog list and </span>             
                                latest news</h2>
                           
                        </div>
                    </div>
                </div>
                <div class="row">
                    @foreach ($news as $new)
                    <div class="col-xl-4 col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100" data-aos-duration="1000">
                        <div class="single-blog">
                            <div class="part-text">
                                <h3>
                                    <a href="{{route('home.news-details',$new->slug)}}">{{$new->title}}</a>
                                </h3>
                                {!! \Illuminate\Support\Str::words($new->description, 35, '...') !!}
                            </div>
                            <div class="part-img">
                                 <a href="{{route('home.news-details',$new->slug)}}">
                                <img src="{{asset('assets/dynamics/'.$new->image)}}" alt="news-image">
                            </a>
                            </div>
                            <div class="part-meta">
                                <ul>
                                    <li>
                                        <i class="fas fa-user"></i> {{$new->post_by}}
                                    </li>
                                    <li>
                                        <i class="far fa-calendar-alt"></i>  {{$new->updated_at->format('d.m.Y')}}
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach
                  
                </div>
            </div>
        </div>
        <!-- blog end -->
  
 
        <!-- testimonial begin -->
        <div class="testimonial">
            <div class="container">
                <div class="this-section-title">
                    <div class="row justify-content-between">
                        <div class="col-xl-6 col-lg-7 col-md-8">
                            <h2>What our customers say
                                    about us.</h2>
                        </div>
                        <div class="col-xl-5 col-lg-5 col-md-8 d-xl-flex d-lg-flex d-block align-items-center">
                            <p>{{$site_setting->testimonial_title}}</p>
                        </div>
                    </div>
                </div>
                <div class="testimonial-slider owl-carousel owl-theme">
                    @foreach ($testimonials as $testimo)
                    <div class="single-testimonial">
                        <div class="part-body">
                          
                            {!! $testimo->description !!}
                        </div>
                        <div class="part-user">
                            <div class="part-img">
                                <img src="{{asset('assets/dynamics/'.$testimo->image)}}" alt="image">
                            </div>
                            <div class="part-info">
                                <span class="name">{{$testimo->name}}</span>
                                <span class="position">{{$testimo->designation}}</span>
                            </div>
                        </div>
                    </div>
                    @endforeach
                   
                </div>
            </div>
        </div>
        <!-- testimonial end -->
 
   @endsection