@extends('website.layouts.app')
@section('mainwebsite')
<!-- Inne Page Banner Area Start Here -->
       <section class="inner-page-banner bg-common" data-bg-image="{{asset('assets/dynamics/'.$site_setting->about_banner)}}">
           <div class="container">
               <div class="row">
                   <div class="col-12">
                       <div class="breadcrumbs-area">
                           <h1>About Us</h1>
                           <ul>
                               <li>
                                   <a href="{{route('home.index')}}">Home</a>
                               </li>
                               <li>About</li>
                           </ul>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- Inne Page Banner Area End Here -->
       <!-- About Us Area Start Here -->
       <section class="section-padding-12-9">
           <div class="container">
                
                   <div class="heading-layout3 sns-img1">
                 
                   <h2> Welcome to <img src="{{asset('assets/dynamics/'.$about->small_image)}}" alt="logo" class="img-fluid sns-img1"></h2>
                
             </div>
              <!--<div class="tag-line">About Us</div>-->
               <div class="row">
                   <div class="col-lg-7">
                       <div class="about-box-layout1">
                           <div class="item-tag ">Know About Us</div>
                           
                           <h2 class="item-title">{{$about->title}}</h2>
                         
                           {!! $about->description !!}
                       </div>
                   </div>
                   <div class="col-lg-5">
                       <div class="about-box-layout6">
                           <div class="item-img">
                               <img src="{{asset('assets/dynamics/'.$about->big_image)}}" alt="thumb">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- About Us Area End Here -->
       
        <!-- Why Choose Us Area Start Here -->
       <section class="why-choose-wrap-layout2 section-shape4">
           <div class="container">
               <div class="row">
                   <div class="col-lg-6">
                       <div class="why-choose-box-layout3 about-box-layout1">
                            <div class="item-tag">Why Choose Us</div>
                           <h2 class="item-title"> {{$whychoose->title}} </h2>
                           {!! $whychoose->description !!}
                               
                              
                       </div>
                   </div>
                   <div class="col-lg-6">
                       <div class="why-choose-box-layout4">
                           <div class="row gutters-20">
                               <div class="col-md-6">
                                   <div class="single-content">
                                       <div class="item-icon">
                                           <i class="fas fa-users"></i>
                                       </div>
                                       <div class="item-content">
                                           <h3 class="item-title"> {{$whychoose->h1}}</h3>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="single-content">
                                       <div class="item-icon">
                                           <i class="far fa-clock"></i>
                                       </div>
                                       <div class="item-content">
                                           <h3 class="item-title">{{$whychoose->h2}}</h3>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="single-content">
                                       <div class="item-icon">
                                           <i class="far fa-hand-peace"></i>
                                       </div>
                                       <div class="item-content">
                                           <h3 class="item-title">{{$whychoose->h3}}</h3>
                                       </div>
                                   </div>
                               </div>
                               <div class="col-md-6">
                                   <div class="single-content">
                                       <div class="item-icon">
                                           <i class="far fa-life-ring"></i>
                                       </div>
                                       <div class="item-content">
                                           <h3 class="item-title">{{$whychoose->h4}}</h3>
                                       </div>
                                   </div>
                               </div>
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- Why Choose Us Area End Here -->
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
                               <p>{{$howitwork->let_enjoy}}</p>                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- Process Area End Here -->
        <!-- Banner Area Start Here -->
       <section class="banner-wrap-layout3 bg-lightprimary">
           <div class="container">
               <div class="row d-flex align-items-center">
                   <div class="col-lg-6 order-lg-2">
                       <div class="banner-box-layout2">
                           <h2 class="item-title">{{$together->title}}</h2>
                           <p> {{$together->title}}</p>
                           <a href="{{route('home.contact')}}" class="btn-fill-sm btn-slide-hover bg-accent text-primarytext">Book an Appointment<i class="fas fa-angle-right"></i></a>
                       </div>
                   </div>
                   <div class="col-lg-6 order-lg-1">
                       <div class="banner-box-layout3">
                           <div class="item-img">
                               <img src="{{asset('assets/dynamics/'.$together->image)}}" alt="Banner-thumb">
                           </div>
                       </div>
                   </div>
               </div>
           </div>
       </section>
       <!-- Banner Area End Here -->
       <!-- About Us Area End Here -->
@endsection
