$('.owl-one').owlCarousel({
    loop:true, 
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    center: true,
    margin:10,
    responsive:{

       0:{
            items:1
        },

       480:{
            items:1
        },

        640:{
            items:3
        },

        990:{
            items:3
        },

        1024:{
            items:3
        },

        1140:{
            items:5
        },

        2000:{
            items:5
        }
    }
});


$('.owl-two').owlCarousel({
    loop:true, 
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    margin:26,
    responsive:{

       0:{
            items:1
        },

       480:{
            items:1
        },

        640:{
            items:1
        },

        990:{
            items:2
        },

        1140:{
            items:2
        },

        2000:{
            items:2
        }
    }
});


$('.owl-three').owlCarousel({
    loop:true, 
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    center: true,
    margin:10,
    responsive:{

       0:{
            items:1
        },

       480:{
            items:1
        },

        640:{
            items:3
        },

        990:{
            items:3
        }       
    }
});



$('.owl-four').owlCarousel({
    loop:true, 
    autoplay:true,
    autoplayTimeout:7000,
    autoplayHoverPause:true,
    animateOut: 'fadeOut',
    margin:30,
    responsive:{
       0:{
            items:1
        },

       480:{
            items:1
        },

        640:{
            items:2
        },

        990:{
            items:2
        },

        1024:{
            items:2
        }       

    }
});


$('.owl-five').owlCarousel({
    loop:true, 
    autoplay:true,
    autoplayTimeout:5000,
    autoplayHoverPause:true,
    center: true,
    margin:30,
    responsive:{

       0:{
            items:1
        },

       480:{
            items:1
        },

        640:{
            items:3
        },

        1024:{
            items:5
        },

        1400:{
            items:6
        }              
    }
});



var owl = $('.owl-carousel');
owl.owlCarousel({
    items:6,
    loop:true,
    margin:10,
    autoplay:true,
    autoplayTimeout:1000,
    autoplayHoverPause:true
});
$('.play').on('click',function(){
    owl.trigger('play.owl.autoplay',[1000])
})
$('.stop').on('click',function(){
    owl.trigger('stop.owl.autoplay')
})
