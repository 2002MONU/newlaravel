<?php 
include('config.php'); 


$user_id = $_POST['userid'];
$game_id = $_POST['game_id'];
$validate_board = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM join_game WHERE userid='".$user_id."' and game_id='".$game_id."'"));

if($validate_board>0)
{
    $del = mysqli_query($conn,"DELETE FROM `join_game` WHERE userid='".$user_id."' and game_id='".$game_id."'");
    if($del)
    {
            $arr = array(
                'success' =>1,
                'message'=>"User Deleted Successfully",
                'data'=>TRUE
            );
            echo json_encode($arr);
    }
     
}
else
{
     $arr = array(
            'success' =>0,
            'message'=>"Invalid Details",
            //'response'=>[],
            'data'=>FALSE
        );
     echo json_encode($arr);
}

?>
