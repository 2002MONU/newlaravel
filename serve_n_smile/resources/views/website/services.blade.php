@extends('website.layouts.app')
@section('mainwebsite')
 <!-- Inne Page Banner Area Start Here -->
        <section class="inner-page-banner bg-common" data-bg-image="{{asset('assets/dynamics/'.$site_setting->service_banner)}}">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Services</h1>
                            <ul>
                                <li>
                                    <a href="{{route('home.index')}}">Home</a>
                                </li>
                                <li>Services</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
           <!-- Service Area Start Here -->
        <section class="section-padding-xl bg-common" >
            <div class="container">

               
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
                                     {{ \Illuminate\Support\Str::words(strip_tags($service->description), 20, '...') }}<br>
                                    <a href="{{route('home.services-details',$service->slug)}}" class="btn-fill-xs bg-accent text-primarytext">Read More<i class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
          </div>
                {!! $services->appends(['sort' => 'department'])->links() !!}

            </div>
        </section>
       
        <!-- Banner Area End Here -->
           <!-- Banner Area Start Here -->
        <section class="banner-wrap-layout2 bg-common section-bubble-2" >
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-lg-6 col-12">
                        <div class="banner-box-layout4">
                            <h2 class="item-title text-Primary">Together <span>We'll Explore</span> New Things</h2>
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
                                <img src="{{asset('assets/dynamics/'.$together->image)}}" alt="figure">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
@endsection