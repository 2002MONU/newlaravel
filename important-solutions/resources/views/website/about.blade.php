@extends('website.layouts.app')
@section('mainwebsite')
<div class="breadcumb-wrapper" style="background : url({{asset('assets/dynamics/setting/'.$site_setting->about_banner)}})">
  <div class="container">
     <div class="breadcumb-content">
        <h1 class="breadcumb-title">About Us</h1>
        <ul class="breadcumb-menu">
           <li><a href="{{route('home.index')}}">Home</a></li>
           <li>About Us</li>
        </ul>
     </div>
  </div>
</div>

<div class="overflow-hidden space-top space-bottom" id="about-sec">
<div class="container">
 <div class="row align-items-center justify-content-center">
   <div class="col-xl-6 mb-50 mb-xl-0 d-none">
     <div class="img-box2 text-center">
       <div class="shape1">
         <img src="assets/img/about_shape2_1.png" alt="About">
       </div>
       <div class="img1">
         <img src="assets/img/about-us-1.png" alt="About">
         <div class="year-counter bg-title" data-bg-src="assets/img/normal/about_shape2_2.png">
           <div class="year-counter_number">
             <span class="counter-number"> 7</span>
           </div>
           <p class="year-counter_text">Year Of Experience</p>
         </div>
       </div>
      <!--  <div class="img2">
         <img src="assets/img/about-us-2.png" alt="Image">
       </div>
        -->
     </div>
   </div>
   <div class="col-xl-10">
     <div class="title-area mb-32 text-center">
       <span class="sub-title">
         ABOUT OUR COMPANY  
       </span>
       <h2 class="sec-title">{{$about->title}}</h2>
       {!! $about->description !!}
      </div>
    </div>
 </div>
</div>
</div>

<div class="counter-image" data-bg-src="{{asset('assets/dynamics/setting/'.$site_setting->experience_image)}}">
<div class="container">
 <div class="counter-card-wrap">
   <div class="counter-card">
     <div class="box-icon">
       <img src="{{asset('assets/dynamics/slider/'.$about->experince_image)}}" alt="Icon">
     </div>
     <div class="media-body">
       <h2 class="box-number">
         <span class="counter-number"> {{$about->experince}}</span>+
       </h2>
       <p class="box-text">Years Of Experience</p>
     </div>
   </div>
   <div class="divider"></div>
   <div class="counter-card">
     <div class="box-icon">
       <img src="{{asset('assets/dynamics/slider/'.$about->service_image)}}" alt="Icon">
     </div>
     <div class="media-body">
       <h2 class="box-number">
         <span class="counter-number">{{$about->service}}</span>+
       </h2>
       <p class="box-text">Total Services</p>
     </div>
   </div>
   <div class="divider"></div>
   
 </div>
</div>
</div>


<div class="space-top space-bottom">
 <div class="container">
     <div class="row">
     <div class="col-md-6">
         <div class="vision-misison">
             <img src="{{asset('assets/dynamics/slider/'.$our_vision->vision_icon)}}" alt="vision icon">
             <h5>Our Vision</h5>
            {!! $our_vision->our_vision !!}
         </div><!--vison-misson-->
     </div><!--col-md6-->
           <div class="col-md-6">
         <div class="vision-misison">
             <img src="{{asset('assets/dynamics/slider/'.$our_vision->mission_icon)}}" alt="mission icon">
             <h5>Our Mision</h5>
             {!! $our_vision->our_mission !!}
         </div><!--vison-misson-->
     </div><!-col-md6-->
 </div>
 </div>
</div>

