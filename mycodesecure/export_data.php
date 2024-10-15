<?php

include ('connect.php');
$title ="userdata";
header('Content-Type:text/csv; charset=utf-8');
header('Content-Disposition:attachment;filename=' . $title . '.csv');
$output = fopen("php://output","w");
fputcsv($output, array("S.No","Name","Gmail","Phone No","Address"));

//$where =  $user_search = '';

// if ($_REQUEST['search'] != '') {
//      $user_search = $_REQUEST['search'];
//      $where .= " and (userdata.name like '%$user_search%' ";

//  $sqlnew = mysqli_query($connect, "SELECT * FROM userdata WHERE  $where ORDER BY id DESC");
$qry = "SELECT * FROM userdata  ";
$i = 1;
$msql = mysqli_query($connect, $qry);
 
 while($result = mysqli_fetch_assoc($msql)){
      $row["S.No"] = $i++;
      $row["Name"] = $result['name'];
      $row["Gmail"] = $result['gmail'];
      $row["Phone No"] = $result['phone'];
      $row["Address"] = $result['address'];
      fputcsv($output, $row);
     }

     fclose($output);

     
?>      