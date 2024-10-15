@extends('website.layouts.app')
@section('mainwebsite')
<div class="preloader">
    <div class="preloader-inner zoom-animation"><img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" alt="Karunya Developers"></div>
</div> 


    <section class="slider-video"> 
        <video autoplay muted loop id="myVideo">
            <source src="{{asset('assets/dynamics/'.$slider_video->video)}}" type="video/mp4">
        </video>
    <div class="th-hero-wrapper hero-10" id="hero">
        <div class="hero-slider-10 th-carousel" data-fade="true" data-slide-show="1" data-md-slide-show="1"
            data-dots="true" data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true">
            @foreach ($sliders as $slider)
            <div class="th-hero-slide">
                <div class="container z-index-common">
                    <div class="hero-style10">
                        <div class="row justify-content-center text-center">
                           <div class="col-md-7">
                       
                        <h1 class="hero-title" data-ani="slideinup" data-ani-delay="0.3s">{{$slider->title}}</h1>
                   
                        <p class="hero-text" data-ani="slideinup" data-ani-delay="0.6s">{{$slider->description}}</p>
                        <div class="btn-group" data-ani="slideinup" data-ani-delay="0.6s"><a href="{{route('website.about')}}"
                                class="th-btn style3">Learn More<i class="fas fa-long-arrow-right ms-2"></i></a></div>
                    </div>
                </div>
                </div>
                </div>
            </div>
            @endforeach
           
        </div>
    </div>
