<!-- ====== Footer Start ====== -->
<footer class="ani-gradiant">
    <div class="container">
        <div class="section-heading d-none">
            <h2>Footer</h2>
        </div>
        <div class="content">
            <div class="row">
                <!--        <div class="social_media">
                          <ul>
                             <li><a href="javascript:void(0)"><i class="flaticon flaticon-facebook-logo"></i></a></li>
                             <li><a href="javascript:void(0)"><i class="flaticon flaticon-twitter-logo-silhouette"></i></a></li>
                             <li><a href="javascript:void(0)"><i class="flaticon flaticon-linkedin-logo"></i></a></li>
                             <li><a href="javascript:void(0)"><i class="flaticon flaticon-instagram"></i></a></li>
                          </ul>
                       </div> -->
                <div class="clearfix"></div>

                <div class="col-md-6 col-sm-4 col-xs-12 text-left">
                    <p>&copy; 2023 Ludope.com. All Rights Reserved Designed &amp; Developed by <a href="http://thecolourmoon.com/" target="_blank">Colourmoon</a></p>
                </div>
                <div class="col-md-6 col-sm-4 col-xs-12 footer-nav <?= $_GET['app'] != '' ? 'hidden' : '' ?>">
                    <a class="<?= $_GET['app'] != '' ? 'hidden' : '' ?>" href="aboutus.php" title="Features">About Us</a>
                    <a class="<?= $_GET['app'] != '' ? 'hidden' : '' ?>" href="game_rules.php" title="Features">Game Rules</a>
                    <a class="<?= $_GET['app'] != '' ? 'hidden' : '' ?>" href="faqs.php" title="Price Plans">FAQ's</a>
                    <a class="<?= $_GET['app'] != '' ? 'hidden' : '' ?>" href="terms_and_conditions.php" title="Features">Terms & Conditions</a>
                    <a class="<?= $_GET['app'] != '' ? 'hidden' : '' ?>" href="privacy_policy.php" title="Price Plans">Privacy Privacy</a>
<!--                    <a class="<?= $_GET['app'] != '' ? 'hidden' : '' ?>" href="support.php" title="Support">Support</a>-->
                      </div>
            </div>
        </div>
    </div>
     <ul class="leftTwoBtncontainer d-md-block d-lg-block">
      <li><a href="https://api.whatsapp.com/send?phone=+919916573278&amp;text=Hi" class="whatsappICon"><i class="fab fa-whatsapp"></i></a></li>
    </ul>
</footer>
   
<!-- ====== Footer End ====== -->
</div>
<a href="javascript:void(0)" id="scroll"><span></span></a>
<!-- bootstrap js-->
<script src="assets/js/bootstrap.min.js"></script>
<!-- Particles js-->
<script src="assets/js/particles.min.js"></script>
<!-- Parallax js-->
<script src="assets/js/jquery.parallax-1.1.3.js"></script>
<!-- Waypoints js -->
<script src="assets/js/waypoints.min.js"></script>
<!-- Preloader js -->
<script src="assets/js/jquery.preloadinator.min.js"></script>
<script>
    $('.js-preloader').preloadinator({
        minTime: 2000
    });
</script>
<!-- Counter-up js -->
<script src="assets/js/jquery.counterup.min.js"></script>
<!-- owl.carousel js -->
<script src="assets/js/owl.carousel.js"></script>
<script src="assets/js/owl.custom.js"></script>
<!-- Custom js -->
<script src="assets/js/custom.js"></script>
<script type="text/javascript">


    particlesJS("particle-container", {
        "particles": {
            "number": {
                "value": 80,
                "density": {
                    "enable": true,
                    "value_area": 800
                }
            },
            "shape": {
                "type": "circle",
                "stroke": {
                    "width": 0,
                    "color": "#fff"
                },
                "polygon": {
                    "nb_sides": 5
                },
                "image": {
                    "src": "img/github.svg",
                    "width": 100,
                    "height": 100
                }
            },
            "opacity": {
                "value": 0.5,
                "random": false,
                "anim": {
                    "enable": false,
                    "speed": 1,
                    "opacity_min": 0.1,
                    "sync": false
                }
            },
            "size": {
                "value": 3,
                "random": true,
                "anim": {
                    "enable": false,
                    "speed": 40,
                    "size_min": 0.1,
                    "sync": false
                }
            },
            "line_linked": {
                "enable": false,
                "distance": 150,
                "color": "#ffffff",
                "opacity": 1,
                "width": 1
            },
            "move": {
                "enable": true,
                "speed": 1,
                "direction": "none",
                "random": false,
                "straight": false,
                "out_mode": "out",
                "bounce": false,
                "attract": {
                    "enable": false,
                    "rotateX": 600,
                    "rotateY": 1200
                }
            }
        },
        "interactivity": {
            "detect_on": "canvas",
            "events": {
                "onhover": {
                    "enable": false,
                    "mode": "repulse"
                },
                "onclick": {
                    "enable": false,
                    "mode": "push"
                },
                "resize": true
            },
            "modes": {
                "grab": {
                    "distance": 400,
                    "line_linked": {
                        "opacity": 1
                    }
                },
                "bubble": {
                    "distance": 400,
                    "size": 40,
                    "duration": 2,
                    "opacity": 8,
                    "speed": 3
                },
                "repulse": {
                    "distance": 200,
                    "duration": 0.4
                },
                "push": {
                    "particles_nb": 4
                },
                "remove": {
                    "particles_nb": 2
                }
            }
        },
        "retina_detect": true
    });


</script>
</body>
</html>