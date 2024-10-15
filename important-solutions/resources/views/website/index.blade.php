@extends('website.layouts.app')
@section('mainwebsite')
<div class="th-hero-wrapper hero-2" id="hero">
  <div class="swiper th-slider" id="heroSlider2" data-slider-options='{"effect":"fade"}'>
    <div class="swiper-wrapper">
      @foreach ($sliders as $slider)
       <div class="swiper-slide" data-bg-src="{{asset('assets/dynamics/slider/'.$slider->banner_image)}}" data-overlay="black" data-opacity="9">
        <div class="hero-inner">
          <div class="container">
              <div class="row justify-content-center">
                <div class="col-md-7">
                  <div class="hero-style2 text-center">
              <span class="sub-title" data-ani="slideinup" data-ani-delay="0.2s">{{$slider->title}}</span>
              <h1 class="hero-title">
                <span class="title1" data-ani="slideinup" data-ani-delay="0.4s">{{$slider->heading}}</span>
              </h1>
              <div class="btn-group" data-ani="slideinup" data-ani-delay="0.7s">
                <a href="{{route('home.contact')}}" class="th-btn style3">GET START <div class="icon">
                    <i class="fa-solid fa-arrow-up-right ms-3"></i>
                  </div>
                </a>
                <div class="arrow">
                  <img src="{{asset('assets/img/hero_arrow.svg')}}" alt="Icon">
                </div>
              </div>
            </div>
                </div><!--col-md-6-->
              </div><!--row-->
          </div>
        
        </div>
      </div>
      @endforeach
      
       
    </div>
    <div class="slider-pagination"></div>
  </div>
   
</div>
<div class="overflow-hidden space-top space-bottom" id="about-sec">
  <div class="container">
    <div class="row align-items-center justify-content-center">
      <div class="col-xl-6 mb-50 mb-xl-0 d-none">
        <div class="img-box2 text-center">
          <div class="shape1">
            <img src="assets/img/about_shape2_1.png" alt="About">
          </div>
          <div class="img1">
            <img src="assets/img/about-us-1.png" alt="About">
            <div class="year-counter bg-title" data-bg-src="assets/img/normal/about_shape2_2.png">
              <div class="year-counter_number">
                <span class="counter-number"> 7</span>
              </div>
              <p class="year-counter_text">Year Of Experience</p>
            </div>
          </div>
         <!--  <div class="img2">
            <img src="assets/img/about-us-2.png" alt="Image">
          </div>
           -->
        </div>
      </div>
      <div class="col-xl-10">
        <div class="title-area mb-32 text-center">
          <span class="sub-title">
            ABOUT OUR COMPANY  
          </span>
          <h2 class="sec-title">{{$about->title}}</h2>
        {!! $about->description !!}
        </div>
        
        <div class="btn-wrap mt-50 text-center">
          <a href="{{route('home.about-us')}}" class="th-btn">Read More <div class="icon">
              <i class="fa-solid fa-arrow-up-right ms-3"></i>
            </div>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>

<div class="counter-image" data-bg-src="{{asset('assets/dynamics/setting/'.$site_setting->experience_image)}}">
  <div class="container">
    <div class="counter-card-wrap">
      <div class="counter-card">
        <div class="box-icon">
          <img src="{{asset('assets/dynamics/slider/'.$about->experince_image)}}" alt="Icon">
        </div>
        <div class="media-body">
          <h2 class="box-number">
            <span class="counter-number"> {{$about->experince}}</span>+
          </h2>
          <p class="box-text">Years Of Experience</p>
        </div>
      </div>
<!--      <div class="divider"></div>
      <div class="counter-card">
        <div class="box-icon">
          <img src="{{asset('assets/dynamics/slider/'.$about->service_image)}}" alt="Icon">
        </div>
        <div class="media-body">
          <h2 class="box-number">
            <span class="counter-number">{{$about->service}}</span>+
          </h2>
          <p class="box-text">Total Services</p>
        </div>
      </div>-->
      <div class="divider"></div>
      
    </div>
  </div>
</div>
<section class="space" >
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 text-center">
        
          <h2 class="sec-title">Our Services</h2>
        </div>
      </div>
    
    <div class="row justify-content-center">
      @foreach ($services as $service)
      <div class="col-xl-4 col-md-6">
        <div class="service-card3">
          <div class="box-content">
            <div class="service-card-icon"><img src="{{asset('assets/dynamics/service/'.$service->service_icon)}}" alt="Icon"></div>
            <h3 class="box-title"><a href="{{route('home.services')}}">{{$service->service_name}}</a></h3>
          </div>
        </div>
      </div>
      @endforeach
    </div>

    <div class="btn-wrap mt-50 text-center">
          <a href="{{route('home.services')}}" class="th-btn">View More <div class="icon">
              <i class="fa-solid fa-arrow-up-right ms-3"></i>
            </div>
          </a>
        </div>
    </div>
  </div>
