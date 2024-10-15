<?php
require_once 'header.php';
$userid = $_GET['kycid'];
$getwayto = $_GET['getway'];
$sql = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $userid . "'");
if (isset($_GET["approve_status"])) {

    $status = $_GET["approve_status"];
    $reason = $_GET["reason"];
    $userid = $_GET["kid"];

    if ($status != '') {

        $sqlr = "UPDATE `kyc` SET status = '$status',reason = '$reason' where kid='$userid'";
        mysqli_query($conn, $sqlr);
    }

    echo '<script>window.location.href="kyc.php"</script>';
}
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            KYC
        </h1>

        <ol class="breadcrumb">

            <li><a href="list_user.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">User</a></li>

            <li class="active">KYC</li>

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
                        <?php
                        $pending = mysqli_num_rows(mysqli_query($conn, "select * from kyc where status='pending'"));
                        $approved = mysqli_num_rows(mysqli_query($conn, "select * from kyc where status='Approved'"));
                        $rejected = mysqli_num_rows(mysqli_query($conn, "select * from kyc where status='Rejected'"));
                        ?>
                        <h3 class="box-title"><a href="kyc.php?status=pending">Pending : <?php echo $pending; ?></a></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <h3 class="box-title"><a href="kyc.php?status=Approved">Approved : <?php echo $approved; ?></a></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <h3 class="box-title"><a href="kyc.php?status=Rejected">Rejected : <?php echo $rejected; ?></a></h3>

                        <div class="box-tools"><a href="list_user.php" class="btn btn-primary">User View</a></div>

                    </div>

                    <!-- /.box-header -->

                    <!-- form start -->







                    <div class="form-horizontal">

                        <div class="box-body">






                            <div class="table-responsive">
                                <?php
                                if ($_GET['getway'] != '' && $_GET['kycid'] != '') {
                                    ?>
                                    <table id="example1" class="table table-bordered table-striped  table-hover">
                                        <?php $user = mysqli_fetch_assoc($sql); ?>
                                        <?php if ($_GET['getway'] == 'UpiId') { ?> <tr > <th>Upi Name</th> <td><?php echo $user['upi_name']; ?></td> </tr>
                                            <tr > <th>Name</th> <td><?php echo $user['name']; ?></td> </tr>
                                            <tr> <th>Pan Number</th> <td><?php echo $user['panno']; ?></td> </tr>
                                        <?php } ?>
    <!--<tr <?php if ($getwayto == 'paypal') { ?> class="btn-info" <?php } ?>> <th>Paypal</th> <td><?php echo $user['paypal']; ?></td> </tr>-->


                                    </table> <?php } else { ?>
                                    <form method="get">
                                        <input type="hidden" name="page" value="<?php
//                                    if (isset($_GET['page'])) {
//                                        echo $_GET['page'];
//                                    } else {
                                        echo '1';
//                                    }
                                        ?>" />
                                        <div class="col-md-3">
                                            <input type="text" name="mobile" class="form-control" placeholder="Mobile Number" value="<?php
                                            if (isset($_GET['mobile'])) {
                                                echo $_GET['mobile'];
                                            }
                                            ?>"  />
                                        </div>

                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                        </div>
                                    </form>
                                    <table id="example1" class="table table-bordered table-striped  table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>User</th>  <th> Name</th>

                                                <th>PAN No.</th>
                                                <th>AADHAAR No.</th>
    <!--                                                <th>AADHAAR Image</th>
                                                <th>PAN Image</th>-->


                                                <th> Date </th>
                                                <th>Status</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if ($_GET['mobile'] != '') {
                                                $uinfo = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $_GET['mobile'] . "'"));
                                                if ($uinfo['id'] > 0) {
                                                    $kycinfo = mysqli_query($conn, "select * from kyc where user_id='" . $uinfo['id'] . "' order by kid DESC");
                                                }
                                            } else {
                                                if ($_GET['status'] == '') {
                                                    $status = 'pending';
                                                } else {
                                                    $status = $_GET['status'];
                                                }
                                                $kycinfo = mysqli_query($conn, "select * from kyc where status='$status' order by kid DESC");
                                            }
                                            ?>
                                            <?php
                                            $i = 0;
                                            while ($kycin = mysqli_fetch_assoc($kycinfo)) {
                                                $i++;
                                                $userid = $kycin['user_id'];
                                                $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                                                $userinfo = mysqli_fetch_assoc($uinfo);
                                                ?>

                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?php echo $userinfo['name']; ?> - <?php echo $userinfo['mobile']; ?></td>
                                                    <td><?php echo $kycin['name']; ?></td>
                                                    <td><?php echo $kycin['panno']; ?></td>
                                                    <td><?php echo $kycin['aadhaar']; ?></td>
        <!--                                                    <td><?php if (!empty($kycin['aadhar_image'])) { ?>
                                                                                                                                                    <a href="<?php echo '../uploads/' . $kycin['aadhar_image']; ?>" target="_blank"><img src="<?php echo '../uploads/' . $kycin['aadhar_image']; ?>" style="width: 60px;height: 60px;"></a><?php
                                                    } else {
                                                        'No file'
                                                        ?><?php } ?></td>


                                                    <td><?php if (!empty($kycin['pan_image'])) { ?>
                                                                                                                                                    <a href="<?php echo '../uploads/' . $kycin['pan_image']; ?>" target="_blank"><img src="<?php echo '../uploads/' . $kycin['pan_image']; ?>" style="width: 60px;height: 60px;"></a><?php
                                                    } else {
                                                        '<a>No file</a>'
                                                        ?><?php } ?></td>-->



                                                    <td>

                                                        <?php
                                                        $date = $kycin['datetime'];

                                                        $timestamp = strtotime($date);

                                                        echo $slot_key = date("d M Y ", $timestamp);
                                                        ?></td>
                                                    <td><?php if ($kycin['status'] == 'pending') { ?>
                                                            <a class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $kycin['kid']; ?>" role="button">Pending</a>
                                                        <?php } else if ($kycin['status'] == 'Approved') {
                                                            ?>
                                                            Approved&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $kycin['kid']; ?>" role="button">Edit</a>


                                                            <?php
                                                        } else if ($kycin['status'] == 'Rejected') {
                                                            echo "Rejected";
                                                        }
                                                        ?></td>

                                                </tr>

                                            <div id="myModal<?php echo $kycin['kid']; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Name : <?php echo $kycin['name']; ?></h4>
                                                            <h4 class="modal-title">Aadhar No : <?php echo $kycin['aadhaar']; ?></h4>

                                                            <h4 class="modal-title">Pan No : <?php echo $kycin['panno']; ?></h4>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="kycForm<?php echo $kycin['kid']; ?>" method="get" action="kyc.php">
                                                                <input type="hidden" value="<?php echo $kycin['kid']; ?>" name="kid" />
                                                                <select id="approveStatus<?php echo $kycin['kid']; ?>" name="approve_status" class="form-control" onchange="toggleReason(<?php echo $kycin['kid']; ?>)">
                                                                    <?php if ($kycin['status'] == 'pending') { ?>
                                                                        <option value="Approved">Approve</option>
                                                                        <option value="Rejected">Reject</option>
                                                                    <?php } ?>
                                                                    <?php if ($kycin['status'] == 'Approved') { ?>
                                                                        <option value="Rejected">Reject</option>
                                                                    <?php } ?>
                                                                </select> <br>
                                                                <?php if ($kycin['status'] == 'pending') { ?>
                                                                    <textarea id="reason<?php echo $kycin['kid']; ?>" name="reason" class="form-control" placeholder="Reason" style="display: none;"></textarea><br>
                                                                <?php } ?>
                                                                <?php if ($kycin['status'] == 'Approved') { ?>
                                                                    <textarea id="reason<?php echo $kycin['kid']; ?>" name="reason" class="form-control" placeholder="Reason"></textarea><br>

                                                                <?php } ?>
                                                                <input type="submit" class="btn btn-success" />
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        <?php } ?>
                                        </tbody>
                                    </table>
                                <?php } ?>
                            </div>

                            <!-- /.box-body -->

                        </div>

                        <div class="box-footer">


                            <button type="submit" onclick="goBack()" id="submittrns"  class="btn btn-info">Back</button>


                        </div>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                        <!-- /.box-footer -->


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


<script>

    jQuery("#submittrns").on('click', (function (e) {
        alert();
        e.preventDefault();
        var name = $('#name').val();
        var email = $('#Email').val();
        var mobile = $('#Phone').val();
        var password = $('#password').val();
        var insert = $('#insert').val();
        var userid = $('#userid').val();

        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: {name: name, email: email, mobile: mobile, insert: insert, userid: userid, password: password},
            success: function (responsedate)
            {
                alert(responsedate);

            }
        });



    }));
</script>



<script>
    function toggleReason(kid) {

        var approveStatus = document.getElementById('approveStatus' + kid);
        var reason = document.getElementById('reason' + kid);

        if (approveStatus.value === 'Rejected') {
            reason.style.display = 'block';
        } else {
            if (approveStatus.value === 'pending') {
                reason.style.display = 'block';
            } else {
                reason.style.display = 'none';
            }
        }
    }
</script>



</body>
</html>

