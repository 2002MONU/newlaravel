<?php include 'includes/header.php'?>
 <!--main-banner-start-->
      <div class="tf-slide-form" style="background-image: url(assets/img/banner-image.jpg);background-size: cover;background-position: left center;">
         <div class="themesflat-container">
            <div class="slide-form t-al-center">
               <h1 class=" text-white wow fadeInUp" data-wow-delay="300ms"
               data-wow-duration="2000ms">Find <span class="text-green">Perfect</span> Car. Let’s Go!</h1>
            </div>
            <div class="search-form-widget">
               <ul class="nav nav-tabs" id="myTab" role="tablist">
                  <li class="nav-item" role="presentation">
                     <button class="nav-link active" id="home-tab" data-bs-toggle="tab"
                     data-bs-target="#home" type="button" role="tab" aria-controls="home"
                     aria-selected="true">Local</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="profile-tab" data-bs-toggle="tab"
                     data-bs-target="#profile" type="button" role="tab" aria-controls="profile"
                     aria-selected="false">Out Station</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="contact-tab" data-bs-toggle="tab"
                     data-bs-target="#contact" type="button" role="tab" aria-controls="contact"
                     aria-selected="false">Airport Transfor</button>
                  </li>
                  <li class="nav-item" role="presentation">
                     <button class="nav-link" id="event-tab" data-bs-toggle="tab"
                     data-bs-target="#events" type="button" role="tab" aria-controls="events"
                     aria-selected="false">Long Time Rentals</button>
                  </li>
                  
               </ul>
               <div class="tab-content" id="myTabContent">
                  <div class="tab-pane fade show active" id="home" role="tabpanel"
                     aria-labelledby="home-tab">
                     <form method="post" id="search-forms">
                        <div class="newsletter-box text-center">
                           <div class="row justify-contnet-left">
                              <div class="col-lg-3 form-part">
                                 <span><i class="fas fa-map-marker-alt"></i>City</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">Hyderabad</option>
                                    <option value="2">Visakhapatnam</option>
                                    <option value="3">Vijayawada</option>
                                 </select>
                              </div>
                              <div class="col-lg-2 form-part">
                                 <span><i class="far fa-calendar-alt"></i>Pickup Date</span>
                                 <div class="form-group">
                                  <input type="text" name="date" id="search-from-date" class="form-control" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                 </div>
                              </div>

                              <div class="col-lg-2 form-part">
                                 <span><i class="fal fa-clock"></i>Pickup Time</span>
                                 <div class="form-group">
                                    <input type="time" class="form-control" type='time' value='now'>

                                 </div>
                              </div>
                              <div class="col-lg-2 form-part">
                                 <span><i class="fas fa-suitcase"></i>Package</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">02 Days</option>
                                    <option value="2">04 Days</option>
                                    <option value="3">05 Days</option>
                                 </select>
                              </div>
                              <div class="col-lg-3 form-part">
                                 <span><i class="fal fa-car"></i>Car Type</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">Innova Crysta  </option>
                                    <option value="2">Tempo traveller</option>
                                    <option value="3">Seltos</option>
                                    <option value="4">Bus</option>
                                 </select>
                              </div>
                           </div>
                           <button type="button" class=" search-btn btn theme-btn btn-radius btn-m w-25 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal"> <i class="fal fa-search"></i>Find Your Ride</button>
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                     <form method="post" id="search-forms">
                        <div class="newsletter-box text-center">
                           <div class="row justify-contnet-left">
                              <div class="col-lg-3 form-part">
                                 <span><i class="fas fa-map-marker-alt"></i>City</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">Hyderabad</option>
                                    <option value="2">Visakhapatnam</option>
                                    <option value="3">Vijayawada</option>
                                 </select>
                              </div>
                                    <div class="col-lg-2 form-part">
                                 <span><i class="far fa-calendar-alt"></i>Pickup Date</span>
                                 <div class="form-group">
                                  <input type="text" name="date" id="search-from-date" class="form-control" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                 </div>
                              </div>

                              <div class="col-lg-2 form-part">
                                 <span><i class="fal fa-clock"></i>Pickup Time</span>
                                 <div class="form-group">
                                    <input type="time" class="form-control" type='time' value='now'>

                                 </div>
                              </div>
                              <div class="col-lg-2 form-part">
                                 <span><i class="fas fa-suitcase"></i>Package</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">02 Days</option>
                                    <option value="2">04 Days</option>
                                    <option value="3">05 Days</option>
                                 </select>
                              </div>
                              <div class="col-lg-3 form-part">
                                 <span><i class="fal fa-car"></i>Car Type</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">Innova Crysta  </option>
                                    <option value="2">Tempo traveller</option>
                                    <option value="3">Seltos</option>
                                    <option value="4">Bus</option>
                                 </select>
                              </div>
                           </div>
                           <button type="button" class=" search-btn btn theme-btn btn-radius btn-m w-25 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Find Your Ride</button>
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab">
                     <form method="post" id="search-forms">
                        <div class="newsletter-box text-center">
                           <div class="row justify-contnet-left">
                              <div class="col-lg-3 form-part">
                                 <span><i class="fas fa-map-marker-alt"></i>City</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">Hyderabad</option>
                                    <option value="2">Visakhapatnam</option>
                                    <option value="3">Vijayawada</option>
                                 </select>
                              </div>
                                    <div class="col-lg-2 form-part">
                                 <span><i class="far fa-calendar-alt"></i>Pickup Date</span>
                                 <div class="form-group">
                                  <input type="text" name="date" id="search-from-date" class="form-control" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                 </div>
                              </div>

                              <div class="col-lg-2 form-part">
                                 <span><i class="fal fa-clock"></i>Pickup Time</span>
                                 <div class="form-group">
                                    <input type="time" class="form-control" type='time' value='now'>

                                 </div>
                              </div>
                              <div class="col-lg-2 form-part">
                                 <span><i class="fas fa-suitcase"></i>Package</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">02 Days</option>
                                    <option value="2">04 Days</option>
                                    <option value="3">05 Days</option>
                                 </select>
                              </div>
                              <div class="col-lg-3 form-part">
                                 <span><i class="fal fa-car"></i>Car Type</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">Innova Crysta  </option>
                                    <option value="2">Tempo traveller</option>
                                    <option value="3">Seltos</option>
                                    <option value="4">Bus</option>
                                 </select>
                              </div>
                           </div>
                           <button type="button" class=" search-btn btn theme-btn btn-radius btn-m w-25 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Find Your Ride</button>
                        </div>
                     </form>
                  </div>
                  <div class="tab-pane fade" id="events" role="tabpanel" aria-labelledby="events-tab">
                     <form method="post" id="search-forms">
                        <div class="newsletter-box text-center">
                           <div class="row justify-contnet-left">
                              <div class="col-lg-3 form-part">
                                 <span><i class="fas fa-map-marker-alt"></i>City</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">Hyderabad</option>
                                    <option value="2">Visakhapatnam</option>
                                    <option value="3">Vijayawada</option>
                                 </select>
                              </div>
                                    <div class="col-lg-2 form-part">
                                 <span><i class="far fa-calendar-alt"></i>Pickup Date</span>
                                 <div class="form-group">
                                  <input type="text" name="date" id="search-from-date" class="form-control" placeholder="dd/mm/yyyy" autocomplete="off" required>
                                 </div>
                              </div>

                              <div class="col-lg-2 form-part">
                                 <span><i class="fal fa-clock"></i>Pickup Time</span>
                                 <div class="form-group">
                                    <input type="time" class="form-control" type='time' value='now'>

                                 </div>
                              </div>
                              <div class="col-lg-2 form-part">
                                 <span><i class="fas fa-suitcase"></i>Package</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">02 Days</option>
                                    <option value="2">04 Days</option>
                                    <option value="3">05 Days</option>
                                 </select>
                              </div>
                              <div class="col-lg-3 form-part">
                                 <span><i class="fal fa-car"></i>Car Type</span>
                                 <select class="custom-select custom-select-sm">
                                    <option value="1">Innova Crysta  </option>
                                    <option value="2">Tempo traveller</option>
                                    <option value="3">Seltos</option>
                                    <option value="4">Bus</option>
                                 </select>
                              </div>
                           </div>
                           <button type="button" class=" search-btn btn theme-btn btn-radius btn-m w-25 mt-3" data-bs-toggle="modal" data-bs-target="#exampleModal">Find Your Ride</button>
                        </div>
                     </form>
                  </div>
                  
               </div>
            </div>
         </div>
      </div>
      <!--main-banner-ending-->
      <!-- features-starting-->
      <div class="widget-feature-v2-car">
         <div class="themesflat-container">
            <div class="feature-v2-car-wrap">
               <div class="header-section">
                  <div class="heading-section title-section-main">
                     <h2 class="title wow fadeInUp">Our Extra Features</h2>
                  </div>
               </div>
               <div class="icon-box-feature">
                  <div class="icon-box-item">
                     <div class="image">
                        <img src="assets/img/icon-01.png" alt="">
                     </div>
                     <div class="content">
                        <div class="title">Trusted Cars</div>
                     </div>
                  </div>
                  <div class="icon-box-item">
                     <div class="image">
                        <img src="assets/img/icon-02.png" alt="">
                     </div>
                     <div class="content">
                        <div class="title">Special Offers</div>
                     </div>
                  </div>
                  <div class="icon-box-item">
                     <div class="image">
                        <img src="assets/img/icon-03.png" alt="">
                     </div>
                     <div class="content">
                        <div class="title">Flexible Pricing</div>
                     </div>
                  </div>
                  <div class="icon-box-item">
                     <div class="image">
                        <img src="assets/img/icon-04.png" alt="">
                     </div>
                     <div class="content">
                        <div class="title">Travel Experience</div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- features-ending-->
      <!-- services-starting-->
      <div class="widget-category-car">
         <div class="themesflat-container">
            <div class="category-car-wrap mb--280">
               <div class="heading-section title-section-main">
                  <h2 class="title wow fadeInUp">Premium Travel Solutions</h2>
               </div>
               <div class="category-car">
                  <div class="category-car-item-wrap">
                     <div class="category-car-item">
                        <img src="assets/img/sme-travel.jpg" alt="">
                        <div class="btn-main">
                           <a href="sme-travels.php" class="button_main_inner">
                              <span>SME Travel</span>
                           </a>
                        </div>
                     </div>
                     <div class="category-car-item">
                        <img src="assets/img/aviation.jpg" alt="">
                        <div class="btn-main">
                           <a href="sme-travels.php" class="button_main_inner">
                              <span>Aviation Travel Solutions</span>
                           </a>
                        </div>
                     </div>
                  </div>
                  <div class="category-car-item">
                     <img src="assets/img/corporate.jpg" alt="">
                     <div class="btn-main mt-45">
                        <a href="sme-travels.php" class="button_main_inner">
                           <span>Corporate Travel</span>
                        </a>
                     </div>
                  </div>
                  <div class="category-car-item-wrap">
                     <div class="category-car-item">
                        <img src="assets/img/gov-official.jpg" alt="">
                        <div class="btn-main">
                           <a href="sme-travels.php" class="button_main_inner">
                              <span>Gov & PSUs Travel</span>
                           </a>
                        </div>
                     </div>
                     <div class="category-car-item">
                        <img src="assets/img/hospitality.jpg" alt="">
                        <div class="btn-main">
                           <a href="sme-travels.php" class="button_main_inner">
                              <span>Hospitality Travel</span>
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- services-ending-->
      <!--cars-starting-->
      <div class="widget-explore-car">
         <div class="themesflat-container">
            <div class="explore-car-wrap">
               <div class="header-section-main mb-30">
                  <h2 class="title-section-main wow fadeInUp">Explore all cars</h2>
                  <div class="btn-read-more wow fadeInUp">
                     <a class="more-link" href="gallery.php">
                        <span>View More</span>
                        <i class="icon-arrow-up-right2"></i>
                     </a>
                  </div>
               </div>
               <div class="row">
                  <div class="col-6 col-md-4 col-lg-4 col-xl-2 hvr-grow">
                     <a href="gallery.php"  class="icon-box border-line ">
                        <div class="image-box-wrap">
                           <img src="assets/img/01.png" alt="">
                        </div>
                        <span class="title-icon">Toyota</span>
                     </a>
                  </div>
                  <div class="col-6 col-md-4 col-lg-4 col-xl-2  hvr-grow">
                     <a href="gallery.php"  class="icon-box border-line">
                        <div class="image-box-wrap">
                           <img src="assets/img/02.png" alt="">
                        </div>
                        <span class="title-icon">Kia</span>
                     </a>
                  </div>
                  <div class="col-6 col-md-4 col-lg-4 col-xl-2 hvr-grow">
                     <a href="gallery.php"  class="icon-box border-line">
                        <div class="image-box-wrap">
                           <img src="assets/img/2.png" alt="">
                        </div>
                        <span class="title-icon">Ford</span>
                     </a>
                  </div>
                  <div class="col-6 col-md-4 col-lg-4 col-xl-2 hvr-grow">
                     <a href="gallery.php"  class="icon-box border-line">
                        <div class="image-box-wrap">
                           <img src="assets/img/3.png" alt="">
                        </div>
                        <span class="title-icon">Bentley</span>
                     </a>
                  </div>
                  <div class="col-6 col-md-4 col-lg-4 col-xl-2 hvr-grow">
                     <a href="gallery.php"  class="icon-box border-line">
                        <div class="image-box-wrap">
                           <img src="assets/img/4.png" alt="">
                        </div>
                        <span class="title-icon">Cheavrolet</span>
                     </a>
                  </div>
                  <div class="col-6 col-md-4 col-lg-4 col-xl-2 hvr-grow">
                     <a href="gallery.php"  class="icon-box border-line">
                        <div class="image-box-wrap">
                           <img src="assets/img/6.png" alt="">
                        </div>
                        <span class="title-icon">Mercedes</span>
                     </a>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--cars-ending-->
      <!--facts-starting-->
      <div class="widget-counter-car">
         <div class="themesflat-container p-27">
            <div class="counter-car">
               <div class="counter-car-header-wrap">
                  <div class="counter-car-header title-section-main">
                     <h2 class="title wow fadeInUp">Our Achievements</h2>
                  </div>
               </div>
               <div class="counter-wrap tf-counter">
                  <div class="widget-counter t-al-center counter-v1">
                     <img src="assets/img/icon-05.png" alt="">
                     <div class="number-counter number" data-to="1200" data-speed="2000"
                        data-waypoint-active="yes">
                        1000 +
                     </div>
                     <p>Happy Customers</p>
                  </div>
                  <div class="widget-counter t-al-center counter-v1">
                     <img src="assets/img/icon-06.png" alt="">
                     <div class="number-counter number" data-to="1200" data-speed="2000"
                        data-waypoint-active="yes">
                        100 +
                     </div>
                     <p>Corporates Served</p>
                  </div>
                  <div class="widget-counter t-al-center counter-v1">
                     <img src="assets/img/icon-07.png" alt="">
                     <div class="number-counter number" data-to="10" data-speed="2000"
                        data-waypoint-active="yes">
                        10 +
                     </div>
                     <p> Years Of Service Excellence</p>
                  </div>
                  <div class="widget-counter t-al-center counter-v1">
                     <img src="assets/img/icon-08.png" alt="">
                     <div class="number-counter number" data-to="5" data-speed="2000"
                        data-waypoint-active="yes">
                        5 +
                     </div>
                     <p>Servicing Cities</p>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--facts-ending-->
      <!--whychoose-start-->
      <div class="widget-our-ealers">
         <div class="themesflat-container">
            <div class="our-ealers">
               <div class="header-section-main mb-20">
                  <h2 class="title-section-main wow fadeInUp">Why Choose Butterfly Travels</h2>
               </div>
               <div class="row justify-contnet-center">
                  <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xxl-2">
                     <div class="tf-widget-team t-al-center">
                        <div class="team-image">
                           <img src="assets/img/customer-care.jpg" alt="Image">
                        </div>
                        <h5>24 / 7 Customer Support</h5>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xxl-2">
                     <div class="tf-widget-team t-al-center">
                        <div class="team-image">
                           <img src="assets/img/location.jpg" alt="Image">
                        </div>
                        <h5>Location Tracking</h5>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xxl-2">
                     <div class="tf-widget-team t-al-center">
                        <div class="team-image">
                           <img src="assets/img/prices.jpg" alt="Image">
                        </div>
                        <h5>Transparent Prices</h5>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xxl-2">
                     <div class="tf-widget-team t-al-center">
                        <div class="team-image">
                           <img src="assets/img/drivers.jpg" alt="Image">
                        </div>
                        <h5>Verified Drivers</h5>
                     </div>
                  </div>
                  <div class="col-12 col-sm-6 col-md-6 col-lg-2 col-xxl-2">
                     <div class="tf-widget-team t-al-center">
                        <div class="team-image">
                           <img src="assets/img/hygenic.png" alt="Image">
                        </div>
                        <h5>sanitized  vehicals</h5>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!--whychoose-ending-->
      <div class="widget-take-appointement">
         <div class="themesflat-container">
            <div class="take-appointement">
               <div class="take-appointement-content">
                  <h3 class="title">Are you looking for  a  Car Driving</h3>
                  <div class="btn-main">
                     <a href="contact-us.php" class="button_main_inner">
                        <span>Contact Us</span>
                     </a>
                  </div>
               </div>
               <div class="take-appointement-image wow fadeInRight animated ">
                  <img src="assets/img/contact-car.png" alt="">
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


        
        
<?php include 'includes/footer.php'?>