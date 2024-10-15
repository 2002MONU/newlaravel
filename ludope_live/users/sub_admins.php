<?php
require_once 'header.php';
extract($_POST);extract($_GET);
if(isset($_GET) && $_GET[action]=='delete')
{
mysqli_query($conn,"delete from sub_admins where id='$_GET[deleteid]'");
header('location:sub_admins.php');	
}

if(isset($_POST) && $_POST['Submit']=='Add' && $_POST['hidid']=='')
{
	$nprivileges = implode(',', $_POST['roles']);
mysqli_query($conn,"INSERT INTO `sub_admins` (`user_name`,`mobile`,`password`,`pages`,`status`) VALUES ('$user_name','$mobile','$password','$nprivileges','1')");
	$pp=mysqli_insert_id();
	
	
header('location:sub_admins.php?msg=user_update');	
}
if(isset($_POST) && $_POST['hidid']!='')
{
	
$nprivileges = implode(',', $_POST['roles']);
if($password)
{
 mysqli_query($conn,"update `sub_admins` set `password`='$password' where id='$hidid'");
}
mysqli_query($conn,"update `sub_admins` set `pages`='$nprivileges',`user_name`='$user_name',`mobile`='$mobile' where id='$hidid'");
header('location:sub_admins.php?msg=user_update');	
	
}

$limit = 20;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
};

