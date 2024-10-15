@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->gallery_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Gallery</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>Gallery</li>
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


<section class="project-area-3 space-top space-bottom overflow-hidden bg-smoke">
    <div class="container">
         <div class="row">
            @if($galleries->isEmpty())
            <h4>No Gallery image found</h4>
            @else
            @foreach ($galleries as $gallery)
            <div class="col-lg-4">
                <div class="project-card style3">
                    <div class="project-card-img"><img src="{{asset('assets/dynamics/'.$gallery->image)}}" alt="project image">
                    </div>
                    <div class="project-card-details-wrap">
                        <div class="project-card-details">
                            <h6 class="project-subtitle">{{$gallery->layout}}</h6>
                            <h4 class="box-title">{{$gallery->design_name}}
                            </h4>
                        </div><a href="{{asset('assets/dynamics/'.$gallery->image)}}" class="icon-btn popup-image"><i
                                class="fa-solid fa-arrow-up-right"></i></a>
                    </div>
                </div>
                </div>
            @endforeach
            @endif
         </div>
    </div>
</section>

@endsection

