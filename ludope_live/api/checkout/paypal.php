<form class="paypal" action="payments.php" method="post" id="paypal_form">
    <input type="hidden" name="cmd" value="_xclick" />
    <input type="hidden" name="no_note" value="1" />
    <input type="hidden" name="lc" value="UK" />
    <input type="hidden" name="bn" value="PP-BuyNowBF:btn_buynow_LG.gif:NonHostedGuest" />
    <input type="hidden" name="first_name" value="<?php echo $_GET['name']; ?>" />
    <input type="hidden" name="last_name" value="<?php echo $_GET['name']; ?>" />
    <input type="hidden" name="amount" value="<?php echo $data['orderamount'] ?>" />
    <input type="hidden" name="payer_email" value="<?php echo $data['emailid'] ?>" />
    <input type="hidden" name="orderid" value="<?php echo $data['horderid'] ?>" />
    <input type="hidden" name="item_number" value="2" />
    <input type="hidden" name="userid" value="<?php echo $data['userid'] ?>" />
    <input type="hidden" value="<?php echo $data['horderid'] ?>" name="custom"  />
    <input type="submit" class="razorpay-payment-button" value="Pay with Paypal" border="0" name="submit">
</form>
