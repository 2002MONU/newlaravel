<?php
require_once 'config.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');
if($_GET['export']=='today'){$title="today_bonus_report";}else{$title="this_month_bonus_report";}
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$title . '.csv');
$output = fopen("php://output", "w");
fputcsv($output, array("Sl No.", "User Name", "User Mobile", "Bonus Type", "Amount", "Date"));
                                        $i = 0;
                                            if($_GET['export']=='today'){
                                                $sqlnew = mysqli_query($conn, "SELECT * FROM bonus WHERE (date BETWEEN '$today_start' AND '$today_end') and (bonus_type='Signup' || bonus_type='Bonus Transfer' || bonus_type='Referred' || bonus_type='Referral')");
                                            }else{
$sqlnew = mysqli_query($conn, "SELECT * FROM bonus WHERE (date BETWEEN '$month_start' AND '$month_end') and (bonus_type='Signup' || bonus_type='Bonus Transfer' || bonus_type='Referred' || bonus_type='Referral')");
                                            }while ($user = mysqli_fetch_assoc($sqlnew)) {
                                   $det = mysqli_fetch_array(mysqli_query($conn, "SELECT * FROM users WHERE id='" . $user['user_id'] . "' and otp_verified='verified'"));
                                    $slot_key = date("d M Y h:i:s A", strtotime($user['date']));
                                   if($det['id']>0){ $row["Sl No."] = $i++;
                                $row["User Name"] = $det['name'];
                                $row["User Mobile"] = $det['mobile'];
                                $row["Bonus Type"] = $user['bonus_type'];
                                $row["Amount"] = $user['bonus'];
                                $row["Date"] = $slot_key;
                                   fputcsv($output, $row);}}
                                fclose($output);?>
