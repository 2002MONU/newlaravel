@extends('website.layouts.app')
@section('mainwebsite')

<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url({{asset('assets/dynamics/setting/'.$site_setting->career_background)}})">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Current Opportunities</h2>
            <ul>
                <li><a href="{{route('home.index')}}">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>careers</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
<section class="current-job mb-5">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 mt-5">
                @foreach ($currentjobs as $jobs)
                <div class="job-boxes mt-3">
                    <div class="job-tit-img">
                        <div class="job-title">
                            <h4>{{$jobs->job_name}}</h4>
                        </div>
                        <div class="job-desc">
                            {!! $jobs->description !!}
                        </div>
                    </div>
                    <ul class="editor mb-3">
                        <li><i class="fas fa-map-marker-alt mr-4"></i> {{$jobs->location}}</li>
                        <li><i class="fas fa-clock mr-4"></i> {{$jobs->type}}</li> 
                        <li><i class="fas fa-briefcase mr-4"></i>  {{$jobs->job_title}}</li> 
                    </ul>
                    <div><a href="{{route('home.reach-out')}}" class="btn btn-dark btn-hover-primary">Apply Now</a></div>
                </div>
                @endforeach
               
            </div>
        </div>
    </div>
</section>

@endsection