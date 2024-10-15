<?php
require_once 'config.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');
$title="payout_report";
header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$title . '.csv');
$output = fopen("php://output", "w");
fputcsv($output, array("Sl No.", "User", "Order Id", "Amount", "Request Date", "Withdrawal Into","Bank Details","Status"));
                                        $i = 1;
                                        $touserinfo = mysqli_query($conn, "select * from payment where trnstype='withdrawal' and status='In Process' order by pid DESC");
                                        while ($user = mysqli_fetch_assoc($touserinfo)) {
                                            $userid = $user['uid'];
                                            $pid = $user['pid'];
                                            $uinfo = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");
                                            $userinfo = mysqli_fetch_assoc($uinfo);
                                            $bankinfo = mysqli_query($conn, "SELECT * FROM kyc WHERE user_id='" . $userid . "'");
                                            $binfo = mysqli_fetch_assoc($bankinfo);
                                                 $date = $user['datetime'];
        $timestamp = strtotime($date);
                                                     $slot_key = date("d M Y h:i:s A", $timestamp);
                                                     if($user['getway']=='bank'){$bankdetails= $binfo['name']."\r\n".$binfo['bankname']."\r\n".$binfo['account']."\r\n".$binfo['ifsc']."\r\n".$binfo['panno'];}else{$bankdetails=$binfo['upi_name']."\r\n".$binfo['upi_id'];} 
                                         $row["Sl No."] = $i++;
                                $row["User"] = $userinfo['name'].'-'.$userinfo['mobile'];
                                $row["Order Id"] = $user['orderid'];
                                $row["Amount"] = $user['amount'];
                                $row["Request Date"] = $slot_key;
                                $row["Withdrawal Into"] = $user['getway'];
                                $row["Bank Details"] = $bankdetails;
                                $row["Status"] = $user['status'];
                                fputcsv($output, $row);}
                                fclose($output);?>
                                    