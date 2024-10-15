<?php
require_once 'config.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');
?><?php
                                if($_GET['export']=='today'){$title="today_game_money_report";}
         elseif($_GET['export']=='this_month'){$title="this_month_game_money_report";}
         else{$title="game_money_report";}
                                header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$title . '.csv');
$output = fopen("php://output", "w");

fputcsv($output, array("Sl No.", "User Name", "User Mobile", "Amount", "IpAddress", "Date"));

                           if($_GET['export']=='today'){
                                                $sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE amount>0 AND (gtime BETWEEN '$today_start' AND '$today_end')");
                                            }else if($_GET['export']=='this_month'){
$sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE amount>0 AND (gtime BETWEEN '$month_start' AND '$month_end')");
                                            } else{                
                                            $sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE amount>0");}
                                            while ($user = mysqli_fetch_assoc($sqlnew)) {
                                   $det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['userid'] . "'"));
                                $row["Sl No."] = ++$i;
                                $row["User Name"] = $det['name'];
                                $row["User Mobile"] = $det['mobile'];
                                $row["Amount"] = $user['amount'];
                                $row["IpAddress"] = $user['ipaddress'];
                                $row["Date"] = date("d M Y h:i:s A", strtotime($user['gtime']));
                                fputcsv($output, $row);}
                                fclose($output);?>