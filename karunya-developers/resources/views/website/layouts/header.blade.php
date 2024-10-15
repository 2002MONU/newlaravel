@php
    // Get all projects
    $projects = \App\Models\Project::all(); 

    // Get ongoing project details with status 1
    $project_details = \App\Models\ProjectDetail::where('status', 1)->orderBy('priority', 'asc')->get();
    $site_setting = \App\Models\SiteSetting::find(1);
    $path = request()->path();
    $seo_details = \App\Models\SeoSetting::where('page_name', $path)->first();
    $title = $description = $keywords = '';
    if ($seo_details != '') {
        $title = $seo_details->title;
        $description = $seo_details->description;
        $keywords = $seo_details->keywords;
    }
$social = \App\Models\SocialLink::find(1);
$meta_tags = \App\Models\MetaTag::find(1);
@endphp

<!doctype html>
<html class="no-js" lang="zxx">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>{{$site_setting->site_name}} | {{$title}}</title>
    <meta name="robots" content="noindex, follow">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dynamics/'.$site_setting->favicon)}}">
    <!-- Meta tags -->
    <meta name="keywords" content="{{ $keywords}}">
    <meta name="description" content="{{$description}}">
    <meta name="author" content="{{$meta_tags->author}}">
    <meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
    <link rel="canonical" href="{{$meta_tags->canonical}}">
    <meta property="og:locale" content="en_US">
    <meta property="og:type" content="{{$meta_tags->og_type}}">
    <meta property="og:title" content="{{$meta_tags->og_title}}">
    <meta property="og:description" content="{{$meta_tags->og_description}}">
    <meta property="og:url" content="{{$meta_tags->og_url}}">
    <meta property="og:site_name" content="{{$meta_tags->og_site_name}}">
    <meta property="og:updated_time" content="{{$meta_tags->updated_at}}">
    <meta property="og:image" content="{{asset('assets/dynamics/'.$meta_tags->og_image)}}">
    <meta property="og:image:secure_url" content="{{$meta_tags->og_secure_url}}">
    <meta property="og:image:width" content="{{$meta_tags->width}}">
    <meta property="og:image:height" content="{{$meta_tags->height}}">
    <meta property="og:image:alt" content="Homepage">
    <meta property="og:image:type" content="{{$meta_tags->og_type}}">
    <meta name="twitter:card" content="{{$meta_tags->twitter_card}}">
    <meta name="twitter:title" content="{{$meta_tags->twitter_title}}">
    <meta name="twitter:image" content="{{asset('assets/dynamics/'.$meta_tags->twitter_image)}}">


    <meta name="theme-color" content="#ffffff">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
</head>

<body>
  
    
    <div class="popup-search-box d-none d-lg-block"><button class="searchClose"><i class="fal fa-times"></i></button>
        <form action="#"><input type="text" placeholder="What are you looking for?"> <button type="submit"><i
                    class="fal fa-search"></i></button></form>
    </div>
    <div class="th-menu-wrapper">
        <div class="th-menu-area text-center">
            <button class="th-menu-toggle"><i class="fal fa-times"></i></button>
            <div class="mobile-logo"><a href="{{route('website.index')}}">
                <img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" alt="Karunya Developers"></a></div>
            <div class="th-mobile-menu">
                <ul>
                   <li><a href="{{route('website.index')}}">Home</a></li>
                    <li><a href="about-us.php">About Us</a></li>
                    <li class="menu-item-has-children"><a href="{{ route('website.project') }}">Projects</a>
                        <ul class="sub-menu">
                            <li class="menu-item-has-children"><a href="javascript:void(0)">Ongoing</a>
                                <ul class="sub-menu">
                                    @foreach ($project_details as $project_detail)
                                        @php
                                            // Find the project by its ID
                                            $project = $projects->firstWhere('id', $project_detail->project_id);
                                        @endphp
                                        @if ($project && $project->id == 1) <!-- Display only ongoing projects with ID == 1 -->
                                            <li>
                                                <a href="{{ route('website.project-details', $project_detail->slug) }}">{{ $project_detail->title }}</a>
                                            </li>
                                         @endif
                                        
                                    @endforeach

                                </ul>
                            </li>
                            <li><a href="{{route('website.upcoming-project-details')}}">Upcoming</a></li>
                            <li><a href="{{route('website.completed-project-details')}}">Completed</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="{{route('website.blog')}}">Blogs</a></li>
                    <li><a href="{{route('website.contact')}}">Contact</a></li>
                    <li><a href="{{route('website.join-with-us')}}">join-with-us</a></li>
                </ul>
            </div>
        </div>
    </div>
    <header class="th-header header-layout9">
        <div class="sticky-wrapper">
            <div class="sticky-active">
                <div class="menu-area">
                    <div class="container-fluid th-container">
                        <div class="row align-items-center justify-content-between">
                            <div class="col-auto">
                                <div class="header-logo">
                                    <a href="{{route('website.index')}}">
                                        <img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}"
                                            alt="Karunya Developers">
                                    </a>
                                </div>
                            </div>
                            <div class="col-auto">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <nav class="main-menu d-none d-lg-block">
                                            <ul>
                                                
                                                <li><a href="{{route('website.index')}}"><i class="fa-solid fa-house"></i> Home</a></li>
                                                <li><a href="{{route('website.about')}}"><i class="fa-solid fa-info-circle"></i> About Us</a></li>
                                                <li class="menu-item-has-children">
                                                    <a href="{{route('website.project')}}"><i class="fa-solid fa-building"></i> Projects</a>
                                                    <ul class="sub-menu">
                                                        <li class="menu-item-has-children"><a href="javascript:void(0)">Ongoing</a>
                                                        	<ul class="sub-menu">
                                                                @foreach ($project_details as $project_detail)
                                                                @php
                                                                    // Find the project by its ID
                                                                    $project = $projects->firstWhere('id', $project_detail->project_id);
                                                                @endphp
                                                                @if ($project && $project->id == 1) <!-- Display only ongoing projects with ID == 1 -->
                                                                    <li>
                                                                        <a href="{{ route('website.project-details', $project_detail->slug) }}">{{ $project_detail->title }}</a>
                                                                    </li>
                                                                @endif
                                                            @endforeach
                                                            </ul>
                                                         </li>
                                                        <li><a href="{{route('website.upcoming-project-details')}}">Upcoming</a></li>
                                                        <li><a href="{{route('website.completed-project-details')}}">Completed</a></li>
                                                    </ul>
                                                </li>
                                                <li><a href="{{route('website.gallery')}}"><i class="fa-solid fa-images"></i> Gallery</a></li>
                                                <li><a href="{{route('website.blog')}}"><i class="fa-solid fa-file-alt"></i> Blogs</a></li>
                                                <li><a href="{{route('website.contact')}}"><i class="fa-solid fa-comments"></i> Contact Us</a></li>
                                            </ul>
                                        </nav>
                                        <button type="button" class="th-menu-toggle d-inline-none d-lg-none"><i
                                                class="far fa-bars"></i>
                                        </button>
                                    </div>
                                    <div class="col-auto d-none d-xl-block">
                                        <div class="header-button"> <a href="{{route('website.join-with-us')}}"
                                                class="th-btn style3 ml-25">Join with Us<i
                                                    class="fas fa-arrow-right ms-2"></i></a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>


