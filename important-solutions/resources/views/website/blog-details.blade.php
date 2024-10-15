@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" style="background : url({{asset('assets/dynamics/setting/'.$site_setting->blog_banner)}})">
  <div class="container">
     <div class="breadcumb-content">
        <h1 class="breadcumb-title">{{$blog->title}}</h1>
        <ul class="breadcumb-menu">
           <li><a href="{{route('home.index')}}">Home</a></li>
           <li>{{$blog->title}}</li>
        </ul>
     </div>
  </div>
</div>
<section class="th-blog-wrapper blog-details space-top space-extra-bottom">
  <div class="container">
     <div class="row gx-30">
         @php
use \Carbon\Carbon;
@endphp

@if(!empty($blog->blog_image))
    <div class=" col-lg-8 col-md-8">
       <div class="th-blog blog-single">
         
          <div class="blog-img-1"><img src="{{asset('assets/dynamics/blog/'.$blog->blog_image)}}" alt="Blog Image"></div>
          <div class="blog-content">
             <div class="blog-meta">
                <a class="author" href="#!"><i class="far fa-user"></i>{{$blog->post_by}}</a>
                 <a href="#!"><i class="fa-light fa-calendar-days"></i>{{ Carbon::parse($blog->blog_date)->format('d F Y') }}</a> 
             </div>
             <h2 class="blog-title">{{$blog->title}}</h2>
             {!! $blog->description !!}
          </div>
       </div>
    </div>
@else
    <div class=" col-lg-8 col-md-8">
       <div class="th-blog blog-single">
          <div class="blog-content">
             <div class="blog-meta">
                <a class="author" href="#!"><i class="far fa-user"></i>{{$blog->post_by}}</a>
                 <a href="#!"><i class="fa-light fa-calendar-days"></i>{{ Carbon::parse($blog->blog_date)->format('d F Y') }}</a> 
             </div>
             <h2 class="blog-title">{{$blog->title}}</h2>
             {!! $blog->description !!}
          </div>
       </div>
    </div>
@endif

        <div class=" col-lg-4 col-md-4">
           <aside class="sidebar-area">
                <div class="widget">
                 <h3 class="widget_title">Recent Posts</h3>
                 <div class="recent-post-wrap">
                  @foreach ($blog_details as $blog)
                  @if(!empty($blog->blog_image))
                  <div class="recent-post">
                     <div class="media-img">
                        <a href="{{route('home.blog-details',$blog->slug)}}">
                            <img src="{{asset('assets/dynamics/blog/'.$blog->blog_image)}}" alt="Blog Image"></a>
                     </div>
                     <div class="media-body">
                        <div class="recent-post-meta"><a href="{{route('home.blog-details',$blog->slug)}}"><i class="fa-light fa-calendar-days"></i>{{ Carbon::parse($blog->blog_date)->format('d F Y') }}</a></div>
                        <h4 class="post-title"><a class="text-inherit" href="{{route('home.blog-details',$blog->slug)}}">{{$blog->title}}</a></h4>
                     </div>
                  </div>
                  @else
                  <div class="recent-post">
                      <div class="media-body">
                        <div class="recent-post-meta"><a href="{{route('home.blog-details',$blog->slug)}}"><i class="fa-light fa-calendar-days"></i>{{ Carbon::parse($blog->blog_date)->format('d F Y') }}</a></div>
                        <h4 class="post-title"><a class="text-inherit" href="{{route('home.blog-details',$blog->slug)}}">{{$blog->title}}</a></h4>
                     </div>
                  </div>
                  @endif
                  @endforeach
                    
                   
                 </div>
              </div>
            </aside>
        </div>
     </div>
  </div>
</section>

@endsection