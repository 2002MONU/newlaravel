<?php
require_once 'header.php';
$userid = $_GET['kycid'];
$getwayto = $_GET['getway'];
$sql = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $userid . "'");
$user = mysqli_fetch_assoc($sql);

if (isset($_GET["approve_status"])) {

    $status = $_GET["approve_status"];
    $reason = $_GET["reason"];
    $userid = $_GET["kid"];

    if ($status != '') {

        $sqlr = "UPDATE `kyc` SET upi_status = '$status',reason_upi = '$reason',bank_approve='$status' where kid='$userid'";

        mysqli_query($conn, $sqlr);
    }

    echo '<script>window.location.href="upi_details.php"</script>';
}
$limit = 40;  // Number of entries to show in a page.
// Look for a GET variable page if not found default is 1.
if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
};

$start_from = ($pn - 1) * $limit;
$i = 0;
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            UPI details
        </h1>

        <ol class="breadcrumb">

            <li><a href="list_user.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">User</a></li>

            <li class="active">UPI details</li>

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
                        $pending = mysqli_num_rows(mysqli_query($conn, "select * from kyc where bank_approve='pending' and is_upi='yes'"));
                        $approved = mysqli_num_rows(mysqli_query($conn, "select * from kyc where bank_approve='Approved' and is_upi='yes'"));
                        $rejected = mysqli_num_rows(mysqli_query($conn, "select * from kyc where bank_approve='Rejected' and is_upi='yes'"));
                        ?>
                        <h3 class="box-title"><a href="upi_details.php?bank_approve=pending">Pending : <?php echo $pending; ?></a></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <h3 class="box-title"><a href="upi_details.php?bank_approve=Approved">Approved : <?php echo $approved; ?></a></h3>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                        <h3 class="box-title"><a href="upi_details.php?bank_approve=Rejected">Rejected : <?php echo $rejected; ?></a></h3>

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
                                            <tr > <th>Upi Id</th> <td><?php echo $user['upi_id']; ?></td> </tr> <?php } else { ?>
                                            <tr > <th>Name</th> <td><?php echo $user['name']; ?></td> </tr>
                                            <tr> <th>Bank  Name</th> <td><?php echo $user['bankname']; ?></td> </tr>
                                            <tr> <th>Account Number</th> <td><?php echo $user['account']; ?></td> </tr>
                                            <tr> <th>IFSC</th> <td><?php echo $user['ifsc']; ?></td> </tr>
                                            <tr> <th>Pan Number</th> <td><?php echo $user['panno']; ?></td> </tr>
                                        <?php } ?>


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
                                            <input type="text" name="date1" class="form-control" id="dt1" placeholder="From yyyy-mm-dd" value="<?php
                                            if (isset($_GET['date1'])) {
                                                echo $_GET['date1'];
                                            }
                                            ?>"/>
                                        </div>
                                        <div class="col-md-2">
                                            <input type="text" name="date2" class="form-control" id="dt2" placeholder="To yyyy-mm-dd" value="<?php
                                            if (isset($_GET['date2'])) {
                                                echo $_GET['date2'];
                                            }
                                            ?>"/>
                                        </div>


                                        <div class="col-md-2">
                                            <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
                                        </div>

                                    </form>
                                    <a href="upi_details.php"><button type="submit" class="btn btn-primary">Reset</button></a>

                                    <table id="example1" class="table table-bordered table-striped  table-hover">
                                        <thead>
                                            <tr>
                                                <th>Sno</th>
                                                <th>User</th>
    <!--                                                <th>Account holder Name</th>
                                                <th> Bank Name</th>
                                                <th>Account</th>
                                                <th>IFSC</th>-->
                                                <th>UPI Name.</th>
                                                <th>UPI Id.</th>
                                                <th> Date </th>
                                                <th>Status</th>
                                                <?php if ($_GET['bank_approve'] == 'Rejected') { ?>
                                                    <th>Reject reason</th>
                                                <?php } ?>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            if (!empty($_GET)) {
                                                if ($_GET['mobile'] != '') {
                                                    $uinfo = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE mobile='" . $_GET['mobile'] . "'"));

                                                    if ($uinfo['id'] > 0) {
                                                        $kycinfo = mysqli_query($conn, "select * from kyc where user_id='" . $uinfo['id'] . "' and is_upi='yes' order by kid DESC LIMIT $start_from, $limit");
                                                    }
                                                }
                                                if ($_GET['date1'] != '' && $_GET['date2'] != '') {

                                                    $date1 = $_GET['date1'];
                                                    $date2 = $_GET['date2'];

                                                    $where = "CAST(kyc.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
                                                    $uinfo = mysqli_query($conn, "SELECT * FROM kyc WHERE " . $where . "");

                                                    $kycinfo = $uinfo;
                                                } else if ($_GET['date1'] != '') {
                                                    $date1 = $_GET['date1'];
                                                    $date2 = $_GET['date1'];
                                                    $where = "CAST(kyc.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
                                                    $uinfo = mysqli_query($conn, "SELECT * FROM kyc WHERE " . $where . "");

                                                    $kycinfo = $uinfo;
                                                } else if ($_GET['date2'] != '') {
                                                    $date1 = $_GET['date2'];
                                                    $date2 = $_GET['date2'];
                                                    $where = "CAST(kyc.datetime AS DATE) BETWEEN '$date1' AND '$date2'";
                                                    $uinfo = mysqli_query($conn, "SELECT * FROM kyc WHERE " . $where . "");

                                                    $kycinfo = $uinfo;
                                                } else if ($_GET['bank_approve'] != '') {

                                                    $status = $_GET['bank_approve'];

                                                    $kycinfo = mysqli_query($conn, "select * from kyc where bank_approve='$status' and is_upi='yes' order by kid DESC LIMIT $start_from, $limit");
                                                }
                                            } else {
                                                $status = 'pending';

                                                $kycinfo = mysqli_query($conn, "select * from kyc where bank_approve='$status' and is_upi='yes' order by kid DESC LIMIT $start_from, $limit");
                                            }
                                            ?>
                                            <?php
                                            while ($kycin = mysqli_fetch_assoc($kycinfo)) {

                                                $userid = $kycin['user_id'];
                                                $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                                                $userinfo = mysqli_fetch_assoc($uinfo);
                                                ?>

                                                <tr>
                                                    <td><?= ++$i; ?></td>
                                                    <td><?php echo $userinfo['name']; ?> - <?php echo $userinfo['mobile']; ?></td>
        <!--                                                    <td><?php echo $kycin['name']; ?></td>-->
        <!--                                                    <td><?php echo $kycin['bankname']; ?></td>
                                                    <td><?php echo $kycin['account']; ?></td>
                                                    <td><?php echo $kycin['ifsc']; ?></td>-->

                                                    <td><?php echo $kycin['upi_name']; ?></td>
                                                    <td><?php echo $kycin['upi_id']; ?></td>
                                                    <td><?php
                                                        $date = $kycin['datetime'];

                                                        $timestamp = strtotime($date);

                                                        echo $slot_key = date("d M Y ", $timestamp);
                                                        ?></td>
                                                    <td><?php if ($kycin['bank_approve'] == 'pending') { ?>
                                                            <a class="btn btn-warning" data-toggle="modal" data-target="#myModal<?php echo $kycin['kid']; ?>" role="button">Pending</a>
                                                        <?php } else if ($kycin['bank_approve'] == 'Approved') {
                                                            ?>
                                                            Approved&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" data-target="#myModal<?php echo $kycin['kid']; ?>" role="button">Edit</a>


                                                            <?php
                                                        } else if ($kycin['bank_approve'] == 'Rejected') {
                                                            ?>
                                                            Rejected&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-primary" data-toggle="modal" data-target="#rejectModal<?php echo $kycin['kid']; ?>" role="button">Edit</a>
                                                            <?php
                                                        }
                                                        ?></td>
                                                    <?php if ($kycin['bank_approve'] == 'Rejected') {
                                                        ?>
                                                        <td><?= $kycin['reason_upi'] ?></td>

                                                    <?php }
                                                    ?>
                                                </tr>

                                            <div id="myModal<?php echo $kycin['kid']; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Upi Name : <?php echo $kycin['upi_name']; ?></h4>
                                                            <h4 class="modal-title">Upi Id : <?php echo $kycin['upi_id']; ?></h4>

                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="kycForm<?php echo $kycin['kid']; ?>" method="get" action="upi_details.php">
                                                                <input type="hidden" value="<?php echo $kycin['kid']; ?>" name="kid" />
        <!--                                                                <input type="hidden" value="<?php echo $kycin['is_bank']; ?>" name="type" />-->

                                                                <select id="approveStatus<?php echo $kycin['kid']; ?>" name="approve_status" class="form-control" onchange="toggleReason(<?php echo $kycin['kid']; ?>)">

                                                                    <option value="Approved">Approve</option>
                                                                    <option value="Rejected">Reject</option>


                                                                </select> <br>

                                                                <textarea id="reason<?php echo $kycin['kid']; ?>" name="reason" class="form-control" placeholder="Reason"></textarea><br>

                                                                <input type="submit" class="btn btn-success" />
                                                            </form>
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>


                                            <div id="rejectModal<?php echo $kycin['kid']; ?>" class="modal fade" role="dialog">
                                                <div class="modal-dialog">

                                                    <!-- Modal content-->
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                                            <h4 class="modal-title">Upi Name : <?php echo $kycin['upi_name']; ?></h4>
                                                            <h4 class="modal-title">Upi Id : <?php echo $kycin['upi_id']; ?></h4>

                                                        </div>
                                                        <div class="modal-body">
                                                            <form id="kycForm<?php echo $kycin['kid']; ?>" method="get" action="upi_details.php">
                                                                <input type="hidden" value="<?php echo $kycin['kid']; ?>" name="kid" />
        <!--                                                                <input type="hidden" value="<?php echo $kycin['is_bank']; ?>" name="type" />-->

                                                                <select id="approveStatus<?php echo $kycin['kid']; ?>" name="approve_status" class="form-control" onchange="toggleReason(<?php echo $kycin['kid']; ?>)">

                                                                    <option value="Approved">Approve</option>


                                                                </select> <br>


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


                            <!--                            <button type="submit" onclick="goBack()" id="submittrns"  class="btn btn-info">Back</button>-->


                        </div>
                        <script>
                            function goBack() {
                                window.history.back();
                            }
                        </script>
                        <!-- /.box-footer -->
                        <ul class="pagination">
                            <?php
                            $sqla = "SELECT COUNT(*) FROM kyc where bank_approve='" . $_GET['bank_approve'] . "' and is_upi='yes'";
                            $rs_result = mysqli_query($conn, $sqla);
                            $row = mysqli_fetch_row($rs_result);
                            $total_records = $row[0];

                            $total_pages = ceil($total_records / $limit);
                            $perPage = 20; // Number of items per page
                            $totalPages = ceil($total_records / $perPage); // Calculate total number of pages
                            $currentPage = isset($_GET['page']) ? $_GET['page'] : 1; // Get current page, default is 1
                            // Determine the range of pages to display
                            $range = 3; // Number of page links to show on each side of current page

                            $start = max(1, $currentPage - $range);
                            $end = min($totalPages, $currentPage + $range);

                            // Display "Previous" link if not on the first page
                            if ($currentPage > 1) {
                                echo '<li><a href="?page=' . ($currentPage - 1) . '&bank_approve=' . $_GET['bank_approve'] . '">Previous</a></li>';
                            }

                            // Display page links
                            for ($i = $start; $i <= $end; $i++) {
                                if ($i == $currentPage) {
                                    echo '<li class="active"><a>' . $i . '</a></li>';
                                } else {
                                    echo '<li><a href="?page=' . $i . '&bank_approve=' . $_GET['bank_approve'] . '">' . $i . '</a></li>';
                                }
                            }

                            // Display "Next" link if not on the last page
                            if ($currentPage < $totalPages) {
                                echo '<li><a href="?page=' . ($currentPage + 1) . '&bank_approve=' . $_GET['bank_approve'] . '">Next</a></li>';
                            }
                            ?>
                        </ul>

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

