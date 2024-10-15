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
        <link rel="shortcut icon" type="image/x-icon" href="img/favicon.png">
        <link rel="stylesheet" href="assets/css/flaticon.css" />
        <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
        <script src="assets/js/jquery.min.js"></script>
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css" />
        <link rel="stylesheet" href="assets/css/owl.theme.default.min.css" />
        <link rel="stylesheet" href="assets/css/defualt.css" />
        <link rel="stylesheet" href="assets/css/style.css" />
        <link rel="stylesheet" href="assets/css/responsive.css" />

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
            <header class="index-3 innerheader">
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
                                    <li><a href="index.php" title="Homepage">Home</a></li>
                                    <li><a href="index.php" title="About Us">About Us</a></li>
                                    <li><a href="index.php" title="Features">How It Works</a></li>
                                    <li><a href="index.php" title="Screenshots">Screens</a></li>
                                    <li><a href="index.php" title="Reviews">Reviews</a></li>
                                    <li><a href="index.php" title="Contact Us">Contact Us</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- ====== Header End ====== -->