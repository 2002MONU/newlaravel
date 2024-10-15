<?php
require_once 'header.php';
$userid = $_GET['userid'];
$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Update User
        </h1>

        <ol class="breadcrumb">

            <li><a href="<?= $base_url ?>list_user.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="<?= $base_url ?>list_user.php">User</a></li>

            <li class="active">Update User</li>

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

                        <h3 class="box-title">Update </h3>

                        <div class="box-tools"><a href="list_user.php" class="btn btn-primary">Users</a></div>

                    </div>

                    <!-- /.box-header -->

                    <!-- form start -->


                    <form action="user_update.php" name="menu_form" method="post" enctype="multipart/form-data" accept-charset="utf-8">


                        <div class="form-horizontal">

                            <div class="box-body">


                                <?php $user = mysqli_fetch_assoc($sql); ?>

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">name</label>



                                    <div class="col-sm-6">

                                        <input type="hidden" class="form-control" id="id" placeholder="Name" name="id" value="<?php echo $user['id']; ?>">
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $user['name']; ?>">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Email</label>



                                    <div class="col-sm-6">



                                        <input type="text" class="form-control" id="Email" placeholder="Email" name="email" value="<?php echo $user['email']; ?>">

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Phone</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="mobile" placeholder="mobile" name="mobile" value="<?php echo $user['mobile']; ?>">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>


                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Password</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="password" placeholder="Password" name="password" value="<?php echo $user['password']; ?>">
                                        <input type="hidden" class="form-control" id="insert"  value="2">
                                        <input type="hidden" class="form-control" id="userid"  value="<?php echo $userid; ?>">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                            </div>

                            <!-- /.box-body -->

                        </div>

                        <div class="box-footer">


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

<!-- /.content-wrapper -->
<?php require_once 'footer.php'; ?>
</body>
</html>