</section>
 
 
<section class="overflow-hidden space" id="blog-sec">
   <div class="container">
     <div class="row justify-content-lg-between align-items-end">
       <div class="col-md-auto">
         <div class="title-area">
           
           <h2 class="sec-title">Get Update Blog & News</h2>
         </div>
       </div>
       <div class="col-md-auto">
         <div class="sec-btn d-lg-block d-none">
           <div class="icon-box">
             <button data-slider-prev="#blogSlider3" class="slider-arrow default">
               <i class="far fa-arrow-left"></i>
             </button>
             <button data-slider-next="#blogSlider3" class="slider-arrow default">
               <i class="far fa-arrow-right"></i>
             </button>
           </div>
         </div>
       </div>
     </div>
     <div class="slider-area">
       <div class="swiper th-slider has-shadow" id="blogSlider3" data-slider-options='{"breakpoints":{"0":{"slidesPerView":1},"576":{"slidesPerView":"1"},"768":{"slidesPerView":"2"},"992":{"slidesPerView":"2"},"1200":{"slidesPerView":"3"}}}'>
         <div class="swiper-wrapper">
             @php
          use Carbon\Carbon;
         @endphp
      @foreach ($blog_details as $blog)
      @if(!empty($blog->blog_image))
           <div class="swiper-slide">
             <div class="blog-card style3">
               <div class="blog-img">
                 <a href="{{route('home.blog-details',$blog->slug)}}">
                   <img src="{{asset('assets/dynamics/blog/'.$blog->blog_image)}}" alt="blog image">
                 </a>
               </div>
               <div class="blog-content">
                 <div class="blog-meta">
                   <a href="{{route('home.blog-details',$blog->slug)}}p">
                     <i class="fa-light fa-calendar-days"></i>{{ Carbon::parse($blog->blog_date)->format('d F Y') }} </a>
                 </div>
                 <h3 class="box-title">
                   <a href="{{route('home.blog-details',$blog->slug)}}">{{$blog->title}}</a>
                 </h3>
                {{$blog->short_description}}
                <a href="{{route('home.blog-details',$blog->slug)}}" class="link-btn style2">
                   <i class="fas fa-plus-circle me-1"></i>Read More </a>
               </div>
             </div>
           </div>
      @else
       <div class="swiper-slide">
             <div class="blog-card style3">
               
               <div class="blog-content">
                 <div class="blog-meta">
                   <a href="{{route('home.blog-details',$blog->slug)}}p">
                     <i class="fa-light fa-calendar-days"></i>{{ Carbon::parse($blog->blog_date)->format('d F Y') }} </a>
                 </div>
                 <h3 class="box-title">
                   <a href="{{route('home.blog-details',$blog->slug)}}">{{$blog->title}}</a>
                 </h3>
                {{$blog->short_description}}
                <a href="{{route('home.blog-details',$blog->slug)}}" class="link-btn style2">
                   <i class="fas fa-plus-circle me-1"></i>Read More </a>
               </div>
             </div>
           </div>
      @endif
      @endforeach
<!--           <div class="swiper-slide">
             <div class="blog-card style3">
               <div class="blog-img">
                 <a href="blogs.php">
                   <img src="assets/img/blog-1.png" alt="blog image">
                 </a>
               </div>
               <div class="blog-content">
                 <div class="blog-meta">
                   <a href="blogs.php">
                     <i class="fa-light fa-calendar-days"></i>12 April 2024 </a>
                 </div>
                 <h3 class="box-title">
                   <a href="blogs.php">Title Comes Here</a>
                 </h3>
                 <p class="blog-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                 <a href="blogs.php" class="link-btn style2">
                   <i class="fas fa-plus-circle me-1"></i>Read More </a>
               </div>
             </div>
           </div>-->
<!--           <div class="swiper-slide">
             <div class="blog-card style3">
               <div class="blog-img">
                 <a href="blogs.php">
                   <img src="assets/img/blog-1.png" alt="blog image">
                 </a>
               </div>
               <div class="blog-content">
                 <div class="blog-meta">
                   <a href="blogs.php">
                     <i class="fa-light fa-calendar-days"></i>12 April 2024 </a>
                 </div>
                 <h3 class="box-title">
                   <a href="blogs.php">Title Comes Here</a>
                 </h3>
                 <p class="blog-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                 <a href="blogs.php" class="link-btn style2">
                   <i class="fas fa-plus-circle me-1"></i>Read More </a>
               </div>
             </div>
           </div>-->
<!--           <div class="swiper-slide">
             <div class="blog-card style3">
               <div class="blog-img">
                 <a href="blogs.php">
                   <img src="assets/img/blog-1.png" alt="blog image">
                 </a>
               </div>
               <div class="blog-content">
                 <div class="blog-meta">
                   <a href="blogs.php">
                     <i class="fa-light fa-calendar-days"></i>12 April 2024 </a>
                 </div>
                 <h3 class="box-title">
                   <a href="blogs.php">Title Comes Here</a>
                 </h3>
                 <p class="blog-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                 <a href="blogs.php" class="link-btn style2">
                   <i class="fas fa-plus-circle me-1"></i>Read More </a>
               </div>
             </div>
           </div>-->
<!--           <div class="swiper-slide">
             <div class="blog-card style3">
               <div class="blog-img">
                 <a href="blogs.php">
                   <img src="assets/img/blog-2.png" alt="blog image">
                 </a>
               </div>
               <div class="blog-content">
                 <div class="blog-meta">
                   <a href="blogs.php">
                     <i class="fa-light fa-calendar-days"></i>12 April 2024 </a>
                 </div>
                 <h3 class="box-title">
                   <a href="blogs.php">Title Comes Here</a>
                 </h3>
                 <p class="blog-text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout.</p>
                 <a href="blogs.php" class="link-btn style2">
                   <i class="fas fa-plus-circle me-1"></i>Read More </a>
               </div>
             </div>
           </div>-->
            
         </div>
       </div>
     </div>
   </div>
 </section>


@endsection