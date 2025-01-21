<?php
// Include necessary files
include("../includes/conncet.php");
include("../functions/common_functions.php");

// Check if user_id is set in GET request
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];
}

// Getting the IP address
$get_ip_address = getIPAddress();
$total_price = 0;
$cart_query_price = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
$result_cart_price = mysqli_query($conn, $cart_query_price);
$invoice_number = mt_rand();
echo $invoice_number;  // Added missing semicolon

$status = 'pending';
$count_products = mysqli_num_rows($result_cart_price);

// Calculate total price correctly by multiplying price by quantity directly in the cart
if ($count_products > 0) {
    while ($row_price = mysqli_fetch_array($result_cart_price)) {
        $product_id = $row_price['product_id'];
        $product_quantity = $row_price['quantity']; // Get quantity of this product

        // Get product details
        $select_product = "SELECT * FROM `products` WHERE product_id = '$product_id'";
        $run_price = mysqli_query($conn, $select_product);
        while ($row_product_price = mysqli_fetch_array($run_price)) {
            // Calculate the price for this product based on quantity
            $total_price += $row_product_price['product_price'] * $product_quantity;
        }
    }
} else {
    echo "Your cart is empty.";
}

// Calculate total quantity (though it's no longer used in price calculation)
$get_cart = "SELECT * FROM `cart_details` WHERE ip_address = '$get_ip_address'";
$run_cart = mysqli_query($conn, $get_cart);
$total_quantity = 0;
while ($get_item_quantity = mysqli_fetch_array($run_cart)) {
    $total_quantity += $get_item_quantity['quantity'];
}

// Avoid zero quantity, set default to 1 if no items
if ($total_quantity == 0) {
    $total_quantity = 1;
}

// Use the calculated total price directly (no need to multiply again)
$subtotal = $total_price;  // Already taking quantity into account per product

// Insert the order into users_orders table
$insert_orders = "INSERT INTO `user_orders` (user_id, amount_due,
 invoice_number, total_products, order_date, order_status) 
                  VALUES ($user_id, $subtotal, $invoice_number,
                   $count_products, NOW(), '$status')";

$result_query = mysqli_query($conn, $insert_orders);
if ($result_query) {
    echo "<script>alert('Order placed successfully');</script>";
    echo "<script>window.open('profile.php', '_self');</script>";
}

// Insert into orders_pending for each product
if ($count_products > 0) {
    // Re-run the cart query
    $result_cart_price = mysqli_query($conn, $cart_query_price);
    while ($row_price = mysqli_fetch_array($result_cart_price)) {
        $product_id = $row_price['product_id'];
        $product_quantity = $row_price['quantity']; // Get quantity of this product

        // Insert each product into orders_pending
        $insert_pending_orders = "INSERT INTO `order_pending` (user_id, invoice_number, product_id, quantity, order_status) 
                                  VALUES ($user_id, $invoice_number, $product_id, $product_quantity, '$status')";
        $result_pending_orders = mysqli_query($conn, $insert_pending_orders);
    }
}

//delete items from cart
$empty_cart = "DELETE FROM `cart_details` WHERE 
ip_address = '$get_ip_address'";
$result_delete = mysqli_query($conn, $empty_cart);



?>
