<!-- Font Awesome CDN link -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">

<h3 class="text-center text-success">All Categories</h3>
<table class="table table-bordered mt-5">
    <thead class="bg-info">
        <tr>
            <th>Serial No</th>
            <th>Category Title</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
    </thead>
    <tbody class="bg-white">
        <?php 
        $sql = "SELECT * FROM categories";
        $result = mysqli_query($conn, $sql);
        $number = 0;
        while($row = mysqli_fetch_assoc($result)){
            $category_id = $row['category_id']; 
            $category_title = $row['category_title']; 
            $number++;
        ?>
        <tr>
            <td> <?php echo $number; ?> </td>
            <td> <?php echo $category_title; ?> </td>
            <td><a href="#" data-toggle="modal" data-target="#editModal" data-id="<?php echo $category_id; ?>" class="text-primary"><i class="fa-solid fa-pen-to-square"></i></a></td>
            <td><a href="#" data-toggle="modal" data-target="#deleteModal" data-id="<?php echo $category_id; ?>" class="text-danger"><i class="fa-solid fa-trash"></i></a></td>
        </tr>
        <?php
        }
        ?>
    </tbody>
</table>

<!-- Edit Confirmation Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure you want to edit this category?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                <a href="#" id="confirmEditBtn" class="btn btn-primary">Edit</a>
            </div>
        </div>
    </div>
</div>

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
                Are you sure you want to delete this category?
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

<!-- Custom Script to Handle Modals -->
<script>
    // Edit Modal
    $('#editModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var categoryId = button.data('id'); // Extract category ID from data-* attribute
        var editUrl = 'index.php?edit_category=' + categoryId;
        $('#confirmEditBtn').attr('href', editUrl); // Update the href of the edit button
    });

    // Delete Modal
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget); // Button that triggered the modal
        var categoryId = button.data('id'); // Extract category ID from data-* attribute
        var deleteUrl = 'index.php?delete_category=' + categoryId;
        $('#confirmDeleteBtn').attr('href', deleteUrl); // Update the href of the delete button
    });
</script>
