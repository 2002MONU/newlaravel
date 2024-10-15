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

<h4 class="page-title">👉🏻 Use Only this sheet <a href="sample.csv">Sample Excel Sheet</a></h4>
<h4 class="page-title">👉🏻 Header Should be Same </h4>
<h4 class="page-title">👉🏻 In Month Column Enter only : current / last </h4>


                                <div class="form-group">

                                    <label for="category" class="col-sm-3 control-label">Excel Sheet</label>



                                    <div class="col-sm-6">

                                        <input type="hidden" class="form-control" id="board_type" name="board_type" value="<?php echo $_REQUEST['board_type']; ?>">
                                        <input type="file" id="file" name="file" required>

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
 if($_FILES['file']['name'])
 {
  $filename = explode(".", $_FILES['file']['name']);
  if($filename[1] == 'csv')
  {
      mysqli_query($conn,"delete from leader_board where board_type='$board_type'");
   $handle = fopen($_FILES['file']['tmp_name'], "r");
   $firstline = true;
while (($data = fgetcsv($handle, 10000, ",")) !== FALSE)
{
    if (!$firstline) {
        // Code to insert into database
	
	
if( $data[0]!='' && $data[1]!='') {
	
        if($data[2]=='current'){$type=1;}else{$type=0;}
			$query = " INSERT into `leader_board` (`name`,`coins`,`type`,`date`,`board_type`) values ('$data[0]','$data[1]','$type','$date','$board_type')";
	
                mysqli_query($conn,$query);
				
				
          
		
}
				
    }
    $firstline = false;
}
   fclose($handle); 
			}echo "<script>document.location.href = 'leader_board.php?board_type=$board_type&msg=user_update'</script>";
        die;
    } else {
        echo "<script>document.location.href = 'leader_board.php?msg=error'</script>";
        die;
    }

}
?>

</body>
</html>
