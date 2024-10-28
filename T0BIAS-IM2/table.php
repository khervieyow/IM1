<?php
require_once('prelim.php');

$newconnection = new Connection();
$categories = $newconnection->getCategories(); 

$newconnection->addProduct();
$newconnection->deleteProduct();
$newconnection->updateProduct();

$searchTerm = isset($_POST['search']) ? trim($_POST['search']) : '';
$availability = isset($_POST['availability']) ? $_POST['availability'] : '';
$selectedCategory = isset($_POST['category_id']) ? $_POST['category_id'] : '';
$startDate = isset($_POST['startDate']) ? $_POST['startDate'] : '';
$endDate = isset($_POST['endDate']) ? $_POST['endDate'] : '';


$sql = "SELECT p. *, c.category_name
FROM thetable p
INNER JOIN categories c
ON p.category_id = c.category_id
Where 1
";

if ($availability == 'in_stock') {
    $sql .= ' AND p.quantity > 0';
} elseif ($availability == 'out_of_stock') {
    $sql .= ' AND p.quantity = 0';
}

if (!empty($selectedCategory)) {
    $sql .= ' AND p.category_id = :category_id';
}

if (!empty($startDate) && !empty($endDate)) {
    $sql .= ' AND p.date_purchase BETWEEN :startDate AND :endDate';
}

$sql .= ' ORDER BY p.id ASC';
$stmt = $newconnection->openConnection()->prepare($sql);

if (!empty($selectedCategory)) {
    $stmt->bindValue(':category_id', $selectedCategory);
}
if (!empty($startDate) && !empty($endDate)) {
    $stmt->bindValue(':startDate', $startDate);
    $stmt->bindValue(':endDate', $endDate);
}

$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_OBJ);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PlastikBotelya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

<div class="container">
    <form action="destroy.php" method="post">
        <button type="submit"name="logoutbtn">logout</button>
    </form>
    <form action="" method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="productname" class="form-label">Product Name</label>
            <input type="text" class="form-control" id="productname" name="productname" required>
        </div>

        <div class="col-md-6">
            <label for="category_id" class="form-label">Category</label>
            <select id="category_id" name="category_id" class="form-select" required>
                <?php foreach($categories as $category) { ?>
                    <option value="<?php echo $category->category_id; ?>"><?php echo $category->category_name; ?></option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-6">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>

        <div class="col-md-6">
            <label for="quantity" class="form-label">Quantity</label>
            <input type="number" class="form-control" id="quantity" name="quantity" required>
        </div>

        <div class="col-md-4">
            <label for="date_purchase" class="form-label">Date of Purchase</label>
            <input type="date" class="form-control" id="date_purchase" name="date_purchase" required>
        </div>

        <div class="col-md-4">
            <label for="expiry_date" class="form-label">Expiry Date</label>
            <input type="date" class="form-control" id="expiry_date" name="expiry_date" required>
        </div>

        <div class="col-md-4">
            <label for="date_created" class="form-label">Date Created</label>
            <input type="date" class="form-control" id="date_created" name="date_created" required>
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary" name="addproduct">Add Product</button>
        </div>
        <div class="col-md-12 mb-3">
    <a href="category.php" class="btn btn-info">Show Categories</a>
</div>
    </form>

    <hr>

    <form action="" method="POST" class="row g-3">
        <div class="col-md-3">
            <label>Availability:</label>
            <select name="availability" class="form-select">
                <option value="">All</option>
                <option value="in_stock">In Stock</option>
                <option value="out_of_stock">Out of Stock</option>
            </select>
        </div>

        <div class="col-md-3">
            <label for="category_id">Category:</label>
            <select name="category_id" class="form-select">
                <option value="">All</option>
                <?php foreach($categories as $category) { ?>
                    <option value="<?php echo $category->category_id; ?>" <?php echo $selectedCategory == $category->category_id ? 'selected' : ''; ?>>
                        <?php echo $category->category_name; ?>
                    </option>
                <?php } ?>
            </select>
        </div>

        <div class="col-md-3">
            <label for="startDate">Start Date</label>
            <input type="date" id="startDate" name="startDate" class="form-control" value="<?php echo $startDate; ?>">
        </div>

        <div class="col-md-3">
            <label for="endDate">End Date</label>
            <input type="date" id="endDate" name="endDate" class="form-control" value="<?php echo $endDate; ?>">
        </div>

        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Filter</button>
        </div>
    </form>

    <table class="table table-primary table-bordered mt-3">
        <thead>
            <tr>
                <th>ID</th>
                <th>Category ID</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Date of Purchase</th>
                <th>Expiry Date</th>
                <th>Date Created</th>
                <th> </th>
                <th> </th>
            </tr>
        </thead>
        <tbody>
            <?php if ($result) {
                foreach ($result as $row) { ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->category_name; ?></td>
                        <td><?php echo $row->productname; ?></td>
                        <td><?php echo $row->price; ?></td>
                        <td><?php echo $row->quantity; ?></td>
                        <td><?php echo $row->date_purchase; ?></td>
                        <td><?php echo $row->expiry_date; ?></td>
                        <td><?php echo $row->date_created; ?></td>
                        <td><button type="button" class="btn btn-warning" data-bs-toggle="modal" data-bs-target="#updateModal<?php echo $row->id; ?>">Edit</button></td>
                    <?php include('edit_modal2.php'); ?>
                    <td>
                        <form action="" method="POST">
                            <button type="submit" name="delete_product" value="<?php echo $row->id; ?>" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                    </tr>
            <?php }
            } else {
                echo "<tr><td colspan='9'>Items are not available.</td></tr>";
            } ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>