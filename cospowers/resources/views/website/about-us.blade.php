@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb begin -->
      <div class="breadcrumb-murtes" style="background: url({{asset('assets/dynamics/'.$site_setting->about_banner)}})">
          <div class="container">
              <div class="row justify-content-center">
                  <div class="col-xl-6 col-lg-6">
                      <div class="breadcrumb-content text-center">
                          <h2>About us</h2>
                          <ul>
                              <li><a href="{{route('home.index')}}">Home</a></li>
                              <li>About</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- breadcrumb end -->

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
                         <a href="{{asset('assets/dynamics/slider/'.$home_about->pdf)}}" target="_blank" class="banner-button">Download Our Company Profile <i class="fas fa-long-arrow-alt-right"></i></a>
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

      <div class="our-mission">
           <!-- choosing reason begin -->
      <div class="container">
          <div class="choosing-reason-about-page">
              <div class="row">
                  <div class="col-xl-6 col-lg-6 col-md-6">
                      <div class="single-reason">
                          <h3>What we do?</h3>
                          <p>{{$our_vision->what_we_do}}</p>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6">
                      <div class="single-reason">
                          <h3>Our mission & vission</h3>
                          <p>{{$our_vision->ourvision}}</p>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6">
                      <div class="single-reason">
                          <h3>Who we are?</h3>
                          <p>{{$our_vision->who_we_are}}</p>
                      </div>
                  </div>
                  <div class="col-xl-6 col-lg-6 col-md-6">
                      <div class="single-reason">
                          <h3>Our team members</h3>
                          <p>{{$our_vision->our_team}}</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- choosing reason end -->
      </div><!--our-mission-->

         <!-- testimonial begin -->
      <div class="testimonial">
          <div class="container">
          <div class="row justify-content-center">
                  <div class="col-md-10">
                  <div class="section-title mb-0 text-center">
                          <h2 class="mb-0">Our <span class="special"> Certificates </span> </h2>
                          </div>
                  </div>
              </div>
              <div class="row">
              <div class="owl-carousel client-slider owl-theme">
                @foreach ($certificates as $certi)
                <div class="item">
                    <div class="logo-div">
                        <img src="{{asset('assets/dynamics/'.$certi->image)}}" alt="Certificates">
                    </div><!--logo-div-->
                </div>
                @endforeach
                 
              </div>
            
                </div><!--row-->
          </div>
      </div>
      <!-- testimonial end -->
       
@endsection