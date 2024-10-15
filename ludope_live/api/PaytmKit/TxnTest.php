<?php
header("Pragma: no-cache");
header("Cache-Control: no-cache");
header("Expires: 0");
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
    <head>
        <title>Merchant Check Out Page</title>
        <meta name="GENERATOR" content="Evrsoft First Page">
    </head>
    <body >
        <form method="post" id="paytm_form" action="PaytmKit/pgRedirect.php">
            <input type="hidden" id="ORDER_ID" tabindex="1" maxlength="20" size="20" name="ORDER_ID" autocomplete="off" value="<?php echo $orderid ?>">
            <input type="hidden" id="CUST_ID" tabindex="2" maxlength="12" size="12" name="CUST_ID" autocomplete="off" value="<?= $userid ?>">
            <input type="hidden" id="INDUSTRY_TYPE_ID" tabindex="4" maxlength="12" size="12" name="INDUSTRY_TYPE_ID" autocomplete="off" value="Retail">
            <input type="hidden" id="CHANNEL_ID" tabindex="4" maxlength="12" size="12" name="CHANNEL_ID" autocomplete="off" value="WEB">
            <input type="hidden" title="TXN_AMOUNT" tabindex="10" type="text" name="TXN_AMOUNT" value="<?= $amountn ?>">
            <input type="hidden" value="CheckOut" type="submit" >
        </form>
        <script type="text/javascript">
            window.onload = function () {
                document.forms['paytm_form'].submit();
            }
        </script>
    </body>
</html>