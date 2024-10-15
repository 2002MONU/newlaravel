<?php
require_once 'header.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');

$sqlnew9 = mysqli_query($conn, "SELECT * FROM payment WHERE status = 'In Process' AND trnstype = 'withdrawal'");
$pending_withdraw_requests = mysqli_num_rows($sqlnew9);

$sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE id!=1 and otp_verified='verified'");
$total_users = mysqli_num_rows($sqlnew);

$sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE (lastlogin BETWEEN '$today_start' AND '$today_end') and otp_verified='verified'");
$today_active_users = mysqli_num_rows($sqlnew);

$sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE (registerd BETWEEN '$today_start' AND '$today_end') and otp_verified='verified' ");
$today_users_added = mysqli_num_rows($sqlnew);

$sqlnew1 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM gamebet WHERE (gtime BETWEEN '$today_start' AND '$today_end')");
$today_game_volume = mysqli_fetch_assoc($sqlnew1);

$sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE (gtime BETWEEN '$today_start' AND '$today_end') ");
$today_game_play = mysqli_num_rows($sqlnew);

$sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE (gtime BETWEEN '$today_start' AND '$today_end') and status='running' ");
$running_game = mysqli_num_rows($sqlnew);

$sqlnew1 = mysqli_query($conn, "SELECT SUM(coins) as amount FROM users where id>1");
$game_volume = mysqli_fetch_assoc($sqlnew1);

$sqlnew1 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM gamebet");
$game_money = mysqli_fetch_assoc($sqlnew1);

$sqlnew4 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM payment WHERE trnstype = 'deposit' AND status='success' AND (datetime BETWEEN '$today_start' AND '$today_end')");
$today_deposited_amount = mysqli_fetch_assoc($sqlnew4);

