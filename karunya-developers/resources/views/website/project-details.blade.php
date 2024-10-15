@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->project_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Project Detail</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>Project Detail</li>
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
<section class="space bg-top-center">
    <div class="container">
        <div class="row">
            <div class="col-xl-9 col-lg-8">
                <div class="" id="projectSlide2">
                    @php
                    $images = json_decode($project->image, true);
                @endphp
                 @if(is_null($images) || empty($images))
                 <h4>No Image Found</h4>
             @else
                        @foreach ( $images as $image)
                    <div>
                       
                        <div class="project-grid">
                           <div class="project-img">
                                <img src="{{asset('assets/dynamics/'.$image)}}"
                                    alt="project image">
                            </div>
                            <div class="project-content">
                                <p class="project-subtitle">{{$project->layout}}</p>
                                <h3 class="project-title"><a href="javascript:void(0)">{{$project->design_name}}</a></h3>
                                <a href="javascript:void(0)" class="project-icon"><i class="far fa-plus"></i></a>
                            </div>
                        </div>
                    </div>
                   @endforeach
                   @endif
                </div>
            </div>
        <div class="col-xl-3 col-lg-4">
                @php
                // Decode the image JSON into an array
                $images = json_decode($project->image, true);
            @endphp

           <div class="row projectSlideThumb">
                @if(is_null($images) || empty($images))
                <div class="col-auto">
                    <div class="project-6thumb">
                    <h4>No Image Found</h4>
                    </div>
                </div>
                @else
                    @foreach ($images as $image)
                    <div class="col-auto">
                        <div class="project-6thumb">
                            <div class="project-thumb_img">
                                <img src="{{ asset('assets/dynamics/' . $image) }}" alt="project image">
                            </div>
                        </div>
                    </div>
                    @endforeach
                @endif
            </div>

       
                <div class="icon-box style3"><button
                        data-slick-prev="#projectSlide2" class="slick-arrow default"><i
                            class="far fa-arrow-left"></i></button> <button data-slick-next="#projectSlide2"
                        class="slick-arrow default"><i class="far fa-arrow-right"></i></button></div>
            </div>
        </div>
    </div>
</section>
<div class="project-detail-sec">
    <div class="container">
<div class="page-single">
    <div class="page-content">
        <h2 class="h3 page-title">{{$project->title}}</h2>
        <div class="row gy-30 justify-content-center">
            <div class="col-xl-7">
                {!! $project->description !!}
            </div>
            <div class="col-xl-5">
                <ul class="service-info-list">
                    <li><strong>Project Category:</strong> {{$project->project_category}}</li>
                    <li><strong>Clients:</strong> {{$project->clients}}</li>
                    <li><strong>Project Date:</strong> {{$project->project_date}}</li>
                    <li><strong>Avenue End Date:</strong> {{$project->avenue_end_date}}</li>
                    <li><strong>Locations:</strong> {{$project->location}}</li>
                    <li><strong>Price After</strong>{{$project->price_after}}</li>
                </ul>
            </div>
        </div>
        <div class="row gy-30 align-items-center ">
        
            <div class="col-xl-8">
                <h4 class="box-title">Services Benefits:</h4>
                {!! $project->service_benefits !!}
                </div>
            </div>
        </div>
    </div>
</div>
</div>
</div>
@endsection