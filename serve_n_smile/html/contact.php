 <?php include 'includes/header.php'?>
 <section class="inner-page-banner bg-common" data-bg-image="img/blue-bg.jpg">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <div class="breadcrumbs-area">
                            <h1>Contact Us</h1>
                            <ul>
                                <li>
                                    <a href="index.html">Home</a>
                                </li>
                                <li>Contact</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inne Page Banner Area End Here -->
        <!-- Blog Area Start Here -->
        <section class="section-padding-12-10">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="contact-box-layout1">
                            <div class="google-map-area">
                                 <iframe src="https://www.google.com/maps/embed?pb=!1m16!1m12!1m3!1d15218.82265645824!2d78.4508319005088!3d17.521558434216274!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!2m1!1sPlot%20No%3A61%2FA%2C%20Subhash%20Nagar%2C%20Jeedimetla%2C%20Hyderabad%20500055%20Telangana!5e0!3m2!1sen!2sin!4v1721650944526!5m2!1sen!2sin" width="100%" height="420" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                                <div id="googleMap" class="google-map" style="width:100%; height:100px; border-radius: 4px;"></div>
                            </div>
                            <div class="contact-info">
                                <div class="media media-none-lg media-none--sm">
                                    <div class="item-icon">
                                        <i class="flaticon-call-answer"></i>
                                    </div>
                                    <div class="media-body space-md">
                                        <h4>Phone:</h4>
                                        <ul>
                                            <li>+91 1234567890,</li>
                                            <li>+91 1234567890</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="media media-none-lg media-none--sm">
                                    <div class="item-icon">
                                        <i class="flaticon-message"></i>
                                    </div>
                                    <div class="media-body space-md">
                                        <h4>E-mail:</h4>
                                        <ul>
                                            <li>servensmile@gmail.com</li>
                                            <li>servensmile@gmail.com</li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="media media-none-lg media-none--sm">
                                    <div class="item-icon">
                                        <i class="flaticon-maps-and-flags"></i>
                                    </div>
                                    <div class="media-body space-md">
                                        <h4>Location:</h4>
                                        <ul>
                                            <li>jagannadhapuram,visakhapatnam</li>
                                            <li>533201</li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4 sidebar-break-md sidebar-widget-area">
                        <div class="widget widget-contact-form">
                            <div class="heading-layout4">
                                <h4>Have you Any Question?</h4>
                            </div>
                            <form class="contact-form-box" id="contact-form">
                                <div class="row">
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="fas fa-user"></i></div>
                                        <input type="text" placeholder="Name" class="form-control" name="name" data-error="Name field is required" required>
                                       
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="far fa-envelope"></i></div>
                                        <input type="email" placeholder="E-mail Address" class="form-control" name="email" data-error="email field is required" required>
                                       
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="fas fa-phone-volume"></i></div>
                                        <input type="text" placeholder="Phone" class="form-control" name="phone" data-error="Phone field is required" required>
                                       
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="fas fa-question"></i></div>
                                        <select class="form-control new-service">
                            <option selected disabled class="main-select" >Services</option>
                            <option value="1" class="first-select">Kitchen Cleaning </option>
                            <option value="2" class="first-select" >Office Cleaning</option>
                             <option value="3" class="first-select" >Bathroom Cleaning </option>
                            <option value="4" class="first-select" >Backyard Cleaning</option>
                             <option value="5" class="first-select" >Window Cleaning </option>
                            <option value="6" class="first-select" >House Cleaning</option>
                            <option value="7" class="first-select" >Floor Cleaning</option>
                             <option value="8" class="first-select" >Pest Control Service </option>
                            <option value="9" class="first-select" >Plumbing Service</option>
                            <option value="10" class="first-select" >Others</option>
                        </select>
                                        <!--<input type="text" placeholder="Service" class="form-control" name="phone" data-error="Phone field is required" required>-->
                                        
                                      
                                    </div>
                                    <div class="col-12 form-group">
                                        <div class="form-icon"><i class="far fa-comments"></i></div>
                                        <textarea placeholder="Message" class="textarea form-control" name="message" id="form-message" rows="4" cols="20" 
                                        data-error="Message field is required" required></textarea>
                                        
                                    </div>
                                    <div class="col-12 form-group">
                                        <button type="submit" class="fw-btn-fill bg-accent text-primarytext">Send Message</button>
                                    </div>
                                </div>
                                <div class="form-response"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog Area End Here -->
         <?php include 'includes/footer.php'?>