@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->project_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Projects</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>Projects</li>
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
<section class="space bg-top-center project-sec">
    <div class="container">
        <div class="row">
            @if($project_details->isEmpty())
            <h4>No   Projects</h4>
            @else
            @foreach ($project_details as $project)
            @php
                $images = json_decode($project->image, true);
            @endphp
            <div class="col-lg-4 col-12">
                <div class="project-grid">
                    <div class="project-img">
                    <img src="{{asset('assets/dynamics/'.$images[0])}}" alt="project image"></div>
                    <div class="project-content">
                        <p class="project-subtitle">{{$project->layout}}</p>
                        <h3 class="project-title"><a href="{{route('website.project-details',$project->slug)}}">{{$project->design_name}}</a></h3> 
                        <a href="{{route('website.project-details',$project->slug)}}" class="project-icon"><i class="far fa-folder"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
            @endif
        </div>
    </div>
</section>

@endsection