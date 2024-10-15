<?php
require_once 'header.php';
//include('config.php');

extract($_POST);
extract($_GET);
if (isset($_GET) && $_GET['action'] == 'delete') {
    mysqli_query($conn, "delete from banners where id='" . $_GET['deleteid'] . "'");
    header('location:banners.php');
}

if (isset($_POST) && $_POST['Submit'] == 'Add' && $_POST['hidid'] == '') {

    $pname = str_replace("'", "*_*", $_POST['title']);
    if (!empty($_FILES['image']['name'])) {

//        $doc = date("d-m-Y") . time("H:i:s") . $_FILES['image']['name'];
//        $docname = str_replace(" ", "_", "$doc");
//        $doc1 = $img_path . str_replace(" ", "_", "$doc");
//        move_uploaded_file($_FILES["image"]["tmp_name"], "img/" . $docname);


        $code = generatePassword();
        $oname = $_FILES["image"]["name"];
        $pos = strrpos($oname, ".");
        $extension = substr($oname, $pos + 1);
        $extension = strtolower($extension);

        $tn = $_FILES["image"]["tmp_name"];
        $path = "../uploads/" . $code . '.' . $extension;
        move_uploaded_file($tn, $path);
        $image = $code . '.' . $extension;
        $image_path1 = 'https://demo.colormoon.in/ludope/uploads/' . $image;
    }

    mysqli_query($conn, "INSERT INTO `banners` (`title`,`image`,`status`) VALUES ('$pname','$image_path1','1')");

    header('location:banners.php?msg=user_update');
}
if (isset($_POST) && $_POST['hidid'] != '') {
    $pname = str_replace("'", "*_*", $pname);
    $description = str_replace("'", "*_*", $description);
    if (!empty($_FILES['image']['name'])) {
//        $doc = date("d-m-Y") . time("H:i:s") . $_FILES['image']['name'];
//        $docname = str_replace(" ", "_", "$doc");
//        $doc1 = $img_path . str_replace(" ", "_", "$doc");
//        move_uploaded_file($_FILES["image"]["tmp_name"], "img/" . $docname);

        $code = generatePassword();
        $oname = $_FILES["image"]["name"];
        $pos = strrpos($oname, ".");
        $extension = substr($oname, $pos + 1);
        $extension = strtolower($extension);

        $tn = $_FILES["image"]["tmp_name"];
        $path = "../uploads/" . $code . '.' . $extension;
        move_uploaded_file($tn, $path);
        $image = $code . '.' . $extension;
        $image_path1 = 'https://demo.colormoon.in/ludope/uploads/' . $image;
        mysqli_query($conn, "update `banners` set `image`='$image_path1' where id='$hidid'");
    }

    mysqli_query($conn, "update `banners` set `title`='$title' where id='$hidid'");
    header('location:banners.php?msg=user_update');
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

function generatePassword($length = 10, $level = 2) {

    list($usec, $sec) = explode(' ', microtime());
    srand((float) $sec + ((float) $usec * 100000));

    $validchars[1] = "0123456789abcdfghjkmnpqrstvwxyz";
    $validchars[2] = "0123456789abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $validchars[3] = "0123456789_!@#$%&()-=+/abcdfghjkmnpqrstvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ_!@#$%&()-=+/";

    $password = "";
    $counter = 0;

    while ($counter < $length) {
        $actChar = substr($validchars[$level], rand(0, strlen($validchars[$level]) - 1), 1);

        // All character must be different
        if (!strstr($password, $actChar)) {
            $password .= $actChar;
            $counter++;
        }
    }

    return $password;
}
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Banners
             <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="banners.php"><i class="fa fa-dashboard"></i> Home</a></li>
            <li><a href="#"> Banners</a></li>
            <li class="active">Index</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!--<button type="button" class="btn btn-info"  name="export" id="export_to_excel" onClick="exportexcel();">Export To Excel</button>-->
                <?php if (isset($_GET) && $_GET['action'] == 'add') { ?>

                    <form action="banners.php" method="post" name="form1" onSubmit="return valid()" enctype="multipart/form-data">
                        <table class="table table-responsive table-bordered">


                            <tr><td><label>Title</label></td>
                                <td>
                                    <input type="text" class="form-control" id="title" name="title" required>
                                </td></tr>
    <!--                            <tr><td><label>Image</label></td>
                                <td>
                                    <input type="file" class="form-control" id="image" name="image" required>
                                </td></tr>-->




                            <tr><td colspan="2">
                                    <button type="submit" name="Submit" value="Add" class="btn bg-yellow btn-block">Add Banner</button>
                                </td></tr></table>
                    </form>
                    <?php
                } elseif (isset($_GET) && $_GET['action'] == 'edit') {
                    $det = mysqli_fetch_array(mysqli_query($conn, "select * from banners where id='" . $_GET['id'] . "'"));
                    ?>

                    <form action="banners.php" method="post" name="form1" onSubmit="return valid()" enctype="multipart/form-data">
                        <table class="table table-responsive table-bordered">
                            <tr><td><label>Title</label></td>
                                <td>
                                    <input type="text" class="form-control" id="title" name="title" required value="<?php echo $det['title']; ?>">
                                </td></tr>
    <!--                            <tr><td><label>Image</label></td>-->
    <!--                                <td>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <br><img src="<?php echo $det['image']; ?>" width="100" height="100">
                                </td></tr>-->



                            <tr><td colspan="2">
                                    <input type="hidden" name="hidid" value="<?php echo $det['id']; ?>">
                                    <button type="submit" name="Submit" value="Update" class="btn bg-yellow btn-block">Update Banner</button>
                                </td></tr></table>
                    </form><?php } else { ?>
                    <div class="box">
                        <div class="box-header">
                            <h3 class="box-title">&nbsp;</h3>
                            <div class="box-tools"><a href="banners.php?action=add" class="btn btn-primary">Add Banner</a>
                            </div>

                        </div>
                        <?php
                        if ($_GET['msg'] == 'user_update') {
                            ?>
                            <div class="alert alert-success  alert-dismissible">
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                                Banner updated successfully.
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
                                        <th>Title</th>
    <!--                                        <th>Image</th>-->
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
//                                echo "SELECT * FROM users WHERE id!=1 $where ORDER BY id DESC LIMIT $start_from, $limit";
                                    $sqlnew = mysqli_query($conn, "SELECT * FROM banners ORDER BY id DESC");
//$sql = "SELECT COALESCE(g.total_games,0) as total_games,COALESCE(gw.total_winning,0) as total_winning,COALESCE(wd.total_withdrawal,0) as total_withdrawal,COALESCE(d.total_desposite,0) as total_desposite, users.* FROM users LEFT JOIN (SELECT userid, COUNT(id) as total_games from gamebet where status = 'completed' GROUP BY gamebet.userid) g on g.userid = users.id LEFT JOIN (SELECT userid,SUM(wng_amount) as total_winning from gamebet where losewin = 'winner') gw on gw.userid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_withdrawal from payment where trnstype = 'withdrawal') wd on wd.uid = users.id LEFT JOIN (SELECT uid,SUM(amount) as total_desposite from payment where trnstype = 'desposite' and status = 'Success') d on d.uid = users.id WHERE users.id!=1 $where $order_by LIMIT $start_from, $limit";
                                    //$sqlnew = mysqli_query($conn, $sql);
//                                    print_r("SELECT * FROM banners ORDER BY id DESC");
//                                    die;
                                    while ($user = mysqli_fetch_assoc($sqlnew)) {
                                        ?>
                                        <tr>
                                            <td><?= ++$i; ?></td>
                                            <td><?php echo $user['title']; ?></td>
        <!--                                            <td><image src="<?php echo $user['image']; ?>" style="width:100px;height:100px;"></td>-->
                                            <td><a href="banners.php?action=edit&id=<?php echo $user['id'] ?>" class="btn btn-success">Edit</a></td>
                                            <td><a href="banners.php?action=delete&deleteid=<?php echo $user['id']; ?>" onClick="return delete1();" class="btn btn-warning">Delete</a></td>


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

                    <?php } ?>


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
        if (window.confirm("Confirm delete"))
        {
            return true;
        } else
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
