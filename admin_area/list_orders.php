

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
    <h3 class="text-center text-success">All Orders</h3>
    <table class="table table-bordered mt-5">
        <thead class="bg-info">
            <tr>
                <th>Sl No</th>
                <th>Due Amount</th>
                <th>Invoice Number</th>
                <th>Total Products</th>
                <th>Order Date</th>
                <th>Status</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            // Fetch orders from the database
            $get_orders = "SELECT * FROM `user_orders`";
            $result = mysqli_query($conn, $get_orders);
            $number = 0;
            while($row = mysqli_fetch_assoc($result)) {
                $order_id = $row['order_id'];
                $amount_due = $row['amount_due'];
                $invoice_number = $row['invoice_number'];
                $total_products = $row['total_products'];
                $order_date = $row['order_date'];
                $order_status = $row['order_status'];
                $number++;
            ?>
            <tr class="text-center">
                <td><?php echo $number; ?></td>
                <td>$<?php echo $amount_due; ?>/-</td>
                <td><?php echo $invoice_number; ?></td>
                <td><?php echo $total_products; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_status; ?></td>
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
