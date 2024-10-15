@extends('website.layouts.app')
@section('website')
    <div class="th-hero-wrapper hero-2" id="hero">
        <div class="hero-slider-2 th-carousel" id="heroSlide2" data-slide-show="1" data-md-slide-show="1" data-fade="true">
            @foreach ($sliders as $slider)
                <div class="th-hero-slide">
                    <div class="th-hero-bg" data-bg-src="{{ asset('assets/dynamics/' . $slider->banner_image) }}">
                    </div>
                    <div class="container th-container">
                        <div class="hero-style2">
                            <div class="hero-meta" data-ani="slideindown" data-ani-delay="0.5s">
                                <span>{{ $slider->span_01 }}</span>
                                <span>{{ $slider->span_02 }}</span>
                            </div>
                            <h1 class="hero-title text-white" data-ani="slideindown" data-ani-delay="0.4s">
                                {{ $slider->h_01 }}</h1>
                            <h1 class="hero-title text-white" data-ani="slideindown" data-ani-delay="0.1s">
                                {{ $slider->h_02 }}<span class="text-theme">{{ $slider->h_03 }}</span></h1>
                            <p class="hero-text" data-ani="slideinup" data-ani-delay="0.1s">{{ $slider->description }}</p>
                            <div class="btn-group" data-ani="slideinup" data-ani-delay="0.5s">
