@php
	$services = \App\Models\Service::where('status',1)->orderBy('priority','asc')->get();
	$ongoing = \App\Models\ProjectDetail::where('status',1)->where('project_id',1)->latest()->first();
	$completedproject = \App\Models\ProjectDetail::where('status',1)->where('project_id',2)->latest()->first();
	$site_setting = \App\Models\SiteSetting::find(1);
    $path = request()->path();
    $seo_details = \App\Models\SEOSetting::where('page_name', $path)->first();
    $title = $description = $keywords = '';
    if ($seo_details != '') {
        $title = $seo_details->title;
        $description = $seo_details->description;
        $keywords = $seo_details->keywords;
    }
$contact = \App\Models\ContactDetail::find(1);
$meta_tags = \App\Models\MetaTag::find(1);
@endphp
<!DOCTYPE html>
<html class="no-js" lang="zxx">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>{{$site_setting->site_name}} | {{$title}}</title>
		<meta name="keywords" content="{{$keywords}}">
		<meta name="viewport" content="width=device-width,initial-scale=1,shrink-to-fit=no">
		<meta name="msapplication-TileColor" content="#ffffff">
		<meta name="theme-color" content="#ffffff">
		<link rel="preconnect" href="https://fonts.googleapis.com/">
		<link rel="preconnect" href="https://fonts.gstatic.com/" crossorigin>
		<link href="https://fonts.googleapis.com/css2?family=Exo:wght@300;400;500;600;700;800;900&amp;family=Public+Sans:wght@100;200;300;400;500;600;700&amp;display=swap" rel="stylesheet">
		<link rel="stylesheet" href="{{asset('assets/css/app.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/fontawesome.min.css')}}">
		<link rel="stylesheet" href="{{asset('assets/css/style.css')}}">
		<link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/dynamics/'.$site_setting->favicon)}}">
		<!-- Meta tags -->
		<meta name="keywords" content="{{$keywords}}">
		<meta name="description" content="{{$description}}">
		<meta name="author" content="{{$meta_tags->author}}">
		<meta name="robots" content="follow, index, max-snippet:-1, max-video-preview:-1, max-image-preview:large">
		<link rel="canonical" href="{{$meta_tags->canonical}}">
		<meta property="og:locale" content="en_US">
		<meta property="og:type" content="{{$meta_tags->og_type}}">
		<meta property="og:title" content="{{$meta_tags->og_title}}">
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
	</head>
	<body>
		<div class="preloader">
			<div class="preloader-inner"><span class="loader"></span></div>
		</div>
		<div class="sidemenu-wrapper d-none d-lg-block">
			<div class="sidemenu-content sidemenu-area">
				<button class="closeButton sideMenuCls"><i class="fa-solid fa-xmark"></i></button>
				<div class="widget">
					<div class="th-widget-about">
						<div class="about-logo">
							<a href="{{route('website.index')}}">
								<img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" alt="logo">
							</a>
						</div>
						<p class="about-text">{{$site_setting->header_title}}</p>
						<div class="th-social style2">
							<h6 class="title">FOLLOW US ON </h6>
							<a href="{{$contact->facebook}}"><i class="fa-brands fa-facebook-f"></i></a>
							<a href="{{$contact->twitter}}"><i class="fa-brands fa-x-twitter"></i></a>
							<a href="{{$contact->instagram}}"><i class="fa-brands fa-instagram"></i></a>
							<a href="{{$contact->youtube}}"><i class="fa-brands fa-youtube"></i></a>
						</div>
					</div>
				</div>
				<div class="widget widget_contact">
					<h3 class="widget_title">Get in touch</h3>
					<div class="th-widget-contact">
						<div class="info-box-wrap">
							<div class="info-box_icon">
								<i class="fas fa-location-dot"></i>
							</div>
							<p class="info-box_text">{{$contact->address}}</p>
						</div>
						<div class="info-box-wrap">
							<div class="info-box_icon"><i class="fas fa-envelope"></i></div>
							<a href="mailto:{{$contact->email}}" class="info-box_link">{{$contact->email}}</a>
						</div>
						<div class="info-box-wrap">
							<div class="info-box_icon"><i class="fas fa-phone"></i></div>
							<a href="tel:+91{{$contact->mobile_no}}" class="info-box_link">+91 {{$contact->mobile_no}}</a>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="popup-search-box d-none d-lg-block">
			<button class="searchClose"><i class="fa-solid fa-xmark"></i></button>
		</div>
		<div class="th-menu-wrapper">
			<div class="th-menu-area text-center">
				<button class="th-menu-toggle"><i class="fal fa-times"></i></button>
				<div class="mobile-logo">
					<a href="{{route('website.index')}}">
					<img src="assets/images/logo.png" alt=""></a>
				</div>
				<div class="th-mobile-menu">
					<ul>
						<li class="menu-item-has-children">
							<a href="{{route('website.index')}}">Home</a>
						</li>
						<li><a href="{{route('website.about')}}">About Us</a></li>
						<li>
							<a href="{{route('website.packages')}}">Packages</a>
						</li>
						<li class="menu-item-has-children">
											<a href="#">Services</a>
											<ul class="sub-menu">
												@foreach ($services as $service)
												<li>
													<a href="javascript:void(0);">{{$service->service_name}}</a>
													@php
														$service_details = \App\Models\ServiceDetail::where('status',1)->where('service_id',$service->id)->orderBy('priority','asc')->get();
													@endphp
													@if($service_details->isEmpty())
													@else
													<ul class="sub-menu">
														<li class="menu-item-has-children">
                                                            @foreach ($service_details as $details)
															<li><a href="{{route('website.service',$details->slug)}}">{{$details->service_title}}</a></li>
															@endforeach
														</li>
													</ul>
													@endif
												</li>
												@endforeach
											</ul>
										</li>
						<li class="menu-item-has-children">
							<a href="#">Projects</a>
							<ul class="sub-menu">
								@if($ongoing)
								<li><a href="{{route('website.project-details',$ongoing->slug)}}">Ongoing Projects</a></li>
								@else
									<li><a>No On Going Project</a></li>
								@endif
								@if($completedproject)
								<li><a href="{{route('website.project-details',$completedproject->slug)}}">Completed Projects</a></li>
								@else
									<li><a>No Completed Projects</a></li>
								@endif
							</ul>
						</li>
						<li><a href="{{route('website.contact')}}">Contact Us</a></li>
					</ul>
				</div>
			</div>
		</div>
		<header class="th-header header-layout-default">
			<div class="header-top">
				<div class="container th-container">
					<div class="row justify-content-center justify-content-lg-between align-items-center gy-2">
						<div class="col-auto d-none d-lg-block">
							<div class="header-links">
								<ul>
									<li><i class="fa-solid fa-phone"></i>
										<a href="tel:+91{{$contact->mobile_no}}">+91  {{$contact->mobile_no}}</a>
									</li>
									<li class="d-none d-xl-inline-block">
										<i class="far fa-envelope"></i>
										<a href="mailto:{{$contact->email}}"> {{$contact->email}}</a>
									</li>
								</ul>
							</div>
						</div>
						<div class="col-auto">
							<div class="header-links header-right">
								<ul>
									<li>
										<div class="header-social">
											<span class="social-title">Follow Us:</span>
											<a href="{{$contact->facebook}}"><i class="fa-brands fa-facebook-f"></i></a>
											<a href="{{$contact->twitter}}"><i class="fa-brands fa-x-twitter"></i></a>
											<a href="{{$contact->instagram}}"><i class="fa-brands fa-instagram"></i></a>
											<a href="{{$contact->youtube}}"><i class="fa-brands fa-youtube"></i></a>
										</div>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="sticky-wrapper">
				<div class="menu-area">
					<div class="container th-container">
						<div class="row align-items-center justify-content-between">
							<div class="col-auto">
								<div class="header-logo">
									<a href="{{route('website.index')}}"><img src="{{asset('assets/dynamics/'.$site_setting->header_logo)}}" width="200" alt=""></a>
								</div>
							</div>
							<div class="col-auto">
								<nav class="main-menu d-none d-lg-inline-block">
									<ul>
										<li>
											<a href="{{route('website.index')}}">Home</a>
										</li>
										<li>
											<a href="{{route('website.about')}}">About Us</a>
										</li>
										<li>
											<a href="{{route('website.packages')}}">Packages</a>
										</li>
										<li class="menu-item-has-children">
											<a href="#">Services</a>
											<ul class="sub-menu">
												@foreach ($services as $service)
												<li>
													<a href="javascript:void(0);">{{$service->service_name}}</a>
													@php
														$service_details = \App\Models\ServiceDetail::where('status',1)->where('service_id',$service->id)->orderBy('priority','asc')->get();
													@endphp
													@if($service_details->isEmpty())
													@else
													<ul class="sub-menu">
														<li class="menu-item-has-children">
                                                            @foreach ($service_details as $details)
															<li><a href="{{route('website.service',$details->slug)}}">{{$details->service_title}}</a></li>
															@endforeach
														</li>
													</ul>
													@endif
												</li>
												@endforeach
												
											</ul>
										</li>
										<li class="menu-item-has-children">
											<a href="#">Projects</a>
											<ul class="sub-menu">
												@if($ongoing)
												<li><a href="{{route('website.project-details',$ongoing->slug)}}">Ongoing Projects</a></li>
												@else
                                                 <li><a>No On Going Project</a></li>
												@endif
												@if($completedproject)
												<li><a href="{{route('website.project-details',$completedproject->slug)}}">Completed Projects</a></li>
												@else
                                                 <li><a>No Completed Projects</a></li>
												@endif
											</ul>
										</li>
										<li><a href="{{route('website.contact')}}">Contact Us</a></li>
									</ul>
								</nav>
								<button type="button" class="th-menu-toggle d-block d-lg-none"><i class="fa-solid fa-bars"></i></button>
							</div>
							<div class="col-auto d-none d-xl-block">
								<div class="row">
									<div class="col-auto">
										<div class="header-button">
											<button type="button" class="icon-btn sideMenuToggler"><i class="fa-solid fa-bars"></i></button>
											<a href="{{route('website.contact')}}" class="th-btn ml-20">Get in touch <i class="fas fa-arrow-right ms-1"></i></a>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="logo-bg" data-bg-src="{{asset('assets/img/bg/logo-bg-2.png')}}"></div>
				</div>
			</div>
		</header>