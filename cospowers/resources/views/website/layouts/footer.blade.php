@php
   $services = \App\Models\Service::where('status',1)->latest()->limit(8)->get();
   $social = \App\Models\SocialLink::find(1);
   $products = \App\Models\Product::where('status',1)->latest()->limit(8)->get();
   $contact = \App\Models\ContactDetails::find(1);
   $site_setting = \App\Models\SiteSetting::find(1);
@endphp
        <!-- footer begin -->
        <div class="footer footer-2" style="background : url({{asset('assets/img/footer-img.png')}})">
            <div class="container">
                <div class="row mb-4 justify-content-between">

                    <div class="col-xl-4 col-lg-4">
                        <div class="about-widget address-div links-widget">
                             <img src="{{asset('assets/dynamics/'.$site_setting->footer_logo)}}">
                            <ul>
                                <li>
                                    <strong>Address :</strong>
                                    <p>{{$contact->address}}</p>
                                </li>
                                 <li>
                                    <strong>Mail  :</strong>
                                    <p>
                                        <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                                    </p>
                                </li>
                                <li>
                                    <strong>Mobile No :</strong>
                                    <p>
                                        <a href="tel:{{$contact->mobile_no}}">+91 {{$contact->mobile_no}}</a>
                                    </p>
                                </li>
                            </ul>
                        </div>
                         
                    </div>

                    <div class="col-xl-2 col-lg-2">
                        <div class="links-widget">
                            <h3>Products</h3>
                            <ul>
                              @foreach ($products as $product)
                              <li>
                                  <a href="{{route('home.product-details',$product->slug)}}">{{$product->title}}</a>
                              </li>
                              @endforeach
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-xl-2 col-lg-2">
                        <div class="links-widget">
                            <h3>Services</h3>
                            <ul>
                              @foreach ($services as $service)
                              <li>
                                  <a href="{{route('home.services-details',$service->slug)}}">{{$service->title}}</a>
                              </li>
                              @endforeach
                                
                            </ul>
                        </div>
                    </div>

                     <div class="col-xl-4 col-lg-4">
                        <div class="address-div links-widget">
                            <h3>Map</h3>
                             <iframe src=" {{$contact->map_link}}" width="100%" height="200" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>

                </div>

                <div class="copyright">
                <div class="row justify-content-between">
                    <div class="col-xl-9 col-lg-9 d-xl-flex d-lg-flex d-block align-items-center">
                        <div class="cp-area">
                            <p>Copyright <?php echo date('Y') ?> cospower. All rights reserved. Design and Developed by <a target="_blank" href="https://thecolourmoon.com/">Colourmoon.</a></p>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3">
                        <div class="social-area">
                            <ul>
                                <li>
                                    <a class="facebook" href="{{$social->facebook}}"><i class="fab fa-facebook-f"></i></a>
                                </li>
                                <li>
                                    <a class="twitter" href="{{$social->twitter}}"><i class="fa-brands fa-x-twitter"></i></a>
                                </li>
                                <li>
                                    <a class="youtube" href="{{$social->youtube}}"><i class="fab fa-youtube"></i></a>
                                </li>
                                  <li>
                                    <a class="instagram" href="{{$social->instagarm}}"><i class="fab fa-instagram"></i></a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            </div>
        </div>
        <!-- footer end -->

      <div class="fixwhcall d-block d-md-none d-lg-none">
                    <a href="https://api.whatsapp.com/send?phone=91123456789" class="btn-mob-whtsapp" target="_blank">
                        <i class="fab fa-whatsapp"></i> Whatsapp
                    </a>
                    <a href="tel:+91123456789" class="btn-mob-call">
                        <i class="fas fa-phone-volume"></i> Call Us
                    </a>
      </div>

   <a class="top-btn" onclick="scrollTopAnimated(1000)">
       <span class="fa fa-angle-up"></span>
   </a><!-- copyright end -->

        <!-- jquery -->
        <script src="{{asset('assets/js/jquery-3.4.0.min.js')}}"></script>
        
        <!-- bootstrap -->
        <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
        <!-- owl carousel -->
        <script src="{{asset('assets/js/owl.carousel.min.js')}}"></script>
        <!-- magnific popup -->
        <script src="{{asset('assets/js/jquery.magnific-popup.js')}}"></script>
        <!-- counter up js -->
        <script src="{{asset('assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{asset('assets/js/counter-us-activate.js')}}"></script>
        <!-- waypoints js-->
        <script src="{{asset('assets/js/jquery.waypoints.js')}}"></script>
        <!-- wow js-->
        <script src="{{asset('assets/js/wow.min.js')}}"></script>
        <!-- aos js -->
        <script src="{{asset('assets/js/aos.js')}}"></script>
        <!-- banner slide active js -->
        <script src="{{asset('assets/js/banner-slide-active.js')}}"></script>
        <!-- main -->
        <script src="{{asset('assets/js/main.js')}}"></script>

        <script src="//cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.6.0/slick.min.js"></script>

         <script>
             var slideWrapper = $(".main-slider"),
    iframes = slideWrapper.find('.embed-player'),
    lazyImages = slideWrapper.find('.slide-image'),
    lazyCounter = 0;

