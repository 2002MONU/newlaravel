<?php include 'includes/header.php';?>
<!-- breadcrumb area start-->
<div class="breadcrumb-area breadcrumb-padding bg-img" style="background-image:url(assets/img/bg-2.jpg)">
    <div class="container">
        <div class="breadcrumb-content text-center">
            <h2>Reach Out HR</h2>
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><i class="fa fa-angle-right"></i></li>
                <li>Careers</li>
            </ul>
        </div>
    </div>
</div>
<!-- breadcrumb area end-->
<section class="reach-hr">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <div class="contact-from-wrap">
                    <h4 class="mb-5">Fill Details</h4>
                    <form>
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Enter First Name</label>
                                <input name="name" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>Enter Last Name</label>
                                <input name="name" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>Enter Number</label>
                                <input name="name" type="text">
                            </div>
                            <div class="col-lg-6">
                                <label>Enter Email</label>
                                <input name="name" type="text">
                            </div>
                            <div class="col-lg-12">
                                <label>Upload Resume</label>
                                <input name="name" type="file">
                            </div>
                            <div class="col-lg-12">
                                <label>Select Role</label>
                                <select>
                                    <option>Job1</option>
                                    <option>Job1</option>
                                    <option>Job1</option>
                                    <option>Job1</option>
                                </select>
                            </div>
                            <div class="col-lg-12">
                                <label>Enter Message</label>
                                <textarea name="message"></textarea>
                            </div>
                            <div class="col-lg-12">
                            <input class="submit" type="submit" value="Send Message" >
                            </div>
                        </div>
                    </form>
                    <p class="form-messege"></p>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="reac-hr">
                <img src="assets/img/vv.png" alt="">
                </div>
            </div>
        </div>
    </div>
</section>
<?php include 'includes/footer.php';?>