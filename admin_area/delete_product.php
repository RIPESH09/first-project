<?php

if (isset($_GET['delete_product'])) {
    $delete_id = $_GET['delete_product'];
    // echo $delete_id;
    // delete product query
$delete_product = "DELETE FROM products WHERE product_id = '$delete_id'";
// execute query
$result_product = mysqli_query($conn, $delete_product);
// check if query executed successfully
if ($result_product) {
    echo "<script>alert('Product deleted successfully');</script>";
    echo "<script> window.open ('./index.php' , '_self ' );</script>";
}
}

?>
