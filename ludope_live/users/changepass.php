<?php
require_once 'header.php';
$sql = mysqli_query($conn, "SELECT * FROM sub_admins WHERE id='$uid'");

$sdf = mysqli_fetch_array($sql);

//echo "SELECT * FROM users WHERE id='1'"; die;

if (isset($_REQUEST['submit'])) {

    extract($_REQUEST);
    $opass = $sdf['password'];


    if ($opass != $oldpass) {

        echo '<script>alert("Old password is not match..");</script>';
    } else if ($newpass != $cpass) {

        echo '<script>alert("New Password and Confirm Password is Mismatch");</script>';
    } else {

        $sqlr = "UPDATE `sub_admins` SET password = '$newpass'  where id='$uid'";
        mysqli_query($conn, $sqlr);
        echo '<script>alert("Password Updated Successfully");</script>';
    }

    echo '<script>window.location.href="changepass.php"</script>';
}
?>


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Change Password
        </h1>

        <ol class="breadcrumb">

            <li><a href="http://appdroidsolutions.com/ludomoney/admin/Welcome/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Change Password</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">

            <!-- right column -->

            <div class="col-md-12">

                <!-- Horizontal Form -->

                <div class="box box-info">

                    <div class="box-header with-border">

                        <h3 class="box-title">Change Password </h3>

                        <!-- <div class="box-tools"><a href="list_user.php" class="btn btn-primary">User View</a></div> -->

                    </div>

                    <!-- /.box-header -->

                    <!-- form start -->


                    <form action="" name="menu_form" method="post" enctype="multipart/form-data" accept-charset="utf-8">


                        <div class="form-horizontal">

                            <div class="box-body">

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Old Password</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="Email" placeholder="Old Password" name="oldpass" value="" required="required">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">New Password</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="Phone" placeholder="New Password" name="newpass" value="" required="required">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Confirm Password</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="password" placeholder="Confirm Password" name="cpass" value="" required="required">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                            </div>

                            <!-- /.box-body -->

                        </div>

                        <div class="box-footer">
                            <input type="hidden" class="form-control" id="insert"  value="1">

                            <button type="submit" id="submittrns" name="submit" class="btn btn-info">Submit</button>


                        </div>

                        <!-- /.box-footer -->

                    </form>
                </div>

                <!-- /.box -->

            </div>

            <!--/.col (right) -->

        </div>

        <!-- /.row -->

    </section>

    <!-- /.content -->

</div>

<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>

</body>



<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 05:23:40 GMT -->

</html>