</section>





    <section class="expertise-sec" >
        <div class="container">
            <div class="feature-grid-wrap" data-aos="fade-up">
                <div class="feature-grid"  >
                    <div class="feature-grid_icon"><img src="{{asset('assets/images/feature_2_1.svg')}}" alt="icon"></div>
                    <div>
                        <h3 class="feature-grid_title">{{$home_extra->box_01_title}}</h3>
                        <p class="feature-grid_text">{{$home_extra->box_01_desc}}</p>
                    </div>
                </div>
                <div class="feature-grid" >
                    <div class="feature-grid_icon"><img src="{{asset('assets/images/feature_2_2.svg')}}" alt="icon"></div>
                    <div>
                        <h3 class="feature-grid_title">{{$home_extra->box_02_title}}</h3>
                        <p class="feature-grid_text">{{$home_extra->box_02_desc}}</p>
                    </div>
                </div>
                <div class="feature-grid">
                    <div class="feature-grid_icon"><img src="{{asset('assets/images/feature_2_3.svg')}}" alt="icon"></div>
                    <div>
                        <h3 class="feature-grid_title">{{$home_extra->box_03_title}}</h3>
                        <p class="feature-grid_text">{{$home_extra->box_03_desc}}</p>
                    </div>
                </div>
            </div>
            
    </section>


    <div class="space about-sec" >
        <div class="container">
            
            <div class="row">
                <div class="col-xl-6">
                    <div class="title-area mb-35 text-center text-xl-start" data-aos="fade-up"><span
                            class="sub-title6 justify-content-xl-start justify-content-center"><span
                                class="shape left d-xl-none"><span class="dots"></span></span> About Us <span
                                class="shape right"><span class="dots"></span></span></span>
                        <h2 class="sec-title">{{$about->title}}</h2>
                    </div>
                   {!! $about->description !!}
                    <div class="col-md-auto text-center text-md-start"><a class="th-btn" href="{{route('website.about')}}">
                        Read More <i class="fas fa-arrow-right ms-2"></i></a></div>
                </div>
                <div class="col-xl-6">
                    <div class="ps-xl-5 mt-40 mt-xl-0" data-aos="fade-up">
                        <div class="rounded-20 " data-aos="fade-up">
                            <img class="w-100" src="{{asset('assets/dynamics/'.$about->image)}}"
                            alt="Achive"></div>
                    </div>
                </div>
            </div>
           
        </div>
    </div>

    


    
    </div>
    
    <main>
    <section class="city-stuff">
        <ul class="skyscrappers__list">
          <li class="skyscrapper__item skyscrapper-1"></li>
          <li class="skyscrapper__item skyscrapper-2"></li>
          <li class="skyscrapper__item skyscrapper-3"></li>
          <li class="skyscrapper__item skyscrapper-4"></li>
          <li class="skyscrapper__item skyscrapper-5"></li>
        </ul>
        <ul class="tree__container">
          <li class="tree__list">
            <ul class="tree__item tree-1">
              <li class="tree__trunk"></li>
              <li class="tree__leaves"></li>
            </ul>
            <ul class="tree__item tree-2">
              <li class="tree__trunk"></li>
              <li class="tree__leaves"></li>
            </ul>
            <ul class="tree__item tree-3">
              <li class="tree__trunk"></li>
              <li class="tree__leaves"></li>
            </ul>  
            <ul class="tree__item tree-4">
              <li class="tree__trunk"></li>
              <li class="tree__leaves"></li>
            </ul>  
            <ul class="tree__item tree-5">
              <li class="tree__trunk"></li>
              <li class="tree__leaves"></li>
            </ul>  
            <ul class="tree__item tree-6">
              <li class="tree__trunk"></li>
              <li class="tree__leaves"></li>
            </ul>  
            <ul class="tree__item tree-7">
              <li class="tree__trunk"></li>
              <li class="tree__leaves"></li>
            </ul>  
            <ul class="tree__item tree-8">
              <li class="tree__trunk"></li>
              <li class="tree__leaves"></li>
            </ul>  
          </li>
        </ul>
        <ul class="crane__list crane-1">
          <li class="crane__item crane-cable crane-cable-1"></li>
          <li class="crane__item crane-cable crane-cable-2"></li>
          <li class="crane__item crane-cable crane-cable-3"></li>
          <li class="crane__item crane-stand"></li>
          <li class="crane__item crane-weight"></li>
          <li class="crane__item crane-cabin"></li>
          <li class="crane__item crane-arm"></li>
        </ul>
        <ul class="crane__list crane-2">
          <li class="crane__item crane-cable crane-cable-1"></li>
          <li class="crane__item crane-cable crane-cable-2"></li>
          <li class="crane__item crane-cable crane-cable-3"></li>
          <li class="crane__item crane-stand"></li>
          <li class="crane__item crane-weight"></li>
          <li class="crane__item crane-cabin"></li>
          <li class="crane__item crane-arm"></li>
        </ul>
        <ul class="crane__list crane-3">
          <li class="crane__item crane-cable crane-cable-1"></li>
          <li class="crane__item crane-cable crane-cable-2"></li>
          <li class="crane__item crane-cable crane-cable-3"></li>
          <li class="crane__item crane-stand"></li>
          <li class="crane__item crane-weight"></li>
          <li class="crane__item crane-cabin"></li>
          <li class="crane__item crane-arm"></li>
        </ul>
      </section>
      </main>


    <div class="counter-sec">
        <div class="container">
        <div class="row">
            <div class="col-md-3">
        <div class="achive-counter" data-aos="flip-up">
            <div class="achive-counter_icon"><img src="{{asset('assets/images/achive_1_1.svg')}}"
                    alt="icon"></div>
            <h3 class="achive-counter_number"><span class="counter-number">{{$achievement->complete_project}}</span>k+</h3>
            <p class="achive-counter_text">Complete Projects</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="achive-counter" data-aos="flip-up">
            <div class="achive-counter_icon"><img src="{{asset('assets/images/achive_1_2.svg')}}"
                    alt="icon"></div>
            <h3 class="achive-counter_number"><span class="counter-number">{{$achievement->active_on_client}}</span>k+</h3>
            <p class="achive-counter_text">Active On Clients</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="achive-counter" data-aos="flip-up">
            <div class="achive-counter_icon"><img src="{{asset('assets/images/achive_1_3.svg')}}"
                    alt="icon"></div>
            <h3 class="achive-counter_number"><span class="counter-number">{{$achievement->experience_team}}</span>k+</h3>
            <p class="achive-counter_text">Experience Team</p>
        </div>
    </div>
    <div class="col-md-3">
        <div class="achive-counter" data-aos="flip-up">
            <div class="achive-counter_icon"><img src="{{asset('assets/images/achive_1_4.svg')}}"
                    alt="icon"></div>
            <h3 class="achive-counter_number"><span class="counter-number">{{$achievement->winning_award}}</span>k+</h3>
            <p class="achive-counter_text">Winning Awards</p>
        </div>
        </div>
    </div>
