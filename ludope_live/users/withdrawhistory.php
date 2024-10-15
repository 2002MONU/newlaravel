<?php
require_once 'header.php';

$limit = 50;

if (isset($_GET["page"])) {
    $pn = $_GET["page"];
} else {
    $pn = 1;
};

$start_from = ($pn - 1) * $limit;
$i = $start_from;

$uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $uid . "'");
$uinfos = mysqli_fetch_assoc($uinfo);
$rcode = $uinfos['refercode'];

if ($uid == '1') {
    $sql = mysqli_query($conn, "SELECT * FROM users");
    $sqllist = mysqli_query($conn, "SELECT * FROM users");
} else {
    $sql = mysqli_query($conn, "SELECT * FROM users WHERE pid='" . $uid . "' OR refer='" . $rcode . "'");
    $sqllist = mysqli_query($conn, "SELECT * FROM users");
}


$where = $date1 = $date2 = $user_search = '';
if ($_GET['date1'] != '' && $_GET['date2'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date2'];
    $where = " AND CAST(datetime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = " AND CAST(datetime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = " AND CAST(datetime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['order_id'] != '') {
    $order_id = $_GET['order_id'];
    $where = " AND orderid='" . $order_id . "'";
}
if ($_GET['user_search'] != '') {
    $user_search = $_GET['user_search'];
    $s = "SELECT GROUP_CONCAT(id,',') from users where name like '%$user_search%' or mobile like '%$user_search%' or email like '%$user_search%'";

    $where .= " and find_in_set(uid, ($s))";
}
?>

<!-- Content Wrapper. Contains page content -->

<div class="content-wrapper" style="min-height: 837px;">

    <!-- Content Header (Page header) -->

    <section class="content-header">

        <h1>

            Withdraw History

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">User</a></li>

            <li class="active">Withdraw History</li>

        </ol>

    </section>



    <!-- Main content -->

    <section class="content">

        <div class="row">

            <!-- right column -->

            <div class="col-md-12">

                <!-- Horizontal Form -->

                <div class="box box-info">



                    <!-- /.box-header -->

                    <!-- form start -->


                    <section class="content">
                        <!-- Info boxes -->




                        <div class="box-body">
                            <div class="row">
                                <form method="get">
                                    <input type="hidden" name="page" value="<?php
//                                    if (isset($_GET['page'])) {
//                                        echo $_GET['page'];
//                                    } else {
                                    echo '1';
//                                    }
                                    ?>" />
                                    <div class="col-md-3">
                                        <input type="text" name="user_search" class="form-control" placeholder="Name/Mobile/Email" value="<?php
                                        if (isset($_GET['user_search'])) {
                                            echo $_GET['user_search'];
                                        }
                                        ?>"  />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="order_id" class="form-control" placeholder="Orderid" value="<?php
                                        if (isset($_GET['order_id'])) {
                                            echo $_GET['order_id'];
                                        }
                                        ?>"  />
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="date1" class="form-control" id="dt1" placeholder="yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date1'])) {
                                            echo $_GET['date1'];
                                        }
                                        ?>"/>
                                    </div>
                                    <div class="col-md-2">
                                        <input type="text" name="date2" class="form-control" id="dt2" placeholder="yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date2'])) {
                                            echo $_GET['date2'];
                                        }
                                        ?>"/>
                                    </div>

                                    <div class="col-md-3">
                                        <button type="submit" class="btn btn-primary"><i class="fa fa-search"></i> Search</button>
    <!--                                        <a target="_blank" href="export_history.php?user_search=<?= $user_search; ?>&date1=<?= $date1; ?>&date2=<?= $date2; ?>&status=<?= $status; ?>" ><div class="btn btn-success"><i class="fa fa-file-excel-o"></i> Export</div></a>-->
                                    </div>
                                </form>
                            </div>
                            <div class="table-responsive">
                                <table id="example1" class="table table-bordered table-striped  table-hover">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>User</th>
                                            <th> Order Id</th>
                                            <th>Amount</th>
                                            <th>Request Date</th>
