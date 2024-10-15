<?php
require_once 'admin/config.php';
$sql = mysqli_query($conn, "SELECT * FROM cms WHERE id='" . 1 . "'");
$about = mysqli_fetch_assoc($sql);
?>
<!Doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title><?= $app_name ?></title>
        <meta name="description" content="Download Homie Ludo on your mobile from our website. Ismart Ludo  is listed Number 1 Top Game">
        <meta name="keywords" content="Best ludo app, Best ludo websites, Homie Ludo, Ludo Fun Games,">
        <meta name="MobFire" content="MobFire">
        <meta name="MobFire" content="MobFire.- Mobile Application Landingpage">
        <meta name="keywords" content="Mobile Application">
        <link rel="shortcut icon" type="image/x-icon" href="assets/img/favicon.png">
        <link rel="stylesheet" href="assets/css/flaticon.css" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <script src="assets/js/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
        <link rel="stylesheet" href="assets/css/defualt.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />
        <link rel="preconnect" href="https://fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Luckiest+Guy&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    </head>
    <body>
        <style>
            .hidden{
                visibility: hidden;
            }
        </style>
        <div class="preloader js-preloader flex-center">
            <img src="assets/img/logo.png" alt="Loader" />
        </div>
        <div class="wraper" id="home">
            <!-- ====== Header Start ====== -->
            <header class="index-3">
                <div class="container">
                    <div class="row">
                        <div class="col-md-2 col-sm-4 col-xs-6 logo">
                            <a href="<?= $_GET['app'] != '' ? '#' : 'index.php' ?>"><img src="assets/img/logo.png" alt="Homieludo"></a>
                        </div>
                        <div class="col-md-10 col-sm-8 col-xs-6">
                            <div class="menu move-right">
                                <div class="toggle <?= $_GET['app'] != '' ? 'hidden' : '' ?>">
                                    <span></span>
                                </div>
                                <ul>
                                    <li><a href="#home" title="Homepage">Home</a></li>
                                    <li><a href="#about-us" title="About Us">About Us</a></li>
                                    <li><a href="#features" title="Features">How It Works</a></li>
                                    <li><a href="#screenshots" title="Screenshots">Screens</a></li>
                                    <li><a href="#review" title="Reviews">Reviews</a></li>
                                    <li><a href="#contact-us" title="Contact Us">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ====== Header End ====== -->