</div>
    </div>

 <section class=" process-sec" data-overlay="title" data-opacity="9"
    data-bg-src="{{asset('assets/dynamics/'.$site_setting->howItWork_banner)}}">
    <div class="container mb-n2">
        <div class="title-area text-center" data-aos="fade-up"><span class="sub-title6  justify-content-center"><span
                    class="shape left"><span class="dots"></span></span> HOW WE WORK <span class="shape right"><span
                class="dots"></span></span></span>
        <h2 class="sec-title text-white">Our Work Process</h2>
        </div>
        <div class="row gy-40 justify-content-between">
            <div class="col-sm-6 col-lg-auto process-card2-wrap">
                <div class="process-card2" data-aos="fade-up">
                    <div class="process-card2_icon"><i class="fal fa-file-lines"></i></div>
                    <h2 class="process-card2_title">{{$howItWork->planning}}</h2>
                    <p class="process-card2_text">{{$howItWork->planning_desc}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-auto process-card2-wrap">
                <div class="process-card2" data-aos="fade-up">
                    <div class="process-card2_icon"><i class="fal fa-pen-ruler"></i></div>
                    <h2 class="process-card2_title">{{$howItWork->design}}</h2>
                    <p class="process-card2_text">
                        {{$howItWork->design_desc}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-auto process-card2-wrap">
                <div class="process-card2" data-aos="fade-up">
                    <div class="process-card2_icon"><i class="fal fa-user-helmet-safety"></i></div>
                    <h2 class="process-card2_title">{{$howItWork->construct}}</h2>
                    <p class="process-card2_text">{{$howItWork->construct_desc}}</p>
                </div>
            </div>
            <div class="col-sm-6 col-lg-auto process-card2-wrap">
                <div class="process-card2" data-aos="fade-up">
                    <div class="process-card2_icon"><i class="fal fa-shield-check"></i></div>
                    <h2 class="process-card2_title">{{$howItWork->finishing}}</h2>
                    <p class="process-card2_text">{{$howItWork->finishing_desc}}</p>
                </div>
            </div>
        </div>
    </div>
</section>




<div class="space">
    <div class="container">
        <div class="row flex-row-reverse">
            <div class="col-xl-7 ps-xxl-5">
                <div class="video-box1 " data-aos="fade-up">
                    <div class="img1"><img src="{{asset('assets/dynamics/'.$home_why_choose->side_image)}}" alt="video"></div>
                    <div class="text-end">
                        <div class="bg-shape bg-theme"></div>
                    </div>
                    
                </div>
            </div>
            <div class="col-xl-5">
                <div class="title-area mb-30" data-aos="fade-up"><span class="sub-title6">WHY CHOOSE US <span class="shape right"><span
                                class="dots"></span></span></span>
                    <h2 class="sec-title">{{$home_why_choose->title}}</h2>
                </div>
                     {!! $home_why_choose->description !!}
                <div class="mission-area">
                    <div class="tab-menu3 filter-menu-active">
                        <button data-filter=".cat1" class="active"
                            type="button">1</button> 
                            <button data-filter=".cat2" type="button">2</button>
                             <button
                            data-filter=".cat3" type="button">3</button>
                        </div>
                    <div class="mission-box-wrap filter-active-cat1" data-aos="fade-up">
                        <div class="filter-item cat1">
                            <div class="mission-box">
                                {!! $home_why_choose->mission_description !!}
                            </div>
                        </div>
                        <div class="filter-item cat2">
                            <div class="mission-box">
                                {!! $home_why_choose->vission_description !!}
                            </div>
                        </div>
                        <div class="filter-item cat3">
                            <div class="mission-box">
                                {!! $home_why_choose->value_description !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="shape-mockup d-none d-xl-block" data-bottom="-5%" data-right="0" data-aos="fade-up">
        <img
            src="{{asset('assets/images/why-choose-us-bg.jpg')}}" alt="shape"></div>
</div>



 <section class="project-area-5 overflow-hidden space" >
        <!-- <img src="assets/images/construction-img7.gif" class="anim-img1"> -->
        <div class="container">
            <div class="mb-30">
                <div class="row justify-content-between align-items-center">
                    <div class="col-md-auto">
                        <div class="title-area mb-md-0 text-center text-md-start" data-aos="fade-up"><span class="sub-title6">Our Projects <span class="shape right"><span
                            class="dots"></span></span>  </span>
                            <h2 class="sec-title fw-semibold">Our Latest Projects</h2>
                        </div>
                    </div>
                    <div class="col-md-auto text-center text-md-start"><a class="th-btn" href="{{route('website.project')}}">View All
                            Projects<i class="fas fa-arrow-right ms-2"></i></a></div>
                </div>
            </div>
        </div>
        <div class="container-fluid p-0">
            <div class="row th-carousel portfolio-slider4 gx-30" data-slide-show="3" data-ml-slide-show="3"
                data-lg-slide-show="1" data-md-slide-show="1" data-sm-slide-show="1" data-dots="true"
                data-xl-dots="true" data-ml-dots="true" data-lg-dots="true" data-md-dots="true" data-center-mode="true"
                data-xl-center-mode="true" data-ml-center-mode="true" data-arrows="false">
                @foreach ($projectDetails as $project)
                @php
                $images = json_decode($project->image, true);
                @endphp
                 <div class="col-lg-3">
                    <div class="project-card style5">
                        <div class="project-card-img"><img src="{{asset('assets/dynamics/'. $images[0])}}" alt="project image">
                        </div>
                        <div class="project-card-details-wrap">
                            <div class="project-card-details">
                                <h4 class="box-title"><a href="{{route('website.project-details',$project->slug)}}" tabindex="-1">{{$project->title}}</a></h4>
                                <p class="project-location"><i class="fa-regular fa-location-dot"></i>{{$project->location}}</p>
                            </div>
                            <div class="project-card-number">{{$project->priority}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </section>

    <section class="testi-area-5 bg-smoke " data-bg-src="{{asset('assets/dynamics/'.$site_setting->testimonial_banner)}}">
        <div class="container" data-aos="fade-up">
            <div class="title-area text-center">
                <span class="sub-title6 justify-content-center">
                    <span class="shape left"><span class="dots"></span></span> Testimonials 
                    <span class="shape right"><span class="dots"></span></span>
                </span>
                <h2 class="sec-title">What Our Clients Say?</h2>
            </div>
        </div>
        <div class="container">
            <div class="testi5-slider-wrap">
                <div class="testi5-thumb-indicator th-carousel row g-0" data-slide-show="5" data-md-slide-show="5"
                    data-sm-slide-show="3" data-center-mode="true" id="testiIndicator-1" data-asnavfor=".testi-slider5">
                    @foreach($testimonials as $testimonial)
                        <div class="testi5-thumb">
                            <img src="{{ asset('assets/dynamics/' . $testimonial->image) }}" alt="img">
                        </div>
                    @endforeach
                </div>
    
                <div class="row th-carousel arrow-style8 testi-slider5" data-slide-show="1" data-arrows="true" data-adaptive-height="true" data-asnavfor="#testiIndicator-1">
                    @foreach($testimonials as $testimonial)
                        <div class="col-lg-12">
                            <div class="testi-card style5">
                                <h3 class="testi-card_name">{{ $testimonial->name }}</h3>
                                <span class="testi-card_desig">{{ $testimonial->designation }}</span>
                               {!! $testimonial->description !!}
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    


    <section class="space bg-smoke" data-bg-src="{{asset('assets/img/bg/service_bg_2.png')}}" id="service-sec">
        <div class="container">
            <div class="title-area text-center" ><span class="sub-title sub-title6 justify-content-center" data-aos="fade-up"><span
                class="shape left"><span class="dots"></span></span> Blog<span class="shape right"><span
                    class="dots"></span></span></span>
                <h2 class="sec-title" data-aos="fade-up">Our Latest Blogs</h2>
            </div>
            <div class="row gy-4 justify-content-center">
                @foreach ($blogDetails as $blog)
                <div class="col-xl-6">
                    <div class="service-card style3">
                        <div class="service-card-thumb"><img src="{{asset('assets/dynamics/'.$blog->small_image)}}" alt="Icon">
                            
                        </div>
                        <div class="service-card-content">
                            <h3 class="box-title" data-bs-toggle="modal" data-bs-target="#serviceModal">{{{$blog->title}}}</h3>
                            
                                {!! \Illuminate\Support\Str::words($blog->description, 30, '....') !!}
                            
                            
                        <a class="link-btn style2" href="{{route('website.blog-details',$blog->slug)}}">Read More <i
                                    class="far fa-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center">
                <div class="details-more-wrap mt-40">
                    <p class="details-more-text bg-smoke">Interested in more insights and updates? <a class="link-btn"
                            href="{{route('website.blog')}}">Explore Our Blogs <i class="fas fa-arrow-right ms-1"></i></a></p>
                </div>
            </div>
        </div>
    </section>
   



         <!-- Modal -->
  <div class="modal fade disclaimer-popup" id="disclaimerModal" tabindex="-1" aria-labelledby="disclaimerModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable">
      <div class="modal-content modal-dialog-scrollable">
        <div class="modal-header">
          <h5 class="modal-title mx-auto" id="disclaimerModalLabel">Disclaimer</h5>
          <button type="button" class="btn-close close-btn" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          {!! $disclaimer->description !!}
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-custom" data-bs-dismiss="modal">I ACCEPT</button>
        </div>
      </div>
    </div>
  </div>
  
@endsection