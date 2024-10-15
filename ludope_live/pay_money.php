<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@3.3.7/dist/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

<?php
include('./api/config.php');
include_once('./easebuzz-lib/easebuzz_payment_gateway.php');
if (isset($_POST['submit'])) {

    $userid = 1;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $amount = $_POST['amount'];

    $status = 'In Process';
    $trnstype = 'desposit';
    $newcoins = $amount;
    $datetime = date('Y-m-d H:i:s');
    $gateway = 'easebuzz';

    $MERCHANT_KEY = "792H2W69M0";
    $SALT = "ISGVH9YOFW";
    $ENV = "prod";   // set enviroment name

    $easebuzzObj = new Easebuzz($MERCHANT_KEY, $SALT, $ENV);
    $taxid = 'test' . rand(100, 10000);
    $postData = array(
        "txnid" => $taxid,
        "amount" => $amount . '.0',
        "firstname" => $name,
        "email" => $email,
        "phone" => $phone,
        "productinfo" => "For test",
        "surl" => "https://demo.colormoon.in/ludope/api/successs.php",
        "furl" => "https://demo.colormoon.in/ludope/api/failed.php",
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
        "zipcode" => "123123"
    );
    $sqlr = "INSERT INTO `payment` (`uid`, `orderid`, `trnsid`, `status`, `trnstype`, `amount`, `getway`,`datetime`) VALUES ('" . $userid . "','" . $taxid . "','" . $taxid . "', '" . $status . "','" . $trnstype . "','" . $newcoins . "','" . $getaway . "','" . $datetime . "')";
    mysqli_query($conn, $sqlr);
    $data = $easebuzzObj->initiatePaymentAPI($postData);
}
?>



<div class="container" style="left:30%"><br>
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
</div>