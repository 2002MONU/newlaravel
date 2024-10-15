<?php 
header('Access-Control-Allow-Origin: *');
include('../config.php');
$format = 'json';
$con = [];
$mode = $cofingmode;

    $appId = $appId;
    $orderId = $_GET['orderid'];
    $orderAmount = $_GET['amount'];
    $orderCurrency = 'INR';
    $customerName = $_GET['name'];
    $userid = $_GET['userid'];
    $customerPhone = $_GET['contact'];
    $customerEmail = $_GET['email'];

    $con['merchantId'] = "M1Z7JZIHXZOE";
    $con['redirectMode']="POST";
    $con['merchantTransactionId'] = $orderId;
    $con['merchantUserId'] = $userid;
    $con['amount'] = $orderAmount * 100;
    $con['redirectUrl'] = "https://colormoon.in/sklite/api/phonepay-request.php";
    $con['callbackUrl'] = "https://colormoon.in/sklite/api/";
    $con['mobileNumber'] = $customerPhone;
    $con['paymentInstrument']['type'] = "PAY_PAGE";

    $encode = json_encode($con);
    $encoded = base64_encode($encode);
    $salt_key = "1135d6a2-bf9a-4eee-8145-5f903eeef515";
    $salt_index = "1";
    $api_end_point="/pg/v1/pay";
    $string = $encoded . $api_end_point . $salt_key;
    $sha256 = hash("sha256", $string);
    $final_x_header = $sha256 . '###' . $salt_index;
    
    $request_arr = [];
    $request_arr['request'] = $encoded;
    $request = json_encode($request_arr);
// print_r($con['merchantUserId']);
// die();
    
     $curl = curl_init();

                curl_setopt_array($curl, [
                    CURLOPT_URL => "https://api.phonepe.com/apis/hermes/pg/v1/pay",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 30,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => $request,
                    CURLOPT_HTTPHEADER => [
                        "Content-Type: application/json",
                        "X-VERIFY: " . $final_x_header,
                        "accept: application/json"
                    ],
                ]);

                $response = curl_exec($curl);
                $err = curl_error($curl);

                curl_close($curl);

                if ($err) {
                    echo "Error #:" . $err;
                } else {
                    $res = json_decode($response);
                    //print_r($res);die();
                    if ($res->code == 'PAYMENT_INITIATED') {
                        $add_url='&isChromeWV=true';
                        $pay_url=$res->data->instrumentResponse->redirectInfo->url.$add_url;
                        // $posts[] = array('status'=>'Valid','message'=>'Pay Online Order Initiated','url'=>$pay_url);

 header('location:' . $pay_url);
                    } else {
                        
                    }
                }
// if($format == 'json') {
//     header('Content-type: application/json');
//     echo json_encode(array('response'=>$posts));
//   }
?>