<!--                                <a href="{{route('website.service',$service->slug)}}" class="th-btn style3">Our Services<i
                                        class="fas fa-long-arrow-right ms-2"></i></a>-->
                                <a href="{{route('website.contact')}}" class="th-btn style2">Book Your Free Consultation<i
                                     class="fas fa-long-arrow-right ms-2"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach

        </div>
        <div class="icon-box">
            <button data-slick-prev="#heroSlide2" class="slick-arrow default"><i
                    class="fa-solid fa-angle-left"></i></button>
            <button data-slick-next="#heroSlide2" class="slick-arrow default"><i
                    class="fa-solid fa-angle-right"></i></button>
        </div>
    </div>
    <div class="space bg-smoke overflow-hidden" id="about-sec">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="img-box1">
                        <div class="img1">
                            <img class="tilt-active w-100" src="{{ asset('assets/dynamics/' . $about->top_image) }}"
                                alt="About">
                        </div>
                        <div class="about-grid">
                            <h3 class="about-grid_year">
                                <span class="counter-number">{{ $about->experience }}</span>
                                <span>+</span>
                            </h3>
                            <p class="about-grid_text">years of experience in construction</p>
                        </div>
                        <div class="img2">
                            <img class="tilt-active w-100" src="{{ asset('assets/dynamics/' . $about->bottom_image) }}"
                                alt="About">
                        </div>
                        <div class="shape-mockup about-shape1 jump" data-left="-67px" data-bottom="0">
                            <img src="{{ asset('assets/img/normal/about_1_shape1.png') }}" alt="img">
                        </div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="title-area mb-30">
                        <span class="sub-title">
                            <img src="{{ asset('assets/images/subtitle-img.svg') }}" alt="img"> About Us
                            </span>
                        <h2 class="sec-title">{{ $about->title }}</h2>
                    </div>
                    {!! $about->description !!}
                    <div class="about-feature">
                        <div class="about-feature_icon">
                            <img src="{{ asset('assets/images/mission.png') }}" width="40" alt="icon">
                        </div>
                        <div>
                            <h3 class="about-feature_title">Our Mission</h3>
                            {!! $about->mission_description !!}
                        </div>
                    </div>
                    <div class="about-feature">
                        <div class="about-feature_icon">
                            <img src="{{ asset('assets/images/vision.png') }}" width="40" alt="icon">
                        </div>
                        <div>
                            <h3 class="about-feature_title">Our Vision</h3>
                            {!! $about->vision_description !!}
                        </div>
                    </div>
                    <div class="btn-group mt-40">
                        <a href="{{ route('website.about') }}" class="th-btn">More About Us<i
                                class="fa-solid fa-angles-right ms-2"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="project-sec-10 bg-top-center overflow-hidden"
        data-bg-src="{{ asset('assets/img/update1/bg/project_bg_2.jpg') }}">
        <div class="z-index-common">
            <div class="th-container6 bg-smoke bg-repeat"
                data-bg-src="{{ asset('assets/img/update1/bg/bg_pattern_15.png') }}">
                <div class="container counter-card-wrap2">
                    <div class="row gy-30 justify-content-between">
                        <div class="col-sm-6 col-xl-auto col-6">
                            <div class="counter-card style2">
                                <div class="counter-card_icon">
                                    <img src="{{ asset('assets/images/experience.png') }}" alt="icon">
                                </div>
                                <div class="media-body">
                                    <h2 class="counter-card_number text-title">
                                        <span class="counter-number">{{ $achievement->experience }}</span>
                                    </h2>
                                    <p class="counter-card_text text-body">Years Experience</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-auto col-6">
                            <div class="counter-card style2">
                                <div class="counter-card_icon">
                                    <img src="{{ asset('assets/images/projects.png') }}" alt="icon">
                                </div>
                                <div class="media-body">
                                    <h2 class="counter-card_number text-title">
                                        <span class="counter-number">{{ $achievement->completed_project }}</span>+
                                    </h2>
                                    <p class="counter-card_text text-body">Completed Projects</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-auto col-6">
                            <div class="counter-card style2">
                                <div class="counter-card_icon">
                                    <img src="{{ asset('assets/images/ongoing.png') }}" alt="icon">
                                </div>
                                <div class="media-body">
                                    <h2 class="counter-card_number text-title"><span
                                            class="counter-number">{{ $achievement->ongoing_project }}</span></h2>
                                    <p class="counter-card_text text-body">Ongoing Projects</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-xl-auto col-6">
                            <div class="counter-card style2">
                                <div class="counter-card_icon">
                                    <img src="{{ asset('assets/images/team.png') }}" alt="icon">
                                </div>
                                <div class="media-body">
                                    <h2 class="counter-card_number text-title"><span
                                            class="counter-number">{{ $achievement->skilled_worker }}</span>+</h2>
                                    <p class="counter-card_text text-body">Skilled Workforce</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="space space-bottom">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-9 col-lg-10">
                    <div class="title-area text-center">
                        <h2 class="sec-title">Our Projects</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="tab-menu2 filter-menu-active">
                        <button data-filter=".cat1" class="active" type="button">All</button>
                        <button data-filter=".cat2" type="button">Completed Projects</button>
                        <button data-filter=".cat3" type="button">Ongoing Projects</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <div class="mission-box-wrap mt-50 filter-active-cat1">
                <div class="filter-item cat1">
                    <div class="container">
                        <div class="row">
                            @if ($projects->isEmpty())
                                <h5>No Records Found</h5>
                            @else
                                @foreach ($projects as $project)
                                    <div class="col-lg-4">
                                        <div class="project-block2">
                                            <div class="project-img">
                                                <img src="{{ asset('assets/dynamics/' . $project->project_main_image) }}"
                                                    alt="project image">
                                            </div>
                                            <div class="project-content">
                                                <h3 class="project-title h4"><a
                                                        href="{{ route('website.project-details', $project->slug) }}">{{ $project->project_title }}</a>
                                                </h3>
                                                <p class="project-text"> Location : {{ $project->location }}</p>
                                                <p class="project-text"> Built Up Area :{{ $project->built_up_area }} </p>
                                                <p class="project-text"> Project Type : {{ $project->project_type }}</p>
                                                <p class="project-text"> Status : {{ $project->project_status }}</p>
                                                <a href="{{ route('website.project-details', $project->slug) }}"
                                                    class="link-btn">VIEW DETAILS<i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="filter-item cat2">
                    <div class="container">
                        <div class="row">
                            @if ($completed_project->isEmpty())
                                <h5>No Records Found</h5>
                            @else
                                @foreach ($completed_project as $project)
                                    <div class="col-lg-4">
                                        <div class="project-block2">
                                            <div class="project-img">
                                                <img src="{{ asset('assets/dynamics/' . $project->project_main_image) }}"
                                                    alt="project image">
                                            </div>
                                            <div class="project-content">
                                                <h3 class="project-title h4"><a
                                                        href="{{ route('website.project-details', $project->slug) }}">{{ $project->project_title }}</a>
                                                </h3>
                                                <p class="project-text"> Location : {{ $project->location }}</p>
                                                <p class="project-text"> Built Up Area :{{ $project->built_up_area }} </p>
                                                <p class="project-text"> Project Type : {{ $project->project_type }}</p>
                                                <p class="project-text"> Status : {{ $project->project_status }}</p>
                                                <a href="{{ route('website.project-details', $project->slug) }}"
                                                    class="link-btn">VIEW DETAILS<i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>
                <div class="filter-item cat3">
                    <div class="container">
                        <div class="row">
                            @if ($ongoing_project->isEmpty())
                                <h5>No Records Found</h5>
                            @else
                                @foreach ($ongoing_project as $project)
                                    <div class="col-lg-4">
                                        <div class="project-block2">
                                            <div class="project-img">
                                                <img src="{{ asset('assets/dynamics/' . $project->project_main_image) }}"
                                                    alt="project image">
                                            </div>
                                            <div class="project-content">
                                                <h3 class="project-title h4"><a
                                                        href="{{ route('website.project-details', $project->slug) }}">{{ $project->project_title }}</a>
                                                </h3>
                                                <p class="project-text"> Location : {{ $project->location }}</p>
                                                <p class="project-text"> Built Up Area :{{ $project->built_up_area }} </p>
                                                <p class="project-text"> Project Type : {{ $project->project_type }}</p>
                                                <p class="project-text"> Status : {{ $project->project_status }}</p>
                                                <a href="{{ route('website.project-details', $project->slug) }}"
                                                    class="link-btn">VIEW DETAILS<i class="fas fa-arrow-right"></i></a>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            @endif

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="why-sec-v2 overflow-hidden space pt-0">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-xl-6">
                    <div class="wcu-img-2 tilt-active mb-50 mb-xl-0 me-xl-4">
                        <img src="{{ asset('assets/dynamics/' . $whyChooseUs->side_image) }}" alt="img">
                        <div class="wcu-experience-wrap movingX"><span>SINCE</span>{{ $whyChooseUs->year }}</div>
                    </div>
                </div>
                <div class="col-xl-6">
                    <div class="wcu-wrap2 ms-xxl-5">
                        <div class="title-area mb-xl-5">
                            <h2 class="sec-title">{{ $whyChooseUs->title }}</h2>
                            {!! $whyChooseUs->title !!}
                        </div>
                        <div class="row g-4">
                            <div class="col-sm-6">
                                <div class="wcu-box style2">
                                    <div class="wcu-box_icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <div class="wcu-box_details">
                                        <h3 class="h5 wcu-box_title">{{ $whyChooseUs->box_01_title }}</h3>
                                        <p class="wcu-box_text">{{ $whyChooseUs->box_01_description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="wcu-box style2">
                                    <div class="wcu-box_icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <div class="wcu-box_details">
                                        <h3 class="h5 wcu-box_title">{{ $whyChooseUs->box_02_title }}</h3>
                                        <p class="wcu-box_text">{{ $whyChooseUs->box_02_description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="wcu-box style2">
                                    <div class="wcu-box_icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <div class="wcu-box_details">
                                        <h3 class="h5 wcu-box_title">{{ $whyChooseUs->box_03_title }}</h3>
                                        <p class="wcu-box_text">{{ $whyChooseUs->box_03_description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="wcu-box style2">
                                    <div class="wcu-box_icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <div class="wcu-box_details">
                                        <h3 class="h5 wcu-box_title">{{ $whyChooseUs->box_04_title }}</h3>
                                        <p class="wcu-box_text">{{ $whyChooseUs->box_04_description }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <div class="wcu-box style2">
                                    <div class="wcu-box_icon">
                                        <i class="fa-solid fa-house"></i>
                                    </div>
                                    <div class="wcu-box_details">
                                        <h3 class="h5 wcu-box_title">{{ $whyChooseUs->box_05_title }}</h3>
                                        <p class="wcu-box_text">{{ $whyChooseUs->box_05_description }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="testi-area-2 space" data-bg-src="assets/img/bg/footer-bg.png">
        <div class="container">
            <div class="title-area text-center">
                <h2 class="sec-title text-white">What Our Clients Say?</h2>
            </div>
            <div class="row testi-slider2 th-carousel arrow-style4" data-slide-show="3" data-lg-slide-show="2"
                data-md-slide-show="1" data-arrows="true" data-adaptive-height="true">
                @foreach ($testimonials as $testi)
                    <div class="col-lg-6">
                        <div class="testi-card style2">
                            <div class="testi-card-icon">
                                <img src="{{ asset('assets/img/icon/testi-quote2.svg') }}" alt="img">
                            </div>
                            {!! $testi->description !!}
                            <div class="testi-card_content">
                                <div class="testi-card_img">
                                    <img src="{{ asset('assets/dynamics/' . $testi->image) }}" alt="Avater">
                                </div>
                                <div class="testi-card_bottom">
                                    <h3 class="testi-card_name">{{ $testi->name }}</h3>
                                    <!-- <span class="testi-card_desig">Architect</span> -->
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach

            </div>
        </div>
    </section>
    <div class="overflow-hidden space">
        <div class="container">
            <div class="row flex-row-reverse align-items-center">
                <div class="col-xl-5">
                    <div class="contact-form-wrap bg-smoke">
                        @if (session('success'))
                            <div class="alert alert-success">{{ session('success') }}</div>
                        @endif
                        <h6 class="subtitle text-theme text-center mb-2">Contact Us</h6>
                        <h2 class="title h4 text-center">Need to Make An Enquiry</h2>
                        <form class="contact-form" action="{{ route('contact-form-enquiry') }}" method="POST" onsubmit="return validateForm();">
                            @csrf
                            <div class="row">
                                <div class="col-xxl-6 col-xl-12 col-md-6">
                                    <div class="form-group">
                                        <input type="text" class="form-control style-white" name="full_name" id="name" placeholder="Your Name*">
                                        <i class="fal fa-user"></i>
                                        <div class="text-danger" id="full_name_error"></div> <!-- Error message area -->
                                        @error('full_name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-12 col-md-6">
                                    <div class="form-group">
                                        <input type="email" class="form-control style-white" name="email" id="email" placeholder="Email Address*">
                                        <i class="fal fa-envelope"></i>
                                        <div class="text-danger" id="email_error"></div> <!-- Error message area -->
                                        @error('email')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-12 col-md-6">
                                    <div class="form-group">
                                        <select name="subject" id="subject" class="single-select nice-select form-select style-white mb-2">
                                            <option value="" disabled="disabled" selected="selected" hidden>Select Subject*</option>
                                            <option value="Construction">Construction</option>
                                            <option value="Real Estate">Real Estate</option>
                                            <option value="Industry">Industry</option>
                                            <option value="Architect">Architect</option>
                                        </select>
                                        <div class="text-danger" id="subject_error"></div> <!-- Error message area -->
                                        @error('subject')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-xxl-6 col-xl-12 col-md-6">
                                    <div class="form-group">
                                        <input type="tel" class="form-control style-white" name="phone_no" id="number" 
                                               placeholder="Phone Number*" onkeypress="return isNumberKey(event)">
                                        <i class="fal fa-phone"></i>
                                        <div class="text-danger" id="phone_no_error"></div> <!-- Error message area -->
                                        @error('phone_no')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <textarea name="message" id="message" cols="30" rows="3" class="form-control style-white" placeholder="Write Your Message*"></textarea>
                                        <i class="fal fa-pen"></i>
                                        <div class="text-danger" id="message_error"></div> <!-- Error message area -->
                                        @error('message')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-btn col-12">
                                    <button class="th-btn w-100">Send Message <i class="fas fa-long-arrow-right ms-2"></i></button>
                                </div>
                            </div>
                            <p class="form-messages mb-0 mt-3"></p>
                        </form>
                        
                    </div>
                </div>
                <div class="col-xl-7">
                    <div class="title-area mb-30">
                        <span class="sub-title4">Frequently Asked  Questions</span>
                        <h2 class="h3 sec-title fw-semibold">Talk To About Your Next Dream Projects</h2>
                    </div>
                    <div class="accordion-area accordion mt-xl-0 mt-40" id="faqAccordion">

                        @foreach ($faqs as $faq)
                            <div class="accordion-card style2 ">
                                <div class="accordion-header" id="collapse-item-{{ $faq->id }}">
                                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse-{{ $faq->id }}" aria-expanded="false"
                                        aria-controls="collapse-{{ $faq->id }}">
                                        {{ $loop->iteration }} . {{ $faq->question }}
                                    </button>
                                </div>
                                <div id="collapse-{{ $faq->id }}" class="accordion-collapse collapse "
                                    aria-labelledby="collapse-item-{{ $faq->id }}" data-bs-parent="#faqAccordion">
                                    <div class="accordion-body">
                                        <p class="faq-text">
                                            {{ $faq->answer }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        @endforeach

                    </div>
                </div>
            </div>

        </div>
    </div>
    <section class="price-area-1 pt-5 pb-5" style="background-image: url(&quot;assets/images/price_bg_1.jpg&quot;);">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-12">
                    <div class="title-area text-center">
                        <h2 class="sec-title fw-semibold">Compare Packages</h2>
                    </div>
                </div>
                <div class="col-lg-5 col-md-6">
                    <div class="form-group">
                        <select id="selectpackage1" class="selectpackage1 single-select nice-select form-select"
                            name="cars">
                            <option value="" selected="selected" hidden>Please Choose Package...</option>
                            @foreach ($package_name as $package)
                                <option value="{{ $package->id }}">
                                    {{ $package->package_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-lg-5 col-md-6">
                    <div class="form-group">
                        <select name="package2" id="selectpackage2"
                            class="selectpackage2 single-select nice-select form-select">
                            <option value="" selected="selected" hidden>Please Choose Package...</option>
                            @foreach ($package_name as $package)
                                <option value="{{ $package->id }}">
                                    {{ $package->package_name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-lg-10 col-md-12">
                    <details>
                        <summary>Designs & Drawings</summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6 col-sm-6">
                                <div class="content dd1">
                              </div>
                            </div>
                            <div class="col-lg-6 col-6 col-sm-6">
                                <div class="content dd2">
                                </div>
                            </div>
                        </div>
                    </details>
                    <details>
                        <summary> Structure</summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content structure1">  </div>
                            </div>
                            <div class="col-lg-6  col-6 ">
                                <div class="content structure2"> </div>
                            </div>
                        </div>
                    </details>
                    <details>
                        <summary> Kitchen </summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content Kitchen1">
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="content Kitchen2"> </div>
                            </div>
                        </div>
                    </details>
                    <details>
                        <summary> Bathroom </summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content Bathroom1"> </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="content Bathroom2"> </div>
                            </div>
                        </div>
                    </details>
                    <details>
                        <summary> Doors & Windows </summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content  DoorsWindows1">  </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="content DoorsWindows2"></div>
                            </div>
                        </div>
                    </details>
                    <details>
                        <summary>
                            Painting
                        </summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content Painting1"> </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="content Painting2"> </div>
                            </div>
                        </div>
                    </details>
                    <details>
                        <summary> Flooring </summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content Flooring1"> </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="content Flooring2"> </div>
                            </div>
                        </div>
                    </details>
                    <details>
                        <summary> Electrical </summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content Electrical1"> </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="content Electrical2"> </div>
                            </div>
                        </div>
                    </details>
                    <details>
                        <summary> Miscellaneous </summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content Miscellaneous1"> </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="content Miscellaneous2"></div>
                            </div>
                        </div>
                    </details>

                    <details>
                        <summary> Not Included in Packages </summary>
                        <div class="row justify-content-center">
                            <div class="col-lg-6 col-6">
                                <div class="content not_included_in_packages1">
                                    <p></p>
                                </div>
                            </div>
                            <div class="col-lg-6 col-6">
                                <div class="content not_included_in_packages2">
                                    <p></p>
                                </div>
                            </div>
                        </div>
                    </details>
                </div>
            </div>

        </div>
    </section>

@section('js_code')
<script>
    $(document).ready(function() {

        // Event listener for selecting package 1
        $(document).on('change', '#selectpackage1', function() {
            var package1Id = $(this).val();

            if (!package1Id) {
                return;
            }

            var data1 = {
                'id': parseInt(package1Id),
            };

            getpackage1(data1);
        });

        // Event listener for selecting package 2
        $(document).on('change', '#selectpackage2', function() {
            var package2Id = $(this).val();

            if (!package2Id) {
                return;
            }

            var data2 = {
                'id': parseInt(package2Id),
            };

            getpackage2(data2);
        });

        // Function to fetch and display data for Package 1
        function getpackage1(data) {
            $.ajax({
                type: "POST",
                url: "api/packageData", // Update this URL to match your route
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log("Package 1 Response:", response); // Log the response for debugging

                    // Clear previous content before assigning new data
                    $('.dd1, .structure1, .Kitchen1, .Bathroom1, .DoorsWindows1, .Painting1, .Flooring1, .Electrical1, .Miscellaneous1, .not_included_in_packages1').html('');

                    if (response && response.length > 0) {
                        response.forEach(function(item) {
                            for (var key in item) {
                                if (item.hasOwnProperty(key)) {
                                    // Safely assign content to the appropriate section, with fallback for missing data
                                    if (key === 'designs_drawings') {
                                        $('.dd1').html(item[key] || 'Not Available');
                                    } else if (key === 'structure') {
                                        $('.structure1').html(item[key] || 'Not Available');
                                    } else if (key === 'kitchen') {
                                        $('.Kitchen1').html(item[key] || 'Not Available');
                                    } else if (key === 'bathroom') {
                                        $('.Bathroom1').html(item[key] || 'Not Available');
                                    } else if (key === 'doors_windows') {
                                        $('.DoorsWindows1').html(item[key] || 'Not Available');
                                    } else if (key === 'painting') {
                                        $('.Painting1').html(item[key] || 'Not Available');
                                    } else if (key === 'flooring') {
                                        $('.Flooring1').html(item[key] || 'Not Available');
                                    } else if (key === 'electrical') {
                                        $('.Electrical1').html(item[key] || 'Not Available');
                                    } else if (key === 'miscellaneous') {
                                        $('.Miscellaneous1').html(item[key] || 'Not Available');
                                    } else if (key === 'not_included_in_packages') {
                                        $('.not_included_in_packages1').html(item[key] || 'Not Available');
                                    }
                                }
                            }
                        });
                    } else {
                        console.log("No data found for Package 1.");
                    }
                },
                error: function(err) {
                    console.log("Error fetching Package 1 data:", err);
                    // Clear content in case of error
                   // $('.dd1, .structure1, .Kitchen1, .Bathroom1, .DoorsWindows1, .Painting1, .Flooring1, .Electrical1, .Miscellaneous1, .not_included_in_packages1').html('Error fetching data');
                }
            });
        }

        // Function to fetch and display data for Package 2
        function getpackage2(data) {
            $.ajax({
                type: "POST",
                url: "api/packageData", // Update this URL to match your route
                data: data,
                dataType: "json",
                success: function(response) {
                    console.log("Package 2 Response:", response); // Log the response for debugging

                    // Clear previous content before assigning new data
                    $('.dd2, .structure2, .Kitchen2, .Bathroom2, .DoorsWindows2, .Painting2, .Flooring2, .Electrical2, .Miscellaneous2, .not_included_in_packages2').html('');

                    if (response && response.length > 0) {
                        response.forEach(function(item) {
                            for (var key in item) {
                                if (item.hasOwnProperty(key)) {
                                    // Safely assign content to the appropriate section, with fallback for missing data
                                    if (key === 'designs_drawings') {
                                        $('.dd2').html(item[key] || 'Not Available');
                                    } else if (key === 'structure') {
                                        $('.structure2').html(item[key] || 'Not Available');
                                    } else if (key === 'kitchen') {
                                        $('.Kitchen2').html(item[key] || 'Not Available');
                                    } else if (key === 'bathroom') {
                                        $('.Bathroom2').html(item[key] || 'Not Available');
                                    } else if (key === 'doors_windows') {
                                        $('.DoorsWindows2').html(item[key] || 'Not Available');
                                    } else if (key === 'painting') {
                                        $('.Painting2').html(item[key] || 'Not Available');
                                    } else if (key === 'flooring') {
                                        $('.Flooring2').html(item[key] || 'Not Available');
                                    } else if (key === 'electrical') {
                                        $('.Electrical2').html(item[key] || 'Not Available');
                                    } else if (key === 'miscellaneous') {
                                        $('.Miscellaneous2').html(item[key] || 'Not Available');
                                    } else if (key === 'not_included_in_packages') {
                                        $('.not_included_in_packages2').html(item[key] || 'Not Available');
                                    }
                                }
                            }
                        });
                    } else {
                        console.log("No data found for Package 2.");
                    }
                },
                error: function(err) {
                    console.log("Error fetching Package 2 data:", err);
                    // Clear content in case of error
                   // $('.dd2, .structure2, .Kitchen2, .Bathroom2, .DoorsWindows2, .Painting2, .Flooring2, .Electrical2, .Miscellaneous2, .not_included_in_packages2').html('Error fetching data');
                }
            });
        }

    });
</script>

    <script>
        function validateForm() {
            // Clear previous error messages
            document.getElementById("full_name_error").innerText = "";
            document.getElementById("email_error").innerText = "";
            document.getElementById("subject_error").innerText = "";
            document.getElementById("phone_no_error").innerText = "";
            document.getElementById("message_error").innerText = "";
        
            // Get form field values
            let fullName = document.getElementById("name").value.trim();
            let email = document.getElementById("email").value.trim();
            let subject = document.getElementById("subject").value;
            let phoneNo = document.getElementById("number").value.trim();
            let message = document.getElementById("message").value.trim();
        
            let isValid = true;
        
            // Validate Full Name
            if (fullName === "") {
                document.getElementById("full_name_error").innerText = "Your Name is required.";
                isValid = false;
            }
        
            // Validate Email
            if (email === "") {
                document.getElementById("email_error").innerText = "Email Address is required.";
                isValid = false;
            } else {
                const emailPattern = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/;
                if (!emailPattern.test(email)) {
                    document.getElementById("email_error").innerText = "Please enter a valid email address.";
                    isValid = false;
                }
            }
        
            // Validate Subject
            if (subject === "") {
                document.getElementById("subject_error").innerText = "Subject is required.";
                isValid = false;
            }
        
            // Validate Phone Number
            if (phoneNo === "") {
                document.getElementById("phone_no_error").innerText = "Phone Number is required.";
                isValid = false;
            } else if (phoneNo.length !== 10 || isNaN(phoneNo)) {
                document.getElementById("phone_no_error").innerText = "Please enter a valid 10-digit phone number.";
                isValid = false;
            }
        
            // Validate Message
            if (message === "") {
                document.getElementById("message_error").innerText = "Message is required.";
                isValid = false;
            }
        
            return isValid; // Only return true if all validations pass
        }
        </script>
<script>
    function isNumberKey(evt) {
        var charCode = (evt.which) ? evt.which : evt.keyCode;
        // Allow only numbers (0-9), backspace, and delete keys
        if (charCode > 31 && (charCode < 48 || charCode > 57)) {
            return false;
        }
        return true;
    }
    </script>        
@endsection
@endsection
