<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>All Products</title>
  <!-- Font Awesome CDN link -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
  
  <!-- Bootstrap CSS (for styling the table) -->
  <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

  <h3 class="text-center text-success">All Products</h3>

  <table class="table table-bordered mt-5">
    <thead class="bg-info">
      <tr>
        <th>Product ID</th>
        <th>Product</th>
        <th>Product Image</th>
        <th>Product Price</th>
        <th>Total Sold</th>
        <th>Status</th>
        <th>Edit</th>
        <th>Delete</th>
      </tr>
    </thead>

    <tbody class="bg-light">
      <?php 
       $get_products = "SELECT * FROM `products`";
       $result = mysqli_query($conn, $get_products);
       $number = 0;

       while ($row = mysqli_fetch_assoc($result)) {
        $product_id = $row['product_id'];
        $product_title = $row['product_title'];
        $product_image1 = $row['product_image1'];
        $product_price = $row['product_price'];
        $status = $row['status'];
        $number++;
        ?>
    
        <tr class="text-center">
          <td><?php echo $number; ?></td>
          <td><?php echo $product_title; ?></td>
          <td><img src='./product_images/<?php echo $product_image1; ?>' class='product_img' width='50'></td>
          <td>$<?php echo $product_price; ?>/-</td>
          <td>
            <?php  
              $get_count = "SELECT * FROM `order_pending` WHERE product_id = $product_id";
              $result_count = mysqli_query($conn, $get_count);
              $rows_count = mysqli_num_rows($result_count);
              echo $rows_count; 
            ?>
          </td>
          <td><?php echo $status; ?></td>
          <td>
            <a href='index.php?edit_products=<?php echo $product_id ?>' class='text-primary'>
              <i class='fa-solid fa-pen-to-square'></i>
            </a>
          </td>
          <td>
            <button class='btn btn-danger btn-sm' data-toggle="modal" data-target="#deleteModal" 
              data-id="<?php echo $product_id; ?>">
              <i class='fa-solid fa-trash'></i>
            </button>
          </td>
        </tr>
      <?php } ?>
    </tbody>
  </table>

  <!-- Delete Confirmation Modal -->
  <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Confirm Deletion</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Are you sure you want to delete this product?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
          <a href="#" id="confirmDeleteBtn" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap JS (for extra functionality like modals) -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

  <!-- Custom Script to Handle Delete Modal -->
  <script>
    $('#deleteModal').on('show.bs.modal', function (event) {
      var button = $(event.relatedTarget); // Button that triggered the modal
      var productId = button.data('id'); // Extract product ID from data-* attribute
      var deleteUrl = 'index.php?delete_product=' + productId;
      $('#confirmDeleteBtn').attr('href', deleteUrl); // Update the href of the delete button
    });
  </script>
  
</body>
</html>
