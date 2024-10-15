@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" data-bg-src="{{asset('assets/dynamics/'.$site_setting->about_banner)}}">
    <div class="container">
        <div class="breadcumb-content">
            <h1 class="breadcumb-title">About Us</h1>
            <ul class="breadcumb-menu">
                <li><a href="{{route('website.index')}}">Home</a></li>
                <li>About Us</li>
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

            <section class="about-us-sec">
            <div class="container">
                <div class="row">
            <div class="col-xl-12">
            <div class="title-area text-center"><span class="sub-title6 justify-content-center"><span
                        class="shape left"><span class="dots"></span></span> About Us <span
                        class="shape right"><span class="dots"></span></span></span>
                <h2 class="sec-title">{{$about->title}}</h2>
            </div>
            {!! $about->description !!}
            </div>
            </div>
            </div>
            </section>

         <section class="space bg-auto" data-bg-src="{{asset('assets/images/team_bg_3.png')}}" id="team-sec">
        <div class="container">
            <div class="title-area text-center"><span class="sub-title6 justify-content-center"><span
                        class="shape left"><span class="dots"></span></span> Team Members <span
                        class="shape right"><span class="dots"></span></span></span>
                <h2 class="sec-title">Our Professional Team</h2>
            </div>
            <div class="row slider-shadow th-carousel" data-slide-show="4" data-ml-slide-show="4" data-lg-slide-show="3"
                data-md-slide-show="2" data-sm-slide-show="2" data-arrows="true">
                @foreach ($teams as $testi)
                 <div class="col-md-6 col-lg-4 col-xl-3">
                    <div class="th-team team-grid">
                        <div class="team-img"><img src="{{asset('assets/dynamics/'.$testi->image)}}" alt="Team">
                            <div class="team-social">
                                <button class="play-btn">
                                    <i class="fal fa-plus">
                                    </i>
                                </button>
                                <div class="th-social">
                                    <a target="_blank" href="{{$testi->facebook}}">
                                        <i class="fab fa-facebook-f"></i>
                                    </a> 
                                    <a target="_blank"
                                        href="{{$testi->twitter}}"><i class="fab fa-twitter"></i>
                                    </a> 
                                    <a target="_blank" href="{{$testi->linkedin}}"><i
                                                class="fab fa-linkedin-in"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="team-content">
                            <h3 class="team-title box-title">{{$testi->name}}</h3><span
                                class="team-desig">{{$testi->designation}}</span>
                        </div>
                    </div>
                </div>
                @endforeach
               
            </div>
        </div>
    </section>



    <div class="space space-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="title-area text-center"><span class="sub-title6 justify-content-center"><span
                                class="shape left"><span class="dots"></span></span> Why Choose Us <span
                                class="shape right"><span class="dots"></span></span></span>
                        <h2 class="sec-title">We Help You Build On Your Past And Prepare For The Feature</h2>
                    </div>
                </div>
            </div>
            <div class="tab-menu2 filter-menu-active">
                @foreach ($whyChooseUs as $key => $why)
                <button class="filter-button {{ request()->input('id') == $key ? 'active' : '' }}" data-filter=".cat{{ $key + 1 }}" type="button">
                    {{ $why->heading }}
                </button>
            @endforeach
            </div>
            <div class="mission-box-wrap mt-50">
                @foreach ($whyChooseUs as $key => $why)
                    <div class="filter-item cat cat{{ $key + 1 }}">
                        <div class="mission-grid">
                            <div class="mission-img rounded-20" data-overlay="title" data-opacity="2">
                                <img src="{{asset('assets/dynamics/'.$why->big_image)}}" alt="mission img">
                                <a href="{{ $why->youtube_link }}" class="play-btn style3 popup-video"><i class="fas fa-play"></i></a>
                            </div>
                            <div class="mission-content">
                                <h3 class="mission-title">{{ $why->title }}</h3>
                                {!! $why->description !!}
                                <div class="mission-feature-wrap">
                                    <div class="mission-feature">
                                        <div class="mission-feature_icon"><img src="{{asset('assets/dynamics/'.$why->image_small_01)}}" alt="icon"></div>
                                        <div class="media-body">
                                            <p class="mission-feature_subtitle">{{$why->p_01}}</p>
                                            <h4 class="mission-feature_title">{{$why->h_01}}</h4>
                                        </div>
                                    </div>
                                    <div class="mission-feature">
                                        <div class="mission-feature_icon"><img src="{{asset('assets/dynamics/'.$why->image_small_02)}}" alt="icon"></div>
                                        <div class="media-body">
                                            <p class="mission-feature_subtitle">{{$why->p_02}}</p>
                                            <h4 class="mission-feature_title">{{$why->h_01}}</h4>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            
        </div>
    </div>


    <div class="space space-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10 col-">
                    <div class="title-area text-center"><span class="sub-title6 justify-content-center"><span
                                class="shape left"><span class="dots"></span></span> Our Masterpieces in Construction <span
                                class="shape right"><span class="dots"></span></span></span>
                        <h2 class="sec-title">See Our Beautiful Creations in Action</h2>
                    </div>
                </div>
            </div>
            <div class="col-lg-12">
        <div class="image-gallery wrapper">
        <div class="items">
            @foreach ($creations as $creation)
            <div class="item" tabindex="0" style="background-image: url({{asset('assets/dynamics/'.$creation->image)}})"></div>
                
            @endforeach
        

        </div>

        </div>
        </div>
        </div>
        </div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initially hide all filter items except the first
        $('.filter-item').hide();
        $('.filter-item.cat1').show(); // Show the first category by default

        // Handle button click
        $('.filter-button').click(function() {
            var filterValue = $(this).data('filter');

            // Remove active class from all buttons and add it to the clicked button
            $('.filter-button').removeClass('active');
            $(this).addClass('active');

            // Hide all filter items and show only the selected one
            $('.filter-item').hide();
            $(filterValue).show();
        });
    });
</script>

<style>
    .filter-button.active {
        background-color: #e08549; /* Active button color */
        color: white; /* Active button text color */
    }
</style>

@endsection
