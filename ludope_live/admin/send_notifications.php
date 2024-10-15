<?php

require_once 'config.php';
if (!empty($_POST)) {
    $user_id = $_POST['user_id'];
    $title = $_POST['title'];
    $message = $_POST['description'];
    $created_at = date('Y-m-d H:i:s');
    $ins_query = "INSERT INTO `push_notifications`(`id`, `user_id`, `title`, `description`, `created_at`) VALUES(NULL,'$user_id','$title','$message','$created_at')";
    mysqli_query($conn, $ins_query);
    $query = "SELECT * FROM users WHERE status = 1";
    if ($user_id != 0) {
        $query .= " AND id = $user_id";
    }
    $query .= " AND token IS NOT NULL";
    $result = mysqli_query($conn, $query);

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

            $php_android_arr = json_decode($android_response_json);

            $android_response->multicast_id .= $php_android_arr->multicast_id . ",";
            $android_response->success += $php_android_arr->success;
            $android_response->failure += $php_android_arr->failure;
        }
    }

    $response = [
        "android_response" => json_encode($android_response)
    ];print_r($android_response_json);die;
    header("Location: " . $base_url . "push_notifications.php?success=sent");
    die();
} else {
    header("Location: " . $base_url . "push_notifications.php");
    die();
}