<!--                                            <th>Withdrawal Into</th>-->
                                            <th>Account Holder name</th>
                                            <th>Email</th>
                                            <th>Bank account No</th>
                                            <th>Bank Name</th>
                                            <th>Ifsc code</th>
                                            <th>Upi id</th>
                                            <th>Upi name</th>
                                         <!--<th>Status</th>-->
                                            <th>Status</th>
                                            <th> Transaction Id / Decline Reason</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $i = $start_from;
                                        $touserinfo = mysqli_query($conn, "select * from payment where trnstype='withdrawal' and status!='In Process' $where order by pid DESC LIMIT $start_from, $limit");
                                        ?>
                                        <?php
                                        while ($user = mysqli_fetch_assoc($touserinfo)) {
                                            $userid = $user['uid'];
                                            $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                                            $userinfo = mysqli_fetch_assoc($uinfo);

                                            $bank = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $userid . "'");
                                            $bankinfo = mysqli_fetch_assoc($bank);
                                            ?>

                                            <tr>
                                                <td><?= ++$i; ?></td>
                                                <td><?php echo $userinfo['name']; ?> - <?php echo $userinfo['mobile']; ?></td>
                                                <td><?php echo $user['orderid']; ?></td>
                                                <td><?php echo $user['amount']; ?></td>
                                                <td>

                                                    <?php
                                                    $date = $user['datetime'];

                                                    $timestamp = strtotime($date);

                                                    echo $slot_key = date("d M Y h:i:s A", $timestamp);
                                                    ?></td>
                                    <!--                                                <td><a href="kyc.php?kycid=<?php echo $userid; ?>&getway=<?php echo $user['getway']; ?>"><?php echo $user['getway']; ?></a></td>-->
                                                                                    <!--<td><?php //echo $status = $user['status'];                     ?></td>-->
                                                <td><?= $bankinfo['name'] ?></td>
                                                <td><?= $userinfo['email'] ?></td>
                                                <td><?= $bankinfo['account'] ?></td>
                                                <td><?= $bankinfo['bankname'] ?></td>
                                                <td><?= $bankinfo['ifsc'] ?></td>
                                                <td><?= $bankinfo['upi_id'] ?></td>
                                                <td><?= $bankinfo['upi_name'] ?></td>
                                                <td>
                                                    <div class="btn-group">

                                                        <?php
                                                        $status = $user['status'];
                                                        if ($status == 'Success') {
                                                            ?>
                                                            <button type="button" class="btn btn-success">Approved</button>
                                                        <?php } else { ?>
                                                            <button type="button" class="btn btn-warning"><?php echo $status ?></button>

                                                        <?php } ?>
                                                    </div>


                                                </td>
                                                <td>
                                                    <?php
                                                    if ($status != 'Success') {
                                                        echo $user['decline_reason'];
                                                    }
                                                    if ($status == 'approved') {
                                                        echo $user['trnsid'];
                                                    }
                                                    ?>
                                                </td>


                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>







                            </div>
                            <ul class="pagination">
                                <?php
                                $sqla = "select COUNT(*) from payment where trnstype='withdrawal' and status!='In Process' $where order by pid DESC";
                                $rs_result = mysqli_query($conn, $sqla);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];

// Number of pages required.
                                $total_pages = ceil($total_records / $limit);
                                $pagLink = "";
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $pn) {
                                        $pagLink .= "<li class='active'><a href='withdrawhistory.php?page="
                                                . $i . "&user_search=$user_search&date1=$date1&date2=$date2'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li><a href='withdrawhistory.php?page=" . $i . "&user_search=$user_search&date1=$date1&date2=$date2'>
                                                " . $i . "</a></li>";
                                    }
                                };
                                echo $pagLink;
                                ?>
                            </ul>
                        </div>



                    </section>
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

<script src="bower_components/ckeditor/ckeditor.js"></script>
<script>

    jQuery("#submittrns").on('click', (function (e) {
        e.preventDefault();
        var touser = $('#touser').val();
        var fromuser = $('#fromuser').val();
        var toaccount = $('#toaccount').val();
        var amount = $('#amount').val();


        if (parseInt(amount) > <?php echo $uinfos['coins']; ?>) {
            /*if it is*/
            alert("You do not have sufficient balance for this transaction");
            exit;
        }

        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: {fromuser: fromuser, toaccount: toaccount, amount: amount, touser: touser},
            success: function (responsedate)
            {
                alert(responsedate);

            }
        });



    }));
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

