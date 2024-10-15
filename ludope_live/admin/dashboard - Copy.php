<?php
require_once 'header.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');

$sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE id!=1 ");
$total_users = mysqli_num_rows($sqlnew);
$sqlnew1 = mysqli_query($conn, "SELECT SUM(commission_amount) as total_commission_amount FROM gamebet WHERE losewin = 'winner'");
$total_commission_amount = mysqli_fetch_assoc($sqlnew1);
$sqlnew2 = mysqli_query($conn, "SELECT * FROM gamebet GROUP BY gameid");
$total_games = mysqli_num_rows($sqlnew2);
$sqlnew3 = mysqli_query($conn, "SELECT * FROM payment WHERE status = 'In Process' AND trnstype = 'withdrawal'");
$total_withdraw_requests = mysqli_num_rows($sqlnew3);

$sqlnew133 = mysqli_query($conn, "SELECT SUM(commission_amount) as total_commission_amount FROM gamebet WHERE losewin = 'winner' AND gamecomplete >= '$month_start' AND gtime <= '$month_end'");
$monthly_earnings = round(mysqli_fetch_assoc($sqlnew133)['total_commission_amount'], 2);



$sqlnew4 = mysqli_query($conn, "SELECT SUM(amount) as total_deposited_amount FROM payment WHERE trnstype = 'desposite' AND status='Success'");
$total_deposited_amount = mysqli_fetch_assoc($sqlnew4);
$sqlnew5 = mysqli_query($conn, "SELECT SUM(amount) as total_withdrawn_amount FROM payment WHERE trnstype = 'withdrawal' AND status = 'approved'");
$total_withdrawn_amount = mysqli_fetch_assoc($sqlnew5);

$sqlnew6 = mysqli_query($conn, "SELECT * FROM users WHERE registerd >= '$today_start' AND registerd <= '$today_end' AND id!=1 ");
$today_users = mysqli_num_rows($sqlnew6);
$sqlnew7 = mysqli_query($conn, "SELECT SUM(commission_amount) as today_commission_amount FROM gamebet WHERE losewin = 'winner' AND gamecomplete >= '$today_start' AND gtime <= '$today_end'");
$today_commission_amount = mysqli_fetch_assoc($sqlnew7);
$sqlnew8 = mysqli_query($conn, "SELECT * FROM gamebet WHERE gtime >= '$today_start' GROUP BY gameid");
$today_games = mysqli_num_rows($sqlnew8);

$sqlnew9 = mysqli_query($conn, "SELECT * FROM payment WHERE status = 'In Process' AND trnstype = 'withdrawal' AND datetime >= '$today_start' AND datetime <= '$today_end'");
$today_withdraw_requests = mysqli_num_rows($sqlnew9);
$sqlnew10 = mysqli_query($conn, "SELECT SUM(amount) as today_deposited_amount FROM payment WHERE trnstype = 'desposite' AND status='Success' AND datetime >= '$today_start' AND datetime <= '$today_end'");
$today_deposited_amount = mysqli_fetch_assoc($sqlnew10);
$sqlnew11 = mysqli_query($conn, "SELECT SUM(amount) as today_withdrawn_amount FROM payment WHERE trnstype = 'withdrawal' AND status = 'approved' AND datetime >= '$today_start' AND datetime <= '$today_end'");
$today_withdrawn_amount = mysqli_fetch_assoc($sqlnew11);

$sqlnew12 = mysqli_query($conn, "SELECT SUM(wng_amount) as total_winning_amount FROM gamebet");
$total_winning_amount = mysqli_fetch_assoc($sqlnew12);
$total_earnings = $total_deposited_amount['total_deposited_amount'] - ($total_withdrawn_amount['total_withdrawn_amount'] + $total_winning_amount['total_winning_amount']);

$sqlnew13 = mysqli_query($conn, "SELECT SUM(wng_amount) as today_winning_amount FROM gamebet WHERE AND gamecomplete >= '$today_start' AND gtime <= '$today_end'");
$today_winning_amount = mysqli_fetch_assoc($sqlnew13);
$today_earnings = $today_deposited_amount['today_deposited_amount'] - ($today_withdrawn_amount['today_withdrawn_amount'] + $today_winning_amount['today_winning_amount']);

$sqlnew14 = mysqli_query($conn, "SELECT SUM(amount) as month_deposited_amount FROM payment WHERE trnstype = 'desposite' AND datetime >= '$month_start' AND datetime <= '$month_end' AND status='Success'");
$month_deposited_amount = mysqli_fetch_assoc($sqlnew14);
$sqlnew15 = mysqli_query($conn, "SELECT SUM(amount) as month_withdrawn_amount FROM payment WHERE trnstype = 'withdrawal' AND status = 'approved' AND datetime >= '$month_start' AND datetime <= '$month_end'");
$month_withdrawn_amount = mysqli_fetch_assoc($sqlnew15);

