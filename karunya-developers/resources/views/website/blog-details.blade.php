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



<section class="th-blog-wrapper blog-details space-top space-extra2-bottom ">
        <div class="container">
            <div class="row gx-30">
                <div class="col-xxl-8 col-lg-7">
                    <div class="th-blog blog-single">
                        <div class="blog-img"><img src="{{asset('assets/dynamics/'.$blog->main_image)}}" alt="Blog Image"></div>
                        <div class="blog-content">
                            
                            <h2 class="blog-title">{{$blog->title}}</h2>
                            {!! $blog->description !!}
                            <div class="row">
                                @if ($blog->images_02)
                                @foreach (array_slice(json_decode($blog->images_02), 0, 2) as $image)
                                <div class="col-lg-6">
                                   
                                  <div class="blog-img mt-30"><img class="w-100" src="{{ asset('assets/dynamics/' . $image) }}"
                                    alt="Blog Image"></div>
                               </div>
                                @endforeach
                                @endif
                               
                            </div>
                          {!! $blog->description_02 !!}
                          
                        </div>
                    </div>
                 
                   
                </div>
                <div class="col-xxl-4 col-lg-5">
                
                    <aside class="sidebar-area">   
                        <div class="widget">
                            <h3 class="widget_title">Recent Posts</h3>
                            <div class="recent-post-wrap">
                                @foreach ($blog_details as $blog)
                                 <div class="recent-post">
                                    <div class="media-img">
                                        <a href="{{route('website.blog-details',$blog->slug)}}">
                                        <img src="{{asset('assets/dynamics/'.$blog->small_image)}}" alt="Blog Image">
                                        </a></div>
                                    <div class="media-body">
                                        <h4 class="post-title"><a class="text-inherit" href="{{route('website.blog-details',$blog->slug)}}">Regular
                                                {{$blog->title}}</a></h4>
                                    </div>
                                </div>
                                @endforeach
                                {{-- <div class="recent-post">
                                    <div class="media-img"><a href="blog-view.php"><img
                                                src="assets/images/post-img-2.jpg" alt="Blog Image"></a></div>
                                    <div class="media-body">
                                        
                                        <h4 class="post-title"><a class="text-inherit" href="blog-view.php">Interior
                                                design is the Art and Design</a></h4>
                                    </div>
                                </div>
                                <div class="recent-post">
                                    <div class="media-img"><a href="blog-view.php"><img
                                                src="assets/images/post-img-1.jpg" alt="Blog Image"></a></div>
                                    <div class="media-body">
                                        
                                        <h4 class="post-title"><a class="text-inherit" href="blog-view.php">Starting
                                                Construction Is Not So Easy</a></h4>
                                    </div>
                                </div> --}}
                            </div>
                        </div>
                      
                    </aside>
                </div>
            </div>
        </div>
    </section>

@endsection