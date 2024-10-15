<?php
require_once 'config.php';
require_once 'functions.php';
$uid = $_SESSION['uid'];
if ($uid == '') {
    echo "<script type='text/javascript'>window.location.href = ' index.php';</script>";
    exit;
}
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title><?= $app_name ?> Admin</title>
        <!-- Tell the browser to be responsive to screen width -->
        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
        <!-- Bootstrap 3.3.7 -->
        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
        <!-- Font Awesome -->
        <!--        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">-->
        <link rel="stylesheet" href="dist/css/f5.css"/>
        <!-- Ionicons -->
        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

        <!-- Theme style -->
        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">
        <!-- AdminLTE Skins. Choose a skin from the css/skins
             folder instead of downloading all of them to reduce the load. -->
        <link rel="stylesheet" href="dist/css/skins/_all-skins.min.css">

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
        <![endif]-->

        <!-- Google Font -->
        <link rel="stylesheet"
              href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    </head>
    <body class="hold-transition skin-blue sidebar-mini">
        <div class="wrapper">
            <header class="main-header">

                <!-- Logo -->

                <a href="dashboard.php" class="logo">

                    <!-- mini logo for sidebar mini 50x50 pixels -->

                    <span class="logo-mini"><?= $app_name ?> Admin</span>

                    <!-- logo for regular state and mobile devices -->

                    <span class="logo-lg"><img src="" height="46" width="46" class="img-circle"><b><?= $app_name ?> Admin</b></span>

                </a>

                <!-- Header Navbar: style can be found in header.less -->

                <nav class="navbar navbar-static-top">

                    <!-- Sidebar toggle button-->

                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button" style="position: absolute;">

                        <span class="sr-only">Toggle navigation</span>

                    </a>



                    <div class="navbar-custom-menu">

                        <ul class="nav navbar-nav">

                            <!-- User Account: style can be found in dropdown.less -->

                            <li class="dropdown user user-menu" >

                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" >


                                    <img src="<?= $base_url ?>img/default_user.png" class="user-image" alt="admin">


                                    <span class="hidden-xs">admin</span>

                                </a>

                                <ul class="dropdown-menu">

                                    <!-- User image -->

                                    <li class="user-header">


                                        <img src="<?= $base_url ?>img/default_user.png" class="img-circle" alt="admin">


                                        <p>

                                            admin
                                        </p>

                                    </li>

                                    <!-- Menu Footer-->

                                    <li class="user-footer">

                                        <div class="pull-left">

                                            <a href="changepass.php" class="btn btn-default btn-flat">Change Password</a>

                                        </div>

                                        <div class="pull-right">

                                            <a href="logout.php" class="btn btn-default btn-flat">Sign out</a>

                                        </div>

                                    </li>

                                </ul>

                            </li>

                            <!-- Control Sidebar Toggle Button -->

                            <!-- <li>

                                 <a href="#" data-toggle="control-sidebar"><i class="fa fa-gears"></i></a>

                             </li>-->

                        </ul>

                    </div>

                </nav>

            </header>


            <!-- Left side column. contains the logo and sidebar -->

            <aside class="main-sidebar">

                <!-- sidebar: style can be found in sidebar.less -->

                <section class="sidebar">

                    <!-- Sidebar user panel -->

                    <div class="user-panel">

                        <div class="text-center image">


                            <img src="<?= $base_url ?>img/default_user.png" class="img-circle" alt="" height="80" width="80">


                        </div>

                    </div>



                    <?php include 'sidebar.php'; ?>

                </section>

                <!-- /.sidebar -->

            </aside>