$sqlnew16 = mysqli_query($conn, "SELECT SUM(wng_amount) as month_winning_amount FROM gamebet WHERE AND gamecomplete >= '$month_start' AND gtime <= '$month_end' AND status='Success'");
$month_winning_amount = mysqli_fetch_assoc($sqlnew16);
// $monthly_earnings = $month_deposited_amount['month_deposited_amount'] - ($month_withdrawn_amount['month_withdrawn_amount'] + $month_winning_amount['month_winning_amount']);
?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <h1>
            Dashboard
            <!--<small>advanced tables</small>-->
        </h1>
        <ol class="breadcrumb">
            <li><a href="list_user.php"><i class="fa fa-dashboard"></i> Home</a></li>

            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-xs-12">
                <!--<button type="button" class="btn btn-info"  name="export" id="export_to_excel" onClick="exportexcel();
">Export To Excel</button>-->
                <div class="box" style="height: 1000px;
                     ">
                    <div class="box-header" style="height: 100px;
                         ">
                        <div align="center" ><h1  >Earnings</h1><!-- (Deposited - (Withdrawn + Withdrawal)) Amount --></div>
                        <div class="row" style="font-size:20px;color: white;font-weight: bold;">
                            <div class="col-md-12">
                                <div class="col-md-4 text-center " style="background-color:teal;height: 240px;"><div style="margin-top: 20% !important;">Total Earnings<br /><?= round($total_commission_amount['total_commission_amount'], 2) ?><?php //echo $total_earnings        ?> Rs/-</div></div>
                                <div class="col-md-4 text-center " style="background-color:#4F5B94;height: 240px;"><div style="margin-top: 20% !important;">Month Earnings<br /><?php echo $monthly_earnings ?></div></div>
                                <div class="col-md-4 text-center " style="background-color:#03a9f3;height: 240px;"><div style="margin-top: 20% !important;">Today Earnings<br /><?= $today_commission_amount['today_commission_amount'] ?><?php //echo $today_earnings        ?></div></div>
                            </div>
                        </div>
                        <div align="center" ><h1  >Total Stats</h1></div>
                        <div class="row" style="font-size:20px; color: white; font-weight: bold;">
                            <div class="col-md-12">
                                <div class="col-md-2 text-center " style="background-color:teal;height: 120px;"><div style="margin-top: 20% !important;">Registrations<br /><?= $total_users ?></div></div>
                                <div class="col-md-2 text-center" style="background-color:#03a9f3;height: 120px;"><div style="margin-top: 20%!important;">Admin Commission<br /><?= round($total_commission_amount['total_commission_amount'], 2) ?> Rs/-</div></div>
                                <div class="col-md-2 text-center" style="background-color:#4F5B94;height: 120px;"><div style="margin-top: 20%!important;" onclick="window.location.href = 'history.php'">Games Played<br /><?= $total_games ?> </div></div>
                                <div class="col-md-2 text-center" style="background-color:#ed5565;height: 120px;"><div style="margin-top: 20%!important;">Withdraw Requests<br /><?= $total_withdraw_requests ?></div></div>
                                <div class="col-md-2 text-center" style="background-color:#222D32;height: 120px;"><div style="margin-top: 20%!important;">Deposited Amount<br /><?= $total_deposited_amount['total_deposited_amount'] ?> Rs/-</div></div>
                                <div class="col-md-2 text-center" style="background-color:green;height: 120px;"><div style="margin-top: 20%!important;">Withdrawn Amount<br /><?= $total_withdrawn_amount['total_withdrawn_amount'] ?>  Rs/-</div></div>
                            </div>
                        </div>
                        <div align="center"><h1>Today Stats</h1></div>
                        <div class="row" style="font-size:20px;color: white;font-weight: bold;">
                            <div class="col-md-12">
                                <div class="col-md-2 text-center " style="background-color:teal;height: 120px;cursor: pointer"><div style="margin-top: 20%!important;" onclick="window.location.href = 'list_user.php?date1=<?= date('Y-m-d') ?>'">Registrations<br /><?= $today_users ?></div></div>
                                <div class="col-md-2 text-center" style="background-color:#03a9f3;height: 120px;cursor: pointer"><div style="margin-top: 20%!important;" onclick="window.location.href = 'history.php?date1=<?= date('Y-m-d') ?>'">Admin Commission<br /><?= $today_commission_amount['today_commission_amount'] ?> Rs/-</div></div>
                                <div class="col-md-2 text-center" style="background-color:#4F5B94;height: 120px;cursor: pointer" onclick="window.location.href = 'history.php?date1=<?= date('Y-m-d') ?>'"><div style="margin-top: 20%!important;">Games Played<br /><?= $today_games ?></div></div>
                                <div class="col-md-2 text-center" style="background-color:#ed5565;height: 120px;"><div style="margin-top: 20%!important;">Withdraw Requests<br /><?= $today_withdraw_requests ?></div></div>
                                <div class="col-md-2 text-center" style="background-color:#222D32;height: 120px;"><div style="margin-top: 20%!important;">Deposited Amount<br /><?= $today_deposited_amount['today_deposited_amount'] ?> Rs/-</div></div>
                                <div class="col-md-2 text-center" style="background-color:green;height: 120px;"><div style="margin-top: 20%!important;">Withdrawal Amount<br /><?= $today_withdrawn_amount['today_withdrawn_amount'] ?> Rs/-</div></div>
                            </div>
                        </div>
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
