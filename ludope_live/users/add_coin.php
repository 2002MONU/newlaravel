<?php
require_once 'header.php';

$limit = 20;
$uid = 1;
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
    $where = "AND CAST(datetime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date1'] != '') {
    $date1 = $_GET['date1'];
    $date2 = $_GET['date1'];
    $where = "AND CAST(datetime AS DATE) BETWEEN '$date1' AND '$date2'";
} else if ($_GET['date2'] != '') {
    $date1 = $_GET['date2'];
    $date2 = $_GET['date2'];
    $where = "AND CAST(datetime AS DATE) BETWEEN '$date1' AND '$date2'";
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

            Balance Transaction

        </h1>

        <ol class="breadcrumb">

            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>

            <li><a href="#">User</a></li>

            <li class="active">Tranfer Coins</li>

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


                        <div class="box box-info">





                            <form class="form-horizontal">
                                <div class="box-body">
                                    <div class="form-group">


                                        <div class="col-sm-3">
                                            <label for="fromuser" class="control-label">From User</label>
                                            <select id="fromuser" name="fromuser" class="form-control select2 selectpicker2" data-live-search="true">

                                                <option value="<?php echo $uid; ?>"> <?php echo $uinfos['name']; ?> A - <?php echo $uinfos['coins']; ?> , B- <?php echo $uinfos['winning_amount']; ?>, C- <?php echo $uinfos['bonus']; ?> </option>

                                                <?php while ($user1 = mysqli_fetch_assoc($sql)) { ?>
                                                    <option data-tokens="<?php echo $user1['email']; ?> <?php echo $user1['mobile']; ?>" value="<?php echo $user1['id']; ?>"> <?php echo $user1['name']; ?> <?php echo $user1['email']; ?> <?php echo $user1['mobile']; ?> A - <?php echo $user1['coins']; ?> , B- <?php echo $user1['winning_amount']; ?>, C- <?php echo $user1['bonus']; ?></option>

                                                <?php } ?>

                                            </select>

                                        </div>



                                        <div class="col-sm-3">
                                            <label for="touser" class="control-label">Tranfer To</label>
                                            <select id="touser" name="touser" class="form-control select2 selectpicker" data-live-search="true">

                                                <option value="<?php echo $uid; ?>"> <?php echo $uinfos['name']; ?> A - <?php echo $uinfos['coins']; ?> , B- <?php echo $uinfos['winning_amount']; ?>, C- <?php echo $uinfos['bonus']; ?> </option>
                                                <?php while ($user = mysqli_fetch_assoc($sqllist)) { ?>
                                                    <option data-tokens="<?php echo $user['email']; ?> <?php echo $user['mobile']; ?>" value="<?php echo $user['id']; ?>"> <?php echo $user['name']; ?> <?php echo $user['email']; ?> <?php echo $user['mobile']; ?> A - <?php echo $user['coins']; ?> , B- <?php echo $user['winning_amount']; ?>, C- <?php echo $user['bonus']; ?></option>

                                                <?php } ?>
                                            </select>

                                        </div>
                                        <div class="col-sm-2">
                                            <label for="toaccount" class="control-label">Select Account Type</label>
                                            <select id="toaccount" name="toaccount" class="form-control select2">
                                                <option value="1"> Deposit Account</option>
                                                <option value="2"> Winning Account</option>
                                                <option value="3"> Bonus Account</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="amount" class="control-label">Description</label>
                                            <textarea id="description" name="description" type="text" placeholder="Description" class="form-control" required="required"></textarea>
                                        </div>
                                        <div class="col-sm-2">
                                            <label for="amount" class="control-label">Amount</label>
                                            <input id="amount" name="amount" type="text" placeholder="Enter Amount" class="form-control" required="required">
                                        </div>

                                        <div class="col-sm-2">
                                            <label for="amout" class="control-label col-sm-12" style="visibility:hidden">Amount</label>
                                            <input id="submittrns" type="submit" class="btn bg-green btn-primery" value="Transfer Now">

                                        </div>


                                    </div>












                                </div>

                            </form>


                        </div>

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
                                    <div class="col-md-3">
                                        <input type="text" name="date1" class="form-control" id="dt1" placeholder="yyyy-mm-dd" value="<?php
                                        if (isset($_GET['date1'])) {
                                            echo $_GET['date1'];
                                        }
                                        ?>"/>
                                    </div>
                                    <div class="col-md-3">
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
<!--                                            <th>Trans No.</th>-->
                                            <th>#</th>
                                            <th> Name</th>
                                            <th> Type</th>
                                            <th>Amount</th>
                                            <th> Updated Balance</th>
                                            <th>Closing Balance</th>
                                            <th> CR / DR</th>
                                            <th> Description</th>
                                            <th> Date and time</th>

                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        //echo "select * from trans where ipaddress IS NOT NULL $where order by tid DESC LIMIT $start_from, $limit";
                                        $touserinfo = mysqli_query($conn, "select * from trans where ipaddress IS NOT NULL $where order by tid DESC LIMIT $start_from, $limit");
                                        ?>
                                        <?php
                                        while ($user = mysqli_fetch_assoc($touserinfo)) {
                                            $sql1 = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['uid'] . "'");
                                            $row = mysqli_fetch_assoc($sql1);
                                            ?>
                                            <tr>
    <!--                                                <td><?php echo $user['tid']; ?></td>-->
                                                <td><?= ++$i; ?></td>
                                                <td><?php echo $row['name'] . ' - ' . $row['mobile']; ?></td>
                                                <td><?php echo $user['trntype']; ?></td>
                                                <td><?php echo $user['amount']; ?></td>
                                                <td><?php echo $user['updatedcoins']; ?></td>
                                                <td><?php echo $user['closingcoins']; ?></td>
                                                <td><?php echo $user['crdr']; ?></td>
                                                <td><?php echo $user['description']; ?></td>
                                                <td>

                                                    <?php
                                                    $date = $user['datetime'];

                                                    $timestamp = strtotime($date);

                                                    echo $slot_key = date("d M Y h:i:s A", $timestamp);
                                                    ?></td>


                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>



                            </div>
                            <ul class="pagination">
                                <?php
                                $sqla = "select count(*) from trans where ipaddress IS NOT NULL $where order by tid DESC";
                                $rs_result = mysqli_query($conn, $sqla);
                                $row = mysqli_fetch_row($rs_result);
                                $total_records = $row[0];

// Number of pages required.
                                $total_pages = ceil($total_records / $limit);
                                $pagLink = "";
                                for ($i = 1; $i <= $total_pages; $i++) {
                                    if ($i == $pn) {
                                        $pagLink .= "<li class='active'><a href='add_coin.php?page="
                                                . $i . "&user_search=$user_search&date1=$date1&date2=$date2'>" . $i . "</a></li>";
                                    } else {
                                        $pagLink .= "<li><a href='add_coin.php?page=" . $i . "&user_search=$user_search&date1=$date1&date2=$date2'>
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
<?php
require_once 'footer.php';
?>
<script src="bower_components/ckeditor/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/js/bootstrap-select.min.js"></script>
<link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.10.0/css/bootstrap-select.min.css" rel="stylesheet" />
<script>

    $(function () {
        $('.selectpicker').selectpicker();
        $('.selectpicker2').selectpicker();
    });

    jQuery("#submittrns").on('click', (function (e) {
        e.preventDefault();
        var touser = $('#touser').val();
        var fromuser = $('#fromuser').val();
        var toaccount = $('#toaccount').val();
        var amount = $('#amount').val();
        var description = $('#description').val();


        if (parseInt(amount) > <?php echo $uinfos['coins']; ?>) {
            /*if it is*/
            alert("You do not have sufficient balance for this transaction");
            exit;
        }

        $.ajax({
            url: "ajax.php",
            type: "POST",
            data: {fromuser: fromuser, toaccount: toaccount, amount: amount, description: description, touser: touser},
            success: function (responsedate)
            {
                alert(responsedate);
                location.reload();
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
