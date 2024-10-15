/**
    * headerFixed
    * btnmenu
    * video
    * Sticky
    * gotop
    * retinaLogos
    * preloader
    * flatCounter
    * hoverThumbGallery
    * onClickViewListingType
    * checkViewListing
    * Toggle Btn dashboard
    * btn filter
    * dot car
    * niceSelect
*/

; (function ($) {

  "use strict";
  // Mobile Nav Hide Show
  if ($('.mobile-menu').length) {

    var mobileMenuContent = $('.main-header .nav-outer .main-menu').html();
    $('.mobile-menu .menu-box .menu-outer').append(mobileMenuContent);
    $('.sticky-header .main-menu').append(mobileMenuContent);

    //Hide / Show Submenu
    $('.mobile-menu .navigation > li.dropdown2 > .dropdown2-btn').on('click', function (e) {
      e.preventDefault();
      var target = $(this).parent('li').children('ul');

      if ($(target).is(':visible')) {
        $(this).parent('li').removeClass('open');
        $(target).slideUp(500);
        $(this).parents('.navigation').children('li.dropdown2').removeClass('open');
        $(this).parents('.navigation').children('li.dropdown2 > ul').slideUp(500);
        return false;
      } else {
        $(this).parents('.navigation').children('li.dropdown2').removeClass('open');
        $(this).parents('.navigation').children('li.dropdown2').children('ul').slideUp(500);
        $(this).parent('li').toggleClass('open');
        $(this).parent('li').children('ul').slideToggle(500);
      }
    });

    //3rd Level Nav
    $('.mobile-menu .navigation > li.dropdown2 > ul  > li.dropdown2 > .dropdown2-btn').on('click', function (e) {
      e.preventDefault();
      var targetInner = $(this).parent('li').children('ul');

      if ($(targetInner).is(':visible')) {
        $(this).parent('li').removeClass('open');
        $(targetInner).slideUp(500);
        $(this).parents('.navigation > ul').find('li.dropdown2').removeClass('open');
        $(this).parents('.navigation > ul').find('li.dropdown > ul').slideUp(500);
        return false;
      } else {
        $(this).parents('.navigation > ul').find('li.dropdown2').removeClass('open');
        $(this).parents('.navigation > ul').find('li.dropdown2 > ul').slideUp(500);
        $(this).parent('li').toggleClass('open');
        $(this).parent('li').children('ul').slideToggle(500);
      }
    });

    //Menu Toggle Btn
    $('.mobile-nav-toggler').on('click', function () {
      $('body').addClass('mobile-menu-visible');

    });

    //Menu Toggle Btn
    $('.mobile-menu .menu-backdrop, .close-btn').on('click', function () {
      $('body').removeClass('mobile-menu-visible');
      $('.mobile-menu .navigation > li').removeClass('open');
      $('.mobile-menu .navigation li ul').slideUp(0);
    });

    $(document).keydown(function (e) {
      if (e.keyCode === 27) {
        $('body').removeClass('mobile-menu-visible');
        $('.mobile-menu .navigation > li').removeClass('open');
        $('.mobile-menu .navigation li ul').slideUp(0);
      }
    });

  }

  var headerFixed = function () {
    if ($('body').hasClass('counter-scroll')) {
      var nav = $('#header');
      if (nav.length) {
        var
          offsetTop = nav.offset().top,
          headerHeight = nav.height(),
          injectSpace = $("<div>", {
            height: headerHeight
          }).insertAfter(nav);
          injectSpace.hide();

        $(window).on('load scroll', function () {
          if ($(window).scrollTop() > offsetTop) {
            nav.addClass('is-fixed');
            injectSpace.show();
          } else {
            nav.removeClass('is-fixed');
            injectSpace.hide();
          }

          if ($(window).scrollTop() > 500) {
            nav.addClass('is-small');
          } else {
            nav.removeClass('is-small');
          }
        })
      }
    }
  };

  var video = function () {
    if ($('div').hasClass('video-wrap')) {
      $('.popup-youtube').magnificPopup({
        type: 'iframe'
      });
    }
  };

  var sticky = function () {
    if ($('body').hasClass('sticky-scroll')) {
      new StickySidebar('#sidebar-sticky', {
        topSpacing: 0,
        bottomSpacing: 0,
        containerSelector: '.page-menu1-wrap',
        innerWrapperSelector: '.po-sticky'
      });
    }
  }

  var goTop = function () {
    $(window).scroll(function () {
      if ($(this).scrollTop() > 800) {
        $('.button-go').addClass('show');
      } else {
        $('.button-go').removeClass('show');
      }
    });

    $('.button-go').on('click', function () {
      $("html, body").animate({ scrollTop: 0 }, 1000);
      return false;
    });  };

  var retinaLogos = function () {
    var retina = window.devicePixelRatio > 1 ? true : false;
    if (retina) {
      $('#header .logo').find('img').attr({ src: 'assets/images/logo/logo2@.png', });
      $('#Footer .widget-info').find('img').attr({ src: 'assets/images/logo/logo-footer@2x.png',});
    }
  };

  var preloader = function () {
    setTimeout(function () {
      $(".preload-container").fadeOut("slow", function () {
        $(this).remove();
      });
    }, 1000);
  };

  var flatCounter = function () {
    if ($(document.body).hasClass('counter-scroll')) {
      var a = 0;
      $(window).scroll(function () {
        var oTop = $('.tf-counter').offset().top - window.innerHeight;
        if (a === 0 && $(window).scrollTop() > oTop) {
          if ($().countTo) {
            $('.tf-counter').find('.number').each(function () {
              var to = $(this).data('to'),
                speed = $(this).data('speed');

              $(this).countTo({
                to: to,
                speed: speed
              });
            });
          }
          a = 1;
        }
      });
    }
  };

  var hoverThumbGallery = function (e) {
    e.find('.hover-listing-image').each(function () {
      $(this).find('.listing-item:first-child').addClass('active');
      $(this).find('.bl-item:first-child').addClass('active');
      $(".hover-listing-image .listing-item").hover(
        function () {
          var index = $(this).index();
          $(this).closest('.hover-listing-image').find('.listing-item').removeClass('active');
          $(this).addClass("active");
          $(this).closest('.hover-listing-image').find('.bl-item').removeClass('active');
          $(this).closest('.hover-listing-image').find('.bl-item').eq(index).addClass('active');
        },
        function () {
          $(this).removeClass("active");
          $(this).closest('.hover-listing-image').find('.bl-item').removeClass('active');
          $(this).closest('.hover-listing-image').find('.listing-item:first-child').addClass('active');
          $(this).closest('.hover-listing-image').find('.bl-item:first-child').addClass('active');
        }
      );

    });
  }

  var hoverThumbGallery = function () {
    $('.hover-listing-image').find('.listing-item:first-child').addClass('active');
    $('.hover-listing-image').find('.bl-item:first-child').addClass('active');
    $(".hover-listing-image .listing-item").hover(
      function () {
        var index = $(this).index();
        $(this).closest('.hover-listing-image').find('.listing-item').removeClass('active');
        $(this).addClass("active");
        $(this).closest('.hover-listing-image').find('.bl-item').removeClass('active');
        $(this).closest('.hover-listing-image').find('.bl-item').eq(index).addClass('active');
      },
      function () {
        $(this).removeClass("active");
        $(this).closest('.hover-listing-image').find('.bl-item').removeClass('active');
        $(this).closest('.hover-listing-image').find('.listing-item:first-child').addClass('active');
        $(this).closest('.hover-listing-image').find('.bl-item:first-child').addClass('active');
      }
    );
  }

  //tab-lisst
  var onClickViewListingType = function () {
    if ($('.tf-my-listing-search').length > 0) {
      $('a.btn-display-listing-grid').click(function (event) {
        event.preventDefault();
        localStorage.setItem('VIEW_LISTING_TYPE', 'grid');
        checkViewListing();
      });
      $('a.btn-display-listing-list').click(function (event) {
        event.preventDefault();
        localStorage.setItem('VIEW_LISTING_TYPE', 'list');
        checkViewListing();
      });
    }
  };

  var checkViewListing = function () {
    if ($('.tf-my-listing-search').length > 0) {
      var type = localStorage.getItem('VIEW_LISTING_TYPE');
      switch (type) {
        case 'grid':
          $('.listing-list-car-wrap').find('.listing-list-car-grid').removeClass('listing-list-car-list');
          $('a.btn-display-listing-grid').addClass('active');
          $('a.btn-display-listing-list').removeClass('active');
          break;
        case 'list':
          $('.listing-list-car-wrap').find('.listing-list-car-grid').addClass('listing-list-car-list');
          $('a.btn-display-listing-list').addClass('active');
          $('a.btn-display-listing-grid').removeClass('active');
          break;
        default:
          break;
      }
    }
  }

  //Menu Toggle Btn dashboard
  $('.btn-show-dashboard').on('click', function () {
    $('.sidebar-dashboard').addClass('active');
    $('.overlay-dashboard').addClass('active');
  });
  $('.overlay-dashboard').on('click', function () {
    $('.sidebar-dashboard').removeClass('active');
    $('.overlay-dashboard').removeClass('active');
  });

  $(".filter-header-list .btn-filter i").click(function () {
    $('.list-filter').slideToggle('');
  });

  $(".dot").click(function () {
    $(this).find('i').toggleClass("active");
    $(this).find('.content-price').toggleClass("active");
  });

  $(document).ready(function () {
    $(".item-dot").on("mouseover", function () {
      // when you run event hover remove class active before
      $('.item-dot').removeClass('active');
      // active class item your run function
      $(this).addClass('active');
    });
  });


  //seclect
  $('.select_js').niceSelect();
  (function () {

    var parent = document.querySelector(".range-slider");
    if (!parent) return;

    var
      rangeS = parent.querySelectorAll("input[type=range]"),
      numberS = parent.querySelectorAll("input[type=number]");

    rangeS.forEach(function (el) {
      el.oninput = function () {
        var slide1 = parseFloat(rangeS[0].value),
          slide2 = parseFloat(rangeS[1].value);

        if (slide1 > slide2) {
          [slide1, slide2] = [slide2, slide1];
          // var tmp = slide2;
          // slide2 = slide1;
          // slide1 = tmp;
        }

        numberS[0].value = slide1;
        numberS[1].value = slide2;
      }
    });

    numberS.forEach(function (el) {
      el.oninput = function () {
        var number1 = parseFloat(numberS[0].value),
          number2 = parseFloat(numberS[1].value);

        if (number1 > number2) {
          var tmp = number1;
          numberS[0].value = number2;
          numberS[1].value = tmp;
        }

        rangeS[0].value = number1;
        rangeS[1].value = number2;

      }
    });

  })();

  // Dom Ready
  $(function () {
    headerFixed();
    video();
    sticky();
    retinaLogos();
    goTop();
    hoverThumbGallery();
    flatCounter();
    onClickViewListingType();
    checkViewListing();
    preloader();
  });

})(jQuery);