$sqlnew5 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM payment WHERE trnstype = 'withdrawal' AND status = 'approved' AND (datetime BETWEEN '$today_start' AND '$today_end')");
$today_withdrawn_amount = mysqli_fetch_assoc($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT * FROM payment WHERE trnstype = 'withdrawal' AND status = 'approved' AND (datetime BETWEEN '$today_start' AND '$today_end')");
$today_withdrawn_count = mysqli_num_rows($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT * FROM users WHERE refer_id > 0 and otp_verified='verified'");
$total_referral = mysqli_num_rows($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT * FROM users WHERE refer_id > 0 and otp_verified='verified' AND (registerd BETWEEN '$today_start' AND '$today_end')");
$today_referral = mysqli_num_rows($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT * FROM users WHERE refer_id > 0 and otp_verified='verified' AND (registerd BETWEEN '$month_start' AND '$month_end')");
$this_month_referral = mysqli_num_rows($sqlnew5);

$sqlnew4 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM payment WHERE trnstype = 'deposit' AND status='success' AND (datetime BETWEEN '$month_start' AND '$month_end')");
$this_month_deposited_amount = mysqli_fetch_assoc($sqlnew4);

$sqlnew_manual_deposit = mysqli_query($conn, "SELECT SUM(bonus) as amount FROM bonus WHERE (bonus_type = 'Deposit Transfer') AND (date BETWEEN '$month_start' AND '$month_end')");
$this_month_manual_deposited_amount = mysqli_fetch_assoc($sqlnew_manual_deposit);

$sqlnew4 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM payment WHERE trnstype = 'withdrawal' AND status = 'approved' AND (datetime BETWEEN '$month_start' AND '$month_end')");
$this_month_withdrawl_amount = mysqli_fetch_assoc($sqlnew4);

$sqlnew5 = mysqli_query($conn, "SELECT * FROM users WHERE (registerd BETWEEN '$month_start' AND '$month_end') and otp_verified='verified'");
$this_month_user_added = mysqli_num_rows($sqlnew5);
//echo "SELECT SUM(amount) FROM gamebet WHERE (gtime BETWEEN '$month_start' AND '$month_end')";
$sqlnew1 = mysqli_query($conn, "SELECT SUM(amount) as amount FROM gamebet WHERE (gtime BETWEEN '$month_start' AND '$month_end')");
$this_month_game_volume = mysqli_fetch_assoc($sqlnew1);

$sqlnew4 = mysqli_query($conn, "SELECT * FROM payment WHERE trnstype = 'withdrawal' AND status = 'approved' AND (datetime BETWEEN '$month_start' AND '$month_end')");
$this_month_withdrawl_count = mysqli_num_rows($sqlnew4);

$sqlnew5 = mysqli_query($conn, "SELECT SUM(commission_amount) as amount FROM gamebet WHERE status = 'completed' AND (gtime BETWEEN '$month_start' AND '$month_end')");
$this_monthprofit = mysqli_fetch_assoc($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT SUM(commission_amount) as amount FROM gamebet WHERE status = 'completed' AND (gtime BETWEEN '$today_start' AND '$today_end')");
$today_profit = mysqli_fetch_assoc($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT SUM(wng_amount) as amount FROM gamebet WHERE status = 'completed' AND (gtime BETWEEN '$month_start' AND '$month_end')");
$this_month_earning = mysqli_fetch_assoc($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT SUM(wng_amount) as amount FROM gamebet WHERE status = 'completed' AND (gtime BETWEEN '$today_start' AND '$today_end')");
$today_earning = mysqli_fetch_assoc($sqlnew5);
//echo "SELECT SUM(bonus) as amount FROM bonus WHERE (date BETWEEN '$today_start' AND '$today_end') and (bonus_type='Signup' || bonus_type='Bonus Transfer')";die;
$sqlnew5 = mysqli_query($conn, "SELECT SUM(bonus) as amount FROM bonus WHERE (date BETWEEN '$today_start' AND '$today_end') and (bonus_type='Signup' || bonus_type='Bonus Transfer' || bonus_type='Referred' || bonus_type='Referral')");
$today_bonus = mysqli_fetch_assoc($sqlnew5);

$sqlnew5 = mysqli_query($conn, "SELECT SUM(bonus) as amount FROM bonus WHERE (date BETWEEN '$month_start' AND '$month_end') and (bonus_type='Signup' || bonus_type='Bonus Transfer' || bonus_type='Referred' || bonus_type='Referral')");
$this_month_bonus = mysqli_fetch_assoc($sqlnew5);

$sqlnew4 = mysqli_query($conn, "SELECT SUM(amount) as total FROM payment WHERE status='success' AND trnstype='deposit'");
$total_deposits = mysqli_fetch_assoc($sqlnew4);
//$sqlnew4 = mysqli_query($conn, "SELECT SUM(amount) FROM payment WHERE status = 'In Process' AND trnstype='desposite'  AND (datetime BETWEEN '$month_start' AND '$month_end')");
//$total_payout_request = mysqli_fetch_assoc($sqlnew4);
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
            <li><i class="fa fa-dashboard"></i> Home</li>

            <li class="active">Dashboard</li>
        </ol>
    </section>
    <!-- Main content -->

    <section class="content">
        <div class="first-card">
            <div class="row">

                <?php if (in_array('view1', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div">
                            <div class="icon-div">
                                <i class="far fa-money-check-alt"></i>
                            </div>
                            <div class="content-div">
                                <a href="withdraw.php"><p>Pending withdrawal </p>
                                    <h3 ><?= $pending_withdraw_requests ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>

                <?php if (in_array('view2', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div">
                            <div class="icon-div">
                                <i class="far fa-user"></i>
                            </div>
                            <div class="content-div">
                                <a href="list_user.php"><p>Total users</p>
                                    <h3 ><?= $total_users ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view3', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div second-color">
                            <div class="icon-div">
                                <i class="far fa-users"></i>
                            </div>
                            <div class="content-div">
                                <p>Today active users</p>
                                <h3 ><?= $today_active_users ?></h3>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view4', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div third-color">
                            <div class="icon-div">
                                <i class="far fa-user-plus"></i>
                            </div>
                            <div class="content-div">
                                <a href="list_user.php?page=1&user_search=&date1=<?php echo date('Y-m-d'); ?>&date2=<?php echo date('Y-m-d'); ?>"><p>Today user added</p>
                                    <h3 ><?= $today_users_added ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view5', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div four-color">
                            <div class="icon-div">
                                <i class="far fa-users"></i>
                            </div>
                            <div class="content-div">
                                <a href="list_user.php?page=1&user_search=&date1=<?php echo date('Y-m-01'); ?>&date2=<?php echo date('Y-m-t'); ?>"><p>This month user added</p>
                                    <h3 ><?= $this_month_user_added ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <?php if (in_array('view6', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div fivith-color">
                            <div class="icon-div">
                                <i class="far fa-chart-line"></i>
                            </div>
                            <div class="content-div">
                                <a href="game_money.php?export=today"><p>Today game Money</p>
                                    <h3 >Rs.<?php
                                        if ($today_game_volume['amount']) {
                                            echo $today_game_volume['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div>

                <?php } ?>


                <?php if (in_array('view7', $dashboard_privileges)) { ?>

                    <div class="col-md-3">
                        <div class="inner-div second-color">
                            <div class="icon-div">
                                <i class="fal fa-tachometer-alt-average"></i>
                            </div>
                            <div class="content-div">
                                <a href="game_money.php?export=this_month"><p>This month game Money</p>
                                    <h3 >Rs.<?php
                                        if ($this_month_game_volume['amount']) {
                                            echo $this_month_game_volume['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div>
                    </div>
                <?php } ?>
                <?php if (in_array('view8', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div fivith-color">
                            <div class="icon-div">
                                <i class="far fa-chart-line"></i>
                            </div>
                            <div class="content-div">
                                <a href="history.php?page=1&gameid=&user_search=&date1=<?php echo date('Y-m-d'); ?>&date2=<?php echo date('Y-m-d'); ?>&status=completed"><p>Today game play</p>
                                    <h3 ><?php
                                        if ($today_game_play > 0) {
                                            echo $today_game_play / 2;
                                        } else {
                                            echo "0";
                                        }
                                        ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view9', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div sixth-color">
                            <div class="icon-div">
                                <i class="far fa-running"></i>
                            </div>
                            <div class="content-div">
                                <a href="history.php?page=1&gameid=&user_search=&date1=<?php echo date('Y-m-d'); ?>&date2=<?php echo date('Y-m-d'); ?>&status=running"><p>Running game</p>
                                    <h3 ><?= $running_game ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>

                <!--                <div class="col-md-3">
                                <div class="inner-div ">
                                    <div class="icon-div">
                                       <i class="far fa-sack-dollar"></i>
                                    </div>
                                    <div class="content-div">
                                         <a href="game_volume.php"><p>Game Volume</p>
                                             <h3 >Rs.<?php
                if ($game_volume['amount']) {
                    echo $game_volume['amount'];
                } else {
                    echo "0";
                }
                ?>/-</h3></a>
                                    </div>
                                </div>inner-div
                            </div>-->
                <!--            <div class="col-md-3">
                                <div class="inner-div ">
                                    <div class="icon-div">
                                       <i class="far fa-sack-dollar"></i>
                                    </div>
                                    <div class="content-div">
                                         <a href="game_money.php"><p>Game Money</p>
                                             <h3 >Rs.<?php
                if ($game_money['amount']) {
                    echo $game_money['amount'];
                } else {
                    echo "0";
                }
                ?>/-</h3></a>
                                    </div>
                                </div>inner-div
                            </div>col-md-4-->
                <?php if (in_array('view12', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div seven-color">
                            <div class="icon-div">
                                <i class="far fa-sack-dollar"></i>
                            </div>
                            <div class="content-div">
                                <a><p>Today Transactions</p>
                                    <h3 >Rs.<?php
                                        if ($today_deposited_amount['amount']) {
                                            echo $today_deposited_amount['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view13', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div fivith-color">
                            <div class="icon-div">
                                <i class="far fa-money-check-alt"></i>
                            </div>
                            <div class="content-div">
                                <a><p>This month transactions</p>
                                    <h3 >Rs.<?php
                                        if ($this_month_deposited_amount['amount']) {
                                            echo $this_month_deposited_amount['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <!--col-md-4-->
                <?php if (in_array('view14', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div tenth-color">
                            <div class="icon-div">
                                <i class="far fa-money-bill-alt"></i>
                            </div>
                            <div class="content-div">
                                <a href="today_bonus.php?export=today"> <p>Today bonus given</p>
                                    <h3 >Rs.<?php
                                        if ($today_bonus['amount']) {
                                            echo $today_bonus['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view15', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div eight-color">
                            <div class="icon-div">
                                <i class="far fa-hands-usd"></i>
                            </div>
                            <div class="content-div">
                                <a href="this_month_bonus.php?export=this_month"><p>This month bonus given</p>
                                    <h3 >Rs.<?php
                                        if ($this_month_bonus['amount']) {
                                            echo $this_month_bonus['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <?php if (in_array('view16', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div fourth-color">
                            <div class="icon-div">
                                <i class="far fa-calendar"></i>
                            </div>
                            <div class="content-div">
                                <a href="referrals.php?referral_type=this_month"><p>This month referral  </p>
                                    <h3 ><?= $this_month_referral ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <?php if (in_array('view17', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div third-color">
                            <div class="icon-div">
                                <i class="far fa-handshake"></i>
                            </div>
                            <div class="content-div">
                                <a href="referrals.php"><p>Total referral </p>
                                    <h3 ><?= $total_referral ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <?php if (in_array('view18', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div third-color">
                            <div class="icon-div">
                                <i class="far fa-handshake"></i>
                            </div>
                            <div class="content-div">
                                <a href="referrals.php?referral_type=today"><p>Today referral </p>
                                    <h3 ><?= $today_referral ?></h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <?php if (in_array('view19', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div second-color">
                            <div class="icon-div">
                                <i class="far fa-coins"></i>
                            </div>
                            <div class="content-div">
                                <p>Today withdrawl count</p>
                                <h3 ><?= $today_withdrawn_count ?></h3>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <?php if (in_array('view20', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div eight-color">
                            <div class="icon-div">
                                <i class="far fa-money-bill-wave"></i>
                            </div>
                            <div class="content-div">
                                <p>Today withdrawl </p>
                                <h3 >Rs.<?php
                                    if ($today_withdrawn_amount['amount']) {
                                        echo $today_withdrawn_amount['amount'];
                                    } else {
                                        echo "0";
                                    }
                                    ?>/-</h3>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <?php if (in_array('view21', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div eleven-color">
                            <div class="icon-div">
                                <i class="far fa-usd-circle"></i>
                            </div>
                            <div class="content-div">
                                <p>This month withdrawal</p>
                                <h3 >Rs.<?php
                                    if ($this_month_withdrawl_amount['amount']) {
                                        echo $this_month_withdrawl_amount['amount'];
                                    } else {
                                        echo "0";
                                    }
                                    ?>/-</h3>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
                <?php if (in_array('view22', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div eight-color">
                            <div class="icon-div">
                                <i class="fal fa-money-bill-wave-alt"></i>
                            </div>
                            <div class="content-div">
                                <p>This month withdrawal count</p>
                                <h3 ><?= $this_month_withdrawl_count ?></h3>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>

                <?php if (in_array('view27', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div eight-color">
                            <div class="icon-div">
                                <i class="fal fa-money-bill-wave-alt"></i>
                            </div>
                            <div class="content-div">
                                <a href="transactions.php"><p>Total transactions</p></a>
                                <h3 > <?php
                                    if ($total_deposits['total']) {
                                        echo $total_deposits['total'];
                                    } else {
                                        echo "0";
                                    }
                                    ?></h3>
                            </div>
                        </div><!--inner-div-->
                    </div>


                <?php } ?>



                <!--col-md-4-->




                <!--col-md-4-->

                <!--col-md-4-->

                <!--col-md-4-->

                <!--col-md-4-->

            </div><!--row-->
        </div><!--first-card-->
    </section><!--content-->


    <section class="content">
        <div class="first-card">
            <div class="row">
                <?php if (in_array('view23', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div eight-color">
                            <div class="icon-div">
                                <i class="far fa-hand-holding-usd"></i>
                            </div>
                            <div class="content-div">
                                <a href="this_month_profit.php?type=profit&export=this_month"><p>This month profit</p>
                                    <h3 >Rs.<?php
                                        if ($this_monthprofit['amount']) {
                                            echo $this_monthprofit['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view24', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div seven-color">
                            <div class="icon-div">
                                <i class="far fa-badge-dollar"></i>
                            </div>
                            <div class="content-div">
                                <a href="today_profit.php?type=profit&export=today"><p>Today profit</p>
                                    <h3 >Rs.<?php
                                        if ($today_profit['amount']) {
                                            echo $today_profit['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view25', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div second-color">
                            <div class="icon-div">
                                <i class="far fa-coins"></i>
                            </div>
                            <div class="content-div">
                                <a href="this_month_earning.php?type=earning&export=this_month"><p>This month earning</p>
                                    <h3 >Rs.<?php
                                        if ($this_month_earning['amount']) {
                                            echo $this_month_earning['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div><!--col-md-4-->
                <?php } ?>
                <?php if (in_array('view26', $dashboard_privileges)) { ?>
                    <div class="col-md-3">
                        <div class="inner-div fivith-color">
                            <div class="icon-div">
                                <i class="far fa-lightbulb-dollar"></i>
                            </div>
                            <div class="content-div">
                                <a href="today_earning.php?type=earning&export=today"><p>Today earning </p>
                                    <h3>Rs.<?php
                                        if ($today_earning['amount']) {
                                            echo $today_earning['amount'];
                                        } else {
                                            echo "0";
                                        }
                                        ?>/-</h3></a>
                            </div>
                        </div><!--inner-div-->
                    </div>
                <?php } ?>
            </div><!--col-md-4-->



        </div></section<!--row-->
</div><!--first-card-->
<section><!--content-->

    <!-- /.content -->


</div>
<?php require_once 'footer.php'; ?>



</body>
</html>