<section class="testi-sec-1 overflow-hidden d-none space-bottom" id="testi-sec" style="background: url('assets/img/why_bg_3_1.png');" >
<div class="container">
 <div class="row justify-content-center">
   <div class="col-xl-8">
     <div class="title-area text-center">
       
       <h2 class="sec-title text-white">What Clients Say About Us</h2>
     </div>
     <div class="slider-area testi-grid-area">
       <div class="testi-indicator">
         <div class="swiper th-slider testi-grid-thumb" data-slider-options='{"effect":"slide","slidesPerView":"5","spaceBetween":13,"loop":true}'>
           <div class="swiper-wrapper">
             <div class="swiper-slide">
               <div class="box-img">
                 <img src="assets/img/terstmonial-img.png" alt="Image">
               </div>
             </div>
             <div class="swiper-slide">
               <div class="box-img">
                 <img src="assets/img/terstmonial-img.png" alt="Image">
               </div>
             </div>
             <div class="swiper-slide">
               <div class="box-img">
                 <img src="assets/img/terstmonial-img.png" alt="Image">
               </div>
             </div>
             <div class="swiper-slide">
               <div class="box-img">
                 <img src="assets/img/terstmonial-img.png" alt="Image">
               </div>
             </div>
             <div class="swiper-slide">
               <div class="box-img">
                 <img src="assets/img/terstmonial-img.png" alt="Image">
               </div>
             </div>
           </div>
         </div>
       </div>
       <div class="swiper th-slider" id="testiSlide1" data-slider-options='{"effect":"slide","loop":false,"thumbs":{"swiper":".testi-grid-thumb"}}'>
         <div class="swiper-wrapper">
           <div class="swiper-slide">
             <div class="testi-card">
               <div class="quote-icon">
                 <img src="assets/img/quote.svg" alt="icon">
               </div>
               <p class="testi-card_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here</p>
               <div class="testi-card_profile">
                 <div class="testi-card_content">
                     <h3 class="testi-card_name">Name Here</h3>
                     <span class="testi-card_desig">Desgination Here</span></div>
               </div>
             </div>
           </div>
           <div class="swiper-slide">
             <div class="testi-card">
               <div class="quote-icon">
                 <img src="assets/img/quote.svg" alt="icon">
               </div>
               <p class="testi-card_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here</p>
               <div class="testi-card_profile">
                 <div class="testi-card_content">
                     <h3 class="testi-card_name">Name Here</h3>
                     <span class="testi-card_desig">Desgination Here</span></div>
               </div>
             </div>
           </div>
           <div class="swiper-slide">
             <div class="testi-card">
               <div class="quote-icon">
                 <img src="assets/img/quote.svg" alt="icon">
               </div>
               <p class="testi-card_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here</p>
               <div class="testi-card_profile">
                 <div class="testi-card_content">
                     <h3 class="testi-card_name">Name Here</h3>
                     <span class="testi-card_desig">Desgination Here</span></div>
               </div>
             </div>
           </div>
             <div class="swiper-slide">
             <div class="testi-card">
               <div class="quote-icon">
                 <img src="assets/img/quote.svg" alt="icon">
               </div>
               <p class="testi-card_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here</p>
               <div class="testi-card_profile">
                 <div class="testi-card_content">
                     <h3 class="testi-card_name">Name Here</h3>
                     <span class="testi-card_desig">Desgination Here</span></div>
               </div>
             </div>
           </div>
             <div class="swiper-slide">
             <div class="testi-card">
               <div class="quote-icon">
                 <img src="assets/img/quote.svg" alt="icon">
               </div>
               <p class="testi-card_text">It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here</p>
               <div class="testi-card_profile">
                 <div class="testi-card_content">
                     <h3 class="testi-card_name">Name Here</h3>
                     <span class="testi-card_desig">Desgination Here</span></div>
               </div>
             </div>
           </div>
            
            
         </div>
         <div class="slider-pagination"></div>
       </div>
     </div>
   </div>
 </div>
</div>
</section>

<section class="space-top space-bottom d-none" id="team-sec">
<div class="container">
<div class="row justify-content-center">
<div class="col-xl-6 col-lg-7 col-md-8">
  <div class="title-area text-center">
     
    <h2 class="sec-title">Meet Our Experience Team</h2>
  </div>
</div>
</div>
<div class="row">
 <div class="col-md-3">
     <div class="th-team team-card style2">
        <div class="img-wrap">
          <div class="team-img">
            <img src="assets/img/team-1.png" alt="Team">
          </div>
           
        </div>
        <div class="team-card-content" data-bg-src="assets/img/bg/team_card_bg_2.jpg">
          <h3 class="box-title">
            <a href="#!">Name Here</a>
          </h3>
          <span class="team-desig">Desgination Here</span>
        </div>
      </div>
 </div><!--col-md-3-->
 <div class="col-md-3">
     <div class="th-team team-card style2">
        <div class="img-wrap">
          <div class="team-img">
            <img src="assets/img/team-2.png" alt="Team">
          </div>
           
        </div>
        <div class="team-card-content" data-bg-src="assets/img/bg/team_card_bg_2.jpg">
          <h3 class="box-title">
            <a href="#!">Name Here</a>
          </h3>
          <span class="team-desig">Desgination Here</span>
        </div>
      </div>
 </div><!--col-md-3-->
 <div class="col-md-3">
     <div class="th-team team-card style2">
        <div class="img-wrap">
          <div class="team-img">
            <img src="assets/img/team-3.png" alt="Team">
          </div>
           
        </div>
        <div class="team-card-content" data-bg-src="assets/img/bg/team_card_bg_2.jpg">
          <h3 class="box-title">
            <a href="#!">Name Here</a>
          </h3>
          <span class="team-desig">Desgination Here</span>
        </div>
      </div>
 </div><!--col-md-3-->
 <div class="col-md-3">
     <div class="th-team team-card style2">
        <div class="img-wrap">
          <div class="team-img">
            <img src="assets/img/team-4.png" alt="Team">
          </div>
           
        </div>
        <div class="team-card-content" data-bg-src="assets/img/bg/team_card_bg_2.jpg">
          <h3 class="box-title">
            <a href="#!">Name Here</a>
          </h3>
          <span class="team-desig">Desgination Here</span>
        </div>
      </div>
 </div><!--col-md-3-->
</div><!--row-->

</div>
</section>
@endsection