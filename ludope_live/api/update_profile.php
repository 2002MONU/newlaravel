<?php

include('config.php');

$userid = $_REQUEST['uid'];
$name = $_REQUEST['name'];
$email = $_REQUEST['email'];
$mobile = $_REQUEST['mobile'];

$sql = mysqli_query($conn, "SELECT * FROM users WHERE id='" . $userid . "'");

$games_won = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $userid . "' AND losewin = 'winner' ");
$games_lost = mysqli_query($conn, "SELECT COALESCE(COUNT(id),0) as total from gamebet where userid = '" . $userid . "' AND losewin is NULL AND status = 'completed' ");
$total_games_won = mysqli_fetch_assoc($games_won)['total'];
$total_games_lost = mysqli_fetch_assoc($games_lost)['total'];

$two_player = mysqli_query($conn, "select * from gamebet where userid='" . $userid . "' AND tabletype= '12' AND losewin= 'winner' ORDER BY id DESC");
$two_won = mysqli_num_rows($two_player);

$four_player = mysqli_query($conn, "select * from gamebet where userid='" . $userid . "' AND tabletype= '14' AND losewin= 'winner' ORDER BY id DESC");
$four_won = mysqli_num_rows($four_player);

$count = mysqli_num_rows($sql);
if ($count > 0) {


    $insertquery = mysqli_query($conn, "update users set mobile='$mobile', name='$name', email='$email' WHERE id='" . $userid . "'");
    $insertquery;

    $rows['success'] = 1;
    $rows['message'] = "Profile has been changed successfully.";
//    $rows['data'] = ['total_games_won' => !empty($total_games_won) ? $total_games_won : (string) 0,
//        'total_games_lost' => !empty($total_games_lost) ? $total_games_lost : (string) 0,
//        'total_two_player_wins' => !empty($two_won) ? $two_won : (string) 0,
//        'total_four_player_wins' => !empty($four_won) ? $four_won : (string) 0];
} else {

    $rows['success'] = 0;
    $rows['message'] = "Something went wrong please try again later.";
    //$rows['data'] = [];
}

echo (json_encode($rows));
?>