$start_from = ($pn - 1) * $limit;
$i = $start_from;

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
           Sub Admins
            <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="sub_admins.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Sub Admins</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!--<button type="button" class="btn btn-info"  name="export" id="export_to_excel" onClick="exportexcel();">Export To Excel</button>-->
                 <?php if(isset($_GET) && $_GET[action]=='add'){?>
				
				<form action="sub_admins.php" method="post" name="form1" onSubmit="return valid()" enctype="multipart/form-data">
               <table class="table table-responsive table-bordered">

                    
                    <tr><td><label>Name</label></td>
                       <td>
      <input type="text" class="form-control" id="user_name" name="user_name" required>
                    </td></tr>
                    <tr><td><label>Mobile Number(will be Login ID)</label></td>
                       <td>
      <input type="mobile" class="form-control number" id="mobile" name="mobile" required>
                    </td></tr>
                    <tr><td><label>Password</label></td>
                       <td>
      <input type="password" class="form-control" id="password" name="password" required>
                    </td></tr>
                    <tr><td><label>Access</label></td><td>
                 <div class="list-menu">
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="manage_user" id="flexCheckDefault1">
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        Manage User
                                    </label>
                                </div>
                            </li>
                            <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="user_history" value="" id="flexCheckDefault2">
                                    <label class="form-check-label" for="flexCheckDefault2">
                                        User History
                                    </label>
                                </div>
                            </li>
                            <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="user_bio" value="" id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                        User Bio
                                    </label>
                                </div>
                            </li>
                            <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="classic_leader_board" id="flexCheckDefault4">
                                    <label class="form-check-label" for="flexCheckDefault4">
                                        Classic Leader Board
                                    </label>
                                </div>
                            </li>
                            
                              <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="lite_leader_board" id="flexCheckDefault5">
                                    <label class="form-check-label" for="flexCheckDefault5">
                                        Lite Leader Board
                                    </label>
                                </div>
                            </li>
                            
                                <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="balance_transaction" id="flexCheckDefault6">
                                    <label class="form-check-label" for="flexCheckDefault6">
                                       Balance Transaction
                                    </label>
                                </div>
                            </li>
                            
                                   <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="game_details" id="flexCheckDefault7">
                                    <label class="form-check-label" for="flexCheckDefault7">
                                       Game Details
                                    </label>
                                </div>
                            </li>
                            
                                 <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="withdraw_request" id="flexCheckDefault8">
                                    <label class="form-check-label" for="flexCheckDefault8">
                                       Withdraw Request
                                    </label>
                                </div>
                            </li>
                            
                              <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="withdraw_history" id="flexCheckDefault9">
                                    <label class="form-check-label" for="flexCheckDefault9">
                                       Withdraw History
                                    </label>
                                </div>
                            </li>
                            
                               <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="push_notifications" id="flexCheckDefault10">
                                    <label class="form-check-label" for="flexCheckDefault10">
                                       Push Notifications
                                    </label>
                                </div>
                            </li>
                            
                                 <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="kyc" id="flexCheckDefault11">
                                    <label class="form-check-label" for="flexCheckDefault11">
                                      KYC
                                    </label>
                                </div>
                            </li>
                            
                               <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="payment_order" id="flexCheckDefault12">
                                    <label class="form-check-label" for="flexCheckDefault12">
                                      Payment Order
                                    </label>
                                </div>
                            </li>
                            
                              <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="cms_management" id="flexCheckDefault13">
                                    <label class="form-check-label" for="flexCheckDefault13">
                                      CMS Management
                                    </label>
                                </div>
                            </li>
                            
                               <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="constants" id="flexCheckDefault14">
                                    <label class="form-check-label" for="flexCheckDefault14">
                                      Constants
                                    </label>
                                </div>
                            </li>
                            
                              <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="contact_us" id="flexCheckDefault15">
                                    <label class="form-check-label" for="flexCheckDefault15">
                                      Contact Us Enquiries
                                    </label>
                                </div>
                            </li>
                            
                             
                        </ul>

                    </div>  
                        </td></tr>
                    
                   
               <tr><td colspan="2">                                                            
                    <button type="submit" name="Submit" value="Add" class="btn bg-yellow btn-block">Add Sub Admin</button>  
                </td></tr></table>
            </form>
				<?php }elseif(isset($_GET) && $_GET[action]=='edit'){
					$det=mysqli_fetch_array(mysqli_query($conn,"select * from sub_admins where id='$_GET[id]'"));
					$privileges = explode(',', $det['pages']);?>
				
				<form action="sub_admins.php" method="post" name="form1" onSubmit="return valid()" enctype="multipart/form-data">
               <table class="table table-responsive table-bordered">
				
                    <tr><td><label>Name</label></td>
                       <td>
      <input type="text" class="form-control" id="user_name" name="user_name" required value="<?php echo $det['user_name'];?>">
                    </td></tr>
                    <tr><td><label>Mobile Number(will be Login ID)</label></td>
                       <td>
      <input type="mobile" class="form-control number" id="mobile" name="mobile" readonly required value="<?php echo $det['mobile'];?>">
                    </td></tr>
                    <tr><td><label>Password</label></td>
                       <td>
      <input type="password" class="form-control" id="password" name="password">
                    </td></tr>
                    <tr><td><label>Access</label></td><td>
                 <div class="list-menu">
                        <ul>
                            <li>
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="manage_user" id="flexCheckDefault1" <?php if (in_array('manage_user',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault1">
                                        Manage User
                                    </label>
                                </div>
                            </li>
                            <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="user_history" <?php if (in_array('user_history',$privileges)) { ?> checked="checked" <?php } ?> id="flexCheckDefault2">
                                    <label class="form-check-label" for="flexCheckDefault2">
                                        User History
                                    </label>
                                </div>
                            </li>
                            <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="user_bio" <?php if (in_array('user_bio',$privileges)) { ?> checked="checked" <?php } ?> id="flexCheckDefault3">
                                    <label class="form-check-label" for="flexCheckDefault3">
                                        User Bio
                                    </label>
                                </div>
                            </li>
                            <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="classic_leader_board" <?php if (in_array('classic_leader_board',$privileges)) { ?> checked="checked" <?php } ?> id="flexCheckDefault4">
                                    <label class="form-check-label" for="flexCheckDefault4">
                                        Classic Leader Board
                                    </label>
                                </div>
                            </li>
                            
                              <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="lite_leader_board" id="flexCheckDefault5" <?php if (in_array('lite_leader_board',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault5">
                                        Lite Leader Board
                                    </label>
                                </div>
                            </li>
                            
                                <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="balance_transaction" id="flexCheckDefault6" <?php if (in_array('balance_transaction',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault6">
                                       Balance Transaction
                                    </label>
                                </div>
                            </li>
                            
                                   <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="game_details" id="flexCheckDefault7" <?php if (in_array('game_details',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault7">
                                       Game Details
                                    </label>
                                </div>
                            </li>
                            
                                 <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="withdraw_request" id="flexCheckDefault8" <?php if (in_array('withdraw_request',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault8">
                                       Withdraw Request
                                    </label>
                                </div>
                            </li>
                            
                              <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="withdraw_history" id="flexCheckDefault9" <?php if (in_array('withdraw_history',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault9">
                                       Withdraw History
                                    </label>
                                </div>
                            </li>
                            
                               <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="push_notifications" id="flexCheckDefault10" <?php if (in_array('push_notifications',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault10">
                                       Push Notifications
                                    </label>
                                </div>
                            </li>
                            
                                 <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="kyc" id="flexCheckDefault11" <?php if (in_array('kyc',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault11">
                                      KYC
                                    </label>
                                </div>
                            </li>
                            
                               <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="payment_order" id="flexCheckDefault12" <?php if (in_array('payment_order',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault12">
                                      Payment Order
                                    </label>
                                </div>
                            </li>
                            
                              <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="cms_management" id="flexCheckDefault13" <?php if (in_array('cms_management',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault13">
                                      CMS Management
                                    </label>
                                </div>
                            </li>
                            
                               <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="constants" id="flexCheckDefault14" <?php if (in_array('constants',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault14">
                                      Constants
                                    </label>
                                </div>
                            </li>
                            
                              <li>
                                 <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="roles[]" value="contact_us" id="flexCheckDefault15" <?php if (in_array('contact_us',$privileges)) { ?> checked="checked" <?php } ?>>
                                    <label class="form-check-label" for="flexCheckDefault15">
                                      Contact Us Enquiries
                                    </label>
                                </div>
                            </li>
                            
                             
                        </ul>

                    </div>  
                        </td></tr>
                   
                   
                    
               <tr><td colspan="2">  
               <input type="hidden" name="hidid" value="<?php echo $det['id'];?>">                                                          
                    <button type="submit" name="Submit" value="Update" class="btn bg-yellow btn-block">Update</button>  
                </td></tr></table>
            </form><?php }else{?>
                <div class="box">
                    <div class="box-header">
                        <h3 class="box-title">&nbsp;</h3>
                        <div class="box-tools"><a href="sub_admins.php?action=add" class="btn btn-primary">Add Sub Admin</a>
</div>

                    </div>
                    <?php
                     if ($_GET['msg'] == 'user_update') {
                        ?>
                        <div class="alert alert-success  alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                            Updated successfully.
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
                                    <th>User Name</th>
                                    <th>Mobile</th>
                                    <th>Edit</th>
                                    <th>Delete</th>
                                  </tr>
                            </thead>
                            <tbody>
                                <?php 
//                                echo "SELECT * FROM users WHERE id!=1 $where ORDER BY id DESC LIMIT $start_from, $limit";
                                $sqlnew = mysqli_query($conn, "SELECT * FROM sub_admins ORDER BY id DESC");
//$sql = "SELECT COALESCE(g.total_games,0) as total_games,COALESCE(gw.total_winning,0) as total_winning,COALESCE(wd.total_withdrawal,0) as total_withdrawal,COALESCE(d.total_desposite,0) as total_desposite, users.* FROM users LEFT JOIN (SELECT userid, COUNT(id) as total_games from gamebet where status = 'completed' GROUP BY gamebet.userid) g on g.userid = users.id LEFT JOIN (SELECT userid,SUM(wng_amount) as total_winning from gamebet where losewin = 'winner') gw on gw.userid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_withdrawal from payment where trnstype = 'withdrawal') wd on wd.uid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_desposite from payment where trnstype = 'desposite' and status = 'Success') d on d.uid = users.id WHERE users.id!=1 $where $order_by LIMIT $start_from, $limit";
                                //$sqlnew = mysqli_query($conn, $sql);
                                while ($user = mysqli_fetch_assoc($sqlnew)) {
                                    ?>
                                    <tr>
                                        <td><?= ++$i; ?></td>
                                        <td><?php echo $user['user_name']; ?></td>
                                        <td><?php echo $user['mobile']; ?></td>
                                        <td><a href="sub_admins.php?action=edit&id=<?php echo $user['id']?>" class="btn btn-success">Edit</a></td>
                                        <td><a href="sub_admins.php?action=delete&deleteid=<?php echo $user[id]; ?>" onClick="return delete1();" class="btn btn-warning">Delete</a></td>
                                           

                                    </tr>
                                <?php } ?>




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

                    <?php }?>


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


<script type="text/javascript">
 function delete1()
{
  if(window.confirm("Confirm delete"))
  {
  return true;
   }
 else
   return false;
}
    jQuery(".deleteuser").on('click', (function (e) {
        var checkstr = confirm('are you sure you want to delete this?');
        if (checkstr == true) {
            // do your code
        } else {
            e.preventDefault();
        }
    }));


    $(document).ready(function () {
        var table = $('#example').DataTable({
            responsive: true,
            "pageLength": 50
        });

        new $.fn.dataTable.FixedHeader(table);
    });

</script>
<script>
//    $(function () {
//        $(".datepicker").datepicker({dateFormat: 'yy-mm-dd'});
//    });

    $(document).ready(function () {
        $("#dt1").datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function () {
                var dt2 = $('#dt2');
                var startDate = $(this).datepicker('getDate');
                //add 30 days to selected date
                startDate.setDate(startDate.getDate() + 180);
                var minDate = $(this).datepicker('getDate');
                var dt2Date = dt2.datepicker('getDate');
                //difference in days. 86400 seconds in day, 1000 ms in second
                var dateDiff = (dt2Date - minDate) / (86400 * 1000);

                //dt2 not set or dt1 date is greater than dt2 date
                if (dt2Date == null || dateDiff < 0) {
                    dt2.datepicker('setDate', minDate);
                }
                //dt1 date is 30 days under dt2 date
                else if (dateDiff > 30) {
//                    dt2.datepicker('setDate', startDate);
                }
                //sets dt2 maxDate to the last day of 30 days window
                dt2.datepicker('option', 'maxDate', startDate);
                //first day which can be selected in dt2 is selected date in dt1
                dt2.datepicker('option', 'minDate', minDate);
            }
        });
        $('#dt2').datepicker({
            dateFormat: "yy-mm-dd",
        });
    });
</script>
</body>
</html>
