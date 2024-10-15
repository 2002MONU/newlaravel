<?php
require_once 'config.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');
if($_GET['export']=='today'){$title="today_";}else{$title="this_month_";}
if($_GET['type']=='profit'){$title.="profit_report";}else{$title.="earning_report";}
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$title . '.csv');
$output = fopen("php://output", "w");
if($_GET['type']=='earning'){
fputcsv($output, array("Sl No.", "User Name", "User Mobile", "Winning Amount", "IpAddress", "Date"));
}
if($_GET['type']=='profit'){
fputcsv($output, array("Sl No.", "User Name", "User Mobile", "Commission Amount", "IpAddress", "Date"));
}
$i=1;
if($_GET['export']=='today'){
                                                $sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE status = 'completed' AND (gtime BETWEEN '$today_start' AND '$today_end') and wng_amount>0");
                                            }else{
$sqlnew = mysqli_query($conn, "SELECT * FROM gamebet WHERE status = 'completed' AND (gtime BETWEEN '$month_start' AND '$month_end') and wng_amount>0");
                                            }while ($user = mysqli_fetch_assoc($sqlnew)) {
                                   $det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['userid'] . "'"));
                                    $slot_key = date("d M Y h:i:s A", strtotime($user['gtime'])); 
                                    $row["Sl No."] = $i++;
                                $row["User Name"] = $det['name'];
                                $row["User Mobile"] = $det['mobile'];
                                if($_GET['type']=='earning'){
                                $row["Winning Amount"] = $user['wng_amount'];}
                                if($_GET['type']=='profit'){
                                $row["Commission Amount"] = $user['commission_amount'];
                                }
                                $row["IpAddress"] = $user['ipaddress'];
                                $row["Date"] = $slot_key;
                                fputcsv($output, $row);}
                                fclose($output); ?>
