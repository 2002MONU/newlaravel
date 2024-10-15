/**
Company : Dazzler Software Pvt. Ltd
File    : custom.js
Version : 1.0
**/



/*************------------------------------


 JS INDEX
    ===================


    1. Sticky Header
    2. Menu
    3. Parallax
    4. Counter
    5. Smooth Scroll
    6. Smooth Top



------------------------------*************/
(function ($) {
    "use strict";

/****---- Sticky Header Start ----****/

$(window).scroll(function() {    
    var scroll = $(window).scrollTop();

    if (scroll >= 100) {
        $("header").addClass("sticky");
    } else {
        $("header").removeClass("sticky");
    }
});


/****---- Sticky Header End ----****/

/****---- Menu Toggle Start ----****/

$(".toggle").on("click", function(){
  
    $(".menu").toggleClass("show");
   
});


/****---- Menu Toggle End ----****/


/****---- Parallax Start ----****/



$(document).ready(function(){
    $('main').parallax("50%", 0.3);
    
});



/****---- Parallax End ----****/



/****---- Counter Start ----****/


$('.counter').counterUp({
    delay: 10,
    time: 1000
});


/****---- Counter End ----****/




/****---- Smooth Scroll Start ----****/

$(document).ready(function(){
  // Add smooth scrolling to all links
  $(".menu ul li a").on('click', function(event) {

    // Make sure this.hash has a value before overriding default behavior
    if (this.hash !== "") {
      // Prevent default anchor click behavior
      event.preventDefault();

      // Store hash
      var hash = this.hash;

      // Using jQuery's animate() method to add smooth page scroll
      // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
      $('html, body').animate({
        scrollTop: $(hash).offset().top
      }, 1000, function(){

        // Add hash (#) to URL when done scrolling (default click behavior)
        window.location.hash = hash;
      });
    } // End if
  });
});


/****---- Smooth Scroll End ----****/


/****---- Smooth Top Start ----****/

$(document).ready(function(){ 
    $(window).scroll(function(){ 
        if ($(this).scrollTop() > 100) { 
            $('#scroll').fadeIn(); 
        } else { 
            $('#scroll').fadeOut(); 
        } 
    }); 
    $('#scroll').click(function(){ 
        $("html, body").animate({ scrollTop: 0 }, 600); 
        return false; 
    }); 
});

/****---- Smooth Top End ----****/


/****---- More Demo Toggle Start ----****/


$(".more-demos span").on("click", function(){
  
    $(".more-demos ul").toggleClass("show");
   
});


/****---- More Demo Toggle End ----****/



})(jQuery);