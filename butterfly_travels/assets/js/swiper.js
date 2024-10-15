
// ainimate sider
(function ($) {
    var Spanizer = (function () {
        var settings = {
            letters: $('.js-letters'),
        };
        return {
            init: function () {
                this.bind();
            },
            bind: function () {
                Spanizer.doSpanize();
            },
            doSpanize: function () {
                settings.letters.html(function (i, el) {
                    var spanize = $.trim(el).split("");
                    var template = '<span>' + spanize.join('</span><span>') + '</span>'
                    return template;
                });
            },
        };
    })();
    // Let's GO!
    Spanizer.init();
})(jQuery);

var swiper = new Swiper(".carousel-5", {
    autoplay: {
        delay: 0,
        disableOnInteraction: false,
    },
    slidesPerView: 2,
    loop: true,
    spaceBetween: 30,
    speed: 10000,
    observer: true,
    observeParents: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        450: {
            slidesPerView: 2,
            spaceBetween: 30,
        },
        768: {
            slidesPerView: 3,
            spaceBetween: 30,
        },
        868: {
            slidesPerView: 4,
            spaceBetween: 30,
        },
        992: {
            slidesPerView: 5,
            spaceBetween: 30,
        },
    },
});
var swiper = new Swiper(".mybest-selling", {
    slidesPerView: 3,
    spaceBetween: 24,
    observer: true,
    roundLengths: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        767: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
});
var swiper = new Swiper(".mybest-selling2", {
    slidesPerView: 3,
    spaceBetween: 40,
    observer: true,
    centeredSlides: true,
    roundLengths: true,
    dots:false,
    nav:false,
      autoplay: {
    delay:4000,
  },
  speed:500,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        767: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
    },
});
var swiper = new Swiper(".related-single-listing", {
    slidesPerView: 4,
    spaceBetween: 30,
    observer: true,
    roundLengths: true,
    loop: true,
    pagination: {
        el: ".swiper-pagination",
        clickable: true,
    },
    breakpoints: {
        0: {
            slidesPerView: 1,
        },
        767: {
            slidesPerView: 2,
        },
        991: {
            slidesPerView: 3,
        },
        1024: {
            slidesPerView: 4,
        },
    },
});
var swiper = new Swiper(".testimonial-swiper", {
    navigation: {
        nextEl: ".swiper-button-next-tes",
        prevEl: ".swiper-button-prev-tes",
    },
    loop: true,
    speed: 600,
    parallax: true,

});
var swiper = new Swiper(".mySwiper", {
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
});
var swiper = new Swiper(".property-gallary", {
    spaceBetween: 20,
    slidesPerView: 7,
    freeMode: true,
    watchSlidesProgress: true,
    breakpoints: {
        0: {
            slidesPerView: 3,
        },
        480: {
            slidesPerView: 3,
        },
        767: {
            slidesPerView: 5,
        },
    },
});
var swiper2 = new Swiper(".property-gallary2", {
    spaceBetween: 10,
    navigation: {
        nextEl: ".swiper-button-next",
        prevEl: ".swiper-button-prev",
    },
    thumbs: {
        swiper: swiper,
    },
});