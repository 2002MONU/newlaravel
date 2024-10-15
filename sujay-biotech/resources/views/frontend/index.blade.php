@extends('frontend.layout.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])

@section('content')

   <!-- banner start here -->
   <section class="banner">
            
    <div class="swiper swiper-scale-effect">
  <!-- Swiper -->
  <div class="swiper-container">
    <!-- Additional required wrapper -->
    <div class="swiper-wrapper">
        <!-- Slides -->
        @foreach ($banner as $data )
            
        <div class="swiper-slide">
             <img src="{{ asset('admin/bannerImage/'.$data->image) }}" alt="">
          </div>
        @endforeach


<!-- <div class="swiper-slide">
 <img src="assets/images/slider-3.jpg" alt="">
</div> -->

{{-- <div class="swiper-slide">
 <img src="{{ asset('frontend/assets/images/slider-4.jpg') }}" alt="">
</div> --}}



</div>
<!-- Add pagination -->
<!-- <div class="swiper-pagination"></div> -->
<!-- Add navigation arrows -->
<!--  <div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div> -->
</div>
</div> 
</section>
<!-- banner ending here -->

<!-- campaign section start -->
<section class="campaign-section style-two padding-tb">
    <div class="container">
        <div class="section-header" data-aos="fade-up" data-aos-duration="700">
            <h2>What We Provide</h2>
            <h2><span>Our Expertise in Serving You Best</span></h2>
        </div>
          <div class="parentr-div" data-aos="fade-up" data-aos-duration="800">
              <div class="row">
            <!-- Single Item -->
            @foreach ($category as $data )
                
            <div class="services-style-two col-xl-3 col-md-6">
                <div class="services-style-two-item">
                    <div class="info">
                        <div class="thumb">
                           <img src="{{ asset('admin/categoryImage/'.$data->image) }}" alt="Image Not Found">
                        </div>
                         
                        <p>
                            {!! $data->description !!}
                        </p>
                    </div>
                    <h5 class="title">
                        <a href="{{ route('frontend.category',$data->slug) }}"><i class="flaticon-vegetable"></i> {{ $data->name }} </a>
                    </h5>
                </div>
            </div>
            @endforeach
            <!-- End Single Item -->
           
        </div>
          </div>
    </div>
</section>
<!-- campaign section ending here -->


<!-- feature section start here -->
<section class="feature-section style-two padding-tb" style="background: linear-gradient(rgba(4,39,76,0.6), rgba(0,0,0,0.6)),url({{ asset('frontend/assets/images/bg-img-1.png') }}); background-size: cover; overflow: hidden;">
    <div class="container">
        <div class="section-header" data-aos="fade-up" data-aos-duration="700">
            <h2 class="text-white">Why Choose Us</h2>
            <h2 class="text-white"><span>Top Reasons to Choose Our Services</span></h2>
        </div>
        <div class="section-wrapper row">
            <div class="col-lg-6 col-12">
                <div class="post-thumb" data-aos="fade-right" data-aos-duration="700">
                    <img src="{{ asset('frontend/assets/images/bg-img-3.png') }}" alt="feature">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="post-item" data-aos="fade-left" data-aos-duration="700">
                    <div class="post-inner">
                        <div class="post-thumb">
                            <img src="{{ asset('admin/whychooseusImage/'.$whychooseus->image) }}" alt="feature">
                        </div>
                        <div class="post-content">
                            <h4>{{ $whychooseus->title }}</h4>
                            <p>{!! $whychooseus->description_1 !!}</p>
                        </div>
                    </div>
                </div>
                <div class="post-item" data-aos="fade-left" data-aos-duration="700">
                    <div class="post-inner">
                        <div class="post-thumb">
                            <img src="{{ asset('admin/whychooseusImage/'.$whychooseus->image_2) }}" alt="feature">
                        </div>
                        <div class="post-content">
                            <h4>{{ $whychooseus->title_2 }}</h4>
                            <p>{!! $whychooseus->description_2 !!}</p>
                        </div>
                    </div>
                </div>
                <div class="post-item" data-aos="fade-left" data-aos-duration="700">
                    <div class="post-inner">
                        <div class="post-thumb">
                            <img src="{{ asset('admin/whychooseusImage/'.$whychooseus->image_3) }}" alt="feature">
                        </div>
                        <div class="post-content">
                            <h4>{{ $whychooseus->title_3 }}</h4>
                            <p>{!! $whychooseus->description_3 !!}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- feature section ending here -->

       <!-- start of orico-about-section -->
<section class="orico-about-section section-padding" style="background-image: url({{ asset('frontend/assets/images/bg-img-2.png') }}); background-position: top; background-size:cover ;">
      <div class="container ">
        <div class="row align-items-center">
            <div class="col-lg-4 col-md-12 col-12">
                <div class="orico-about-wrap">
                   <img src="{{ asset('admin/aboutImage/'.$about->image) }}" alt="">
                   <div class="sub-img">
                       <img src="{{ asset('admin/aboutImage/'.$about->image_2) }}" alt="">
                   </div>
                </div>
            </div>
            <div class="col-lg-7 col-md-12 col-12">
                <div class="orico-about-text-wrap">
                    <div class="orico-about-text">
                        
                        <h2>{{ $about->title }}</h2>
                        <p>{!! $about->description !!} </p>
                         <a href="{{route('frontend.about')}}" class="custom-btn">See More<i class="fas fa-heart"></i></a>
                    </div>
                  
                </div>
            </div>
        </div>
    </div>
    <div class="ab-shape"><img src="{{ asset('frontend/assets/images/about/2.png') }}" alt=""></div>
</section>
<!-- end of orico-about-section -->


  <!-- work section start here -->
<section class="feature-section style-three padding-tb" style="background-image: url({{ asset('frontend/assets/images/feature/bg-image-2.jpg') }}); background-size: cover;">
    <div class="container-fluid">
        <div class="section-header" data-aos="fade-up" data-aos-duration="700">
            <h2>Research & Development</h2>
            <!-- <h2><span>More Than 1000+ Work Successfully</span></h2> -->
        </div>
       <div class="section-wrapper">
        @foreach ($research as $data )
            
        <div class="post-item" data-aos="fade-left" data-aos-duration="700">
            <div class="post-inner">
                <div class="post">
                    <img src="{{ asset('admin/ResearchDevelopmentImage/'.$data->image) }}"  alt="campaign" style="width :100%; height: 350px; object-fit: cover"> 
                </div>
                <div class="post-content">
                    <h5>{{ $data->title }}</h5>
                   <p class="mb-0">{!! $data->description !!}</p>
                </div>
            </div>
        </div>
        @endforeach
           
        </div>
<!--       <div class="text-center mt-4">
            <a href="#" class="custom-btn">See More<i class="fas fa-heart"></i></a>
       </div>-->
    </div>
</section>
<!-- work section end here -->

<!-- support section start here -->
<section class="support-section padding-tb d-none" style="background: linear-gradient(to right, rgba(3, 62, 101,0.94), rgba(3, 62, 101,0.94)),url({{ asset('frontend/assets/images/bg-img-1.png') }}); background-size: cover;">
    <div class="container">
        <div class="section-header style-2" data-aos="fade-up" data-aos-duration="700">
            <h2>Services We Offer</h2>
            <h2><span>Our Expertise in Serving You Best</span></h2>
        </div>
         <div class="swiper-container servcie-slider">
<!-- Additional required wrapper -->
<div class="swiper-wrapper">
    <div class="swiper-slide">
        <div class="inner-slider-div">
            <img src="http://localhost/sujay-boitech/assets/images/campaign/04.jpg" alt="">
            <h2>Title Comes Here</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
            <a href="">Read More</a>
        </div><!--inner-slider-div-->
    </div>
    <div class="swiper-slide">
        <div class="inner-slider-div">
            <img src="http://localhost/sujay-boitech/assets/images/campaign/04.jpg" alt="">
            <h2>Title Comes Here</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
            <a href="">Read More</a>
        </div><!--inner-slider-div-->
    </div>
     <div class="swiper-slide">
        <div class="inner-slider-div">
            <img src="http://localhost/sujay-boitech/assets/images/campaign/04.jpg" alt="">
            <h2>Title Comes Here</h2>
            <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. </p>
            <a href="">Read More</a>
        </div><!--inner-slider-div-->
    </div>
   
</div>

<!-- If we need navigation buttons -->
<div class="swiper-button-prev"></div>
<div class="swiper-button-next"></div>
</div>
    </div>
</section>
<!-- clean and save section ending -->


<!-- testimonial section start here -->
<section class="testimonial-section padding-tb" style="background-image: url({{ asset('frontend/assets/images/pattern.png') }}); background-size: cover;">
    <div class="container">
        <div class="section-header" data-aos="fade-up" data-aos-duration="700">
            <h2>Our Testimonials</h2>
            <h2><span>My Client's Feedback</span></h2>
        </div>
        <div class="testimonial-slider" data-aos="fade-up" data-aos-duration="700">
            <div class="swiper-wrapper">
                @foreach ($testimonial as $data )
                    
                <div class="swiper-slide">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-header">
                                <div class="post-thumb">
                                    <div class="round-shape"></div>
                                    <img src="{{ asset('admin/imgTestimonial/'.$data->image) }}" alt="testimonial">
                                </div>
                                <div class="post-content">
                                    <h5>{{ $data->name }}</h5>
                                    <p>{{$data->designation }}</p>
                                </div>
                                
                            </div>
                            <div class="post-body">
                                <p>{!! $data->description !!}</p>
                              
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
            <div class="testimonial-pagination"></div>
        </div>
    </div>
</section>
<!-- testimonial section ending -->


<!-- sponsor section start here -->
<div class="sponsor">
    <div class="container">
         <div class="section-header" data-aos="fade-up" data-aos-duration="700">
            <h2>Our Partners</h2>
            <h2><span> Partners in Progress Together</span></h2>
        </div>
        <div class="sponsor-slider" data-aos="fade-up" data-aos-duration="700">
            <div class="swiper-wrapper">
                @foreach ($partner as $data )
                    
                <div class="swiper-slide">
                    <div class="post-thumb">
                        <a href="#"><img src="{{ asset('admin/partnerImage/'.$data->image) }}" alt="sponsor"></a>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</div>
<!-- sponsor section end here -->
@endsection

