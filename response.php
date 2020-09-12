<?php
    // Change the SECRET KEY - sandbox or live.
    // This KEY is a PRIVATE key. Never show in the front end
    $API_KEY = "CHANGE_THIS";
    $API_SECRET = "CHANGE_THIS";

    if (isset($_REQUEST['order_id']) && isset($_REQUEST['payment_id'])){
			
        $order_id = $_REQUEST['order_id']; // Your order nummber
        $payment_id = $_REQUEST['payment_id']; // Reference number
        $amount = $_REQUEST['amount'];
        $currency = $_REQUEST['currency'];
        $status_code = $_REQUEST['status_code'];
        $slip_image = $_REQUEST['slip_image'];
        $md5sig = $_REQUEST['md5sig'];

        // Other parameters - Feel free to use as required
        // This is an additional reference you can use to view the slip
        $slip_id = $_REQUEST['slip_id']; 
        // Depositor name
        $slip_name = $_REQUEST['slip_name'];
        // Depositor reference number from slip
        $slip_ref = $_REQUEST['slip_ref'];
        // Slip image full URL - We prefer you wont store this in the database. but generate the slip view URL from the slip_id like below
        // https://bank.deposits.lk/slip/view/API_KEY/slip_id
        $slip_image = $_REQUEST['slip_image'];
        // Depositor bank name
        $slip_bank = $_REQUEST['slip_bank'];
        // Depositor transfer type - Deposit/Transfer
        $slip_type = $_REQUEST['slip_type'];
        // Merchant/Your bank name
        $merchant_bank = $_REQUEST['merchant_bank'];
        // Merchant/Your bank account
        $merchant_account = $_REQUEST['merchant_account'];

        if ($order_id == "" || $payment_id == "" || $amount == "" || $currency == "" || $slip_image == "" || $md5sig == ""){
            // Failed due to empty fields
        }

        $md5hash = strtoupper(md5($payment_id.$order_id.$amount.$status_code.$currency.strtoupper(md5($API_SECRET))));

        if ($md5sig === $md5hash){
            if ($status_code == "2"){
                // Completed!
                // Pending Approval Stage
                echo "<h3>Yay! Slip is uploaded</h3>";
            } else{
                // Failed from deposits.lk

            }
        } else{
            // Failed due to hash mismatch
        }
    } else{
        // Failed due to missing fields - check API SECRET

    }
?>
<!doctype html>
<html>
<head>
</head>
<body>
    <div  style="text-align:center">
        <h3>Deposits.lk Sample Integration - Response</h3>
        <code>
        <?php
            print_r($_REQUEST);
        ?>
        </code>

        <br>
        <div>
            <p>Deposits Powered by</p>
            <img src="https://bank.deposits.lk/assets/deposits-logo.png" class="mx-auto" style="height:50px">
        </div>
    </div>
</body>
</html>