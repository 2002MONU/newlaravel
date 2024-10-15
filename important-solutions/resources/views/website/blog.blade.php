@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" style="background : url({{asset('assets/dynamics/setting/'.$site_setting->blog_banner)}})">
   <div class="container">
      <div class="breadcumb-content">
         <h1 class="breadcumb-title">Blog</h1>
         <ul class="breadcumb-menu">
            <li><a href="{{route('home.index')}}">Home</a></li>
            <li>Blog</li>
         </ul>
      </div>
   </div>
</div>
<section class="th-blog-wrapper space-top space-extra-bottom">
   <div class="container">
      <div class="row gx-40">
         @php
         use Carbon\Carbon;
         @endphp
         @foreach ($blog_details as $blog)
         @if(!empty($blog->blog_image))
         <div class="col-md-4">
             <div class="th-blog blog-single has-post-thumbnail">
               <div class="blog-img">
                  <a href="{{route('home.blog-details',$blog->slug)}}">
                  <img src="{{asset('assets/dynamics/blog/'.$blog->blog_image)}}" alt="Blog Image"></a>
               </div>
               <div class="blog-content">
                  <div class="blog-meta">
                     <a class="author" href="#!">
                     <i class="far fa-user"></i>{{$blog->post_by}}</a>
                     <a href="#!"><i class="fa-light fa-calendar-days"></i>{{ Carbon::parse($blog->blog_date)->format('d F Y') }} </a> 
                  </div>
                  <h2 class="blog-title">
                     <a href="{{route('home.blog-details',$blog->slug)}}">{{$blog->title}}</a>
                  </h2>
                  <p>{!! \Illuminate\Support\Str::words($blog->description, 40, '...') !!}</p>
                  <a href="{{route('home.blog-details',$blog->slug)}}" class="th-btn">
                     Read More
                     <div class="icon"><i class="fa-solid fa-arrow-up-right ms-3"></i></div>
                  </a>
               </div>
            </div>
         </div>
             @else
              <div class="col-md-4">
             <div class="th-blog blog-single has-post-thumbnail">
             <div class="blog-content">
                  <div class="blog-meta">
                     <a class="author" href="#!">
                     <i class="far fa-user"></i>{{$blog->post_by}}</a>
                     <a href="#!"><i class="fa-light fa-calendar-days"></i>{{ Carbon::parse($blog->blog_date)->format('d F Y') }} </a> 
                  </div>
                  <h2 class="blog-title">
                     <a href="{{route('home.blog-details',$blog->slug)}}">{{$blog->title}}</a>
                  </h2>
                  <p>{!! \Illuminate\Support\Str::words($blog->description, 40, '...') !!}</p>
                  <a href="{{route('home.blog-details',$blog->slug)}}" class="th-btn">
                     Read More
                     <div class="icon"><i class="fa-solid fa-arrow-up-right ms-3"></i></div>
                  </a>
               </div>
             </div>
                   </div>
             @endif
        
         <!--col-md-4-->
         @endforeach
       
      </div>
   </div>
</section>
@endsection