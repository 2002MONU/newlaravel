<?php
require_once 'header.php';



$limit = 20;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
};

$start_from = ($pn - 1) * $limit;
$i = 0;
if($_REQUEST['board_type']){$board_type=$_REQUEST['board_type'];}else{$board_type=2;}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           <?php if($board_type==2){echo "Classic";}else{echo "Lite";}?> Leader Board Pricing
            <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="leader_board_price.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"><?php if($board_type==2){echo "Classic";}else{echo "Lite";}?> Leader Board</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!--<button type="button" class="btn btn-info"  name="export" id="export_to_excel" onClick="exportexcel();">Export To Excel</button>-->
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">&nbsp;</h3>
                        <div class="box-tools">
                            <a href="add-price.php?board_type=<?=$board_type?>" class="btn btn-primary">Add <?php if($board_type==2){echo "Classic";}else{echo "Lite";}?> Pricing</a>
                            
</div>

                    </div>
                    <?php
                    if ($_GET['msg'] == 'user_exist') {
                        ?>
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Already user exists with email or mobile please try with new credentials.
                        </div>
                        <?php
                    }
                    if ($_GET['msg'] == 'error') {
                        ?>
                        <div class="alert alert-warning alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Something went wrong please try after some time.
                        </div>
                        <?php
                    }
                    if ($_GET['msg'] == 'user_add') {
                        ?>
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            User credentials added successfully.
                        </div>
                        <?php
                    }
                    if ($_GET['msg'] == 'user_update') {
                        ?>
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Details updated successfully.
                        </div>
                        <?php
                    }
                    ?>

                    <!-- /.box-header -->
                    
                    <div class="box-body table-responsive">
                        <table id="" class="table table-striped table-bordered nowrap" style="width:100%">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Leader Name</th>
                                    <th>Price</th>
                                    <th>Type</th>
                                  </tr>
                            </thead>
                            <tbody>
                                <?php 
//                                echo "SELECT * FROM users WHERE id!=1 $where ORDER BY id DESC LIMIT $start_from, $limit";
                                $sqlnew = mysqli_query($conn, "SELECT * FROM leader_board_price where board_type='$board_type' ORDER BY coins DESC");
//$sql = "SELECT COALESCE(g.total_games,0) as total_games,COALESCE(gw.total_winning,0) as total_winning,COALESCE(wd.total_withdrawal,0) as total_withdrawal,COALESCE(d.total_desposite,0) as total_desposite, users.* FROM users LEFT JOIN (SELECT userid, COUNT(id) as total_games from gamebet where status = 'completed' GROUP BY gamebet.userid) g on g.userid = users.id LEFT JOIN (SELECT userid,SUM(wng_amount) as total_winning from gamebet where losewin = 'winner') gw on gw.userid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_withdrawal from payment where trnstype = 'withdrawal') wd on wd.uid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_desposite from payment where trnstype = 'desposite' and status = 'Success') d on d.uid = users.id WHERE users.id!=1 $where $order_by LIMIT $start_from, $limit";
                                //$sqlnew = mysqli_query($conn, $sql);
                                while ($user = mysqli_fetch_assoc($sqlnew)) {
                                    ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?php echo $user['name']; ?></td>
                                        <td><?php echo $user['coins']; ?></td>
                                         <td><?php if ($user['type'] == '1') {echo "Daily";}else{echo "Monthly";} ?>
                                          </td>
                                           

                                    </tr>
                                <?php }if($i==0){echo "<tr><td colspan='3'>No Records</td></tr>";} ?>




                            </tbody>
<!-- <tfoot>
<tr>
<th>Rendering engine</th>
<th>Browser</th>
<th>Platform(s)</th>
<th>Engine version</th>
<th>CSS grade</th>
</tr>
</tfoot>-->
                        </table>
                    </div>

                    


                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->


</div>
<?php require_once 'footer.php'; ?>


</body>
</html>
