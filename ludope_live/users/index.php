<?php
require_once 'config.php';
?>
<!DOCTYPE html>

<html>

    <head>

        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title><?= $app_name ?> Sub ADMIN</title>

        <!-- Tell the browser to be responsive to screen width -->

        <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

        <!-- Bootstrap 3.3.7 -->

        <link rel="stylesheet" href="bower_components/bootstrap/dist/css/bootstrap.min.css">

        <!-- Font Awesome -->

        <link rel="stylesheet" href="bower_components/font-awesome/css/font-awesome.min.css">

        <!-- Ionicons -->

        <link rel="stylesheet" href="bower_components/Ionicons/css/ionicons.min.css">

        <!-- Theme style -->

        <link rel="stylesheet" href="dist/css/AdminLTE.min.css">

        <!-- iCheck -->

        <link rel="stylesheet" href="plugins/iCheck/square/blue.css">



        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->

        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

        <!--[if lt IE 9]>

        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>

        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

        <![endif]-->



        <!-- Google Font -->

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">

    </head>

    <body class="hold-transition login-page">

        <div class="login-box">

            <div class="login-logo">

<!--                <img src="<?= $img_path ?>logo-2.png" height="130" width="200" class="" /></a>-->

            </div>

            <!-- /.login-logo -->

            <div class="login-box-body">
                <h3 align="center"><?= $app_name ?> Sub ADMIN</h3>
                <p class="login-box-msg">Sign in</p>

                <form action="" name="login-form" method="post" accept-charset="utf-8">





                    <div class="form-group has-feedback">

                        <input type="number" class="form-control" placeholder="Mobile Number" id="username" name="username" value="">

                        <span class="error"></span>

                        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>

                    </div>

                    <div class="form-group has-feedback">

                        <input type="password" class="form-control" placeholder="Password" id="password" name="user_password" value="">

                        <span class="error" id="add_err"></span>


                        <span class="glyphicon glyphicon-lock form-control-feedback"></span>

                    </div>

                    <div class="row">

                        <div class="col-xs-8">

                            <div class="checkbox icheck">

                                <!--<label>

                                    <input type="checkbox"> Remember Me

                                </label>-->

                            </div>

                        </div>

                        <!-- /.col -->

                        <div class="col-xs-4">

                            <button type="submit" class="btn btn-primary btn-block btn-flat loginbtn">Sign In</button>

                        </div>

                        <!-- /.col -->

                    </div>

                </form>
                <!-- /.social-auth-links -->


            </div>

            <!-- /.login-box-body -->

        </div>

        <!-- /.login-box -->



        <!-- jQuery 3 -->

        <script src="bower_components/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap 3.3.7 -->

        <script src="bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- iCheck -->

        <script type="text/javascript">

            $(document).ready(function () {

                $(".loginbtn").click(function () {
                    username = $("#username").val();
                    password = $("#password").val();
                    $.ajax({
                        type: "POST",
                        url: "ajax.php",
                        data: "username=" + username + "&password=" + password,
                        success: function (html) {
                            if (html == 'true') {
                                //$("#add_err").html("right username or password");
                                window.location = "dashboard.php";
                            } else {
                                $("#add_err").css('display', 'block', 'important');
                                $("#add_err").html("<img src='https://upload.wikimedia.org/wikipedia/commons/4/4e/OOjs_UI_icon_alert_destructive.svg' />Wrong username or password");
                            }
                        },
                        beforeSend: function ()
                        {
                            $("#add_err").css('display', 'block', 'important');
                            $("#add_err").html("<img src='loading.gif' /> Loading...")
                        }
                    });
                    return false;
                });
            });



        </script>




    </body>

</html>