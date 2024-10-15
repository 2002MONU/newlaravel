<?php
require_once 'header.php';
if($_GET['userid']){
$userid = $_GET['userid'];
$sql = mysqli_query($conn, "SELECT * FROM leader_board WHERE id='" . $userid . "'");
$user = mysqli_fetch_array($sql); }
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            <?php if($_REQUEST['action']=='edit'){echo "Edit";}else{echo "Add New";}?> <?php if($_REQUEST['board_type']==2){echo "Classic";}else{echo "Lite";}?> Leader
        </h1>

        <ol class="breadcrumb">

            <li><a href="leader_board.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">Leader</a></li>

            <li class="active">Update Leader</li>

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

                      
                    </div>

                    <!-- /.box-header -->

                    <!-- form start -->


                    <form action="" name="menu_form" method="post" enctype="multipart/form-data" accept-charset="utf-8">


                        <div class="form-horizontal">

                            <div class="box-body">




                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Name</label>



                                    <div class="col-sm-6">

                                        <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $user['id']; ?>">
                                        <input type="text" class="form-control" id="name" placeholder="Name" name="name" value="<?php echo $user['name']; ?>" required>

                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Coins</label>



                                    <div class="col-sm-6">



                                        <input type="number" class="form-control" id="Email" placeholder="Coins" name="coins" value="<?php echo $user['coins']; ?>" required>



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true" ></span>

                                    </div>

                                </div>

                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Type</label>



                                    <div class="col-sm-6">

                                        <input type="radio" id="type" name="type" value="0" required <?php if($user['type']==0){echo "checked";} ?>> Last Month
                                        <input type="radio" id="type" name="type" value="1" required <?php if($user['type']==1){echo "checked";} ?>> This Month



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div>
                                
                                <!--div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Board Type</label>



                                    <div class="col-sm-6">

                                        <input type="radio" id="board_type" name="board_type" value="2" required <?php if($user['board_type']==2){echo "checked";} ?>> 2 Player
                                        <input type="radio" id="board_type" name="board_type" value="4" required <?php if($user['board_type']==4){echo "checked";} ?>> 4 Player



                                        <span class="field-validation-valid text-danger" data-valmsg-for="Menu name" data-valmsg-replace="true"></span>

                                    </div>

                                </div-->


                                

                            </div>

                            <!-- /.box-body -->

                        </div>

                        <div class="box-footer">
                            <input type="hidden" id="board_type" name="board_type" value="<?=$_REQUEST['board_type']?>" required>
                            <button type="submit" id="submit" name="submit" class="btn btn-info">Submit</button>


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
<?php require_once 'footer.php'; 
if(isset($_POST['submit']))
{extract($_POST);
if($id!='')
{
	$sqlr = "UPDATE `leader_board` SET name = '$name',coins='$coins',type='$type',board_type='$board_type'  where id='$id'";
    if (mysqli_query($conn, $sqlr)) {
        echo "<script>document.location.href = 'leader_board.php?board_type=$board_type&msg=user_update'</script>";
        die;
    } else {
        echo "<script>document.location.href = 'leader_board.php?msg=error'</script>";
        die;
    }
}
else
{$date=date('Y-m-d H:i:s');
	$sqlr = "INSERT INTO   `leader_board` (`name`,`coins`,`type`,`date`,`board_type`) values ('$name','$coins','$type','$date','$board_type')";
    if (mysqli_query($conn, $sqlr)) {
        echo "<script>document.location.href = 'leader_board.php?board_type=$board_type&msg=user_update'</script>";
        die;
    } else {
        echo "<script>document.location.href = 'leader_board.php?msg=error'</script>";
        die;
    }
}
}
?>

</body>
</html>
