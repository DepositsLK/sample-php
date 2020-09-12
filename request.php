<?php
    // Change the API KEY - sandbox or live.
    // This KEY is a public key
    $API_KEY = "CHANGE_THIS";
?>

<!doctype html>
<html>
<head>
<style>
    .form-control{
        display: block;
        margin: 0 auto;
        font-size: 15px;
        width: 50%;
        margin-bottom: 10px;
    }
</style>
</head>
<body>
    <div  style="text-align:center">
        <h3>Deposits.lk Sample Integration - Request</h3>
        <!-- 
            SANDBOX: https://dev.deposits.lk/deposit/checkout
            PRODUCTION: https://bank.deposits.lk/deposit/checkout
        -->
        <form method="POST" action="https://bank.deposits.lk/deposit/checkout">
            <!-- Can be hidden or not -->
            <input type="text" class="form-control" id="first_name" name="first_name" value="Chamath">
          
            <input type="text" class="form-control" id="last_name" name="last_name" value="Pali">
            
            <input type="text" class="form-control" id="email" name="email" value="queries@deposits.lk">
            <input type="text" class="form-control" id="order_id" name="order_id" value="123456">
           
            <input type="text" class="form-control" id="order_desc" name="order_desc" value="New iPhone">
           
            <input type="text" class="form-control" id="amount" name="amount" value="1000">
           
            <input type="text" class="form-control" id="currency" name="currency" value="LKR">
           
            <!-- Must be hidden fields -->
            <input type="text" class="form-control" id="platform" name="platform" value="php">

            <input type="text" class="form-control" id="api_key" name="api_key"
            value="<?php echo $API_KEY?>">

            <input type="text" class="form-control" id="return_url" name="return_url" 
            value="https://demo.deposits.lk">

            <input type="text" class="form-control" id="cancel_url" name="cancel_url" 
            value="https://demo.deposits.lk">

            <!-- This URL will be callbacked with a POST request -->
            <input type="text" class="form-control" id="notify_url" name="notify_url" 
            value="http://localhost:8080/php/response.php">

            <button type="submit" class="form-control">Checkout</button>

        </form>
        <br>
        <div>
            <p>Deposits Powered by</p>
            <img src="https://bank.deposits.lk/assets/deposits-logo.png" class="mx-auto" style="height:50px">
        </div>
    </div>
</body>
</html>