<?php

include('config.php');
$userid = $_POST['userid'];
$bet_amount = $_POST['bet_amount'];
$notify = $_POST['notify'];

if (!empty($userid) && !empty($bet_amount) && !empty($notify)) {
    $date = date('Y-m-d'); 
    $sql = mysqli_query($conn, "SELECT * FROM join_game WHERE userid='" . $userid . "' and status = '0' and date='".$date."' and bet_amount='".$bet_amount."' ");
    $count = mysqli_num_rows($sql);
    if ($count == 0) {
    $sqlr = "INSERT INTO `join_game` (`userid`, `bet_amount`, `notify`,`status`,`date`) VALUES ('" . $userid . "', '" . $bet_amount . "','" . $notify . "','0','".$date."')";
$result = mysqli_query($conn, $sqlr);
    }
    mysqli_query($conn, "UPDATE `users` set game_notify='".$notify."' where id='".$userid."'");
    
$query = "SELECT * FROM users WHERE status = 1 and game_notify='yes'";
    if ($user_id != 0) {
        $query .= " AND id != $userid";
    }
    $query .= " AND fcm_token IS NOT NULL";
    $result = mysqli_query($conn, $query);
    $title="Topup Ludo";
$message="A Player is Waiting at Rs.". $bet_amount ."/- for playing";
    $android_devices = [];
    $ios_devices = [];
    while ($user = mysqli_fetch_assoc($result)) {
        $android_devices[] = $user['fcm_token'];
    }
    $android_response = [];
    $ios_response = [];
    
    $firebase_push_notification_token = 'AAAAFfiZ6J0:APA91bHjGJJ5J9eThE8yaAoua-afPqgdf_q48Lq8nzPnKNhakLvqAoUyHgxTYz2SDWsC7URO3D8gUJitR6ldxeSWfColD-wQM5JzM8f_YNsqAs2ncfXjh3ntmK3A184FW15OqNa4RF8U';
    $headers = array
        (
        'Authorization: key=' . $firebase_push_notification_token,
        'Content-Type: application/json'
    );
    $chunk_value = 999;

    if ($android_devices) {
        $android_group_arr = [];
        $android_response = (object) [
                    "multicast_id" => "",
                    "success" => 0,
                    "failure" => 0,
                    "canonical_ids" => 0,
                    "results" => [],
        ];

        $android_group_arr = array_chunk($android_devices, $chunk_value);
        for ($i = 0, $l = count($android_group_arr); $i < $l; $i++) {
            $notification_data = [
                "title" => $title,
                "body" => $message,
                'image' => $image,
                'style' => "picture",
                'picture' => $image,
                "priority" => "high",
                'vibrate' => 1,
                'sound' => 'notification',
            ];
            $payload = [];
            if (!empty($type)) {
                $payload['intent_type'] = $type;
            }
            if (!empty($order_id)) {
                $payload['order_id'] = $order_id;
            }
            if (!empty($payload)) {
                $notification_data['payload'] = $payload;
            }
            $data_for_android = array(
                'registration_ids' => $android_group_arr[$i],
                "notification" => $notification_data,
            );
            $data_string = json_encode($data_for_android);

            $ch = curl_init();
            curl_setopt($ch, CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send');
            curl_setopt($ch, CURLOPT_POST, true);
            curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_POSTFIELDS, $data_string);
            $android_response_json = curl_exec($ch);
            curl_close($ch);
            
    }
    }
    
    $rows['success'] = 1;
            $rows['message'] = "Request Set successfully";
            
        
    
} else {
    $rows['success'] = 0;
    $rows['message'] = "Some error occurred. Please try again. ";
}

echo (json_encode($rows));
