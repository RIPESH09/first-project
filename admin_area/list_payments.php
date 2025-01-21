

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <!-- Include Font Awesome for the trash icon -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>

<div class="container">
    <h3 class="text-center text-success">All Payments</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Sl No</th>
                <th>Invoice Number</th>
                <th>Amount</th>
                <th>Payment Mode</th>
                <th>Order Date</th>
              
            </tr>
        </thead>
        <tbody>
            <?php 
            // Fetch orders from the database
            $get_payments = "SELECT * FROM `user_payments`"; // Adjust this query to match your table structure
            $result = mysqli_query($conn, $get_payments);
            $number = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['order_id'];  // This exists
                $amount = $row['amount'];  // This corresponds to "amount"
                $invoice_number = $row['invoice_number'];  // This exists
                $payment_mode = $row['payment_mode'];  // This exists
                $order_date = $row['date'];  // This corresponds to "date"
                $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td><?php echo $invoice_number; ?></td>  <!-- Invoice number -->
                <td>$<?php echo $amount; ?>/-</td>  <!-- Amount -->
                <td><?php echo $payment_mode; ?></td>  <!-- Payment Mode -->
                <td><?php echo $order_date; ?></td>  <!-- Order Date -->
                <!-- You can change this if you have a column for order status -->
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<!-- Bootstrap JS and required dependencies -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</body>
</html>
