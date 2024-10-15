<?php
include'includes/header.php';
$sql = mysqli_query($conn, "SELECT * FROM cms WHERE id='" . 4 . "'");
$cms = mysqli_fetch_assoc($sql);
?>
<?php include 'includes/header1.php'; ?>
<style>
    .btn-back{
        background-color:#0061c0;
        color:#fff;
        font-size:14px;
        float:right;
        padding:5px 15px;
        border-radius:5px;
    }
</style>
<!--<section id="terms about-us ">
    <div class="container">
        <div class="row">

            <div class="content">
                <div class="col-md-12">

                    <div class="about-content-sec common-cls terms">
                        <article>
                            <h2 align="center"><?= $cms['name'] ?></h2>
                            <?php
                            echo $cms['description'];
                            ?>
                        </article>
                    </div>

                </div>
            </div>

            <div class="clearfix"></div>
        </div>

    </div>
</section>-->

 <section id="contact-us" class="index-2 contact-us">
        <div class="container">
            <div class="section-heading d-none">
                <h3>Contact Us</h3>
            </div>
            <div class="content">
                <div class="row">
                    <div class="col-md-6 col-sm-6 col-xs-12 contact-content">
                        <h6>Contact Us</h6>
                        <h2>Don't Hesitate to contact with us for any kind of information</h2>
                        <div class="clearfix"></div>
                        <h6>Call us for immediate support</h6>
                        <h3>+91 8340 939 495</h3>
                        <div class="clearfix"></div>
                        <h6>Email us for immediate support</h6>
                        <h3><a href="mailto:mh@thecolourmoon.com">mh@thecolourmoon.com</a></h3>
                    </div>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <div class="contact-form">
                        <?php
                        if ($_GET['msg'] == 'contact') {
                            ?>
                            <h6 style="color:green;" align="center">Enquiry submitted successfully</h6>
                            <?php
                        }
                        ?>
                            <h3 class="text-center mb-3">Get In Touch</h3>
                        <form action="contact_form.php" method="post">
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <input type="text" required="" placeholder="Full Name" name="name" />
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <input type="text" class="number" required="" placeholder="Mobile" name="mobile"/>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <input type="email" required="" placeholder="Email" name="email"/>
                            </div>
                            <!--                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                                            <input type="text" placeholder="Subject" />
                                                        </div>-->
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <textarea placeholder="Message" required="" name="message"></textarea>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group mar_none">
                                <button type="submit" name="submit" value="submit">Send Message<i class="glyph-icon flaticon-sent-mail"></i></button>
                            </div>
                        </form
                        </div>
                    </div>
                </div>
                <!-- <div class="row">
                   <div class="col-md-12 col-sm-12 col-xs-12 contact-info">
                      <div class="col-md-6 col-sm-4 col-xs-12 text-center">
                         <i class="flaticon flaticon-call"></i>
                         <h6>Phone No.</h6>
                         <div class="detail">+91-0123456789, +91-0123456789, +91-0123456789</div>
                      </div>

                      <div class="col-md-6 col-sm-4 col-xs-12 text-center">
                         <i class="flaticon flaticon-mail"></i>
                         <h6>Email Id</h6>
                         <div class="detail"><a href="#">support@example.com</a>, <a href="#">info@example.com</a>, <a href="#">hr@example.com</a></div>
                      </div>
                   </div>
                </div> -->
            </div>
        </div>
    </section>
<?php if (isset($_GET['app']) && $_GET['app'] == 'app') { ?>
    <section id="contact-us" class="index-2">
        <div class="container">

            <div class="content terms">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-12 contact-content">
                        <h6>Contact Us</h6>
                        <h2>Don’t Hesitate to contact with us for any kind of information</h2>
                        <div class="clearfix"></div>
                        <h6>Call us for imiditate support</h6>
                        <h3>+91-0123456789</h3>
                        <div class="clearfix"></div>
                        <h6>Email us for imiditate support</h6>
                        <h3><a href="#">support@homieludo.com</a></h3>
                    </div>
                    <div class="col-md-7 col-sm-7 col-xs-12 contact-form">
                        <form action="contact_form.php" method="post">
                            <?php
                            if ($_GET['msg'] == 'contact') {
                                ?>
                                <h6 style="color:green;" align="center">Enquiry submitted successfully</h6>
                                <?php
                            }
                            ?>
                            <input type="hidden" name="redirection" value="support" />
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <input type="text" placeholder="Full Name" required="" name="name" >
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <input type="text" placeholder="Mobile" required="" name="mobile">
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <input type="text" placeholder="Email" name="email" required="">
                            </div>

                            <div class="col-md-6 col-sm-6 col-xs-12 form-group">
                                <textarea placeholder="Message" name="message" required=""></textarea>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-12 form-group mar_none">
                                <button type="submit">Send Message<i class="glyph-icon flaticon-sent-mail"></i></button>
                            </div>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>
<?php } ?>
<?php include 'includes/footer.php'; ?>