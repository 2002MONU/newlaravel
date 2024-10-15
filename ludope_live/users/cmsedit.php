<?php
require_once 'header.php';
$uuid = $_GET['userid'];
$sql = mysqli_query($conn, "SELECT * FROM cms WHERE id='$uuid'");

$sdf = mysqli_fetch_array($sql);

//echo "SELECT * FROM users WHERE id='1'"; die;

if (isset($_REQUEST['submit'])) {

    extract($_REQUEST);
    $opass = $_REQUEST['description'];
    $ii = $_REQUEST['id'];

    $sqlr = "UPDATE `cms` SET description = '$opass' where id='$ii'";
    mysqli_query($conn, $sqlr);
    echo '<script>alert("Update Successfully");</script>';


    echo '<script>window.location.href="cms_list.php"</script>';
}
?>


<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            CMS Management
        </h1>

        <ol class="breadcrumb">

            <li><a href="http://appdroidsolutions.com/ludomoney/admin/Welcome/dashboard"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">editcms</li>

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

                        <h3 class="box-title">CMS Management</h3>

                        <!-- <div class="box-tools"><a href="list_user.php" class="btn btn-primary">User View</a></div> -->

                    </div>

                    <!-- /.box-header -->

                    <!-- form start -->


                    <form action="" name="menu_form" method="post" enctype="multipart/form-data" accept-charset="utf-8">


                        <div class="form-horizontal">

                            <div class="box-body">

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Name</label>



                                    <div class="col-sm-6">

                                        <input type="text" class="form-control" id="Email" placeholder="" name="name" value="<?php echo $sdf['name']; ?>" required="required" readonly="readonly">

                                        <input type="hidden" class="form-control" id="Email" placeholder="" name="id" value="<?php echo $sdf['id']; ?>" required="required" readonly="readonly">



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                   <?php if($_GET['userid']!=6 && $_GET['userid']!=7){?> <label for="category" class="col-sm-3 control-label">Description</label>

                                   <?php }else{echo "<label class='col-sm-3 control-label'>Link</label>";}?>

                                    <div class="col-sm-8">
<?php if($_GET['userid']!=6 && $_GET['userid']!=7){?>
                                        <textarea name="description" class="form-control"><?php echo $sdf['description']; ?></textarea>
                                            <?php } else{?><input type="text" class="form-control" name="description" value="<?php echo $sdf['description']; ?>" placeholder="Link"><?php }?>
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
<?php require_once 'footer.php'; ?>
<?php if($_GET['userid']!=6 && $_GET['userid']!=7){?>
<script src="//cdn.ckeditor.com/4.11.1/standard/ckeditor.js"></script>
<script type="text/javascript">

    CKEDITOR.replace('description', {

        width: "800px",
        height: "500px"

    });

</script><?php }?>
</body>



<!-- Mirrored from adminlte.io/themes/AdminLTE/pages/forms/general.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 23 Jan 2018 05:23:40 GMT -->

</html>

