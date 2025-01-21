
<?php
// Start the session before any output
session_start();

// Include necessary files
include('../includes/conncet.php'); 

if (isset($_GET['order_id'])) {
    $order_id = mysqli_real_escape_string($conn, $_GET['order_id']);
    
    $select_data = "SELECT * FROM `user_orders` WHERE order_id='$order_id'";
    $result = mysqli_query($conn, $select_data);
    $row_fetch = mysqli_fetch_assoc($result);
    
    $invoice_number = $row_fetch['invoice_number'];
    $amount_due = $row_fetch['amount_due'];
}

if (isset($_POST['confirm_payment'])) {
    $invoice_number = mysqli_real_escape_string($conn, $_POST['invoice_number']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $payment_mode = mysqli_real_escape_string($conn, $_POST['payment_mode']);

    if (!empty($invoice_number) && !empty($amount) && !empty($payment_mode)) {
        // Insert payment information
        $insert_query = "INSERT INTO `user_payments` (`order_id`, `invoice_number`, `amount`, `payment_mode`) 
                         VALUES ('$order_id', '$invoice_number', '$amount', '$payment_mode')";
        $result = mysqli_query($conn, $insert_query);
        
        if ($result) {
            echo "<h3 class='text-center text-light'> Payment Successful</h3>";
            echo "<script>window.open('profile.php?my_orders', '_self')</script>";
        } else {
            echo "<h3 class='text-center text-light'> Payment Failed. Please try again.</h3>";
        }
    } else {
        echo "<h3 class='text-center text-light'> All fields are required. Please try again.</h3>";
    }
 $update_orders=" UPDATE `user_orders` SET `order_status`='Complete'
  WHERE `order_id`='$order_id'";
  $result_orders = mysqli_query($conn, $update_orders);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment page</title>
    <!-- CSS Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css"
          integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" 
          crossorigin="anonymous">
</head>
<body class="bg-secondary">
    <div class="container d-flex justify-content-center mt-5" style="min-height: 100vh;">
        <div class="text-center">
            <h1 class="text-light">Confirm Payment</h1>
            <form action="" method="post">
                <div class="form-outline my-4">
                    <input type="text" class="form-control" name="invoice_number" value="<?php echo $invoice_number ?>" readonly>
                </div>
                <div class="form-outline my-4">
                    <label for="" class="text-light">Amount</label>
                    <input type="text" class="form-control" name="amount" value="<?php echo $amount_due ?>" readonly>
                </div>
                <div class="form-outline my-4">
                    <select name="payment_mode" class="form-select w-60 m-auto">
                        <option value="" disabled selected>Select payment mode</option>
                        <option value="fonepay">Fonepay</option>
                        <option value="Net Banking">Net Banking</option>
                        <option value="paypal">PayPal</option>
                        <option value="COD">Cash on Delivery</option>
                        <option value="Payoffline">Pay Offline</option>
                    </select>
                </div>
                <div class="form-outline my-4">
                    <input type="submit" class="bg-info py-2 px-3 border-0" value="Confirm" name="confirm_payment">
                </div>
            </form>
        </div>
    </div>
</body>
</html>
