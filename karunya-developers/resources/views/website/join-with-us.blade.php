@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->joinwith_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Build Your Future with Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>Join with Us</li>
            </ul>
        </div>
    </div>
</div>

<div class="video-container" id="videoContainer">
    <div class="video-content">
        <video autoplay muted loop>
           <source src="{{asset('assets/dynamics/'.$sidevideo->video)}}" type="video/mp4">
        </video>
    </div>
</div>



<section class="space carrer-page">
    <div class="container">
            @if(session('success'))
                        <div class="alert alert-success">{{session('success')}}</div>
             @endif
                <h4>Current Openings</h4>
                
                <div class="row justify-content-between">
                    @foreach ($join_with_us as $join)
                    <div class="col-lg-4">
                      <ul>                              
                       <li>
                            <div class="twm-jobs-list-style1 mb-2">
                                <div class="twm-media">
                                    <img src="{{asset('assets/dynamics/'.$join->job_logo)}}" alt="#">
                                </div>
                                <div class="twm-mid-content">
                                    <h4><span class="twm-job-post-duration">{{$join->title}}</span></h4>
                                   
                                        {!! $join->description !!}
                                    <p class="twm-job-address"><i class="fa-solid fa-location-dot"></i>{{$join->location}}</p>
                                </div>
                                <div class="twm-right-content">
                                    <div class="twm-jobs-amount">{{$join->salary}} k /Month</div>
                                    <a href="#career-form" class="twm-jobs-browse site-text-primary" data-bs-toggle="modal">Apply Now</a>
                                </div>
                            </div>
                          </li>
                          </ul>
                        </div>
                    @endforeach
            </div>
       
    </div>
</section>

@endsection
