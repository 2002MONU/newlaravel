@extends('frontend.layout.app',['meta_title' => $meta_title ?? "",'meta_keywords' => $meta_keywords ?? "",'meta_description' => $meta_description ?? ""])
@section('content')

          <!-- page header section start here -->
          <section class="page-header" style="background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.6)),url({{ asset('admin/breadcrumbImage/'.$breadcrumb->image) }})">
            <div class="page-header-area">
                <div class="container">
                    <div class="page-header-content">
                        <div class="page-header-title">
                            <h2 class="text-white">About Us</h2>
                        </div>
                        <ul class="breadcamp">
                            <li>
                                <a href="{{ route('frontend.home') }}"><i class="fas fa-home"></i> Home</a>
                            </li>
                           
                            <li>
                                <a class="active">About Us</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </section>
        <!-- page header section ending here -->

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
                                
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
            <div class="ab-shape"><img src="{{ asset('frontend/assets/images/about/2.png') }}" alt=""></div>
        </section>
        <!-- end of orico-about-section -->


          <!-- work section start here -->
        <section class="feature-section style-three padding-tb" style="background-image: url(assets/images/feature/bg-image-2.jpg); background-size: cover;">
            <div class="container">
                <div class="section-header" data-aos="fade-up" data-aos-duration="700">
                    <h2>We've Completed</h2>
                    <h2><span>More Than {{ $achievement->work }} Successfully</span></h2>
                </div>
                <div class="section-wrapper">
                    <div class="post-item" data-aos="fade-right" data-aos-duration="700">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <img src="{{ asset('frontend/assets/images/icon-1.png') }}" alt="feature">
                            </div>
                            <div class="post-content">
                                <h4><span class="counter">{{ $achievement->dealers }}</span></h4>
                                <h5>Dealers</h5>
                            </div>
                        </div>
                    </div>
                    <div class="post-item" data-aos="fade-up" data-aos-duration="700">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <img src="{{ asset('frontend/assets/images/icon-2.png') }}" alt="works">
                            </div>
                            <div class="post-content">
                                <h4><span class="counter">{{ $achievement->services }}</span></h4>
                                <h5>Services</h5>
                            </div>
                        </div>
                    </div>
                    <div class="post-item" data-aos="fade-down" data-aos-duration="700">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <img src="{{ asset('frontend/assets/images/icon-3.png') }}" alt="works">
                            </div>
                            <div class="post-content">
                                <h4><span class="counter">{{ $achievement->happy_farmers }}</span></h4>
                                <h5>Happy Farmers</h5>
                            </div>
                        </div>
                    </div>
                    <div class="post-item" data-aos="fade-left" data-aos-duration="700">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <img src="{{ asset('frontend/assets/images/icon-4.png') }}" alt="works">
                            </div>
                            <div class="post-content">
                                <h4><span class="counter">{{ $achievement->products }}</span>{{ $achievement->unit??'' }}</h4>

                                <h5>Products</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- work section end here -->
        
        <section class="team-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                       <div class="section-header" data-aos="fade-up" data-aos-duration="700">
                    <h2>Board Directors</h2>
                     </div> 
                    </div>  <!--col-md8-->
                </div><!--row-->
                <div class="row">
                     @if(!empty($board_diretors) && $board_diretors->isNotEmpty())
                    @foreach($board_diretors as $board)
                    <div class="col-md-3">
                        <div class="team-div">
                            <div class="team-img">
                                <img src="{{ asset('admin/directors/'.$board->image) }}" alt="alt"/> 
                            </div>
                            <div class="team-content">
                                <h5>{{$board->name}}</h5>
                                <span>{{$board->designation}}</span>
                            </div><!--team-contet-->
                        </div><!--team-div-->
                    </div>
                    @endforeach
                   @else
                   <h4>No Records Found</h4>
                   @endif
                </div><!--row-->
            </div><!--container-->
        </section><!--team-section-->
        
         <section class="team-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-md-8">
                       <div class="section-header" data-aos="fade-up" data-aos-duration="700">
                    <h2>Panel Of Honourable & Advisory Directors</h2>
                     </div> 
                    </div>  <!--col-md8-->
                </div><!--row-->
                <div class="row">
                    @if(!empty($advisory_diretors) && $advisory_diretors->isNotEmpty())
                    @foreach($advisory_diretors as $director)
                    <div class="col-md-3">
                        <div class="team-div">
                            <div class="team-img">
                                <img src="{{ asset('admin/directors/'.$director->image) }}" alt="alt"/> 
                            </div>
                            <div class="team-content">
                                <h5>{{$director->name}}</h5>
                                <span>{{$director->designation}}</span>
                            </div><!--team-contet-->
                        </div><!--team-div-->
                    </div><!--col-md-3-->
                    @endforeach
                    @else
                    <h4>No Records Found</h4>
                    @endif
                 </div><!--row-->
            </div><!--container-->
        </section><!--team-section-->

        <section class="vision-mission" style="background: linear-gradient(rgba(127,224,146,0.5), rgba(127,224,146,0.5)),url('assets/images/bg-img-5.png')">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                       <div class="vision-mission-div" data-aos="fade-up" data-aos-duration="700">
                            <h3>Our Vision</h3>
                        <p>{!! $about->vision !!} </p>
                       </div>
                    </div><!--col-md-6-->

                     <div class="col-md-6">
                        <div class="vision-mission-div" data-aos="fade-up" data-aos-duration="700">
                            <h3>Our Mission</h3>
                        <p>{!! $about->mission !!}</p>
                        </div>
                    </div><!--col-md-6-->
                </div><!--row-->
            </div><!--container-->
        </section><!--vison-mison-->

        <section class="testimonial-section padding-tb" style="background-image: url(assets/images/pattern.png); background-size: cover;">
            <div class="container">
                <div class="section-header" data-aos="fade-up" data-aos-duration="700">
                    <h2>Our Testimonials</h2>
                    <h2><span>Client’s Feedback Latest Reviews From My Clients</span></h2>
                </div>
                <div class="testimonial-slider" data-aos="fade-up" data-aos-duration="700">
                    <div class="swiper-wrapper">
                        @foreach ($testimonials as $testimonial)
                        <div class="swiper-slide">
                            <div class="post-item">
                                <div class="post-inner">
                                    <div class="post-header">
                                        <div class="post-thumb">
                                            <div class="round-shape"></div>
                                            <img src="{{ asset('admin/imgTestimonial/'.$testimonial->image) }}" alt="testimonial">
                                        </div>
                                        <div class="post-content">
                                            <h5>{{ $testimonial->name }}</h5>
                                            <p>{{ $testimonial->designation }}</p>
                                        </div>
                                    </div>
                                    <div class="post-body">
                                        <p>{!! $testimonial->description !!}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div class="testimonial-pagination">
                        {{ $testimonials->links() }}
                    </div>
                </div>
            </div>
        </section>
        
        @endsection