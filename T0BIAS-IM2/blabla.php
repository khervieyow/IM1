<div class="modal fade" id="editModal<?php echo $row->id; ?>" tabindex="-1" aria-labelledby="editModalLabel<?php echo $row->id; ?>" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="editModalLabel<?php echo $row->id; ?>">Edit Product</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" class="row g-12">
                    <input type="hidden" name="id" value="<?php echo $row->id; ?>">
                    <div class="col-12">
                        <label for="category_id" class="form-label">Category ID</label>
                        <input type="text" class="form-control" id="category-id" name="category_id" value="<?php echo $row->category_id; ?>" required>
                    </div>
                    <div class="col-12">
                        <label for="productname" class="form-label">Product Name</label>
                        <input type="text" class="form-control" id="productname" name="productname" value="<?php echo $row->productname; ?>" required>
                    </div>
                    <div class="col">
                        <label for="price" class="form-label">Price</label>
                        <input type="text" class="form-control" id="price" name="price" value="<?php echo $row->price; ?>" required>
                    </div>
                    <div class="col">
                        <label for="quantity" class="form-label">Quantity</label>
                        <input type="text" class="form-control" id="quantity" name="quantity" value="<?php echo $row->quantity; ?>" required>
                    </div>
                    <div class="col">
                        <label for="date_purchased" class="form-label">Date Purchased</label>
                        <input type="date" class="form-control" id="date_purchased" name="date_purchased" value="<?php echo $row->date_purchased; ?>" required>
                    </div>
                    <div class="col">
                        <label for="expiry_date" class="form-label">Expiry Date</label>
                        <input type="date" class="form-control" id="expiry_date" name="expiry_date" value="<?php echo $row->expiry_date; ?>" required>
                    </div>
                    <div class="col">
                        <label for="date_created" class="form-label">Date Created</label>
                        <input type="date" class="form-control" id="date_created" name="date_created" value="<?php echo $row->date_created; ?>" required>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary" name="editproduct">Save changes</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
