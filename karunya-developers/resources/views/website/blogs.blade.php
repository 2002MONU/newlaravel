@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->blog_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">Blogs</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>Our Latest Blogs</li>
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


<section class="space bg-smoke" data-bg-src="{{asset('assets/img/bg/service_bg_2.png')}}" id="service-sec">
    <div class="container">
        <div class="row gy-4 justify-content-center">
            @foreach ($blog_details as $blog)
             <div class="col-xl-6">
                <div class="service-card style3">
                    <div class="service-card-thumb"><img src="{{asset('assets/dynamics/'.$blog->small_image)}}" alt="Icon">
                        
                    </div>
                    <div class="service-card-content">
                        <h3 class="box-title" data-bs-toggle="modal" data-bs-target="#serviceModal">{{$blog->title}}</h3>
                        {!! \Illuminate\Support\Str::words($blog->description,30,'.....') !!}
                        <a class="link-btn style2" href="{{route('website.blog-details',$blog->slug)}}">Read More 
                        <i class="far fa-arrow-right"></i></a>
                    </div>
                </div>
            </div>
            @endforeach
           
          
        </div>
        <div class="th-pagination mt-30 text-center">
            {!! $blog_details->appends(['sort' => 'department'])->links() !!}
        </div>
       
    </div>
</section>
@endsection