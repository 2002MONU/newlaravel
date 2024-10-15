@extends('website.layouts.app')
@section('mainwebsite')
<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->company_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Vision</h2>
            <ul>
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>About Us</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
 <section class="who-we">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 order-lg-0">
                <div class="who-img">
                    <img src="{{asset('assets/dynamics/ourcompany/'.$vision->vision_image)}}" alt="vision-img">
                </div>
            </div>
            <div class="col-lg-6 order-lg-1">
                <h2>Vision</h2>
              {!! $vision->vision_description !!}
            </div>
        </div>
        <div class="row align-items-center mt-5">
            <div class="col-lg-6 order-lg-1">
                <div class="who-img">
                    <img src="{{asset('assets/dynamics/ourcompany/'.$vision->object_image)}}" alt="object-img">
                </div>
            </div>
            <div class="col-lg-6 order-lg-0">
                <h2>Objectives</h2>
                {!! $vision->object_description !!}
            </div>
        </div>
    </div>
 </section>
@endsection