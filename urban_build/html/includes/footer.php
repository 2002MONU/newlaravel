		<footer class="footer-wrapper footer-layout5 bg-title" id="contact-sec">
            <div class="widget-area">
                <div class="container">
                    <div class="row justify-content-between">
                        <div class="col-md-6 col-xl-3">
                            <div class="widget footer-widget">
                                <h3 class="widget_title">About Company</h3>
                                <div class="th-widget-about">
                                    <p class="about-text">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Omnis obcaecati eaque, minima...</p>
                                    <div class="th-social style3">
                                        <a href="#"><i class="fa-brands fa-facebook-f"></i></a>
                                        <a href="#"><i class="fa-brands fa-x-twitter"></i></a>
                                        <a href="#"><i class="fa-brands fa-instagram"></i></a>
                                        <a href="#"><i class="fa-brands fa-youtube"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto">
                            <div class="widget widget_nav_menu footer-widget">
                                <h3 class="widget_title">Quick Links</h3>
                                <div class="menu-all-pages-container">
                                    <ul class="menu">
                                        <li><a href="index.php">Home</a></li>
                                        <li><a href="about-us.php">About Us</a></li>
                                        <li><a href="packages.php">Packages</a></li>
                                        <li><a href="concept-development.php">Services</a></li>
                                        <li><a href="ongoing-projects.php">Projects</a></li>
                                        <li><a href="contact-us.php">Contact Us</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-3">
                            <div class="widget footer-widget">
                                <h3 class="widget_title">Reach Us</h3>
                                <div class="th-widget-contact">
                                    <div class="info-box-wrap">
                                        <div class="info-box_icon"><i class="fas fa-location-dot"></i></div>
                                        <p class="info-box_text">Plot no 74,75, Akshitha Residency, Sai Balaji enclave, Mallampet, Bachupally, Telangana, 502303.</p>
                                    </div>
                                    <div class="info-box-wrap">
                                        <div class="info-box_icon"><i class="fas fa-envelope"></i></div>
                                        <a href="mailto:info@gmail.com" class="info-box_link">info@gmail.com</a>
                                    </div>
                                    <div class="info-box-wrap">
                                        <div class="info-box_icon"><i class="fas fa-phone"></i></div>
                                        <a href="tel:+917095992159" class="info-box_link">+91 70959 92159</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-xl-auto">
                            <div class="widget footer-widget">
                                <h4 class="widget_title">Our Projects</h4>
                                <div class="sidebar-gallery">
                                    <div class="gallery-thumb">
                                    	<img src="assets/img/update1/widget/gal-1-1.jpg" alt="Gallery Image" class="w-100">
                                    </div>
                                    <div class="gallery-thumb">
                                    	<img src="assets/img/update1/widget/gal-1-2.jpg" alt="Gallery Image" class="w-100">
                                    </div>
                                    <div class="gallery-thumb">
                                    	<img src="assets/img/update1/widget/gal-1-3.jpg" alt="Gallery Image" class="w-100">
                                    </div>
                                    <div class="gallery-thumb">
                                    	<img src="assets/img/update1/widget/gal-1-4.jpg" alt="Gallery Image" class="w-100">
                                    </div>
                                    <div class="gallery-thumb">
                                    	<img src="assets/img/update1/widget/gal-1-5.jpg" alt="Gallery Image" class="w-100">
                                    </div>
                                    <div class="gallery-thumb">
                                    	<img src="assets/img/update1/widget/gal-1-6.jpg" alt="Gallery Image" class="w-100">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="copyright-wrap">
                <div class="container">
                    <div class="row justify-content-between align-items-center">
                        <div class="col-lg-12">
                            <p class="copyright-text text-center">Copyright <i class="fal fa-copyright"></i> 2024 <a href="index.php">Urban Build</a>. All Rights Reserved. | Design & Developed by <a href="https://thecolourmoon.com/index.php" target="_blank">Colourmoon</a> </p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
		<div class="scroll-top">
			<svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" style="transition: stroke-dashoffset 10ms linear 0s; stroke-dasharray: 307.919, 307.919; stroke-dashoffset: 307.919;"></path>
		</svg>
	</div>
	<script src="assets/js/vendor/jquery-3.6.0.min.js"></script>
	<script src="assets/js/app.min.js"></script>
	<script src="assets/js/main.js"></script>
    <script src="assets/js/theia-sticky-sidebar.min.js"></script>
	<script src="https://kit.fontawesome.com/18be827d01.js"></script>

    <script>
$('.main--content .fixcontent').theiaStickySidebar({
additionalMarginTop: 100
});
</script>

<script>
    document.querySelectorAll('details').forEach((el) => {
                const summary = el.querySelector('summary');
                const content = el.querySelector('.content');

                summary.addEventListener('click', (e) => {
                    e.preventDefault();
                    if (el.open) {
                        slideUp(content, () => {
                            el.open = false;
                        });
                    } else {
                        el.open = true;
                        slideDown(content);
                    }
                });
            });

            function slideUp(element, callback) {
                const height = element.offsetHeight;
                element.style.height = height + 'px';
                element.offsetHeight; // Force reflow
                element.style.height = '0';
                element.addEventListener('transitionend', function handler() {
                    element.removeEventListener('transitionend', handler);
                    callback();
                });
            }

            function slideDown(element) {
                element.style.height = '0';
                element.offsetHeight; // Force reflow
                const height = element.scrollHeight;
                element.style.height = height + 'px';
                element.addEventListener('transitionend', function handler() {
                    element.removeEventListener('transitionend', handler);
                    element.style.height = 'auto';
                });
            }
</script>
</body>
</html>