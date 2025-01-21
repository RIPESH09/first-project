<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<h3 class="text-center text-success">All Brands</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Serial No</th>
            <th>Brand Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <?php 
        $sql = "SELECT * FROM  brands";
        $result = mysqli_query($conn, $sql);
        $number = 0;
        while($row = mysqli_fetch_assoc($result)){
            $brand_id = $row['brand_id']; 
            $brand_title = $row['brand_title']; 
            $number++;
        ?>
        <tr>
            <td> <?php echo $number; ?> </td>
            <td> <?php echo $brand_title; ?> </td>
            <td><a href="index.php?edit_brands=<?php echo $brand_id ?>" class="text-primary"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td>
                <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $brand_id; ?>">
                    <i class="fa-solid fa-trash"></i>
                </button>
            </td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this brand?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <a href="#" id="confirmDelete" class="btn btn-danger">Delete</a>
      </div>
    </div>
  </div>
</div>

<script>
    // Add event listener to delete buttons
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const brandId = this.getAttribute('data-id');
            const confirmDelete = document.getElementById('confirmDelete');
            confirmDelete.setAttribute('href', `index.php?delete_brands=${brandId}`);
        });
    });
</script>