// POST commands to YouTube or Vimeo API
function postMessageToPlayer(player, command){
  if (player == null || command == null) return;
  player.contentWindow.postMessage(JSON.stringify(command), "*");
}

// When the slide is changing
function playPauseVideo(slick, control){
  var currentSlide, slideType, startTime, player, video;

  currentSlide = slick.find(".slick-current");
  slideType = currentSlide.attr("class").split(" ")[1];
  player = currentSlide.find("iframe").get(0);
  startTime = currentSlide.data("video-start");

  if (slideType === "vimeo") {
    switch (control) {
      case "play":
        if ((startTime != null && startTime > 0 ) && !currentSlide.hasClass('started')) {
          currentSlide.addClass('started');
          postMessageToPlayer(player, {
            "method": "setCurrentTime",
            "value" : startTime
          });
        }
        postMessageToPlayer(player, {
          "method": "play",
          "value" : 1
        });
        break;
      case "pause":
        postMessageToPlayer(player, {
          "method": "pause",
          "value": 1
        });
        break;
    }
  } else if (slideType === "youtube") {
    switch (control) {
      case "play":
        postMessageToPlayer(player, {
          "event": "command",
          "func": "mute"
        });
        postMessageToPlayer(player, {
          "event": "command",
          "func": "playVideo"
        });
        break;
      case "pause":
        postMessageToPlayer(player, {
          "event": "command",
          "func": "pauseVideo"
        });
        break;
    }
  } else if (slideType === "video") {
    video = currentSlide.children("video").get(0);
    if (video != null) {
      if (control === "play"){
        video.play();
      } else {
        video.pause();
      }
    }
  }
}

// Resize player
function resizePlayer(iframes, ratio) {
  if (!iframes[0]) return;
  var win = $(".main-slider"),
      width = win.width(),
      playerWidth,
      height = win.height(),
      playerHeight,
      ratio = ratio || 16/9;

  iframes.each(function(){
    var current = $(this);
    if (width / ratio < height) {
      playerWidth = Math.ceil(height * ratio);
      current.width(playerWidth).height(height).css({
        left: (width - playerWidth) / 2,
         top: 0
        });
    } else {
      playerHeight = Math.ceil(width / ratio);
      current.width(width).height(playerHeight).css({
        left: 0,
        top: (height - playerHeight) / 2
      });
    }
  });
}

// DOM Ready
$(function() {
  // Initialize
  slideWrapper.on("init", function(slick){
    slick = $(slick.currentTarget);
    setTimeout(function(){
      playPauseVideo(slick,"play");
    }, 1000);
    resizePlayer(iframes, 16/9);
  });
  slideWrapper.on("beforeChange", function(event, slick) {
    slick = $(slick.$slider);
    playPauseVideo(slick,"pause");
  });
  slideWrapper.on("afterChange", function(event, slick) {
    slick = $(slick.$slider);
    playPauseVideo(slick,"play");
  });
  slideWrapper.on("lazyLoaded", function(event, slick, image, imageSource) {
    lazyCounter++;
    if (lazyCounter === lazyImages.length){
      lazyImages.addClass('show');
      // slideWrapper.slick("slickPlay");
    }
  });

  //start the slider
  slideWrapper.slick({
    // fade:true,
    autoplaySpeed:4000,
    lazyLoad:"progressive",
    speed:600,
    arrows:true,
     prevArrow: '<button class="slide-arrow prev-arrow"></button>',
    nextArrow: '<button class="slide-arrow next-arrow"></button>',
    dots:true,
    cssEase:"cubic-bezier(0.87, 0.03, 0.41, 0.9)"
  });
});

// Resize event
$(window).on("resize.slickVideoPlayer", function(){  
  resizePlayer(iframes, 16/9);
});
         </script>
         <script >
      var stepTime = 20;
var docBody = document.body;
var focElem = document.documentElement;

var scrollAnimationStep = function (initPos, stepAmount) {
    var newPos = initPos - stepAmount > 0 ? initPos - stepAmount : 0;

    docBody.scrollTop = focElem.scrollTop = newPos;

    newPos && setTimeout(function () {
        scrollAnimationStep(newPos, stepAmount);
    }, stepTime);
}

var scrollTopAnimated = function (speed) {
    var topOffset = docBody.scrollTop || focElem.scrollTop;
    var stepAmount = topOffset;

    speed && (stepAmount = (topOffset * stepTime)/speed);

    scrollAnimationStep(topOffset, stepAmount);
};
         </script>
         <script>
function openNav() {
  document.getElementById("mySidenav").style.width = "250px";
}

function closeNav() {
  document.getElementById("mySidenav").style.width = "0";
}
</script>

<script>
  $('.client-slider').owlCarousel({
    loop:true,
    margin:10,
    nav:true,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:5
        }
    }
      // Custom Button
      $('.NextBtn').click(function() {
            projectSlider.trigger('next.owl.carousel');
        });
        $('.PrevBtn').click(function() {
            projectSlider.trigger('prev.owl.carousel');
        });
})
</script>
    </body>
 
</html>