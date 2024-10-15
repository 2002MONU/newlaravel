<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
include('config.php');
include_once('../easebuzz-lib/easebuzz_payment_gateway.php');

$userid = $_GET['userid'];
$amount = $_GET['amount'];
$contact = $_GET['contact'];
$email = $_GET['email'];
$name = $_GET['name'];
$gateway = $_GET['gateway'];

//$userid = 91;
//$name = 'Sai satish';
//$email = 'saisatish.dev@colourmoon.com';
//$contact = '9948899374';
//$amount = 10;
//$gateway = 'easebuzz';

$status = 'pending';
$trnstype = 'deposit';
$newcoins = $amount;
$datetime = date('Y-m-d H:i:s');

//$MERCHANT_KEY = "10PBP71ABZ2";
//$SALT = "ABC55E8IBW";
//$ENV = "test";
$sqlnew = mysqli_query($conn, "SELECT coins_gst_percentage FROM `constants` WHERE id = 1");
$k = mysqli_fetch_assoc($sqlnew);

$gst_percentage = $k['coins_gst_percentage'];

$MERCHANT_KEY = "792H2W69M0";
$SALT = "ISGVH9YOFW";
$ENV = "prod";   // set enviroment name
//gst calculation
$gst = round($amount * $gst_percentage / 100, 2);
$total = $amount;
$gst_added = $gst_percentage;
$bonus_amount = $gst;

$easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);
$taxid = 'LUDOPE' . rand(1000, 100000);
$postData = array(
    "txnid" => $taxid,
    "amount" => $total . '.0',
    "firstname" => $name,
    "email" => $email,
    "phone" => $contact,
    "productinfo" => "For test",
    "surl" => "https://ludope.com/api/success.php",
    "furl" => "https://ludope.com/api/failed.php",
    "udf1" => "aaaa",
    "udf2" => "aaaa",
    "udf3" => "aaaa",
    "udf4" => "aaaa",
    "udf5" => "aaaa",
    "address1" => "aaaa",
    "address2" => "aaaa",
    "city" => "aaaa",
    "state" => "aaaa",
    "country" => "aaaa",
    "zipcode" => "530016"
);

$sqlr = "INSERT INTO `payment` (`uid`, `orderid`, `trnsid`, `status`, `trnstype`, `amount`,`gst`,`bonus`,`getway`,`datetime`) VALUES ('" . $userid . "','" . $taxid . "','" . $taxid . "', '" . $status . "','" . $trnstype . "','" . $newcoins . "','" . $gst_added . "','" . $bonus_amount . "','" . $getaway . "','" . $datetime . "')";
mysqli_query($conn, $sqlr);
$data = $easebuzzObj->initiatePaymentAPI($postData);
?>



<!--<div class="container" style="left:30%"><br>
    <div class="row">
        <div class="col-md-6">
            <h4>Payment here</h4>
            <form action="" method="post">
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" class="form-control" name="name" placeholder="User Name" required>
                </div>
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" class="form-control" name="email" placeholder="Email" required>
                </div>

                <div class="form-group">
                    <label>Phone</label>
                    <input type="text" class="form-control" name="phone" placeholder="Phone" required>
                </div>
                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" class="form-control" name="amount" placeholder="Amount" required>
                </div>
                <input type="submit" name="submit" class="btn btn-black" value="Submit">
            </form>
        </div>
    </div>
</div>-->