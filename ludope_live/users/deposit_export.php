<?php
require_once 'config.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');
if($_GET['export']=='today'){$title="today_deposit_report";}else{$title="this_month_deposit_report";}
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$title . '.csv');
$output = fopen("php://output", "w");
fputcsv($output, array("Sl No.", "User Name", "User Mobile", "Amount","Type", "Date"));
$i=1;
                                            if($_GET['export']=='today'){
                                                $sqlnew = mysqli_query($conn, "SELECT * FROM bonus WHERE (bonus_type = 'Deposit Transfer' || bonus_type='Payment Deposit') AND (date BETWEEN '$today_start' AND '$today_end')");
                                            }else{
$sqlnew = mysqli_query($conn, "SELECT * FROM bonus WHERE (bonus_type = 'Deposit Transfer' || bonus_type='Payment Deposit') AND (date BETWEEN '$month_start' AND '$month_end')");
                                            }while ($user = mysqli_fetch_assoc($sqlnew)) {
                                   $det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['user_id'] . "'"));
                                   $slot_key = date("d M Y h:i:s A", strtotime($user['date'])); 
                                   $row["Sl No."] = $i++;
                                $row["User Name"] = $det['name'];
                                $row["User Mobile"] = $det['mobile'];
                                $row["Amount"] = $user['bonus'];
                                $row["Type"] = $user['bonus_type'];
                                $row["Date"] = $slot_key;
                                fputcsv($output, $row);}
                                fclose($output); ?>