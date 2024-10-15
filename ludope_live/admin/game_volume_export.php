<?php
require_once 'config.php';
$month_start = date('Y-m-01 00:00:01');
$month_end = date('Y-m-t 23:59:59');
$today_start = date('Y-m-d 00:00:01');
$today_end = date('Y-m-d 23:59:59');
?><?php
                                $title="game_volume_report";
                                header('Content-Type: text/csv; charset=utf-8');
header('Content-Disposition: attachment; filename='.$title . '.csv');
$output = fopen("php://output", "w");

fputcsv($output, array("Sl No.", "User Name", "User Mobile", "Amount"));

                                         
                                            $sqlnew = mysqli_query($conn, "SELECT * FROM users WHERE coins>0 and id>1");
                                            while ($user = mysqli_fetch_assoc($sqlnew)) {
                                $row["Sl No."] = ++$i;
                                $row["User Name"] = $user['name'];
                                $row["User Mobile"] = $user['mobile'];
                                $row["Amount"] = $user['coins'];
                                 fputcsv($output, $row);}
                                fclose($output);?>