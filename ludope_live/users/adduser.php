<?php
require_once 'header.php';
$sql = mysqli_query($conn, "SELECT * FROM users WHERE pid='" . $uid . "'");
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Add New User
        </h1>

        <ol class="breadcrumb">

            <li><a href="list_user.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">User</a></li>

            <li class="active">UpdateUser</li>

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

                        <h3 class="box-title">Add </h3>

                        <div class="box-tools"><a href="list_user.php" class="btn btn-primary">User View</a></div>

                    </div>

                    <!-- /.box-header -->

                    <!-- form start -->


                    <form action="user_add.php" name="menu_form" method="post" enctype="multipart/form-data" accept-charset="utf-8">


                        <div class="form-horizontal">

                            <div class="box-body">




                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">name</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="" required="required">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Email</label>



                                    <div class="col-sm-6">



                                        <input type="text" class="form-control" id="Email" placeholder="Email" name="email" value="" required="required">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true" ></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Phone</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="mobile" placeholder="mobile" name="mobile" value="" required="required">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Password</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="password" placeholder="Password" name="password" value="" required="required">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                            </div>

                            <!-- /.box-body -->

                        </div>

                        <div class="box-footer">
                            <input type="hidden" class="form-control" id="insert"  value="1">

                            <button type="submit" id="submittrns" class="btn btn-info">Submit</button>


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
<?php require_once 'footer.php'; ?>

</body>
</html>
