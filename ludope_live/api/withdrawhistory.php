<?php
include('config.php');

$user_id = $_REQUEST['user_id'];
		
	$sql=mysqli_query($conn, "SELECT amount,datetime,status FROM payment WHERE trnstype = 'withdrawal' and uid='".$user_id."' order by pid DESC");
	 
	$count = mysqli_num_rows($sql);
	    if($count > 0){ 
   $rows['success'] = 1;
				$rows['message'] = "WIthdraw History";
                                $i=0;
		while($row = mysqli_fetch_assoc($sql)){ 
				  			
                                $rows['data'][$i] = $row;
                                $i++;
                }
		
		
		}else {
				$rows['success'] = 0;
				$rows['message'] = "No Data ";
			}
		
	echo (json_encode($rows));
?>